<?php

namespace App\Http\Controllers;

use App\Question;
use App\Quizz;
use Auth;
use App\Check;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Teacher|Mentor']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = Array();
        $request->validate([
                'type' => 'required',
                'question' => 'required',
                'trueanswer' => 'required',
                'answer' => 'required',
        ]);
        if($request->hasfile('photo')){
            $photo = $request->file('photo');
            $name = time().'.'.$photo->getClientOriginalExtension();
            $dir = '/storage/images/questions/';
            $photo->move(public_path().$dir,$name);
            $filepath = $dir.$name;
        }else{
            $filepath='';
        }
        $questiontext = $request->question;
        $type = $request->type;
        $timer = $request->timer;
        $quizz_id = $request->quizz_id;

        $question = new Question;
        $question->questiontext = $questiontext;
        $question->photo = $filepath;
        $question->timer = $timer;
        $question->type = $type;
        $question->quiz_id = $quizz_id;
        $question->user_id = Auth::id();

        $question->save();

        $answer = $request->answer;
        $trueanswer = $request->trueanswer;
        // dd($trueanswer);
        $true;
        
        foreach ($answer as $key => $ans) {
            $flipped = array_flip($trueanswer);
            
            $answer = new Check;
            $answer->answer = $ans;
            if(array_key_exists($key, $flipped)){
                $answer->rightanswer = "true";
            }else{
                $answer->rightanswer = "false";
            }
            $answer->question_id = $question->id;
            $answer->save();

        }
        return redirect('questions/'.$quizz_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $quizz = Quizz::find($id);
        // dd($id);
        $questions = Question::where('quiz_id',$id)->get();
        return view('question.index',compact('questions','quizz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('question.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $data = Array();
        $request->validate([
                'type' => 'required',
                'question' => 'required',
                'trueanswer' => 'required',
                'answer' => 'required',
        ]);
        if($request->hasfile('newphoto')){
            $photo = $request->file('newphoto');
            $name = time().'.'.$photo->getClientOriginalExtension();
            $dir = '/storage/images/questions/';
            $photo->move(public_path().$dir,$name);
            $filepath = $dir.$name;
        }else{
            $filepath=$request->oldphoto;;
        }
        $questiontext = $request->question;
        $type = $request->type;
        $timer = $request->timer;
        $quizz_id = $request->quizz_id;

        // $question = new Question;
        $question->questiontext = $questiontext;
        $question->photo = $filepath;
        $question->timer = $timer;
        $question->type = $type;
        $question->quiz_id = $quizz_id;
        $question->user_id = Auth::id();

        $question->save();

        $answer = $request->answer;
        $trueanswer = $request->trueanswer;
        // dd($trueanswer);
        $true;
        $answers = Check::where('question_id',$question->id)->get();
        foreach ($answers as $value) {
            $value->delete();
        }
        // dd($answer);
        foreach ($answer as $key => $ans) {
            $flipped = array_flip($trueanswer);
            
            // foreach ($answers as $value) {
            if($ans != null){
                $answer = new Check;

                $answer->answer = $ans;
                if(array_key_exists($key, $flipped)){
                    $answer->rightanswer = "true";
                    echo "true";
                }else{
                    $answer->rightanswer = "false";
                    echo "false";
                }
                $answer->question_id = $question->id;
                
            // }
            $answer->save();
            }
            

        }
        // die();
        return redirect('questions/'.$quizz_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        // dd($question);
        $question->delete();
        $answers = Check::where('question_id',$question->id)->get();
        foreach ($answers as $value) {
            $value->delete();
        }
        return back();


    }


    public function createform($id)
    {
        $quizz = Quizz::find($id);
        return view('question.create',compact('quizz'));
    }
}
