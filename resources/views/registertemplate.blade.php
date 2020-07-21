<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <title> Myanmar IT Consulting </title>

  <link rel="icon" href="{{ asset('mmitui/image/favicon.jpg') }}" type="image/jpg" sizes="16x16">


  <!-- Custom Font -->
  <link href="{{ asset('mmitui/css/font.css') }}" rel="stylesheet">

  <link href="{{ asset('mmitui/css/custom.css') }}" rel="stylesheet">
  

  <!-- Custom styles for this template-->
  <link href="{{ asset('sb_admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    @yield('content')

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('sb_admin2/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('sb_admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('sb_admin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('sb_admin2/js/sb-admin-2.min.js') }}"></script>

  <script type="text/javascript">

    $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      var sess_sta="{{$status_session}}";
      if (sess_sta) 
      {
        $('#inquireform').show();
        $("#termsandcondition").hide();

        $('#exampleCheck1').attr('checked','checked');

      }
      else
      {
        $('#inquireform').hide();
        $("#termsandcondition").show();

      }

      $('#exampleCheck1').click(function()
      {
        $('#inquireform').show();
        $("#termsandcondition").hide();

      })


  </script>

</body>

</html>
