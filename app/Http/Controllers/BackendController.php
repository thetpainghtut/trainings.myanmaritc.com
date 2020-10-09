<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Batch;
use App\Student;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Resources\BatchStudentResource;
use Auth;
use App\Staff;
use App\Teacher;
class BackendController extends Controller
{
    public function createGroup($value='')
    {
        $user = Auth::user()->id;
        $role = Auth::user()->getRoleNames();
        if($role[0] == 'Teacher'){
            $staff = Staff::with('teacher')->where('user_id',$user)->get();
           
            $teacher = Teacher::with('course')->where('staff_id',$staff[0]->id)->get();

            $courses = array();
            foreach ($teacher as $key => $value) {
              array_push($courses,$value->course);
            }
            //$courses = Course::all();
            $batches = Batch::all();

            return view('backend.creategroup',compact('courses','batches'));
        }elseif($role[0] == 'Mentor'){
            $staffs = Staff::where('user_id',$user)->get();
            $courses = $staffs[0]->mentor[0]->course;
            $batches = Batch::all();

            return view('backend.creategroup',compact('courses','batches'));
        }
    }

    public function getstudentformembers(Request $request)
    {
        $bid = request('bid');

        // nyiyelin
        $students = Student::whereDoesntHave('groups')->get();
        // dd($students);
        $batch_students = BatchStudentResource::collection($students);


        // $students = Student::whereDoesntHave('groups')->where('batch_id',$bid)->get();

        // $students = Student::whereDoesntHave('groups', function (Builder $query) use ($bid) {
        //   $query->where('batch_id', $bid);
        // })->get();

        return response()->json($batch_students);
    }
}
