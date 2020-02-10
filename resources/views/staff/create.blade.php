@extends('backendtemplate')

@section('content')
  <h2>Create New Staff</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  
  <form method="post" action="{{route('staffs.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
      <label for="inputprofile" class="col-sm-2 col-form-label">Profile</label>
      <div class="col-sm-10">
        <input type="file" class="form-control-file" id="inputprofile" name="profile">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName" name="name">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail" name="email">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputnrc" class="col-sm-2 col-form-label">NRC</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputnrc" name="nrc">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputDob" class="col-sm-2 col-form-label">Dob</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="inputDob" name="dob">
      </div>
    </div>


    <div class="form-group row">
      <label for="inputphone" class="col-sm-2 col-form-label">Phone</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputphone" name="phone">
      </div>
    </div>


    <div class="form-group row">
      <label for="inputjdate" class="col-sm-2 col-form-label">Join Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="inputjdate" name="joindate">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputfather" class="col-sm-2 col-form-label">Father</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputfather" name="father">
      </div>
    </div>


    <div class="form-group row">
      <label for="inputfather" class="col-sm-2 col-form-label">Location</label>
      <div class="col-sm-10">
        <select class="form-control">
          @foreach($locations as $location)
          <option value="{{$location->id}}">{{$location->name}}</option>
          @endforeach
        </select>
      </div>
    </div>


    


    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>
@endsection