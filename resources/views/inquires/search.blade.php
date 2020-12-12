@extends('backendtemplate')
@section('content')

    <h1 class="h3 mb-4 text-gray-800"> Search Inquire  </h1>



    <form method="get" action="{{route('searchinquires')}}">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputCourse">Choose Course:</label>
                <select name="course" class="form-control" id="course">
                    <option> Choose Course </option>
                    @role('Admin|Teacher|Business Development|Recruitment')
                    @foreach($courses as $row)
                        <option value="{{$row->id}}">{{$row->name}} </option>
                    @endforeach
                    @endrole
                    @role('Mentor')
                    <option value="{{$courses->id}}">{{$courses->name}}</option>
                    @endrole
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="inputCourse">Choose Batch:</label>
                <select name="batch" class="form-control" disabled="disabled" id="batch">
                    <option> Choose Batch </option>
                    {{-- @foreach($batches as $row)
                        <option value="{{$row->id}}">{{$row->title}}</option>
                    @endforeach --}}
                </select>
            </div>

            <div class="form-group col-md-2 mt-2">
                <button type="submit" class="btn btn-primary mt-4">Search</button>
            </div>
      
        </div>
    </form>

    @isset($inquires)
    <div class="card">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">
                {{ $batch->course->name }} 
                ( {{ $batch->title }} )
            </h5>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped display" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th> Name </th>
                            <th>Phone</th>
                            <th>Education</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1; @endphp
                        @foreach($inquires as $key=> $inquire)

                        @php
                            $fees = $batch->course->fees;

                            $payments = $inquire->installments;

                            $payment_amount = $payments->groupBy('inquire_id')->map(function ($row) {
                                return $row->sum('amount');
                            })->first();

                            $balance = 0;

                            if ($inquire->message != NULL) {
                                $status = "<p class='mmfont'> ".$inquire->message." </p>";

                                $tr_color = "bg-danger text-white";
                            }
                            else{

                                if ($payment_amount == $fees) {
                                    $status = "<p class='mmfont text-success'> ငွေအကျေပေးသွင်းပြီးပါပြီ  </p>";
                                }

                                else if ($payment_amount == NULL ) {
                                    $status = "<p class='mmfont text-dark'> ငွေမသွင်းရသေးပါ။  </p>";

                                    
                                }

                                else{
                                    
                                    $balance += (int)$fees - (int)$payment_amount;

                                    $pretty_balance =number_format($balance);

                                    $status = "<p class='mmfont text-danger'> <b> $pretty_balance  </b> - ငွေပေးသွင်းရန် ကျန်ပါသည်။  </p>";
                                }
                            }

                        @endphp

                            <tr @if($inquire->message) class="bg-danger text-white" @endif>
                                <td>{{$i++}}</td>
                                <td>
                                    {{$inquire->inquireno}}

                                </td>
                                <td>{{$inquire->name}}</td>
                                <td>{{$inquire->phone}}</td>
                                <td>{{$inquire->education->name}}</td>


                                <td> 
                                    {!! $status !!} 
                                    @if($inquire->receiveno)
                                        <small class="d-block"> Receiveno - {{ $inquire->receiveno }} </small>
                                    @endif
                                </td>
                                <td>

                                    <div class="btn-group">
                                        <a href="#" class="btn btn-secondary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-cog"></i>
                                        </a>
                                        <div class="dropdown-menu">

                                            <a href="javascript:void(0)" class="dropdown-item inquire_detail" data-name="{{$inquire->name}}" data-inquireno="{{$inquire->inquireno}}" data-receiveno="{{$inquire->receiveno}}" data-gender="{{$inquire->gender}}"  data-phone="{{$inquire->phone}}" data-installmentdate="{{$inquire->installmentdate}}" data-installmentamount="{{$inquire->installmentamount}}" data-knowledge="{{$inquire->knowledge}}" data-camp="{{$inquire->camp}}" data-education="{{$inquire->education->name}}" data-acceptedyear="{{$inquire->acceptedyear}}" data-batch="{{$inquire->batch->title}}" data-message="{{$inquire->message}}">
                                                <i class="fas fa-info mr-2"></i>
                                                Detail
                                            </a>
                                            @if($payment_amount != NULL)
                                            <a class="dropdown-item payment_history" href="javascript:void(0)" data-id="{{$inquire->id}}" data-name="{{$inquire->name}}" > 
                                                <i class="icofont-history mr-2"></i> Payment History 
                                            </a>
                                            @endif
                                            
                                            @if($inquire->message == NULL)
                                                @if ($payment_amount != $fees || $payment_amount  == NULL)
                                                    <a class="dropdown-item edit_install" href="#" data-id="{{$inquire->id}}" data-balance="{{ $balance }}"> 
                                                        <i class="icofont-money mr-2"></i> Add Payment
                                                    </a>
                                                @endif
                                                

                                                @if ($payment_amount  != NULL)
                                                    <a class="dropdown-item" href="{{asset('receive_print/'.$inquire->id)}}" > 
                                                        <i class="icofont-printer mr-2"></i> Print 
                                                    </a>
                                                @endif

                                            @endif

                                            @if($inquire->message == NULL)

                                                <div class="dropdown-divider"></div>

                                                
                                                <a href="javascript:void(0)" class="dropdown-item postpone" data-id="{{$inquire->id}}">
                                                    <i class="icofont-sign-out mr-2"></i> Postpone
                                                </a>

                                                <form method="post" action="{{route('inquires.destroy',$inquire->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item"><i class="icofont-ui-close mr-2"></i> Remove </button>
                                                </form>

                                            @endif

                                            
                                        </div>
                                    </div>
                                    
                                    
                                  
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    @endif
    @include('inquires/modalbox')


    

@endsection

