<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Student;
use App\Batch;
use App\Course;
use App\Subject;
use App\Lesson;
use App\Post;
use App\Topic;
use App\User;
class PanelController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        $studentinfo = $auth->student;

        $studentbatches = $studentinfo->batches;

    	return view('panel.dashboard',compact('studentinfo','studentbatches'));
    }

    public function takelesson($batchid){

    	$batch = Batch::find($batchid);

    	$course = $batch->course;

    	$subjects = $course->subjects;

    	return view('panel.takelesson',compact('batch','course','subjects'));

    }

    public function playcourse($batchid, $subjectid){

    	$batch = Batch::find($batchid);
    	// dd($batch);
    	$course = $batch->course;


    	$subject = Subject::find($subjectid);
        $lessons = Lesson::where('subject_id','=',$subjectid)->get();

        return view('panel.video',compact('lessons','subject', 'batch', 'course'));
    }

    public function takequiz(){
        return vieW('panel.quiz');
    }

    public function quizanswer(){
        return vieW('panel.quizanswer');
    }

    public function secret(){
        return view('panel.secret');
    }

    public function account(){
        
        return view('panel.account');
    }

    public function notification(){
        return view('panel.notification');
    }
    

    public function channel($id){

        $post = Post::whereHas('batches', function ($q) use ($id) {
  
                    $q->where('batch_id', $id);
                })->get();
        if(count($post) > 0){
        $topics = Topic::all();
        return view('panel.channel',compact('post','topics'));
        }else{
            return redirect()->back();
        }
    }

    public function allchannel(Request $request)
    {
        $id = $request->id;
        $posts =  Post::with('topic','user','user.staff')->where('topic_id',$id)->get();
       
        return response()->json(['posts'=>$posts]);
    }

    public function change_password($value='')
    {
        return view('auth/changepassword');
    }

    
}

