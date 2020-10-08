<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">

  	<title>Grading PDF</title>
  	<style>

  		*
  		{
  			margin: 0;
  			padding: 0;
  			/*font-family: 'Zawgyi_One';*/
  		}


  		body
  		{
  			padding: 20px 50px;
  		}
	  	.page-break 
	  	{
		  	page-break-after: always;
	  	}
	  	.text-center
	  	{
			text-align: center;
	  	}
	  	.float_left
	  	{
	  		float: left;
	  	}
	  	.float_right
	  	{
	  		float: right;
	  	}
	  	.clear
	  	{
	  		clear:both;
	  	}
	  	.fontsmall
	  	{
	  		font-size: 9px;
	  	}
	  	table, td, th 
	  	{  
  			border: 1px solid #000;
  			text-align: left;
		}

		table 
		{
		  	border-collapse: collapse;
		  	width: 100%;
		}

		th, td 
		{
		  	padding: 15px;
		}
  	</style>
</head>
<body>
	
	@foreach($students_units as $studentkey=> $student)
	<div class="studentone page-break">
		<div id="header" style="margin-bottom: 10px;">
			<div class="float_left">
				<img src="logo.jpg" style="width: 150px; height: 60px;">
			</div>
			<div class="float_right">
				<h4> Myanmar IT Consulting </h4>
				<p class="fontsmall"> No., 169 ( 8 Floor ) MTP Condo, Insein Road, <br> Hlaing Township, Yangon </p>
				<p class="fontsmall"> <b> Tel : </b> (+95) 9798 323 199, (+95) 9772 750 503,  (+95) 9772 750 502  </p>
				<p class="fontsmall"> <b> Website: </b> myanmaritc.com </p>
			</div>
			<div class="clear"></div>		
		</div>
		
		<hr >

		<div id="content" style="margin-top: 15px; margin-bottom: 30px;">
			<div class="content_rowone">
	  			<h1 class="text-center"> {{ $student->namee }} </h1>
				<p class="text-center" style="margin-top: 7px;"> <i> Date Of Birth : {{ date('d - m - Y',strtotime($student->dob)) }} </i> </p>
				<p class="text-center" style="margin-top: 20px;"> completed 264-hour coursework, 1 individual project, and 2 groups projects. </p>
			</div>

			<div class="content_rowtwo" style="margin-top: 25px;">
				<p style="margin: 10px 0;">
					<span style="width: 150px; display: inline-block;"> Student ID </span>
					<span> : </span>
					<span> ST-0000{{ $student->id }} </span>
				</p>

				<p style="margin: 10px 0;">
					<span style="width: 150px; display: inline-block;"> 
						Student Name : 
					</span>
					<span> : </span>
					<span> {{ $student->namee }} </span>
				</p>

				<p style="margin: 10px 0;">
					<span style="width: 150px; display: inline-block;"> Course </span>
					<span> : </span>
					<span> {{ $batch->course->name }} </span>
				</p>

				<p style="margin: 10px 0;">
					<span style="width: 150px; display: inline-block;"> Batch </span>
					<span> : </span>
					<span> {{ $batch->title }} (
						{{ date('M  d , Y',strtotime($batch->startdate)) }} 
						to 
						{{ date('M  d , Y',strtotime($batch->enddate)) }} 
						) 
					</span>
				</p>
			</div>

			<div class="content_rowthree" style="margin-top: 20px;">
				<table>
					<tr>
						<th> No </th>
						<th> Skills to be Considered </th>
						<th> Grade Point </th>
						<th> Grade Symbol </th>
					</tr>
					@php $i=1; @endphp
					@foreach($units as $unitkey => $unit)
						<?php
						
							$student_symbol_group = $student_symbol_groups[$studentkey][$unitkey];
							
								$student_groups = $student_symbol_group;
								
								$student_symbol = explode('-', $student_groups);

								$mark = $student_symbol[0];
								$grade = $student_symbol[1];
						?>

						<tr>
							<td> {{ $i++ }} </td>
							<td> {{ $unit->description }} </td>
							<td> {{ $mark }} </td>
							<td> {{ $grade }} </td>
						</tr>
						
						
					{{-- @php die(); @endphp --}}
					@endforeach

				</table>
			</div>

			<div class="content_rowfour" style="margin-top: 20px;">
				<div class="float_left" style="border: 1px solid #000; padding: 15px;">
					<p> <b> NOTE: </b> </p>
					<p  style="margin-top: 10px"> Key Points </p>
					<p style="margin-top: 20px"> 
						<span style="width: 170px; display: inline-block;"> Above 80	</span>		
						<span> A </span>
					</p>
					<p> 
						<span style="width: 170px; display: inline-block;"> Between 80 and 60 </span>	
						<span> B </span>
					</p>
					<p>	
						<span style="width: 170px; display: inline-block;"> Between 60 and 40 </span>
						<span> C </span>
					</p>
					<p>	
						<span style="width: 170px; display: inline-block;"> Between 40 and 20 </span>		
						<span> D </span>
					</p>
					<p>	
						<span style="width: 170px; display: inline-block;"> Under 20	</span>	
						<span> E </span>
					</p>

				</div>
				<div class="float_right">
					<img src="mmit_receivelogo_one.png" style="width: 150px; height: 150px;">
				</div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>

		</div>

		<div id="footer">
			<div class="float_left">
				<p> Date : March 20, 2020 </p>
			</div>
			<div class="float_right">
				<p style="border-top: 1px solid black;"> 
					<span style="padding-top: 15px;"> U Yan Myoe Aung  </span>
					<br>
					<span style="padding-left: 40px;"> ( CEO ) </span>
				</p>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	@endforeach

	
</body>
</html>