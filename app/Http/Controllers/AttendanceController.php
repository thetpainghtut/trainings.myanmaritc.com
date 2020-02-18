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
        $courses = Course::all();
        $batches = Batch::all();
        $todayDate = date("Y-m-d");

        $attendancenow = Attendance::where('date',$todayDate)->get();
        $bid = request('batch');
        $groups = Group::where('batch_id',$bid)->get();

        $studentall=[];
        foreach ($groups as $key => $value) {

            $studentall[] = DB::table('group_student')->where('group_student.group_id',$value->id)->get();
        }

        $s = [];
        foreach ($studentall as $v) 
        {
         foreach ($v as $key => $value1) 
         {
            $s[] = Attendance::where('attendances.student_id',$value1->student_id)->where('attendances.date',$todayDate)->get();
         }
        }

        $v=[];
        foreach ($s as $tcount) {
            $v = $tcount;
        }
        $attcount = count($v);

        /*$attendancenow = Attendance::join('students','students.id','=','student_id')->join('batches','batches.id','=','students.batch_id')->where('date',$todayDate)->get();*/
      // dd($attendancenow);
        $countabsence = Attendance::where('status',1)->get();
        $aa = count($countabsence);
        //dd($countabsence);
        if (request('batch')) {
           
            
            $students = Student::where('batch_id',$bid)->get();

            return view('attendances.create',compact('students','courses','batches','groups','todayDate','attendancenow','countabsence','attcount'));
        }
        else{
        // Return 
            return view('attendances.create',compact('todayDate','courses','batches','attendancenow','countabsence','attcount'));
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
}
