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
use Carbon;
use App\Projecttype;
use App\Project;

use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetMail;
use Illuminate\Support\Facades\Hash;

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
        $uid = Auth::id();
        $now = Carbon\Carbon::now();
        $batch = Batch::whereHas('students',function($q) use ($uid){
            $q->where('user_id',$uid);
        })->where('startdate','<=',$now)->where('enddate','>=',$now)->get();
        $posts = array();
        foreach ($batch as $key => $value) {
            $id = $value->id;
           $posts = Post::whereHas('batches', function ($q) use($id){
  
                    $q->where('batch_id',$id);
                })->orderBy('id','desc')->get();
        }
        
        /*foreach ($posts as $k) {
            $d  = $k->batches->where('startdate','<=',$now)->where('enddate','>=',$now);
           
        }
         dd($batch);*/
        return view('panel.notification',compact('posts','batch'));
    }


    public function notiread(Request $request)
    {
        $poid = Post::find($request->poid);
        $baid = request('baid');
        $pid = $poid->id;
        $ptitle = $poid->title;
        $ptopic = $poid->topic_id;
        $puser = $poid->user_id;
        $p = $poid->batches;
        foreach ($p as $key => $value) {
            if($value->pivot->batch_id == $baid){
                $poid->unreadNotifications()->update(['read_at' => now()]);
                echo "Successful";
            }
        }
 

       // $post = (object)['id'=>$pid,'title'=>$ptitle,'topic_id'=>$ptopic,'user_id'=>$puser,'batch_id'=>$baid];
        //$post->unreadNotifications();

    }
    

    public function channel($id){

        $post = Post::whereHas('batches', function ($q) use ($id) {
  
                    $q->where('batch_id', $id);
                })->get();

        if(count($post) > 0){
        $topics = Topic::all();
        $batch = Batch::find($id);
        $ptypes = Projecttype::whereHas('batches',function($q) use ($id){
            $q->where('batch_id',$id);
        })->get();

        $projecttypes = array();
        foreach ($ptypes as $p) {
            $projecttypes = $p->doesntHave('project')->get();
        }
       
        $c = array();
        foreach ($ptypes as $key => $value) {
            $c = $value->project->students;
        }
        $e = array();
        foreach ($c as $v) {
            $e = $v->where('user_id',Auth::id())->get();
        }
        
        
        if(count($e) > 0){
            $status = 1;
        }else{
            $status = 0;
        }

        $bposts = $batch->posts;

    //dd($bposts);
        $bap = Batch::join('batch_post','batch_post.batch_id','=','batches.id')->join('posts','posts.id','=','batch_post.post_id')->join('topics','topics.id','=','posts.topic_id')->where('batches.id',$batch->id)->select('topics.id')->groupBy('topics.id')->get();
        $b = [];
        foreach ($bap as $key => $value) {
            $cc = $value->id;
            array_push($b, $cc);
        }
        $batchstudents = Student::whereHas('batches',function($q) use ($id){
            $q->where('batch_id',$id);
        })->get();

        
        return view('panel.channel',compact('post','topics','batch','projecttypes','batchstudents','status','b'));
        }else{
            return redirect()->back();
        }
    }

    public function allchannel(Request $request)
    {
        $id = $request->id;
        $bid = $request->bid;
        if($id == 0){
            $posts = Post::with('topic','user','user.staff')->whereHas('batches',function($q) use ($bid){
                $q->where('batch_id',$bid);
            })->get();

        }else{
            $posts =  Post::with('topic','user','user.staff')->where('topic_id',$id)->whereHas('batches',function($q) use ($bid){
                $q->where('batch_id',$bid);
            })->get();
        }
       
        return response()->json(['posts'=>$posts]);
    }

    public function projecttitle(Request $request)
    {
        //dd($request);
        $request->validate([
            'projtypeid' => 'required',
            'ptitle' => 'required',
            'student' => 'required'
        ]);

        $project = new Project();
        $project->title = request('ptitle');
        $project->projecttype_id = request('projtypeid');
        $project->save();

        foreach(request('student') as $stu){
            $project->students()->attach($stu);
        }

        return redirect()->back();
    }

    public function change_password($value='')
    {
        return view('auth/changepassword');
    }


    public function lesson_student(Request $request)
    {
        $lesson_id = request('lesson_id');
        $lesson = Lesson::find($lesson_id);
        $user = Auth::user();
        $student = $user->student;
        $student_id = $student->id;

        if($lesson->students->isEmpty())
        {            
            $lesson->students()->attach($student_id);            

        }else{
            
            foreach($lesson->students as $less_student)
            {
                $student_pid = $less_student->pivot->student_id;
                $lesson_pid = $less_student->pivot->lesson_id;

                if($lesson_id == $lesson_pid && $student_id == $student_pid)
                {
                    break;
                }else{

                    $lesson->students()->attach($student_id);
                }
            }
        }
        return response()->json($lesson);
    }



    public function forgetpassword()
    {
        return view('auth.forgetpassword');
    }

    public function resetpassword(Request $request)
    {
        $codeno = rand(10,999999);
        
        $data = array('email' => $request->email,'codeno'=>$codeno);

        Mail::to($request->email)->send(new ForgetMail($data));
        return redirect()->back()->with('msg','Email Sent!');
    }

    public function resetandeditpassword(Request $request)
    {
        $codeno = $request->codeno;
        $email = $request->email;
        return view('auth.resetupdatepassword',compact('codeno','email'));
    }

    public function resetupdatepassword(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8',
        ]);
        $email = $request->email;
        $password = $request->password;
        // dd($password);
        $user = User::where('email',$email)->first();
        $user->password=Hash::make($password);
        $user->save();
        return redirect()->route('login')->with('success','Password reset success!');
    }

    
}

