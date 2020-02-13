@extends('backendtemplate')

@section('content')
 
 <div class="row">
  <div class="col-12">
   <a href="{{route('staffs.index')}}" class="btn btn-info d-inline-block float-right"><i class="fas fa-angledrawback"></i> Go Back</a>
    
  </div>
 </div>
<div class="card col-md-10 offset-1 shadow">
  <div class="row">
    <div class="col-md-12">
      <div class="card-body">


        <div class="row">

          <div class="col-md-4 offset-1">
            <img src="{{$user->staff->photo}}" class="img-fluid " width="250px" height="300px">
          </div>

          <div class="col-md-6 offset-1">

            <div class="row mb-2">
             
              <div class="col-md-8 text-center">
                <h2>{{$user->name}}</h2>
              </div>
            </div>

            <div class="row">
              <label class="col-sm-4">Role:</label>
              <div class="col-md-8">
                {{$role[0]}}
              </div>
            </div>

            

            <div class="row mt-2">
              <label class="col-sm-4">Email:</label>
              <div class="col-md-8">
                {{$user->email}}
              </div>
            </div>

             <div class="row mt-2">
              <label class="col-sm-4">DOB:</label>
              <div class="col-md-8">
                {{$user->staff->dob}}
              </div>
            </div>

            <div class="row mt-2">
              <label class="col-sm-4">Phone:</label>
              <div class="col-md-8">
                {{$user->staff->phone}}
              </div>
            </div>

            <div class="row mt-2">
              <label class="col-sm-4">NRC:</label>
              <div class="col-md-8">
                {{$user->staff->nrc}}
              </div>
            </div>


            <div class="row mt-2">
              <label class="col-sm-4">Father Name:</label>
              <div class="col-md-8">
                {{$user->staff->fathername}}
              </div>
            </div>

            <div class="row mt-2">
              <label class="col-sm-4">Join Date:</label>
              <div class="col-md-8">
                {{$user->staff->joineddate}}
              </div>
            </div>

            <div class="row mt-2">
              <label class="col-sm-4">Location</label>
              <div class="col-md-8">
                {{$user->staff->location->name}}
              </div>
            </div>

            <div class="row mt-2">
              <label class="col-sm-4">City</label>
              <div class="col-md-8">
                {{$user->staff->location->city->name}}
              </div>
            </div>

            @if($role[0]=="Teacher")
             <div class="row mt-2">
              <label class="col-sm-4">Course:</label>
              <div class="col-md-8">
                  {{$user->staff->teacher->course->name}}
              </div>
            </div>

            <div class="row mt-2">
              <label class="col-sm-4">Degree:</label>
              <div class="col-md-8">
                  {!! $user->staff->teacher->degree !!}
              </div>
            </div>

             @elseif($role[0]=="Mentor")
             <div class="row mt-2">
              <label class="col-sm-4">Course:</label>
              <div class="col-md-8">
                  {{$user->staff->mentor->course->name}}
              </div>
            </div>

            <div class="row mt-2">
              <label class="col-sm-4">Degree:</label>
              <div class="col-md-8">
                  {!! $user->staff->mentor->degree !!}
              </div>
            </div>

            <div class="row mt-2">
              <label class="col-sm-4">Portfolios:</label>
              <div class="col-md-8">
                  {{$user->staff->mentor->portfolio}}
                  
              </div>
            </div>
            @endif

          </div>

        </div>

      </div>
    </div>
  </div>
</div>

@endsection
