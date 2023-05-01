<?php

namespace App\Services;

use App\Models\Email;
use App\Models\User;

class MorningEmailService extends Service
{
    private static $singleton = null;


    public static function getInstance(): MorningEmailService
    {
        if (!self::$singleton) {
            self::$singleton = new MorningEmailService();
        }

        return self::$singleton;
    }

    /**
     * Creates the JSON data neccessary for the morning email containing a user agenda. 
     */
    public function prepareEmail(User $main_user, $from = "", $to = ""): string
    {
        $meetings = CalendarService::getInstance()->getMeetings($main_user, $from, $to);

        //TODO email content as a JSONResource, not a plain array
        $email_content = [];

        foreach ($meetings as $meeting) {
            $attending_same_company = $companies = [];

            $users = $meeting->users()->orderBy('company_id')->get();
            $attendees = $meeting->attendees()->orderBy('company_id')->get();

            foreach ($users as $user) {
                if ($user->company_id == $main_user->company_id && $user->id !== $main_user->id) {
                    $attending_same_company[$user->first_name] = $user->pivot->accepted;
                }
            }


            foreach ($attendees as $attendee) {
                if ($attendee->company_id === $main_user->company_id) {
                    $attending_same_company[$attendee->first_name] = $attendee->pivot->accepted;
                } else {
                    if (!isset($companies[$attendee->company_id])) {
                        $company = $attendee->company()->first();

                        $companies[$attendee->company_id] = [
                            'name' => $company->name,
                            'linkedin_url' => $company->linkedin_url,
                            'employees' => $company->employees,
                            'attendees' => [],
                        ];
                    }


                    $companies[$attendee->company_id]['attendees'][] = [
                        'name' => $attendee->first_name . ' ' . $attendee->last_name,
                        'avatar' => $attendee->avatar,
                        'title' => $attendee->title,
                        'linkedin_url' => $attendee->linkedin_url,
                        'accepted' => $attendee->pivot->accepted,
                        //TODO SQL QUERY to get "Met with Blaise (4x)"
                    ];
                }
            }

            $email_content[] = [
                'title' => $meeting->title,
                'start' => $meeting->start,
                'end' => $meeting->end,
                'attending' => $meeting->pivot->accepted,
                'attending_same_company' => $attending_same_company,
                'companies' => $companies,
            ];
        }


        $json = json_encode($email_content);

        Email::create([
            'user_id' => $main_user->id,
            'content' => $json
        ]);

        return $json;
    }
}
