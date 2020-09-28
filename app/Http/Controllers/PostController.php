<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\Batch;
use Carbon;
use App\Post;
use Auth;
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
        $posts = Post::all();
        return view('posts.index',compact('posts'));
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
        $batches = Batch::where('startdate','<=',$now)->where('enddate','>=',$now)->get();
        return view('posts.create',compact('topics','batches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'required',
            'content' => 'required',
            'topic' => 'required',
            'image' => 'required',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'batch' => 'required'
        ]);

        $data=[];
        if ($request->hasfile('image')) {
            foreach($request->file('image') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/storage/images/posts/', $name);  
                $filename = '/storage/images/posts/'.$name; 
                array_push($data, $filename); 
            }
        }
        $photoString = implode(',', $data);

        $post = new Post();
        $post->title = request('title');
        $post->content = request('content');
        $post->file = $photoString;
        $post->topic_id = request('topic');
        $post->user_id = Auth::id();
        $post->save();

        $post->batches()->attach(request('batch'));

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
        $batches = Batch::where('startdate','<=',$now)->where('enddate','>=',$now)->get();
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
}
