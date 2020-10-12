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
use App\Feedback;
use App\Question;
use App\Quizz;
use App\Response;
use App\Responsedetail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetMail;
use Illuminate\Support\Facades\Hash;

class PanelController extends Controller
{

    public function __construct($value='')
    {
        $this->middleware('auth')->except('forgetpassword','resetpassword','resetandeditpassword','resetupdatepassword','change_password');
        $this->middleware('role:Student')->except('forgetpassword','resetpassword','resetandeditpassword','resetupdatepassword','change_password');
    }
 

    public function index()
    {        
        
        $auth = Auth::user();
        $studentinfo = $auth->student;

        $studentbatches = $studentinfo->batches;

        return view('panel.dashboard',compact('studentinfo','studentbatches'));
              
        
       
    }

    public function takelesson($batchid){

        $user = Auth::user();
        $student = $user->student;
        $student_batches = $student->batches;
        $variable=0;
        /*change student batch condition*/
        foreach($student_batches as $student_batch){
            if($student_batch->id == $batchid){
                $variable =1;
            }
        }
        if($variable == 1){

        	$batch = Batch::find($batchid);

        	$course = $batch->course;

        	$subjects = $course->subjects;

        	return view('panel.takelesson',compact('batch','course','subjects'));
        }else{
            return back();
        }

    }

    public function playcourse($batchid, $subjectid){

        $user = Auth::user();
        $student = $user->student;
        $student_batches = $student->batches;
        $variable=0;
        /*change student batch condition*/
        
        foreach($student_batches as $student_batch){
            if($student_batch->id == $batchid){
                $variable =1;
            }
        }
        if($variable == 1){
            $batch = Batch::find($batchid);
            // dd($batch);
            $course = $batch->course;


            $subject = Subject::find($subjectid);
            $lessons = Lesson::where('subject_id','=',$subjectid)->orderBy('sorting', 'asc')->get();
            /*change order by sorting*/
            return view('panel.video',compact('lessons','subject', 'batch', 'course'));
        }else{
            return back();
        }
    	
    }

    public function takequiz(){
        return vieW('panel.quiz');
    }

    public function quizanswer($id,Request $request){
        $channel = $request->channel;
        $quiz = Quizz::find($id);
        $student_id = Auth::user()->student->id;
        $questions = Question::where('quiz_id',$id)->get();
        $responses = Response::where('quiz_id',$id)->where('student_id',$student_id)->first();
        $responsedetail = Responsedetail::where('response_id',$responses->id)->get();
        return vieW('panel.quizanswer', compact('quiz','questions','responses','responsedetail','channel'));
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
        /*foreach ($p as $key => $value) {
            if($value->pivot->batch_id == $baid){
                foreach ($poid->unreadNotifications as $s) {
                   dd($s);
                }
            }
        }*/
        foreach ($poid->unreadNotifications as $s) {
           if($s->data['batch_id'] == $baid){
            $poid->unreadNotifications()->update(['read_at' => now()]);
                echo "Successful";
           }
        }
 

       // $post = (object)['id'=>$pid,'title'=>$ptitle,'topic_id'=>$ptopic,'user_id'=>$puser,'batch_id'=>$baid];
        //$post->unreadNotifications();

    }

    public function prj(Request $request)
    {

        $poid = Projecttype::find($request->poid);
        $baid = request('baid');
        $projs =  Project::where('projecttype_id',$request->poid)->with('students')->get();
        return response()->json(['projs'=>$projs]);
    }
    

