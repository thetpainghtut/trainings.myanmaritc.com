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

                                <a href="{{ route('frontend.channel') }}" class="btn btn-light float-right">
                                    Go Channel
                                </a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Page Content -->

@endsection