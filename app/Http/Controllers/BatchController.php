<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Batch;
use App\Course;
use App\User;
use App\Teacher;
use App\Mentor;
use Spatie\Permission\Models\Role;

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
        // dd($batches);
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
        $users=User::role('Teacher')->get();
        // dd($users);
        return view('batches.create',compact('courses','users'));
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
            "mentors" => 'sometimes|required'
        ]);

        $batch = new Batch;
        $batch->title = request('title');
        $batch->startdate = request('startdate');
        $batch->enddate = request('enddate');
        $batch->time = request('time');
        $batch->course_id = request('course');
        $batch->save();

        $teachers = request('teachers');
        $mentors = request('mentors');
        $batch->teachers()->attach($teachers);
        $batch->mentors()->attach($mentors);


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
        // dd($id);
        $batches = Batch::with('teachers')->with('mentors')->find($id);
       // dd($batches->mentors);
        return view('batches.show',compact('batches'));
        

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
        $courses = Course::all();
        $teachers = Teacher::where('course_id',$course_id)->get();
        $mentors = Mentor::where('course_id',$course_id)->get();
        // dd($teachers);
        return view('batches.edit',compact('courses','batch','teachers','mentors'));
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
        $batch->startdate = request('startdate');
        $batch->enddate = request('enddate');
        $batch->time = request('time');
        $batch->course_id = request('course');
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
       // dd($batches);
        return $batches;
    }
}