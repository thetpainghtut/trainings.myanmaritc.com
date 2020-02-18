<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;
use App\Batch;
use App\Township;
use App\Inquire;
use App\Location;

class InquireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $inquires = Inquire::all();
        return view('inquires.index',compact('inquires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $educations = Education::all();
        $batches = Batch::all();
        $townships = Township::all();
        return view('inquires.create',compact('educations','batches','townships'));
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
            "township_id" => "required",

        ]);
        $id =request('batch_id');
        $batch = Batch::find($id);
        // dd($batch);
        $course =$batch->course;
        $codeno = $course->codeno;

        $location_id = $course->location_id;
        $location = Location::find($location_id);

        $city = $location->city;

        $zipcode = $city->zipcode;

        $lastInquire = Inquire::orderBy('created_at', 'desc')->first();

        $inquires = new Inquire();

        if($lastInquire){
            $lastDate =$lastInquire->created_at->format('Y-m-d');

            if($lastDate == date('Y-m-d')){
                $inquires->inquireno = $lastInquire->inquireno+1;
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
        $inquires->township_id = request('township_id');
        $inquires->township_id = request('township_id');
        $inquires->user_id = 1;
        $inquires->save();

        return redirect()->route('inquires.index');

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
        $inquire = Inquire::find($id);
        dd($inquire);
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
        $id = request('id');
        $inquire = Inquire::find($id);
        $inquire->installmentdate = request('installment_date');
        $inquire->installmentamount = request('installment_amount');
        $inquire->status = 1;
        $inquire->save();
        
        return redirect()->route('inquires.index');

    }

    public function fullinstallment(Request $request)
    {
        $id = request('id');
        $batch_id = request('batch_id');
        $batch = Batch::find($batch_id);
        $course = $batch->course;
        $codeno = $course->codeno;
        $full_amount = $course->fees;

        $location_id = $course->location_id;
        $location = Location::find($location_id);

        $city =$location->city;
        $zipcode = $city->zipcode;

        $inquire = Inquire::find($id);
        $lastInquire = Inquire::whereDate('updated_at',date('Y-m-d'))->where('receiveno','!=',null)->orderBy('updated_at','desc')->get();
        //dd($lastInquire);
        if($lastInquire->isEmpty()){
            //dd($lastInquire);
            $inquire->receiveno = date('dmy').$codeno.$zipcode.'001';
        }else
        {
            foreach ($lastInquire as $key => $value) {
                $databatch_id = $value->batch_id;

                $data_batch = Batch::find($databatch_id);
                $data_course = $data_batch->course;
                $data_codeno = $data_course->codeno;

                $datalocation_id = $data_course->location_id;
                $data_location = Location::find($datalocation_id);

                $data_city = $data_location->city;
                $data_zipcode = $data_city->zipcode;
                //dd($data_zipcode);
                if($codeno == $data_codeno && $zipcode == $data_zipcode)
                {
                    //dd($value->receiveno);
                    $inquire->receiveno = $value->receiveno+1;
                    break;
                }else{
                    $inquire->receiveno = date('dmy').$codeno.$zipcode.'001';
                }
            }
        }

        /*$lastInquire = Inquire::orderBy('updated_at','desc')->first();
        if($lastInquire){
            $databatch_id = $lastInquire->batch_id;

            $data_batch = Batch::find($databatch_id);
            $data_course = $data_batch->course;
            $data_codeno = $data_course->codeno;

            $datalocation_id = $data_course->location_id;
            $data_location = Location::find($datalocation_id);

            $data_city = $data_location->city;
            $data_zipcode = $data_city->zipcode;

            if($codeno == $data_codeno && $zipcode == $data_zipcode){
                if($lastInquire->receiveno != null){
                    $inquire->receiveno = $lastInquire->receiveno+1;
                }else{
                    $inquire->receiveno = date('dmy').$codeno.$zipcode.'001';
                }
            }else{
                $inquire->receiveno = date('dmy').$codeno.$zipcode.'001';
            }
        }else{
            $inquire->receiveno = date('dmy').$codeno.$zipcode.'001';
        }*/

        $inquire->installmentdate = request('installment_date');
        $inquire->installmentamount = $full_amount;
        $inquire->status = 2;
        $inquire->save();

        return redirect()->route('inquires.index');


    }
}
