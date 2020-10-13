<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use App\Course;
use App\Teacher;
use App\Staff;
use Auth;
class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Teacher']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;

        $staff = Staff::with('teacher')->where('user_id',$user)->get();
       
        $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();

        $courses = array();
        foreach ($teacher as $key => $value) {
          array_push($courses,$value->course);
         
        }
       // $courses = Course::all();
         $course = Course::findOrFail($courses[0]->id);
        $subjects = $course->subjects()
            // ->wherePivot('course_id', '<', '2017-10-10')
            ->get();

        return view('subjects.index',compact('subjects','courses'));
    }

    public function subject_course(Request $request)
    {
        $course_id = request('course_id');
        // $staff = Role::where('name',$staff_role);
        $course = Course::findOrFail($course_id);
        $subjects = $course->subjects()
            // ->wherePivot('course_id', '<', '2017-10-10')
            ->get();
        return $subjects;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       // $courses = Course::all();
        $user = Auth::user()->id;

        $staff = Staff::with('teacher')->where('user_id',$user)->get();
       
        $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();

        $courses = array();
        foreach ($teacher as $key => $value) {
          array_push($courses,$value->course);
        }
        return view('subjects.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'courses'=>'required',
            "logo" => 'required|mimes:jpeg,bmp,png'
        ]);

        if($request->hasfile('logo')){
            $logo = $request->file('logo');
            $upload_dir = public_path().'/storage/images/subjects/';
            $name = time().'.'.$logo->getClientOriginalExtension();
            $logo->move($upload_dir,$name);
            $path = '/storage/images/subjects/'.$name;
        }else{
            $path = '';
        }

        $subject = new Subject;
        $subject->name = request('name');
        $subject->logo = $path;
        $subject->save();

        $subject->courses()->attach(request('courses'));

        return redirect()->route('subjects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {   
        //$courses=Course::all();
        $user = Auth::user()->id;

        $staff = Staff::with('teacher')->where('user_id',$user)->get();
       
        $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();

        $courses = array();
        foreach ($teacher as $key => $value) {
          array_push($courses,$value->course);
        }
        return view('subjects.edit',compact('subject','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|max:100',
            'courses' => 'required'
        ]);

        if($request->hasfile('logo')){
              $logo = $request->file('logo');
              $upload_dir = public_path().'/storage/images/subjects/';
              $name = time().'.'.$logo->getClientOriginalExtension();
              $logo->move($upload_dir,$name);
              $path = '/storage/images/subjects/'.$name;
        }else{
            $path = request('oldlogo');
        }

        $subject->name = request('name');
        $subject->logo = $path;
        $subject->save();

        $subject->courses()->detach();
        $subject->courses()->attach(request('courses'));

        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);

        $subject->courses()->detach();
        
        $subject->delete();

        return redirect()->route('subjects.index');
    }
}
