<?php

namespace App\Console\Crons;

use App\Mail\MorningInfo;
use App\Models\Email;
use Illuminate\Support\Facades\Mail;

class SendMorningEmailCron extends Cron
{

    /**
     * Invoked on schedule.
     */
    public function __invoke()
    {
        /**
         * Send the already prepared emails
         */
        $emails = Email::whereNull('sent_at')->get();

        foreach ($emails as $email) {
            $user = $email->user()->first();
            
            //the template is in resources/views/mail/morninginfo.blade.php
            Mail::to($user->email)->send(new MorningInfo($email->content));
        }
    }
}
