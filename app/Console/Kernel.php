<?php

namespace App\Console;

use App\Console\Crons\PrepareMorningEmailCron;
use App\Console\Crons\SendMorningEmailCron;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule
            ->call(new PrepareMorningEmailCron())
            ->name('PrepareMorningEmailCron')
            ->dailyAt('00:00')
            ->withoutOverlapping()
            ->environments(['local', 'staging', 'production']);


        $schedule
            ->call(new SendMorningEmailCron())
            ->name('SendMorningEmailCron')
            ->dailyAt('08:00')
            ->withoutOverlapping()
            ->environments(['local', 'staging', 'production']);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
