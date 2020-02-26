<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Course;
use App\Batch;
use App\Inquire;
use App\Student;
use App\Education;
use App\Township;

class FrontendController extends Controller
{
  public function index($value='')
  {
    return view('frontend.index');
  }
  public function csr($value='')
  {
    return view('frontend.csr');
  }

  public function courses($value='')
  {
    $courses = Course::all();
    return view('frontend.allcourses',compact('courses'));
  }
  
  public function contact($value='')
  {
    return view('frontend.contact');
  }

  public function inquire_no($value='')
  {
    return view('frontend.inputinquire');
  }

  public function studentRegister(Request $request)
  {
    $inquireno = request('inquire_no');
    $subjects = Subject::all();
    $courses = Course::all();
    $batches = Batch::all();
    $educations = Education::all();
    $townships = Township::all();
    $inquire = Inquire::where('inquireno','=',$inquireno)->first();
    $student = Student::where('inquire_no','=',$inquireno)->first();
    //dd($student);
    if($inquire==null){

      return back()->with('status','Invalid Inquire Number');

    }elseif($student){

      return back()->with('status','Sorry, student is already exit !');

    }else{

      return view('frontend.registerForm',compact('subjects','courses','batches','inquire','educations','townships','inquireno'));
    }
  }
}
