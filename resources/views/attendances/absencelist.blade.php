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
          <option value="{{$row->id}}">{{$row->name}} ( {{$row->location->city->name}} )</option>
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
    
          
            <table class="table">
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
              $i=1;
             @endphp
             
             @foreach($students as $key=>$row)
             
                @php
                    $ccc = $row->attendance()->where('student_id',$row->id)->where('status','=','1')->get();
                    $totalcount = count($ccc);
                    

                 @endphp
                 <tr>
                    <td>{{$i++}}</td>
               
                    <td>
                      @foreach($ccc as $c)
                      
                        {{$c->student->namee}}<p>{{$totalcount}}</p>
                      
                      @endforeach
                    </td>

                    <td>
                    @foreach($ccc as $cdate)
                    
                      {{$cdate->date}}
                     <p></p>
                    
                    @endforeach
                    </td>
                    <td>
                       @foreach($ccc as $cdate)
                    
                      <button>Print</button><p></p>
                    
                    @endforeach
                    </td>
                    
                </tr>
               
                
              
              @endforeach
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
        $.ajax({
       url:"{{ route('absencesearch.action') }}",
       method:'GET',
       data:{startdate:startdate,enddate:enddate},
       dataType:'json',
       success:function(data)
       {


            console.log(data.students);
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
