@extends('backendtemplate')

@section('content')

<div class="row">
    <div class="col-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('quizzes.index') }}">Home</a></li>
                
                <li class="breadcrumb-item"><a href="{{ route('quizzes.show',$question->quiz_id) }}"> {{$question->quiz->title}} </a></li>
                <li class="breadcrumb-item active" aria-current="page"> Question </li>
                <li class="breadcrumb-item active" aria-current="page"> Edit </li>
            </ol>
        </nav>
    </div>
    <div class="col-2 mt-2">
        <a href="{{route('questions.show',$question->quiz_id)}}"> 
            <button class="btn btn-outline-primary btn-sm float-right" > <i class="fas fa-backward mr-2"></i> Go Back</button>
        </a>

    </div>
</div> 



<div class="row">
    <div class="col-md-12 col-sm-12 mx-auto">
        <div class="card shadow">
            <div class="card-header">
               <h5 class="text-primary m-0 font-weight-bold">Edit Exciting Question</h5>
            </div>
            <div class="card-body">
                <form action="{{route('questions.update',$question->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="oldphoto" value="{{$question->photo}}">
                    <input type="hidden" name="quizz_id" value="{{$question->quiz_id}}">
                    <div class="row form-group mt-3">
                        <label class="col-form-label col-md-2">
                            Type
                        </label>
                        <div class="col-md-10">
                            <div class="form-check form-check-inline">
                                <input type="radio" name="type" value="multicheck" class="form-check-input type_check" id="inlineRadio1" @if($question->type == "multicheck") checked="" @endif>
                                 <label class="form-check-label" for="inlineRadio1">Multicheck</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="type" value="checkbox" class="form-check-input type_check " id="inlineRadio2" @if($question->type == "checkbox") checked="" @endif>
                                <label class="form-check-label" for="inlineRadio2">Checkbox</label>
                            </div>
                            <div class="form-check form-check-inline">

                                <input type="radio" name="type" value="truefasle" class="form-check-input type_check " id="inlineRadio3" @if($question->type == "truefasle") checked="" @endif>

                                <label class="form-check-label" for="inlineRadio3">True/False</label>
                            </div>
                            <br>
                                @if($errors->has('type'))
                                <span class="text-danger">{{$errors->first('type')}}</span>
                                @endif
                        </div>

                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-form-label col-md-2">Question</label>
                        <div class="col-md-10">
                            <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" placeholder="Question Title" value="{{$question->questiontext}}">
                            @if($errors->has('question'))
                            <span class="text-danger">{{$errors->first('question')}}</span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-form-label col-md-2">Photo</label>
                        <div class="col-md-10">

                            <nav>
                                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old Photo</a>
                                    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New Photo</a>
                                
                                  </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                      <img src="{{asset($question->photo)}}" class="img-fluid mt-2" width="200px" >
                                  </div>
                                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <input type="file" name="newphoto" class="form-control-file input_photo mt-2">
                                    <img src="" class="show_photo mt-2">
                                  </div>
                                  
                                </div>


                        </div>
                    </div>

                    
                    <div class="form-group row mt-3">
                        <label class="col-form-label col-md-2">Timer</label>
                        <div class="col-md-10">
                            <select class="form-control" name="timer">
                                <optgroup>

                                    <option value="5000" @if($question->timer == "5000") selected="" @endif>
                                        5 seconds
                                    </option>
                                    <option value="10000" @if($question->timer == "10000") selected="" @endif>
                                        10 seconds
                                    </option>

                                    <option value="20000" @if($question->timer == "20000") selected="" @endif>     20 seconds
                                    </option>

                                    <option value="30000" @if($question->timer == "30000") selected="" @endif>      30 seconds
                                    </option>

                                    <option value="40000" @if($question->timer == "40000") selected="" @endif>      40 seconds
                                    </option>

                                    <option value="50000" @if($question->timer == "50000") selected="" @endif>      50 seconds
                                    </option>

                                    <option value="60000" @if($question->timer == "60000") selected="" @endif>      1 minutes
                                    </option>

                                    <option value="120000" @if($question->timer == "120000") selected="" @endif>
                                        2 minutes
                                    </option>

                                    <option value="180000" @if($question->timer == "180000") selected="" @endif>
                                        2 minutes
                                    </option>

                                    <option value="300000" @if($question->timer == "300000") selected="" @endif>
                                        5 minutes
                                    </option>

                                    <option value="600000" @if($question->timer == "600000") selected="" @endif>
                                        10 minutes
                                    </option>

                                </optgroup>
                            </select>
                            
                        </div>
                    </div> 
                    <div class="add_answer">
                    @php $i=1; @endphp
                    @foreach($question->checks as $key => $answer)
                    @if($question->type == 'multicheck')
                        @php $input_type = 'radio'; @endphp
                    @elseif($question->type == 'checkbox')
                        @php $input_type = 'checkbox'; @endphp
                    @else
                        @php $input_type = 'radio'; @endphp
                    @endif
                        <div class="form-group row mt-4">
                            <label class="col-form-label col-md-2 answer_label">Answer{{$i}} </label>
                            <div class="col-md-10 input-group">

                                <input type="{{$input_type}}" name="trueanswer[]" class="form-check-input data_check @error('trueanswer') is-invalid @enderror" @if($answer->rightanswer == 'true') checked="" @endif value="{{$key}}">

                                <input type="text" name="answer[]" class="form-control" value="{{$answer->answer}}" >
                            </div>
                        </div>
                    @php $i++; @endphp
                    @endforeach

                    </div>

                    <div class="form-group row mt-4 show_hide">
                        <div class="col-md-10">
                           <button type="button" class="btn btn-outline-secondary btn_add_answer"><i class="fas fa-plus"></i>Add Answer</button>
                        </div>
                            
                    </div>

                    <div class="form-group row mt-4">
                        
                        <div class="col-md-10">
                           <button class="btn btn-outline-primary">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
   
