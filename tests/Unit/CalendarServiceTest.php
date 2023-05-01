<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\CalendarService;
use Tests\TestCase;

class CalendarServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_and_update_meetings()
    {
        $user = User::where('id', 1)->first();

        $meetings = CalendarService::getInstance()->getAndUpdateMeetings($user);

        $this->assertTrue(true);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_meetings()
    {
        $user = User::where('id', 1)->first();

        $meetings = CalendarService::getInstance()->getMeetings($user);

        //TODO finish
        $this->assertTrue(true);
    }
}
