@extends('backendtemplate')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('mmitui/vendor/plyr/demo.css') }}">
<script src="https://cdn.plyr.io/3.6.2/plyr.polyfilled.js"></script>

    <div class="row">
        <div class="col-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('lessons.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('view_lesson',['sid' => $subject->id, 'cid' => $course_id])}}"> {{ $subject->name }} </a></li>

                    <li class="breadcrumb-item active" aria-current="page"> {{ $lesson->title }} </li>
                </ol>
            </nav>
        </div>
        <div class="col-2">
            <a href="{{route('lessons.index')}}" class="btn btn-outline-primary float-right btn-sm">
                <i class="fas fa-backward mr-2"></i>
                Go Back
            </a>
        </div>
    </div> 
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> {{ $lesson->title }}
            </h5>
            <h6> {{ gmdate("H:i:s", $lesson->duration )}} mins </h6>
        </div>
        <div class="card-body">
            <div class="video-player">
                <video class="js-player lesson_video_play vidoe-js" controls crossorigin preload="auto" playsinline data-poster="{{ asset($lesson->subject->logo) }}" data-id="{{ $lesson->id}}" data-duration="{{ $lesson->duration }}">
                       
                    <source src="{{ asset($lesson->file) }}" type="video/mp4" />

                </video>
            </div>

        </div>
    </div>


@endsection
@section('script')
<script type="text/javascript">
        $(document).ready(function(){
            window.player = player;

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
        });

    </script>
@endsection
