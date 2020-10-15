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

                <div id="accordion" class="border-bottom">


                    <?php

                    $user  = Auth::user();
                    $student = $user->student;
                    $batch = $student->batches;

                    $cs = array();
                    $v = array();
                    $bs = array();
                    foreach($batch as $b){
                        foreach($b->posts as $pos){
                            if($pos->pivot->batch_id == $b->id){

                             foreach($pos->unreadNotifications as $notification)
                             {
                                
                                $bs = $notification->where('read_at','=',NULL)->orderBy('created_at','desc')->get();



                            }

                        }

                    }
                   // dd($bs);
                    foreach ($bs as $key => $value) {
                                   //dd($value->data);

                      if($value->data['batch_id'] == $b->id){
                       $topid=$value->data['topic_id'];
                       $title=$value->data['title'];
                       $userid=$value->data['user_id'];
                       $created_at=$value->created_at;

                       $pid = $value->data['id'];
                       ?>
                       <div class="card mb-0 border-primary">
                        <div class="card-header collapsed coll" data-poid="{{$pid}}" data-baid="{{$b->id}}" href="#collapse{{$pid}}" data-toggle="collapse" data-parent="#accordion">
                            <a class="card-title text-dark">
                               <i class="far fa-calendar-alt mr-3 icon"></i>
                               {{date('F d, Y', strtotime($created_at))}}
                               | 

                               <i class="far fa-clock ml-3 icon"></i>
                               {{$created_at->diffForHumans()}}

                           </a>
                       </div>
                       <div id="collapse{{$pid}}" class="card-body collapse" data-parent="#accordion">

                        <a href="{{route('notideail',['pid' => $pid, 'bid' => $b->id] ) }}" class="notiTitle"> {{$title}} </a>


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


            }else{
                break;
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
                        <div id="accordion1" class="border-bottom">
                            <?php
                            $rns = array();
                            $bns = array();
                            $cssa = array();
                            foreach($batch as $bb){
                                foreach($bb->posts as $bbpost){
                                    if($bbpost->pivot->batch_id == $bb->id){
                                        foreach($bbpost->readNotifications as $rnoti){
                                            array_push($bns, $rnoti);
                                           /* $rns = $rnoti->where('read_at','!=','NULL')->orderBy('read_at','desc')->limit(3)->get();*/
                                        }}}
                                        foreach ($bns as $c) {
                                            if($c->data['batch_id'] == $bb->id){
                                                
                                                $rns = $c->where('read_at','!=','NULL')->orderBy('read_at','desc')->get();
                                            }
                                        }

                                        $e = 1;
                                        foreach($rns as $rn){
                                            if($rn->data['batch_id'] == $bb->id){
                                            $rtopid=$rn->data['topic_id'];
                                            $rtitle=$rn->data['title'];
                                            $ruserid=$rn->data['user_id'];
                                            $rcreated_at=$rn->created_at;
                                            $rpid = $rn->data['id'];
                                            $rbatch = $rn->data['batch_id'];
                                            ?>
                                            <div class="card mb-0 border-dark bg-faded">
                                                <div class="card-header collapsed" data-toggle="collapse" href="#collapse{{$rpid}}" data-parent="#accordion1">
                                                    <a class="card-title text-muted">
                                                        <i class="far fa-calendar-alt mr-3 icon"></i>
                                                        {{date('F d, Y', strtotime($rcreated_at))}}
                                                        | 

                                                        <i class="far fa-clock ml-3 icon"></i>
                                                        {{$rcreated_at->diffForHumans()}}
                                                    </a>
                                                </div>
                                                <div id="collapse{{$rpid}}" class="card-body collapse" data-parent="#accordion1">

                                                    <a href="{{route('notideail',['pid' => $rpid, 'bid' => $rbatch] ) }}" class="notiTitle"> {{$rtitle}} </a>


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
                                            if ($e++ == 3) break;
}}

                                        }

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container -->

                    @endsection

