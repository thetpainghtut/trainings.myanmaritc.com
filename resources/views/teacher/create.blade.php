@extends('backendtemplate')

@section('content')
  <h2>Create New Teacher</h2>

  
  
  <form method="post" action="{{route('teacher.store')}}" enctype="multipart/form-data">
    @csrf
    
    <input type="hidden" class="form-control" name="staff_id" value="{{$staff_id}}">

    <div class="form-group row">
      <label for="inputrole" class="col-sm-2 col-form-label">Role</label>
      <div class="col-sm-10">
        <input type="text" class="form-control " id="inputrole" name="role" value="{{$role}}" readonly="" >
      </div>
    </div>


    <div class="form-group row">
      <label for="course" class="col-sm-2 col-form-label">Course</label>
      <div class="col-sm-10">
        <select class="form-control form-control js-example-basic-multiple" name="course_id[]" id="course" multiple="multiple">
          @foreach($courses as $course)
          <option value="{{$course->id}}">
            {{$course->name}} ( {{$course->location->city->name}} )
          </option>
          @endforeach
        </select>
      </div>
    </div>


    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Degree</label>
      <div class="col-sm-10">
       <textarea id="summernote" class="@error('degree') is-invalid @enderror" name="degree" value="{{ old('degree') }}"></textarea>
      </div>
    </div>

   
    

    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
  </form>
@endsection
