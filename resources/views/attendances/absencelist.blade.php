@extends('backendtemplate')
@section('content')
    
    <h1 class="h3 mb-4 text-gray-800"> Absence Student List </h1>
    
    <div class="card shadow mb-4">
        <div class="card-body">

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
                @isset($students)
                @if(count($students) > 0)
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


                    <div id="dateabsent">
                        <h3 id="startid"></h3>
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Absence Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody"></tbody>
                        </table>
                    </div>



                    <div id="allabsent">
                        <h3>Total Absent Lists</h3>
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
                                    
                                    <td>
                                        <form action="{{route('absenceprint',['id' => $students[$i]->id, 'date' => $date_array[0]]) }}" method="get">
                          
                                            <input type="hidden" name="studentid" value="{{$students[$i]->id}}">
                                            <input type="hidden" name="date" value="{{$date_array[0]}}">
                                            <input type="submit" class="btn btn-primary" value="Print">
                                        </form>
                                    </td>
                                </tr>

                                @php
                                    $datecount = count($date_array);
                                    for($c=1;$c<$datecount;$c++){ 
                                @endphp
                                <tr>
                                    <td>{{$date_array[$c]}}</td>
                                    <td>
                                        <form action="{{route('absenceprint',['id' => $students[$i]->id, 'date' => $date_array[$c]]) }}" method="get">
                          
                                            <input type="hidden" name="studentid" value="{{$students[$i]->id}}">
                                            <input type="hidden" name="date" value="{{$date_array[$c]}}">
                                            <button class="btn btn-primary">Print</button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    }
                                @endphp

                                @php
                                    }
                                @endphp

                            </tbody>
                        </table>
                    </div>
                @endif
            @endif
            @endif
            

        </div>
    </div>






@endsection

@section('script')
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
<script src="https://cdn.jsdelivr.net/mark.js/7.0.0/jquery.mark.min.js"></script>



<script type="text/javascript">
    $(document).ready(function(){
        $('#dateabsent').hide();
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
        
                    if(data.success == true){
                        $('#dateabsent').show();
                        $('#startid').text(startdate+' to '+enddate +' Of Absent List');
                        var countname = data.students.length;
                        var students = data.students;
                        var html = ''; var k=1;
                        for (var i = 0; i < countname; i++) {
                            var scount = students[i].attendance.length;
        
                            var absent_count=0;
                            var date_array=Array();

                            for(var j=0;j<scount;j++){

                                if(startdate <= students[i].attendance[j].date && enddate>= students[i].attendance[j].date && students[i].attendance[j].status==1)
                                {
                                    absent_count++;
                                    date_array.push(students[i].attendance[j].date);

                                }
                            }
                            var sid = students[i].id;
                            var darray = date_array[0];
                            var routeurl = "{{route('absenceprint',['id' => ':id', 'date' => ':date_array']) }}";
                            routeurl = routeurl.replace(':id',sid);
                            routeurl = routeurl.replace(':date_array',darray);
                            // console.log(routeurl);
                            html+=`<tr>
                                    <td rowspan="${absent_count}">${k++}</td>

                                    <td rowspan="${absent_count}">${students[i].namee} <span class="badge badge-danger"> ${absent_count} Day Aabsent</span></td>
                                  
                                    <td>${date_array[0]}</td>
                                    <td>
                                        <form action="${routeurl}"  method="get">
                          
                                            <input type="hidden" name="studentid" value="${students[i].id}">
                                            <input type="hidden" name="date" value="${date_array[0]}">
                                            <input type="submit" class="btn btn-primary" value="Print">
                                        </form>
                                    </td>
                                </tr>`;

            

                            var datecount = date_array.length;
                            for(var c=1;c<datecount;c++){ 
                                    var datec = date_array[c];
                                    var routeurlc = "{{route('absenceprint',['id' => ':id', 'date' => ':cdate']) }}";
                                    routeurlc = routeurlc.replace(':id',sid);
                                    routeurlc = routeurlc.replace(':cdate',datec);
                                    html+=`<tr>
                                                <td>${date_array[c]}</td>
                                                <td>
                                                    <form action="${routeurlc}" method="get">
                      
                                                        <input type="hidden" name="studentid" value="${students[i].id}">
                                                        <input type="hidden" name="date" value="${date_array[c]}">
                                                        <input type="submit" class="btn btn-primary" value="Print">
                                                    </form>
                                                </td>
                                            </tr>`;
                                }

                        }
                        $('#tbody').html(html);
                    }else{
                        $('#dateabsent').hide();
                    }
                }
            })
        })
    });
</script>




@endsection
<style type="text/css">
  mark {
    background: orange;
    color: black;
  }
</style>
