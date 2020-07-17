<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Expense;
use App\Income;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Http\Controllers\ExportController;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Http\Resources\ExpenseResource;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MonthlyReportExport implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $month = '';
    protected $year = '';
    protected $incomeresult;
    protected $result;


    public function __construct($month,$year){
        $this->month = $month;
        $this->year = $year;
    }
  
    public function view(): View
    {
        switch ($this->month) {
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
            
            $startdate = $this->year.'-'.$month.'-01';
           
            $enddate =$this->year.'-'.$month.'-31';
           
            $phpresult = Expense::with('user')->whereBetween('date',[$startdate,$enddate])
                         ->select('type as etype','description as edescription','date as edate','amount as eamount')
                         ->where('expenses.type','=','PHP')
                        ->get();
          
            $phpresults = count($phpresult);

            $phptotals = Expense::with('user')->whereBetween('date',[$startdate,$enddate])->where('type','=','PHP')->sum('amount');

            $recruitmentresult = Expense::with('user')->whereBetween('date',[$startdate,$enddate])
                         ->select('type as etype','description as edescription','date as edate','amount as eamount')
                         ->where('type','=','Recruitment')
                        ->get();
           
            $recruitmentresults = count($recruitmentresult);

            $recruitmentresult = Expense::with('user')->whereBetween('date',[$startdate,$enddate])
                         ->select('type as etype','description as edescription','date as edate','amount as eamount')
                         ->where('type','=','Recruitment')
                        ->get();

            $recruitmenttotals = Expense::with('user')->whereBetween('date',[$startdate,$enddate])->where('type','=','Recruitment')->sum('amount');

            $hrresult = Expense::with('user')->whereBetween('date',[$startdate,$enddate])
                         ->select('type as etype','description as edescription','date as edate','amount as eamount')
                         ->where('type','=','HR')
                        ->get();
           
            $hrresults = count($hrresult);

            $hrtotals = Expense::with('user')->whereBetween('date',[$startdate,$enddate])
                        ->where('type','=','HR')
                        ->sum('amount');

            $generalresult = Expense::with('user')->whereBetween('date',[$startdate,$enddate])
                         ->select('type as etype','description as edescription','date as edate','amount as eamount')
                         ->where('type','=','General')
                        ->get();
            
            $generalresults = count($generalresult);

            $generaltotals = Expense::with('user')->whereBetween('date',[$startdate,$enddate])->where('type','=','General')->sum('amount');

            $iresult = Income::with('user')->whereBetween('date',[$startdate,$enddate])->sum('incomes.amount');
            
            $incomeresult = Income::with('user')->whereBetween('date',[$startdate,$enddate])
                         ->select('description as idescription','date as idate','amount as iamount')->get();

            $result1 = Expense::with('user')->whereBetween('date',[$startdate,$enddate])->sum('amount');
        
            $total = $iresult-$result1;
             
            $export=[];
            array_push($export,[' ','','',$total]);
            return view('export.view_monthlyexpenselist', [
                'hrs' => $hrresult,
                'phps' => $phpresult,
                'recruitments' => $recruitmentresult,
                'generals' => $generalresult,
                'generalcount'=>$generalresults,
                'hrcount'=>$hrresults,
                'recruitmentcount'=>$recruitmentresults,
                'phpcount'=>$phpresults,
                'recruitmenttotal'=>$recruitmenttotals,
                'hrtotal'=>$hrtotals,
                'phptotal'=>$phptotals,
                'generaltotal'=>$generaltotals,
                'totalexpense'=>$result1,
                'incomeexpense'=>$iresult,
                'change'=>$total,
                'incomeresults'=>$incomeresult,
                'year' => $this->year,
                'month'=>$this->month
            ]);
     }

   public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:Z1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
              
            },
        ];
    }
}
