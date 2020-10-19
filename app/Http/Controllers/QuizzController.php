<?php

namespace App\Http\Controllers;

use App\Quizz;
use App\Subject;
use App\Course;
use Auth;
use Illuminate\Http\Request;
use App\Teacher;
use App\Staff;
class QuizzController extends Controller
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
        //$courses = Course::all();
        $user = Auth::user()->id;
        //dd($user);
       // $bid = request('batch');
        $role  = Auth::user()->getRoleNames();
        if($role[0] == 'Teacher'){
            $staff = Staff::with('teacher')->where('user_id',$user)->get();
           
            $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();

            $courses = array();
            foreach ($teacher as $key => $value) {
              array_push($courses,$value->course);
            }
            $subjects = Subject::all();
            return view('quizz.index',compact('subjects','courses'));
        }elseif($role[0] == 'Mentor'){
            $staffs = Staff::where('user_id',$user)->get();
            $courses = $staffs[0]->mentor[0]->course;
            $subjects = Subject::all();
            return view('quizz.index',compact('subjects','courses'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'subject_id' => 'required',
            'title' => 'required',
        ]);

        $subject_id = $request->subject_id;
        $title = $request->title;
        $subject = Subject::find($subject_id);
        $course = Course::find($request->course_id);

        if($request->hasfile('photo')){
            $photo = $request->file('photo');
            $dir = '/storage/images/quizz/';
            $name = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().$dir,$name);
            $filepath = $dir.$name;
        }else{
            $filepath = $subject->logo;
        }

        $quizz = new Quizz;
        $quizz->title = $title;
        $quizz->photo = $filepath;
        $quizz->subject_id = $subject_id;
        $quizz->user_id = Auth::id();
        $quizz->save();
        return 'ok';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quizz  $quizz
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $subject = Subject::find($id);
        $course = Course::find($request->course_id);
        return view('quizz.show',compact('subject','course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quizz  $quizz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quizz $quizz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quizz  $quizz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quizz $quizz)
    {
        // dd($request->subject_id);
        $request->validate([
            'subject_id' => 'required',
            'title' => 'required',
        ]);

        $subject_id = $request->subject_id;
        $title = $request->title;
        $subject = Subject::find($subject_id);

        if($request->hasfile('newphoto')){
            $newphoto = $request->file('newphoto');
            $dir = '/storage/images/quizz/';
            $name = time().'.'.$newphoto->getClientOriginalExtension();
            $newphoto->move(public_path().$dir,$name);
            $filepath = $dir.$name;
        }else{
            $filepath = $request->oldphoto;
        }

        $quizz = Quizz::find($request->id);
        $quizz->title = $title;
        $quizz->photo = $filepath;
        $quizz->subject_id = $subject_id;
        $quizz->user_id = Auth::id();
        $quizz->save();
        return "ok";
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quizz  $quizz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quizz $quizz)
    {
        //
    }


    public function assign_batchquizz(Request $request)
    {
        $quizz_id = Quizz::find($request->quizz_id);
        $batch_id = $request->batch;

        $quizz_id->batches()->attach($batch_id);
        return 'ok';
    }
}
