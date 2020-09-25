@extends('backendtemplate')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"> Subjects </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Create New Subject
                <a href="{{route('subjects.index')}}" class="btn btn-outline-primary btn-sm d-inline-block float-right"><i class="fas fa-angle-double-left mr-2"></i>Go Back</a>
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

            <form method="post" action="{{route('subjects.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="inputLogo" class="col-sm-2 col-form-label">Logo</label>
                    <div class="col-sm-10">
                        <input type="file" id="inputLogo" name="logo">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Course</label>
                    <div class="col-sm-10">
                        <select class="js-example-basic-multiple form-control" name="courses[]" multiple="multiple" id="courses">
                            <option>Choose One</option>
                            @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".js-example-basic-multiple").select2({
              placeholder: "Choose Course",
                theme: 'bootstrap4',
              
            });
        });

    </script>
@endsection
