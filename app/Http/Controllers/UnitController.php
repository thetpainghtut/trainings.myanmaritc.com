<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;
use App\Course;
use App\Staff;
use App\Teacher;
use Auth;

class UnitController extends Controller
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
        $user = Auth::user()->id;
        //dd($user);
       // $bid = request('batch');
        $staff = Staff::with('teacher')->where('user_id',$user)->get();
       
        $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();

        
        $units = array();
        foreach ($teacher as $key => $value) {
          //array_push($courses,$value->course);
          $unit = Unit::where('course_id',$value->course->id)->get();
          foreach ($unit as $k) {
              array_push($units,$k);
          }
        }
        /*dd($units);
        $units = Unit::all();
*/
        return view('unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->id;
        //dd($user);
       // $bid = request('batch');
        $staff = Staff::with('teacher')->where('user_id',$user)->get();
       
        $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();

        $courses = array();
        foreach ($teacher as $key => $value) {
          array_push($courses,$value->course);
        }
       // $courses = Course::all();
        return view('unit.create',compact('courses'));
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
            'name' => 'required|max:100',
            'course_id'=>'required',
        ]);

        $courseid = request('course_id');

        $count_course = Unit::where('course_id', $courseid)->count();

        // dd($count_course);

        if ($count_course < 6) 
        {
            $unit = new Unit;

            $unit->description = request('name');
            $unit->course_id=request('course_id');
            $unit->save();

            return redirect()->route('units.index');
        }

        else
        {
            return redirect()->route('units.index')->with('limit_message', 'You have reached the maximum number units of adds for that course.');
        }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $user = Auth::user()->id;
        //dd($user);
       // $bid = request('batch');
        $staff = Staff::with('teacher')->where('user_id',$user)->get();
       
        $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();

        $courses = array();
        foreach ($teacher as $key => $value) {
          array_push($courses,$value->course);
        }
        return view('unit.edit',compact('unit','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'name' => 'required|max:100',
            'course_id' => 'required'
        ]);

        $unit->description = request('name');
        $unit->course_id=request('course_id');
        $unit->save();

        return redirect()->route('units.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->route('units.index');
    }
}
