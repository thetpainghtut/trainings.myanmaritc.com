<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Expense;
use Auth;
use App\Income;

class ReportController extends Controller
{
    //
    public function report(){
        $dateY = date('Y') - 4; 
       //dd($dateY);
        $years = range(Carbon::now()->year, $dateY);
       /*dd($years);
       
       dd($dateY);*/

      
       return view('monthlyreports.report',compact('years'));
    }

    public function detailsearch(Request $request)
    {
        if(request('month') && request('year') ){
         $month = $request->month;
         $year = $request->year;

        switch ($month) {
            case 'Jan':
                $month='01';
                break;

            case 'Feb':
                $month='02';
                break;
            
            case 'Mar':
                $month='03';
                break;

            case 'April':
                $month='04';
                break;

            case 'May':
                $month='05';
                break;

            case 'June':
                $month='06';
                break;

            case 'July':
                $month='07';
                break;

            case 'Aug':
                $month='08';
                break;

            case 'Sep':
                $month='09';
                break;

            case 'Oct':
                $month='10';
                break;

            case 'Nov':
                $month='11';
                break;

            case 'Dec':
                $month='12';
                break;
            default:
                
                break;
        }
        //dd($month);
        $startdate = $year.'-'.$month.'-01';
        //dd($startdate);
        $enddate = $year.'-'.$month.'-31';
        //dd($enddate);
        $result = Expense::with('user')->whereBetween('date',[$startdate,$enddate])->get();
        $iresult = Income::with('user')->whereBetween('date',[$startdate,$enddate])->get();
       // dd($iresult);
       /* $result = DB::table('expenses')
                    ->join('users','users.id','=','expenses.user_id')
                    ->select('expenses.*','users.name as uname')
                    ->whereBetween('date',[$startdate,$enddate])
                    ->get();
                    //dd($result);
        $iresult = DB::table('incomes')
                    ->join('users','users.id','=','incomes.user_id')
                    ->select('incomes.*','users.name as iuname')
                    ->whereBetween('date',[$startdate,$enddate])
                    ->get();*/
                    //dd($iresult);
                    /*dd($result);*/
         return response()->json([
            "result"=>$result,
            "iresult"=>$iresult
        ],200);
     }
    }
}
