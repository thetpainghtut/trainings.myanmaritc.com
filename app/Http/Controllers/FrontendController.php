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

  public function phpbootcamp_reg()
  {
    return view('frontend.phpbootcamp_reg');
  }

  public function japanitbootcamp_reg()
  {
    return view('frontend.japanitbootcamp_reg');
  }

  public function androidbootcamp_reg()
  {
    return view('frontend.androidbootcamp_reg');
  }

  public function hradmin_reg()
  {
    return view('frontend.hradmin_reg');
  }

  public function fundamental_reg()
  {
    return view('frontend.fundamental_reg');
  }

  public function python_reg()
  {
    return view('frontend.python_reg');
  }

  public function ios_reg()
  {
    return view('frontend.ios_reg');
  }

  public function japanese_reg()
  {
    return view('frontend.japanese_reg');
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
