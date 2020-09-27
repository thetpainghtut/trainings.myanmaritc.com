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
                <div class="col-12">
                    <h2> Your Answer </h2>
                    <hr>
                </div>
                <div class="col-12 shadow p-5 mb-5 bg-white rounded mb-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-block mb-5">
                                    <h2 class="mb-4">1. What does CSS stand for?</h2>
                                    
                                    <p class="p-3 my-2 bg-light"> Creative Style Sheets </p>
                                    <p class="p-3 my-2 correct_answer"> 
                                        Cascading Style Sheets
                                        <i class="icofont-ui-check float-right answer_icon"></i>
                                    </p>
                                    <p class="p-3 my-2 bg-light"> Computer Style Sheets </p>
                                </div>


                                <div class="d-block mb-5">
                                    <h2 class="mb-4"> 2. Where is the correct place to insert a JavaScript? </h2>
                                    
                                    <p class="p-3 my-2 checkcorrect_answer"> Both the 'head' section and the 'body' section are correct 
                                        <i class="icofont-ui-check float-right answer_icon"></i>
                                    </p>
                                    <p class="p-3 my-2 wrong_answer"> 
                                        The 'head' section
                                        <i class="icofont-ui-close float-right"></i>
                                    </p>
                                    <p class="p-3 my-2 bg-light"> The 'body' section </p>
                                </div>

                                <div class="d-block mb-5">
                                    <h2 class="mb-4"> 3. Which HTML attribute is used to define inline styles? </h2>
                                    
                                    
                                    <p class="p-3 my-2 correct_answer"> 
                                        Style
                                        <i class="icofont-ui-check float-right answer_icon"></i>
                                    </p>
                                    <p class="p-3 my-2 bg-light"> Class </p>
                                    <p class="p-3 my-2 bg-light"> Styles </p>
                                </div>

                                <div class="d-block mb-5">
                                    <h2 class="mb-4"> 4. Which sign does jQuery use as a shortcut for jQuery? </h2>
                                    
                                    
                                    
                                    <p class="p-3 my-2 bg-light"> The ? sign </p>
                                    <p class="p-3 my-2 bg-light"> The % sign </p>

                                    <p class="p-3 my-2 correct_answer"> 
                                        The $ sign
                                        <i class="icofont-ui-check float-right answer_icon"></i>
                                    </p>

                                </div>


                                <div class="d-block mb-5">
                                    <h2 class="mb-4"> 5. How do you create a function in JavaScript? </h2>
                                    
                                    <p class="p-3 my-2 checkcorrect_answer"> function = myFunction() 
                                        <i class="icofont-ui-check float-right answer_icon"></i>
                                    </p>
                                    <p class="p-3 my-2 wrong_answer"> 
                                        function myFunction()
                                        <i class="icofont-ui-close float-right"></i>
                                    </p>
                                    <p class="p-3 my-2 bg-light"> function:myFunction() </p>
                                </div>
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

        });

    </script>
@endsection