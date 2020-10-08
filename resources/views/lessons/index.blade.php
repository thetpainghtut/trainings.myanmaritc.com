@extends('backendtemplate')

@section('content')

    <div class="row">
        <div class="col-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">All Lessons</li>
                </ol>
            </nav>
        </div>
        <div class="col-2">
            <a href="{{route('lessons.create')}}" class="btn btn-outline-primary float-right btn-sm">
                <i class="fas fa-plus mr-2"></i>
                Add New
            </a>
        </div>
    </div>  
        @php
        $user = Auth::user();
        $staff = $user->staff;
        $teacher = $staff->teacher;
        @endphp
        
        @foreach($courses as $course)
            @foreach($teacher as $teacher_course)
            <!-- Teacher course -->
            @if($course->id == $teacher_course->course_id)
            
            <div class="my-5">
                <div class="row">
                    <div class="col-12">
                        <h1 class="h3 mb-4 text-gray-800">
                            {{ $course->name }}
                        </h1>
                        <hr>
                    </div>
                </div>
                
                <div class="row">
                    @foreach($course->subjects as $subject)

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $subject->name }}
                                            </div>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> 

                                                @php
                                                    $lectures = $subject->lessons->count();
                                                    $total = 0;
                                                @endphp

                                                @foreach($subject->lessons as $lesson)

                                                    @php
                                                        $duration = $lesson->duration;

                                                        $total += $duration++;
                                                        // var_dump($total);


                                                    @endphp

                                                @endforeach


                                                    
                                                    {{ $lectures }} Lectures • 
                                                    {{ gmdate("H:i:s", $total )}} mins 

                                            </div>

                                        </div>
                                        <div class="col-auto">
                                            <img src="{{ asset($subject->logo) }}" class="img-fluid" style="width: 50px;height: 50px;">
                                        </div>
                                    
                                        <div class="col-12">
                                            <a href="{{route('view_lesson',['sid' => $subject->id, 'cid' => $course->id])}}" class="btn btn-outline-secondary m-2 btn-sm">
                                                View Lesson 
                                                <span class="pl-2 fas fa-arrow-right"></span>
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
            @endif
            @endforeach
        @endforeach
@endsection