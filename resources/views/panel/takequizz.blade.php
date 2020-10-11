@extends('template')
@section('content')

	<!-- Header -->
    <header class="py-5 mb-5 header_img">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-white">
                    <h1 class="display-4 mt-5 mb-2 quiz_id" style="color: " data-quiz_id = '{{$quiz->id}}'> {{$quiz->title}} </h1>
                </div>
            </div>
        </div>
    </header>
    <!-- Header -->

    <!-- Page Content -->
    <div id="page-content">
        <div class="container my-2">
            <div class="row">
                <div class="col-12 shadow p-5 mb-5 bg-white rounded mb-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-12" id="quizDiv">
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($questions as $question)

                                <div class="question-{{$i}} questions" data-question = "question-{{$i}}" data-i = {{$i}}>
                                    @if($question->photo)
                                    <div class="mb-3">
                                        <img src="{{$question->photo}}" width="500px" class="d-block">
                                    </div>
                                    @endif
                                    <h2 class="mb-4 d-inline-block">{{$i}} . {{$question->questiontext}}
                                    </h2>
                                    
                                    @if($question->type == "checkbox") 
                                    @php
                                        $input_type = 'checkbox';
                                    @endphp

                                    @else 
                                        @php
                                            $input_type = 'radio';
                                        @endphp

                                    @endif
                                   
                                    @foreach($question->checks as $answer)
                                    <label class="q{{$i}}Container qContainer">
                                        {{$answer->answer}}

                                    <input type="{{$input_type}}"  name="question{{$i}}" value="{{$answer->rightanswer}}" class="quizinput" data-quiz_id = '{{$quiz->id}}' data-question_id='{{$question->id}}' data-answer_id = '{{$answer->id}}'>

                                    <span class="checkmark"></span>
                                    </label>
                                    @endforeach

                                    <button  class="float-right btn btn-primary question{{$i}}next" data-question_next = 'question{{$i}}next'>Next ></button>
                                </div>
                                @php
                                    $i++;
                                @endphp
                                @endforeach
                                
                                
                            </div>

                            <div class="col-12" id="finalResult">
                                <h2> Result Summary </h2>
                                <hr>
                                <canvas id="oilChart" class="mx-auto d-block"></canvas>

                                <a href="{{route('frontend.quizanswer',$quiz->id) }}" class="btn btn-outline-primary mx-auto"> View Answers </a>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- /.container -->

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){

             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#quizDiv').show();
            $('#finalResult').hide();
            var quiz_id = $('.quiz_id').data('quiz_id');
            show();
            click_btn();
            function show(i,j){
                
                var question='';
                var quesiton_next='';
                var rightanswer='';
                if(i > 1 && j > 1){
                    i = i;
                    j = j;
                }else{
                    i = 1;
                    j = 1;
                }
                
                question += $('.question-'+i).data('question');
                quesiton_next += $('.question'+i+'next').data('question_next');
                rightanswer += '.q'+i+'Container';
                // console.log(rightanswer);
                if(question == 'undefined')
                {
                    result();
                }
            
            var array = question.split('-');
            var num = array[1];
            var number = parseInt(num);
            var next = number+1;
            var nextpage = array[0]+'-'+next;
            click_btn(quesiton_next,rightanswer,question,nextpage,i,j)
            }
            // console.log(question);
            // console.log(quesiton_next);

            var barWidth = 0;
            var score = 1;
            var count = 20;
             // Question 1 ---- 
             function click_btn(quesiton_next,rightanswer,question,nextpage,i,j) {
            $('.'+quesiton_next).on('click', () =>{
                    var answer = new Array();
                    var question_id = new Array();
                    var answer_id = new Array();
                    $(rightanswer+' input:checked').each(function(){
                        answer.push($(this).val())
                        
                      });

                    $(rightanswer+' input:checked').each(function(){
                        
                        answer_id.push($(this).data('answer_id'));
                    });

                    $(rightanswer+' input:checked').each(function(){
                        
                        question_id.push($(this).data('question_id'));
                    });
                    
                    console.log(answer_id);
                    
                    var localstorage = localStorage.getItem('quiz');

                    if(!localstorage) {
                        localstoragearray = new Array();
                    }else{
                        localstoragearray = JSON.parse(localstorage);
                    }
                    
                    var quiz;
                    for (var a = 0; a < answer.length; a++) {
                        quiz = {

                            question : question_id[a],
                            answer : answer_id[a],
                        }
                    localstoragearray.push(quiz);
                    localStorage.setItem('quiz', JSON.stringify(localstoragearray));
                    console.log(quiz);

                    }
                    
                    

                    
                    
                    $('.'+question).hide();
                    $('.'+nextpage).show();
                    i+=1;
                    j+=1;
                    show(i,j);
                    
                    for (var q = 0; q < answer.length; q++) {
                       if(answer[q] === "true") {
                        
                        score++; 
                        }
                    }
                    
                    
                });
            }

            function result(){
                $('#quizDiv').hide();
                $('#finalResult').show();
                var localstorage = localStorage.getItem('quiz');
                if(localstorage){
                    data = JSON.parse(localstorage);
               
                // console.log(localstorage);
                // console.log(score);
                

                var questiontotal = data.length;
                // console.log(questiontotal);
                var correct = score;
                // console.log(correct);
                var incorrect = questiontotal - correct;

                var oilCanvas = document.getElementById("oilChart");
                oilCanvas.height = 300;

                Chart.defaults.global.defaultFontFamily = "Lato";
                Chart.defaults.global.defaultFontSize = 18;


                var oilData = {
                    labels: [
                        "Incorrect",
                        "Correct",
                    ],
                    datasets: [
                        {
                            data: [incorrect, correct],
                            backgroundColor: [
                                "#FF6384",
                                "#63FF84"
                            ]
                        }]
                };

                var pieChart = new Chart(oilCanvas, {
                    type: 'pie',
                    data: oilData,
                    options: {
                        responsive: false,
                    }
                });

                // store data in database
                $.post('/storeanswer',{data:data,quiz_id:quiz_id,score:score},function(res){
                    console.log(res);
                    if(res){
                        localStorage.clear();
                    }
                })

                 }
            }
        });

    </script>
@endsection