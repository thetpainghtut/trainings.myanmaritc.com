<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Subject;
use App\Course;
use App\Batch;
use App\Inquire;
use App\Student;
use App\Education;
use App\Township;
use App\Journal;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Http\Resources\StudentResource;
use App\Lesson;
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


    $lessons = Lesson::all();
    $students = Student::all();
    $date = date('Y-m-d');
    $batches = Batch::where('enddate','>',$date)->get();

    foreach ($batches as $batch) {
      foreach ($batch->subjects as $batch_subject) {
          $count = count($batch_subject->lessons);
          $subname = $batch_subject->name;
          
          foreach ($batch_subject->lessons as $sub_lesson) {



            foreach ($sub_lesson->students as $lesson_student) {
              // var_dump($lesson_student->namee);
              // var_dump($lesson_student->pivot->student_id);
            
                foreach ($batch->students as $batch_student) {

                if($batch_student->pivot->status == "Active" && $batch_student->pivot->student_id == $lesson_student->pivot->student_id ){

                  $s_count = count($batch_student->lessons);


                  if($count != $s_count){

                    $text = "Your ".$subname.' tutorials are not finish.Watch and learn your tutorials!';

                    Mail::raw($text,function($message) use ($lesson_student){
                        $message->from('nyiyl345@gmail.com');
                        $message->to($lesson_student->email)->subject('Alert for your tutorial!');
                    });

                    $this->info('Minute Update has been send successfully');
                  }else{
                    $text = "You have to watch ".$sub_lesson->name;

                    Mail::raw($text,function($message) use ($lesson_student){
                        $message->from('nyiyl345@gmail.com');
                        $message->to($lesson_student->email)->subject('Error Mail send');
                    });
                  }
                  break;

                }if($lesson_student->pivot->lesson_id != $sub_lesson->id){
                    $text = "You have to watch ".$sub_lesson->name;

                    Mail::raw($text,function($message) use ($lesson_student){
                        $message->from('nyiyl345@gmail.com');
                        $message->to($lesson_student->email)->subject('To watch tutorial');
                    });
                }
                } 
              }
            }
          }  
      }
        

    }
}
