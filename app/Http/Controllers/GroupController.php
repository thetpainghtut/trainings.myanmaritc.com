<?php

namespace App\Http\Controllers;

use App\Group;
use App\Course;
use App\Batch;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $courses = Course::all();
      $batches = Batch::all();

      if (request('batch')) {
        $bid = request('batch');
        $groups = Group::where('batch_id',$bid)->get();
        
        return view('groups.index',compact('groups','courses','batches'));
      }else{
        $groups = Group::all();
        return view('groups.index',compact('groups','courses','batches'));
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
    public function edit(Group $group)
    {
        return view('groups.edit',compact('group'));
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
        $request->validate([
            "name" => 'required',
            "batch_id" => 'required',
        ]);

        $group->name = request('name');
        $group->batch_id = request('batch_id');

        $group->save();

        return redirect()->route('groups.index');
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
