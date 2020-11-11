<?php

namespace App\Http\Controllers;
use App\Student;
use App\Course;
use App\Batch;
use App\Group;
use App\Unit;
use App\Inquire;
use App\Attendance;
use Barryvdh\DomPDF\Facade as PDF;
// use PDF;
use App\Installment;
use App\Location;
use Anam\PhantomMagick\Converter;
use View;

use Illuminate\Http\Request;

class PrintController extends Controller
{

	public function grade($batchid)
	{
		$batch = Batch::find($batchid);
    	$courseid = $batch->course->id;
    	$units = Unit::with('students')->where('course_id',$courseid)->get();


		$students_units = Student::with(['batches' => function($q) use($batchid)    {
              return $q->where('batch_id', $batchid);
            }]) 
						->whereHas('units', function($q1) use ($courseid)
						{ 
							return $q1->where('course_id',$courseid);
    					})
    					->orderBy('students.id')
    					->get();

    	$student_symbol_groups = array(); 
    	$symbol_points=0;

        // dd($students_units);


    	foreach ($students_units as $value) 
    	{
    		$data_one = $value->units->groupBy('pivot.unit_id');

    		// echo $data_one;
    		$symbol_marks = array();

    		foreach ($data_one as $d_one_value) 
    		{
    			$unit_count = $d_one_value->count();

    			$unit_point_total = $d_one_value->sum('pivot.symbol');

    			$unit_point = round($unit_point_total / $unit_count);

    			$symbol;
    			switch ($unit_point) 
    			{
		          	case (0 <= $unit_point &&  $unit_point <= 20):
		            	$symbol = 'E';
		            	break;
		          	case (20 <= $unit_point && $unit_point <= 40):
		            	$symbol = 'D';
		            	break;
		          	case (40 <= $unit_point && $unit_point <= 60):
		            	$symbol = 'C';
		            	break;
		          	case (60 <= $unit_point && $unit_point <= 80):
		            	$symbol = 'B';
		            	break;
		          	default:
		            	$symbol = 'A';
		            	break;
		        }

		        $points = $unit_point.'-'.$symbol;

		        // $marks[] = $points;

		        array_push($symbol_marks, $points);

		        // echo $points;
    		}


    		// echo "<hr>";

    		array_push($student_symbol_groups, $symbol_marks);
    	}



        // return view('pdf.grading',compact('students_units', 'units' ,'student_symbol_groups'));


    	$pdf = PDF::loadView('pdf.grading', compact('students_units', 'units' ,'student_symbol_groups','batch'));
    	return $pdf->stream();

	}

    public function grade_old($batchid)
    {
    	$students = Student::where('batch_id',$batchid)->first();

    	$batch = Batch::find($batchid);
    	$courseid = $batch->course->id;

    	$units_id = Unit::where('course_id',$courseid)->get()->pluck('id')->all();

    	$students_units = Student::where('batch_id',$batchid)
						->whereHas('units', function($q1) use ($courseid)
						{ 
							$q1->where('course_id',$courseid);;
    					})
    					->orderBy('students.id')
    					->get();


    	foreach ($students_units as $value) 
    	{
    		echo $value->units->sum('pivot.symbol')."<br>";
    	}

    	dd($students_units);

    	foreach($students_id as $student_id)
    	{
    		// var_dump($student_id);
			foreach ($units_id as $unit_id) 
			{
		    	for ($i=0; $i < count($students_units) ; $i++) 
		    	{ 
					$units = $students_units[$i]->units;

					foreach ($units as $key => $value) 
		    		{
		    			$unit = $units[$key];

		    			// $studentid = $students_units[$i]->id;
			    		$pivot_studentid = $unit->pivot['student_id'];
			    		$pivot_unitid = $unit->pivot['unit_id'];
			    		$pivot_symbol = $unit->pivot['symbol'];

			    		// echo "StundetID :".$pivot_studentid."<br>";
			    		// echo "UnitID :".$pivot_unitid."<br>";
			    		// echo "Symbol :".$pivot_symbol."<br>";
			    		// echo "<hr>";

			    		if ($student_id == $pivot_studentid) 
			    		{
			    			array_push($symbol_points, $pivot_symbol);
			    		}

			    		// $symbol_points += $pivot_symbol++;		    			
		    		}		    		
				}
			}

    	}
    		

    		var_dump($symbol_points);

    		// foreach ($units->pivot as $value) 
    		// {    			
    		// 	// $pivots = $value['symbol'];

    		// 	// foreach ($pivots as $pivot) 
    		// 	// {
    		// 	// 	var_dump($pivot);
    		// 	// }

    		// 	// $pivot_studentid = $value->pivot->student_id;
    		// 	// $pivot_unitid = $value->pivot->unit_id;
    		// 	// $pivot_symbol = $value->pivot->symbol;

    			

    		// }
    		

    	die();
    	

    	$units = Unit::with('students')->where('course_id',$courseid)->get();


    	$pdf = PDF::loadView('pdf.grading', compact('students','units'));
    	return $pdf->stream();

    	// dd($units);
    }



