<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Course;
use App\Location;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();


        // $courses = Course::withTrashed()->get();
        return view('courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view('courses.create',compact('locations'));
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
            
            "name" => 'required|min:5|max:100',
            "outlines" => 'required',
            "fees" => 'required',
            "during" => 'required|max:100',
            "duration" => 'required|max:100',
            "logo" => 'required|mimes:jpeg,bmp,png',
            "location" => 'required'
        ]);


        $course = Course::orderBy('id','desc')->first();
        if($course == null)
        {
            $num = "0001";
        }
        else{
            $number = intval($course->code_no) + 1;
            $num = sprintf('%04d', $number);
        }
        
      // If exist file, upload file
      if($request->hasfile('logo')){
          $logo = $request->file('logo');
          $upload_dir = public_path().'/storage/images/courses/';
          $name = time().'.'.$logo->getClientOriginalExtension();
          $logo->move($upload_dir,$name);
          $path = '/storage/images/courses/'.$name;
      }else{
        $path = '';
      }

        // Save Data
        $course = new Course;
        $course->code_no = $num;
        $course->name = request('name');
        $course->logo = $path;
        $course->outline = request('outlines');
        $course->fees = request('fees');
        $course->during = request('during');
        $course->duration = request('duration');
        $course->location_id = request('location');

        $course->save();

        // Return
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('courses.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id); //obj
        $locations = Location::all();

        return view('courses.edit',compact('course','locations'));
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

        // Validation
        $request->validate([
            "codeno" => 'required',
            "name" => 'required|min:5|max:100',
            "outlines" => 'required',
            "fees" => 'required',
            "during" => 'required|max:100',
            "duration" => 'required|max:100',
            "location" => 'required'
        ]);

        // If exist file, upload file
        if($request->hasfile('logo')){
              $logo = $request->file('logo');
              $upload_dir = public_path().'/storage/images/courses/';
              $name = time().'.'.$logo->getClientOriginalExtension();
              $logo->move($upload_dir,$name);
              $path = '/storage/images/courses/'.$name;
        }else{
            $path = request('oldlogo');
        }
        
        // Update Data
        $course = Course::find($id);
        $course->code_no = request('codeno');
        $course->name = request('name');
        $course->logo = $path;
        $course->outline = request('outlines');
        $course->fees = request('fees');
        $course->during = request('during');
        $course->duration = request('duration');
        $course->location_id = request('location');
        
        $course->save();

        // Return
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        if ($course == null) {
            Course::withTrashed()->find($id)->restore();
        }else{
            $course->delete();
        }
        // Return
        return redirect()->route('courses.index');
    }
}
