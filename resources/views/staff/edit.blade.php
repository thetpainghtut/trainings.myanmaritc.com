@extends('backendtemplate')

@section('content')

    
    <h1 class="h3 mb-4 text-gray-800"> Staffs </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Update Exiting Staff
                <a href="{{route('staffs.show',$user->id)}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-backward mr-2"></i> Go Back </a>
            </h5>
        </div>
        <div class="card-body">

            <form method="post" action="{{route('staffs.update',$user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              
                <input type="hidden" name="oldphoto" value="{{$user->staff->photo}}">
                <input type="hidden" name="role" value="{{$role[0]}}">

                <div class="form-group row">
                    <label for="inputprofile" class="col-sm-2 col-form-label">Profile</label>
                    <div class="col-sm-10">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Photo</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <img src="{{$user->staff->photo}}" class="img-fluid my-2" width="100px" height="100px">
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <input type="file" name="newphoto" class="form-control-file my-2">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" value="{{$user->name}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="email" value="{{$user->email}}">

                        @if($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputnrc" class="col-sm-2 col-form-label">NRC</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputnrc" name="nrc" value="{{$user->staff->nrc}}">
                        
                        @if(session('nrc_error'))
                            <span class="text-danger">{{session('nrc_error')}}</span>
                        @elseif($errors->has('nrc'))
                            <span class="text-danger">{{$errors->first('nrc')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputDob" class="col-sm-2 col-form-label">Dob</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputDob" name="dob" value="{{$user->staff->dob}}">
                        
                        @if($errors->has('dob'))
                            <span class="text-danger">{{$errors->first('dob')}}</span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputphone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputphone" name="phone" value="{{$user->staff->phone}}">

                        @if($errors->has('phone'))
                            <span class="text-danger">{{$errors->first('phone')}}</span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputjdate" class="col-sm-2 col-form-label">Join Date</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputjdate" name="joindate" value="{{$user->staff->joineddate}}">

                        @if($errors->has('joindate'))
                            <span class="text-danger">{{$errors->first('joindate')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputfather" class="col-sm-2 col-form-label">Father</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputfather" name="fathername" value="{{$user->staff->fathername}}">

                        @if($errors->has('fathername'))
                            <span class="text-danger">{{$errors->first('fathername')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputfather" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="location_id">
                            @foreach($locations as $location)
                                <option value="{{$location->id}}">{{$location->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                             
                           

                @if($role[0]=="Teacher")
                    <div class="form-group row">
                        <label for="course" class="col-sm-2 col-form-label">Course</label>
                        <div class="col-sm-10">
                            <select class="form-control form-control js-example-basic-multiple mentor" name="course_id[]" id="course" multiple="multiple">
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}"   @foreach($user->staff->teacher as $teacher) @if($course->id==$teacher->course_id) selected @endif   @endforeach >

                                        {{$course->name}}{{--  ( {{$course->location->city->name}} ) --}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Degree</label>
                    <div class="col-sm-10">
                        <textarea id="summernote" name="degree">{{$user->staff->teacher[0]->degree}}</textarea>
                    </div>
                </div>



                @elseif($role[0]=="Mentor")
                    <div class="form-group row">
                        <label for="course" class="col-sm-2 col-form-label">Course</label>
                        <div class="col-sm-10">
                            <select class="form-control form-control js-example-basic-multiple mentor" name="course_id[]" id="course" multiple="multiple">
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}"   @foreach($user->staff->mentor as $mentor) @if($course->id==$mentor->course_id) selected @endif   @endforeach >
                                        {{$course->name}} ( {{$course->location->city->name}} )
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPortfolio" class="col-sm-2 col-form-label">Portifolio</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPortfolio" name="portfolio" value="{{$user->staff->mentor[0]->portfolio}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Degree</label>
                        <div class="col-sm-10">
                            <textarea id="summernote" name="degree">{{$user->staff->mentor[0]->degree}}</textarea>
                        </div>
                    </div>
                @endif

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                
            </form>

        </div>
    </div>


@endsection
