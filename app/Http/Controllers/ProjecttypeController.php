<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projecttype;
use App\Batch;
use Carbon;
use Auth;
use App\Staff;
use App\Teacher;

class ProjecttypeController extends Controller
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
        //
        $user = Auth::user();
        $id = Auth::id();
    
        $now = Carbon\Carbon::now();
        $staff = Staff::with('teacher')->where('user_id',$id)->get();
       
        $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();
       //dd($teacher);
       $courses  = array();

        foreach ($teacher as $k) {

            //array_push($course, $k->course);
             $projecttypes = Projecttype::join('course_projecttype','course_projecttype.projecttype_id','=','projecttypes.id')->where('course_projecttype.course_id','=',$k->course->id)->get();
           // array_push($courses, $k->course);
        }
        //dd($teacher->course);
     //dd($courses);   
           
            
       //dd($projecttypes);
       /* dd($projecttype);
        //$projecttypes = Projecttype::with('courses')->get();
        foreach ($projecttypes as $key => $value) {
            dd($value->courses);
        }*/
       /*$projecttypes = Projecttype::with('courses','courses.batches','batches.teachers','batches.teachers.staff')->get();*/
      
        $batches = Batch::where('startdate','<=',$now)->where('enddate','>=',$now)->get();
        $userid = $id;
        return view('projecttypes.index',compact('projecttypes','batches','userid'));
        
        

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
        //dd($request);
        //
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
        $id = request('userid');
        //dd($pid);
        $staff = Staff::with('teacher')->where('user_id',$id)->get();
       
        $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();
        
        $now = Carbon\Carbon::now();
        $batches = array();
        foreach($teacher as $c){

        $batch = Batch::where('course_id',$c->course->id)->get();
        
        foreach($batch as $b){
        array_push($batches,$b);
    }
    }
  // dd($batches);
    //dd($batches[0]->title);
        return response()->json(['batches'=>$batches]);
    }
}
