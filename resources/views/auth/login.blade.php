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
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header justify-content-center pt-5">
                                <img src="{{ asset('logo.jpg') }}" class="img-fluid mx-auto d-block" style="width: 200px;">
                                <h3 class="font-weight-light my-4 text-center">Login</h3>
                                @if(session('msg'))
                                 <h5 class="my-4 text-center text-danger">{{session('msg')}}</h5>
                                @elseif(session('success'))
                                 <h5 class="my-4 text-center text-success">{{session('success')}}</h5>

                                @endif
                            </div>
                            <div class="card-body">
                                <form class="user" method="POST" action="{{ route('login') }}">
                                
                                @csrf
                                    <div class="form-group">
                                        <label class="small mb-1" for="email">Email</label>
                                        <input id="email" type="email" class="form-control py-4 {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" autofocus>

                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <label class="small mb-1" for="password">Password</label>
                                        <input id="password" type="password" class="form-control py-4 {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password">

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" name ="remember" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-block btn-outline-primary">Login</button>
                                    </div>
                                </form>

                                <a href="{{route('frontend.forgetpassword')}}">Forget password?</a>

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
