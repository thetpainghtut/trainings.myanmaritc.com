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
            <div class="row justify-content-center">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 order-1 align-items-center justify-content-between">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="logo" disabled="" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="background-image: url('{{ asset('mmitui/image/user.png') }}');">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-3 order-sm-3 order-3">
                    <form>
                        <fieldset disabled>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputName"> Name</label>
                                        <input class="form-control py-4" id="inputName" type="text" placeholder="Enter Name" name="name" value="User One" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="phone">Phone Number</label>
                                        <input class="form-control py-4" id="phone" type="text" placeholder="Enter Phone Number" name="phone" value="0987654321"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                <input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" value="userone@gmail.com"/>
                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="address"> Address </label>
                                <textarea class="form-control" name="address">Yangon </textarea>
                            </div>

                            <div class="form-group hideForm d-flex align-items-center justify-content-between mt-4 mb-0">
                                <button type="submit" class="btn btn-outline-primary"> Save </button>
                            </div>
                        </fieldset>
                    </form>
                </div>
                
                <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 col-12 order-xl-3 order-lg-3 order-md-2 order-sm-2 order-2">
                    <button class="btn btn-warning float-right profile_editBtn"> 
                        <i class="fas fa-tools"></i>
                    </button>
                    <button class="btn btn-danger float-right profile_cancelBtn"> 
                        <i class="fas fa-times"></i>
                    </button>
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