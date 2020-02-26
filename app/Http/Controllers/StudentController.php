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
      $courses = Course::all();
      $batches = Batch::all();

      $bid = 0;

      if (request('batch')) {
        $bid = request('batch');
        $groups = Group::where('batch_id',$bid)->get();
        $students = Student::where('batch_id',$bid)->get();

        return view('students.index',compact('students','courses','batches','groups','bid'));
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

      return view('students.create',compact('subjects','courses','batches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request)

      // Validation
      $request->validate([
        "namee" => 'required|min:5|max:191',
        "namem" => 'required|min:5|max:191',
        "education" => 'required',
        "city" => 'required',
        "accepted_year" => 'required',
        "address" => 'required',
        "email" => 'unique:students',
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

      // Save Data
      $student = new Student;
      $student->inquire_no =request('inquireno');
      $student->namee = request('namee');
      $student->namem = request('namem');
      $student->email = request('email');
      $student->phone = request('phone');
      $student->address = request('address');
      $student->education_id = request('education');
      $student->city = request('city');
      $student->accepted_year = request('accepted_year');
      $student->dob = request('dob');
      $student->gender = request('gender');
      $student->batch_id = request('batch_id');
      $student->p1 = request('p1');
      $student->p1_phone = request('p1_phone');
      $student->p1_relationship = request('p1_rs');
      $student->p2 = request('p2');
      $student->p2_phone = request('p2_phone');
      $student->p2_relationship = request('p2_rs');
      $student->because = request('because');
      
      $student->save();

      $subjects = request('subjects');
      // Save student_subject
      $student->subjects()->attach($subjects);

      // return
      //return redirect()->route('frontend.index');

     return redirect()->route('frontend.index')->with('status', 'Register Successfully'); 
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
    public function edit($id)
    {
        //
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
        //
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

  
}
