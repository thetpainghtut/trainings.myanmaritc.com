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

            <nav class="mb-4">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Inquire</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Fisrt installment</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#full-install" role="tab" aria-controls="nav-profile" aria-selected="false">Full installment</a>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped display" width="100%" cellspacing="0">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Inquire No</th>
                                    <th>Education</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach($no_payment_inquires as $no_payment)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$no_payment->name}}</td>
                                        <td>{{$no_payment->phone}}</td>
                                        <td>{{$no_payment->inquireno}}</td>
                                        <td>{{$no_payment->education->name}}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary inquire_detail btn-sm" data-name="{{$no_payment->name}}" data-inquireno="{{$no_payment->inquireno}}" data-receiveno="{{$no_payment->receiveno}}" data-gender="{{$no_payment->gender}}"  data-phone="{{$no_payment->phone}}" data-installmentdate="{{$no_payment->installmentdate}}" data-installmentamount="{{$no_payment->installmentamount}}" data-knowledge="{{$no_payment->knowledge}}" data-camp="{{$no_payment->camp}}" data-education="{{$no_payment->education->name}}" data-acceptedyear="{{$no_payment->acceptedyear}}" data-batch="{{$no_payment->batch->title}}" data-message="{{$no_payment->message}}"><i class="fas fa-info"></i>
                                            </a>

                                            <div class="btn-group">
                                                <a href="#" class="btn btn-secondary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cog"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    @if($no_payment->status == 0)
                                                        <a class="dropdown-item edit_install" href="#" data-id="{{$no_payment->id}}">First Installment</a>
                                                    @endif
                                                  
                                                    @if($no_payment->status == 1 || $no_payment->status == 0)
                                                        <a class="dropdown-item full_install" href="#" data-id="{{$no_payment->id}}" data-fees="{{$no_payment->batch->course->fees}}" data-amount="{{$no_payment->installmentamount}}" data-batchid="{{$no_payment->batch_id}}">Print</a>
                                                    @endif
                                                    <a href="#" class="dropdown-item postpone" data-id="{{$no_payment->id}}">Postpone</a>
                                                </div>
                                            </div>
                                            
                                            <form method="post" action="{{route('inquires.destroy',$no_payment->id)}}" class="d-inline-block btn-sm">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger "><i class="fas fa-trash"></i></button>
                                            </form>
                                          
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped display" width="100%" cellspacing="0">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Inquire No</th>
                                    <th>Education</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach($first_payment_inquires as $first_payment)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$first_payment->name}}</td>
                                    <td>{{$first_payment->phone}}</td>
                                    <td>{{$first_payment->inquireno}}</td>
                                    <td>{{$first_payment->education->name}}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary inquire_detail btn-sm" data-name="{{$first_payment->name}}" data-inquireno="{{$first_payment->inquireno}}" data-receiveno="{{$first_payment->receiveno}}" data-gender="{{$first_payment->gender}}"  data-phone="{{$first_payment->phone}}" data-installmentdate="{{$first_payment->installmentdate}}" data-installmentamount="{{$first_payment->installmentamount}}" data-knowledge="{{$first_payment->knowledge}}" data-camp="{{$first_payment->camp}}" data-education="{{$first_payment->education->name}}" data-acceptedyear="{{$first_payment->acceptedyear}}" data-batch="{{$first_payment->batch->title}}" data-message="{{$first_payment->message}}"><i class="fas fa-info"></i>
                                        </a>

                                        <div class="btn-group">
                                            <a href="#" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-cog"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                            
                                                @if($first_payment->status == 1 || $first_payment->status == 0)
                                                    <a class="dropdown-item full_install" href="#" data-id="{{$first_payment->id}}" data-fees="{{$first_payment->batch->course->fees}}" data-amount="{{$first_payment->installmentamount}}" data-batchid="{{$first_payment->batch_id}}">Print</a>
                                            
                                                @endif
                                                 <a href="#" class="dropdown-item postpone" data-id="{{$first_payment->id}}">Postpone</a>
                                            </div>
                                        </div>
                                        <form method="post" action="{{route('inquires.destroy',$first_payment->id)}}" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger "><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="full-install" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped display" width="100%" cellspacing="0">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Inquire No</th>
                                    <th>Education</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach($full_payment_inquires as $full_payment)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$full_payment->name}}</td>
                                    <td>{{$full_payment->phone}}</td>
                                    <td>{{$full_payment->inquireno}}</td>
                                    <td>{{$full_payment->education->name}}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary inquire_detail btn-sm" data-name="{{$full_payment->name}}" data-inquireno="{{$full_payment->inquireno}}" data-receiveno="{{$full_payment->receiveno}}" data-gender="{{$full_payment->gender}}"  data-phone="{{$full_payment->phone}}" data-installmentdate="{{$full_payment->installmentdate}}" data-installmentamount="{{$full_payment->installmentamount}}" data-knowledge="{{$full_payment->knowledge}}" data-camp="{{$full_payment->camp}}" data-education="{{$full_payment->education->name}}" data-acceptedyear="{{$full_payment->acceptedyear}}" data-batch="{{$full_payment->batch->title}}" data-message="{{$full_payment->message}}"><i class="fas fa-info"></i>
                                        </a>

                                        <div class="btn-group">
                                            <a href="#" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-cog"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item postpone" data-id="{{$full_payment->id}}">Postpone</a>
                                            </div>
                                        </div>
                                     
                                        <form method="post" action="{{route('inquires.destroy',$full_payment->id)}}" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger "><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('inquires/modalbox')

@endsection

