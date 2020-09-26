@extends('backendtemplate')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"> Lessons </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Create New Lesson
                <a href="{{route('lessons.index')}}" class="btn btn-outline-primary btn-sm d-inline-block float-right"><i class="fas fa-angle-double-left mr-2"></i>Go Back</a>
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

            <form method="post" action="{{route('lessons.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="inputLogo" class="col-sm-2 col-form-label">Video File </label>
                    <div class="col-sm-10">
                        <input type="file" id="inputLogo" name="video">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="title">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Course</label>
                    <div class="col-sm-10">
                        <select class="form-control course_change" name="course" id="courses">
                            <option>Choose Course</option>
                            @foreach($courses as $course)
                                <option value="{{$course->id}}">{{$course->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label"> Subject </label>
                    <div class="col-sm-10">
                        <select class="form-control js-example-basic-single" name="subject" id="subject">
                            <option> Choose Subject </option>
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.js-example-basic-single').select2({
                theme: 'bootstrap4',

            });

            $('.course_change').change(function () {
                var cid = $(this).val();

                $.post("/show_subject",{id:cid},function (res) {
                    var data = JSON.parse(res);
                    var html ='';

                    $.each(data,function (i,v) {

                        html +=`<option value="${v.id}">
                                ${v.name}
                            </option>`;
                    });

                    $('#subject').html(html);

                });
            });

        });

    </script>
@endsection
