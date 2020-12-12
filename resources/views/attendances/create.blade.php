@extends('backendtemplate')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('sb_admin2/vendor/attendance.css') }}">

    <h1 class="h3 mb-4 text-gray-800"> Daily Attendance </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> All Students 
                
            </h5>
        </div>

        <div class="card-body" id="over">

            <form method="get" action="{{route('attendances.index')}}">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCourse">Choose Course:</label>
                        @role('Teacher')
                        <select name="course" class="form-control" id="coursem">
                            <option disabled selected="">Please Select Course</option>
                            @foreach($courses as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                        @endrole
                        @role('Mentor')
                        <select name="course" class="form-control" id="coursem">
                            <option disabled selected="">Please Select Course</option>
                            
                                <option value="{{$courses->id}}">{{$courses->name}}</option>
                          
                        </select>
                        @endrole
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputCourse">Choose Batch:</label>
                        <select id="batch" name="batch" class="form-control">
                            <option value="" disabled selected>Please Select Batch</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2 mt-2">
                        <button type="submit" class="btn btn-primary mt-4" id="batchsearch">Search</button>
                    </div> 
                </div>
            </form>

            @isset($students, $schedules)
            @if(count($students) > 0 && count($schedules))
            <div class="row">

                <div class="col-12">
                    <div class="card mb-3 border-1 border-primary">
                        <div class="text-white bg-primary card-header">
                            {{ $todaydate }}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-1 order-1">
                                    <small> {{ $batch->course->name }} 
                                         ( {{$batch->location->city->name}} )
                                    </small>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-5 order-sm-5 order-5">
                                    <span class="text-dark"> Teacher : </span>

                                    @foreach($batch->teachers as $bat)
                                        @if ($bat->staff->user->id)
                                            <span>
                                                {{ $loop->first ? '' : ', ' }}
                                                {{$bat->staff->user->name}} 
                                            </span>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 order-xl-3 order-lg-3 order-md-2 order-sm-2 order-2">
                                    <h5 class="card-title"> {{$batch->title}} </h5>
                                </div>

                                @if(count($batch->mentors)>0)
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 order-xl-4  order-lg-4 order-md-6 order-sm-6 order-6">
                                    <span class="text-dark"> Mentor : </span>

                                    @foreach($batch->mentors as $bat)
                                        <span class="d-inline-block">
                                            {{ $loop->first ? '' : ', ' }}
                                            {{$bat->staff->user->name}}  
                                        </span>
                                    @endforeach
                                </div>
                                @endif

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 order-xl-5 order-lg-5 order-md-3 order-sm-3 order-3">
                                    <span class="text-dark"> Start Date : </span>

                                    <span> {{ Carbon\Carbon::parse($batch->startdate)->formatLocalized('%d %B, %Y') }}
                                    </span>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 order-xl-6 order-lg-6 order-md-7 order-sm-7 order-7">
                                    <span class="text-dark"> Time : </span>

                                    <span> {{$batch->time}} </span>
                                    <span> ( {{$batch->course->during}} ) </span>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 order-xl-7 order-lg-7 order-md-4 order-sm-4 order-4">
                                    <span class="text-dark"> End Date : </span>

                                    <span> {{ Carbon\Carbon::parse($batch->enddate)->formatLocalized('%d %B, %Y') }} </span>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 order-xl-8 order-lg-8 order-md-8 order-sm-8 order-8">
                                    <span class="text-dark"> Total Student : </span>

                                    <span> {{ count($batch->students) }} </span>
                                </div>
                            </div>
                        </div>

             
                    </div>
                </div>
                
                <div class="col-12">
                    <form action="{{route('attendances.store')}}" method="post" >
                        @csrf
                        <div class="table-responsive">

                            @php
                                $schedulecount = count($schedules);
                            @endphp
                            <table class="table table-bordered">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th rowspan="3" style="vertical-align:middle">#</th>
                                        <th rowspan="3" style="vertical-align : middle;">Name</th>
                                        <th colspan="{{ $schedulecount }}">Schedule</th>
                                    </tr>
                                    <tr>
                                        @foreach($schedules as $schedule)

                                        @php
                                            $time_str = $schedule->time_event;
                                            $time_arr = explode('-',$time_str);

                                            $starttime = trim($time_arr[0]);
                                            $endtime = trim($time_arr[1]);

                                            $starttimeFormat = Carbon\Carbon::create($starttime)->format('h:i: a');
                                            $endtimeFormat = Carbon\Carbon::create($endtime)->format('h:i: a');

                                            $timeFormat = $starttimeFormat.' - '.$endtimeFormat;
                                        @endphp
                                            <th> {{ $timeFormat }} </th>
                                        @endforeach
                                    </tr>

                                    <tr>
                                        @foreach($schedules as $schedule)
                                            <th> {{ $schedule->title }} </th>
                                        @endforeach
                                    </tr>

                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                        $checked = true;
                                    @endphp
                                   
                                    @foreach($students as $row)
                                    <tr>
                                        <td style="vertical-align:middle;"> {{$i++}} </td>

                                        <td> 
                                            <input type="hidden" name="studentid[]" value="{{$row->id}}" multiple="">
                                            {{$row->namee}} 
                                            <small class="d-block"> {{$row->phone}} </small>
                                        </td>
                                            

                                        @foreach($schedules as $key => $schedule)
                                        @php
                                            $schedule_id = $schedule->id;

                                            $time_str = $schedule->time_event;
                                            $time_arr = explode('-',$time_str);

                                            $starttime = trim($time_arr[0]);
                                            $endtime = trim($time_arr[1]);

                                            $starttimeFormat = Carbon\Carbon::create($starttime)->format('h:i: a');
                                            $endtimeFormat = Carbon\Carbon::create($endtime)->format('h:i: a');

                                            $timeFormat = $starttimeFormat.' - '.$endtimeFormat;
                                        @endphp
                                            @if(count($schedule->attendances))
                                            <td class="text-center">
                                                @foreach($schedule->attendances as $rollcall)
                                                    
                                                    @if($rollcall->student_id == $row->id)
                                                        @if($rollcall->status == 0)
                                                        <a href="javascript:void(0)" class="btn btn-success btn-sm rounded-0 scheduleBtn" data-id="{{ $rollcall->id }}" data-status="{{ $rollcall->status }}" data-remark="{{ $rollcall->remark }}" data-studentid="{{ $rollcall->student_id }}" data-student="{{ $rollcall->student->namee }}" data-scheduleid="{{ $rollcall->schedule_id }}" data-schedule="{{ $rollcall->schedule->title }}" data-scheduletime="{{ $timeFormat }}">
                                                            Present
                                                        </a>

                                                        @elseif($rollcall->status == 1)
                                                        <a href="javascript:void(0)" class="btn btn-danger btn-sm rounded-0 scheduleBtn" data-id="{{ $rollcall->id }}" data-status="{{ $rollcall->status }}" data-remark="{{ $rollcall->remark }}" data-studentid="{{ $rollcall->student_id }}" data-student="{{ $rollcall->student->namee }}" data-scheduleid="{{ $rollcall->schedule_id }}" data-schedule="{{ $rollcall->schedule->title }}" data-scheduletime="{{ $timeFormat }}" <?php if($rollcall->remark != 'NULL'): ?> data-toggle="tooltip" data-placement="top" title="{{ $rollcall->remark }}" <?php endif ?> >
                                                            Absent
                                                        </a>

                                                        @elseif($rollcall->status == 2)
                                                        <a href="javascript:void(0)" class="btn btn-info btn-sm rounded-0 px-3 scheduleBtn" data-id="{{ $rollcall->id }}" data-status="{{ $rollcall->status }}" data-remark="{{ $rollcall->remark }}" data-studentid="{{ $rollcall->student_id }}" data-student="{{ $rollcall->student->namee }}" data-scheduleid="{{ $rollcall->schedule_id }}" data-schedule="{{ $rollcall->schedule->title }}" data-scheduletime="{{ $timeFormat }}" <?php if($rollcall->remark != 'NULL'): ?> data-toggle="tooltip" data-placement="top" title="{{ $rollcall->remark }}" <?php endif ?> >
                                                            Late
                                                        </a>

                                                        @else
                                                        <a href="javascript:void(0)" class="btn btn-warning btn-sm rounded-0 scheduleBtn" data-id="{{ $rollcall->id }}" data-status="{{ $rollcall->status }}" data-remark="{{ $rollcall->remark }}" data-studentid="{{ $rollcall->student_id }}" data-student="{{ $rollcall->student->namee }}" data-scheduleid="{{ $rollcall->schedule_id }}" data-schedule="{{ $rollcall->schedule->title }}" data-scheduletime="{{ $timeFormat }}" <?php if($rollcall->remark != 'NULL'): ?> data-toggle="tooltip" data-placement="top" title="{{ $rollcall->remark }}" <?php else: ?> data-toggle="tooltip" data-placement="top" title="ခွင့်မဲ့" <?php endif ?>>
                                                            Excused
                                                        </a>

                                                        @endif
                                                    @endif
                                                    
                                                @endforeach
                                                </td>
                                            @else
                                            <td class="text-center" style="">
                                                @if(count($schedule_now) >0) 
                                                    @if($schedule_now[0] == $schedule_id)
                                                        <input type="hidden" name="scheduleid" value="{{ $schedule_id }}">
                                                        

                                                            <div class="radio-group-control">
                                                                <label class="radio-group-label">
                                                                    <input type="radio" name="attendanceStataus[{{$row->id}}]" class="statusCheck" checked value="0" data-status="0" data-id="{{ $row->id }}">
                                                                    <span class="radio-group-label__text"><span class="radio-group-tick"></span>Present </span>
                                                                </label>

                                                                <label class="radio-group-label">
                                                                    <input type="radio" name="attendanceStataus[{{$row->id}}]" class="statusCheck" value="2" data-status="2" data-id="{{ $row->id }}">
                                                                    <span class="radio-group-label__text"><span class="radio-group-tick"></span>Late </span>
                                                                </label>
                                                              
                                                                <label class="radio-group-label">
                                                                    <input type="radio" name="attendanceStataus[{{$row->id}}]" class="statusCheck" value="1" data-status="1" data-id="{{ $row->id }}">
                                                                    <span class="radio-group-label__text"><span class="radio-group-tick"></span> Absent </span>
                                                                </label>

                                                                <label class="radio-group-label">
                                                                    <input type="radio" name="attendanceStataus[{{$row->id}}]" class="statusCheck" value="3" data-status="3" data-id="{{ $row->id }}">
                                                                    <span class="radio-group-label__text"><span class="radio-group-tick"></span> Excused </span>
                                                                </label>

                                                                
                                                            </div>

                                                            <input type="text" name="remark[]" class="form-control form-control-sm mt-2 d-none" id="remark{{$row->id}}">
                                                    @else
                                                        <input type="checkbox" disabled="">
                                                            
                                                    @endif
                                                @else
                                                    <input type="checkbox" disabled=""> 
                                                @endif
    
                                                </td>
                                            @endif

                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="text-center">
                                    <tr>
                                        <th colspan="2" style="vertical-align : middle;">
                                            Today Attendance ( {{ $todaydate }} )
                                        </th>
                                        <th colspan="{{ $schedulecount }}"> 
                                            @if(count($schedule_now) >0) 
                                                <button class="btn btn-outline-primary" type="submit"> Confirm and Save </button> 
                                            @else
                                                <button class="btn btn-outline-primary" type="button" disabled=""> Confirm and Save </button>
                                            @endif
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </form>
                </div>

                   
            </div>

            @endif
            @endif

            
        </div>
    </div>

    <div class="modal scheduleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <ul class="nav nav-tabs nav-justified mb-3" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"> Attendnace List </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"> Change Attendance </a>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </li>
                    </ul>
                    
                

                
                    
                    <div class="tab-content" id="myTabContent">

                        <div class="row bg-primary text-white mb-3">
                            <div class="container-fluid">
                                <div class="row d-flex align-items-center justify-content-center py-2">
                                    <label class="col-md-4 my-auto mx-auto"> Schedule : </label>
                                    <div class="col-md-3">
                                        <p id="scheduleTitle" class="my-auto mx-auto"></p>
                                    </div>
                                    <div class="col-md-3">
                                        <p id="scheduleTime" class="my-auto mx-auto"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                            <div class="row">
                                <label class="col-md-5 offset-md-1"> Student : </label>
                                <div class="col-md-6">
                                    <p id="studentName"></p>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-5 offset-md-1"> Attendance Status : </label>
                                <div class="col-md-6">
                                    <p id="attendanceRank" ></p>
                                </div>
                            </div>

                            <div class="row" id="attendanceReasonDiv">
                                <label class="col-md-5 offset-md-1"> Reason : </label>
                                <div class="col-md-6">
                                    <p id="attendanceReasonText" ></p>
                                </div>
                            </div>
                            
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">

                                <div class="offsset-1 col-10 offset-1">
                                
                                    <form action="{{route('attendances.update')}}" method="POST">
                                        @csrf

                                        <input type="hidden" name="attupdid" id="attendanceidInput">
                                        
                                    
                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label"> Name </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control-plaintext" id="studentnameInput">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label"> Attendnace Status </label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="attendancestatausInput" name="attupdstatus">
                                                    <option value="0"> Present </option>
                                                    <option value="2"> Late </option>
                                                    <option value="1"> Absent </option>
                                                    <option value="3"> Excused </option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="form-group row" id="reasonDiv">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label"> Reason </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="reasonInput" name="attupdreason">
                                            </div>
                                        </div>

                                        <div class="form-group row" id="lateDiv">
                                            <label for="colFormLabel" class="col-sm-4 col-form-label"> Late Time </label>
                                            <div class="col-sm-8">
                                                <input type="time" class="form-control" id="latetimeInput" name="attupdlatetime">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                              <button type="submit" class="btn btn-primary btn-sm"> Update </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            
                            
                        </div>
                    </div>

                </div>
                    
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

    <script type="text/javascript">

        $('#over').on('click','input[type="radio"]',function(){
            // $().click(function(){
            var status=$(this).data('status');
            var id=$(this).data('id');

            // 0 => Present
            // 1 => Absent
            // 2 => Late
            // 3 => Excused
            var remarkId = '#remark'+id;

            if (status == 1 || status == 3) {
                console.log(remarkId);
                $(remarkId).removeClass('d-none');
                $(remarkId).attr("placeholder", "Enter Some reason");
                $(remarkId).attr('type', 'text');

            }
            else if(status == 2){
                $(remarkId).removeClass('d-none');
                $(remarkId).attr("placeholder", "Enter Late Time");
                $(remarkId).attr('type', 'time');

            }
            else{
                $('#remark'+id).addClass('d-none');

            }

            console.log(status);
        });

        $('tbody').on('click','.scheduleBtn',function(){

            // 0 => Present
            // 1 => Absent
            // 2 => Late
            // 3 => Excused
            $('#attendanceReasonDiv').hide();

            var id = $(this).data('id');
            var status = $(this).data('status');
            var remark = $(this).data('remark');
            var studentid = $(this).data('studentid');
            var student = $(this).data('student');

            var scheduleid = $(this).data('scheduleid');
            var schedule = $(this).data('schedule');
            var scheduletime = $(this).data('scheduletime');

            $('#studentName').text(student);

            $('#scheduleTitle').text(schedule);
            $('#scheduleTime').text(scheduletime);

            $('#studentnameInput').val(student);
            $('#attendanceidInput').val(id);
            $('#attendancestatausInput').val(status);


            if ( $('#profile').hasClass( "active show" ) ) {
                $('#profile').removeClass("active show")
            }

            if (!$('#home').hasClass( "active show" ) ) {
                $('#home').addClass("active show")
            }

            if ( $('#profile-tab').hasClass( "active" ) ) {
                $('#profile-tab').removeClass('active')
            }


            if (!$('#home-tab').hasClass( "active" ) ) {
                $('#home-tab').addClass('active')
            }
            

            if (status == 1) {
                $('#attendanceRank').html(`<span class="badge badge-danger px-4  py-2"> Absent </span>`);

                if (remark == 'NULL') {
                    $('#reasonInput').val('');
                }else{
                    $('#reasonInput').val(remark);
                }

                $('#reasonDiv').show();
                $('#lateDiv').hide();

            }
            else if (status == 2) {
                $('#attendanceRank').html(`<span class="badge badge-info px-4  py-2"> Late </span>`);

                if (remark != 'NULL') {
                    $('#latetimeInput').val(remark);
                }
                else{
                    $('#latetimeInput').val('');

                }

                $('#reasonDiv').hide();
                $('#lateDiv').show();


            }
            else if (status == 3) {
                $('#attendanceRank').html(`<span class="badge badge-warning px-4  py-2"> Excused </span>`);

                if (remark == 'NULL') {
                    $('#reasonInput').val('');

                }else{
                    $('#reasonInput').val(remark);
                }

                $('#reasonDiv').show();
                $('#lateDiv').hide();

            }
            else{
                $('#attendanceRank').html(`<span class="badge badge-success px-4  py-2"> Present </span>`);

                $('#reasonDiv').hide();
                $('#lateDiv').hide();

            }

            if (status > 0) {
                $('#attendanceReasonDiv').show();

                if (status == 3 && remark == 'NULL') {
                    $('#attendanceReasonText').text(' ခွင့်မဲ့ ');
                }

                else if(remark  != 'NULL'){
                    $('#attendanceReasonText').text(remark);
                }
                else{
                    $('#attendanceReasonText').text(' - ');
                }
            }

            $('#attendancestatausInput').change(function () {
                var status = $(this).val();
                if (status == 1) {
                    $('#reasonDiv').show();
                    $('#lateDiv').hide();

                }
                else if (status == 2) {
                    $('#reasonDiv').hide();
                    $('#lateDiv').show();
                }
                else if (status == 3) {
                    $('#reasonDiv').show();
                    $('#lateDiv').hide();
                }else{

                    $('#reasonDiv').hide();
                    $('#lateDiv').hide();
                }
            });

            console.log(id);
            $('.scheduleModal').modal('show');

            
        });
   
    </script>

@endsection
<style type="text/css">

</style>
