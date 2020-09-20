@extends('backendtemplate')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"> Journals </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Create New Journal
                <a href="{{route('journals.index')}}" class="btn btn-outline-primary btn-sm d-inline-block float-right"><i class="fas fa-angle-double-left mr-2"></i>Go Back</a>
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

            <form method="post" action="{{route('journals.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="inputTitle" class="col-sm-2 col-form-label"> Type </label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="activity" value="Activity">
                            <label class="form-check-label" for="activity"> Activity </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="sharing" value="Sharing">
                            <label class="form-check-label" for="sharing">Knowledge Sharing </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputTitle" name="title" value="{{ old('title') }}">
                    </div>
                </div>

                <div class="form-group row" id="subjectDiv">
                    <label for="subjectName" class="col-sm-2 col-form-label">Subject</label>
                    <div class="col-sm-10">
                        <select class="js-example-basic-multiple form-control" name="subjects[]" multiple="multiple" id="subjectName">
                            <option>Choose One</option>
                            @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputLogo" class="col-sm-2 col-form-label"> File </label>
                    <div class="col-sm-10">
                        <input type="file" id="inputLogo" name="file">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputOutline" class="col-sm-2 col-form-label"> Content </label>
                    <div class="col-sm-10">
                        <textarea id="summernote" class="form-control"  name="content">{{ old('content') }}</textarea>
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
              placeholder: "Choose Subject",
            });

            $("input[name=type]:radio").click(function () {
                if ($('input[name=type]:checked').val() == "Activity") {
                    $('#subjectDiv').hide(1000);

                } else if ($('input[name=type]:checked').val() == "Sharing") {
                    $('#subjectDiv').show(1000);
                }
            });
        });

    </script>
@endsection
