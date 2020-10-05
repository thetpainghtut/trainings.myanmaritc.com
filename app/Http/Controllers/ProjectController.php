<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Course;
use App\Batch;
use App\Projecttype;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::all();
        return view('projects.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $b = $request->pb;
        $p = $request->pbd;
        $batch = Batch::find($b);
        
        return view('projects.create',compact('batch','p'));
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
        $request->validate([
            'prjid' => 'required',
            'batch' => 'required',
            'title' => 'required',
            'student' => 'required'
        ]);

        $project = new Project;
        $project->title = request('title');
        $project->projecttype_id = request('prjid');
        $project->save();

        foreach(request('student') as $stu){
            $project->students()->attach($stu);
        }

        return redirect()->route('projectshow',['bid'=>request('batch'),'pjid'=>request('prjid')]);
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

    public function projectshow($bid,$pjid)
    {
        $batch = Batch::find($bid);

        return view('projects.show',compact('batch','pjid'));
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
    public function projectedit($b,$pj){
        $batch = Batch::find($b);
        $prj = Project::find($pj);
        
        return view('projects.edit',compact('batch','prj'));
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
