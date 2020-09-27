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
            <div class="row justify-content-center">

                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-3 order-sm-3 order-3">
                    <form>
                        <fieldset>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="chpassword"> Change Password </label>
                                        <input class="form-control py-4" id="chpassword" type="password" name="changepassword" />
                                    </div>
                                </div>
                        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="cfpassword"> Confirm Password </label>
                                        <input class="form-control py-4" id="cfpassword" type="password" name="confirmpassword"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="crpassword"> Current Password </label>
                                <input class="form-control py-4" id="crpassword" type="password" name="currentpassword" />
                                <small> (we need your current password to confirm your changes) </small>
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