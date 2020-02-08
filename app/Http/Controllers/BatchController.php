<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Batch;
use App\Course;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::all();
        return view('batches.index',compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('batches.create',compact('courses'));
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
            "title" => 'required|max:100',
            "startdate" => 'required',
            "enddate" => 'required',
            "time" => 'required|max:100',
            "course" => 'required'
        ]);

        $batch = new Batch;
        $batch->title = request('title');
        $batch->startdate = request('startdate');
        $batch->enddate = request('enddate');
        $batch->time = request('time');
        $batch->course_id = request('course');
        $batch->save();

        return redirect()->route('batches.index');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $batch = Batch::find($id);
        $courses = Course::all();
        return view('batches.edit',compact('courses','batch'));
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
        $request->validate([
            "title" => 'required|max:100',
            "startdate" => 'required',
            "enddate" => 'required',
            "time" => 'required|max:100',
            "course" => 'required'
        ]);

        $batch = Batch::find($id);
        $batch->title = request('title');
        $batch->startdate = request('startdate');
        $batch->enddate = request('enddate');
        $batch->time = request('time');
        $batch->course_id = request('course');
        $batch->save();

        return redirect()->route('batches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batch = Batch::find($id);
        $batch->delete();

        return redirect()->route('batches.index');
    }

    public function getBatchesByCourse(Request $request)
    {
        // dd($request);
        $cid = request('id');
        $batches = Batch::where('course_id',$cid)->get();
        return $batches;
    }
}