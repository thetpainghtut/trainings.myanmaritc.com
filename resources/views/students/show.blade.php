@extends('backendtemplate')

@section('content')

@php
    
    // $dt = Carbon\Carbon::now();

    $dateOfBirth = $student->dob;

    $age = Carbon\Carbon::parse($dateOfBirth)->age;


@endphp

	<h4 class="mb-4 text-gray-800"> 
        @foreach($student->batches as $student_batch)

		@if($student_batch->pivot->status=="Active")
		@php 
			$course = $student_batch->course->name;
			$batch = $student_batch->title;
			$receiveno = $student_batch->pivot->receiveno;

		@endphp
		{{ $student_batch->course->name }} @
		{{-- nyiyelin --}}
		{{ $student_batch->location->city->name }}

		@endif
		@endforeach 

        <a href="{{route('students.index')}}" class="btn btn-outline-primary d-inline-block float-right btn-sm"><i class="fas fa-angle-double-left"></i> Go Back</a>

    </h4>
	
	<div class="row mb-3">
		<div class="col-md-10 offset-1">
			
		</div>
	</div>

	<div class="row">
	    <div class="col-md-4">
		    <div class="card shadow-sm">
	          	<div class="card-header bg-transparent text-center">
	            	@if($student->photo)
                        <img src="{{asset($student->photo)}}" class="img-fluid my-2" width="100px" height="100px">
                    @else
                        <img src="{{ asset('mmitui/image/user.png') }}" class="img-fluid my-2" width="100px" height="100px">
                    @endif
	            	<h3> {{ $student->namee }} </h3>

	            	<p class="mb-3">
	            		@foreach($student->batches as $student_batch)
							@if($student_batch->pivot->status=="Active")
					    		{{ $batch }}
					    	@endif
					    @endforeach
	            	</p>

                    <!-- Student lesson count -->
                    @php
                        $subject_batch_id = 0;
                        $seen_less_total = 0;
                        $lesson_total = 0;
                        $percentage = 0;
                        $today_date = Carbon\Carbon::now();
                    @endphp

                    @foreach($student->lessons as $lesson)
                        @php
                            $subject = $lesson->subject;
                            $subject_batch_id=0;
                            $status = $lesson->pivot->status;
                        @endphp

                        @foreach($subject->batches as $subject_batch)
                            
                           @if($batch_data->id == $subject_batch->pivot->batch_id)
                                @php
                                    $subject_batch_id = $subject_batch->pivot->batch_id;
                                    break;
                                @endphp
                            @endif
                        @endforeach
                        
                        @if($batch_data->id == $subject_batch_id && $status == 1 && $batch_data->enddate <= $today_date)
                      
                            @php
                                $stu_less =1;                                       
                               $seen_less_total += $stu_less;
                               
                            @endphp  

                        @endif
                        @if($batch_data->id == $subject_batch_id && $status == 0 && $batch_data->enddate >= $today_date)
                      
                            @php
                                $stu_less =1;                                       
                               $seen_less_total += $stu_less;
                               
                            @endphp  
                                                   
                        @endif
                        
                    @endforeach
                   
                    <!-- End of Student lesson count -->
                   
                     @foreach($course_data->subjects as $subject) 
                        @php
                            $lesson_count = $subject->lessons->count();
                            $lesson_total += $lesson_count;
                        @endphp

                    @endforeach

                    @if($lesson_total > 0)
                        @php
                            $percentage_decimal = (($seen_less_total/$lesson_total)*100);
                            $percentage = round($percentage_decimal);
                        @endphp
                    @endif
                    
	            	<div class="progress my-4">
                        <div class="progress-bar " role="progressbar" style="width: {{$percentage}}%; background-color: #004289" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$percentage}}%</div>
                    </div>

	            	<a href="{{route('students.edit',$student->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>

	            	<button type="submit" class="btn btn-danger btn-sm delete" data-student_id = "{{ $student->id }}" data-batch_id = "{{$batchid}}" data-receive_no = "{{ $receiveno }}"><i class="fas fa-trash"></i>
	            	</button>

	          	</div>
	          
	          	<div class="card-body">

	          		@php
	          			$inquire = App\Inquire::where('receiveno','=',$receiveno)->first();


	          		@endphp

	            	<p class="my-4">
	            		<strong class="pr-1 text-dark">Education:</strong>
	            		{{ $inquire->education->name }}
	            	</p>
	            	<p class="my-4">
	            		<strong class="pr-1 text-dark">Accepted Year:</strong>
	            		{{ $student->accepted_year }}
	            	</p>

	            	<p class="my-4">
	            		<strong class="pr-1 text-dark">Degree:</strong>
	            		{{ $student->degree }}
	            	</p>

	            	<p class="my-4">
	            		<strong class="pr-1 text-dark">City:</strong>
	            		{{ $student->city }}
	            	</p>

	            	<p class="my-4">
	            		<strong class="pr-1 text-dark"> Skills :</strong>
	          				@if($student->subjects)
								@foreach($student->subjects as $subject)
									
									<span class="badge badge-dark ">
										{{ $subject->name }}
									</span>

								@endforeach

	          				@else
	          					-
	          				@endif

	            	</p>
	          	</div>
	        </div>
	    </div>
	    <div class="col-md-8">
	    	<div id="accordion" class="accordion border-bottom">
                <div class="card shadow-sm">
                    <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
                        <a class="card-title">
                            <i class="icofont-info mr-3 icon"></i>
                            General Information
                        </a>
                    </div>
                    
                    <div id="collapseOne" class="card-body collapse show" data-parent="#accordion">
                        <p class="mb-3">
		            		<strong class="pr-3 text-dark"> <i class="far fa-user"></i> </strong>
		            		{{ $student->namem }}
		            	</p>

		            	<p class="mb-3">
		            		<strong class="pr-3 text-dark"> <i class="icofont-phone"></i> </strong>
		            		{{ $student->phone }}
		            	</p>

		            	

		            	<p class="mb-3">
		            		<strong class="pr-3 text-dark"> <i class="icofont-mail"></i> </strong>
		            		{{ $student->email }}
		            	</p>

		            	<p class="mb-3">
		            		<strong class="pr-3 text-dark"> <i class="fas fa-birthday-cake"></i> </strong>
		            		{{ \Carbon\Carbon::parse($dateOfBirth)->format('M d, Y')}}
		            		( {{ $age }} years )
		            	</p>

		            	<p class="mb-3">
		            		<strong class="pr-3 text-dark"> <i class="fas fa-venus-mars"></i> </strong>
		            		{{ $student->gender }}
		            	</p>
						
						<p class="mb-3">
		            		<strong class="pr-3 text-dark"> <i class="icofont-google-map"></i> </strong>
		            		{{ $student->address }}
		            	</p>

                    </div>

                    
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <a class="card-title">
                            <i class="fas fa-user-friends mr-3 icon"></i>
                            Household Parent / Guardian Information
                        </a>
                    </div>
                    <div id="collapseTwo" class="card-body collapse" data-parent="#accordion">

                    	<div class="row">
                    		<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    			<p class="mb-3"> <u> Parent/Guardian #1 </u> </p>

		                        <p class="mb-3"> 
		                        	{{ $student->p1 }}
		                        	<small> ( {{ $student->p1_relationship }} ) </small> 
		                        </p>

		                        <p class="mb-3"> {{ $student->p1_phone }} </p>
                    		</div>

                    		<div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    			<p class="mb-3"> <u> Parent/Guardian #2 </u> </p>

		                        <p class="mb-3"> 
		                        	{{ $student->p2 }}
		                        	<small> ( {{ $student->p2_relationship }} ) </small> 
		                        </p>

		                        <p class="mb-3"> {{ $student->p2_phone }} </p>
                    		</div>
                    	</div>
                    	

                    </div>

                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        <a class="card-title">
                            <i class="icofont-ui-check mr-3 icon"></i>
                            Why Choose Us ?
                        </a>
                    </div>
                    <div id="collapseThree" class="card-body collapse" data-parent="#accordion">
                        <p> {{ $student->because }} </p>
                    </div>

                     <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                        <a class="card-title">
                            <i class="icofont-chart-flow mr-3 icon fa-lg"></i>
                            Projects
                        </a>
                    </div>
                    <div id="collapseFour" class="card-body collapse" data-parent="#accordion">
                        @php
                        $studentone = $student->id;
                         $project = App\Project::whereHas('students',function($q) use ($studentone){ $q->where('student_id',$studentone);})->get(); @endphp
                         @foreach($project as $p)
                         @if($p->link != NULL)
                    	<div class="row no-gutters bg-light position-relative mb-3">
                                        
                            <div class="col-md-12 p-4">
                                <!-- Blog Title -->
                                <h5 class="mt-0">Project Title:{{$p->title}}   </h5>
                                <h5 class="mt-0 float-right"> {{$p->projecttype->name}} </h5>

                                <!-- Blog Body -->
                                <p> @foreach($p->students as $stu) {{ $loop->first ? '' : ', ' }}{{$stu->namee}} @endforeach</p>
                                
                                <a href="//{{$p->link}}" target="_blank" class="btn btn-outline-primary btn-sm"> View Link </a>
                          </div>
                        </div>
                        @else
                        <div class="row no-gutters bg-light position-relative mb-3">
                                        
                            <div class="col-md-12 p-4">
                                <!-- Blog Title -->
                                <h5 class="mt-0"> No Project Title  </h5>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <!-- <div class="row no-gutters bg-light position-relative mb-3">
                                        
                            <div class="col-md-12 p-4">
                               
                                <h5 class="mt-0"> Project Title  </h5>
                                <h5 class="mt-0 float-right"> Laravel Project  </h5>

                              
                                <p> Youn Thiri Naing, Student One </p>
                                
                                <a href="" class="btn btn-outline-primary btn-sm"> View Link </a>
                          </div>
                        </div> -->

                    </div>
{{--
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                        <a class="card-title">
                            <i class="far fa-calendar-alt mr-3 icon"></i>
                            Attendance
                        </a>
                    </div>
                    <div id="collapseFive" class="card-body collapse" data-parent="#accordion">

                        <div class="chart-pie pt-4 pb-2">
		                    <canvas id="myPieChart"></canvas>
		                </div>
		                <div class="mt-4 text-center small">
		                    <span class="mr-2">
		                      	<i class="fas fa-circle text-success"></i>
		                      	Present
		                    </span>
		                    <span class="mr-2">
		                      	<i class="fas fa-circle text-danger"></i> 
		                      	Absencee
		                    </span>
		                </div>
                    </div>

                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                        <a class="card-title">
                            <i class="icofont-question mr-3 icon"></i>
                            Quiz
                        </a>
                    </div>
                    <div id="collapseSix" class="card-body collapse" data-parent="#accordion">

                        <div class="row no-gutters bg-light position-relative">
                                        
                            <div class="col-md-12 p-4">
                                <!-- Blog Title -->
                                <h5 class="mt-0"> Frontend Development Quizzes  </h5>
                                <h5 class="mt-0 float-right"> 20 Marks  </h5>

                                <!-- Blog Body -->
                                <p> ( 24.10.2020 ) </p>
                                
                                <a href="viewanswer.html" class="btn btn-outline-primary btn-sm"> View Score </a>
                          </div>
                        </div>
                    </div> --}}

                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                        <a class="card-title">
                            <i class="icofont-medal mr-3 icon"></i>
                            Grade
                        </a>
                    </div>
                    <div id="collapseSeven" class="card-body collapse" data-parent="#accordion">
                    	@if($student_symbol_groups)
            				
                    	<table class="table table-bordered">
                    		<thead class="bg-primary text-white">
                    			<tr>
									<th> No </th>
									<th> Skills to be Considered </th>
									<th> Grade Point </th>
									<th> Grade Symbol </th>
								</tr>
                    		</thead>
                    		<tbody>
                    			
                    			
								@php $i=1; @endphp
                    			@foreach($units as $unitkey => $unit)
									<?php
									
										$student_symbol_group = $student_symbol_groups[0][$unitkey];
										
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
                    		</tbody>
                    	</table>
            			@else

                    	<h3> Comming Soon </h3>
						@endif

                        
                    </div>
                    
                </div>
            </div>
	    </div>
	</div>

