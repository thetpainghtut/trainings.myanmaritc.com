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

        elseif(Auth::user()->staffs)
        {   
            Auth::logout();
            return redirect()->route('login')->with('msg','You are not our members anymore') ;
        }
        
        elseif($user->hasRole('Mentor')) {
            return redirect('/students');
        }
        elseif($user->hasRole('Teacher')){
            return redirect('/students');
        }
        elseif($user->hasRole('HR')){
            return redirect('/incomes');
        }elseif($user->hasRole('Reception')){
            return redirect('/courses');
        }

        
        else {
            return redirect('/');
        }
    }
}