</div>



@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('.show_hide').show();
        // $('.add_answer').find('.data_check').prop('disabled',true);
        $('.btn_add_answer').show();
        var value =  $('.type_check:checked').val();
        if(value == 'truefasle'){
            $('.btn_add_answer').hide();
        }

        $('.input_photo').change(function(){

        readURL(this);
        function readURL(input)
        {
            if(window.File,window.FileReader,window.Filelist,window.Blob){
                    var input_image = input.files;
                    var reader = new FileReader();
                    reader.onload=function(e){
                        $('.show_photo').attr('src',e.target.result).width('120px').height('100px');
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        })

        $('.btn_add_answer').click(function(){
            // $('.add_answer').find('.data_check').prop('disabled',true);
            var data = $('.type_check:checked').val();
            var html = '';
            console.log(data);
            // var answer=new Array();
            var answer=($('.answer_label').text());
            var ans = answer.split(' ');
            var last_array =ans[ans.length-2]; 
            // console.log(last_array);
            var input_type ='';
            if(data == 'multicheck'){
                input_type = 'radio';
            }else if(data == 'checkbox'){
                input_type = 'checkbox';
            }
            if(last_array == "Answer3"){
            
            
            html+=`
            <div class="show_hide">
                <div class="form-group row mt-4 answer4">
                        <label class="col-form-label col-md-2 answer_label">Answer4 </label>
                        <div class="col-md-10 input-group">

                            <input type="${input_type}" name="trueanswer[]" class="form-check-input data_check" value="3">

                            <input type="text" name="answer[]" class="form-control" placeholder="Answer4">

                            <div class="input-group-prepend">
                              <div class="input-group-text">
                              <i class="fas fa-trash text-danger delete_ans"></i>
                              </div>
                            </div>
                            
                        </div>
                    </div>
                </div>`;
                }else if(last_array == "Answer4"){
                    html+=`
                    <div class="show_hide">

                        <div class="form-group row mt-4 answer5">
                            <label class="col-form-label col-md-2 answer_label">Answer5 </label>
                            <div class="col-md-10 input-group">
                                <input type="${input_type}" name="trueanswer[]" class="form-check-input data_check" value="4">

                                <input type="text" name="answer[]" class="form-control" placeholder="Answer5">

                                    <div class="input-group-prepend">
                                      <div class="input-group-text">
                                      <i class="fas fa-trash text-danger delete_ans"></i>
                                      </div>
                                    </div>
                            </div>
                        </div>
                    </div>`;
                }else if(last_array == "Answer5"){
                    html+=`
                    <div class="show_hide">

                        <div class="form-group row mt-4 answer6">
                            <label class="col-form-label col-md-2 answer_label">Answer6 </label>
                            <div class="col-md-10 input-group">
                                <input type="${input_type}" name="trueanswer[]" class="form-check-input data_check" value="5">

                                <input type="text" name="answer[]" class="form-control" placeholder="Answer6">

                                    <div class="input-group-prepend">
                                      <div class="input-group-text">
                                      <i class="fas fa-trash text-danger delete_ans"></i>
                                      </div>
                                    </div>
                            </div>
                        </div>
                    </div>`;
                }



            $('.add_answer').append(html);
            // $('.add_answer').find('.data_check').prop('disabled',true);
        })

        $('.add_answer').on('click','.delete_ans',function(){
            var answer=($('.answer_label').text());
            var ans = answer.split(' ');
            var last_array =ans[ans.length-2];
            var html ='';
            console.log(last_array);
            if(last_array == "Answer6"){
                    $('.answer6').remove();
                }else if(last_array == "Answer5"){
                    $('.answer5').remove();    
                }else if(last_array == "Answer4"){
                    $('.answer4').remove();    
                }

            
        })

        $('.type_check').change(function(){
            var data = $(this).val();
            // select_data(data);
            if(data == "multicheck"){
                $('.show_hide').show(1000);
                $('.data_check').show(1000);
                $('.add_answer').find('.data_check').removeAttr('selected');
                $('.add_answer').find('.data_check').prop('disabled',false);
                $('.add_answer').find('.data_check').attr('type','radio');
                $('.btn_add_answer').show();

                
            }else if(data == "checkbox"){
                $('.show_hide').show(1000);
                $('.data_check').show(1000);
                $('.add_answer').find('.data_check').prop('disabled',false);
                $('.add_answer').find('.data_check').attr('type','checkbox');
                $('.btn_add_answer').show();
                

            }else if(data == "truefasle")
            {
                $('.add_answer').find('.data_check').attr('type','radio');
                $('.add_answer').find('.data_check').prop('disabled',false);
                $('.show_hide').hide(1000);
                // $('.show_hide').remove();
            }
        })


    })
</script>
@endsection