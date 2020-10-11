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
use App\Response;
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


        if($batch->enddate == $date){

        foreach ($batch->students as $batch_student_status) {

            foreach ($batch_student_status->lessons as $student_lesson) {

              if($batch_student_status->pivot->status == 0){
                        $batch_student_status->lessons()->updateExistingPivot($student_lesson->id,['status'=>1]);
                    }
                }

            foreach ($batch_student_status->responses as $response) {
                   
                       if($response->status == "Active"){
                        $response = Response::find($response->id);
                        $response->status = "Deactive";
                        $response->save();
                       
                   }
                }
            }


        }

        $lessons = Lesson::all();
        $students = Student::all();
        $date = date('Y-m-d');
        $data = Array();
        $student = Array();
        $lesson_stu = Array();

        $batches = Batch::where('enddate','>=',$date)->get();

        foreach ($batches as $batch) {

          foreach ($batch->subjects as $batch_subject) {
              $count = count($batch_subject->lessons);
              $subname = $batch_subject->name;
              
              foreach ($batch_subject->lessons as $sub_lesson) {

                    foreach ($batch->students as $batch_student) {
                      
                      foreach ($sub_lesson->students as $lesson_student) {


                      if($batch_student->pivot->status == "Active" && $batch_student->pivot->student_id === $lesson_student->pivot->student_id && $batch_student->lessons && $lesson_student->pivot->status == 0){

                        array_push($lesson_stu);

                        $s_count =count($batch_student->lessons);


                      if($count == $s_count){
                        // var_dump($count.'/'.$s_count);

                        $text = 'Your  tutorials are not finish.Watch and learn your tutorials! 
                            http://localhost:8000/panel
                            ';
                            
                            array_push($student,$batch_student->email);
                            
                      }

                    }if($batch_student->pivot->status == "Active" && $lesson_student->pivot->status == 0 && $batch_student->id !== $lesson_student->pivot->student_id){

                        $s_count =count($batch_student->lessons);


                      if($count != $s_count){
                        $text = 'You have not watched  tutorial.Watch and learn tutorial
                            http://localhost:8000/panel
                            ';
                            
                            array_push($data,$batch_student->email);
                          }
                           
                        }
                      }

                    }    
                }
              }  
          }
      }

     $stu_array = array_unique($student); 
     $array = array_unique($data);
     // dd($array);

        foreach ($array as $email) {
            

            $text = 'Your  tutorials are not finish.Watch and learn your tutorials! ( http://localhost:8000/panel ) ';

            Mail::raw($text,function($message) use ($email){
                $message->from('info@myanmarcodingbootcamp.com');
                $message->to($email)->subject('Alert for your tutorial!');

            });
            
        }
    }

    

}


