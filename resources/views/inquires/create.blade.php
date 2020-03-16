@extends('backendtemplate')

@section('content')
<h2>Create New Inquire</h2>

@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form method="post" action="{{route('inquires.store')}}" enctype="multipart/form-data">
  @csrf
  <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name="name">
    </div>
  </div>

  <div class="form-group row">
   <label for="inputGender" class="col-sm-2 col-form-label">Gender</label>
    <div class="col-sm-10">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" checked="checked" name="gender">
        <label class="form-check-label" for="inlineRadio1">Male</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
        <label class="form-check-label" for="inlineRadio2">Female</label>
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
    <div class="col-sm-10">
      <input type="number" name="phone" class="form-control" id="inputPhone">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputknowledge" class="col-sm-2 col-form-label">Knowledge</label>
    <div class="col-sm-10">
     <textarea class="form-control" name="knowledge" id="inputknowledge" cols="10" rows="3"></textarea>
    </div>
  </div>

  <div class="form-group row">
   <label for="inputGender" class="col-sm-2 col-form-label">Camp</label>
    <div class="col-sm-10">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="inlineCamp1" value="yes" checked="checked" name="camp">
        <label class="form-check-label" for="inlineCamp1">Yes</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="camp" id="inlineCamp2" value="no">
        <label class="form-check-label" for="inlineCamp2">No</label>
      </div>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEducation" class="col-sm-2 col-form-label">Education</label>
    <div class="col-sm-10">
      <select name="education_id" class="form-control" id="inputEducation">
        <option value="">Choose Education</option>
        @foreach($educations as $education)
          <option value="{{$education->id}}">{{$education->name}}</option>
        @endforeach
      
      </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="inputAcceptedYear" class="col-sm-2 col-form-label">Accepted Year</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputAcceptedYear" name="acceptedyear">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputBatch" class="col-sm-2 col-form-label">Course</label>
    <div class="col-sm-10">
      <select class="form-control" id="inputCourse">
        <option value="">Choose Course</option>
        @foreach($courses as $course)
          <option value="{{$course->id}}">{{$course->name}}</option>
        @endforeach
        </select>
    </div>
  </div>

  <div class="form-group row" id="inputBatch">
    
        
   
  </div> 

  <div class="form-group row">
    <label for="inputTownship" class="col-sm-2 col-form-label">Township</label>
    <div class="col-sm-10">
      <select name="township_id" class="form-control" id="inputTownship">
        <option value="">Choose Township</option>
        @foreach($townships as $township)
          <option value="{{$township->id}}">{{$township->name}}</option>
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

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#inputCourse').change(function(){
        var course_id = $(this).val();
        console.log(course_id);
        $.post('/getBatches',{course_id:course_id},function(response){
          console.log(response);
          var batches_data =`<label for="inputBatch" class="col-sm-2 col-form-label">Batch</label>
                <div class="col-sm-10">
                  <select name="batch_id" class="form-control" >
                  <option value="">Choose Batch</option>`;
          $.each(response,function(i,v) {
            batches_data+=`<option value="${v.id}">${v.title}</option>`;
          })
          batches_data+=`</select></div>`;

          $('#inputBatch').html(batches_data);

        })
      })


  })
</script>
@endsection