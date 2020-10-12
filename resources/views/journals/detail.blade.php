@extends('backendtemplate')

@section('content')
	@php
        $id = $journal->id;
        $title = $journal->title;
        $content = $journal->content;
        $postuser = $journal->user->name;

        $file_string = $journal->file;
        $file_arr = explode('.', $file_string);
        $file_extension = $file_arr[1];
        $date = date('M d, Y',strtotime($journal->created_at));
        // dd($file_extension);
      
      
    @endphp

    <h1 class="h3 mb-4 text-gray-800"> Journals </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> {{ $title }}
                <a href="{{route('journals.index')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-backward mr-2"></i> Go Back </a>
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
    </div>

@endsection
