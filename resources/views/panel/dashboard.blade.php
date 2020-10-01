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
<<<<<<< HEAD
                    <div class="col-lg-4 col-md-6 col-sm-12 my-3 ">
                        <div class="card ">
                            <img class="card-img-top course_img" src="{{ asset($studentbatch->course->logo) }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"> {{ $studentbatch->course->name }} </h5>
                                <p> {{ $studentbatch->title }}</p>
                                <div class="progress my-4">
                                    <div class="progress-bar " role="progressbar" style="width: 25%; background-color: #004289" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>

                                <a href="{{ route('frontend.takelesson',$studentbatch->id) }}" class="btn btn-primary ">
                                    Take Lesson
                                </a>

                                <a href="channel.html" class="btn btn-light float-right">
                                    Go Channel
                                </a>

                            </div>
                        </div>
                    </div>
=======
                    @php
                        $course = $studentbatch->course;
                       
                        $subjects = $course->subjects->count();
                        $lesson_total = 0;

                        $seen_less_total = 0;
                    @endphp

                    @foreach($course->subjects as $subject)
                        @php
                            $subject_id = $subject->id;
                        @endphp
                    @endforeach
                   

                    <!-- Student lesson count -->
                    @foreach($studentinfo->lessons as $lesson)
                        @php
                            $subject = $lesson->subject;
                            $subject_batch_id=0;
                        @endphp
                        @foreach($subject->batches as $subject_batch)
                            @php
                            $subject_batch_id = $subject_batch->pivot->batch_id;
                            @endphp
                           
                        @endforeach
                        @if($studentbatch->id == $subject_batch_id)
                      
                            @php
                               
                               $seen_less_total = $studentinfo->lessons->count();
                               
                            @endphp                                   
                        @endif
                        
                    @endforeach
                    
                    <!-- End of Student lesson count -->


                   
                   
                     @foreach($course->subjects as $subject) 
                        @php
                            $lesson_count = $subject->lessons->count();
                            $lesson_total += $lesson_count;
                        @endphp

                    @endforeach
                     @php
                        $percentage_decimal = (($seen_less_total/$lesson_total)*100);
                        $percentage = round($percentage_decimal);
                    @endphp

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
>>>>>>> 1b1e106a77ff3874d04bdc42f006b7c5c86ca7f7
                @endforeach
            </div>
        </div>
    </div>
    <!-- Page Content -->

@endsection