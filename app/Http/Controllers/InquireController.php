<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Education;
use App\Batch;
use App\Course;
use App\Township;
use App\Inquire;
use App\Location;
use Auth;
use Carbon\Carbon;

class InquireController extends Controller
{
     public function __construct($value='')
    {
        $this->middleware('role:Admin|Business Development');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('inquires.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $batch_id = request('batch_id');
        $batch = Batch::find($batch_id);
        $batch_course = $batch->course;
        $educations = Education::all();
        //$courses = Course::all();
        $courses = Course::has('batches')->get();
        $batches = Batch::all();
        $townships = Township::all();

        return view('inquires.create',compact('educations','batches','townships','courses','batch_course','batch'));
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
            "name" => "required|max:100",
            "gender" => "required",
            "phone" => "required",
            "knowledge" => "required",
            "camp" => "required",
            "education_id" => "required",
            "acceptedyear" => "required",
            "batch_id" => "required",
        ]);
        $id =request('batch_id');
        $batch = Batch::find($id);
        // dd($batch);
        $course =$batch->course;
        $codeno = $course->codeno;

        $location_id = $batch->location_id;
        $location = Location::find($location_id);

        $city = $location->city;

        $zipcode = $city->zipcode;

        $lastInquire = Inquire::orderBy('created_at', 'desc')->first();

        $inquires = new Inquire();

        if($lastInquire){
            $lastDate =$lastInquire->created_at->format('Y-m-d');

            if($lastDate == date('Y-m-d')){
                $inquireno = $lastInquire->inquireno;
                $inquire_no = ++$inquireno;
                 $inquires->inquireno = strval($inquire_no);
                
               
            }else{
                $inquires->inquireno = date('dmY').'001';
            }

        }else{
            $inquires->inquireno = date('dmY').'001';
        }

        $inquires->name = request('name');
        $inquires->gender = request('gender');
        $inquires->phone = request('phone');
        /*$inquires->installmentdate = request('installment_date');
        $inquires->installmentamount = request('installment_amount');*/
        $inquires->knowledge = request('knowledge');
        $inquires->camp = request('camp');
        $inquires->education_id = request('education_id');
        $inquires->acceptedyear = request('acceptedyear');
        $inquires->batch_id = request('batch_id');
        $inquires->user_id = Auth::id();
        $inquires->save();

        return redirect()->route('inquires.show',$id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $batch = Batch::find($id);
         $no_payment_inquires = Inquire::where([['batch_id',$id],['message','=',null]])->get();
        $first_payment_inquires = Inquire::where([['status',1],['batch_id',$id],['message','=',null]])->get();
        $full_payment_inquires = Inquire::where([['status',2],['batch_id',$id],['message','=',null]])->get();
         //dd($no_payment_inquires,$first_payment_inquires,$full_payment_inquires);

        return view('inquires.list',compact('batch','no_payment_inquires','first_payment_inquires','full_payment_inquires'));
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
        $inquire = Inquire::find($id);
        /*dd($inquire);*/
        return view('inquires.edit',compact('inquire'));

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
        $inquire = Inquire::find($id);
        if($inquire == null){
            Inquire::withTrashed()->find($id)->restore();
        }else{
            $inquire->delete();
        }

        return redirect()->route('inquires.index');
    }

    public function preinstallment(Request $request){
        $request->validate([
            'installment_date' => 'required',
            'installment_amount' => 'required'

        ]);
        $id = request('id');
        $inquire = Inquire::find($id);
        $inquire->installmentdate = request('installment_date');
        $inquire->installmentamount = request('installment_amount');
        $inquire->status = 1;
        $inquire->save();
        
        return response()->json($inquire);

    }

    public function fullinstallment(Request $request)
    {

        $id = request('id');
        $batch_id = request('batch_id');
        $batch = Batch::find($batch_id);
        $course = $batch->course;
        $codeno = $course->code_no;
        $full_amount = $course->fees;



        $course_name = $batch->course->name;
        $course_fees = $batch->course->fees;

        $location_id = $batch->location_id;
        $location = Location::find($location_id);

        $city =$location->city;
        $zipcode = $city->zipcode;

        $inquire = Inquire::find($id);
        // dd($inquire);
        $preinstallment_date = $inquire->installmentdate;
        $preinstallment_amount = $inquire->installmentamount;
        $need_amount = request('amount');
        $payment_date =  request('installment_date');
        
        $lastInquire = Inquire::whereDate('updated_at',date('Y-m-d'))->where('receiveno','!=',null)->orderBy('updated_at','desc')->get();
        // dd($lastInquire);
        if($lastInquire->isEmpty()){
            // dd($lastInquire);
            $inquire->receiveno = date('dmy').$codeno.$zipcode.'001';
        }else
        {
            foreach ($lastInquire as $key => $value) {
                $databatch_id = $value->batch_id;

                $data_batch = Batch::find($databatch_id);
                $data_course = $data_batch->course;
                $data_codeno = $data_course->code_no;

                $datalocation_id = $data_batch->location_id;
                $data_location = Location::find($datalocation_id);

                $data_city = $data_location->city;
                $data_zipcode = $data_city->zipcode;
                // dd($data_batch);
                if($codeno == $data_codeno && $zipcode == $data_zipcode)
                {
                    //dd($value->receiveno);
                    $inquireno = $value->receiveno;
                    $inquire_no = ++$inquireno;
                    $inquire->receiveno = strval($inquire_no);
                    break;
                }else{
                    $inquire->receiveno = date('dmy').$codeno.$zipcode.'001';
                }
            }
        }

        $inquire->installmentdate = $payment_date;
        $inquire->installmentamount = $full_amount;
        $inquire->status = 2;
        $inquire->save();
        $date = date('d-m-Y');
        //dd($preinstallment_date,$preinstallment_amount,$payment_date,$need_amount,$course_name,$course_fees);


        $pdf = PDF::loadView('pdf.inquire',compact('inquire','batch','course_name','course_fees','preinstallment_date','preinstallment_amount','payment_date','need_amount','date'));

        return $pdf->stream();

       // return redirect()->route('inquires.index');


    }

    public function getBatches(Request $request)
    {
        $today = Carbon::now()->toDateString(); // 2020-07-21
        
        $course_id = request('course_id');
        $batches = Batch::where('course_id',$course_id)
                        ->get();

        $fillter_batches = [];
        foreach ($batches as $batch) { 
            $newdate = Carbon::create($batch->startdate)->addDay(5)->toDateString();
            if ($newdate >= $today) {
                $fillter_batches[] = $batch;
            }
        }
        
        return $fillter_batches;
    }

    public function postpone(Request $request)
    {
        $request->validate([
            'postpone' => 'required'
        ]);

        $id = request('id');
        $inquire = Inquire::find($id);
        $inquire->message = request('postpone');
        $inquire->save();
        return response()->json($inquire);

    }

    public function postpone_list($id)
    {
        $course = Course::find($id);
        $batches = $course->batches;
        return view('inquires.postpone_list',compact('batches','course'));
    }

    public function searchinquires(){

        $courses = Course::all();

        if (request('batch')) {
            $bid = request('batch');
            $batch = Batch::find($bid);
            // $students = Student::where('batch_id',$bid)->get();

            $inquires = Inquire::where('batch_id',$bid)->get();
            return view('inquires.search',compact('courses','inquires','bid','batch'));
        }else{
            // Return 
            return view('inquires.search',compact('courses'));
        }

    }

}