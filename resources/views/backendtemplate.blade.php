<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>  Myanmar IT Consulting </title>

    <link rel="icon" href="{{ asset('mmitui/image/favicon.jpg')}}" type="image/jpg" sizes="16x16">


    <!-- Custom fonts for this template-->
    <link rel="stylesheet" type="text/css" href="{{ asset('mmitui/icon/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('mmitui/icon/icofont/icofont.min.css') }}">
  
    <!-- Custom Font -->
    <link href="{{ asset('mmitui/css/font.css')}}" rel="stylesheet">
    <link href="{{ asset('mmitui/css/custom.css')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sb_admin2/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Select 2 -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('sb_admin2/vendor/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('sb_admin2/vendor/select2_bootstrap4/dist/select2-bootstrap4.min.css') }}">

    <!-- Summer Note -->
    <link href="{{ asset('sb_admin2/vendor/summernote/summernote-bs4.min.css') }}" rel="stylesheet">

    <!-- datatable -->
    <link href="{{asset('sb_admin2/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    
    <!-- yearpicker -->
    <link rel="stylesheet" href="{{asset('yearpicker.css')}}">

  <!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - logo -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-text mx-3">
                    <img src="{{ asset('logo.jpg') }}" class="img-fluid">
                </div>
            </a>

            <!-- Divider -->
            {{-- <hr class="sidebar-divider my-0"> --}}

            <!-- Dashboard ( All Roles ) -->
            <li class="nav-item {{ Request::segment(1) === 'dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

          
            <!-- Divider -->
            @role('Admin|Business Development|Teacher|Mentor|Recruitment')
                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Students
                </div>
            @endrole


            @role('Teacher|Mentor|Intern Mentor')
                <li class="nav-item {{ Request::segment(1) === 'attendances' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('attendances.index')}}">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Attendances</span>
                    </a>
                </li>
            @endrole

            @role('Admin|Teacher|Mentor')

                <li class="nav-item {{ Request::segment(1) === 'groups' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('groups.index')}}">
                        <i class="fas fa-users"></i>
                        <span>Groups</span>
                    </a>
                </li>
            @endrole


            @role('Teacher|Mentor')
                <li class="nav-item {{ Request::segment(1) === 'creategroup' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('students.group.create')}}">
                        <i class="fas fa-users-cog"></i>
                        <span>Create Group</span>
                    </a>
                </li>
            @endrole
          
            @role('Admin|Business Development|Recruitment')

                <li class="nav-item {{ Request::segment(1) === 'absence' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('absence')}}">
                        <i class="fas fa-user-alt-slash"></i>
                        <span>Absence</span>
                    </a>
                </li>
            @endrole

            @role('Admin|Business Development')

                <li class="nav-item {{ Request::segment(1) === 'inquires' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('inquires.index')}}">
                        <i class="fas fa-user-tag"></i>
                        <span>Inquires</span>
                    </a>
                </li>
            @endrole
          
            @role('Admin|Teacher|Mentor|Business Development|Recruitment')
                <li class="nav-item {{ Request::segment(1) === 'students' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('students.index')}}">
                        <i class="fas fa-user-check"></i>
                        <span>Students</span>
                    </a>
                </li>
            @endrole

            @role('Admin|Teacher|Mentor')
                <li class="nav-item {{ Request::segment(1) === 'feedbacks' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('feedbacks.index')}}">
                        <i class="fas fa-comments"></i>
                        <span>Feedbacks</span>
                    </a>
                </li>
            @endrole

            <!-- Divider -->

            @role('Admin|Business Development')

                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Course
                </div>
            @endrole

            @role('Admin|Business Development')

                <li class="nav-item {{ Request::segment(1) === 'courses' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('courses.index')}}">
                        <i class="fab fa-discourse"></i>
                        <span>Courses</span>
                    </a>
                </li>
            @endrole
          

            @role("Admin|Business Development|Teacher")

                <li class="nav-item {{ Request::segment(1) === 'batches' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('batches.index')}}">
                        <i class="fas fa-swatchbook"></i>
                        <span>Batches</span>
                    </a>
                </li>
            @endrole



            @role('Teacher')

          
                <li class="nav-item {{ Request::segment(1) === 'subjects' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('subjects.index')}}">
                        <i class="far fa-file-alt"></i>
                        <span>Subjects</span>
                    </a>
                </li>

                <!-- Teachel role only -->
                @role('Teacher')
                <li class="nav-item {{ Request::segment(1) === 'lessons' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('lessons.index')}}">
                        <i class="icofont-video-alt"></i>
                        <span> Lesson </span>
                    </a>
                </li>
                @endrole
                <!-- Teachel role only -->
                <li class="nav-item {{ Request::segment(1) === 'units' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('units.index')}}">
                        <i class="fas fa-star"></i>
                        <span> Units</span>
                    </a>
                </li>

            @endrole

            <!-- Divider -->
            @role('Admin|Recruitment')
                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Profit
                </div>

                <li class="nav-item {{ Request::segment(1) === 'incomes' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('incomes.index')}}">
                        <i class="fas fa-dollar-sign"></i>
                        <span>Incomes</span>
                    </a>
                </li>

                <li class="nav-item {{ Request::segment(1) === 'expenses' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('expenses.index')}}">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span>Expenses</span>
                    </a>
                </li>
            @endrole

            <!-- Divider -->
            @role('Admin')
                <hr class="sidebar-divider">
              
                <div class="sidebar-heading">
                    Co-worker
                </div>

                <li class="nav-item {{ Request::segment(1) === 'staffs' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('staffs.index')}}">
                        <i class="fas fa-user-tie"></i>
                        <span>Staffs</span>
                    </a>
                </li> 
            @endrole  

            @role('Teacher|Mentor|Admin|Business Development')

                <hr class="sidebar-divider">
              
                <div class="sidebar-heading">
                    Channel
                </div>
            @endrole

            @role('Teacher')

                <li class="nav-item {{ Request::segment(1) === 'topics' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('topics.index')}}">
                        <i class="icofont-light-bulb"></i>
                        <span> Topic </span>
                    </a>
                </li>

            @endrole 

            @role('Teacher|Mentor')


                <li class="nav-item {{ Request::segment(1) === 'projecttypes' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('projecttypes.index')}}">
                        <i class="fas fa-clipboard-list"></i>
                        <span> Project Type </span>
                    </a>
                </li>

            @endrole

            @role('Teacher|Mentor')

                <li class="nav-item {{ Request::segment(1) === 'projects' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('projects.index')}}">
                        <i class="icofont-document-folder"></i>
                        <span> Project </span>
                    </a>
                </li>
            @endrole

            @role('Teacher')

                <li class="nav-item {{ Request::segment(1) === 'posts' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('posts.index')}}">
                        <i class="far fa-edit"></i>
                        <span> Channel Post </span>
                    </a>
                </li>
            @endrole
            @role('Admin|Teacher')

                <li class="nav-item {{ Request::segment(1) === 'journals' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('journals.index')}}">
                        <i class="icofont-blogger"></i>
                        <span> Blog </span>
                    </a>
                </li>
            @endrole


            @role('Teacher|Mentor')


                <li class="nav-item {{ Request::segment(1) === 'quizzes' ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('quizzes.index')}}">
                        <i class="icofont-question"></i>
                        <span> Quizz </span>
                    </a>
                </li>
            @endrole  

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        
                        @if (Auth::check()) 
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                @if(Auth::user()->staff)
                                    <img class="img-profile rounded-circle" src="{{Auth::user()->staff->photo}}">
                                @elseif(!Auth::user()->staff)
                                    <img class="img-profile rounded-circle" src="{{asset('img/avatar.jpg')}}">
                                @endif
                            </a>
                            
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                @if(Auth::user()->getRoleNames()[0]=="Admin")
                                    <a href="#" class="dropdown-item" data-target="#changepassword" data-toggle="modal"><i class="fas fa-code fa-sm fa-fw mr-2 text-gray-400"></i>Change Password</a>

                                @else
                                    <a class="dropdown-item" href="{{route('staffs.show',Auth::user()->id)}}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                @endif
                            
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                        @endif
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>



  <!-- admin change password modal -->

    <div class="modal" tabindex="-1" role="dialog" id="changepassword">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                @if(Auth::check())
                    <form action="{{route('changepassword',Auth::user()->id)}}" method="post">
                        @csrf
                        <div class="modal-body">
                    
                            <div class="form-group row">
                       
                                <div class="col-sm-10 offset-1 input-group">
                                    <input type="password" class="form-control" id="password" name="password" aria-describedby="basic-addon1">
                                    <div class="input-group-prepend">
                                        <button type="button" class="btn btn-light circle" onclick="showpassword()"><i class="fas fa-eye"></i></button>
                                    </div>
                                </div>
                            </div>
                    
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                @endif
            </div>
        </div>
    </div>

