<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Group;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use DB; 


class TestExport implements WithMultipleSheets
{/*,ShouldAutoSize*/
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id = '';
   


    public function __construct($id){
        $this->id = $id;
        //dd($this->id);
    }

    public function sheets(): array
    {
        $sheets = [];
        $groups = Group::where('batch_id',$this->id)
                    // ->orderBy('id','desc')
                    ->get();
                    //dd($groups);
                              //  dd($customer);
                    //$snamea=[];
          // dd($groups);
           /* $id = $value['id'];
            $name = $value['name'];
             $customer = DB::table('group_student')
                                ->join('groups', 'groups.id', '=', 'group_student.group_id')
                                ->join('students', 'group_student.student_id', '=', 'students.id')
                                ->where ('group_student.group_id', '=', $id)
                                ->select('students.namee as sname')
                                ->get();
                               // array_push($snamea,$customer);

            $sheet = new UsersExport($groups, $name,$customer,$this->id);
            // $sheet->setColumnFormat(array('C' => '0%'));
            $sheets[] = $sheet;
            return $sheets;*/
            foreach ($groups as $key => $value) {
          //  dd($groups);
            $id = $value['id'];
            $name = $value['name'];
             $customer = DB::table('group_student')
                                ->join('groups', 'groups.id', '=', 'group_student.group_id')
                                ->join('students', 'group_student.student_id', '=', 'students.id')
                                ->where ('group_student.group_id', '=', $id)
                                ->select('students.namee as sname')
                                ->get();
                               // array_push($snamea,$customer);

            $sheets[] = new UsersExport($groups, $name,$customer,$this->id);
        }

        return $sheets;
        }
        
        // $sheets->setColumnFormat(array(
        //     'C' => '0%'
        // ));

        //return $sheets;
    

    /*public function view(): View
    {
    	$groups = Group::where('batch_id',$this->id)
                    // ->orderBy('id','desc')
                    ->get();
        $from = Carbon::createFromDate(2017, 7, 21);

        $to = Carbon::createFromDate(2017, 6, 21);

        $dates = $this->generateDateRange($to, $from);

    
        return view('export.view_attendancelist', [
             	'groups'=>$groups,
                'dates' =>$dates
            ]);
    }

    private function generateDateRange(Carbon $start_date, Carbon $end_date)

    {

        $dates = [];

        for($date = $start_date; $date->lte($end_date); $date->addDay()) {

            $dates[] = $date->format('Y-m-d');

        }

        return $dates;

    }*/

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:Z1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(16);
               
                 $event->sheet->getDefaultColumnDimension()->setWidth(100);

                 /*$event->sheet->getDefaultRowDimension()->setRowHeight(100);*/
                // Set A1:D4 range to wrap text in cells
                /*$event->sheet->getDelegate()->getStyle('A1:D4')
                    ->getAlignment()->setWrapText(true);*/
            
                //$event->sheet->getRowDimension(20)->setRowHeight(10);
            }
        ];
    }

}
/*https://github.com/Maatwebsite/Laravel-Excel/issues/2195*/
/*https://github.com/Maatwebsite/Laravel-Excel/issues/1584*/