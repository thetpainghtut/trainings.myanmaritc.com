@extends('backendtemplate')

@section('content')
    <div class="row">
        <div class="col-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('inquires.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Inquire</li>
                </ol>
            </nav>
        </div>
        <div class="col-2">
             <form method="GET" action="{{route('inquires.create')}}" class="d-inline-block float-right">
                 
                   <input type="hidden" name="batch_id" value="{{$batch->id}}">
                    <button class="btn btn-outline-primary btn-sm"> <i class="fas fa-plus mr-2"></i>Add New </button>
               </form>
        </div>
    </div> 
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> {{ $batch->title}}
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
                        @foreach($no_payment_inquires as $key=> $no_payment)

                        @php
                            $fees = $batch->course->fees;

                            $payments = $no_payment->installments;

                            $payment_amount = $payments->groupBy('inquire_id')->map(function ($row) {
                                return $row->sum('amount');
                            })->first();

                            $balance = 0;


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

                        @endphp

                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                    {{$no_payment->inquireno}}

                                </td>
                                <td>{{$no_payment->name}}</td>
                                <td>{{$no_payment->phone}}</td>
                                <td>{{$no_payment->education->name}}</td>


                                <td> 
                                    {!! $status !!} 
                                    @if($no_payment->receiveno)
                                        <small class="d-block"> Receiveno - {{ $no_payment->receiveno }} </small>
                                    @endif
                                </td>
                                <td>

                                    <div class="btn-group">
                                        <a href="#" class="btn btn-secondary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-cog"></i>
                                        </a>
                                        <div class="dropdown-menu">

                                            <a href="javascript:void(0)" class="dropdown-item inquire_detail" data-name="{{$no_payment->name}}" data-inquireno="{{$no_payment->inquireno}}" data-receiveno="{{$no_payment->receiveno}}" data-gender="{{$no_payment->gender}}"  data-phone="{{$no_payment->phone}}" data-installmentdate="{{$no_payment->installmentdate}}" data-installmentamount="{{$no_payment->installmentamount}}" data-knowledge="{{$no_payment->knowledge}}" data-camp="{{$no_payment->camp}}" data-education="{{$no_payment->education->name}}" data-acceptedyear="{{$no_payment->acceptedyear}}" data-batch="{{$no_payment->batch->title}}" data-message="{{$no_payment->message}}">
                                                <i class="fas fa-info mr-2"></i>
                                                Detail
                                            </a>
                                            @if($payment_amount != NULL)
                                            <a class="dropdown-item payment_history" href="javascript:void(0)" data-id="{{$no_payment->id}}" data-name="{{$no_payment->name}}" > 
                                                <i class="icofont-history mr-2"></i> Payment History 
                                            </a>
                                            @endif
                                            
                                            @if ($payment_amount != $fees || $payment_amount  == NULL)
                                                <a class="dropdown-item edit_install" href="#" data-id="{{$no_payment->id}}" data-balance="{{ $balance }}"> 
                                                    <i class="icofont-money mr-2"></i> Add Payment
                                                </a>
                                            @endif

                                            @if ($payment_amount  != NULL)
                                                <a class="dropdown-item" href="{{asset('receive_print/'.$no_payment->id)}}" > 
                                                    <i class="icofont-printer mr-2"></i> Print 
                                                </a>
                                            @endif


                                            <div class="dropdown-divider"></div>

                                            
                                            <a href="javascript:void(0)" class="dropdown-item postpone" data-id="{{$no_payment->id}}">
                                                <i class="icofont-sign-out mr-2"></i> Postpone
                                            </a>

                                            <form method="post" action="{{route('inquires.destroy',$no_payment->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i class="icofont-ui-close mr-2"></i> Remove </button>
                                            </form>

                                            
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

  



    @include('inquires/modalbox')

@endsection

