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
use Rabbit;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
   /* public function __construct($value='')
    {
        $this->middleware('role:Admin')->except('store','search_inquire');
    }*/
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      // dd($request);
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
          // dd('hello');
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

            // mail

            $data = array('name' => $request->namee,
                          'email' => $request->email,
                          'password' => '123456789',);

            Mail::to($request->email)->send(new SendMail($data));



            return 'confirm';
        }
        // Save Data

        // $user = User::firstOrNew(['email' =>  request('email'), 'name' => request('namee') ]);

        // dd($user);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $student = Student::find($id);
      return view('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

        $student = Student::find($id);
        $townships = Township::all();
        return view('students.edit',compact('student','townships'));
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
        $course_id = $request->course_id;
        $batch_id = $request->batch_id;

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
        return redirect('students?course='.$course_id.'.&batch='.$batch_id)->with('msg','Successfully Update!');
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

    public function student_status_change(Request $request)
    {
      // dd($request);
      $request->validate([
                        'student_id' => 'required',
                        'status' => 'required',
            ]);
      $student_id = $request->student_id;
      $batch_id = $request->batch_id;
      $status = $request->status;
      $receive_no = $request->receive_no;
      $batch = Batch::find($batch_id);
      $pivotstatus = "Deactive( ".$status.' )';

      $batch->students()->updateExistingPivot($student_id,['receiveno'=>$receive_no,'status'=>$pivotstatus]);
      foreach ($batch->students as $batch_student) {
        if($batch_student->lessons){
          foreach ($batch_student->lessons as $student_lesson) {
            if($student_lesson->pivot->status == 0){
              $batch_student->lessons()->newPivotStatement()->where('status',0)->delete();
              // var_dump($batch_student->lessons();
            }
          }
        }
      }
     // dd($/data);
      $student = Student::find($student_id);
      // $student->status = $status;
      $student->save();
      return response()->json('student');
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
}
