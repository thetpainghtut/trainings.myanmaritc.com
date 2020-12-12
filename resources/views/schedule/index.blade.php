@extends('backendtemplate')

@section('script')
	
	<script type="text/javascript">
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		

		var create_path="{{route('schedules.store')}}";

		var detail_path="{{route('schedules.show',':id')}}";

		var edit_path="{{route('schedules.edit',':id')}}";

		var update_path="{{route('schedules.update',':id')}}";

		var delete_path="{{route('schedules.destroy',':id')}}";

		


	</script>
    <script src="{{ asset('sb_admin2/vendor/datetimepicker/custom_datepicker.js') }}"></script>

    <script src="{{ asset('schedule.js') }}"></script>



@endsection
@section('content')

    <h1 class="h3 mb-4 text-gray-800"> 
    	Schedule 

    	<button type="button" class="btn btn-outline-primary float-right btn-sm" data-toggle="modal" data-target="#addModal">
			<i class="fas fa-plus mr-2"></i>Add New
		</button>
    </h1>

    <div class="card shadow mb-4">
    	<div class="card-header py-3">
            <form method="get" action="{{route('groups.index')}}">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="inputCourse">Choose Course:</label>
                        <select name="course" class="form-control" id="course">
                        	<option selected disabled>Please Choose Course:</option>
                            @foreach($courses as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                            
                        </select>
                    </div>

                    <div class="form-group col-md-5">
                        <label for="inputCourse">Choose Batch:</label>
                        <select name="batch" class="form-control" id="batch" disabled="">
                        	<option selected disabled>Please Choose Batch:</option>
                            
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                    	<button type="button" class="btn btn-primary mt-4 searchBtn">Search</button>
                    </div>

                </div>
            </form>
        </div>

        <div class="card-body">
        	<div id='calendar'></div>
        </div>
    </div>
	
	<!-- Add Modal -->
	<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="exampleModalLabel"> Add Schedule </h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<form id="addForm">
		      		<div class="modal-body">
		      			<div class="form-group row">
						    <label for="inputType" class="col-sm-2 offset-md-1 col-form-label"> Type </label>
						    <div class="col-sm-9">
						      	<select class="form-control types" id="inputType" name="type">
						      		<option value="Timetable"> Timetable </option>
						      		<option value="Holiday"> Holiday </option>
						      		<option value="Activity"> Activity </option>
						      		<option value="Guest Speaker"> Guest Speaker </option>
						      		<option value="Presentation"> Presentation </option>
						      		<option value="Project Time"> Project Time </option>

						      		<option value="Exam"> Exam </option>
						      		<option value="Closed"> Closed </option>


						      	</select>
						    </div>
						</div>

		        		<div class="form-group row titleDiv">
						    <label for="inputTitle" class="col-sm-2 offset-md-1 col-form-label">Title</label>
						    <div class="col-sm-9">
						      	<input type="text" class="form-control" id="inputTitle" name="title">
						    </div>
						</div>

						<div class="form-group row holidayDiv">
						    <label for="inputTitle" class="col-sm-2 offset-md-1 col-form-label"> Date </label>
						    <div class="col-sm-9">
						      	<div class="c-datepicker-date-editor c-datepicker-single-editor J-datepicker-day mt10">
						          	<i class="c-datepicker-range__icon kxiconfont icon-clock"></i>
						          	<input type="text" autocomplete="off" name="holidaydate" placeholder="Select" class=" c-datepicker-data-input only-date" value="">
						        </div>
						    </div>
						</div>

						<div class="form-group row disputableholidayDiv">
						    <label for="inputTimetable" class="col-sm-2 offset-md-1 col-form-label">Timetable</label>
						    <div class="col-sm-9">
						      	<div class="c-datepicker-date-editor J-datepicker-range mt10">
						          	<i class="c-datepicker-range__icon kxiconfont icon-clock"></i>
						          	<input placeholder="Start Date & Time" name="start" class="c-datepicker-data-input" value="">
						          	<span class="c-datepicker-range-separator">-</span>
						          	<input placeholder="End Date & Time" name="end" class="c-datepicker-data-input" value="">
						        </div>
						    </div>
						</div>

						<div class="form-group row colorDiv">
						    <label for="inputTitle" class="col-sm-2 offset-md-1 col-form-label"> BG Color </label>
						    <div class="col-sm-9" id="colorPicker">
						      	<input type="radio" name="color" id="green" value="#21BA45" />
								<label class="bgcolors" for="green"><span class="green"></span></label>

								<input type="radio" name="color" id="yellow" value="#FBBD08" />
								<label class="bgcolors" for="yellow"><span class="yellow"></span></label>

								<input type="radio" name="color" id="olive" value="#B5CC18" />
								<label class="bgcolors" for="olive"><span class="olive"></span></label>

								<input type="radio" name="color" id="orange" value="#F2711C" />
								<label class="bgcolors" for="orange"><span class="orange"></span></label>

								<input type="radio" name="color" id="teal" value="#00B5AD" />
								<label class="bgcolors" for="teal"><span class="teal"></span></label>

								<input type="radio" name="color" id="blue" value="#2185D0" />
								<label class="bgcolors" for="blue"><span class="blue"></span></label>

								<input type="radio" name="color" id="violet" value="#6435C9" />
								<label class="bgcolors" for="violet"><span class="violet"></span></label>

								<input type="radio" name="color" id="purple" value="#A333C8" />
								<label class="bgcolors" for="purple"><span class="purple"></span></label>

								<input type="radio" name="color" id="pink" value="#E03997" />
								<label class="bgcolors" for="pink"><span class="pink"></span></label>

								<input type="radio" name="color" id="bluegray" value="#607D8B" />
								<label class="bgcolors" for="bluegray"><span class="bluegray"></span></label>
						    </div>
						</div>

						<div class="form-group row courseDiv">
						    <label for="inputCourseid" class="col-sm-2 offset-md-1 col-form-label"> Course </label>
						    <div class="col-sm-9">
						      	<select class="form-control courses" id="inputCourseid" name="courseid">
						      		<option> Choose Course </option>
						      		@foreach($courses as $course)
						      			<option value="{{ $course->id }}"> {{ $course->name }} </option>
						      		@endforeach
						      	</select>
						    </div>
						</div>

						<div class="form-group row batchDiv">
						    <label for="inputBatchid" class="col-sm-2 offset-md-1 col-form-label"> Batch </label>
						    <div class="col-sm-9">
						      	<select name="batchid" class="form-control batches" disabled="disabled" id="inputBatchid">
				                     
				                </select>
						    </div>
						</div>

						<div class="form-group row teacherDiv">
		                    <label for="inputTeacher" class="col-sm-2 offset-md-1 col-form-label">Teacher</label>
		                    <div class="col-sm-9 ">
		                        <select name="teacher" class="form-control teacher" id="inputTeacher" disabled="">
		                        </select>   
		                    </div>
		                </div>

						<div class="form-group row subjectDiv">
						    <label for="inputSubject" class="col-sm-2 offset-md-1 col-form-label"> Subject </label>
						    <div class="col-sm-9">
						      	<select name="subjectid" class="form-control js-example-basic-single" disabled="disabled" id="inputSubject">
				                     
				                </select>
						    </div>
						</div>

		      		</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        		<button type="submit" class="btn btn-primary">Save changes</button>
		      		</div>
		      	</form>
	    	</div>
	  	</div>
	</div>

	<!-- Detail Modal -->
	<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
	    	<div class="modal-content">
		      	
		      	<div class="modal-body p-0">
		      		
		           	<div class="row">
		               	<div class="col-md-4 justify-content-center d-flex align-items-center py-5" id="detail_square">
		                   	<div class="py-5 text-white">
		                       <h5 class="mt-5" id="detail_time"></h5>
		                       <span class="d-block text-center font-italic mb-4" id="detail_batchtitle" style="line-height: 0"></span>
		                    

		                       <button type="button" class="btn btn-light btn-sm text-danger text-decoration-none float-right my-2 mr-2 delete" data-toggle="tooltip" data-placement="top" title="Schedule Delete">
		               				<i class="fas fa-trash"></i>
			               		</button>
			               	

			               		<button type="button" class="btn btn-light btn-sm text-warning text-decoration-none float-right my-2 mr-2 editBtn" data-toggle="tooltip" data-placement="top" title="Schedule Edit">
			               			<i class="fas fa-pen"></i>
			               		</button>
		                   	</div>
		               	</div>
		               	<div class="col-md-8">
		               		<button type="button" class="btn btn-link text-muted text-decoration-none float-right my-2 mr-4" data-dismiss="modal" aria-label="Close">
					        	<i class="icofont-close fa-lg"></i>
					        </button>

					        <div class="justify-content-center d-flex align-items-center py-5">
			                   	<div class="ml-5">
			                       	<div class="d-flex justify-content-between">
			                           	<h2 class="text my-4" id="detail_title"></h2>
			                           	<p class="d-flex justify-content-center align-items-center mt-3">
			                            	
			                               <span class="d-inline-block ml-2" id="detail_date"></span>
			                           	</p>

			                       	</div>
			                       	<p class="my-3" id="detail_teacherdiv">
			                       		Teacher Name :
			                       		<span id="detail_teachername"></span>
			                       	</p>

			                       
			                       	<div class="d-flex align-items-center mt-5">
			                           <small>
			                           	<span> Created By: </span>
			                           	<span class="d-inline-block ml-2" id="detail_username"></span>
			                           </small>
			                       	</div>

			                   	</div>
		                   	</div>
		               	</div>
		           	</div>

		      	</div>

	    	</div>
	  	</div>
	</div>

	<!-- Edit Modal -->
	<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title" id="exampleModalLabel"> Edit Schedule </h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<form id="editForm">
		      		{{-- <input type="" name=""> --}}
		      		<div class="modal-body">
		      			<div class="form-group row">
						    <label for="e_inputType" class="col-sm-2 offset-md-1 col-form-label"> Type </label>
						    <div class="col-sm-9">
						      	<select class="form-control types" id="e_inputType" name="type">
						      		<option value="Timetable"> Timetable </option>
						      		<option value="Holiday"> Holiday </option>
						      		<option value="Activity"> Activity </option>
						      		<option value="Guest Speaker"> Guest Speaker </option>
						      		<option value="Presentation"> Presentation </option>
						      		<option value="Project Time"> Project Time </option>

						      		<option value="Exam"> Exam </option>

						      		<option value="Closed"> Closed </option>

						      	</select>
						    </div>
						</div>

		        		<div class="form-group row titleDiv">
						    <label for="e_inputTitle" class="col-sm-2 offset-md-1 col-form-label">Title</label>
						    <div class="col-sm-9">
						      	<input type="text" class="form-control" id="e_inputTitle" name="title">
						    </div>
						</div>

						<div class="form-group row holidayDiv">
						    <label for="date" class="col-sm-2 offset-md-1 col-form-label"> Date </label>
						    <div class="col-sm-9">
						      	<div class="c-datepicker-date-editor c-datepicker-single-editor J-datepicker-day mt10">
						          	<i class="c-datepicker-range__icon kxiconfont icon-clock"></i>
						          	<input type="text" autocomplete="off" name="holidaydate" placeholder="Select" class=" c-datepicker-data-input only-date" value="">
						        </div>
						    </div>
						</div>

						<div class="form-group row disputableholidayDiv">
						    <label for="inputTimetable" class="col-sm-2 offset-md-1 col-form-label">Timetable</label>
						    <div class="col-sm-9">
						      	<div class="c-datepicker-date-editor J-datepicker-range mt10">
						          	<i class="c-datepicker-range__icon kxiconfont icon-clock"></i>
						          	<input placeholder="Start Date & Time" name="start" class="c-datepicker-data-input" value="">
						          	<span class="c-datepicker-range-separator">-</span>
						          	<input placeholder="End Date & Time" name="end" class="c-datepicker-data-input" value="">
						        </div>
						    </div>
						</div>

						<div class="form-group row colorDiv">
						    <label for="inputTitle" class="col-sm-2 offset-md-1 col-form-label"> BG Color </label>
						    <div class="col-sm-9" id="colorPicker">
						      	<input type="radio" name="color" id="e_green" value="#21BA45" />
								<label class="bgcolors" for="e_green"><span class="green"></span></label>

								<input type="radio" name="color" id="e_yellow" value="#FBBD08" />
								<label class="bgcolors" for="e_yellow"><span class="yellow"></span></label>

								<input type="radio" name="color" id="e_olive" value="#B5CC18" />
								<label class="bgcolors" for="e_olive"><span class="olive"></span></label>

								<input type="radio" name="color" id="e_orange" value="#F2711C" />
								<label class="bgcolors" for="e_orange"><span class="orange"></span></label>

								<input type="radio" name="color" id="e_teal" value="#00B5AD" />
								<label class="bgcolors" for="e_teal"><span class="teal"></span></label>

								<input type="radio" name="color" id="e_blue" value="#2185D0" />
								<label class="bgcolors" for="e_blue"><span class="blue"></span></label>

								<input type="radio" name="color" id="e_violet" value="#6435C9" />
								<label class="bgcolors" for="e_violet"><span class="violet"></span></label>

								<input type="radio" name="color" id="e_purple" value="#A333C8" />
								<label class="bgcolors" for="e_purple"><span class="purple"></span></label>

								<input type="radio" name="color" id="e_pink" value="#E03997" />
								<label class="bgcolors" for="e_pink"><span class="pink"></span></label>

								<input type="radio" name="color" id="e_bluegray" value="#607D8B" />
								<label class="bgcolors" for="e_bluegray"><span class="bluegray"></span></label>
						    </div>
						</div>

						<div class="form-group row courseDiv">
						    <label for="e_inputCourseid" class="col-sm-2 offset-md-1 col-form-label"> Course </label>
						    <div class="col-sm-9">
						      	<select class="form-control courses" id="e_inputCourseid" name="courseid">
						      		<option> Choose Course </option>
						      		@foreach($courses as $course)
						      			<option value="{{ $course->id }}"> {{ $course->name }} </option>
						      		@endforeach
						      	</select>
						    </div>
						</div>

						<div class="form-group row batchDiv">
						    <label for="e_inputBatchid" class="col-sm-2 offset-md-1 col-form-label"> Batch </label>
						    <div class="col-sm-9">
						      	<select name="batchid" class="form-control batches" disabled="disabled" id="e_inputBatchid">
				                     
				                </select>
						    </div>
						</div>

						<div class="form-group row teacherDiv">
		                    <label for="e_inputTeacherid" class="col-sm-2 offset-md-1 col-form-label">Teacher</label>
		                    <div class="col-sm-9 ">
		                        <select name="teacher" class="form-control teacher" id="e_inputTeacherid" disabled="">
		                        </select>   
		                    </div>
		                </div>

						<div class="form-group row subjectDiv">
						    <label for="e_inputSubjectid" class="col-sm-2 offset-md-1 col-form-label"> Subject </label>
						    <div class="col-sm-9">
						      	<select name="subjectid" class="form-control js-example-basic-single" disabled="disabled" id="e_inputSubjectid">
				                     
				                </select>
						    </div>
						</div>

		      		</div>
		      		<div class="modal-footer">
		        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        		<button type="submit" class="btn btn-primary">Save changes</button>
		      		</div>
		      	</form>
	    	</div>
	  	</div>
	</div>
@endsection

