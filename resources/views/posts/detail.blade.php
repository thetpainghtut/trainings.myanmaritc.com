@extends('backendtemplate')

@section('content')
  @php
    $id = $post->id;
    $title = $post->title;
    $content = $post->content;
    $postuser = $post->user->name;

    $file_string = $post->file;

    $file_arr = explode(',', $file_string);
    $filetype = pathinfo($file_string, PATHINFO_EXTENSION);
    
   
    $date = date('M d, Y',strtotime($post->created_at));
  @endphp

    <h1 class="h3 mb-4 text-gray-800"> Posts </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> {{ $title }}
                <a href="{{route('posts.index')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-backward mr-2"></i> Go Back </a>
            </h5>
            <p class="mt-3"> 
              <span> By {{ $postuser }} </span> &nbsp; | &nbsp;
              <span> {{ $date }} </span> &nbsp; | &nbsp;
          </p> 
        </div>
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-9">
                @if($filetype == 'JPG' || $filetype == 'jpg' || $filetype == 'JPEG' || $filetype == 'jpeg' || $filetype == 'bmp' || $filetype == 'png')
                  @foreach($file_arr as $farr)
                    <img src="{{ asset($farr) }}" class="img-fluid mx-auto d-block">
                    @endforeach
                @elseif($filetype == "x-flv" || $filetype == "mp4" || $filetype == "x-mpegURL" || $filetype == "MP2T" || $filetype == "3gpp" || $filetype == "quicktime" || $filetype == "x-msvideo" || $filetype == "x-ms-wmv" || $filetype == "mov" || $filetype == 'ogg')
                  <video class="js-player lesson_video_play vidoe-js" controls crossorigin preload="auto" playsinline >
                       
                    <source src="{{ asset($post->file) }}" type="video/mp4" />

                </video>
                @else

                  <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="{{ asset($file_extension) }}" allowfullscreen></iframe>
            </div>

                @endif
                  
                  <p class="my-4 blogdetailText mmfont"> 
                      {!! $content !!}
                  </p>

              </div>
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