    public function channel($id){
         $user = Auth::user();
        $student = $user->student;
        $student_batches = $student->batches;
        $variable=0;
        /*change student batch condition*/
        foreach($student_batches as $student_batch){
            if($student_batch->id == $id){
                $variable =1;
            }
        }
        if($variable == 1){
        $channel = $id;

        $post = Post::whereHas('batches', function ($q) use ($id) {
  
                    $q->where('batch_id', $id);
                })->get();
        //dd($post);
        $b = Batch::find($id);
        // dd($b->title);
        $enddate = $b->enddate;
        $userid = Auth::user()->id;
        $student = Student::where('user_id',$userid)->get();
        $fee = Feedback::where('batch_id',$id)->where('student_id',$student[0]->id)->get();
        // dd($post);

        if(count($post) > 0){
        $topics = Topic::all();
        $batch = Batch::find($id);
        $ptypes = Projecttype::whereHas('batches',function($q) use ($id){
            $q->where('batch_id',$id);
        })->get();

        /*$projecttypes = array();
        foreach ($ptypes as $p) {
            $projecttypes = $p->doesntHave('project')->get();
        }*/
        $btypes = array();
        foreach ($ptypes as $key => $fa) {
            array_push($btypes,$fa->id);
        }
        $prj = Project::whereIN('projecttype_id',$btypes)->get();
        /*dd($prj);
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
        }*/

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


        
        return view('panel.channel',compact('post','topics','batch','batchstudents','prj','b','ptypes','enddate','fee','channel'));
        }else{
            return redirect()->back();
        }
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

    public function notideail($pid,$bid){
        $topics = Topic::all();
        $postid = Post::find($pid);
        $topid = $postid->topic_id;
        $batch = Batch::find($bid);
        return view('panel.notificationread',compact('topics','postid','topid','batch'));
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

    public function frontendproject(Request $request){
       
        $prjid  = $request->id;
        $batchid = $request->bid;
        
        /*$project = Project::with('projecttype','students','projecttype.user','projecttype.user.staff')->where('id','=',$prjid)->get();*/
        /*dd($projects);
        $project = Project::find($prjid);
        $projecttypes = Projecttype::find($project->projecttype_id);
        dd($projecttypes);*/
        $batch = Batch::find($batchid);

        return response()->json(['project'=>$prjid,'batch'=>$batch]);
    }

    public function feedback(Request $request)
    {
        
        $request->validate([
            'trouble'=>'required',
            'benefit' => 'required',
            'teaching' => 'required',
            'mentoring' => 'required',
            'favourite' => 'required',
            'speed' => 'required',
            'maintain' => 'required',
            'quote'=>'required',
            'recommend' => 'required',
            'live-rating' => 'required'
        ]);
        $userid = Auth::user()->id;
        $student = Student::where('user_id',$userid)->get();

        $feedback = new Feedback();
        $feedback->trouble = request('trouble');
        $feedback->benefit = request('benefit');
        $feedback->teaching = request('teaching');
        $feedback->mentoring = request('mentoring');
        $feedback->favourite = request('favourite');
        $feedback->speed = request('speed');
        $feedback->maintain = request('maintain');
        $feedback->quote = request('quote');
        $feedback->recommend = request('recommend');
        $feedback->stars = request('live-rating');
        $feedback->student_id = $student[0]->id;
        $feedback->batch_id = request('batchid');
        $feedback->save();

        return redirect()->route('frontend.channel',['id'=>request('batchid')]);
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

        /*student lesson yae first statement pae condition phyit nay*/

        /*if($lesson->students->isEmpty())
        {      
        // dd('no student');      
            $lesson->students()->attach($student_id);            

        }else{
            
            foreach($lesson->students as $less_student)
            {
                // dd($less_student->pivot);
                $student_pid = $less_student->pivot->student_id;
                $lesson_pid = $less_student->pivot->lesson_id;

                if($lesson_id == $lesson_pid && $student_id == $student_pid)
                {
                    // dd("equal student id ");
                    break;
                }else{
                    // dd("not equal student id $student_pid");
                    $lesson->students()->attach($student_id);
                }
            }
        }*/
        /*student lesson yae first statement pae condition phyit nay*/
        $equal_lesson_id = 0;
        if($student->lessons->isEmpty()){
            $lesson->students()->attach($student);
        }else{
            foreach ($student->lessons as $student_lesson) {
                $pivot_lesson_id = $student_lesson->pivot->lesson_id;
                $status = $student_lesson->pivot->status;
                // if($lesson_id == $pivot_lesson_id){
                //     continue;
                //     echo "$pivot_lesson_id equal lesson id";
                //     // break;
                // }else{
                //     $lesson->students()->attach($student);
                //     break;
                // }
                if($lesson_id == $pivot_lesson_id && $status == 0){
                    $equal_lesson_id = 1;
                }
            }

            if($equal_lesson_id == 0){
                $lesson->students()->attach($student);
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


    // quiz
    public function takequizz($id)
    {
        $quiz = Quizz::find($id);
        $questions = Question::where('quiz_id',$id)->inRandomOrder()->limit(10)->get();
        
        return view('panel.takequizz',compact('questions','quiz'));
    }

    public function storeanswer(Request $request)
    {
        $score = $request->score;
        $quiz_id = $request->quiz_id;
        $data = $request->data;

        $response = new Response;
        $response->score = $score;
        $response->status = 'Active';
        $response->student_id = Auth::user()->student->id;
        $response->quiz_id = $quiz_id;
        $response->save();

        foreach ($data as $value) {
            $responsedetail = new Responsedetail;
            $responsedetail->check_id = $value['answer'];
            $responsedetail->question_id = $value['question'];
            $responsedetail->response_id = $response->id;
            $responsedetail->save();
        }
        return 'ok';

    }

    
}

