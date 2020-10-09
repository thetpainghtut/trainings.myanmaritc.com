<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Course;
use App\Batch;
use App\Projecttype;
use App\Student;
use Auth;
use App\Staff;
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
        $user = Auth::user();
        $role = $user->getRoleNames();
        if($role[0] == 'Admin'){
            $courses = Course::all();
            return view('projects.index',compact('courses'));
        }elseif ($role[0] == 'Teacher') {
           $teacher = Staff::with('teacher')->where('user_id','=',$user->id)->get();
           $c = array();

           foreach($teacher as $t){
            array_push($c, $t->teacher);
           }
           $courses = array();
           foreach($c as $e){
            foreach($e as $d){
                array_push($courses,$d->course);
            }
           }

           return view('projects.index',compact('courses'));
        }
        
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
        $projecttype = Projecttype::find($p);
        $projecttypes = Project::where('projecttype_id',$p)->get();
        $data= array();
        foreach($projecttypes as $proj)
        {
            array_push($data,$proj->students);
        }

        if(count($data)>0){
        foreach ($data as $stub) {
            foreach ($stub as $key => $value) {
               $student[] = $value->id;
            }
           // $student[] = $stub[0]->id;
        }
       // dd($student);
       // dd($projecttypes);
        
        $studen = Student::whereNotIn('id',$student)->get();
    }else{
        $studen = Student::all();
    }
        //dd($studen);
        return view('projects.create',compact('batch','p','projecttypes','studen'));
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
        $project = Project::where('projecttype_id',$pjid)->get();
        $projecttype = Projecttype::find($pjid);
        return view('projects.show',compact('batch','pjid','project','projecttype'));
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
        $student = $prj->students;
        
        return view('projects.edit',compact('batch','prj','student'));
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
        $request->validate([
            'prjid' => 'required',
            'batch' => 'required',
            'title' => 'required',
            'student' => 'required',
        ]);

        $link = request('link');
        $award = request('award');

        $project = Project::find($id);
        $project->title = request('title');
        $project->projecttype_id = request('prjid');
        if($link){
            $request->validate([
                'link' => 'sometimes|active_url',
            ]);
            $project->link = $link;
        }
        if($award != null){
            $request->validate([
                'award' => 'required'
            ]);
            $project->status = $award;
        }
        //dd($project->students);
          $project->save();

        
        //dd($c);
           $project->students()->detach();
        foreach(request('student') as $stu){
           
            $project->students()->attach($stu);
        }

        return redirect()->route('projectshow',['bid'=>request('batch'),'pjid'=>request('prjid')]);
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
