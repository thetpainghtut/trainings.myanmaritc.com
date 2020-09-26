@extends('backendtemplate')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"> Courses </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Edit Existing Subject
                <a href="{{route('subjects.index')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-backward mr-2"></i> Go Back </a>
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

            <form method="post" action="{{route('subjects.update',$subject->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="inputFile" class="col-sm-2 col-form-label">Logo</label>
                    <div class="col-sm-10">
                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Old Photo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">New Photo</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <input type="hidden" class="form-control" name="oldlogo" value="{{$subject->logo}}">
                                <img src="{{asset($subject->logo)}}" class="img-fluid w-25">
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <input type="file" class="form-control-file pt-3" id="inputFile" name="logo">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name" value="{{$subject->name}}">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Course</label>
                    <div class="col-sm-10">
                        <select class="js-example-basic-multiple form-control" name="courses[]" multiple="multiple" id="courses">
                            <option>Choose One</option>
                            @foreach($courses as $course)
                                <option value="{{$course->id}}" @foreach($subject->courses as $sub_course) <?php if($course->id==$sub_course->id) { ?> selected <?php }; ?> @endforeach>{{$course->name}}</option>
                            @endforeach
                        </select>
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