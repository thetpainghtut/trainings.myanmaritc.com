@extends('template')

@section('content')

<div class="container my-5">
	<div class="form-group form-check row">
		<input type="checkbox" class="form-check-input" id="exampleCheck1">
		<label class="scriptscriptform-check-label" for="exampleCheck1">Agree </label>
	</div>
	<div class="form-group inquire row">
		<form class="form-inline my-2 my-lg-0" action="{{route('frontend.student.register')}}" method="get">
			<input class="form-control mr-sm-1" type="number" name="inquire_no" placeholder="Inquire no" id="inquire_no">
			<button class="btn btn-outline-primary my-2 my-sm-0" type="submit" id="search_inquire"><i class="fas fa-search"></i></button>
		</form>
	</div>
	<div class="form-group row">
		@php
		$status_session=session('status');
		@endphp
		@if(session('status'))

          <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>{{ session('status') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function () {
		$.ajaxSetup({
	        headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    var sess_sta="{{$status_session}}";
	    if (sess_sta) {
		$('.inquire').show();
		$('#exampleCheck1').attr('checked','checked');

	    }else{
		$('.inquire').hide();

	    }

		$('#exampleCheck1').click(function(){
			$('.inquire').show();
		})
	})
</script>

@endsection