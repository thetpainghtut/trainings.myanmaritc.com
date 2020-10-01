@extends('template')
@section('content')

	<!-- Header -->
    <header class="py-5 mb-5 header_img">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-white">
                    <h1 class="display-4 mt-5 mb-2"> PHP Quizzes </h1>
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
                                <div class="questionOne questions">
                                    <h2 class="mb-4">1. What does CSS stand for?</h2>
                                    <label class="qOneContainer qContainer">Creative Style Sheets
                                    <input type="radio" checked="checked" name="questionone" value="Creative Style Sheets" class="quizinput">
                                    <span class="checkmark"></span>
                                    </label>

                                    <label class="qOneContainer qContainer">Cascading Style Sheets
                                    <input type="radio" name="questionone" value="Cascading Style Sheets" class="quizinput"> 
                                    <span class="checkmark"></span>
                                    </label>

                                    <label class="qOneContainer qContainer">Computer Style Sheets
                                    <input type="radio" name="questionone" value="Computer Style Sheets" class="quizinput"> 
                                    <span class="checkmark"></span>
                                    </label>
                                    <button id="q2next" class="float-right">Next ></button>
                                </div>
                                
                                <div class="questionTwo questions">
                                    <h2 class="mb-4">2. Where is the correct place to insert a JavaScript?</h2>
                                    <label class="qTwoContainer qContainer">Both the 'head' section and the 'body' section are correct
                                    <input type="radio" checked="checked" name="questiontwo" value="Both the <head> section and the <body> section are correct" class="quizinput">
                                    <span class="checkmark"></span>
                                    </label>

                                    <label class="qTwoContainer qContainer">The 'head' section
                                    <input type="radio" name="questiontwo" value="The <\head\> section" class="quizinput"> 
                                    <span class="checkmark"></span>
                                    </label>

                                    <label class="qTwoContainer qContainer"> The 'body' section
                                    <input type="radio" name="questiontwo" value="The <body> section" class="quizinput"> 
                                    <span class="checkmark"></span>
                                    </label>
                                    <button id="q3next" class="float-right">Next ></button>
                                </div>
                                
                                <div class="questionThree questions">
                                    <h2 class="mb-4">3. Which HTML attribute is used to define inline styles?</h2>
                                    <label class="qThreeContainer qContainer"> class
                                    <input type="radio" checked="checked" name="questionthree" value="class" class="quizinput">
                                    <span class="checkmark"></span>
                                    </label>

                                    <label class="qThreeContainer qContainer">Styles
                                    <input type="radio" name="questionthree" value="Styles" class="quizinput"> 
                                    <span class="checkmark"></span>
                                    </label>

                                    <label class="qThreeContainer qContainer">Style
                                    <input type="radio" name="questionthree" value="Style" class="quizinput"> 
                                    <span class="checkmark"></span>
                                    </label>
                                    <button id="q4next" class="float-right">Next ></button>
                                </div>
                                
                                <div class="questionFour questions">
                                    <h2 class="mb-4">4. Which sign does jQuery use as a shortcut for jQuery?</h2>
                                    <label class="qFourContainer qContainer"> The ? Sign
                                    <input type="radio" checked="checked" name="questionfour" value="?" class="quizinput">
                                    <span class="checkmark"></span>
                                    </label>

                                    <label class="qFourContainer qContainer">The % sign
                                    <input type="radio" name="questionfour" value="%" class="quizinput"> 
                                    <span class="checkmark"></span>
                                    </label>

                                    <label class="qFourContainer qContainer">The $ sign
                                    <input type="radio" name="questionfour" value="$" class="quizinput"> 
                                    <span class="checkmark"></span>
                                    </label>
                                    <button id="q5next" class="float-right">Next ></button>
                                </div>
                                
                                <div class="questionFive questions">
                                    <h2 class="mb-4">5. How do you create a function in JavaScript?</h2>
                                    <label class="qFiveContainer qContainer">function myFunction()
                                    <input type="radio" checked="checked" name="questionfive" value="function myFunction()" class="quizinput" >
                                    <span class="checkmark"></span>
                                    </label>

                                    <label class="qFiveContainer qContainer">function = myFunction()
                                    <input type="radio" name="questionfive" value="function = myFunction()" class="quizinput"> 
                                    <span class="checkmark"></span>
                                    </label>

                                    <label class="qFiveContainer qContainer">function:myFunction()
                                    <input type="radio" name="questionfive" value="function:myFunction()" class="quizinput"> 
                                    <span class="checkmark"></span>
                                    </label>
                                    <button id="end" class="float-right">Submit</button>
                                </div>
                            </div>

                            <div class="col-12" id="finalResult">
                                <h2> Result Summary </h2>
                                <hr>
                                <canvas id="oilChart" class="mx-auto d-block"></canvas>

                                <a href="{{ route('frontend.quizanswer') }}" class="btn btn-outline-primary mx-auto"> View Answers </a>

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

            $('#quizDiv').show();
            $('#finalResult').hide();

            let barWidth = 0;
            let score = 0;
            let count = 20;
             // Question 1 ----  
            $('#q2next').on('click', () =>{
                let answer1 = $('.qOneContainer input:checked').val();
                $('.questionOne').hide();
                $('.questionTwo').show();
                if(answer1 === "Cascading Style Sheets") {
                    score++; 
                }
                    //call progress function ---
                    // progress(); 
            });

            // Question 2 -----
            $('#q3next').on('click', () =>{
                let answer2 = $('.qTwoContainer input:checked').val();
                $('.questionTwo').hide();
                $('.questionThree').show();
                if(answer2 === "Both the <head> section and the <body> section are correct") {
                    score++;        
                }
                // progress();
            });

            // Question 3 ----
            $('#q4next').on('click', ()=>{
                let answer3 = $('.qThreeContainer input:checked').val();
                $('.questionThree').hide();
                $('.questionFour').show();
                if(answer3 === "Style") {
                    score++;        
                }
                // progress();
            });

            // Question 4 ----
            $('#q5next').on('click', ()=>{
                let answer4 = $('.qFourContainer input:checked').val();
                $('.questionFour').hide();
                $('.questionFive').show();
                if(answer4 === "$") {
                    score++;        
                }
                // progress();
                

            });

            // Question 5 ----
            $('#end').on('click', ()=>{
                let answer5 = $('.qFiveContainer input:checked').val();
                $('.questionFive').hide();
                $('.results').show();
                if(answer5 === "function myFunction()") {
                    score++;        
                }
                // progress();
                console.log(score);

                result();
            });

            function result(){

                $('#quizDiv').hide();
                $('#finalResult').show();

                var questiontotal = 5;

                var correct = score;
                console.log(correct);
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
            }
        });

    </script>
@endsection