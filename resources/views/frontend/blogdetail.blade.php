@extends('template')

@section('content')

	@php
        $id = $blog->id;
        $title = $blog->title;
        $content = $blog->content;
        $postuser = $blog->user->name;

        $file_string = $blog->file;
        $file_arr = explode('.', $file_string);
        $file_extension = $file_arr[1];
        $date = date('M d, Y',strtotime($blog->created_at));
        // dd($file_extension);

 
        // <!-- share facebook -->
        $b = strip_tags($content);
    @endphp
    @section('metatag')

    <meta property="og:url"           content="{{Request::url()}}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{$title}}" />
    <meta property="og:description"   content="{{$b}}" />
    <meta property="og:image"         content="{{ asset($file_string) }}" />

    @endsection
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0&appId=1489681584710655&autoLogAppEvents=1" nonce="ADoCMBhz"></script>
	<!-- Header -->
    <header class="py-5 mb-5 header_img">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-white">
                    <h1 class="h1 text-white mt-5 mb-2"> {{ $title }}  </h1>
                    <p> 
                        <span> By {{ $postuser }} </span> &nbsp; | &nbsp;
                        <span> {{ $date }} </span> &nbsp; | &nbsp;
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}&amp;src=sdkpreparse" target="_blank" class="btn btn-outline-light btn-sm" id="share_count" data-id="{{$blog->id}}"> Share On <i class="fab fa-facebook-square ml-1"></i> </a>
                         &nbsp;&nbsp;&nbsp;&nbsp;
                         @if($blog->count != 0)
                        <span id="count">{{$blog->count}} 
                            @if($blog->count ==1)
                            <em>share</em>
                            @else 
                            <em>shares</em> 
                            @endif
                        </span>
                        @else
                        <span id="count"></span>
                        @endif
                    </p> 

                </div>
            </div>
        </div>
    </header>

    <div class="container mb-5">
        <div class="row justify-content-center">

            <div class="col-9">
            	@if($file_extension == 'JPG' || $file_extension == 'jpg' || $file_extension == 'JPEG' || $file_extension == 'jpeg' || $file_extension == 'bmp' || $file_extension == 'png')

                	<img src="{{ asset($file_string) }}" class="img-fluid mx-auto d-block">
            	@else

            		<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="{{ asset($file_string) }}" allowfullscreen></iframe>
					</div>

            	@endif
                
                <p class="my-4 blogdetailText mmfont"> 
                    {!! $content !!}
                </p>

            </div>
            
            
        </div>
    </div>

@endsection
@section('script')
<script type="text/javascript">
    // share count
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#share_count').click(function(){
            var journal_id = $(this).data('id');
            $.post('/share_count',{journal_id:journal_id},function(res){
                var count_no = res.count;
                if(count_no == 1){
                var count = count_no + ' share';
                $('#count').text(count);
                }else{
                    var count = count_no + ' shares';
                    $('#count').text(count);
                }

            })
        })
    })
</script>
@endsection