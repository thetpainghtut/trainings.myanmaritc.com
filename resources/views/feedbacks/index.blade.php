@extends('backendtemplate')
@section('content')
    
    <h1 class="h3 mb-4 text-gray-800"> Feedbacks </h1>
   
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> All Feedbacks 
               
            </h5>
        </div>
        <div class="card-body">

            <form method="get" action="{{route('feedbacks.index')}}">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCourse">Choose Course:</label>
                        <select name="course" class="form-control" id="course">
                            <option> Choose Course </option>
                            @foreach($courses as $row)
                                <option value="{{$row->id}}">{{$row->name}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="inputCourse">Choose Batch:</label>
                        <select name="batch" class="form-control" disabled="disabled" id="batch">
                            <option> Choose Batch </option>
                           
                        </select>
                    </div>

                    <div class="form-group col-md-2 mt-2">
                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                    </div>

                </div>
            </form>
            @isset($batch)
            @if(count($feedbacks)>0)

                <div class="accordion border-bottom" id="accordionExample">
                    <div class="card mb-0 border-primary">
                    
                        <div class="card-header collapsed bg-primary" data-toggle="collapse" data-parent="#accordionExample" href="#collapseOne">
                            <a class="card-title text-white">
                                သင်ကြားမှု ကာလအတွင်း ဘာအခက်အခဲတွေရှိခဲ့လဲ
                            </a>
                        </div>
                        <div id="collapseOne" class="card-body collapse show" data-parent="#accordionExample">
                            <ul class="list-group">
                            @foreach($feedbacks as $feed)
                              <li class="list-group-item">{{$feed->trouble}}</li>
                            @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card mb-0 border-primary">
                    
                        <div class="card-header collapsed bg-primary" data-toggle="collapse" data-parent="#accordionExample" href="#collapseTwo">
                            <a class="card-title text-white">
                                သင်တန်း ကနေ ကိုယ့်ကိုယ်ကို ဘာတွေအကျိုးရှိသွားတယ် ထင်မိလဲ 
                            </a>
                        </div>
                        <div id="collapseTwo" class="card-body collapse" data-parent="#accordionExample">
                            <ul class="list-group">
                            @foreach($feedbacks as $feed)
                              <li class="list-group-item">{{$feed->benefit}}</li>
                            @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card mb-0 border-primary">
                    
                        <div class="card-header collapsed bg-primary" data-toggle="collapse" data-parent="#accordionExample" href="#collapseThree">
                            <a class="card-title text-white">
                                ဆရာ ဆရာမ တွေနဲ့သင်ရတာအဆင်ပြေရဲ့လား။ အပြည့်အစုံပြောပြပေးပါ။ 
                            </a>
                        </div>
                        <div id="collapseThree" class="card-body collapse" data-parent="#accordionExample">
                            <ul class="list-group">
                            @foreach($feedbacks as $feed)
                              <li class="list-group-item">{{$feed->teaching}}</li>
                            @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card mb-0 border-primary">
                    
                        <div class="card-header collapsed bg-primary" data-toggle="collapse" data-parent="#accordionExample" href="#collapseFour">
                            <a class="card-title text-white">
                                Mentor တွေနဲ့ အဆင်ပြေရဲ့လား။ အပြည့်အစုံပြောပြပေးပါ။
                            </a>
                        </div>
                        <div id="collapseFour" class="card-body collapse" data-parent="#accordionExample">
                            <ul class="list-group">
                            @foreach($feedbacks as $feed)
                              <li class="list-group-item">{{$feed->mentoring}}</li>
                            @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card mb-0 border-primary">
                    
                        <div class="card-header collapsed bg-primary" data-toggle="collapse" data-parent="#accordionExample" href="#collapseFive">
                            <a class="card-title text-white">
                               သင်တန်း မှာအကြိုက်ဆုံးကဏ္ဍက ဘာဖြစ်မလဲ။
                            </a>
                        </div>
                        <div id="collapseFive" class="card-body collapse" data-parent="#accordionExample">
                            <ul class="list-group">
                            @foreach($feedbacks as $feed)
                              <li class="list-group-item">{{$feed->favourite}}</li>
                            @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card mb-0 border-primary">
                    
                        <div class="card-header collapsed bg-primary" data-toggle="collapse" data-parent="#accordionExample" href="#collapseSix">
                            <a class="card-title text-white">
                                Lecture Speed 
                            </a>
                        </div>
                        <div id="collapseSix" class="card-body collapse" data-parent="#accordionExample">
                            <ul class="list-group">
                            @foreach($feedbacks as $feed)
                              <li class="list-group-item">{{$feed->speed}}</li>
                            @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card mb-0 border-primary">
                    
                        <div class="card-header collapsed bg-primary" data-toggle="collapse" data-parent="#accordionExample" href="#collapseSeven">
                            <a class="card-title text-white">
                               မိမိအနေဖြင့် သင်တန်းကာလအတွင်းမှာ ဘယ် ကဏ္ဍလေးတွေကို ပြုပြင် စေချင်သလဲ  
                            </a>
                        </div>
                        <div id="collapseSeven" class="card-body collapse" data-parent="#accordionExample">
                            <ul class="list-group">
                            @foreach($feedbacks as $feed)
                              <li class="list-group-item">{{$feed->maintain}}</li>
                            @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card mb-0 border-primary">
                    
                        <div class="card-header collapsed bg-primary" data-toggle="collapse" data-parent="#accordionExample" href="#collapseEight">
                            <a class="card-title text-white">
                                မိမိရဲ့ လက်ဆွဲဆောင်ပုဒ်
                            </a>
                        </div>
                        <div id="collapseEight" class="card-body collapse" data-parent="#accordionExample">
                            <ul class="list-group">
                            @foreach($feedbacks as $feed)
                              <li class="list-group-item">{{$feed->quote}}</li>
                            @endforeach
                            </ul>
                        </div>
                    </div>

                     <div class="card mb-0 border-primary">
                    
                        <div class="card-header collapsed bg-primary" data-toggle="collapse" data-parent="#accordionExample" href="#collapseNine">
                            <a class="card-title text-white">
                                အပိတ်အနေနဲ့ ကိုယ့်သူငယ်ချင်းတွေကို လာတတ်ဖို့ ဘယ်လို recommend ပေးချင်သလဲ
                            </a>
                        </div>
                        <div id="collapseNine" class="card-body collapse" data-parent="#accordionExample">
                            <ul class="list-group">
                            @foreach($feedbacks as $feed)
                              <li class="list-group-item">{{$feed->recommend}}</li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            @endif
            @endif
        </div>
    </div>
    
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

  
@endsection









