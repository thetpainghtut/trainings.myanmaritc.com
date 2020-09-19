@extends('backendtemplate')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"> Courses </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Edit Existing Course
                <a href="{{route('courses.index')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-backward mr-2"></i> Go Back </a>
            </h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
          
            <form method="post" action="{{route('courses.update',$course->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="inputcodeno" name="codeno" value="{{$course->code_no}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" value="{{$course->name}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputFile" class="col-sm-2 col-form-label">Logo</label>
                    <div class="col-sm-10">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Old Photo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New Photo</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <input type="hidden" class="form-control" name="oldlogo" value="{{$course->logo}}">
                                <img src="{{asset($course->logo)}}" class="img-fluid w-25">
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <input type="file" class="form-control-file pt-3" id="inputFile" name="logo">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputOutline" class="col-sm-2 col-form-label">Outlines</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="summernote" name="outlines">{{ $course->outline}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputFile" class="col-sm-2 col-form-label">Outline Photo</label>
                    <div class="col-sm-10">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="outline_oldphoto-tab" data-toggle="tab" href="#outline_oldphoto" role="tab" aria-controls="outline_oldphoto" aria-selected="true">Old Photo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="outline_newphoto-tab" data-toggle="tab" href="#outline_newphoto" role="tab" aria-controls="outline_newphoto" aria-selected="false">New Photo</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="outline_oldphoto" role="tabpanel" aria-labelledby="outline_oldphoto-tab">
                                <input type="hidden" class="form-control" name="outline_oldphoto" value="{{$course->outline_photo}}">
                                <img src="{{asset($course->outline_photo)}}" class="img-fluid w-25">
                            </div>
                            <div class="tab-pane fade" id="outline_newphoto" role="tabpanel" aria-labelledby="outline_newphoto-tab">
                                <input type="file" class="form-control-file pt-3" id="inputFile" name="outline_newphoto">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputFees" class="col-sm-2 col-form-label">Fees</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputFees" name="fees" value="{{$course->fees}}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="inputDuring" class="col-sm-2 col-form-label">During</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputDuring" name="during" value="{{$course->during}}">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="inputDuration" class="col-sm-2 col-form-label">Duration</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputDuration" name="duration" value="{{$course->duration}}">
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