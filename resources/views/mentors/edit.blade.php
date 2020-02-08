@extends('backendtemplate')
@section('content')
  <h2>Edit</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  
  <form method="post" action="{{route('mentors.update',$mentor->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName" name="name" value="{{$mentor->user->name}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail" name="email" value="{{$mentor->user->email}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="inputAddress" name="address">{{$mentor->address}}</textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPhoneNo" class="col-sm-2 col-form-label">Phone No</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPhoneNo" name="phone" value="{{$mentor->phone}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPortfolio" class="col-sm-2 col-form-label">Portifolio</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPortfolio" name="portfolio" value="{{$mentor->portfolio}}">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </form>
@endsection