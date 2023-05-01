<?php

namespace App\Services;

use App\Http\Resources\PersonData;
use App\Models\Attendee;
use App\Models\Company;
use DateTime;
use Exception;

class PersonDataService extends Service
{
    private static $singleton = null;

    const MAIN_URL = "https://app.usergems.com/api/hiring/calendar-challenge";

    //TODO MOVE TO ENV
    const EXPIRATION_DAYS = 30;
    const API_TOKEN = /*env('PERSON_DATA_API_TOKEN')*/ "9d^XItOjTAGSG5ch";

    public static function getInstance(): PersonDataService
    {
        if (!self::$singleton) {
            self::$singleton = new PersonDataService();
        }

        return self::$singleton;
    }

    /**
     * Get Attendee from database and if it's expired or it doesn't exist, retreive the info and update it on the database
     */
    public function getAttendee(string $email): Attendee|null
    {
        $attendee = $this->getFromDatabase($email);

        //If it's expire, renew the data
        if (!$attendee || (new DateTime($attendee->last_updated))->modify('+' . self::EXPIRATION_DAYS . ' days') < new DateTime()) {
            $person_data = $this->getFromApi($email);

            //Create the db records
            if ($person_data) {
                $company = Company::where('name', $person_data->company->name)->first();

                if (!$company) {
                    $company = Company::create([
                        'name' => $person_data->company->name,
                        'linkedin_url' => $person_data->company->linkedin_url,
                        'employees' => $person_data->company->employees,
                    ]);
                } else {
                    $company->update([
                        'linkedin_url' => $person_data->company->linkedin_url,
                        'employees' => $person_data->company->employees,
                    ]);
                }

                $data = [
                    'email' => $email,
                    'first_name' => $person_data->first_name,
                    'last_name' => $person_data->last_name,
                    'avatar' => $person_data->avatar,
                    'title' => $person_data->title,
                    'linkedin_url' => $person_data->linkedin_url,
                    'company_id' => $company->id,
                    'last_updated' => (new DateTime())->format('Y-m-d H:i:s'),
                ];

                if (!$attendee) {
                    $attendee = Attendee::create($data);
                } else {
                    $attendee->update($data);
                }
            }
        }

        return $attendee;
    }


    /**
     * Gets the data of a person given an email address
     * 
     * Attention: connects to paid API. 
     */
    public function getFromApi(string $email): PersonData|null
    {
        try {
            $response = $this->httpGetJson(implode('/', [self::MAIN_URL, 'person', $email]), self::API_TOKEN);

            $person_data = new PersonData($response);

            return $person_data;
        } catch (Exception $e) {
            //TODO handle properly
            return null;
        }
    }

    /**
     * Gets the data of a person from the database.
     */
    public function getFromDatabase(string $email): Attendee|null
    {
        return Attendee::where('email', $email)->first();
    }
}
