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
  
  <form method="post" action="{{route('batches.store')}}">
    @csrf
    <div class="form-group row">
      <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputTitle" name="title">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputStartDate" class="col-sm-2 col-form-label">Start Date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="inputStartDate" name="startdate">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputEndDate" class="col-sm-2 col-form-label">End date</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="inputEndDate" name="enddate">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputTime" class="col-sm-2 col-form-label">Time</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputTime" name="time">
      </div>
    </div>


    <div class="form-group row">
      <label for="inputCourse" class="col-sm-2 col-form-label">Courses</label>
      <div class="col-sm-10">
        <select name="course" class="form-control course_change" id="inputCourse">
          <option value="">Choose Course</option>
          @foreach($courses as $row)
            <option value="{{$row->id}}">{{$row->name}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group row">
      <label for="inputTeacher" class="col-sm-2 col-form-label">Teacher</label>
        <div class="col-sm-10 ">
           <select name="teachers[]" class="form-control js-example-basic-multiple teacher" id="inputTeacher" multiple="multiple" disabled="">
          
         
        </select>   
        </div>
      </div>


      <div class="form-group row">
        <label for="inputMentor" class="col-sm-2 col-form-label">Mentor</label>
          <div class="col-sm-10 ">
             <select name="mentors[]" class="form-control js-example-basic-multiple mentor" id="inputMentor" multiple="multiple" disabled="">
            
            
          </select>   
          </div>
        </div>
        
      </select>
   

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


      $('.course_change').change(function () {
      var cid = $(this).val();
     
      $.post("/show_mentor",{id:cid},function (res) {
        
        var data = JSON.parse(res);

        $('.teacher').prop('disabled',false);
        $('.mentor').prop('disabled',false);

        var html ='' ;
        var mentor='';
        $.each(data,function (i,v) {
          
          for (var i = 0; i < v[0].teachers.length; i++) {
            console.log( v[0].teachers[i])



             html +=`<option value="${v[0].teachers[i].tid}">
                      ${v[0].teachers[i].name}
                    </option>`;
            }
            

             for (var i = 0; i < v[0].mentors.length; i++) {
            // console.log( v[0].mentors[i])
            
             mentor +=`<option value="${v[0].mentors[i].mid}">
                      ${v[0].mentors[i].name}
                    </option>`;
            }  
   
            // html +=`<input type="checkbox" name="teachers[]" class='mx-2 my-2' value="${v[0].teachers[i].id}">${v[0].teachers[i].id}`;
            
            

            //  for (var i = 0; i < v[0].mentors.length; i++) {
            // console.log( v[0].mentors[i])
             
            //  mentor +=`<input type="checkbox" class='mx-2 my-2' name="mentors[]" value="${v[0].mentors[i].id}">${v[0].mentors[i].name}`;
            // }  
        })
        $('.teacher').html(html);
       
        $('.mentor').html(mentor);


      })
     })
  })
  </script>
@endsection


