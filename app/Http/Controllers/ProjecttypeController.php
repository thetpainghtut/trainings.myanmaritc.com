<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projecttype;
use App\Batch;
use Carbon;
class ProjecttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projecttypes = Projecttype::all();
        /*$ptypes = Projecttype::join('course_projecttype','course_projecttype.projecttype_id','=','projecttypes.id')->join('courses','courses.id','=','course_projecttype.course_id')->join('batches','batches.course_id','=','courses.id')->get();
        dd($ptypes);*/
        $now = Carbon\Carbon::now();
         $batches = Batch::where('startdate','<=',$now)->where('enddate','>=',$now)->get();
        return view('projecttypes.index',compact('projecttypes','batches'));
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
        $project = request('projecttype');
        $batch = request('batch');
        $projecttype = Projecttype::find($project);
        $projecttype->batches->attach($batch);
        return redirect()->route('projecttypes.index');
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
