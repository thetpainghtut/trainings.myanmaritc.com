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
                                $lectures = $subject->lessons->count();
                                $total = 0;
                            @endphp

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

                            <p class="card-text"> {{ $lectures }} Lectures  •  {{ $totaltimes }} </p>

                            <a href="{{ route('frontend.playcourse',  ['bid' => $batch->id, 'sid' => $subject->id] ) }}" class="btn btn-primary hvr-icon-pulse-grow"> 
                                Play Course <i class="far fa-play-circle ml-2 hvr-icon"></i>
                            </a>
                            <p class="float-right"> 8 / 8 </p>
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
