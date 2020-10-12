<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Batch;
use App\Course;
use App\User;
use App\Teacher;
use App\Mentor;
use Carbon\Carbon;
use App\Inquire;
use App\Location;

use Spatie\Permission\Models\Role;
use Auth;
use App\Staff;
class BatchController extends Controller
{
    public function __construct(){
        $this->middleware(['role:Admin|Teacher|Business Development'])->except('getBatchesByCourse','getBatchByCourse');
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
        
            $batches = Batch::orderBy('startdate','asc')->get();
            // dd($batches);
            return view('batches.index',compact('batches'));
        }elseif($role[0] == 'Business Development'){
          $batches = Batch::orderBy('startdate','asc')->get();
            // dd($batches);
            return view('batches.index',compact('batches'));
        }
        elseif($role[0] == 'Teacher'){
            $userid = $user->id;
            $staff = Staff::with('teacher')->where('user_id',$userid)->get();
       
            $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();

            $batches=array();
            foreach ($teacher as $key => $value) {
                
              $batch=Batch::where('course_id',$value->course->id)->orderBy('startdate','asc')->get();
              foreach ($batch as $key => $value) {
                 array_push($batches, $value);
              }
            }
            
           //dd($batches);
            return view('batches.index',compact('batches'));
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $role = $user->getRoleNames();
        if($role[0] == 'Admin'){
            $courses = Course::all();
            $locations = Location::all();

            $users=User::role('Teacher')->get();
            // dd($users);
            return view('batches.create',compact('courses','users','locations'));
        }elseif ($role[0] == 'Business Development') {
          $courses = Course::all();
            $locations = Location::all();

            $users=User::role('Teacher')->get();
            // dd($users);
            return view('batches.create',compact('courses','users','locations'));
        }
        elseif($role[0] == 'Teacher'){
            $userid = $user->id;
            $staff = Staff::with('teacher')->where('user_id',$userid)->get();
       
            $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();

            $courses=array();
            foreach ($teacher as $key => $value) {
                array_push($courses, $value->course);
            }
            $locations = Location::all();

            $users=User::role('Teacher')->get();
            return view('batches.create',compact('courses','users','locations'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            "title" => 'required|max:100',
            "startdate" => 'required',
            "enddate" => 'required',
            "time" => 'required|max:100',
            "course" => 'required',
            "teachers"=> 'sometimes|required',
            "mentors" => 'sometimes|required',
            'location'  =>  'required'
        ]);

        $batch = new Batch;
        $batch->title = request('title');
        $batch->type = request('type');
        $batch->startdate = request('startdate');
        $batch->enddate = request('enddate');
        $batch->time = request('time');
        $batch->course_id = request('course');
        $batch->location_id = request('location');
        $batch->save();

        $teachers = request('teachers');
        $mentors = request('mentors');
        $batch->teachers()->attach($teachers);
        $batch->mentors()->attach($mentors);

        $subject_id = 1;
        $batch->subjects()->attach($subject_id);


        // for($i=0; $i < count($teachers); $i++)
        // {
        //     // dd();

        //     for ($j=0; $j < count($mentors) ; $j++) 
        //     { 

        //         $batch->teachers()->attach($teachers[$i], ['mentor_id' => $mentors[$j]]);
        //     }

            
        // }
       

        
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
        // dd($id)
        
        $batch = Batch::with('teachers')->with('mentors')->find($id);
        
        return view('batches.show',compact('batch'));
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $batch = Batch::with('teachers')->with('mentors')->find($id);
        $course_id=$batch->course_id;
        $courses = Course::where('id',$course_id)->get();
        $teachers = Teacher::where('course_id',$course_id)->get();
        $mentors = Mentor::where('course_id',$course_id)->get();
        $location = $batch->location;

        // dd($teachers);
        return view('batches.edit',compact('courses','batch','teachers','mentors','location'));
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
        // dd($request);
        $request->validate([
            "title" => 'required|max:100',
            "startdate" => 'required',
            "enddate" => 'required',
            "time" => 'required|max:100',
            "course" => 'required'
        ]);

        $batch = Batch::find($id);
        $batch->title = request('title');
        $batch->type = request('type');
        $batch->startdate = request('startdate');
        $batch->enddate = request('enddate');
        $batch->time = request('time');
        $batch->course_id = request('course');
        $batch->location_id = request('location');

        $batch->save();

        $teachers = request('teachers');
        $mentors = request('mentors');

        // detach to pivot
        $batch->teachers()->detach();
        $batch->mentors()->detach();

        // attach to pivot
        $batch->teachers()->attach($teachers);
        $batch->mentors()->attach($mentors);

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

    public function getBatchByCourse(Request $request)
    {
      $now = Carbon::now();
      $cid = request('id');
      $batches = Batch::where('course_id',$cid)->where('startdate','<=',$now)->where('enddate','>=',$now)->get();

      return $batches;
    }
}