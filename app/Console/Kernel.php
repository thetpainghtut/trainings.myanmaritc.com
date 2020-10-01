<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\ReportCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('everyMinute:update')
                 ->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        // $schedule->command('emails:send nyiyelin4@gmail.com --force')->everyMinute();
        // $schedule->command('nyiyelin4')
        //          ->everyMinute()
        //          ->sendOutputTo($filePath)
        //          ->emailOutputTo('nyiyelin4@gmail.com');
        // $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
