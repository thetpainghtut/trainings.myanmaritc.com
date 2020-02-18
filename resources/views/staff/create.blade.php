@extends('backendtemplate')

@section('content')

<div class="row mb-2">
  <div class="col-12">
    <h2 class="d-inline-block">Create New Staff</h2>
    
    <a href="{{route('staffs.index')}}" class="btn btn-info d-inline-block float-right"><i class="fas fa-angle-double-left"></i>Go Back</a>
    
  </div>
 </div>
  
  <form method="post" action="{{route('staffs.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
      <label for="inputprofile" class="col-sm-2 col-form-label">Profile</label>
      <div class="col-sm-10">
        <input type="file" class="form-control-file" id="inputprofile" name="profile">

        @if($errors->has('profile'))
          <span class="text-danger">{{$errors->first('profile')}}</span>
        @endif

      </div>
    </div>

    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName" name="name">

        @if($errors->has('name'))
          <span class="text-danger">{{$errors->first('name')}}</span>
        @endif
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail" name="email">

         @if($errors->has('email'))
          <span class="text-danger">{{$errors->first('email')}}</span>
        @endif

      </div>
    </div>

    <div class="form-group row">
      <label for="inputnrc" class="col-sm-2 col-form-label">NRC</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputnrc" name="nrc">
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
        <input type="date" class="form-control" id="inputDob" name="dob">
        @if($errors->has('dob'))
          <span class="text-danger">{{$errors->first('dob')}}</span>
        @endif

      </div>
    </div>


    <div class="form-group row">
      <label for="inputphone" class="col-sm-2 col-form-label">Phone</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputphone" name="phone">

        @if($errors->has('phone'))
          <span class="text-danger">{{$errors->first('phone')}}</span>
        @endif

      </div>
    </div>


    <div class="form-group row">
      <label for="inputjdate" class="col-sm-2 col-form-label">Join Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="inputjdate" name="joindate">

        @if($errors->has('joindate'))
          <span class="text-danger">{{$errors->first('joindate')}}</span>
        @endif

      </div>
    </div>

    <div class="form-group row">
      <label for="inputfather" class="col-sm-2 col-form-label">Father</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputfather" name="fathername">

        @if($errors->has('fathername'))
          <span class="text-danger">{{$errors->first('fathername')}}</span>
        @endif

      </div>
    </div>


    <div class="form-group row">
      <label for="inputfather" class="col-sm-2 col-form-label">Location</label>
      <div class="col-sm-10">
        <select class="form-control" name="location_id">
          @foreach($locations as $location)
          <option value="{{$location->id}}">{{$location->name}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <section>
      <div class="form-group row">
        <label for="role" class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-10">
          <select class="form-control" name="role">
            @foreach($roles as $role)
            <option value="{{$role->name}}" <?php if($role->name=="Admin"){?>  disabled style="display:none" <?php } ?>>{{$role->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </section>
    

    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>
@endsection
