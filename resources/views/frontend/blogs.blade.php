@extends('template')

@section('content')

	<!-- Header -->
    <header class="py-5 mb-5 header_img">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h1 class="display-4 text-white mt-5 mb-2"> Knowledge Sharing  </h1>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
        	@foreach($blogs as $blog)

        		@php
			        $id = $blog->id;
			        $title = $blog->title;
			        $content = $blog->content;
			        $postuser = $blog->user->name;

			        $file_string = $blog->file;
			        $file_arr = explode('.', $file_string);
			        $file_extension = $file_arr[1];
			        $month = date('M',strtotime($blog->created_at));
			        $day = date('d',strtotime($blog->created_at));

			        $subjects = $blog->subjects;
			        $subject = $subjects[0]->name;
			    @endphp

	        	<div class="col-lg-4 col-md-4 col-sm-12 col-12 p-4">
	                <div class="border">
	                    <div class="position-relative w-100" style="height: 250px;background-image: url({{ asset($file_string) }}); background-size: cover; background-position: center;">
	                        <div class="position-absolute bg-dark" style="opacity: .3; top: 0; left:0; right: 0; bottom: 0;"></div>
	                        <div class="position-absolute text-white d-flex flex-column justify-content-center align-items-center rounded-circle" style="top:10px; right:10px; width: 70px; height: 70px; background-color: #007bff;">
	                            <small>{{ $day }}</small>
	                            <small><b>{{ $month }}</b></small>
	                        </div>
	                        <a href="#" class="position-absolute px-3 py-2 text-white" style="bottom:10px; left: 10px; background-color: #007bff;"><small>{{ $subject }}</small>
	                        </a>
	                    </div>
	                    
	                    <div class="px-3 pt-4 pb-3 h-100">
	                        <a href="{{ route('frontend.blog_detail',$id) }}" class="d-inline-block">
	                            <h4 class="text-dark" style="font-weight: 600; font-size: 1.1rem;">
	                            	{{ $title }}
	                            </h4>
	                        </a>
	                        <p class="text-muted font-weight-light mt-2">
	                        	{{-- {!! substr($content, 0, 30) . '...' !!} --}}
	                        </p>
	                        

	                        <div class="d-flex justify-content-between mt-4">
	                            <div class="d-flex align-items-center mr-4">
	                                <a href="{{ route('frontend.blog_detail',$id) }}" class="btn btn-outline-primary px-3 hvr-icon-wobble-horizontal btn-sm"> Read More <i class="fas fa-arrow-right ml-2 hvr-icon"></i> </a>
	                            </div>
	                            
	                            <div class="d-flex align-items-center float-right">   
	                                <small class="mt-1 text-muted"> <i class="icofont-ui-user mr-2"></i> <i> {{ $postuser }} </i> </small>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
            @endforeach

            <div class="col-12 my-4">
	            {!! $blogs->links() !!}
	        </div>


        </div>
    </div>

@endsection
