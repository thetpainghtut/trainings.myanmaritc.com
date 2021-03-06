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
use App\Staff;
use App\Teacher;
class LessonController extends Controller
{
    public function __construct($value='')
    {
        $this->middleware('role:Teacher');
    }
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
        $user = Auth::user()->id;

        $staff = Staff::with('teacher')->where('user_id',$user)->get();
       
        $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();

        $courses = array();
        foreach ($teacher as $key => $value) {
          array_push($courses,$value->course);
        }

        //$courses = Course::all();
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

        $subject_id = request('subject');
       
        $lesson_subjects = Lesson::where('subject_id',$subject_id)->get();
        //$sorting_data=0;
        
      
        foreach($lesson_subjects as $lesson_subject){
            $sorting = $lesson_subject->sorting;
            $sorting_data = ++$sorting;
        }

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
        /*insert sorting*/
        if($lesson_subjects->isEmpty()){
        $lesson->sorting = 1;
        }else{
            $lesson->sorting = $sorting_data;
        }
        /*insert sorting*/
        
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

        $lesson = Lesson::find($id);

        $subject = $lesson->subject()->first();

        return view('lessons.detail',compact('lesson','subject'));
    }

     public function lesson_detail($lesson_id,$course_id)
    {

        $lesson = Lesson::find($lesson_id);

        $subject = $lesson->subject()->first();

        return view('lessons.detail',compact('lesson','subject','course_id'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subjects = Subject::all();

        $lesson = Lesson::find($id);
       // $courses = Course::all();
        $user = Auth::user()->id;

        $staff = Staff::with('teacher')->where('user_id',$user)->get();
       
        $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();

        $courses = array();
        foreach ($teacher as $key => $value) {
          array_push($courses,$value->course);
        }

        return view('lessons.edit',compact('lesson','subjects','courses'));
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

    public function view_lesson($subject_id,$course_id)
    {
        // dd($subject_id,$course_id);
        // $course_id = $_GET['course_id'];
        // $course = Course::find($course_id);
        // $batches = $course->batches;
        $today_date = Carbon\Carbon::now();
        $user = Auth::user()->id;
        // $batches = Batch::all();
        $batches = Batch::where([['startdate','<=',$today_date],['enddate','>=',$today_date],['course_id',$course_id]])->get();
       
        // dd($batches);
        $subject = Subject::find($subject_id);

        $lessons = Lesson::where('subject_id','=',$subject_id)->orderBy('sorting', 'asc')->where('user_id','=',$user)->get();
        
        return view('lessons.video',compact('lessons','subject','batches','course_id'));

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

    public function sorting_lesson(Request $request){
       
       
        $sorting_array=$request->sortingdata;
        // dd($sorting_array);
        $i=1;
        foreach ($sorting_array as $sorting_data) {
            // dd($sorting_data);
            $lesson = Lesson::find($sorting_data);
            $lesson->sorting = $i;
            $lesson->save();
            $i++;
        }
        return back();

        
    }
}
