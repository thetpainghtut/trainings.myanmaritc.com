@extends('template')
@section('content')

	<!-- Header -->
    <header class="py-5 mb-5 header_img">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-white">
                    <h1 class="display-4  mt-5 mb-2"> {{ $course->name }}, </h1>
                    <p> {{ $batch->title }} </p>
                </div>
            </div>
        </div>
    </header>
    <!-- Header -->

    <!-- Page Content -->
    <div id="page-content">
        <div class="container my-5">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('frontend.panel') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Take Lesson </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row justify-content-center">

                @foreach($subjects as $subject)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card my-3">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold"> {{ $subject->name }} </h5>

                            @php
                                $total = 0;
                                $countlesson = 0;
                            @endphp
                            <!-- honey -->
                            @foreach($staffs as $staff)
                            

                            @foreach($subject->lessons as $lesson)

                            @if($staff->user_id == $lesson->user_id)
                            @php
                            $stu_less =1;
                            $countlesson  += $stu_less;
                           
                            @endphp
                            @endif
                            @endforeach

                            @endforeach
                            <!-- honey  course and teacher-->
                           
                            @foreach($subject->lessons as $lesson)
                                @php
                                    $duration = $lesson->duration;

                                    $total += $duration++;
                                @endphp
                            @endforeach

                            @php
                                if ($total) {
                                
                                $dt = Carbon\Carbon::now();
                                $days = $dt->diffInDays($dt->copy()->addSeconds($total));
                                $hours = $dt->diffInHours($dt->copy()->addSeconds($total)->subDays($days));
                                $minutes = $dt->diffInMinutes($dt->copy()->addSeconds($total)->subDays($days)->subHours($hours));

                                $totaltimes = Carbon\CarbonInterval::days($days)->hours($hours)->minutes($minutes)->forHumans();
                                }
                                else{
                                    $totaltimes = '0 Second';
                                }
                            @endphp

                            <p class="card-text"> {{ $countlesson }} Lectures  •  {{ $totaltimes }} </p>

                            <!-- seen lesson count -->
                            @php
                                $student = Auth::user()->student;
                                $stu_less_count = 0;
                                $subject_batch_id =0;
                                $play_course_btn =0;
                                $today_date = Carbon\Carbon::now();
                            @endphp
                            @foreach($student->lessons as $lesson)
                                @php
                                    $subject_pid = $lesson->subject_id;

                                    $lesson_subject = $lesson->subject;
                                    $status = $lesson->pivot->status;
                                   
                                @endphp

                                  <!-- get subject batch -->
                                    @foreach($lesson_subject->batches as $subject_batch)
                                        
                                        @if($batch->id == $subject_batch->pivot->batch_id)
                                        @php
                                            $subject_batch_id = $subject_batch->pivot->batch_id;
                                            break;
                                        @endphp
                                        @endif
                                    @endforeach
                                    <!-- get subject batch -->

                                <!-- old student seen lesson count -->
                                {{--@if($subject->id == $subject_pid && $batch->id == $subject_batch_id && $status == 0)
                                    @php
                                       $stu_less =1;
                                       $stu_less_count += $stu_less;
                                       
                                    @endphp                                   
                                @endif--}}
                                <!-- old student seen lesson count -->

                                <!-- new student seen lesson count -->
                                @if($subject->id == $subject_pid && $batch->id == $subject_batch_id && $status == 1 && $batch->enddate <= $today_date)
                      
                                    @php
                                        $stu_less =1;                                       
                                       $stu_less_count += $stu_less;
                                       
                                    @endphp  

                                @endif
                                @if($subject->id == $subject_pid && $batch->id == $subject_batch_id && $status == 0 && $batch->enddate >= $today_date)
                              
                                    @php
                                        $stu_less =1;                                       
                                       $stu_less_count += $stu_less;
                                       
                                    @endphp  
                                                           
                                @endif
                                <!-- new student seen lesson count -->

                            @endforeach
                            <!-- seen lesson count -->
                           
                            @foreach($subject->batches as $sub_batch)
                               
                                @php
                                    $subject_pid = $sub_batch->pivot->subject_id;

                                    $batch_pid = $sub_batch->pivot->batch_id;
                                @endphp
                                <!-- new show hide -->
                                @if($subject->id == $subject_pid && $batch->id == $batch_pid)
                                    
                                    @php
                                    $play_course_btn = 1;
                                    break;
                                    @endphp
                                @endif
                                <!-- new show hide -->

                               
                               <!-- button show hide -->

                            @endforeach

                            <!-- new show hide -->
                            @if($play_course_btn == 1)
                                @if($countlesson == $stu_less_count)
                                    <a href="{{ route('frontend.playcourse',  ['bid' => $batch->id, 'sid' => $subject->id] ) }}" class="btn btn-primary hvr-icon-pulse-grow">
                                        Play Course <i class="far fa-play-circle ml-2 hvr-icon"></i>
                                    </a>
                                   
                                    @else
                                     <a href="{{ route('frontend.playcourse',  ['bid' => $batch->id, 'sid' => $subject->id] ) }}" class="btn btn-outline-primary hvr-icon-pulse-grow">
                                        Play Course <i class="far fa-play-circle ml-2 hvr-icon"></i>
                                    </a>
                                @endif
                            @else
                            <button class="btn btn-outline-primary hvr-icon-pulse-grow disabled">Play Course <i class="far fa-play-circle ml-2 hvr-icon"></i></button>
                            @endif
                           
                            
                             <p class="float-right"> {{ $stu_less_count }} / {{ $countlesson }} </p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            
        });
    </script>
@endsection
