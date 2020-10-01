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
                            <li class="breadcrumb-item"><a href="{{ route('frontend.takelesson', $batch->id) }}"> Take Lesson </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Play Course </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-12">
                    
                    <div id="accordion" class="accordion border-bottom">

                        @foreach($lessons as $key => $lesson)
                            <div class="card mb-0">
                                <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{ $lesson->id }}">
                                    <a class="card-title"> 
                                        <i class="far fa-check-circle mr-3"></i> {{ $lesson->title }}
                                    </a>
                                </div>
                                <div id="collapse_{{ $lesson->id }}" class="card-body collapse @if($key == 0) show @endif" data-parent="#accordion">
                                    <div class="video-player">
                                    <video class="js-player lesson_video_play vidoe-js" controls crossorigin preload="auto" playsinline data-poster="{{ asset($subject->logo) }}" data-id="{{ $lesson->id}}" data-duration="{{ $lesson->duration }}">
                                           

                                        
                                        <source src="{{ asset($lesson->file) }}" type="video/mp4" />

                                    </video>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection

@section('script')
<link rel="stylesheet" type="text/css" href="{{ asset('mmitui/vendor/plyr/demo.css') }}">
<script src="https://cdn.plyr.io/3.6.2/plyr.polyfilled.js"></script>
{{-- <script src="https://cdn.plyr.io/3.6.2/demo.js" crossorigin="anonymous"></script> --}}
{{-- <script src="{{ asset('mmitui/vendor/plyr/demo.js') }}"></script> --}}
{{-- <script src="https://cdn.plyr.io/3.6.2/plyr.js"></script> --}}

    <script type="text/javascript">
        $(document).ready(function(){
            window.player = player;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.lesson_video_play').on('play',function(){
               
                var lesson_id = $(this).data('id');
                var duration = $(this).data('duration');
                var current_time = this.currentTime;
                // alert(current_time);
                console.log(lesson_id,duration);
            })
            $('.lesson_video_play').on('pause',function(){
               
                var lesson_id = $(this).data('id');
                var duration = $(this).data('duration');
                var current_time = this.currentTime;
                var pause_time = current_time.toFixed(2)
                if(duration == pause_time){

                    $.post('/lesson_student',{lesson_id:lesson_id},function(res){

                        console.log(res);
                    })
                }
            });
            var player = Plyr.setup('.js-player',{

                invertTime: false,
                i18n: {
                    rewind: 'Rewind 5s',
                    fastForward: 'Forward 5s',
                    seek: "Seek",
                    start: "Start",
                    end: "End",
                    seekTime : 10
                },
                controls: [
                    'play-large', // The large play button in the center
                    'restart', // Restart playback
                    'rewind', // Rewind by the seek time (default 10 seconds)
                    'play', // Play/pause playback
                    'fast-forward', // Fast forward by the seek time (default 10 seconds)
                    'progress', // The progress bar and scrubber for playback and buffering
                    'current-time', // The current time of playback
                    'mute', // Toggle mute
                    'volume', // Volume control
                    'captions', // Toggle captions
                    'settings', // Settings menu
                    'fullscreen', // Toggle fullscreen
                    'airplay'
                ],
                events: ["ended", "progress", "stalled", "playing", "waiting", "canplay", "canplaythrough", "loadstart", "loadeddata", "loadedmetadata", "timeupdate", "volumechange", "play", "pause", "error", "seeking", "seeked", "emptied", "ratechange", "cuechange", "download", "enterfullscreen", "exitfullscreen", "captionsenabled", "captionsdisabled", "languagechange", "controlshidden", "controlsshown", "ready", "statechange", "qualitychange", "adsloaded", "adscontentpause", "adscontentresume", "adstarted", "adsmidpoint", "adscomplete", "adsallcomplete", "adsimpression", "adsclick"],
                
                clickToPlay: true,
            });
            // players.currentTime = 10;
            document.querySelector('.plyr').addEventListener('seeking', () => {

                console.log('seeking');
                player.currentTime = 30;
                // console.log(currentTime);

                // console.log(player.airPlay);
                player.currentTime=10;
                console.log(player.currentTime);
            });
    </script>
@endsection