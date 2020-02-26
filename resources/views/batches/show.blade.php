@extends('backendtemplate')

@section('content')
 
<style type="text/css">
      .custom{
            border-radius: 70px 0px;
            border-color: red gray;
            border-style: dashed;
            
      }
</style>

 <div class="row">
  <div class="col-12">
   <a href="{{route('batches.index')}}" class="btn btn-info d-inline-block float-right"><i class="fas fa-angle-double-left"></i>Go Back</a>
    
  </div>
 </div>
<div class="card col-md-8 shadow offset-2 custom">
  <div class="row">
    <div class="col-md-12">
      <div class="card-body">
      	<div class="row mb-3">
      		<div class="col-md-8 text-center offset-2 ">
      			<h3>{{$batches->title}}</h3>
      		</div>
      	</div>

      	<div class="row">
      		<div class="col-md-2 offset-3">
      			<label>Course</label>
      		</div>
      		<div class="col-md-6">
      			<h6>{{$batches->course->name}} ( {{$batches->course->location->city->name}} )</h6>
      		</div>
      	</div>

      	<div class="row">
      		<div class="col-md-2 offset-3">
      			<label>Fees</label>
      		</div>
      		<div class="col-md-6 ">
      			<h6>{{$batches->course->fees}}</h6>
      		</div>
      	</div>

      	<div class="row">
      		<div class="col-md-2 offset-3">
      			<label>During</label>
      		</div>
      		<div class="col-md-6">
      			<h6>{{$batches->course->during}}</h6>
      		</div>
      	</div>

      	<div class="row">
      		<div class="col-md-2 offset-3">
      			<label>Duration</label>
      		</div>
      		<div class="col-md-6">
      			<h6>{{$batches->course->duration}}</h6>
      		</div>
      	</div>

      	<div class="row">
      		<div class="col-md-2 offset-3">
      			<label>Start Date</label>
      		</div>
      		<div class="col-md-6">
      			
      			<h6>{{$batches->startdate}}</h6>
      		</div>
      	</div>

      	<div class="row">
      		<div class="col-md-2 offset-3">
      			<label>End Date</label>
      		</div>
      		<div class="col-md-6">
      			
      			<h6>{{$batches->enddate}}</h6>
      		</div>
      	</div>

      	<div class="row">
      		<div class="col-md-2 offset-3">
      			<label>Time</label>
      		</div>
      		<div class="col-md-6">
      			
      			<h6>{{$batches->time}}</h6>
      		</div>
      	</div>


      	<div class="row">
      		<div class="col-md-2 offset-3">
      			<label>Teacher</label>
      		</div>
      		<div class="col-md-6">
      			@foreach($batches->teachers as $bat)
      				{{--@php
      					$value[] = $bat->staff->user->id;
      					$data = implode('', array_unique($value));
      				@endphp--}}

      				@if ($bat->staff->user->id)
      				<h6 class="d-inline-block">{{$bat->staff->user->name}}, </h6>
      				@endif
		      	@endforeach
      			
      		</div>
      	</div>

            @if(count($batches->mentors)>0)
      	<div class="row">
      		<div class="col-md-2 offset-3">
      			<label>Mentor</label>
      		</div>
      		<div class="col-md-6">
      			@foreach($batches->mentors as $bat)
      				
      				<h6 class="d-inline-block">{{$bat->staff->user->name}} , </h6>
		      		
		      	@endforeach
      			
      		</div>
      	</div>

            @endif


      	
      </div>
    </div>
  </div>
</div>

@endsection
