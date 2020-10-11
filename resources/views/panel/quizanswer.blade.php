@extends('template')
@section('content')

	<!-- Header -->
    <header class="py-5 mb-5 header_img">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-white">
                    <h1 class="display-4 mt-5 mb-2"> {{$quiz->title}} </h1>
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
                    <h2 class="d-inline-block"> Your Answer </h2>
                    {{-- <a href="/channel/{{$channel}}" class="btn btn-outline-primary float-right ">Go Back</a> --}}
                    <hr>
                </div>
                <div class="col-12 shadow p-5 mb-5 bg-white rounded mb-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                @php
                                    $i=1;
                                @endphp
                                @foreach($questions as $question)
                                <div class="d-block mb-5">
                                    <h2 class="mb-4">{{$i}}. {{$question->questiontext}}</h2>
                                    @foreach($question->checks as $answer)
                                    <p class="p-3 my-2  
                                    @php
                                        $array = array();
                                        $error = array();
                                    @endphp
                                       
                                        
                                        @if($responses->student_id == Auth::user()->student->id)
                                            @foreach($responses->responsedetail as $detail)
                                            @if($answer->rightanswer == 'true' && $detail->check_id == $answer->id)
                                            
                                                @php
                                                    array_push($array, $answer->id);
                                                @endphp
                                            @elseif($answer->rightanswer == 'false' && $detail->check_id == $answer->id)
                                                @php
                                                    array_push($error, $answer->id);
                                                @endphp
                                            @endif
                                            @endforeach

                                            @if($array != null)
                                                correct_answer
                                            @elseif($answer->rightanswer == 'true')
                                                checkcorrect_answer
                                            @elseif($error != null)
                                                wrong_answer
                                            @endif
                                        

                                            
                                    @endif 
                                    ">
                                    {{$answer->answer}}
                                        @php
                                        $array = array();
                                        $error = array();
                                    @endphp
                                       
                                        
                                        @if($responses->student_id == Auth::user()->student->id)
                                            @foreach($responses->responsedetail as $detail)
                                            @if($answer->rightanswer == 'true' && $detail->check_id == $answer->id)
                                            
                                                @php
                                                    array_push($array, $answer->id);
                                                @endphp
                                            @elseif($answer->rightanswer == 'false' && $detail->check_id == $answer->id)
                                                @php
                                                    array_push($error, $answer->id);
                                                @endphp
                                            @endif
                                            @endforeach

                                            @if($array != null)
                                                <i class="icofont-ui-check float-right answer_icon"></i>
                                            @elseif($answer->rightanswer == 'true')
                                                <i class="icofont-ui-check float-right answer_icon"></i>
                                            @elseif($error != null)
                                                 <i class="icofont-ui-close float-right"></i>
                                            @endif
                                        

                                            
                                    @endif
                                    </p>
                                    @endforeach
                                    
                                </div>
                                @php
                                    $i++;
                                @endphp
                                @endforeach
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