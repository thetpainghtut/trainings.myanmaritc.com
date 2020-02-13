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
        //dd($attendancenow);
        $countabsence = Attendance::where('status',1)->get();
        $aa = count($countabsence);
        //dd($countabsence);
        if (request('batch')) {
            $bid = request('batch');
            $groups = Group::where('batch_id',$bid)->get();
            $students = Student::where('batch_id',$bid)->get();

            return view('attendances.create',compact('students','courses','batches','groups','todayDate','attendancenow','countabsence','aa'));
        }
        else{
        // Return 
            return view('attendances.create',compact('todayDate','courses','batches','attendancenow','countabsence','aa'));
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
            $attendances->date = request('date'); 
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
}
