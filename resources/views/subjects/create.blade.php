@extends('backendtemplate')

@section('content')
  <h2>Create New Subject</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  
  <form method="post" action="{{route('subjects.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName" name="name">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">Course</label>
      <div class="col-sm-10">

        <select class="form-control" name="course_id">
          <option>Choose One</option>
          @foreach($courses as $course)
            <option value="{{$course->id}}">{{$course->name}}</option>
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