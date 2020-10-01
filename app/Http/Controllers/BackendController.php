<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Batch;
use App\Student;
use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
=======
use App\Http\Resources\BatchStudentResource;

>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7

class BackendController extends Controller
{
    public function createGroup($value='')
    {
        $courses = Course::all();
        $batches = Batch::all();

        return view('backend.creategroup',compact('courses','batches'));
    }

    public function getstudentformembers(Request $request)
    {
        $bid = request('bid');

<<<<<<< HEAD
        $students = Student::whereDoesntHave('groups')->where('batch_id',$bid)->get();
=======
        // nyiyelin
        $students = Student::whereDoesntHave('groups')->get();
        // dd($students);
        $batch_students = BatchStudentResource::collection($students);


        // $students = Student::whereDoesntHave('groups')->where('batch_id',$bid)->get();
>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7

        // $students = Student::whereDoesntHave('groups', function (Builder $query) use ($bid) {
        //   $query->where('batch_id', $bid);
        // })->get();

<<<<<<< HEAD
        return $students;
=======
        return response()->json($batch_students);
>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7
    }
}
