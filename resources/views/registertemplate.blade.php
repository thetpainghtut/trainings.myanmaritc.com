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

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" type="text/css" href="{{ asset('mmitui/icon/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('mmitui/icon/icofont/icofont.min.css') }}">
  

    <!-- Custom styles for this template-->
    <link href="{{ asset('sb_admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style type="text/css">
        #mailDiv{
            position: relative;
        }
        @media only screen and (max-width: 600px) {
            .iconInput {
                position: absolute;
                right: 30px;
                top: 72px;
            }
        }
        @media only screen and (min-width: 600px) {
            .iconInput {
                position: absolute;
                right: 30px;
                top: 72px;
            }
        }

        @media only screen and (min-width: 768px) {
            .iconInput {
                position: absolute;
                right: 30px;
                top: 50px;
            }
        } 

        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {
            .iconInput {
                position: absolute;
                right: 30px;
                top: 50px;
            }
        } 

        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {
            .iconInput {
                position: absolute;
                right: 30px;
                top: 50px;
            }
        }

    </style>

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
        $(document).ready(function(){
            $('#checkMail').hide();

            $('.loading').hide();
            $('.successed').hide();

            $('#failDiv').hide();
            $('#successDiv').hide();

        });
        $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });

        var sess_sta="{{$status_session}}";
        if (sess_sta){
            $('#inquireform').show();
            $("#termsandcondition").hide();

            $('#exampleCheck1').attr('checked','checked');

        }
        else{
            $('#inquireform').hide();
            $("#termsandcondition").show();

        }

        $('#exampleCheck1').click(function(){
            $('#inquireform').show();
            $("#termsandcondition").hide();
        });

        $("input[name=studenttype]:radio").click(function () {
            if($('input[name=studenttype]:checked').val() == "1") {
                $('#checkMail').show(1000);
            }
            else{
                $('#checkMail').hide(1000);
            }
        });

        // Mail Validate
        $('#old_email').keyup(function () {
            var old_email = $(this).val();
            console.log(old_email);
            $.ajax({
                type:'POST',
                url:'{{ route('oldstduent')}}',
                data:{
                    inputEmail:old_email
                },
                success: function(data){
                    console.log(data.user);
                    var existUser = data.user;
                    if (existUser) {
                        $('.loading').hide();
                        $('.successed').show();

                        $('#failDiv').hide();
                        $('#successDiv').show();
                    }
                    else{
                        $('.loading').show();
                        $('.successed').hide();

                        $('#failDiv').show();
                        $('#successDiv').hide();
                    }
                    // $('#exampleModal').modal('show');
                },
                error: function(request, status, error) {
                    console.log("error")
                }

            });
        });


  </script>

</body>

</html>
