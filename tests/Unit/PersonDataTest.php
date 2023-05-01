<?php

namespace Tests\Unit;

use App\Services\PersonDataService;
use DateTime;
use Tests\TestCase;

class PersonDataTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_attendee()
    {
        $attendee = PersonDataService::getInstance()->getAttendee('demi@algolia.com');

        $this->assertTrue(!!$attendee && (new DateTime($attendee->last_updated))->modify('+30 days') > new DateTime());
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_from_api()
    {
        $response = '{"first_name":"Demi","last_name":"Malnar","avatar":"https:\\/\\/media-exp1.licdn.com\\/dms\\/image\\/C4D03AQHPUFYhbLcAqw\\/profile-displayphoto-shrink_200_200\\/0\\/1516239694635?e=1664409600&v=beta&t=xmiukyVVGR6edLzuNnkBjA0vzfvEg-COOCmcKIjDcGk","title":"GTM Chief of Staff","linkedin_url":"https:\\/\\/www.linkedin.com\\/in\\/demimalnar","company":null}';

        $data = PersonDataService::getInstance()->getFromApi('demi@algolia.com');

        $this->assertTrue($data->toJson() === $response);
    }
}
