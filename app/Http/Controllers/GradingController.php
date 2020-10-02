<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Unit;
use App\Course;
use App\City;
use App\Batch;

use Barryvdh\DomPDF\Facade as PDF;

class GradingController extends Controller
{
  public function pdf($id)
  {
    $student = Student::findOrFail($id);
    $pdf = PDF::loadView('pdf.grading', compact('student'));
    return $pdf->stream();
  }

  public function form($id)
  {
      $student = Student::findOrFail($id);
      foreach ($student->batches as $value) {
        if ($value->pivot->status=="Active") {
          $units = Unit::where('course_id', $value->course_id)->get();
        }
      };
     
      
      return view('grading.form',compact('student','units'));
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $cities = City::all();
      $courses = Course::all();
      return view('grading.course',compact('cities', 'courses'));
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
      $requeststudent = request('student_id');
      $student = Student::find($requeststudent);
      foreach ($student->batches as $value) {
        if ($value->pivot->status=="Active") {
          $units = Unit::where('course_id', $value->course_id)->get();
        }
      };
      // $units = Unit::where('course_id', $student->batch->course['id'])->get();

      // $units = Unit::all();
      foreach ($units as $row) {
        $request->validate([
          "unit".$row->id => 'required',
          "student_id" => 'required',
        ]);
      }

      $student = Student::findOrFail(request('student_id'));

      foreach ($units as $row) {
        $mark = request('unit'.$row->id);
        $symbol;
        switch ($mark) {
          case (0 <= $mark &&  $mark <= 20):
            $symbol = 'E';
            break;
          case (20 <= $mark && $mark <= 40):
            $symbol = 'D';
            break;
          case (40 <= $mark && $mark <= 60):
            $symbol = 'C';
            break;
          case (60 <= $mark && $mark <= 80):
            $symbol = 'B';
            break;
          default:
            $symbol = 'A';
            break;
        }
        $student->units()->attach($row->id,['symbol' => $mark]);
      }

      return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $course = Course::find($id);
      $coursename = $course->name;
      // dd($coursename);
      $batches = Batch::where('course_id',$id)->get();
      return view('grading.batch',compact('batches', 'coursename'));

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
