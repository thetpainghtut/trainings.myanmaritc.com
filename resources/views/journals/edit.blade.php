@extends('backendtemplate')

@section('content')
    @php
        $db_content = htmlspecialchars($journal->content);
    @endphp
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

            <form method="post" action="{{route('journals.update',$journal->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="form-group row">
                    <label for="inputTitle" class="col-sm-2 col-form-label"> Type </label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="activity" value="Activity" {{ ($journal->type=="Activity")? "checked" : "" }} >
                            <label class="form-check-label" for="activity"> Activity </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="sharing" value="Sharing" {{ ($journal->type=="Sharing")? "checked" : "" }}>
                            <label class="form-check-label" for="sharing">Knowledge Sharing </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputTitle" name="title" value="{{ $journal->title }}">
                    </div>
                </div>

                <div class="form-group row" id="subjectDiv">
                    <label for="subjectName" class="col-sm-2 col-form-label">Subject</label>
                    <div class="col-sm-10">
                        <select class="js-example-basic-multiple form-control" name="subjects[]" multiple="multiple" id="subjectName">
                            <option>Choose One</option>
                            @foreach($subjects as $subject)
                                <option value="{{$subject->id}}" @foreach($journal->subjects as $sub_journal) <?php if($subject->id==$sub_journal->id) { ?> selected <?php }; ?> @endforeach>{{$subject->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputFile" class="col-sm-2 col-form-label">File</label>
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
                                <input type="hidden" class="form-control" name="oldfile" value="{{$journal->file}}">
                                <img src="{{asset($journal->file)}}" class="img-fluid w-25">
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <input type="file" class="form-control-file pt-3" id="inputFile" name="file">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputOutline" class="col-sm-2 col-form-label"> Content </label>
                    <div class="col-sm-10">
                        <textarea id="summernote" class="form-control"  name="content">{!! $journal->content !!}</textarea>
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

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".js-example-basic-multiple").select2({
              placeholder: "Choose Subject",
              theme: 'bootstrap4',
            });

            $("input[name=type]:radio").click(function () {
                if ($('input[name=type]:checked').val() == "Activity") {
                    $('#subjectDiv').hide(1000);

                } else if ($('input[name=type]:checked').val() == "Sharing") {
                    $('#subjectDiv').show(1000);
                }
            });

            if ($('input[name=type]:checked').val() == "Activity") {
                $('#subjectDiv').hide(1000);

            } else if ($('input[name=type]:checked').val() == "Sharing") {
                $('#subjectDiv').show(1000);
            }
        });

    </script>
@endsection
