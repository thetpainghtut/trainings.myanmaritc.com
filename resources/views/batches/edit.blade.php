@extends('backendtemplate')

@section('content')
  <h2>Create New Batch</h2>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  
  <form method="post" action="{{route('batches.update',$batch->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group row">
      <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputTitle" name="title" value="{{$batch->title}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputStartDate" class="col-sm-2 col-form-label">Start Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="inputStartDate" name="startdate" value="{{$batch->startdate}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEndDate" class="col-sm-2 col-form-label">End date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="inputEndDate" name="enddate" value="{{$batch->enddate}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputTime" class="col-sm-2 col-form-label">Time</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputTime" name="time" value="{{$batch->time}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputCourse" class="col-sm-2 col-form-label">Courses</label>
      <div class="col-sm-10">
        <select name="course" class="form-control" id="inputCourse">
          <option value="">Choose Course</option>
          @foreach($courses as $row)
            <option value="{{$row->id}}" @if($batch->course_id == $row->id) {{'selected'}} @endif>{{$row->name}}</option>
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