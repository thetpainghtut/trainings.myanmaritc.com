<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projecttype;
use App\Batch;
use Carbon;
use Auth;
class ProjecttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $id = Auth::id();
        $role = $user->getRoleNames();
        $now = Carbon\Carbon::now();
        if($role[0] == 'Teacher'){
            $projecttypes = Projecttype::join('course_projecttype','course_projecttype.projecttype_id','=','projecttypes.id')->join('courses','courses.id','=','course_projecttype.course_id')->join('teachers','teachers.course_id','=','courses.id')->join('staff','teachers.staff_id','=','staff.id')->where('staff.user_id',$id)->select('projecttypes.*')->get();
           /*$projecttypes = Projecttype::with('courses','courses.batches','batches.teachers','batches.teachers.staff')->get();*/
          
            $batches = Batch::where('startdate','<=',$now)->where('enddate','>=',$now)->get();
            return view('projecttypes.index',compact('projecttypes','batches'));
        }elseif ($role[0] == 'Admin') {
            $projecttypes = Projecttype::all();
        
            $now = Carbon\Carbon::now();
            $batches = Batch::where('startdate','<=',$now)->where('enddate','>=',$now)->get();
           $ptypes = Projecttype::join('course_projecttype','course_projecttype.projecttype_id','=','projecttypes.id')->join('courses','courses.id','=','course_projecttype.course_id')->join('batches','batches.course_id','=','courses.id')->where('batches.startdate','<=',$now)->where('batches.enddate','>=',$now)->get();
            
            return view('projecttypes.index',compact('projecttypes','batches'));
        }else{
            $projecttypes = [];
            $batches= [];
            return view('projecttypes.index',compact('projecttypes','batches'));
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
            'projecttype' => 'required',
            'batch' => 'required'
        ]);
        $project = request('projecttype');
        $batch = request('batch');
       
        $projecttype = Projecttype::whereHas('batches',function($q) use ($project){
            $q->where('projecttype_id',$project);
        })->whereHas('batches',function($q) use ($batch){ $q->where('batch_id',$batch);})->get();
        
        if(count($projecttype) > 0){
            return redirect()->route('projecttypes.index')->with('danger','This Batch Project Type Assign is Already Taken!!');
        }else{
            $addprojecttype = Projecttype::find($project);
            $addprojecttype->batches()->attach($batch);
            return redirect()->route('projecttypes.index')->with('success','This Batch Project Type Assign is Successfully!!');
        }

       /* $projecttype->batches()->attach($batch);
        return redirect()->route('projecttypes.index');*/
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


    public function assingpttype(Request $request){
        $pid = request('pid');
        $now = Carbon\Carbon::now();
        $batch = Batch::join('courses','courses.id','=','batches.course_id')->join('course_projecttype','course_projecttype.course_id','=','courses.id')->where('course_projecttype.projecttype_id',$pid)->where('startdate','<=',$now)->where('enddate','>=',$now)->select('batches.*')->get();
        return response()->json(['batches'=>$batch]);
    }
}
