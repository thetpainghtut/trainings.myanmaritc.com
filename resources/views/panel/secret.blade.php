@extends('template')
@section('content')

	<!-- Header -->
    <header class="py-5 mb-5 header_img">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-white">
                    <h1 class="display-4 mt-5 mb-2"> Change Password </h1>
                </div>
            </div>
        </div>
    </header>
    <!-- Header -->

    <!-- Page Content -->
    <div id="page-content">
        <div class="container my-5">
            <div class="row justify-content-around">
                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-3 order-sm-3 order-3">
                        
                    @if(session('msg'))
                        <h6 class="text-success">{{session('msg')}}</h6>
                    @else
                        <h6 class="text-danger">{{session('error')}}</h6>
                    @endif


                </div>
            </div>
            <div class="row justify-content-center">

                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-3 order-sm-3 order-3">
                    <form action="{{route('frontend.secret_password_change')}}" method="post">
                        @csrf
                        <fieldset>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="chpassword"> Change Password </label>
                                        <input class="form-control py-4 {{$errors->has('changepassword') ? 'is-invalid' : ''}}" id="chpassword" type="password" name="changepassword" value="{{old('changepassword')}}" />


                                        @if($errors->has('changepassword'))
                                            <span class="text-danger">{{$errors->first('changepassword')}}</span>
                                        @endif
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="cfpassword"> Confirm Password </label>
                                        <input class="form-control py-4 {{$errors->has('changepassword_confirmation') ? 'is-invalid' : ''}}" id="cfpassword" type="password" name="changepassword_confirmation" value="{{old('changepassword_confirmation')}}"/>

                                        @if($errors->has('changepassword_confirmation'))
                                            <span class="text-danger">{{$errors->first('changepassword_confirmation')}}</span>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <label class="small mb-1" for="crpassword"> Current Password </label>
                                <input class="form-control py-4 {{$errors->has('currentpassword') ? 'is-invalid' : ''}}" id="crpassword" type="password" name="currentpassword" value="{{old('currentpassword')}}"/>

                                <small> (we need your current password to confirm your changes) </small>

                                @if($errors->has('currentpassword'))
                                    <span class="text-danger">{{$errors->first('currentpassword')}}</span>
                                @endif
                            </div>

                            <div class="form-group hideForm d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button type="submit" class="btn btn-outline-primary"> Save </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){

        });

    </script>
@endsection