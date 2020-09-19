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
                <div class="col-lg-4 col-md-6 col-sm-12 my-3 ">
                    <div class="card ">
                        <img class="card-img-top course_img" src="image/photo_2.png" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"> PHP Web Developer Bootcamp </h4>
                            <p> Batch - 18 </p>
                            <div class="progress my-4">
                                <div class="progress-bar " role="progressbar" style="width: 25%; background-color: #004289" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>

                            <a href="takelesson.html" class="btn btn-primary ">
                                Take Lesson
                            </a>

                            <a href="channel.html" class="btn btn-light float-right">
                                Go Channel
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content -->

@endsection