<?php

namespace Tests\Unit;

use App\Models\Email;
use App\Models\User;
use App\Services\MorningEmailService;
use DateTime;
use Tests\TestCase;

class PrepareEmailCronTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_prepare_email_cron()
    {
        /**
         * Prepare emails for today
         */
        $users = User::all();
        $service = MorningEmailService::getInstance();

        $from = date('2022-06-25 08:00:00');
        $to = date('2022-06-25 23:59:59');

        $now = (new DateTime())->format('Y-m-d H:i:s');

        foreach ($users as $user) {
            $email = $service->prepareEmail($user, $from, $to);

            $email->update(['sent_at' => $now]);
        }

        $this->assertTrue(count(Email::where('sent_at', $now)->get()) === 4);
    }
}
