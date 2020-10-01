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
<<<<<<< HEAD
        //
=======
        \App\Console\Commands\ReportCommand::class
>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
<<<<<<< HEAD
        // $schedule->command('inspire')
        //          ->hourly();
=======
        $schedule->command('everyMinute:update')
                 ->everyMinute();
>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
<<<<<<< HEAD
        $this->load(__DIR__.'/Commands');
=======
        // $schedule->command('emails:send nyiyelin4@gmail.com --force')->everyMinute();
        // $schedule->command('nyiyelin4')
        //          ->everyMinute()
        //          ->sendOutputTo($filePath)
        //          ->emailOutputTo('nyiyelin4@gmail.com');
        // $this->load(__DIR__.'/Commands');
>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7

        require base_path('routes/console.php');
    }
}
