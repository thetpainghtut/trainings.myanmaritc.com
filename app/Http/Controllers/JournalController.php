<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Journal;
use App\Subject;
use Auth;


class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Journal::where('type','=','Activity')
                    ->orderBy('created_at', 'DESC')
                    ->get();
        $sharings = Journal::where('type','=','Sharing')
                    ->orderBy('created_at', 'DESC')
                    ->get();

        return view('journals.index',compact('activities','sharings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('journals.create',compact('subjects'));
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
            'title' => 'required|max:100',
            'content'=>'required',
            "file" => 'required'
        ]);

        if($request->hasfile('file')){

            $file = $request->file('file');

            $file_extension = $file->getClientOriginalExtension();

            $upload_dir = public_path().'/storage/images/journals/';

            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move($upload_dir,$name);
            $path = '/storage/images/journals/'.$name;
        }else{
            $path = '';
        }

        $journal = new Journal;
        $journal->title = request('title');
        $journal->content = request('content');
        $journal->file = $path;
        $journal->type = request('type');
        $journal->user_id = Auth::user()->id;
        $journal->save();

        $journal->subjects()->attach(request('subjects'));

        return redirect()->route('journals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $journal = Journal::find($id);

        return view('journals.detail',compact('journal'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $journal = Journal::find($id);
        $subjects = Subject::all();

        return view('journals.edit',compact('journal','subjects'));
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
            'title' => 'required|max:100',
            'content'=>'required'
        ]);

        if($request->hasfile('file')){

            $file = $request->file('file');

            $file_extension = $file->getClientOriginalExtension();

            $upload_dir = public_path().'/storage/images/journals/';

            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move($upload_dir,$name);
            $path = '/storage/images/journals/'.$name;
        }else{
            $path = request('oldfile');
        }

        $journal = Journal::find($id);
        $journal->title = request('title');
        $journal->content = request('content');
        $journal->file = $path;
        $journal->type = request('type');
        $journal->user_id = Auth::user()->id;
        $journal->save();

        if (request('type') == 'Sharing') {
            $journal->subjects()->detach();
            $journal->subjects()->attach(request('subjects'));
        }
        

        return redirect()->route('journals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $journal = Journal::find($id);

        $journal->subjects()->detach();
        
        $journal->delete();

        return redirect()->route('journals.index');

    }
}
