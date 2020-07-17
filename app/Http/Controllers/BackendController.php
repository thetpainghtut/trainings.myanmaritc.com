<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Batch;
use App\Student;
use Illuminate\Database\Eloquent\Builder;

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
    $students = Student::whereDoesntHave('groups')->where('batch_id',$bid)->get();

    // $students = Student::whereDoesntHave('groups', function (Builder $query) use ($bid) {
    //   $query->where('batch_id', $bid);
    // })->get();

    return $students;
  }
}
