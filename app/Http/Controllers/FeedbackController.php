<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Batch;
use App\Feedback;
use Auth;
use App\Teacher;
use App\Staff;

class FeedbackController extends Controller
{
    public function __construct(){
        $this->middleware(['role:Admin|Mentor|Teacher']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //
        $user = Auth::user();
      $role = $user->getRoleNames();
      if($role[0] == 'Admin'){
        $courses = Course::all();
        if(request('batch')){
            $batch = request('batch');
            $feedbacks = Feedback::where('batch_id',$batch)->get();
           
            return view('feedbacks.index',compact('courses','feedbacks','batch'));
        }else{
            return view('feedbacks.index',compact('courses'));
        }
    }elseif($role[0] == 'Teacher'){
        $userid = $user->id;
        $batchid = 0;
        $courseid = 0;
        $batches = Batch::all();
        $staff = Staff::with('teacher')->where('user_id',$userid)->get();
       
        $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();

        $courses = array();
        foreach ($teacher as $key => $value) {
          array_push($courses,$value->course);
        }

        if(request('batch')){
            $batch = request('batch');
            $feedbacks = Feedback::where('batch_id',$batch)->get();
           
            return view('feedbacks.index',compact('courses','feedbacks','batch'));
        }else{
            return view('feedbacks.index',compact('courses'));
        }
    }elseif($role[0]=='Mentor'){
        $staffs = Staff::where('user_id',$user->id)->get();
        $courses = $staffs[0]->mentor[0]->course;
        $batchid = 0;
        $courseid = 0;
        $batches = Batch::all();
        if(request('batch')){
            $batch = request('batch');
            $feedbacks = Feedback::where('batch_id',$batch)->get();
           
            return view('feedbacks.index',compact('courses','feedbacks','batch'));
        }else{
            return view('feedbacks.index',compact('courses'));
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
        /*$feeds = Feedback::where('batch_id',$id)->get();
        if(count($feeds) > 0){
            $batch = Batch::find($id);
            return view('feedbacks.show',compact('feeds','batch'));
        }else{
            return redirect()->back();
        }*/
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
        //
    }
}