<!-- admin change password modal end -->











    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('sb_admin2/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('sb_admin2/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- datatable -->
    <script src="{{asset('sb_admin2/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('sb_admin2/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('sb_admin2/js/demo/datatables-demo.js')}}"></script>
    <script src="{{asset('yearpicker.js')}}" async></script>



    <!-- Core plugin JavaScript-->
    <script src="{{asset('sb_admin2/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('sb_admin2/js/sb-admin-2.min.js')}}"></script>

    <!-- Select 2 -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script> --}}
    <script src="{{asset('sb_admin2/vendor/select2/dist/js/select2.min.js')}}"></script>    


    <!-- summernote -->
    <script src="{{ asset('sb_admin2/vendor/summernote/summernote-bs4.min.js') }}"></script>

    <!-- admin change password -->

    <script type="text/javascript">
        function showpassword()
        {
           var password = document.getElementById('password');
            if(password.type=="password"){
               password.type="text";
            }
            else{
                password.type="password";
            }

        }

        $(document).ready(function(){
            $('.msg').hide(10000);
        })
    </script>



    <script type="text/javascript">
        $(document).ready(function() {
            // $('#summernote').summernote({
                
            //   toolbar: [
            //     ['style', ['bold', 'italic', 'underline', 'clear']],
            //     ['font', ['strikethrough', 'superscript', 'subscript']],
            //     ['fontsize', ['fontsize']],
            //     ['color', ['color']],
            //     ['para', ['ul', 'ol', 'paragraph']],
            //     ['height', ['height']],
            //     ['Horizontal Rule',['hr']],

            //   ],
            // });

            $('#summernote').summernote({
                // placeholder: 'Hello Bootstrap 4',
                tabsize: 2,
                height: 200
            });

            $('.js-example-basic-multiple').select2({
                theme: 'bootstrap4',
            });
        });
    
       
    </script>
    @yield('script')
</body>

</html>

