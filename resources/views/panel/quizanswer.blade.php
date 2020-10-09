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
                    <h2> Your Answer </h2>
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
                                    @if($answer->rightanswer == 'true') 
                                        @foreach($responsedetail as $detail)
                                        
                                            @if($answer->id === $detail->check_id)
                                                correct_answer
                                                text-light
                                            @endif
                                        
                                        @endforeach
                                    @if($responses->student_id !== Auth::user()->student->id)
                                        @if($answer->id !== $answer->responsedetail->check_id)
                                        wrong_answer
                                        @endif
                                    @else
                                    @endif
                                    @endif
                                    ">
                                    {{$answer->answer}}
                                              
                                      @if($answer->rightanswer == 'true') 
                                        {{-- @foreach($responsedetail as $detail) --}}
                                            {{-- @if($answer->id === $detail->check_id) --}}
                                            @if($responses->student_id == Auth::user()->student->id)
                                            @foreach($responses->responsedetail as $detail)
                                            @if($detail->check_id == $answer->id)
                                                {{$answer->answer}} {{$answer->id}}
                                                <i class="icofont-ui-check 
                                                float-right text-light"></i>
                                            @else
                                            
                                                
                                            @endif
                                            @endforeach
                                            @endif
                                            {{-- @endif --}}
                                        {{-- @endforeach --}}
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