<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\TestExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MonthlyReportExport;

class ExportController extends Controller
{
    //

    public function export($id)
    {

    	return Excel::download(new TestExport($id),'attendance.xlsx');
    }


    public function monthlyreport($month, $year)
    {
        return Excel::download(new MonthlyReportExport($month,$year), 'YEAR_MONTH_DATA_AT_' . $year . '_'. $month . '.xlsx');
    }
}
