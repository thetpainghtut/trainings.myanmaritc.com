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
use App\Journal;


class FrontendController extends Controller
{
  public function index($value='')
  {
    return view('frontend.index');
  }

  public function csr($value='')
  {
    $activities = Journal::where('type','=','Activity')
                ->orderBy('created_at', 'DESC')
                ->take(3)
                ->get();
    $sharings = Journal::where('type','=','Sharing')
                ->orderBy('created_at', 'DESC')
                ->take(4)
                ->get();

    return view('frontend.csr', compact('activities','sharings'));
  }

  public function blogs(){
    $blogs = Journal::where('type','=','Sharing')
                ->orderBy('created_at', 'DESC')
                ->paginate(6);
    return view('frontend.blogs',compact('blogs'));
  }

  public function blog_detail($id){
    $blog = Journal::find($id);
    return view('frontend.blogdetail',compact('blog'));
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

  public function course_detail($id)
  {
    $course=Course::find($id);
    return view('frontend.course_detail',compact('course'));
  }

  public function course_detail_bycodeno($codeno)
  {
    
    $course=Course::where('code_no',$codeno)->first();
    // dd($course);
    return view('frontend.course_detail',compact('course'));
  }

  public function studentRegister(Request $request)
  {
    $inquireno = request('inquire_no');
    $subjects = Subject::all(); // all subjects
    $courses = Course::all();
    $batches = Batch::all();
    $educations = Education::all();
    $townships = Township::all();
    $inquire = Inquire::where('receiveno','=',$inquireno)->first();
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
