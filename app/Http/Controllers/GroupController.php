<?php

namespace App\Http\Controllers;

use App\Group;
use App\Course;
use App\Batch;
use Illuminate\Http\Request;
use App\Student;
use App\Http\Resources\BatchStudentResource;
use Auth;
use App\Teacher;
use App\Staff;
class GroupController extends Controller
{
    public function __construct(){
        $this->middleware(['role:Admin|Mentor|Teacher'],['only' => ['index','show','edit','update','destroy']]); 
        $this->middleware(['role:Mentor|Teacher'],['only' => ['store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
      $user = Auth::user();
      $role = $user->getRoleNames();
      if($role[0] == 'Admin'){
        $courses = Course::all();
      $batches = Batch::all();

      $batchid = 0;
      $courseid = 0;
      if (request('batch')) {
        $bid = request('batch');
        $cid = request('course');
        $groups = Group::where('batch_id',$bid)->get();

        $courseid = $cid;
        $batchid = $bid;
        
        return view('groups.index',compact('groups','courses','batches', 'batchid','courseid'));
      }else{
        $groups = Group::all();
        return view('groups.index',compact('groups','courses','batches','batchid','courseid'));
      }
  }else{
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
            $bid = request('batch');
        $cid = request('course');
        $groups = Group::where('batch_id',$bid)->get();

        $courseid = $cid;
        $batchid = $bid;
        return view('groups.index',compact('groups','courses','batches', 'batchid','courseid'));
        }else{
            $groups = Group::all();
        return view('groups.index',compact('groups','courses','batches','batchid','courseid'));
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
        $request->validate([
            "course" => 'required',
            "batch" => 'required',
            "name" => 'required|max:100',
            "members" => 'required'
        ]);

        $group = new Group;

        // dd(request('members'));

        $group->name = request('name');
        $group->batch_id = request('batch');
        $group->save();

        $group->students()->attach(request('members'));

        return back()->with('status',$group->name." Group created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('groups.show',compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group,Request $request)
    {   
        $batchid = $request->batch_data_id;
        $courseid = $request->course_data_id;
        $batch_data = Batch::find($request->batch_data_id);
        return view('groups.edit',compact('group','batch_data','batchid','courseid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        // dd($request);
        $batchid = $request->batch_data_id;
        $courseid = $request->course_data_id;
        $request->validate([
            "name" => 'required',
            "batch_id" => 'required',
        ]);

        $group->name = request('name');
        $group->batch_id = request('batch_id');
        $members = $request->members;
        $group->save();
        $group->students()->detach();
        $group->students()->attach($members);

        return redirect('groups?course='.$courseid.'&batch='.$batchid)->with('msg','Successfully Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->students()->detach();

        $group->delete();
        return redirect()->route('groups.index');
    }
}