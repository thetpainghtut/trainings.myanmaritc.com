<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $expenses = Expense::all();
        return view('expenses.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('expenses.create');
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

        $this->validate($request, [
                'image' => 'required',
                'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'type' => 'required',
                'amount' => 'required',
                'description' => 'required',
                'date' => 'required'

        ]);


       /* if($request->hasfile('image'))
         {
            foreach($request->file('image') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(public_path().'/expenseimages/', $name);  
                $data[] = $name;  
            }
         }*/
         $data=[];
        if ($request->hasfile('image')) {
            foreach($request->file('image') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/expenseimages/', $name);  
                $filename = '/expenseimages/'.$name; 
                array_push($data, $filename); 
            }
        }
        $photoString = implode(',', $data);


         $expense= new Expense();
         $expense->type = request('type');
         $expense->amount = request('amount');
         $expense->description = request('description');
         $expense->date = request('date');
         $expense->user_id = Auth::user()->id;
         $expense->attachment=$photoString;
         $expense->save();

         return redirect()->route('expenses.index');
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
        $expense = Expense::find($id);
        return view('expenses.edit',compact('expense'));
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
        $expense = Expense::find($id);
        $expense->delete();

        return redirect()->route('expenses.index');
    }
}
