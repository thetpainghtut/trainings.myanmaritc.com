<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Course;
use App\Batch;
use App\Inquire;
use App\Education;
use App\Township;

class FrontendController extends Controller
{
  public function index($value='')
  {
    return view('frontend.index');
  }

  public function studentRegister(Request $request)
  {
    //dd($request);
    $inquireno = request('inquire_no');
    $subjects = Subject::all();
    $courses = Course::all();
    $batches = Batch::all();
    $educations = Education::all();
    $townships = Township::all();
    $inquire = Inquire::where('inquireno','=',$inquireno)->first();
    // dd($inquire);
    return view('frontend.registerForm',compact('subjects','courses','batches','inquire','educations','townships','inquireno'));
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
}
