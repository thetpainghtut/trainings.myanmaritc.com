@extends('template')
@section('content')

	<!-- Header -->
    <header class="py-5 mb-5 header_img">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-white">
                    <h1 class="display-4 mt-5 mb-2"> My Account, </h1>
                    
                </div>
            </div>
        </div>
    </header>
    <!-- Header -->

    <!-- Page Content -->
    <div id="page-content">
        <div class="container my-5">
            <form action="{{route('frontend.student_profile_update')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="row justify-content-center">

                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 order-1 align-items-center justify-content-between">
                        <div class="avatar-upload">
                            <div class="avatar-edit">

                                <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="logo" disabled="" data-student_id = "{{Auth::user()->student->id}}" value="mmitui/image/user.png" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                @if(Auth::user()->student->photo)
                                    <div id="imagePreview" style="background-image: url('{{ asset(Auth::user()->student->photo) }}');">
                                        <input type="hidden" name="oldlogo" value="{{Auth::user()->student->photo}}">
                                    </div>
                                @else
                                    <div id="imagePreview" style="background-image: url('{{ asset('mmitui/image/user.png') }}');">
                                        <input type="hidden" name="oldlogo" value="mmitui/image/user.png">
                                    </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-3 order-sm-3 order-3">
                        
                            <fieldset disabled>
                                @if(session('msg'))
                                    <h6 class="text-success">{{session('msg')}}</h6>
                                @endif
                                
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputName"> Name</label>
                                            <input class="form-control py-4" id="inputName" type="text" placeholder="Enter Name" name="name" value="{{Auth::user()->name}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="phone">Phone Number</label>
                                            <input class="form-control py-4" id="phone" type="text" placeholder="Enter Phone Number" name="phone" value="{{Auth::user()->student->phone}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" value="{{Auth::user()->email}}"/>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">DOB</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="date" aria-describedby="dob" placeholder="Enter email address" name="dob" value="{{Auth::user()->student->dob}}"/>
                                        </div>
                                    </div>
                                    
                                </div>

                                

                                <div class="form-group">
                                    <label class="small mb-1" for="address"> Address </label>
                                    <textarea class="form-control" name="address">{{Auth::user()->student->address}}</textarea>
                                </div>

                                <div class="form-group hideForm d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button type="submit" class="btn btn-outline-primary"> Save </button>
                                </div>
                            </fieldset>
                        
                    </div>
                    
                    <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 col-12 order-xl-3 order-lg-3 order-md-2 order-sm-2 order-2">
                        <button class="btn btn-warning float-right profile_editBtn" type="button"> 
                            <i class="fas fa-tools"></i>
                        </button>
                        <button class="btn btn-danger float-right profile_cancelBtn" type="button"> 
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </form>
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