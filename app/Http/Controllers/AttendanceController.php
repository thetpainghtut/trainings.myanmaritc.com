<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Batch;
use App\Student;
use App\Group;
use App\Attendance;
use Auth;
use Carbon\Carbon;
use DB;
use App\Teacher;
use App\Staff;
use App\Mentor;
use App\Schedule;


class AttendanceController extends Controller
{
    public function index(){
        $user = Auth::user();
        $role = $user->getRoleNames();

        if ($role[0] == 'Teacher') {
            // Courses => Teacher
            $staff = Staff::with('teacher')->where('user_id',$user->id)->get();
            $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();

            $courses = array();
            foreach ($teacher as $key => $value) {
              array_push($courses,$value->course);
            }
        }
        elseif($role[0] == 'Mentor' || $role[0] == 'Intern Mentor'){
            // Courses => Mentor |or| Intern Mentor

            $staff = Staff::with('mentor')->where('user_id',$user->id)->get();
            $mentor = Mentor::with('course')->where('staff_id',$staff[0]->id)->get();

            $courses = array();
            foreach ($mentor as $key => $value) {
              array_push($courses,$value->course);
            }
        }
        else{
            // Courses
            $courses = Course::all();
        }

        if (request('batch')) {
            $bid = request('batch');

            $batch = Batch::find($bid);

            $status = 1;

            if($role[0] == 'Mentor' || $role[0] == 'Intern Mentor'){
            }
            else{
                $students = Student::whereHas('batches',function($q) use ($bid){
                    $q->where('batch_id',$bid);
                })->get();
            }

            

            $now = Carbon::now();

            $todaydate = $now->formatLocalized('%A, %d %B  %Y'); 

            $today = Carbon::parse($todaydate)->format('Y-m-d');

            $currentTime = $now;
            // dd($today);
            // $currentTime = Carbon::parse('15:00:00');

            $schedules = Schedule::with('attendances')
                    ->where('batch_id',$bid)
                    ->where('date_event',$today)
                    ->where('type','!=','Holiday')
                    ->orderBy('time_event')
                    ->get();

            $schedule_now = [];


            foreach ($schedules as $key => $schedule) {
                if ($schedule->time_event) {
                    $time_str = $schedule->time_event;
                    $time_arr = explode('-',$time_str);

                    $starttime = trim($time_arr[0]);
                    $endtime = trim($time_arr[1]);

                    $starttimeFormat = Carbon::create($starttime)->format('h:i:s');
                    $endtimeFormat = Carbon::create($endtime)->format('h:i:s');

                    // $interval = $starttimeFormat->diff($endtimeFormat);

                    $interval = $currentTime->between(Carbon::parse($starttime), Carbon::parse($endtime));

                    // dd($interval);
                    $att_scheduleid = $schedule->id;
                    
                    if ($interval) {

                        if(!count($schedule->attendances)){
                            // $schedule_now[$key]['id'] =  $att_scheduleid;

                            array_push($schedule_now,$att_scheduleid);
                        }
                    }
                }

                // dd($schedule_now);

                // echo $schedule->id." => ".$starttime." - ".$endtime."<br>";
            }

            // dd($schedule_now);

            return view('attendances.create',compact('courses', 'batch', 'students','todaydate','schedules','schedule_now'));

        }else{
            return view('attendances.create',compact('courses'));
        }
    }

    public function store(Request $request){
        $students = request('studentid');
        $remarks = request('remark');
        $scheduleid = request('scheduleid');

        $attendanceStataus = $request->attendanceStataus;        

        for ($i=0; $i < (count($students)); $i++) {

            $studentid = $students[$i];

            $status = $attendanceStataus[$studentid];
            $remark = $remarks[$i];

            $attendances = new Attendance();
            $attendances->date = Carbon::now();
            $attendances->status = $status;
           

            if($remarks[$i]!=''){
                $attendances->remark = $remark;
            }

            else{
                $attendances->remark = 'NULL';
            }

            $attendances->student_id = $studentid;
            $attendances->user_id = Auth::user()->id;
            $attendances->schedule_id = $scheduleid;
        
            $attendances->save();
            // echo ."<br>";
        }

        return redirect()->route('attendances.index');

    }


    public function update(Request $request){
        $id = $request->attupdid;
        $status = $request->attupdstatus;

        if ($status == 0) {
            $remark = 'NULL';
        }elseif ($status == 2) {
            $remark = $request->attupdlatetime;
        }
        else{
            $remark = $request->attupdreason;
        }

        if (!$remark) {
            $remark = 'NULL';
        }


        $attendance = Attendance::find($id);

        $batchid = $attendance->schedule->batch_id;
        $courseid = $attendance->schedule->batch->course->id;


        $attendance->status = $status;
        $attendance->remark = $remark;
        $attendance->save();

        return redirect()->back();

    }   



















}
