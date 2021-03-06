@extends('template')
@section('content')

	<!-- Header -->
    <header class="py-5 mb-5 header_img">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h1 class="display-4 text-white mt-5 mb-2"> My Dashboard, </h1>
                </div>
            </div>
        </div>
    </header>
    <!-- Header -->
	
	<!-- Page Content -->
    <div id="page-content">
        <div class="container my-5">
            <div class="row">
                @foreach($studentbatches as $studentbatch)
                    @php
                        $course = $studentbatch->course;
                       
                        $subjects = $course->subjects->count();
                        $lesson_total = 0;

                        $seen_less_total = 0;
                        $percentage = 0;
                        $today_date = Carbon\Carbon::now();
                        $subject_lessons = array();
                    @endphp

                    @foreach($course->subjects as $subject)
                        @foreach($subject->lessons as $lesson)
                        @php
                           array_push($subject_lessons,$lesson); 
                        @endphp
                        @endforeach
                    @endforeach

                    <!-- Student lesson count -->
                    @php
                        $subject_batch_id = 0;
                    @endphp

                    @foreach($studentinfo->lessons as $lesson)
                        @php
                            $subject = $lesson->subject;
                            $subject_batch_id=0;
                            $status = $lesson->pivot->status;
                        @endphp

                        @foreach($subject->batches as $subject_batch)
                            
                           @if($studentbatch->id == $subject_batch->pivot->batch_id)
                                @php
                                    $subject_batch_id = $subject_batch->pivot->batch_id;
                                    break;
                                @endphp
                            @endif
                        @endforeach
                        
                        @if($studentbatch->id == $subject_batch_id && $status == 1 && $studentbatch->enddate <= $today_date)
                      
                            @php
                                $stu_less =1;                                       
                               $seen_less_total += $stu_less;
                               
                            @endphp  

                        @endif
                        @if($studentbatch->id == $subject_batch_id && $status == 0 && $studentbatch->enddate >= $today_date)
                      
                            @php
                                $stu_less =1;                                       
                               $seen_less_total += $stu_less;
                               
                            @endphp  
                                                   
                        @endif
                        
                    @endforeach
                   
                    <!-- End of Student lesson count -->
                    <!-- batch teacher -->
                    @php
                    $batchteacher = $studentbatch->teachers;
                          $staffs = array();       
                    
                    
                    foreach($batchteacher as $batchteacher)
                    
                    {
                        array_push($staffs,$batchteacher->staff);
                    }
                    
                    @endphp
                    @foreach($staffs as $staff)
                            

                    @foreach($subject_lessons as $lesson)

                    @if($staff->user_id == $lesson->user_id)
                        @php
                        $stu_less =1;
                        $lesson_total  += $stu_less;
                       
                        @endphp
                    @endif
                    @endforeach

                    @endforeach
                   
                    @if($lesson_total > 0)
                        @php
                            $percentage_decimal = (($seen_less_total/$lesson_total)*100);
                            $percentage = round($percentage_decimal);
                        @endphp
                    @endif

                     @if($studentbatch->pivot->status == "Active")
                    
                        <div class="col-lg-4 col-md-6 col-sm-12 my-3 ">
                            <div class="card ">
                                <img class="card-img-top course_img" src="{{ asset($studentbatch->course->logo) }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"> {{ $studentbatch->course->name }} </h5>
                                    <p> {{ $studentbatch->title }}</p>
                                    <div class="progress my-4">
                                        <div class="progress-bar " role="progressbar" style="width: {{$percentage}}%; background-color: #004289" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">{{$percentage}}%</div>
                                    </div>

                                    <a href="{{ route('frontend.takelesson',$studentbatch->id) }}" class="btn btn-primary ">
                                        Take Lesson
                                    </a>

                                    <a href="{{ route('frontend.channel',$studentbatch->id) }}" class="btn btn-light float-right">
                                        Go Channel
                                    </a>

                                </div>
                            </div>
                        </div>
                    @endif                    
                @endforeach
            </div>
        </div>
    </div>
    <!-- Page Content -->

@endsection