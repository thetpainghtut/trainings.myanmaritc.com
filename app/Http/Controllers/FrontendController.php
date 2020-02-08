<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Course;

class FrontendController extends Controller
{
  public function index($value='')
  {
    return view('frontend.index');
  }

  public function studentRegister($value='')
  {
    $subjects = Subject::all();
    return view('frontend.registerForm',compact('subjects'));
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
