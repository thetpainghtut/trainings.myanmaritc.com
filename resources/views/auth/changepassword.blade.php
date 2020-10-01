<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>  Myanmar IT Consulting </title>

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('mmitui/image/favicon.jpg')}}" type="image/jpg" sizes="16x16">

  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('sb_admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-primary">

  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header justify-content-center pt-5">
                                <img src="{{ asset('logo.jpg') }}" class="img-fluid mx-auto d-block" style="width: 200px;">
                                <h3 class="font-weight-light my-4 text-center">Change Password</h3>
                                @if(session('msg'))
                                 <h5 class="my-4 text-center text-danger">{{session('msg')}}</h5>
                                @endif
                            </div>
                            <div class="card-body">
                                <form class="user" method="POST" action="{{ route('frontend.update_password') }}">
                                
                                @csrf
                                @php 
                                $email = $_GET['email'];
                                @endphp

                                    <div class="form-group">
                                        <label class="small mb-1" for="email"> Email </label>
                                        <input class="form-control py-4 {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{$email}}" id="email" type="email" name="email" />
                                        <small> (we need your email to confirm your changes) </small>


                                        @if($errors->has('email'))
                                            <span class="text-danger">{{$errors->first('email')}}</span>
                                        @endif
                                        
                                    </div>
                                    
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
                       

                                </form>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('sb_admin2/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('sb_admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


  <!-- Core plugin JavaScript-->
  <script src="{{ asset('sb_admin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('sb_admin2/js/sb-admin-2.min.js') }}"></script>


</body>

</html>

