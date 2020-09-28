@extends('backendtemplate')

@section('content')
    @php
        $db_content = htmlspecialchars($post->content);
    @endphp
    <h1 class="h3 mb-4 text-gray-800"> Journals </h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> Edit Post
                <a href="{{route('posts.index')}}" class="btn btn-outline-primary btn-sm d-inline-block float-right"><i class="fas fa-angle-double-left mr-2"></i>Go Back</a>
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

            <form method="post" action="{{route('posts.update',$post->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group row">
                    <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputTitle" name="title" value="{{ $post->title }}">
                    </div>
                </div>

                <div class="form-group row" id="subjectDiv">
                    <label for="topicName" class="col-sm-2 col-form-label">Topic</label>
                    <div class="col-sm-10">
                        <select class="js-example-basic-multiple form-control" name="topic" id="topicName">
                            <option>Choose One</option>
                            @foreach($topics as $topic)
                                <option value="{{$topic->id}}" <?php if($topic->id==$post->topic_id) { ?> selected <?php }; ?>>{{$topic->name}}</option>
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
                                <input type="hidden" class="form-control" name="oldfile" value="{{$post->file}}">
                                @php
                                    $images = explode(',', $post->file);
                                @endphp
                                @foreach($images as $img)
                                <img src="{{asset($img)}}" width="100" height="100">
                                @endforeach
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                
                                <input name="file[]" type="file" class="form-control-file pt-3" id="inputFile" multiple>
                                <span class="text-danger">{{ $errors->first('file') }}</span>
                                <div id="preview_img"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputOutline" class="col-sm-2 col-form-label"> Content </label>
                    <div class="col-sm-10">
                        <textarea id="summernote" class="form-control"  name="content">{!! $post->content !!}</textarea>
                    </div>
                </div>

                <div class="form-group row" id="subjectDiv">
                    <label for="batchName" class="col-sm-2 col-form-label">Batch</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="batch" id="batchName">
                            <option>Choose One</option>
                            @foreach($batches as $batch)
                                <option value="{{$batch->id}}" <?php foreach($post->batches as $b){
                                    if($batch->id == $b->id) echo "selected";
                                    }?>>{{$batch->title}}</option>
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

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".js-example-basic-multiple").select2({
              placeholder: "Choose Subject",
              theme: 'bootstrap4',
            });

            $('#inputFile').on('change', function(){ //on file input change

                if (window.File,window.FileReader,window.FileList,window.Blob) //check File API supported browser
                {
           
                    var data = $(this)[0].files; //this file data
                    
                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            console.log(fRead);
                            fRead.onload = (function(file){ //trigger function on successful read
                                console.log(file);
                                $('#preview_img').empty();
                                return function(e) {

                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width('100').height('100'); //create image element 
                                    //$("#preview_img").empty().append(img);
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }else{
                            $('#preview_img').val('');
                        }
                    });
               
                }
                else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });

    </script>
@endsection
