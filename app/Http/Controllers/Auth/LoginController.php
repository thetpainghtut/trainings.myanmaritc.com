<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::BACKEND;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    protected function authenticated($request, $user){

        if($user->hasRole('Admin')){
            return redirect('/students');
        }
<<<<<<< HEAD
// <<<<<<< HEAD
//         elseif($user->hasRole('Mentor')) {
//             return redirect('/students');
//         }
//         elseif($user->hasRole('Teacher')){
//             return redirect('/students');
//         }
//         elseif($user->hasRole('HR')){
//             return redirect('/incomes');
//         }elseif($user->hasRole('Reception')){
//             return redirect('/courses');
//         }
// =======

// >>>>>>> 8fc8234fc4c81f694865982cba68a374b6426b01
=======

>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7
        elseif(Auth::user()->staffs)
        {   
            Auth::logout();
            return redirect()->route('login')->with('msg','You are not our members anymore') ;
<<<<<<< HEAD
=======
            
        }elseif($user->hasRole('Student')){
        if(Auth::user()->student->batches){
            foreach (Auth::user()->student->batches as  $value) {
                if($value->pivot->status == "Active"){
                    return redirect('/panel');
                }else{
                    Auth::logout();
                return redirect()->route('login')->with('msg','You are not our student anymore') ;
                }
            }
            }
>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7
        }
        
        elseif($user->hasRole('Mentor')) {
            return redirect('/students');
        }
        elseif($user->hasRole('Teacher')){
            return redirect('/students');
        }
        elseif($user->hasRole('HR')){
            return redirect('/incomes');
        }elseif($user->hasRole('Business Development')){
            return redirect('/batches');
        }
        elseif($user->hasRole('Student')){
            return redirect('/panel');
        }

        else {
            return redirect('/');
        }
    }
}
