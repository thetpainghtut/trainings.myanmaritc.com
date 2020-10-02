<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Lesson;
use App\Subject;
use App\Course;
use App\Batch;
use Owenoj\LaravelGetId3\GetId3;
use Carbon;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $auth = Auth::user();
        // $user = $auth::role('Admin')->get();
        // dd($auth);

        $lessons = Lesson::all();
        $courses = Course::all();
        // $subjects = $course->subjects()->get();

        return view('lessons.index',compact('courses','lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('lessons.create',compact('courses'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'subject'=>'required',
            "video" => 'required'
        ]);

        if($request->hasfile('video')){

            $file = $request->file('video');

            //instantiate class with file
            $track = new GetId3(request()->file('video'));

            //get all info
            $track->extractInfo();

            //get title
            $track->getTitle();

            //get playtime
            $duration_time = $track->getPlaytime();
            $duration_sec = $track->getPlaytimeSeconds();

            // dd($duration_time);

            $file_extension = $file->getClientOriginalExtension();

            $upload_dir = public_path().'/storage/video/lesson/';

            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move($upload_dir,$name);
            $path = '/storage/video/lesson/'.$name;
        }else{
            $path = '';
        }

        // $path = '/storage/video/lesson/1600870791.mp4';
        // $duration_time = '1:17';

        $lesson = new Lesson;
        $lesson->title = request('title');
        $lesson->file = $path;
        $lesson->duration = $duration_sec;
        $lesson->subject_id = request('subject');
        $lesson->user_id = Auth::user()->id;
        $lesson->save();

        return redirect()->route('lessons.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::find($id);

        $lesson = Lesson::find($id);

        return view('lessons.detail',compact('lesson','subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);

        $lesson = Lesson::find($id);
        $courses = Course::all();

        return view('lessons.edit',compact('lesson','subject','courses'));
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
        $request->validate([
            'title' => 'required|max:100',
            'subject'=>'required',
            // "video" => 'required'
        ]);

        if($request->hasfile('video')){

            $file = $request->file('video');

            //instantiate class with file
            $track = new GetId3(request()->file('video'));

            //get all info
            $track->extractInfo();

            //get title
            $track->getTitle();

            //get playtime
            $duration_time = $track->getPlaytime();
            $duration_sec = $track->getPlaytimeSeconds();

            $file_extension = $file->getClientOriginalExtension();

            $upload_dir = public_path().'/storage/video/lesson/';

            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move($upload_dir,$name);
            $path = '/storage/video/lesson/'.$name;
        }else{
            $path = request('oldfile');
            $duration_sec = request('duration');
        }

        // $path = '/storage/video/lesson/1600870791.mp4';
        // $duration_time = '1:17';

        $lesson = Lesson::find($id);
        $lesson->title = request('title');
        $lesson->file = $path;
        $lesson->duration = $duration_sec;
        $lesson->subject_id = request('subject');
        $lesson->user_id = Auth::user()->id;
        $lesson->save();

        return redirect()->route('lessons.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        
        $lesson->delete();

        return redirect()->route('lessons.index');
    }

    public function show_subject(Request $request){
        $course_id = request('id');

        $course = Course::find($course_id);

        $subjects = $course->subjects()->get();

        echo json_encode($subjects);

    }

    public function view_lesson($id)
    {
        // $course_id = $_GET['course_id'];
        // $course = Course::find($course_id);
        // $batches = $course->batches;
        $today_date = Carbon\Carbon::now();
        
        // $batches = Batch::all();
        $batches = Batch::where([['startdate','<=',$today_date],['enddate','>=',$today_date]])->get();
       

        $subject = Subject::find($id);

        $lessons = Lesson::where('subject_id','=',$id)->get();

        return view('lessons.video',compact('lessons','subject','batches'));

    }

    public function assign_batchsubject(Request $request)
    {

        $request->validate([
            'batch' => 'required'
        ]);

        $subject_id = request('subject_id');
        $batch_id = request('batch');
       
        $batch = Batch::find($batch_id);
        $batch->subjects()->attach($subject_id);

        return response()->json($batch);

    }
}
