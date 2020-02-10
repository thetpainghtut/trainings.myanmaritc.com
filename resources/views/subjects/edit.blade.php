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
  
  <form method="post" action="{{route('subjects.update',$subject->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName" name="name" value="{{$subject->name}}">
      </div>
    </div>


    <div class="form-group row">
      <label for="inputName" class="col-sm-2 col-form-label">Course</label>
      <div class="col-sm-10">
       <select name="course_id" class="form-control">
        @foreach($courses as $course)
         <option value="{{$course->id}}" <?php if($course->id==$subject->course_id) { ?>  selected <?php }; ?> >
            {{$course->name}}
         </option>
         @endforeach
       </select>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </form>
@endsection