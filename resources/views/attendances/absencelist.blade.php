@extends('backendtemplate')
@section('content')
<h2 class="d-inline-block">Absence Student List</h2>

<form method="get" action="{{route('absence')}}">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCourse">Choose Course:</label>
      <select name="course" class="form-control" id="course">
        <option disabled selected="">Please Select Course</option>
        @foreach($courses as $row)
        <option value="{{$row->id}}">{{$row->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="inputCourse">Choose Batch:</label>
      <select id="batch" name="batch" class="form-control">
        <option value="" disabled selected>Please Select Batch</option>
      </select>

    </div>

    <div class="form-group col-md-2 mt-2">
      <button type="submit" class="btn btn-primary mt-4" id="search">Search</button>
    </div>

  </div>
</form>

@if($status != 0)
<form action="#">
  <input type="hidden" name="batch" id="batches" value="{{$requestbatch}}">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCourse">Start Date:</label>
      <input type="date" name="startdate" class="form-control" id="startdate">
    </div>

    <div class="form-group col-md-4">
      <label for="inputCourse">End Date:</label>
      <input type="date" name="enddate" class="form-control" id="enddate">

    </div>

    <div class="form-group col-md-2 mt-2">
      <button type="button" class="btn btn-primary mt-4" id="datesearch">Search</button>
    </div>

  </div>

</form>

@isset($students)
@if(count($students) > 0)


<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Absence Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  @php
  $k=1;
  $stucount = count($students);
  @endphp


  @php

  for($i=0;$i<$stucount;$i++){

    $scount = count($students[$i]->attendance);
    
    $absent_count=0;
    $date_array=array();
    for($j=0;$j<$scount;$j++){

      if($students[$i]->attendance[$j]->status==1){
        $absent_count++;
        array_push($date_array,$students[$i]->attendance[$j]->date);

      }
    }
    
  @endphp
  <tr>
    <td rowspan="{{$absent_count}}">{{$k++}}</td>

    <td rowspan="{{$absent_count}}">{{$students[$i]->namee}} <span class="badge badge-danger"> {{$absent_count}} Day Aabsent</span></td>
    
    <td>{{$date_array[0]}}</td>
    <td><button class="btn btn-primary">Print</button></td>
  </tr>

@php
  $datecount = count($date_array);
  for($c=1;$c<$datecount;$c++){ 
@endphp
  <tr>
    <td>{{$date_array[$c]}}</td>
    <td><button class="btn btn-primary">Print</button></td>
  </tr>
@php
  }
@endphp

@php
}
@endphp

</tbody>
</table>

@endif
@endif


@endif


@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
<script src="https://cdn.jsdelivr.net/mark.js/7.0.0/jquery.mark.min.js"></script>



<script type="text/javascript">
  $(document).ready(function(){
    $('#datesearch').click(function(){
      var startdate = $('#startdate').val();
      var enddate = $('#enddate').val();
      var batches = $('#batches').val();

      $.ajax({
       url:"{{ route('absencesearch.action') }}",
       method:'GET',
       data:{startdate:startdate,enddate:enddate,batch_id:batches},
       dataType:'json',
       success:function(data)
       {
        var countname = data.students.length;
        var students = data.students;
           for (var i = 0; i < countname; i++) {
             var scount = students[i].attendance;
             console.log(scount);
           }
      }
    })
    })
  })
</script>




@endsection
<style type="text/css">
  mark {
    background: orange;
    color: black;
  }
</style>
