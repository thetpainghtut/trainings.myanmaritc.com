@extends('backendtemplate')

@section('content')

    
    <h1 class="h3 mb-4 text-gray-800"> Student </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Update Exiting Student
                <a href="{{route('staffs.index')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-backward mr-2"></i> Go Back </a>
            </h5>
        </div>
        <div class="card-body">

            <form method="post" action="{{route('students.update',$student->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              
                <input type="hidden" name="oldphoto" value="{{$student->photo}}">

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
                                <img src="{{asset($student->photo)}}" class="img-fluid my-2" width="100px" height="100px">
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <input type="file" name="newphoto" class="form-control-file my-2">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name (English)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="namee" value="{{$student->namee}}">
                        @if($errors->has('namee'))
                            <span class="text-danger">{{$errors->first('namee')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name (Myanmar)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="namem" value="{{$student->namem}}">
                        @if($errors->has('namem'))
                            <span class="text-danger">{{$errors->first('namem')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" name="email" value="{{$student->email}}">

                        @if($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputGender" class="col-sm-2 col-form-label">Gender:</label>
                    <div class="col-sm-10">
                    	
	                    <div class="form-check form-check-inline">
	                        <input class="form-check-input" type="radio"  id="inlineRadio1" value="male" name="gender" @if($student->gender=="male")  {{'checked'
	                        }} @endif>
	                        <label class="form-check-label" for="inlineRadio1">Male</label>
	                    </div>
	                    <div class="form-check form-check-inline">
	                        <input class="form-check-input" type="radio"  id="inlineRadio2" value="female" name="gender" @if($student->gender=="female")  {{'checked'
	                        }} @endif>
	                        <label class="form-check-label" for="inlineRadio2">Female</label>
	                    </div>
                    </div>

                </div>

                
                <div class="form-group row">
                    <label for="inputDob" class="col-sm-2 col-form-label">Dob</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="inputDob" name="dob" value="{{$student->dob}}">
                        
                        @if($errors->has('dob'))
                            <span class="text-danger">{{$errors->first('dob')}}</span>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputphone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputphone" name="phone" value="{{$student->phone}}">

                        @if($errors->has('phone'))
                            <span class="text-danger">{{$errors->first('phone')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputphone" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="address">
                        	{{$student->address}}
                        </textarea>

                        @if($errors->has('address'))
                            <span class="text-danger">{{$errors->first('address')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Father Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="father" value="{{$student->p1}}">
                        @if($errors->has('father'))
                            <span class="text-danger">{{$errors->first('father')}}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Mother Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="mother" value="{{$student->p2}}">
                        @if($errors->has('mother'))
                            <span class="text-danger">{{$errors->first('mother')}}</span>
                        @endif
                    </div>
                </div>


                

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                
            </form>

        </div>
    </div>


@endsection
