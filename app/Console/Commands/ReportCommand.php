<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class ReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'everyMinute:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send every minute email to all the users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $date = date("Y:m:d h:i:s");
        Mail::raw($date,function($message){
            $message->from('nyiyl345@gmail.com');
            $message->to('nyiyelin4@gmail.com');
        });

        $this->info('Minute Update has been send successfully');

    }
}
