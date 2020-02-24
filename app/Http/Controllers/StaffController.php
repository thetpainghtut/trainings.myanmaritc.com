<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;
use App\Staff;
use App\User;
use App\Course;
use App\Teacher;

use DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;


class StaffController extends Controller
{
     public function __construct($value='')
    {
        $this->middleware('role:Admin')->except('update','changepassword','show','edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        use RegistersUsers;
        
    public function index()
    {
        //
        $roles=Role::all();
        $user = User::role('Mentor')->with('staff')->get();
        $role_name = "Mentor";
       
        return view('staff.index',compact('roles','user','role_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        $locations = Location::all();
        return view('staff.create',compact('locations','roles'));
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
                'name' => 'required|min:5|max:100', 
                'email' =>'required|unique:users',
                'nrc' => 'required|unique:staff',
                'dob' => 'required',
                'phone' => 'required',
                'joindate' =>'required',
                'fathername' => 'required|min:5|max:100', 
                'location_id' => 'required',
                'profile' => 'mimes:png,jpeg,gif',
            ]);

        $nrc_num=request('nrc');
        // validate nrc format
        if(preg_match("/^[1-9]{1,2}\/(([A-Z]|[a-z]){1}([A-Z]|[a-z]){0,2}){3}\b((\(N\))|(\(Naing\))|(\(NAING\)))[0-9]{6}$/",$nrc_num))
        {
            // catch photo
            if($request->hasfile('profile'))
            {
                $photo = $request->file('profile');
                $dir = '/img/staff/';
                $name = time().'.'.$photo->getClientOriginalExtension();
                $photo->move(public_path().$dir,$name);
                $file_path = $dir.$name;
            }
            else{

                $file_path='/img/avatar.jpg';
            }


            // data insert into user
            $user = new User;
            $user->name = request('name');
            $user->email=request('email');
            $user->password=Hash::make("123456789");
            $user->save();
            $id = $user->id;
            // data insert into staff
            $staff = new Staff;
            $staff->dob=request('dob');
            $staff->fathername=request('fathername');
            $staff->nrc=$nrc_num;
            $staff->phone=request('phone');
            $staff->photo=$file_path;
            $staff->joineddate=request('joindate');
            $staff->location_id=request('location_id');
            $staff->user_id=$id;
            $staff->save();



            // echo "Success";

            if(request('role')=="Teacher")

            {
                $staff_id=$staff->id;
                $role=request('role');
                $courses = Course::all();
                return redirect()->route('teacher.create',compact('staff_id','role'));
            }

            elseif ( request('role')=="Mentor") {
                $staff_id=$staff->id;
                $role=request('role');
                $courses = Course::all();
                return redirect()->route('mentors.create',compact('staff_id','role'));
            }
            else{
                $user->assignRole(request('role'));
                return redirect()->route('staffs.index');

            }

        }   
        else{
            return back()->with('nrc_error','Nrc Format is not correct!!');


        }
    
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
        // dd($id);
        $user = User::find($id);
        $role = $user->getRoleNames();
        return view('staff.show',compact('user','role'));
        
        
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
        $user = User::find($id);
        // dd($id);
        $courses=Course::all();
        $role = $user->getRoleNames();
        $locations=Location::all();
        // dd($role);
        return view('staff.edit',compact('user','role','courses','locations'));

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
        // dd($request);
        $request->validate([
                'name' => 'required|min:5|max:100', 
                'email' =>'required',
                'nrc' => 'required',
                'dob' => 'required',
                'phone' => 'required',
                'joindate' =>'required',
                'fathername' => 'required|min:5|max:100', 
                'location_id' => 'required',
                
            ]);

        $nrc_num=request('nrc');
        // validate nrc format
        if(preg_match("/^[1-9]{1,2}\/((A|B|D|G|H|K|L|M|N|P|R|S|T|U|W|Y|Z){1}[a-z]{0,2}){3}\b(\(N\))[0-9]{6}$/",$nrc_num))
        {
            // catch photo
            if($request->hasfile('newphoto'))
            {
                $photo = $request->file('newphoto');
                $dir = '/img/staff/';
                $name = time().'.'.$photo->getClientOriginalExtension();
                $photo->move(public_path().$dir,$name);
                $file_path = $dir.$name;
            }
            else{

                $file_path=request('oldphoto');
            }


            // data insert into user
            $user = User::find($id);
            $user->name = request('name');
            $user->email=request('email');
           
            $user->save();
            // dd($user);
            $uid = $user->id;
            // data insert into staff
            $staff =Staff::where('user_id',$uid)->first();
            // dd($staff);
            $staff->dob=request('dob');
            $staff->fathername=request('fathername');
            $staff->nrc=$nrc_num;
            $staff->phone=request('phone');
            $staff->photo=$file_path;
            $staff->joineddate=request('joindate');
            $staff->location_id=request('location_id');
            $staff->user_id=$uid;
            $staff->save();


            if(request('role')=="Teacher")

            {
                $staff_id=$staff->id;
                $role=request('role');
                $teacher = Teacher::where('staff_id',$staff_id)->first();
                $teacher->course_id=request('course_id');
                $teacher->degree=request('degree');
                $teacher->save();
                return redirect()->route('dashboard');
            }

            elseif ( request('role')=="Mentor") {
                $staff_id=$staff->id;
                $role=request('role');
                $mentor = Mentor::where('staff_id',$staff_id)->first();
                $mentor->course_id=request('course_id');
                $mentor->portfolio=request('portfolio');
                $mentor->degree=request('degree');
                return redirect()->route('dashboard');

            }
            else{
                $user->assignRole(request('role'));
                return redirect()->route('staffs.index');

            }
            return redirect()->route('staffs.index');

        }   
        else{
            return back()->with('nrc_error','Nrc Format is not correct!!');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }

    public function all_staff(Request $request)
    {
        $staff_role = request('role_name');
        // $staff = Role::where('name',$staff_role);
        $user = User::role($staff_role)->with('staff')->with('teacher')->get();
        return $user;
    }

    public function status_change($id)
    {
        $leave_date=date('Y-m-d');
        // dd($leave_date);
        $staff = Staff::find($id);
        $staff->leavedate=$leave_date;
        $staff->status=true;
        $staff->save();
        return back();
    }

    public function changepassword(Request $request,$id)
    {
        $request->validate([
            'password'=>'required|min:8',
        ]);
        $user=User::find($id);
        $user->password=Hash::make(request('password'));
        $user->save();
        return back()->with('message','Successfully change password');
    }

   
}
