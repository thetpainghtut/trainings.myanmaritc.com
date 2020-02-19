@extends('backendtemplate')

@section('content')
  <h2>Create New Course</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  
  <form method="post" action="{{route('courses.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
      <label for="inputcodeno" class="col-sm-2 col-form-label">Codeno</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputcodeno" name="codeno">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName" name="name">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputFile" class="col-sm-2 col-form-label">Logo</label>
      <div class="col-sm-10">
        <input type="file" class="form-control-file" id="inputFile" name="logo">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputOutline" class="col-sm-2 col-form-label">Outlines</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="inputOutline" name="outlines"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputFees" class="col-sm-2 col-form-label">Fees</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="inputFees" name="fees">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputDuring" class="col-sm-2 col-form-label">During</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputDuring" name="during">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputDuration" class="col-sm-2 col-form-label">Duration</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputDuration" name="duration">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputDuration" class="col-sm-2 col-form-label">Location</label>
      <div class="col-sm-10">
        <select name="location" class="form-control">
        @foreach($locations as $row)
          <option value="{{$row->id}}">{{$row->name}}</option>
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