@extends('backendtemplate')
@section('content')
    <h1 class="h3 mb-4 text-gray-800"> 
        Students 

        <a href="{{route('students.index')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-backward mr-2"></i> Go Back </a>

    </h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <h4 class="text-center">NEW STUDENT REGISTRATION FORM</h4>
            <form method="post" action="{{route('storestudent')}}" class="my-3" enctype="multipart/form-data">
                @csrf
                    <h5 class="my-3">Course Informations:</h5>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputReceiveno"> Receiver Number:</label>
                            <input type="text" name="receiveno" class="form-control" id="inputReceiveno" autofocus>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputCourse">Choose Batch:</label>
                            <select name="batch" class="form-control" id="batch">
                                @foreach($batches as $row)
                                    <option value="{{$row->id}}">{{$row->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <h5 class="my-3"><u>Student Informations:</u></h5>
                
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputNameEnglish">Student's Name: (English)</label>
                            <input type="text" class="form-control @error('namee') is-invalid @enderror" id="inputNameEnglish" placeholder="Mg Mg" name="namee" value="{{ old('namee') }}" required autocomplete="namee">
                            
                            @error('namee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                  
                        <div class="form-group col-md-6">
                            <label for="inputNameMyanmar">Student's Name: (Myanmar)</label>
                            <input type="text" class="form-control @error('namem') is-invalid @enderror mmfont" id="inputNameMyanmar" placeholder="မောင်မောင်" name="namem" value="{{ old('namem') }}" required autocomplete="namem">
                    
                            @error('namem')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Degree:</label>
                            <input type="text" class="form-control @error('degree') is-invalid @enderror " id="inputCity" name="degree" value="{{ old('degree') }}" required autocomplete="degree">
                            @error('degree')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                  
                        <div class="form-group col-md-4">
                            <label for="inputCity">City:</label>

                            <select class="form-control js-example-basic-single" name="city" id="courses">
                                <option>Choose Township</option>
                                @foreach($townships as $township)
                                    <option value="{{$township->id}}">{{$township->name}}</option>
                                @endforeach
                            </select>

                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                  
                        <div class="form-group col-md-2">
                            <label for="inputAcceptedYear">Accepted Year:</label>
                            <input type="text" class="form-control @error('accepted_year') is-invalid @enderror yearpicker" id="inputAcceptedYear" placeholder="2015" name="accepted_year" value="{{ old('accepted_year') }}" required autocomplete="accepted_year">
                            @error('accepted_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="inputAddress">Address:</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" id="inputAddress" placeholder="1234 Main St" name="address" value="{{ old('address') }}" required autocomplete="address"></textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail4" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                  
                        <div class="form-group col-md-6">
                            <label for="inputPhone">Phone:</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="inputPhone" placeholder="Phone" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputDOB">Date of Birth:</label>
                            <input type="date" class="form-control @error('dob') is-invalid @enderror" id="inputDOB" name="dob" value="{{ old('dob') }}" required autocomplete="dob">
                            @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                  
                        <div class="form-group col-md-6">
                            <label for="inputGender" class="d-block">Gender:</label>
                            
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" checked="checked">
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <label class="font-weight-bold col-md-12">Which Programming Language did you know? ( <span class="mmfont"> လက်ရှိကျွမ်းကျင်တဲ့ </span> programming language ) </label>

                        @foreach($subjects as $subject)
                            <div class="form-group col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck{{$subject->id}}" value="{{$subject->id}}" name="subjects[]">
                                    <label class="form-check-label d-inline" for="gridCheck{{$subject->id}}">
                                        {{$subject->name}}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <hr class="bg-dark">

                    <h5 class="my-3"><u>Household Parent / Guardian Information:</u></h5>
                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputParent1">Parent/Guardian #1:</label>
                            <input type="text" class="form-control @error('p1') is-invalid @enderror" placeholder="Name" id="inputParent1" name="p1" value="{{ old('p1') }}" required autocomplete="p1">
                            
                            @error('p1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="inputParent1Rs">Relationship of Student</label>
                            <input type="text" class="form-control @error('p1_rs') is-invalid @enderror" id="inputParent1Rs" placeholder="" name="p1_rs" value="{{ old('p1_rs') }}" required autocomplete="p1_rs">
                            
                            @error('p1_rs')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                  
                        <div class="form-group col-md-4">
                            <label for="inputParent1Phone">Phone:</label>
                            <input type="text" class="form-control @error('p1_phone') is-invalid @enderror" id="inputParent1Phone" placeholder="" name="p1_phone" value="{{ old('p1_phone') }}" required autocomplete="p1_phone">
                            
                            @error('p1_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputParent2">Parent/Guardian #2:</label>
                            <input type="text" class="form-control @error('p2') is-invalid @enderror" placeholder="Name" id="inputParent2" name="p2" value="{{ old('p2') }}" required autocomplete="p2">
                    
                            @error('p2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                  
                        <div class="form-group col-md-4">
                            <label for="inputParent2Rs">Relationship of Student</label>
                            <input type="text" class="form-control @error('p2_rs') is-invalid @enderror" id="inputParent2Rs" placeholder="" name="p2_rs" value="{{ old('p2_rs') }}" required autocomplete="p2_rs" >
                    
                            @error('p2_rs')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                  
                        <div class="form-group col-md-4">
                            <label for="inputParent2Phone">Phone:</label>
                            <input type="text" class="form-control @error('p2_phone') is-invalid @enderror" id="inputParent2Phone" placeholder="" name="p2_phone" value="{{ old('p2_phone') }}" required autocomplete="p2_phone">
                            @error('p2_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <hr class="bg-dark">

                
                    <div class="form-group">
                        <label for="inputInformation" class="font-weight-bold mmfont">သင်တန်းတွေအများကြီးထဲက Myanmar IT Consulting သင်တန်းကို ရွေးချယ်ရတဲ့ အကြောင်းအရင်းကို သိပါရစေ။</label>
                        <textarea class="form-control @error('because') is-invalid @enderror" id="inputInformation" placeholder="Please ...." name="because" value="{{ old('because') }}" required autocomplete="because"></textarea>
                        
                        @error('because')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <input type="hidden" name="bid" value="1">

                    <button type="submit" class="btn btn-primary btn-block">Save Register</button>
            </form>

        </div>

    </div>

@endsection

@section('script')
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>

    <script type="text/javascript">
        
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.js-example-basic-single').select2({
                theme: 'bootstrap4',

            });

            $('#inputReceiveno').keyup(function () {
                var inputReceiveno = $(this).val();
                $.ajax({
                    type:'POST',
                    url:'{{ route('getInquire')}}',
                    data:{
                        inputReceiveno:inputReceiveno
                    },
                    success: function(data){
                        var inquire = data.inquire;

                        var name = inquire.name;
                        var batchid = inquire.batch_id;
                        var acceptedyear = inquire.acceptedyear;
                        var gender = inquire.gender;
                        var phone = inquire.phone;

                        $('#inputNameEnglish').val(name);
                        $('#inputAcceptedYear').val(acceptedyear);
                        $('#inputPhone').val(phone);

                        // $("input[name='gender']:checked").val(gender);
                        $("input[value='" + gender + "']").prop('checked', true);
                        $("#batch").val(batchid);

                        // $('#exampleModal').modal('show');
                    },
                    error: function(request, status, error) {
                        console.log("error")
                    }

                });
            });
        });

    </script>

@endsection