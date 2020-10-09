<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Income;
use Auth; 

class IncomeController extends Controller
{
    public function __construct()
    {

        $this->middleware(['role:Admin|Recruitment'],['only' => ['index']]); 
        $this->middleware(['role:Recruitment'],['only' => ['create','edit','store','update','destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $incomes = Income::all();
        return view('incomes.index',compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $locations = Location::all();
        return view('incomes.create',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'amount'=>'required',
            'description'=>'required',
            'date'=>'required',
            'location_id'=>'required',
        ]);

        $income = new Income();
        $income->amount = request('amount');
        $income->description = request('description');
        $income->date = request('date');
        $income->location_id = request('location_id');
        $income->user_id = Auth::user()->id;
        $income->save();

        return redirect()->route('incomes.index');
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
        $income = Income::find($id);
        $locations = Location::all();

        return view('incomes.edit',compact('income','locations'));
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
        $request->validate([
            'amount'=>'required',
            'description'=>'required',
            'date'=>'required',
            'location_id'=>'required',
        ]);

        $income = Income::find($id);
        $income->amount = request('amount');
        $income->description = request('description');
        $income->date = request('date');
        $income->location_id = request('location_id');
        $income->user_id = Auth::user()->id;
        $income->save();

        return redirect()->route('incomes.index');
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
        $income = Income::find($id);
        $income->delete();

        return redirect()->route('incomes.index');
    }
}
