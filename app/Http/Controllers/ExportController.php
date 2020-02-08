<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\TestExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    //

    public function export($id)
    {

    	return Excel::download(new TestExport($id),'attendance.xlsx');
    }
}
