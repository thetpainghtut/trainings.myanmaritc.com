@extends('backendtemplate')

@section('content')
  

  <div class="row mb-2">
  <div class="col-12">
    <h2 class="d-inline-block">Updaet Exciting Batch</h2>
    
    <a href="{{route('batches.index')}}" class="btn btn-info d-inline-block float-right"><i class="fas fa-angle-double-left"></i>Go Back</a>
    
  </div>
 </div>

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
      <label for="inputTeacher" class="col-sm-2 col-form-label">Teacher</label>
      <div class="col-sm-10">
        <select name="teachers[]" class="form-control js-example-basic-multiple" id="inputTeacher" multiple="multiple">
          
          @foreach($teachers as $teacher)
             
            <option value="{{$teacher->id}}"  @foreach($batch->teachers as $bat) <?php if($teacher->id==$bat->id) { ?> selected <?php }; ?> @endforeach >{{$teacher->staff->user->name}}</option>
              
          @endforeach
        </select>
      </div>
    </div>


    <div class="form-group row">
      <label for="inputMentor" class="col-sm-2 col-form-label">Teacher</label>
      <div class="col-sm-10">
        <select name="mentors[]" class="form-control js-example-basic-multiple" id="inputMentor" multiple="multiple">
          
          @foreach($mentors as $mentor)
             

            <option value="{{$mentor->id}}"   @foreach($batch->mentors as $bat) <?php if($mentor->id==$bat->id) { ?> selected <?php }; ?>  @endforeach >{{$mentor->staff->user->name}}</option>

             
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

