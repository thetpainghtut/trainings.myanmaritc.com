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

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user = Auth::user()->id;
        //dd($user);
        $teacher = DB::table('courses')->join('teachers','courses.id','=','teachers.course_id')->join('staff','staff.id','=','teachers.staff_id')->join('users','users.id','=','staff.user_id')->join('locations','courses.location_id','=','locations.id')->where('users.id',$user)->select('courses.*','locations.name as lname')->get();
        //dd($teacher);
        $courses = Course::all();
        $batches = Batch::all();
        $attend = Attendance::all();
        $todayDate = date("Y-m-d");

        $attendancenow = Attendance::where('date',$todayDate)->get();
        $bid = request('batch');
        $studentss = Student::where('batch_id',$bid)->get();

        $studentall=[];
        foreach ($studentss as $key => $value) {

            $studentall[] = Attendance::where('student_id',$value->id)->where('date',$todayDate)->get();
        }
        

        $v=[];
        foreach ($studentall as $tcount) {
            $v = $tcount;
        }
        $attcount = count($v);

        /*$attendancenow = Attendance::join('students','students.id','=','student_id')->join('batches','batches.id','=','students.batch_id')->where('date',$todayDate)->get();*/
      // dd($attendancenow);
        $countabsence = Attendance::where('status',1)->get();
        $aa = count($countabsence);

        //dd($countabsence);
        if (request('batch')) {
           
            $status = 1;
            $students = Student::where('batch_id',$bid)->get();

            return view('attendances.create',compact('students','courses','batches','todayDate','attendancenow','countabsence','attcount','attend','status','teacher'));
        }
        else{
        // Return 
            $status = 0;
            return view('attendances.create',compact('todayDate','courses','batches','attendancenow','countabsence','attcount','attend','status','teacher'));
        }
      
    
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
        //dd($request->date);
       
       
        $students = request('studentid');
        $remarks = request('remark');
       // dd($remarks);
       // foreach ($students as $student) {
         

        for ($i=0; $i < (count($students)); $i++) {

            $attendances = new Attendance();
            $attendances->date = Carbon::now();
           // echo $remarks[$i];

            if($remarks[$i]!=''){
             $attendances->status = 1;
              $attendances->remark = $remarks[$i];

                

           }else{
                     $attendances->status = 0;
              $attendances->remark = 'NULL';


           }
       // die();

        $attendances->student_id = $students[$i];
        $attendances->user_id = Auth::user()->id;
        
         $attendances->save();
           
       }
         return redirect()->route('attendances.index');

      
       //dd($attendances->student_id);  
       
        
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
    }

    public function action(Request $request)
    {
    
      $query = $request->get('searchquery');
      if($query != '')
      {
        $group = Group::with('students');

       $search = Student::with('groups')->where('namee', 'like', '%'.$query.'%')
         ->get();
       /*  $search =$group->whereHas('students', function($q) use($query) {
                $q -> where('namee', 'LIKE', '%'. $query .'%');
            }) -> get();*/
         
      }
    // dd($search);
      

      return response()->json($search);
    
    }

    public function absence(Request $request)
    {
        $courses = Course::all();
        $batches = Batch::all();
        $requestbatch = request('batch');
        if($requestbatch){
            $status = 1;
           
            $students = Student::where('batch_id',$requestbatch)
                        ->whereHas('attendance',function($q1){
                            return $q1->where('status','=','1');
                        })
                        ->get();             




            return view('attendances.absencelist',compact('courses','batches','status','students','requestbatch'));
        }else{
            $status = 0;
            return view('attendances.absencelist',compact('courses','batches','status'));
        }
    }


    public function absencesearch(Request $request)
    {
        $startdate = request('startdate');
        $enddate = request('enddate');
        $batch = request('batch_id');
        $students = Student::where('batch_id',$batch)
                        ->whereHas('attendance',function( $q1 ) use ($startdate , $enddate) {
                            $q1->whereBetween('date', [$startdate,$enddate])->where('status','=','1');
                        })
                        ->get(); 
        //dd($students);

        $stucount = count($students);
         for($i=0;$i<$stucount;$i++){

        $scount[] = $students[$i]->attendance;
    }
        
        
       /* $su = Attendance::whereBetween('date', [$startdate,$enddate])->where('status','=','1')->get();
        foreach($su as $object)
        {
            //$arrays[] = $object->toArray();
            $arrays[] = $object->student_id;
        }

        $s = Student::whereIn('id',$arrays)->get();*/
        if(count($students)>0){
        
        return response()->json(array(
                    'success' => true,
                    'students' => $students,
                    'attendances' => $scount
                )); 
    }else{
        return response()->json(array('error'=>false));
    }
       

    }
}
