@extends('template')

@section('content')
    <!-- Header -->
    <header class="py-5 mb-5 header_img">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h1 class="h1 text-white mt-5 mb-2"> Corporate Social Responsibility  </h1>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content -->
        <!-- Knowledge Sharing -->

        <div class="container mb-5">
            <div class="row">
                <div class="col-12">
                    <!-- <span class="activityTitle"> Knowledge Sharing </span> -->
                    <a href="{{ route('frontend.blogs') }}" class="float-right text-decoration-none text-muted"> See All &nbsp; >> </a>

                    <!-- <hr> -->
                </div>
            </div>
            <section class="cards">
                <div class="owl-wrapper">
                    <div class="loop owl-carousel owl-theme">
                        
                        @foreach ($sharings as $key => $sharing)

                        @php
                            $id = $sharing->id;
                            $title = $sharing->title;
                            $content = $sharing->content;
                            $postuser = $sharing->user->name;
                        @endphp

                        <article class="card">
                            <div class="card__content">
                                <a href="{{ route('frontend.blog_detail',$id) }}" class="text-decoration-none">
                                    <blockquote class="blockquote">
                                        <h3 class="articletitle text-white mb-4">
                                            {{ $title }}
                                        </h3>
                                        
                                        <footer class="blockquote-footer text-white">By <cite title="Source Title"> {{ $postuser }} </cite></footer>
                                    </blockquote>
                                </a>
                            </div>
                        </article>

                        @endforeach
                    </div>
                </div>
            </section>
        </div>

        <!-- Activity -->
        <section class="showcase">
            <div class="container-fluid p-0">

                @foreach ($activities as $key => $activity)

                @php
                    $id = $activity->id;
                    $title = $activity->title;
                    $content = $activity->content;
                    $file_string = $activity->file;
                    $file_arr = explode('.', $file_string);
                    $file_extension = $file_arr[1];
                    // dd($file_extension);
                @endphp

                <div class="row no-gutters">
                    @if($file_extension == 'JPG' || $file_extension == 'jpg' || $file_extension == 'JPEG' || $file_extension == 'jpeg' || $file_extension == 'bmp' || $file_extension == 'png')
                        <div class="col-lg-6 text-white showcase-img @if($key==1) {{'order-lg-2'}} @endif " style="background-image: url({{ asset($file_string)}});"></div>
                    @else
                        <div class="col-lg-6 text-white showcase-img @if($key==1) {{'order-lg-2'}} @endif embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ asset($file_string) }}" allowfullscreen></iframe>
                        </div>
                    @endif
                    <div class="col-lg-6 my-auto showcase-text p-5 @if($key==1) {{'order-lg-1'}} @endif">
                        <h2> {{ $title }} </h2>
                        <p class="lead mb-0 mmfont"> {!! $content !!} </p>
                    </div>
                </div>

                @endforeach

            </div>
        </section>
    <!-- ABOUT -->
@endsection