{{-- delete modal --}}
     <div class="modal" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Leave Message </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        
                <form id="student_leave">
                    @csrf
                        <input type="hidden" name="student_id" class="student_id">
                        <input type="hidden" name="batch_id" class="batch_id">
                        <input type="hidden" name="receive_no" class="receive_no">

                        <div class="modal-body">
                
                            <div class="row my-3">
                                <div class="col-md-10 offset-1" id="form-group-status">
                                    <label for="reason">Reason</label>
                               
                                    <textarea type="text" class="form-control"  name="status" id="status"></textarea>
                                    <span class="text-danger show-error"></span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <!-- Chart -->
    <script src="{{ asset('sb_admin2/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('sb_admin2/js/demo/chart-pie-demo.js') }}"></script>

    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

  <script type="text/javascript">
      $(document).ready(function() {

        function showValidationErrors(name,error){
            var group = $("#form-group-"+name);
            group.addClass('has-error');
            group.find('.show-error').text(error);
        }

        function clearValidationError(name) {
            console.log(name);
            var group = $("#form-group-" + name);
            group.removeClass('has-error');
            group.find('.show-error').text('');
        }
        $('#status').on('keyup',function() {
            clearValidationError($(this).attr('id').replace('#', ''))
        })

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });


         $('.delete').click(function(){
            var student_id = $(this).data('student_id');
            var batch_id = $(this).data('batch_id');
            var receive_no = $(this).data('receive_no');

            $('.student_id').val(student_id);
            $('.batch_id').val(batch_id);
            $('.receive_no').val(receive_no);


            $('#exampleModal').modal('show');
         })

         $('#student_leave').submit(function(event) {
             event.preventDefault();
             var student_data = new FormData(this);
             
             $.ajax({
                url : '{{route("student_status_change")}}',
                type : 'post',
                data : student_data,
                processData: false,
                contentType: false,

                success:function(data) {
                    if(data){
                        $('#exampleModal').modal('hide');
                        // location.reload();
                    }
                },
                error:function (error) {
                   if(error.status == 422){
                    var errors = error.responseJSON;
                    var data = errors.errors;
                    $.each(data,function(i,v){
                        showValidationErrors(i,v);
                    });
                    $('#exampleModal').modal('show');

                   }
                }



             })
         })
      });
  </script>
@endsection