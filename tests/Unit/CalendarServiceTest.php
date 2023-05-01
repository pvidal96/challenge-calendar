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

        $this->assertTrue(count($meetings) === 14);

        
        $user = User::where('id', 2)->first();

        $meetings = CalendarService::getInstance()->getAndUpdateMeetings($user);

        $this->assertTrue(count($meetings) === 1);

        
        $user = User::where('id', 3)->first();

        $meetings = CalendarService::getInstance()->getAndUpdateMeetings($user);

        $this->assertTrue(count($meetings) === 1);

        
        $user = User::where('id', 4)->first();

        $meetings = CalendarService::getInstance()->getAndUpdateMeetings($user);

        $this->assertTrue(count($meetings) === 4);
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

        $this->assertTrue(count($meetings) === 14);
    }
}
