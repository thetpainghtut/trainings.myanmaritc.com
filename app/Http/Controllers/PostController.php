<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Batch;
use Carbon;
use App\Post;
use Auth;
use App\Student;
use App\Events\MyEvent;
use App\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PostNotification;
use App\Subject;
use App\Staff;
use App\Teacher;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $id = Auth::id();
        $now = Carbon\Carbon::now();
        
        $posts = Post::whereHas('user',function($q) use ($id){
            $q->where('user_id',$id);
        })->get();

        $staff = Staff::where('user_id',$id)->get();
        foreach ($staff[0]->teacher as $key => $value) {
           //dd($value->course->batches);
           foreach ($value->course->batches as $k) {
               $batches = $k->where('startdate','<=',$now)->where('enddate','>=',$now)->get();
           }
        }
        
        
       /* foreach ($batches as $key => $value) {
            $b = $value;
            foreach ($b->posts as $c) {
                $d[] = $c;
            }

        }*/
       
        return view('posts.index',compact('posts','batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $topics = Topic::all();
        $now = Carbon\Carbon::now();
        $user = Auth::user();
        $id = Auth::id();
        $role = $user->getRoleNames();
        $subjects = Subject::all();

        if($role[0] == 'Teacher'){
        $batches=Batch::where('startdate','<=',$now)->where('enddate','>=',$now)->join('batch_teacher','batch_teacher.batch_id','=','batches.id')->join('staff','staff.id','=','batch_teacher.teacher_id')->where('staff.user_id',$id)->get();
        //dd($batches);
        }
        elseif($role[0] == 'Admin'){
            $batches = Batch::where('startdate','<=',$now)->where('enddate','>=',$now)->get();
        }else{
            $batches = [];

        }
        return view('posts.create',compact('topics','batches','subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        /*$user = Auth::id();*/
       
        //
        $request->validate([
            'title'=>'required',
            'content' => 'required',
            'topic' => 'required',
            'image' => 'sometimes',
            'image.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'batch' => 'required'
        ]);
        $subject = request('subject');
        if($subject){
            $request->validate([
                'subject' => 'required'
            ]);
            $subjectp = Subject::find($subject);
           $photoString = $subjectp->logo;
        }
//dd($photoString);
        $imagess=[];
        if ($request->hasfile('image')) {
            foreach($request->file('image') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/storage/images/posts/', $name);  
                $filename = '/storage/images/posts/'.$name; 
                array_push($imagess, $filename); 
            }
            $photoString = implode(',', $imagess);
        }
        

        $post = new Post();
        $post->title = request('title');
        $post->content = request('content');
        $post->file = $photoString;
        $post->topic_id = request('topic');
        $post->user_id = Auth::id();
        //event(new MyEvent($post));
        
        if($post->save()){
            $post->batches()->attach(request('batch'));
            $postnoti = [
            'id' => $post->id,
            'title' => request('title'),
            'topic_id' => request('topic'),
            'user_id' => Auth::id(),
            'batch' => request('batch')
        ];
       // dd($postnoti);

            Notification::send($post,new PostNotification($postnoti));
            event(new MyEvent($post));

           // dd($post->notifications);

            
        }
        return redirect()->route('posts.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        return view('posts.detail',compact('post'));
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
        $post = Post::find($id);
        $topics = Topic::all();
        $now = Carbon\Carbon::now();
         $user = Auth::user();
        $id = Auth::id();
        $role = $user->getRoleNames();
        

        if($role[0] == 'Teacher'){
        $batches=Batch::where('startdate','<=',$now)->where('enddate','>=',$now)->join('batch_teacher','batch_teacher.batch_id','=','batches.id')->join('staff','staff.id','=','batch_teacher.teacher_id')->where('staff.user_id',$id)->get();
        }
        elseif($role[0] == 'Admin'){
            $batches = Batch::where('startdate','<=',$now)->where('enddate','>=',$now)->get();
        }else{
            $batches = [];
           
        }
        return view('posts.edit',compact('post','topics','batches'));
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
        $request->validate([
            'title'=>'required',
            'content' => 'required',
            'topic' => 'required',
            'oldfile' => 'required',
            'batch' => 'required'
        ]);
       
        $data=[];
        if ($request->hasfile('file')) {
            $request->validate([
                'file' => 'required',
                'file.*' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
            ]);
            
            $oldphoto = explode(',', $request->oldfile);
            foreach($oldphoto as $old){
                unlink(public_path($old));
            }
            
            foreach($request->file('file') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/storage/images/posts/', $name);  
                $filename = '/storage/images/posts/'.$name; 
                array_push($data, $filename); 
                $photoString = implode(',', $data);
            }
        }else{
            $request->validate([
                'oldfile' => 'required'
            ]);
            $photoString = request('oldfile');
        }
        

        $post = Post::find($id);
        $post->title = request('title');
        $post->content = request('content');
        $post->file = $photoString;
        $post->topic_id = request('topic');
        $post->user_id = Auth::id();
        $post->save();

        $post->batches()->detach();
        $post->batches()->attach(request('batch'));

        return redirect()->route('posts.index');
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
        $post = Post::find($id);
        $post->batches()->detach();
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function postassign(Request $request)
    {
        $request->validate([
            'post' => 'required',
            'batch' => 'required'
        ]);
        $po = request('post');
        $batch = request('batch');

        //$post= Post::find($po);

        $post = Post::join('batch_post','batch_post.post_id','=','posts.id')->where('batch_post.batch_id',$batch)->where('batch_post.post_id',$po)->get();
       
        if(count($post) > 0){
            return redirect()->route('posts.index')->with('danger','This Batch Post Assign is Already Taken!!');
        }else{
            $addpost = Post::find($po);
            $addpost->batches()->attach($batch);
            $postnoti = [
            'id' => $addpost->id,
            'title' => $addpost->title,
            'topic_id' => $addpost->topic_id,
            'user_id' => $addpost->user_id,
            'batch' => $batch
        ];
       // dd($postnoti);

            Notification::send($addpost,new PostNotification($postnoti));
            event(new MyEvent($addpost));
            return redirect()->route('posts.index')->with('success','This Batch Post Assign is Successfully!!');
        }
    }

    public function getnoti(){
        $noti_data=array();
        if(Auth::check()){
        $user  = Auth::user();
        $student = $user->student;
        $batch = $student->batches;
        $cs = array();
        foreach($batch as $b){
        foreach($b->posts as $pos){
            if($pos->pivot->batch_id == $b->id){
         foreach($pos->unreadNotifications as $notification)
                {
                    array_push($cs, $notification->data);
                    
                   
                }

               
            }
            }
            for($i=0;$i<count($cs);$i++){
                if($cs[$i]['batch_id'] == $b->id){                        
                       array_push($noti_data, $cs[$i]['batch_id']);
                   }
                
                    }
            }
            return $noti_data;
            }
            
    }

}
