<?php

namespace App\Console\Crons;

use App\Models\User;
use App\Services\MorningEmailService;

class PrepareMorningEmailCron extends Cron
{

    /**
     * Invoked on schedule.
     */
    public function __invoke()
    {
        /**
         * Prepare emails for today
         */
        $users = User::get();
        $service = MorningEmailService::getInstance();

        $from = date('Y-m-d 08:00:00');
        $to = date('Y-m-d 23:59:59');

        foreach ($users as $user) {
            $service->prepareEmail($user, $from, $to);
        }
    }
}
