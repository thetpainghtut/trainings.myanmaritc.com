@extends('backendtemplate')

@section('content')


<div class="row">
  <div class="col-12">
  <h2 class="d-inline-block">Update Exiting Staff</h2>

   <a href="{{route('staffs.index')}}" class="btn btn-info d-inline-block float-right"><i class="fas fa-angle-double-left"></i>Go Back</a>
    
  </div>
 </div>

  
  
  <form method="post" action="{{route('staffs.store')}}" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="id" value="{{$user->id}}">
    <input type="hidden" name="oldphoto" value="{{$user->staff->photo}}">

    <div class="form-group row">
      <label for="inputprofile" class="col-sm-2 col-form-label">Profile</label>
      <div class="col-sm-10">


        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Photo</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo</a>
            
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
             <img src="{{$user->staff->photo}}" class="img-fluid my-2" width="100px" height="100px">
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <input type="file" name="newphoto" class="form-control-file my-2">
          </div>
         
        </div>

      </div>
    </div>

    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName" name="name" value="{{$user->name}}">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail" name="email" value="{{$user->email}}">

         @if($errors->has('email'))
          <span class="text-danger">{{$errors->first('email')}}</span>
        @endif

      </div>
    </div>

    <div class="form-group row">
      <label for="inputnrc" class="col-sm-2 col-form-label">NRC</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputnrc" name="nrc" value="{{$user->staff->nrc}}">
        @if(session('nrc_error'))
          <span class="text-danger">{{session('nrc_error')}}</span>

        @elseif($errors->has('nrc'))
          <span class="text-danger">{{$errors->first('nrc')}}</span>
        @endif
      </div>
    </div>

    <div class="form-group row">
      <label for="inputDob" class="col-sm-2 col-form-label">Dob</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="inputDob" name="dob" value="{{$user->staff->dob}}">
        @if($errors->has('dob'))
          <span class="text-danger">{{$errors->first('dob')}}</span>
        @endif

      </div>
    </div>


    <div class="form-group row">
      <label for="inputphone" class="col-sm-2 col-form-label">Phone</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputphone" name="phone" value="{{$user->staff->phone}}">

        @if($errors->has('phone'))
          <span class="text-danger">{{$errors->first('phone')}}</span>
        @endif

      </div>
    </div>


    <div class="form-group row">
      <label for="inputjdate" class="col-sm-2 col-form-label">Join Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="inputjdate" name="joindate" value="{{$user->staff->joineddate}}">

        @if($errors->has('joindate'))
          <span class="text-danger">{{$errors->first('joindate')}}</span>
        @endif

      </div>
    </div>

    <div class="form-group row">
      <label for="inputfather" class="col-sm-2 col-form-label">Father</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputfather" name="fathername" value="{{$user->staff->fathername}}">

        @if($errors->has('fathername'))
          <span class="text-danger">{{$errors->first('fathername')}}</span>
        @endif

      </div>
    </div>
    

    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </form>
@endsection
