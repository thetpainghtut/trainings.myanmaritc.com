<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Batch;
use App\Course;
use App\User;
use App\Staff;
use App\Subject;
use App\Teacher;
use App\Mentor;
use App\Schedule;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

use Auth;


class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $role = $user->getRoleNames();

        if ($role[0] == 'Teacher') {
            // Courses 
            $staff = Staff::with('teacher')->where('user_id',$user->id)->get();
            $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();

            $courses = array();
            foreach ($teacher as $key => $value) {
              array_push($courses,$value->course);
            }
        }
        else{
            // Courses
            $courses = Course::all();
        }

        

        return view('schedule.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "type" => 'required',
        ]);

        $type = request('type');
        $title = request('title');
        $holidaydate = request('holidaydate');

        $courseid = request('courseid');
        $batchid = request('batchid');
        $teacherid = request('teacher');

        $subjectid = request('subjectid');

        $start_str = request('start');
        $end_str = request('end');

        $authid = Auth::user()->id;

        if ($type == "Closed") {
            $color = '#FF0000';
        }
        else{
            $color = request('color');

        }

        if ($type == "Holiday") {
 
            $schedule = new Schedule;
            $schedule->title = $title;
            $schedule->date_event = $holidaydate;
            $schedule->time_event = NULL;
            $schedule->type = $type;
            $schedule->color = '#FF0000';
            $schedule->user_id = $authid;
            $schedule->save();
            
            return response()->json(['success'=>'Schedule <b> SAVED </b> successfully.']);
        }
        
        else{
            
            if ($type == "Timetable") {
                $teacher = $teacherid;
            }else{
                $teacher = NULL;
            }

            if ($type == "Activity" || $type == 'Guest Speaker' || $type == 'Closed') {
                $subject = NULL;
            }else{
                $subject = $subjectid;
            }

            if($end_str){
                
                $start_arr = explode(' ',$start_str);
                $end_arr = explode(' ',$end_str);

                $startdate = $start_arr[0];
                $starttime = $start_arr[1];

                $enddate = $end_arr[0];
                $endtime = $end_arr[1];

                $time = $starttime.' - '.$endtime;
            }
            else{
                $startdate = $holidaydate;
                $enddate = $holidaydate;

                $time = NULL;
            }
            

            $dt = Carbon::create($startdate);
            $dt2 = Carbon::create($enddate);
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                    return !$date->isWeekend();
            }, $dt2);


            $period = CarbonPeriod::create($startdate, $enddate);

            $weekendFilter = function ($date) {
                return $date->isWeekday();
            };
            $period->filter($weekendFilter);

            $days = [];
            foreach ($period as $date) {

                $date_event  = $date->format('Y-m-d');

                $schedule = new Schedule;
                $schedule->title = $title;
                $schedule->date_event = $date_event;
                $schedule->time_event = $time;
                $schedule->type = $type;
                $schedule->color = $color;
                $schedule->user_id = $authid;
                $schedule->batch_id = $batchid;
                $schedule->subject_id = $subject;
                $schedule->teacher_id = $teacher;

                $schedule->save();


            }
        }
        
        
        // return response()->json(['success'=>'Schedule <b> SAVED </b> successfully.']);       


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::find($id);

        if ($schedule->time_event) {
            $time_str = $schedule->time_event;
            $time_arr = explode('-',$time_str);

            $starttime = trim($time_arr[0]);
            $endtime = trim($time_arr[1]);

            $starttimeFormat = Carbon::create($starttime)->format('h:i: a');
            $endtimeFormat = Carbon::create($endtime)->format('h:i: a');

            $timeFormat = $starttimeFormat.' - '.$endtimeFormat;


        }
        else{
            $starttime = '';
            $endtime = '';

            $timeFormat = '';
        }


        $date_event = $schedule->date_event;

        $mutable = Carbon::create($schedule->date_event);
        $day = $mutable->isoFormat('dddd');

        
        $data =[
            'id'              =>  $schedule->id,
            'title'           =>  $schedule->title,
            'start'           =>  isset($schedule->time_event) ? $date_event.' '.$starttime : $date_event,
            'end'             =>  isset($schedule->time_event) ? $date_event.' '.$endtime : $date_event,
            'date'            =>  $date_event,
            'day'             =>  $day,
            'time'            =>  $timeFormat,
            'type'            =>  $schedule->type,
            'color'           =>  $schedule->color,
            'user'            =>  $schedule->user->name,
            'batch_id'        =>  isset($schedule->batch_id) ? $schedule->batch_id : '',
            'batch_title'     =>  isset($schedule->batch_id) ? $schedule->batch->title : '',
            'batch_type'      =>  isset($schedule->batch_id) ? $schedule->batch->type : '',
            'batch_startdate' =>  isset($schedule->batch_id) ? $schedule->batch->startdate : '',
            'batch_enddate'   =>  isset($schedule->batch_id) ? $schedule->batch->enddate : '',
            'batch_time'   =>  isset($schedule->batch_id) ? $schedule->batch->time : '',
            'course_id'   =>  isset($schedule->batch_id) ? $schedule->batch->course->id : '',
            
            'course_name'   =>  isset($schedule->batch_id) ? $schedule->batch->course->name : '',
            'location'   =>  isset($schedule->batch_id) ? $schedule->batch->location->name  : '',
            'city'   =>  isset($schedule->batch_id) ? $schedule->batch->location->city->name : '',

            'subject_id'   =>  isset($schedule->subject_id) ? $schedule->subject_id : '',
            'subject_name'   =>  isset($schedule->subject_id) ? $schedule->subject->name : '',
            'teacher_id'    =>  isset($schedule->teacher_id) ? $schedule->teacher_id : '',
            'teacher_name'  =>  isset($schedule->teacher_id) ? $schedule->teacher->staff->user->name : ''
            
        ];

        return response()->json(['schedule'=>$data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        $date_event = $schedule->date_event;

        if ($schedule->time_event) {
            $time_str = $schedule->time_event;
            $time_arr = explode('-',$time_str);

            $starttime = trim($time_arr[0]);
            $endtime = trim($time_arr[1]);

        }
        else{
            $starttime = '';
            $endtime = '';

        }

        $data =[
            'id'              =>  $schedule->id,
            'title'           =>  $schedule->title,
            'start'           =>  isset($schedule->time_event) ? $date_event.' '.$starttime : $date_event,
            'end'             =>  isset($schedule->time_event) ? $date_event.' '.$endtime : $date_event,
            'date'            =>  $date_event,
            'time'            =>  $schedule->time_event,
            'type'            =>  $schedule->type,
            'color'           =>  $schedule->color,
            'batch_id'        =>  isset($schedule->batch_id) ? $schedule->batch_id : '',
            'course_id'   =>  isset($schedule->batch_id) ? $schedule->batch->course->id : '',
            
            'subject_id'   =>  isset($schedule->subject_id) ? $schedule->subject_id : '',
            'teacher_id'    =>  isset($schedule->teacher_id) ? $schedule->teacher_id : '',
            
        ];

        return response()->json(['schedule'=>$data]);

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
            "type" => 'required',
        ]);

        $type = request('type');
        $title = request('title');
        $holidaydate = request('holidaydate');

        $color = request('color');
        $courseid = request('courseid');
        $batchid = request('batchid');
        $teacherid = request('teacher');

        $subjectid = request('subjectid');

        $authid = Auth::user()->id;
        $start_str = request('start');
        $end_str = request('end');

        if ($type == "Holiday") {
 
                $schedule = Schedule::find($id);
                $schedule->title = $title;
                $schedule->date_event = $holidaydate;
                $schedule->time_event = NULL;
                $schedule->type = $type;
                $schedule->color = '#FF0000';
                $schedule->user_id = $authid;
                $schedule->save();
                
                return response()->json(['success'=>'Schedule <b> SAVED </b> successfully.']);
        }
        else{
            if ($type == "Timetable") {
                $teacher = $teacherid;
            }else{
                $teacher = NULL;
            }

            
            if($end_str){
                
                $start_arr = explode(' ',$start_str);
                $end_arr = explode(' ',$end_str);

                $startdate = $start_arr[0];
                $starttime = $start_arr[1];

                $enddate = $end_arr[0];
                $endtime = $end_arr[1];

                $time = $starttime.' - '.$endtime;
            }
            else{
                $startdate = $holidaydate;
                $enddate = $holidaydate;

                $time = NULL;
            }

            $dt = Carbon::create($startdate);
            $dt2 = Carbon::create($enddate);
            $daysForExtraCoding = $dt->diffInDaysFiltered(function(Carbon $date) {
                    return !$date->isWeekend();
            }, $dt2);


            $period = CarbonPeriod::create($startdate, $enddate);

            $weekendFilter = function ($date) {
                return $date->isWeekday();
            };
            $period->filter($weekendFilter);

            $days = [];
            foreach ($period as $date) {

                $date_event  = $date->format('Y-m-d');

                $schedule = Schedule::find($id);
                $schedule->title = $title;
                $schedule->date_event = $date_event;
                $schedule->time_event = $time;
                $schedule->type = $type;
                $schedule->color = $color;
                $schedule->user_id = $authid;
                $schedule->batch_id = $batchid;
                $schedule->subject_id = $subjectid;
                $schedule->teacher_id = $teacher;

                $schedule->save();


            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();

         return response()->json(['delete'=>'Schedule <b> DELETE </b> successfully.']);       

    }

    public function getBatchByCourse_schedule(Request $request){

        $batches = array();

        $cid = request('id');
        $now = Carbon::now();

        $batches = Batch::where('course_id',$cid)
                    // ->where('startdate','<=',$now)
                    ->orderBy('enddate','DESC')->get();

        return $batches;
        
    }

    public function getTeacherByBatch_schedule(Request $request){
        $bid = request('id');

        $batch = Batch::find($bid);


        $batch_teachers =  $batch->teachers;        

        $teachers = array();

        foreach ($batch_teachers as $teacher) {
            $id = $teacher->id;
            $name = $teacher->staff->user->name;

            $data =[
                'id'    =>  $id,
                'name'  =>  $name
            ];

            array_push($teachers,$data);

        }


        return $teachers;

    }

    public function getallSchedules(){

        $user = Auth::user();
        $role = $user->getRoleNames();

        if ($role[0] == 'Teacher') {
            // Courses 
            $staff = Staff::with('teacher')->where('user_id',$user->id)->get();
            $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->first();

            $teacherid = $teacher->id;

            $schedules = Schedule::WHERE('teacher_id',$teacherid)
                    ->orwhere('type','Holiday')
                    ->get();

        }
        else{
            $now = Carbon::now();

            // $batches = Batch::where('startdate','<=',$now)
            //             ->where('enddate','>=',$now)->get();

            // $schedules = Schedule::where('batch_id')->get();

            $schedules = Schedule::whereHas('batch', function($q) use($now){
                $q->where('startdate', '<=', $now);
                $q->where('enddate','>=',$now);
            })
            ->orwhere('type','Holiday')
            ->get();

        }

        
            // dd($schedules);

        $data = [];

        foreach ($schedules as $schedule) {

            if ($schedule->time_event) {
                $time_str = $schedule->time_event;
                $time_arr = explode('-',$time_str);

                $starttime = trim($time_arr[0]);
                $endtime = trim($time_arr[1]);

            }
            else{
                $starttime = '';
                $endtime = '';
            }


            $date_event = $schedule->date_event;


            $data[] =[
                'id'              =>  $schedule->id,
                'title'           =>  $schedule->title,
                'description'     =>  isset($schedule->batch_id) ? $schedule->batch->title : '',
                'start'           =>  isset($schedule->time_event) ? $date_event.' '.$starttime : $date_event,
                'end'             =>  isset($schedule->time_event) ? $date_event.' '.$endtime : $date_event,
                'backgroundColor' =>  $schedule->color,
                'borderColor' =>  $schedule->color,
                
            ];

            // array_push($data,$timetable);

        }

        echo json_encode($data);

        
    }



    public function getschedule_byBatch($bid){

        $schedules = Schedule::WHERE('batch_id',$bid)
                    ->orwhere('type','Holiday')

                    ->get();


        $data = [];

        foreach ($schedules as $schedule) {

            if ($schedule->time_event) {
                $time_str = $schedule->time_event;
                $time_arr = explode('-',$time_str);

                $starttime = trim($time_arr[0]);
                $endtime = trim($time_arr[1]);

            }
            else{
                $starttime = '';
                $endtime = '';
            }


            $date_event = $schedule->date_event;


            $data[] =[
                'id'              =>  $schedule->id,
                'title'           =>  $schedule->title,
                'description'     =>  isset($schedule->batch_id) ? $schedule->batch->title : '',
                'start'           =>  isset($schedule->time_event) ? $date_event.' '.$starttime : $date_event,
                'end'             =>  isset($schedule->time_event) ? $date_event.' '.$endtime : $date_event,
                'backgroundColor' =>  $schedule->color,
                'borderColor' =>  $schedule->color,
                
            ];

            // array_push($data,$timetable);

        }

        echo json_encode($data);
    }












}
