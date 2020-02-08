<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\WithTitle;
use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\CarbonPeriod;
use DB;
use App\Batch;

class UsersExport implements FromView, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $groups;
    private $name;
    private $customer;
    private $bid;


    public function __construct($groups, $name,$customer,$bid)
    {
        $this->groups = $groups;
        $this->name = $name;
        $this->customer = $customer;
        $this->bid = $bid;

    }

    public function view(): View
    {
        $batch = Batch::find($this->bid);
       
        $Date = $this->getDatesFromRange($batch->startdate, $batch->enddate); 
        $start = $batch->startdate;
        $end = $batch->enddate;
       
     $gcounts = $this->customer;
     foreach($gcounts as $ggroup){
         $gcount[] = $ggroup;
     }
   
        
        return view('export.view_attendancelist', [
            'groups' =>$this->customer,
            'name' => $this->name,
            'Date' => $Date,
            'ggcountt'=>$gcount
        ]);
    }

     function getDatesFromRange($start, $end, $format = 'Y-m-d') { 

    // Declare an empty array 
            $array = array(); 

    // Variable that store the date interval 
    // of period 1 day 
            $interval = new DateInterval('P1D'); 

            $realEnd = new DateTime($end); 
            $realEnd->add($interval); 

            $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

    // Use loop to store date into array 
            foreach($period as $date) { 

                $array[] = $date;
               

            }
         
           
            return $array;
                 
            } 


    /**
     * @return string
     */
    public function title(): string
    {
        return 'Group ' . $this->name;
    }

}


/*https://phpspreadsheet.readthedocs.io/en/latest/topics/recipes/#setting-a-columns-width
*/

/*https://github.com/Maatwebsite/Laravel-Excel/issues/1779*/

/*https://stackoverflow.com/questions/15886166/calculate-sundays-between-two-dates*/

/*https://stackoverflow.com/questions/31849334/php-carbon-get-all-dates-between-date-range*/

/*https://stackoverflow.com/questions/1485480/php-how-to-get-sunday-and-saturday-given-a-date-input*/

/*how to get user input date sunday in php*/

/*https://www.geeksforgeeks.org/return-all-dates-between-two-dates-in-an-array-in-php/*/

/*https://stackoverflow.com/questions/12365461/day-difference-without-weekends*/

/*https://stackoverflow.com/questions/4383914/how-to-get-single-value-from-this-multi-dimensional-php-array*/

/*https://stackoverflow.com/questions/3352712/get-date-range-between-two-dates-excluding-weekends*/