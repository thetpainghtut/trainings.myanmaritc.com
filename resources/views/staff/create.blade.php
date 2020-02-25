@extends('backendtemplate')

@section('content')

<div class="row mb-2">
  <div class="col-12">
    <h2 class="d-inline-block">Create New Staff</h2>

    @if(session('nrc_error'))
        <h4 class="text-danger d-inline-block"><< Please Fill Again!! >></h4>
    @endif

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
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" value="{{ old('name') }}" >

        @if($errors->has('name'))
          <span class="text-danger">{{$errors->first('name')}}</span>
        @endif
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email"  value="{{ old('email') }}"  >

         @if($errors->has('email'))
          <span class="text-danger">{{$errors->first('email')}}</span>
        @endif

      </div>
    </div>

    <div class="form-group row">
      <label for="inputnrc" class="col-sm-2 col-form-label">NRC</label>
      <div class="col-sm-10">
        <input type="text" class="form-control @error('nrc') is-invalid @enderror" id="inputnrc" name="nrc"  value="{{ old('nrc') }}">
        @if(session('nrc_error'))
          <span class="text-danger">{{session('nrc_error')}}</span>

        @elseif($errors->has('nrc'))
          <span class="text-danger">{{$errors->first('nrc')}}</span>
        @endif
      </div>
    </div>

    <div class="form-group row">
      <label for="inputDob" class="col-sm-2 col-form-label ">Dob</label>
      <div class="col-sm-10">
        <input type="date" class="form-control @error('dob') is-invalid @enderror" id="inputDob" name="dob"  value="{{ old('dob') }}">
        @if($errors->has('dob'))
          <span class="text-danger">{{$errors->first('dob')}}</span>
        @endif

      </div>
    </div>


    <div class="form-group row">
      <label for="inputphone" class="col-sm-2 col-form-label">Phone</label>
      <div class="col-sm-10">
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="inputphone" name="phone"  value="{{ old('phone') }}">

        @if($errors->has('phone'))
          <span class="text-danger">{{$errors->first('phone')}}</span>
        @endif

      </div>
    </div>


    <div class="form-group row">
      <label for="inputjdate" class="col-sm-2 col-form-label">Join Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control @error('joindate') is-invalid @enderror" id="inputjdate" name="joindate"  value="{{ old('joindate') }}">

        @if($errors->has('joindate'))
          <span class="text-danger">{{$errors->first('joindate')}}</span>
        @endif

      </div>
    </div>

    <div class="form-group row">
      <label for="inputfather" class="col-sm-2 col-form-label">Father</label>
      <div class="col-sm-10">
        <input type="text" class="form-control @error('fathername') is-invalid @enderror" id="inputfather" name="fathername"  value="{{ old('fathername') }}">

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
