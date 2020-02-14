<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mentor;
use App\Course;
use App\Staff;
use App\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;


class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        use RegistersUsers;

    public function index()
    {
      $mentors = Mentor::all();
      return view('mentors.index',compact('mentors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $courses=Course::all();
        $staff_id=request('staff_id');
        $role=request('role');
        
        return view('mentors.create',compact('staff_id','role','courses'));
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

      $request->validate([
        "degree" => 'required',
        "portfolio" => 'required'
      ]);


      $staff_id=request('staff_id');

      $staff=Staff::find($staff_id);
        
      $staff_user = $staff->user_id;
      $user=User::find($staff_user);

      // Data Insert

      $mentor = new Mentor;
      $mentor->staff_id=request('staff_id');
      $mentor->course_id=request('course_id');
      $mentor->portfolio = request('portfolio');
      $mentor->degree = request('degree');
      $mentor->save();

      $user->assignRole(request('role'));

      // Return 
      return redirect()->route('staffs.index');

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
      $mentor = Mentor::find($id);
      return view('mentors.edit',compact('mentor'));
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
      // dd($request);

      $request->validate([
        "name" => 'required',
        "email" => 'required',
        "address" => 'required',
        "phone" => 'required',
        "portfolio" => 'required'
      ]);

      $mentor = Mentor::find($id);

      // Data Insert
      $user = $mentor->user;
      $user->name = request('name');
      $user->email = request('email');
      $user->password = Hash::make('123456789');
      $user->save();
      
      $user->assignRole('Mentor');

      $mentor->user_id = $user->id;
      $mentor->portfolio = request('portfolio');
      $mentor->phone = request('phone');
      $mentor->address = request('address');
      $mentor->save();

      // Return 
      return redirect()->route('mentors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $mentor = Mentor::find($id);
      
      $mentor->user->delete();
      
      $mentor->user->removeRole('Mentor');

      $mentor->delete();

      return redirect()->route('mentors.index');
    }


    public function show_mentor(Request $request)
    {
      $course_id = request('id');
      // dd($course_id);
      // $teacher=Teacher::where('course_id',$course_id)->with('staff')->get();
      $data=array();
      $teacher = DB::table('users')
                ->join('staff','staff.user_id','users.id')
                ->join('teachers','teachers.staff_id','staff.id')
                ->select('teachers.*','users.*','staff.*')
                ->where('teachers.course_id',$course_id)
                ->get();
      // dd($teacher);
      $mentor = DB::table('users')
                ->join('staff','staff.user_id','users.id')
                ->join('mentors','mentors.staff_id','staff.id')
                ->select('mentors.*','users.*','staff.*')
                ->where('mentors.course_id',$course_id)
                ->get();
      $data[]=array([
        'teachers' => $teacher,
        'mentors' => $mentor,
      ]);
      echo json_encode($data);
    }
}
