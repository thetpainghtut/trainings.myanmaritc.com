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


                    <?php

                    $user  = Auth::user();
                    $student = $user->student;
                    $batch = $student->batches;
                    $cs = array();
                    foreach($batch as $b){
                        foreach($b->posts as $pos){
                            if($pos->pivot->batch_id == $b->id){
                               foreach($pos->unreadNotifications as $notification)
                               {

                                $topid=$notification->data['topic_id'];
                                $title=$notification->data['title'];
                                $userid=$notification->data['user_id'];
                                $created_at=$notification->created_at;
                                $pid = $notification->data['id'];
                                ?>
                                <div class="card mb-0 border-primary">
                                    <div class="card-header collapsed" data-poid="{{$pid}}" data-baid="{{$b->id}}">
                                        <a class="card-title text-dark">
                                            <i class="far fa-calendar-alt mr-3 icon"></i>
                                            {{date('F d, Y', strtotime($created_at))}}
                                            | 

                                            <i class="far fa-clock ml-3 icon"></i>
                                            {{$created_at->diffForHumans()}}
                                        </a>
                                    </div>
                                    <div id="collapse{{$pid}}" class="card-body collapse" data-parent="#accordion">

                                        <a href="{{route('frontend.channel',$b->id)}}" class="notiTitle"> {{$title}} </a>


                                        <small class="d-block text-muted"> 
                                            @php $tpname = App\Topic::find($topid); @endphp
                                            @if($tpname->name == 'Announcement')
                                            <i class="fas fa-bullhorn mr-2"></i>
                                            @elseif($tpname->name == 'Schedule')
                                            <i class="icofont-calendar mr-2"></i>  
                                            @elseif($tpname->name == 'Assignment')
                                            <i class="far fa-check-square mr-2"></i>
                                            @elseif($tpname->name == 'Live Recording') 
                                            <i class="fas fa-video mr-2"></i> 
                                            @elseif($tpname->name == 'Assignment') 
                                            <i class="far fa-check-square mr-2"></i>
                                            @elseif($tpname->name == 'Post') 
                                            <i class="fas fa-envelope mr-2"></i> 
                                            @else
                                            <i class="icofont-question-circle mr-2"></i>
                                            @endif
                                            {{$tpname->name}} 
                                        </small>
                                        @php $us = App\User::find($userid); @endphp
                                        <footer class="blockquote-footer mt-3 text-dark">By  <cite title="Source Title">{{$us->name}}</cite></footer>

                                    </div>
                                </div>
                                <?php
                            }

                        }
                    }
                }


                ?>


                            <!-- <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
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
                            </div> -->
                            

                        </div>

                    </div>
                </div>
                <?php
                    $x = 0;
                    $user  = Auth::user();
                    $student = $user->student;
                    $batch = $student->batches;
                   ?>
                <div class="row">
                    <div class="col-12">
                        <div id="accordion1" class="accordion border-bottom">
                            <?php
                            $rns = array();
                            foreach($batch as $bb){
                                foreach($bb->posts as $bbpost){
                                    if($bbpost->pivot->batch_id == $bb->id){
                                        foreach($bbpost->readNotifications as $rnoti){
                                            $rns = $rnoti->where('read_at','!=','NULL')->orderBy('read_at','desc')->limit(3)->get();
                                        }}}}
                    foreach($rns as $rn){
                        $rtopid=$rn->data['topic_id'];
                    $rtitle=$rn->data['title'];
                    $ruserid=$rn->data['user_id'];
                    $rcreated_at=$rn->created_at;
                    $rpid = $rn->data['id'];
                    $rbatch = $rn->data['batch_id'];
                    ?>
                     <div class="card mb-0 border-dark bg-faded">
                    <div class="card-header collapsed" data-toggle="collapse" href="#collapse{{$rpid}}">
                        <a class="card-title text-muted">
                            <i class="far fa-calendar-alt mr-3 icon"></i>
                            {{date('F d, Y', strtotime($rcreated_at))}}
                             | 

                            <i class="far fa-clock ml-3 icon"></i>
                            {{$rcreated_at->diffForHumans()}}
                        </a>
                    </div>
                    <div id="collapse{{$rpid}}" class="card-body collapse  @if ($x === 0) show @endif" data-parent="#accordion1">
                        
                        <a href="{{route('frontend.channel',$rbatch)}}" class="notiTitle"> {{$rtitle}} </a>
                      

                        <small class="d-block text-muted"> 
                            @php $rtpname = App\Topic::find($rtopid); @endphp
                            @if($rtpname->name == 'Announcement')
                                <i class="fas fa-bullhorn mr-2"></i>
                                @elseif($rtpname->name == 'Schedule')
                                <i class="icofont-calendar mr-2"></i>  
                                @elseif($rtpname->name == 'Assignment')
                                <i class="far fa-check-square mr-2"></i>
                                @elseif($rtpname->name == 'Live Recording') 
                                <i class="fas fa-video mr-2"></i> 
                                @elseif($rtpname->name == 'Assignment') 
                                <i class="far fa-check-square mr-2"></i>
                                @elseif($rtpname->name == 'Post') 
                                <i class="fas fa-envelope mr-2"></i> 
                                @else
                                  <i class="icofont-question-circle mr-2"></i>
                                @endif
                                {{$rtpname->name}} 
                        </small>
                        @php $rus = App\User::find($ruserid); @endphp
                        <footer class="blockquote-footer mt-3 text-dark">By  <cite title="Source Title">{{$rus->name}}</cite></footer>

                    </div>
                     </div>
                      <?php $x++;?>
                     <?php


                    }
                
                            ?>
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
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('.collapsed').click(function(){
                    var poid = $(this).data('poid');
                    var baid = $(this).data('baid');
                    $.post('notiread',{poid:poid,baid:baid},function(response){
                        console.log(response);
                        if(response == 'Successful'){
                            $('#collapse'+poid).collapse('show');
                            showNoti();
                        }
                    })
                })
            });

        </script>
        @endsection