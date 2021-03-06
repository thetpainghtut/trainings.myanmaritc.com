<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Student;
use App\Subject;
use App\Course;
use App\Batch;
use App\Group;
use App\Inquire;
use App\Education;
use App\Township;
use App\Unit;
use App\Response;
use Rabbit;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Staff;
use App\Teacher;
use App\EmailChecker;
use App\Quizz;
class StudentController extends Controller
{
    public function __construct($value='')
    {
        $this->middleware('role:Admin|Mentor|Recruitment|Business Development|Teacher')->except('store');
        $this->EmailChecker = new EmailChecker;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      // dd($request);
      $user = Auth::user();
      $role = $user->getRoleNames();
      if($role[0] == 'Admin'){
        $courses = Course::all();
        $batches = Batch::all();

        $bid = 0;

        if (request('batch')) {
          $bid = request('batch');
          $groups = Group::where('batch_id',$bid)->get();
          $batch = Batch::find($bid);
          // $students = Student::where('batch_id',$bid)->get();


          return view('students.index',compact('courses','batches','groups','bid','batch'));
        }else{
          $students = Student::all();
          // Return 
          return view('students.index',compact('students','courses','batches','bid'));
        }
      }elseif($role[0] == 'Business Development'){
        $courses = Course::all();
        $batches = Batch::all();

        $bid = 0;

        if (request('batch')) {
          $bid = request('batch');
          $groups = Group::where('batch_id',$bid)->get();
          $batch = Batch::find($bid);
          // $students = Student::where('batch_id',$bid)->get();


          return view('students.index',compact('courses','batches','groups','bid','batch'));
          }else{
          $students = Student::all();
          // Return 
          return view('students.index',compact('students','courses','batches','bid'));
        }
      }elseif($role[0] == 'Recruitment'){
        $courses = Course::all();
        $batches = Batch::all();

        $bid = 0;

        if (request('batch')) {
          $bid = request('batch');
          $groups = Group::where('batch_id',$bid)->get();
          $batch = Batch::find($bid);
          // $students = Student::where('batch_id',$bid)->get();


          return view('students.index',compact('courses','batches','groups','bid','batch'));
          }else{
          $students = Student::all();
          // Return 
          return view('students.index',compact('students','courses','batches','bid'));
        }
      }
      elseif($role[0] == 'Teacher'){
        $userid = $user->id;
        $bid = 0;
        $batches = Batch::all();
        $staff = Staff::with('teacher')->where('user_id',$userid)->get();
       
        $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();

        $courses = array();
        foreach ($teacher as $key => $value) {
          array_push($courses,$value->course);
        }
       
        if (request('batch')) {
          $bid = request('batch');
          $groups = Group::where('batch_id',$bid)->get();
          $batch = Batch::find($bid);
          // $students = Student::where('batch_id',$bid)->get();


          return view('students.index',compact('courses','batches','groups','bid','batch'));
        }else{
            $students = Student::all();
          // Return 
          return view('students.index',compact('students','courses','batches','bid'));
        }
      }elseif($role[0] == 'Mentor'){
        $staffs = Staff::where('user_id',$user->id)->get();
        $courses = $staffs[0]->mentor[0]->course;
         $batches = Batch::all();
         $bid = 0;
        if (request('batch')) {
          $bid = request('batch');
          $groups = Group::where('batch_id',$bid)->get();
          $batch = Batch::find($bid);
          // $students = Student::where('batch_id',$bid)->get();


          return view('students.index',compact('courses','batches','groups','bid','batch'));
        }else{
            $students = Student::all();
          // Return 
          return view('students.index',compact('students','courses','batches','bid'));
        }
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $subjects = Subject::all();
      $courses = Course::all();
      $batches = Batch::all();
      $townships = Township::all();

      return view('students.create',compact('subjects','courses','batches','townships'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //$redirect_back = redirect()->back()->getTargetUrl();

      // dd($redirect_back->withInput(Input::flash()));

      // Validation

      // dd($request->batch_id);

      $request->validate([
        "namee" => 'required|min:5|max:191',
        "namem" => 'required|min:5|max:191',
        "degree" => 'required',
        "city" => 'required',
        "accepted_year" => 'required',
        "address" => 'required',
        "email" => 'required',
        "phone" => 'required|max:12',
        "dob" => 'required',
        "gender" => 'required',
        // "subjects" => '',
        "p1" => 'required',
        "p1_rs" => 'required',
        "p1_phone" => 'required',
        "p2" => 'required',
        "p2_rs" => 'required',
        "p2_phone" => 'required',
        "because" => 'required'
      ]);
        $inquireno = request('inquireno');
        $batch_id = request('batch_id');
        $user_id = request('user_id');
        $student_id = request('student_id');

        $namee = request('namee');
        $namem = request('namem');
        $degree = request('degree');

        $township_id = request('city');
        $accepted_year = request('accepted_year');
        $address = request('address');
        $email = request('email');
        $phone = request('phone');
        $dob = request('dob');
        $gender = request('gender');
        $subjects = request('subjects');
        $p1 = request('p1');
        $p1_rs = request('p1_rs');
        $p1_phone = request('p1_phone');
        $p2 = request('p2');
        $p2_rs = request('p2_rs');
        $p2_phone = request('p2_phone');
        $because = request('because');

        $township = Township::find($township_id);

        $townshipid = $township->id;
        $city = $township->city->name;


        if ($user_id) {
          // // dd('hi');
            $user = User::find($user_id);
            $user->name = $namee;
            $user->email= $email;
            $user->password=$user->password;
            $user->save();

            $student = Student::find($student_id);
            $student->namee = $namee;
            $student->namem = $namem;
            $student->email = $email;
            $student->phone = $phone;
            $student->address = $address;
            $student->degree = $degree;
            $student->city = $city;
            $student->accepted_year = $accepted_year;
            $student->dob = $dob;
            $student->gender = $gender;
            $student->p1 = $p1;
            $student->p1_phone = $p1_phone;
            $student->p1_relationship = $p1_rs;
            $student->p2 = $p2;
            $student->p2_phone = $p2_phone;
            $student->p2_relationship = $p2_rs;
            $student->because = $because;
            $student->township_id = $townshipid;
            $student->user_id = $user_id;
            $student->status=null;
            $student->save();

            $student->subjects()->detach();
            $student->subjects()->attach($subjects);

            $student->batches()->attach($batch_id,['receiveno' => $inquireno, 'status' => 'Active']);

            return 'ok';

        }
        else{
        //   $result = $this->EmailChecker->checkmail($request->email);

            // if(request('email')){
          
            $user = new User;
            $user->name = request('namee');
            $user->email=request('email');
            $user->password=Hash::make("123456789");
            $user->save();

            $user->assignRole('Student');
            $id = $user->id;


            $student = new Student;
            $student->namee = $namee;
            $student->namem = $namem;
            $student->email = $email;
            $student->phone = $phone;
            $student->address = $address;
            $student->degree = $degree;
            $student->city = $city;
            $student->accepted_year = $accepted_year;
            $student->dob = $dob;
            $student->gender = $gender;
            $student->p1 = $p1;
            $student->p1_phone = $p1_phone;
            $student->p1_relationship = $p1_rs;
            $student->p2 = $p2;
            $student->p2_phone = $p2_phone;
            $student->p2_relationship = $p2_rs;
            $student->because = $because;
            $student->township_id = $townshipid;
            $student->user_id = $user->id;
            $student->save();


            $subjects = request('subjects');

            // Save student_subject
            $student->subjects()->detach();
            $student->subjects()->attach($subjects);

            $student->batches()->attach($batch_id,['receiveno' => $inquireno, 'status' => 'Active']);

            // mail
            
            
                 $data = array('name' => $request->namee,
                          'email' => $request->email,
                          'password' => '123456789',);

                  Mail::to($request->email)->send(new SendMail($data));
                return 'confirm';
                
            //   }elseif($result == false){

            //     return "invalid";

            //   }else{

            //     return "time out error";

            //   }
            
        // Save Data

        // $user = User::firstOrNew(['email' =>  request('email'), 'name' => request('namee') ]);

        // dd($user);

        
    }
  }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
      $courseid = $request->course;

      $batchid = $request->batch;
      // dd($courseid);
      /* progressbar*/
      $course_data = Course::find($request->course);
      $batch_data = Batch::find($request->batch);
      // dd($course_data,$batch_data);
      /*progressbar*/
      $student = Student::find($id);

      $units = Unit::with(['students' => function($q) use($id)    {
              $q->where('student_id', $id);
            }]) 
              ->where('course_id',$courseid)->get();

      $students_units = Student::with(['batches' => function($q) use($batchid)    {
              $q->where('batch_id', $batchid);
            }]) 
            ->whereHas('units', function($q1) use ($courseid)
            { 
              return $q1->where('course_id',$courseid);
            })
              ->where('id',$id)
              ->get();

      $student_symbol_groups = array(); 
      $symbol_points=0;

      foreach ($students_units as $value) 
      {
        $data_one = $value->units->groupBy('pivot.unit_id');

        // echo $data_one;
        $symbol_marks = array();

        foreach ($data_one as $d_one_value) 
        {
          $unit_count = $d_one_value->count();

          $unit_point_total = $d_one_value->sum('pivot.symbol');

          $unit_point = round($unit_point_total / $unit_count);

          $symbol;
          switch ($unit_point) 
          {
                case (0 <= $unit_point &&  $unit_point <= 20):
                  $symbol = 'E';
                  break;
                case (20 <= $unit_point && $unit_point <= 40):
                  $symbol = 'D';
                  break;
                case (40 <= $unit_point && $unit_point <= 60):
                  $symbol = 'C';
                  break;
                case (60 <= $unit_point && $unit_point <= 80):
                  $symbol = 'B';
                  break;
                default:
                  $symbol = 'A';
                  break;
            }

            $points = $unit_point.'-'.$symbol;

            // $marks[] = $points;

            array_push($symbol_marks, $points);

            // echo $points;
        }


        // echo "<hr>";

        array_push($student_symbol_groups, $symbol_marks);
      }
      // dd($students_units);


      $totaldate = $this->getWorkingDays($batch_data->startdate,$batch_data->enddate);
      //dd($totaldate);
      $students_attendancepresents = Student::whereHas('batches', function($q) use ($batchid)    {
              $q->where('batch_id', $batchid);
            })->join('attendances','attendances.student_id','=','students.id')->where('attendances.student_id',$id)->where('attendances.status','=',0)
           
              ->get();

      $presentcount = count($students_attendancepresents);

      $students_attendanceabsences = Student::whereHas('batches', function($q) use ($batchid)    {
              $q->where('batch_id', $batchid);
            })->join('attendances','attendances.student_id','=','students.id')->where('attendances.student_id',$id)->where('attendances.status','=',1)
           
              ->get();
      $absencecount = count($students_attendanceabsences);
      $remaincount = $totaldate-($presentcount+$absencecount);

      return view('students.show',compact('student','batchid','students_units', 'units' ,'student_symbol_groups','course_data','batch_data','absencecount','presentcount','remaincount','courseid'));
    }

    function getWorkingDays($startDate,$endDate){
    // do strtotime calculations just once
    $endDate = strtotime($endDate);
    $startDate = strtotime($startDate);


    //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
    //We add one to inlude both dates in the interval.
    $days = ($endDate - $startDate) / 86400 + 1;

    $no_full_weeks = floor($days / 7);
    $no_remaining_days = fmod($days, 7);

    //It will return 1 if it's Monday,.. ,7 for Sunday
    $the_first_day_of_week = date("N", $startDate);
    $the_last_day_of_week = date("N", $endDate);

    //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
    //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
    if ($the_first_day_of_week <= $the_last_day_of_week) {
        if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
        if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
    }
    else {
        // (edit by Tokes to fix an edge case where the start day was a Sunday
        // and the end day was NOT a Saturday)

        // the day of the week for start is later than the day of the week for end
        if ($the_first_day_of_week == 7) {
            // if the start date is a Sunday, then we definitely subtract 1 day
            $no_remaining_days--;

            if ($the_last_day_of_week == 6) {
                // if the end date is a Saturday, then we subtract another day
                $no_remaining_days--;
            }
        }
        else {
            // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
            // so we skip an entire weekend and subtract 2 days
            $no_remaining_days -= 2;
        }

    }

    //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
//---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
   $workingDays = $no_full_weeks * 5;
    if ($no_remaining_days > 0 )
    {
      $workingDays += $no_remaining_days;
    }    


    return intval($workingDays);
}


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $batchid = $request->batch;
        $courseid = $request->course;
        $student = Student::find($id);
        $townships = Township::all();

        return view('students.edit',compact('student','townships','batchid','courseid'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      // dd($request);
        $batchid = $request->batchid;
        $courseid = $request->courseid;
        $request->validate([
          'namee' => 'required',
          'namem' => 'required',
          'email' => 'required',
          'gender' => 'required',
          'dob' => 'required',
          'phone' => 'required',
          'address' => 'required',
          'father' => 'required',
          'mother' => 'required',
        ]);
        $namee = $request->namee;
        $namem = $request->namem;
        $email = $request->email;
        $gender = $request->gender;
        $dob = $request->dob;
        $phone = $request->phone;
        $address = $request->address;
        $father = $request->father;
        $mother = $request->mother;

        if($request->hasfile('newphoto')){
          $photo = $request->file('newphoto');
          $dir = '/storage/images/students/';
          $file = time().'.'.$photo->getClientOriginalExtension();
          $photo->move(public_path().$dir,$file);
          $filepath = $dir.$file;
        }else{
          $filepath = $request->oldphoto;
        }

        $student = Student::find($id);
        $student->namee = $namee;
        $student->namem = $namem;
        $student->photo = $filepath;

        $student->email = $email;
        $student->gender = $gender;
        $student->dob = $dob;
        $student->phone = $phone;
        $student->address = $address;
        $student->p1 = $father;
        $student->p2 = $mother;
        $student->save();

        $user_id = $student->user_id;
        $user = User::find($user_id);
        $user->name = $namee;
        $user->email = $email;
        $user->save();


        return redirect('students/'.$id.'?course='.$courseid.'&batch='.$batchid);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if ($student == null) {
            Student::withTrashed()->find($id)->restore();
        }else{
            $student->delete();
        }
        // Return
        return redirect()->route('students.index');
    }

    public function resend_mail(Request $request)
    {

      $student_id = $request->student_id;
      $student = Student::find($student_id);
    
      $data = array('name' => $student->namee,
                    'email' => $student->email,
                    'password' => '123456789',
                    );
        
      Mail::to($student->email)->send(new SendMail($data));
      return 'ok';
    }


    // leave student to change status
    public function student_status_change(Request $request)
    {
      
      $request->validate([
                        'student_id' => 'required',
                        'status' => 'required',
            ]);
      $course_id = $request->course_id;
      $student_id = $request->student_id;
      $batch_id = $request->batch_id;
      $status = $request->status;
      $receive_no = $request->receive_no;
      $batch = Batch::find($batch_id);
      $pivotstatus = "Deactive( ".$status.' )';
      $student = Student::find($student_id);

      $batch->students()->updateExistingPivot($student_id,['receiveno'=>$receive_no,'status'=>$pivotstatus]);

      

        if($student->lessons){          

          foreach ($student->lessons as $student_lesson) {

            if($student_lesson->pivot->status == '0' ){

              var_dump($student->namee.'/'.$student_lesson->pivot->student_id);
              $student->lessons()->wherePivot('status','=','0')->detach();
              // $student->lessons()->newPivotStatementForId($student_id)->whereStatus('0')->delete();
              // var_dump($batch_student->lessons();
            }
          }
        }
        foreach ($batch->students as $batch_student_status) {

          foreach ($batch_student_status->responses as $response) {
                     
                 if($response->status == "Active"){
                  $response = Response::find($response->id);
                  $response->status = "Deactive";
                  $response->save();
                 
             }
          }
        }
      
      $student = Student::find($student_id);
      // $student->status = $status;
      $student->save();
      return redirect('students?course='.$course_id."&batch=".$batch_id)->with('msg','Already remove!');
    }






    public function getInquire(Request $request){
      $receiveno = $request->inputReceiveno;

      $inquire = Inquire::where('receiveno', '=', $receiveno)->first();

      return response()->json(['inquire'=>$inquire]);
    }

    public function storestudent(Request $request){
      $inquireno = request('receiveno');
      $batch_id = request('batch');

      $namee = request('namee');
      $namem = request('namem');
      $degree = request('degree');

      // dd($degree);


      $township_id = request('city');
      $accepted_year = request('accepted_year');
      $address = request('address');
      $email = request('email');
      $phone = request('phone');
      $dob = request('dob');
      $gender = request('gender');
      $subjects = request('subjects');
      $p1 = request('p1');
      $p1_rs = request('p1_rs');
      $p1_phone = request('p1_phone');
      $p2 = request('p2');
      $p2_rs = request('p2_rs');
      $p2_phone = request('p2_phone');
      $because = request('because');

      $township = Township::find($township_id);

      $townshipid = $township->id;
      $city = $township->city->name;

      $user = new User;
      $user->name = request('namee');
      $user->email=request('email');
      $user->password=Hash::make("123456789");
      $user->save();

      $user->assignRole('Student');
      $id = $user->id;


      $student = new Student;
      $student->namee = $namee;
      $student->namem = $namem;
      $student->email = $email;
      $student->phone = $phone;
      $student->address = $address;
      $student->degree = $degree;
      $student->city = $city;
      $student->accepted_year = $accepted_year;
      $student->dob = $dob;
      $student->gender = $gender;
      $student->p1 = $p1;
      $student->p1_phone = $p1_phone;
      $student->p1_relationship = $p1_rs;
      $student->p2 = $p2;
      $student->p2_phone = $p2_phone;
      $student->p2_relationship = $p2_rs;
      $student->because = $because;
      $student->township_id = $townshipid;
      $student->user_id = $id;
      $student->save();


      $subjects = request('subjects');

      // Save student_subject
      $student->subjects()->detach();
      $student->subjects()->attach($subjects);

      $student->batches()->attach($batch_id,['receiveno' => $inquireno, 'status' => 'Active']);

        return redirect()->route('students.create');

    }


    public function backend_viewscore($id)
    {
      $response = Response::find($id);
      $quizes = Quizz::all();
      return view('students.viewanswer',compact('response','quizes'));
    }
}
