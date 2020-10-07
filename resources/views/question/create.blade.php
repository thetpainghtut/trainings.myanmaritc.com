@extends('backendtemplate')

@section('content')

<div class="row">
    <div class="col-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('quizzes.index') }}">Home</a></li>
                
                <li class="breadcrumb-item"><a href="{{ route('quizzes.show',$quizz->id) }}"> {{$quizz->title}} </a></li>
                <li class="breadcrumb-item active" aria-current="page"> Question </li>
                <li class="breadcrumb-item active" aria-current="page"> Create </li>
            </ol>
        </nav>
    </div>
    <div class="col-2 mt-2">
        <a href="{{route('questions.show',$quizz->id)}}"> 
            <button class="btn btn-outline-primary btn-sm float-right" > <i class="fas fa-backward mr-2"></i> Go Back</button>
        </a>

    </div>
</div> 



<div class="row">
    <div class="col-md-12 col-sm-12 mx-auto">
        <div class="card shadow">
            <div class="card-header">
               <h5 class="text-primary m-0 font-weight-bold">Create New Question</h5>
            </div>
            <div class="card-body">
                <form action="{{route('questions.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-group mt-3">
                        <label class="col-form-label col-md-2">
                            Type
                        </label>
                        <div class="col-md-10">
                            <div class="form-check form-check-inline">
                                <input type="radio" name="type" value="multicheck" class="form-check-input type_check" >
                                 <label class="form-check-label" for="inlineRadio1">Multicheck</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="type" value="checkbox" class="form-check-input type_check">
                                <label class="form-check-label" for="inlineRadio2">Checkbox</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="type" value="truefasle" class="form-check-input type_check">
                                <label class="form-check-label" for="inlineRadio3">True/False</label>
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-form-label col-md-2">Question</label>
                        <div class="col-md-10">
                            <input type="text" name="question" class="form-control" placeholder="Question Title">
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-form-label col-md-2">Photo</label>
                        <div class="col-md-10">
                            <input type="file" name="photo" class="form-control-file input_photo">
                            <img src="" class="show_photo mt-2">
                        </div>
                    </div>

                    
                    <div class="form-group row mt-3">
                        <label class="col-form-label col-md-2">Timer</label>
                        <div class="col-md-10">
                            <select class="form-control">
                                <optgroup>
                                    <option value="5000" selected="">5 seconds</option>
                                    <option value="10000">10 seconds</option>
                                    <option value="20000">20 seconds</option>
                                    <option value="30000">30 seconds</option>
                                    <option value="40000">40 seconds</option>
                                    <option value="50000">50 seconds</option>
                                    <option value="60000">1 minutes</option>
                                    <option value="120000">2 minutes</option>
                                    <option value="180000">2 minutes</option>
                                    <option value="300000">5 minutes</option>
                                    <option value="600000">10 minutes</option>

                                </optgroup>
                            </select>
                            
                        </div>
                    </div> 
                    <div class="add_answer">

                    <div class="form-group row mt-4">
                        <label class="col-form-label col-md-2 answer_label">Answer1 </label>
                        <div class="col-md-10 input-group">
                            <input type="checkbox" name="rightans[]" class="form-check-input data_check" disabled="">
                            <input type="text" name="answer[]" class="form-control" placeholder="Answer 1">
                        </div>
                    </div>

                    <div class="form-group row mt-4">

                        <label class="col-form-label col-md-2 answer_label">Answer2 </label>
                        <div class="col-md-10 input-group">
                            <input type="checkbox" name="rightans[]" class="form-check-input data_check" disabled="">
                            <input type="text" name="answer[]" class="form-control" placeholder="Answer 2">
                        </div>
                    </div>
                    <div class="show_hide">

                    <div class="form-group row mt-4">
                        <label class="col-form-label col-md-2 answer_label">Answer3 </label>
                        <div class="col-md-10 input-group">
                            <input type="checkbox" name="rightans[]" class="form-check-input data_check" disabled="">
                            <input type="text" name="answer[]" class="form-control" placeholder="Answer 3">
                        </div>
                    </div>

                        


                    </div>

                    </div>

                    <div class="form-group row mt-4 show_hide">
                        <div class="col-md-10">
                           <button type="button" class="btn btn-outline-secondary btn_add_answer"><i class="fas fa-plus" ></i>Add Answer</button>
                        </div>
                            
                    </div>

                    <div class="form-group row mt-4">
                        
                        <div class="col-md-10">
                           <button class="btn btn-outline-primary">Save</button>
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
        // $(this).closest('.add_answer').next('data_check').attr('disabled');

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
            var html = '';
            // var answer=new Array();
            var answer=($('.answer_label').text());
            var ans = answer.split(' ');
            var last_array =ans[ans.length-2]; 
            console.log(last_array);
            if(last_array == "Answer3"){
            html+=`<div class="form-group row mt-4 answer4">
                        <label class="col-form-label col-md-2 answer_label">Answer4 </label>
                        <div class="col-md-10 input-group">
                            <input type="checkbox" name="rightans[]" class="form-check-input data_check" disabled="">
                            <input type="text" name="answer[]" class="form-control" placeholder="Answer4">

                            <div class="input-group-prepend">
                              <div class="input-group-text">
                              <i class="fas fa-trash text-danger delete_ans"></i>
                              </div>
                            </div>
                            
                        </div>
                    </div>`;
                }else if(last_array == "Answer4"){
                    html+=`<div class="form-group row mt-4 answer5">
                        <label class="col-form-label col-md-2 answer_label">Answer5 </label>
                        <div class="col-md-10 input-group">
                            <input type="checkbox" name="rightans[]" class="form-check-input data_check" disabled="">
                            <input type="text" name="answer[]" class="form-control data_check" placeholder="Answer5">

                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                  <i class="fas fa-trash text-danger delete_ans"></i>
                                  </div>
                                </div>
                        </div>
                    </div>`;
                }else if(last_array == "Answer5"){
                    html+=`<div class="form-group row mt-4 answer6">
                        <label class="col-form-label col-md-2 answer_label">Answer6 </label>
                        <div class="col-md-10 input-group">
                            <input type="checkbox" name="rightans[]" class="form-check-input data_check" disabled="">
                            <input type="text" name="answer[]" class="form-control" placeholder="Answer6">

                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                  <i class="fas fa-trash text-danger delete_ans"></i>
                                  </div>
                                </div>
                        </div>
                    </div>`;
                }

            $('.add_answer').append(html);
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
            if(data == "multicheck"){
                $('.show_hide').show(1000);
                $('.data_check').show(1000)
            }else if(data == "checkbox"){
                $('.show_hide').show(1000);
                $('.data_check').show(1000)
            }else if(data == "truefasle")
            {
                $('.show_hide').hide(1000);
                $('.data_check').hide(1000)
            }
        })

        $('.add_answer').on('click','.data_check',function(){
            var checkbox = $(".data_check:checked").length;
            var data = $('.type_check:checked').val();
            if(data == "multicheck"){
                if(checkbox==1){
                    $('.add_answer .data_check').addClass('disabled');
                }
            }else if(data == "checkbox"){
                alert('i');
            }
        })

    })
</script>
@endsection