    public function absence($id,$date)
    {
       $studentid = Student::find($id);

       $studentname = $studentid->namee;
       $absencedate = $date;
       $remarks = Attendance::where('student_id',$studentid->id)->where('date',$absencedate)->select('remark')->get();
       foreach ($remarks as $key => $value) {
          $remark = $value->remark;
       }
      

        $s = strtotime($absencedate);
        $day = date('d', $s);
        $month = date('M', $s);
        $year = date('Y',$s);

       $totaldate = $day.' '.$month.', '.$year;
      
       $batchid = $studentid->batches;
       foreach($batchid as $b){
        $batchname = $b->title;
        $courseid = $b->course_id;
       }
       
       
       
       $course = Course::find($courseid);
       $coursename = $course->name;
       $printpdf = PDF::loadView('pdf.absence', compact('studentname', 'totaldate' ,'batchname','coursename','remark'));
        return $printpdf->stream();
    }

    public function receive_print($inquireid){
        $inquire = Inquire::find($inquireid);
        $installments = Installment::where('inquire_id',$inquireid)->get();

        $batch_id = $inquire->batch_id;
        $batch = Batch::find($batch_id);

        $course = $batch->course;
        $codeno = $course->code_no;

        $course_name = $batch->course->name;
        $course_fees = $batch->course->fees;

        $location_id = $batch->location_id;
        $location = Location::find($location_id);

        $city =$location->city;
        $zipcode = $city->zipcode;

        $receiveno = $inquire->receiveno;

        if (!$receiveno) {

            $lastInquire = Inquire::whereDate('updated_at',date('Y-m-d'))->where('receiveno','!=',null)->orderBy('updated_at','desc')->get();

            if($lastInquire->isEmpty()){
                // dd($lastInquire);
                $inquire->receiveno = date('dmy').$codeno.$zipcode.'001';
            }else
            {
                foreach ($lastInquire as $key => $value) {
                    $databatch_id = $value->batch_id;

                    $data_batch = Batch::find($databatch_id);
                    $data_course = $data_batch->course;
                    $data_codeno = $data_course->code_no;

                    $datalocation_id = $data_batch->location_id;
                    $data_location = Location::find($datalocation_id);

                    $data_city = $data_location->city;
                    $data_zipcode = $data_city->zipcode;
                    // dd($data_batch);
                    if($codeno == $data_codeno && $zipcode == $data_zipcode)
                    {
                        //dd($value->receiveno);
                        $inquireno = $value->receiveno;
                        $inquire_no = ++$inquireno;
                        $inquire->receiveno = strval($inquire_no);
                        break;
                    }else{
                        $inquire->receiveno = date('dmy').$codeno.$zipcode.'001';
                    }
                }
            }
            $inquire->status = 2;
            $inquire->save();

        }

        $data =  array(
            "receiveno"         =>  $inquire->receiveno,
            "todaydate"         =>  date('d-m-Y'),
            "coursename"        =>  $course_name,
            "coursefees"        =>  $course_fees,
            "inquireno"         =>  $inquire->inquireno,
            "studentname"       =>  $inquire->name,
            "paidamounts"       =>  $installments,
            "batchdate"         =>  $batch->startdate,
            "batchtime"         =>  $batch->time,
        );

        // dd($data);

        $pdf = PDF::loadView('pdf.inquire',compact('data'));

        return $pdf->stream();
    }
    
}
