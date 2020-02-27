<?php

namespace App\Http\Controllers;
use App\Student;
use App\Course;
use App\Batch;
use App\Group;
use App\Unit;
use App\Inquire;

use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;

class PrintController extends Controller
{

	public function grade($batchid)
	{
		$batch = Batch::find($batchid);
    	$courseid = $batch->course->id;
    	$units = Unit::with('students')->where('course_id',$courseid)->get();


		$students_units = Student::where('batch_id',$batchid)
						->whereHas('units', function($q1) use ($courseid)
						{ 
							return $q1->where('course_id',$courseid);
    					})
    					->orderBy('students.id')
    					->get();

    	$student_symbol_groups = array(); 
    	$symbol_points=0;

    	foreach ($students_units as $value) 
    	{
    		$data_one = $value->units->groupBy('pivot.unit_id');

    		// echo $data_one;
    		$symbol_marks = array();

    		foreach ($data_one as $d_one_value) 
    		{
    			$unit_count = $d_one_value->count();

    			$unit_point_total = $d_one_value->sum('pivot.symbol');

    			$unit_point = $unit_point_total / $unit_count;

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

    	// dd($student_symbol_groups);

    	$pdf = PDF::loadView('pdf.grading', compact('students_units', 'units' ,'student_symbol_groups'));
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

        $s = strtotime($absencedate);
        $day = date('d', $s);
        $month = date('M', $s);
        $year = date('Y',$s);

       $totaldate = $day.' '.$month.', '.$year;
      
       $batchid = $studentid->batch_id;
       $batch = Batch::find($batchid);
       $batchname = $batch->title;
       $courseid = $batch->course_id;
       $course = Course::find($courseid);
       $coursename = $course->name;
       $printpdf = PDF::loadView('pdf.absence', compact('studentname', 'totaldate' ,'batchname','coursename'));
        return $printpdf->stream();
    }
    
}
