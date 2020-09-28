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

    <h1 class="h3 mb-4 text-gray-800"> Journals </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> {{ $title }}
                <a href="{{route('posts.index')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-backward mr-2"></i> Go Back </a>
            </h5>
            <p class="mt-3"> 
              <span> By {{ $postuser }} </span> &nbsp; | &nbsp;
              <span> {{ $date }} </span> &nbsp; | &nbsp;
              <a href="" class="btn btn-primary btn-sm"> Share On <i class="fab fa-facebook-square ml-1"></i> </a>
          </p> 
        </div>
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-9">
                @if($filetype == 'JPG' || $filetype == 'jpg' || $filetype == 'JPEG' || $filetype == 'jpeg' || $filetype == 'bmp' || $filetype == 'png')
                  @foreach($file_arr as $farr)
                    <img src="{{ asset($farr) }}" class="img-fluid mx-auto d-block">
                    @endforeach
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
