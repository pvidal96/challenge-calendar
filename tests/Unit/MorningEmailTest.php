<?php

namespace Tests\Unit;

use App\Models\User;
use App\Services\MorningEmailService;
use Tests\TestCase;

class MorningEmailTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_prepare_morning_email()
    {
        $user = User::where('id', 1)->first();

        $email = MorningEmailService::getInstance()->prepareEmail($user);

        $this->assertTrue(true);
    }
}
