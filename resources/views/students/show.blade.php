@extends('backendtemplate')

@section('content')
	
	<div class="row mb-3">
		<div class="col-md-10 offset-1">
			<a href="{{route('students.index')}}" class="btn btn-outline-primary d-inline-block float-right btn-sm"><i class="fas fa-angle-double-left"></i> Go Back</a>
		</div>
	</div>

	<div class="card col-md-10 offset-1 shadow">
		<div class="row">
		    <div class="col-md-12">
			    <div class="card-body">
					<div class="row">
						<div class="col-12">
<<<<<<< HEAD
							<h5 class="float-right"> 
					    		{{ $student->batch->course->name }}
					    		( {{ $student->batch->course->location->city->name }} )

					    		{{ $student->batch->title }}
=======
							<h5 class="float-right">
								@foreach($student->batches as $student_batch)
								@if($student_batch->pivot->status=="Active")
					    		{{ $student_batch->course->name }}
					    		{{-- nyiyelin --}}
					    		( {{ $student_batch->location->name }} )

					    		( {{ $student_batch->title }} )
					    		@endif
					    		@endforeach
>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7
					    	</h5>
						</div>
					</div>
			    	

			        <div class="row">
						<div class="col-12">
	        				<h4 class="mt-3 mb-4"><u>Student Informations:</u></h4>


				          	<div class="row my-5">

				          		<div class="col-5">
				          			<p class="border-bottom border-secondary text-dark text-center"> {{ $student->namee }} </p>
				          			<p class="text-center font-italic font-weight-lighter"> ( Stduent Name : English ) </p>
				          		</div>

				          		<div class="col-5">
				          			<p class="mmfont border-bottom border-secondary text-dark text-center"> {{ $student->namem }} </p>
				          			<p class="text-center font-italic font-weight-lighter"> ( Stduent Name : Myanmar ) </p>
				          		</div>

				          		<div class="col-2">
				          			<p class="mmfont border-bottom border-secondary text-dark text-center"> {{ $student->gender }} </p>
				          			<p class="text-center font-italic font-weight-lighter"> ( Gender ) </p>
				          		</div>

				          	</div>

				          	<div class="row my-5">
				          		<div class="col-6">
<<<<<<< HEAD
				          			<p class="border-bottom border-secondary text-dark text-center"> {{ $student->education }} </p>
=======
				          			<p class="border-bottom border-secondary text-dark text-center"> {{ $student->degree }} </p>
>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7
				          			<p class="text-center font-italic font-weight-lighter"> ( Education ) </p>
				          		</div>

				          		<div class="col-2">
				          			<p class="border-bottom border-secondary text-dark text-center"> {{ $student->city }} </p>
				          			<p class="text-center font-italic font-weight-lighter"> ( City ) </p>
				          		</div>

				          		<div class="col-4">
				          			<p class="mmfont border-bottom border-secondary text-dark text-center"> {{ $student->accepted_year }} </p>
				          			<p class="text-center font-italic font-weight-lighter"> ( Accepted Year ) </p>
				          		</div>
				          	</div>


				          	<div class="row my-5">
				          		<div class="col-12">
				          			<p class="text-break mmfont border-bottom border-secondary text-dark text-center"> {{ $student->address }}  </p>
				          			<p class="text-center font-italic font-weight-lighter"> ( Address Location ) </p>
				          		</div>
				          	</div>

				          	<div class="row my-4">
				          		<div class="col-4">
				          			<p class="border-bottom border-secondary text-dark text-center"> {{ $student->email }} </p>
				          			<p class="text-center font-italic font-weight-lighter"> ( Email ) </p>
				          		</div>

				          		<div class="col-4">
				          			<p class="border-bottom border-secondary text-dark text-center"> {{ $student->phone }} </p>
				          			<p class="text-center font-italic font-weight-lighter"> ( Phone ) </p>
				          		</div>

				          		<div class="col-4">
				          			<p class="border-bottom border-secondary text-dark text-center"> {{ date('d - M , Y',strtotime($student->dob)) }} </p>
				          			<p class="text-center font-italic font-weight-lighter"> ( Date Of Birth ) </p>
				          		</div>
				          	</div>

				          	<div class="row my-4">
				          		<div class="col-12">
				          			<p class="text-break mmfont border-bottom border-secondary text-dark text-center pb-2">  
				          				@if($student->subjects)
											@foreach($student->subjects as $subject)
												
												<span class="badge badge-dark">
													{{ $subject->name }}
												</span>

											@endforeach

				          				@else
				          					-
				          				@endif

				          			</p>
				          			<p class="text-center font-italic font-weight-lighter"> Which Programming Language did you know? ( <span class="mmfont"> လက်ရှိကျွမ်းကျင်တဲ့ </span> programming language )  </p>
				          		</div>
				          	</div>

				        </div>

			        </div>

			        <div class="row mt-5">
						<div class="col-12">
	        				<h4 class="mt-3 mb-5"><u> Household Parent / Guardian Information:</u></h4>

				          	<div class="row my-4">
				          		<div class="col-4">
				          			<p class="border-bottom border-secondary text-dark text-center"> {{ $student->p1 }} </p>
				          			<p class="text-center font-italic font-weight-lighter"> ( Parent/Guardian #1 ) </p>
				          		</div>

				          		<div class="col-4">
				          			<p class="border-bottom border-secondary text-dark text-center"> {{ $student->p1_phone }} </p>
				          			<p class="text-center font-italic font-weight-lighter"> ( Relationship of Student ) </p>
				          		</div>

				          		<div class="col-4">
				          			<p class="border-bottom border-secondary text-dark text-center"> {{ $student->p1_relationship }} </p>
				          			<p class="text-center font-italic font-weight-lighter"> ( Phone ) </p>
				          		</div>
				          	</div>
							
							<div class="row my-4">
				          		<div class="col-4">
				          			<p class="border-bottom border-secondary text-dark text-center"> {{ $student->p2 }} </p>
				          			<p class="text-center font-italic font-weight-lighter"> ( Parent/Guardian #1 ) </p>
				          		</div>

				          		<div class="col-4">
				          			<p class="border-bottom border-secondary text-dark text-center"> {{ $student->p2_phone }} </p>
				          			<p class="text-center font-italic font-weight-lighter"> ( Relationship of Student ) </p>
				          		</div>

				          		<div class="col-4">
				          			<p class="border-bottom border-secondary text-dark text-center"> {{ $student->p2_relationship }} </p>
				          			<p class="text-center font-italic font-weight-lighter"> ( Phone ) </p>
				          		</div>
				          	</div>

				        </div>

			        </div>

			        <div class="row mt-5">
						<div class="col-12">
	        				<h5 class="mt-3 mb-5"> <span class="mmfont"> သင်တန်းတွေအများကြီးထဲက </span> Myanmar IT Consulting <span class="mmfont"> သင်တန်းကို ရွေးချယ်ရတဲ့ အကြောင်းအရင်းကို သိပါရစေ။</span></h5>

				          	<div class="row my-4">
				          		<div class="col-12">
				          			<p class="border border-secondary text-dark text-center px-4 py-3 mmfont"> {{ $student->because }} </p>
				          		</div>

				          		
				          	</div>
							
				        </div>

			        </div>

			    </div>
		    </div>
		</div>
	</div>
	

@endsection