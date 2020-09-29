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
                                <h3 class="font-weight-light my-4 text-center">Reset Password</h3>
                                @if(session('msg'))
                                 <h5 class="my-4 text-center text-danger">{{session('msg')}}</h5>
                                @elseif(session('success'))
                                 <h5 class="my-4 text-center text-success">{{session('success')}}</h5>

                                @endif
                            </div>
                            <div class="card-body">
                              <div class="code_no">
                                <input type="hidden" name="oldcodeno" class="oldcodeno" value="{{$codeno}}">

                                <div class="form-group user">
                                    <label class="small mb-1" for="codeno">Codeno</label>
                                    <input id="codeno" type="text" class="form-control py-4 newcodeno" name="codeno"  placeholder="Code No" autofocus>      
                                    <span class="error_msg text-danger" >
                                      
                                    </span>                            
                                </div>

                                

                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button class="btn btn-block btn-outline-primary codeno_save">Save</button>
                                </div>
                              </div>

                                <form class="user show_update_password" method="POST" action="{{ route('frontend.resetupdatepassword') }}">
                                @csrf 
                                <input type="hidden" name="email" value="{{$email}}">
                                    
                                    <div class="form-group">
                                        <label class="small mb-1" for="password">Reset Password</label>
                                        <input id="password" type="password" class="form-control py-4 {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Reset Password">

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-block btn-outline-primary">Save change</button>
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

  {{-- codeno confirm --}}
  <script type="text/javascript">
    $(document).ready(function() {
      $('.show_update_password').hide();
      $('.code_no').show();

       $('.codeno_save').click(function() {
          var oldcodeno=$('.oldcodeno').val();
          var newcodeno=$('.newcodeno').val();
          console.log(oldcodeno,newcodeno);
          var html='';

          if(oldcodeno === newcodeno){
            $('.show_update_password').show();
            $('.code_no').hide(1000);
          }else{
            html += "Invalid number.Try again!";
            $('.error_msg').html(html);
          }

       }) 
    })
  </script>

</body>

</html>
