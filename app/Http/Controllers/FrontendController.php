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
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Response;
use App\Http\Resources\StudentResource;
use App\Lesson;

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
    $oldemail = request('old_email');

    $user = User::role('Student')
            ->where('email', '=', $oldemail)->first();

    $subjects = Subject::all(); // all subjects
    $courses = Course::all();
    $batches = Batch::all();
    $educations = Education::all();
    $townships = Township::all();
    $inquire = Inquire::where('receiveno','=',$inquireno)->first();

    if($inquire==null){

      return back()->with('status','Invalid Inquire Number');

    }
    else{

      $batchid = $inquire->batch_id;

      $batch = Batch::find($batchid);
      // dd($batch);

      $oldstudent = $batch->students()->where('receiveno', $inquireno)->get();
      // dd($oldstudent);
      if(count($oldstudent) > 0 ){

        return back()->with('status','Sorry, student is already exit in that receive number!');
      }
      else{

        return view('frontend.registerForm',compact('subjects','courses','batches','inquire','educations','townships','inquireno','user'));
      }
    }
  }

  public function oldstduent(Request $request){
    $inputEmail = $request->inputEmail;
    // $roles=Role::where('name','!=','Student')->get();
    $user = User::role('Student')
            ->where('email', '=', $inputEmail)->first();

    return response()->json(['user'=>$user]);

  }

  public function update_password(Request $request)
  {
    // dd($request);
    $request->validate([
      'email' => 'required',
      'changepassword' => 'required|confirmed|min:8',
      'changepassword_confirmation' => 'required',
      'currentpassword' => 'required',
    ]);
    $email = $request->email;
    $changepassword = $request->changepassword;
    $confirmpassword = $request->confirmpassword;
    $currentpassword = $request->currentpassword;

    $user = User::where('email',$email)->first();

    if(Hash::check($currentpassword,$user->password)){
        $user->password = Hash::make($changepassword);
        $user->save();

        return redirect()->route('login')->with('success','Successfully change Password!');
    }else{
      return back()->with('msg','You password and email does not match in our record.
        And fill again');
    }

  }


  public function student_profile_update(Request $request)
  {
    // dd($request);
      $request->validate([
                        'name'=>'required',
                        'phone' => 'required',
                        'email' => 'required',
                        'address' => 'required',
                      ]);

      if($request->hasfile('logo'))
      {
          $hasphoto = $request->file('logo');
          $name = time().'.'.$hasphoto->getClientOriginalExtension();
          $dir = '/storage/images/students/';
          
          $hasphoto->move(public_path().$dir,$name);
          $file_path = $dir.$name;

      }else{
        $file_path = $request->oldlogo;
      }
      $user_id = Auth::id();
      $user = User::find($user_id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->save();

      $student = Student::where('user_id',$user_id)->first();
      $student->namee = $request->name;
      $student->email = $request->email;
      $student->photo = $file_path;
      $student->address = $request->address;
      $student->dob = $request->dob;
      $student->save();

      return redirect()->route('frontend.account')->with('msg','Successfullly Update your profile');

  }



  public function secret_password_change(Request $request)
  {
    $request->validate([
      'changepassword' => 'required|confirmed|min:8',
      'changepassword_confirmation' => 'required',
      'currentpassword' => 'required',
    ]);

    $user = Auth::user();
    $changepassword = $request->changepassword;
    $changepassword_confirmation = $request->changepassword_confirmation;
    $currentpassword = $request->currentpassword;

    if(Hash::check($currentpassword,$user->password)){
      $user->password = Hash::make($changepassword);
      $user->save();
      return back()->with('msg','Successfully change password');
    }else{
      return back()->with('error','Current password does not match in our records!');
    }
  }

  public function share_count(Request $request)
  {
    $id = request('journal_id');
    $journal = Journal::find($id);
    $journal->count = ++$journal->count;
    $journal->save();

    return $journal;
  }
}