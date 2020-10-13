@extends('backendtemplate')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card shadow">
			<div class="card-header">
				<h3 class="font-weight-bold text-gray-800"> 
				    {{$response->quiz->title}}
				</h3> 
			</div>
			<div class="card-body text-dark">
				@php
                    $i=1;
                @endphp
                @foreach($response->quiz->questions as $question)
                <div class="d-block mb-5">
                    <h2 class="mb-4">{{$i}}. {{$question->questiontext}}</h2>
                    @foreach($question->checks as $answer)
                    <p class="p-3 my-2  
                    @php
	                    $array = array();
	                    $error = array();
	                @endphp
	                   
	                    @if($response->student_id)
	                        @foreach($response->responsedetail as $detail)
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
	                   
	                    @if($response->student_id)
	                        @foreach($response->responsedetail as $detail)
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

@endsection