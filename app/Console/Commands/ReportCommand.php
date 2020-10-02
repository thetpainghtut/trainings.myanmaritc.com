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
    $batches = Batch::where('enddate','>=',$date)->get();

    foreach ($batches as $batch) {


        // if($batch->enddate = $date){

        // foreach ($batch->students as $batch_student_status) {

        //     foreach ($batch_student_status->lessons as $student_lesson) {

        //       if($batch_student_status->pivot->status == 0){
        //                 $batch_student_status->lessons()->updateExistingPivot($student_lesson->id,['status'=>1]);
        //             }
        //         }
        //     }
        // }

      foreach ($batch->subjects as $batch_subject) {
          $count = count($batch_subject->lessons);
          $subname = $batch_subject->name;
          
          foreach ($batch_subject->lessons as $sub_lesson) {



            foreach ($sub_lesson->students as $lesson_student) {
              // var_dump($lesson_student->namee);
              // var_dump($lesson_student->pivot->student_id);
            
                foreach ($batch->students as $batch_student) {

                if($batch_student->pivot->status == "Active" && $batch_student->pivot->student_id === $lesson_student->pivot->student_id && $batch_student->lessons && $lesson_student->pivot->status == 0){

                  $s_count = count($batch_student->lessons);


                  if($count != $s_count){

                    $text = 'Your  tutorials are not finish.Watch and learn your tutorials! 
                        http://localhost:8000/panel
                        ';

                    Mail::raw($text,function($message) use ($batch_student){
                        $message->from('nyiyl345@gmail.com');
                        $message->to($batch_student->email)->subject('Alert for your tutorial!');

                    });
                    


                    $this->info('Minute Update has been send successfully');
                break;

                  }else{
                    $text = 'There are tutorial video to watch
                        http://localhost:8000/panel>
                        ';

                    Mail::raw($text,function($message) use ($batch_student){
                        $message->from('nyiyl345@gmail.com');
                        $message->to($batch_student->email)->subject('Something to watch');

                    });
                  }
                     // break;


                }
                if($batch_student->pivot->status == "Active" && $batch_student->pivot->student_id !== $lesson_student->pivot->student_id && $batch_student->lessons && $lesson_student->pivot->status == 0){
                    $text = 'You have not watched  tutorial.Watch and learn tutorial
                        http://localhost:8000/panel
                        ';

                    Mail::raw($text,function($message) use ($batch_student){
                        $message->from('nyiyl345@gmail.com');
                        $message->to($batch_student->email)->subject('To watch tutorial');

                    });
                    break;

                }
                } 
              }
            }
          }  
      }
        

    }
}


