<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;
use App\Batch;
use App\Township;
use App\Inquire;

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
            "installment_date" => "required",
            "installment_amount" => "required",
            "knowledge" => "required",
            "camp" => "required",
            "education_id" => "required",
            "acceptedyear" => "required",
            "batch_id" => "required",
            "township_id" => "required",

        ]);

        $inquires = new Inquire();
        $inquires->name = request('name');
        $inquires->gender = request('gender');
        $inquires->phone = request('phone');
        $inquires->installmentdate = request('installment_date');
        $inquires->installmentamount = request('installment_amount');
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
