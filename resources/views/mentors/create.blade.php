@extends('backendtemplate')
@section('content')
  <h2>Add New Mentor</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  
  <form method="post" action="{{route('mentors.store')}}" enctype="multipart/form-data">
    @csrf
   
   
     <input type="hidden" class="form-control" name="staff_id" value="{{$staff_id}}">

      <div class="form-group row">
        <label for="inputrole" class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputrole" name="role" value="{{$role}}" readonly="">
        </div>
      </div>


      <div class="form-group row">
        <label for="course" class="col-sm-2 col-form-label">Course</label>
        <div class="col-sm-10">
          <select class="form-control" name="course_id" id="course">
            @foreach($courses as $course)
            <option value="{{$course->id}}">
              {{$course->name}}
            </option>
            @endforeach
          </select>
        </div>
      </div>
    <div class="form-group row">
      <label for="inputPortfolio" class="col-sm-2 col-form-label">Portifolio</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPortfolio" name="portfolio">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Degree</label>
      <div class="col-sm-10">
       <textarea id="summernote" name="degree"></textarea>
      </div>
    </div>
    
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>
@endsection