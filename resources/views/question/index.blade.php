@extends('backendtemplate')

@section('content')

<div class="row">
    <div class="col-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('quizzes.index') }}">Home</a></li>
                
                <li class="breadcrumb-item">{{$quizz->title}} </li>
                <li class="breadcrumb-item active" aria-current="page"> Question </li>
            </ol>
        </nav>
    </div>
    
</div> 
<div class="row ">
    <div class="col-md-9 col-sm-12">
        @php $i=1; @endphp
        @foreach($questions as $question)
        <div class="card shadow mt-4">
            <div class="card-header">


                Question {{$i}} ( 
                @if($question->type == "multicheck") 
                <i class="icofont-check text-success"></i> 
                @elseif($question->type == "checkbox")  
                <i class="fas fa-tasks text-success"></i> 
                @elseif($question->type == "truefasle") 
                <i class="icofont-check-circled text-success"></i> / 
                <i class="icofont-close-line-circled text-danger"></i> @endif )
                @php

                    $time = $question->timer/1000;
                    $timer = $time.' seconds';
                    if($time>60){
                        $time = $time/60;
                        $timer = $time.' minutes';
                    }
                @endphp
                ( {{$timer}} )


                <a href="{{route('questions.edit',$question->id)}}" class="btn btn-outline-warning btn-sm float-right">
                    <i class="fas fa-edit"></i>
                </a>

                <form action="{{route('questions.destroy',$question->id)}}" method="post" class="d-inline-block float-right " onclick="return confirm('Are you sure to remove this is question?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm  mx-2">
                    <i class="fas fa-trash" ></i>
                    </button>
                </form>
            </div>
            <div class="card-body">
                @if($question->photo)
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="{{asset($question->photo)}}" class=" rounded circle" width="120px">
                    </div>
                    <div class="col-md-8">
                        <h5 class="text-dark">
                            {{$question->questiontext}}</h5>
                            
                        <hr>
                        <h6 class="text-gray-dark">Answer</h6>
                        <ol>
                        @foreach($question->checks as $answer)
                           
                            <li class="text-dark ">

                                {{$answer->answer}}
                                @if($answer->rightanswer=='true') 
                                    <i class="icofont-check-circled text-success d-inline-block font-weight-bold"></i>
                                @endif

                            </li>
                        @endforeach
                        </ol>

                    </div>
                </div>

                @else
                    <div class="row">
                        
                        <div class="col-md-12">
                            <h5 class="text-gray-dark">{{$question->questiontext}}</h5>
                            <hr>
                            <h6 class="text-gray-dark">Answer</h6>
                                <ol>
                                    @foreach($question->checks as $answer)
                                       
                                        <li class="text-dark ">

                                            {{$answer->answer}}
                                            @if($answer->rightanswer=='true') 
                                                <i class="icofont-check-circled text-success d-inline-block font-weight-bold"></i>
                                            @endif

                                        </li>
                                    @endforeach
                                </ol>
                        </div>
                    </div>

                @endif
                
            </div>
        </div>
        @php $i++; @endphp
        @endforeach
    </div>
    <div class="col-md-3 col-sm-12 " >
        <div class="card shadow scroll_card" style="position: fixed; transition: 1s;">
            <div class="card-header">
                {{$quizz->title}}

                ( {{$quizz->subject->name}} )
            </div>
            <div class="card-body">
                <img src="{{asset($quizz->photo)}}" class="card-img rounded circle" width="200px">
                <div class="row mt-4 ">
                    <a href="{{route('questions_createform',$quizz->id)}}" class="btn-block"> 
                        <button class="btn btn-outline-primary btn-block float-right" > <i class="fas fa-plus mr-2"></i> New Question</button>
                    </a>

                </div>
                <div class="row mt-2 ">
                   
                        <button class="btn btn-outline-success btn-block float-right"  data-toggle="modal" data-target="#assign_modal"> <i class="fas fa-plus mr-2"></i> Assign Batch</button>
                   
                </div>
                <div class="dropdown-divider"></div>
                <div class="row mt-2 ">
                    <h5 class="text-gray-dark">Batch</h5>
                </div>
                    {{-- @php
                        $batch = array();
                    @endphp
                    @foreach ($quizz->batches as $value) 
                    @php

                        $order = $value->pivot->orderBy('id',"DESC")->limit(5)->get();
                    @endphp

                    @foreach ($order as $data) 

                    @php
                        $batch[] = $value->where('id',$data->batch_id)->get();
                    @endphp

                    @endforeach

                    @endforeach --}}
                
                <div class="row">  
                    @php
                        $date = date('Y-m-d');
                    @endphp
                    <ol>
                        @foreach($quizz->batches as $row)
                        @php $courseid = $row->course_id;  @endphp
                            
                                <li>{{$courseid}}</li>
                               
                       
                        @endforeach
                    </ol>
                </div>
                   

            </div>
        </div>
    </div>
</div>


{{-- assign batch --}}

<div class="modal fade" id="assign_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Batch and Subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="assign_batch_quizz">
                <input type="hidden" name="subject_id" value="">
                <div class="modal-body">
                    <div class="row my-3">
                        <div class="col-md-10 offset-1" id="form-group-batch">
                            <label for="postpone">Batch</label>
                                <input type="hidden" name="quizz_id" value="{{$quizz->id}}">
                                <select class="form-group form-control js-example-basic-single" name="batch">
                                    @php 
                                        $date=date('Y-m-d'); 
                                    @endphp
                                    @foreach($quizz->subject->courses as $course)
                                        @foreach($course->batches as $batch)
                                        @if($batch->enddate >= $date)
                                            <option value="{{$batch->id}}">{{$batch->title}}</option>
                                        @endif
                                        @endforeach
                                   @endforeach
                                </select>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

@endsection





@section('script')
    <script type="text/javascript">
        $(document).ready(function(){

            $(window).scroll(function() {    
                var scroll = $(window).scrollTop();    
                if (scroll > 0) {
                    $(".scroll_card").css("margin-top","-150px");
                    $(".scroll_card").css("transition","1");
                    

                }else{
                    $(".scroll_card").css("margin-top","0px");
                }
            });

            $('.js-example-basic-single').select2({
                theme: 'bootstrap4',

            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function showValidationErrors(name, error) {
                var group = $("#form-group-" + name);
                group.addClass('has-error');
                group.find('.show-error').text(error);
            }

            function clearValidationError(name) {
                console.log(name);
                var group = $("#form-group-" + name);
                group.removeClass('has-error');
                group.find('.show-error').text('');
            }

            $("#installment_date").on('change', function () {
                clearValidationError($(this).attr('id').replace('#', ''))
            });

            $('.assign_batch').click(function(){
                $('#assign_modal').modal('show');
            })

            $('#assign_batch_quizz').submit(function(event){
                event.preventDefault();
                var assign_data = new FormData(this);

                $.ajax({
                    url:"{{route('assign_batchquizz')}}",
                    data:assign_data,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(data){
                        if(data){
                            $('#assign_modal').modal('hide');
                            location.reload();
                        }
                    },
                    error: function(error) {
                        if(error.status == 422){
                            var errors = error.responseJSON;
                            var data = errors.errors;
                
                            $.each(data,function(i,v){
                                showValidationErrors(i,v);
                            })
                            $('#assign_modal').modal('show');
                        }
              
                    }
                })
            })
        })
    </script>
@endsection