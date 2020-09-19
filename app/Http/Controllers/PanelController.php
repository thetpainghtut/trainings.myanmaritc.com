<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Student;

class PanelController extends Controller
{
    public function index()
    {
        $auth = Auth::user();

        $studentinfo = $auth->student;

        $batch = $studentinfo->batch;

        dd($batch);

    	return view('panel.dashboard');
    }
}
