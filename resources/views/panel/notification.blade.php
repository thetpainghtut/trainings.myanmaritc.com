@extends('template')
@section('content')

	<!-- Header -->
    <header class="py-5 mb-5 header_img">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-white">
                    <h1 class="display-4 mt-5 mb-2"> Notification, </h1>
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

                    <div id="accordion" class="accordion border-bottom">
                        <div class="card mb-0">
                            <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
                                <a class="card-title">
                                    <i class="far fa-calendar-alt mr-3 icon"></i>
                                    September 25, 2020 | 

                                    <i class="far fa-clock ml-3 icon"></i>
                                    10 Hours ago
                                </a>
                            </div>
                            
                            <div id="collapseOne" class="card-body collapse show" data-parent="#accordion">
                                <a href="" class="notiTitle"> Secret Message </a>

                                <small class="d-block text-muted"> 
                                    <i class="fas fa-clipboard-check mr-2"></i> Survey 
                                </small>

                                <footer class="blockquote-footer mt-3 text-dark">By  <cite title="Source Title">Ya Thaw Myat Noe</cite></footer>

                            </div>
                            
                            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                <a class="card-title">
                                    <i class="far fa-calendar-alt mr-3 icon"></i>
                                    September 24, 2020 | 

                                    <i class="far fa-clock ml-3 icon"></i>
                                    1 Day ago
                                </a>
                            </div>
                            <div id="collapseTwo" class="card-body collapse" data-parent="#accordion">
                                <a href="" class="notiTitle"> Vue </a>

                                <small class="d-block text-muted"> 
                                    <i class="fas fa-video mr-2"></i> Live Recording 
                                </small>

                                <footer class="blockquote-footer mt-3 text-dark">By  <cite title="Source Title"> Thet Paing Htut </cite></footer>

                            </div>

                            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                <a class="card-title">
                                    <i class="far fa-calendar-alt mr-3 icon"></i>
                                    September 22, 2020 | 

                                    <i class="far fa-clock ml-3 icon"></i>
                                    2 Days ago
                                </a>
                            </div>
                            <div id="collapseThree" class="card-body collapse" data-parent="#accordion">
                                
                                <a href="" class="notiTitle"> VUECLI repo </a>

                                <small class="d-block text-muted"> 
                                    <i class="far fa-check-square mr-2"></i> Assignment 
                                </small>

                                <footer class="blockquote-footer mt-3 text-dark">By  <cite title="Source Title"> Thet Paing Htut </cite></footer>
                            </div>

                            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <a class="card-title">
                                    <i class="far fa-calendar-alt mr-3 icon"></i>
                                    September 11, 2020 | 

                                    <i class="far fa-clock ml-3 icon"></i>
                                    11:45 PM
                                </a>
                            </div>
                            <div id="collapseFour" class="card-body collapse" data-parent="#accordion">
                                
                                <a href="" class="notiTitle"> Project Flow Date & Time </a>

                                <small class="d-block text-muted"> 
                                    <i class="fas fa-bullhorn mr-2"></i> Announcement 
                                </small>

                                <footer class="blockquote-footer mt-3 text-dark">By  <cite title="Source Title">Ya Thaw Myat Noe</cite></footer>

                            </div>

                            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                                <a class="card-title">
                                    <i class="far fa-calendar-alt mr-3 icon"></i>
                                    September 10, 2020 | 

                                    <i class="far fa-clock ml-3 icon"></i>
                                    1:45 PM
                                </a>
                            </div>
                            <div id="collapseFive" class="card-body collapse" data-parent="#accordion">

                                <a href="" class="notiTitle"> Laravel Project Doc Ref </a>

                                <small class="d-block text-muted"> 
                                    <i class="fas fa-envelope mr-2"></i> Post 
                                </small>

                                <footer class="blockquote-footer mt-3 text-dark">By  <cite title="Source Title">Ya Thaw Myat Noe</cite></footer>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){

        });

    </script>
@endsection