<?php

namespace App\Services;

use App\Http\Resources\CalendarData;
use App\Http\Resources\MeetingData;
use App\Models\Meeting;
use App\Models\User;
use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class CalendarService extends Service
{
    private static $singleton = null;

    const MAIN_URL = "https://app.usergems.com/api/hiring/calendar-challenge";


    public static function getInstance(): CalendarService
    {
        if (!self::$singleton) {
            self::$singleton = new CalendarService();
        }

        return self::$singleton;
    }

    /**
     * Gets from the Calendar API the meetings that changed since the last check and updates/creates them in the database
     */
    public function getAndUpdateMeetings(User $user, $from = '', $to = ''): Collection
    {
        $last_check = $user->last_calendar_check ? new DateTime($user->last_calendar_check) : false;

        $already_checked = false;
        $page = 1;

        do {
            $api_meetings = $this->getFromApi($user->calendar_token, $page);

            foreach ($api_meetings->data as $meeting) {
                //If it's new or has changed, update/create it on the database
                if (!$last_check || new DateTime($meeting->changed) > $last_check) {
                    $this->updateMeeting($user, $meeting);
                } else {
                    $already_checked = true;
                }
            }

            $page++;
        } while (!$already_checked && $api_meetings && $api_meetings->total > ($api_meetings->per_page * ($page - 1)));

        $user->update([
            'last_calendar_check' => (new DateTime())->format('Y-m-d H:i:s'),
        ]);

        return $user->getMeetings($from, $to);
    }


    /**
     * Gets meetings for a user
     * 
     * //TODO this could be moved to the user model App/Models/User
     */
    // public function getMeetings(User $user, $from = '', $to = ''): Collection
    // {
    //     $query = $user->meetings();

    //     if ($from) {
    //         $query->where('start', '>', $from);
    //     }

    //     if ($to) {
    //         $query->where('start', '<', $to);
    //     }

    //     return $query->orderBy('start', 'DESC')->get();
    // }

    /**
     * Updates meeting in the database if exsists, otherwise it creates it
     */
    public function updateMeeting(User $user, MeetingData $meetingData): Meeting
    {
        $meeting = Meeting::where('api_id', $meetingData->id)->first();

        $data = [
            'api_id' => $meetingData->id,
            'start' => $meetingData->start,
            'end' => $meetingData->end,
            'changed' => $meetingData->changed,
            'title' => $meetingData->title,
        ];

        if (!$meeting) {
            //create
            $meeting = Meeting::create($data);
        } else {
            //update
            $meeting->update($data);
        }

        $attendees = array_unique(array_merge($meetingData->accepted, $meetingData->rejected));
        $update = [];

        if (count($attendees)) {
            $personDataService = PersonDataService::getInstance();

            foreach ($attendees as $email) {
                $attendee = $personDataService->getAttendee($email);

                if ($attendee) {
                    $update[$attendee->id] = ['accepted' => !!in_array($email, $meetingData->accepted)];
                }
            }
        }

        $meeting->attendees()->sync($update);

        $user->meetings()->syncWithoutDetaching([$meeting->id => ['accepted' => !!in_array($user->email, $meetingData->accepted)]]);

        return $meeting;
    }

    /**
     * Gets the Agenda of a given user and page number
     */
    public function getFromApi(string $token, int $page = 1): CalendarData|null
    {
        try {
            $response = $this->httpGetJson(implode('/', [self::MAIN_URL, 'events']), $token, ['page' => $page]);

            $calendar_data = new CalendarData($response);

            return $calendar_data;
        } catch (Exception $e) {
            //TODO handle properly
            return null;
        }
    }
}
