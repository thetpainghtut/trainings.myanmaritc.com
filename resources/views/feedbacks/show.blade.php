@extends('backendtemplate')

@section('content')
    <div class="row">
        <div class="col-10">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('feedbacks.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Feedback</li>
                </ol>
            </nav>
        </div>
        <div class="col-2">
            <a href="{{route('feedbacks.index')}}" class="btn btn-outline-primary float-right btn-sm">
                <i class="fas fa-backward mr-2"></i>
                Go Back
            </a>
        </div>
    </div> 
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> {{ $batch->title}}
            </h5>
        </div>
        <div class="card-body">
    
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped display" width="100%" cellspacing="0">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Trouble</th>
                                <th>Benefit</th>
                                <th>Teaching</th>
                                <th>Mentoring</th>
                                <th>Favourite</th>
                                <th>Quote</th>
                                <th>Recommend</th>
                               
                            </tr>
                        </thead>
                        <tfoot class="bg-primary text-white">
                            <tr>
                                <th>No</th>
                                <th>Trouble</th>
                                <th>Benefit</th>
                                <th>Teaching</th>
                                <th>Mentoring</th>
                                <th>Favourite</th>
                                <th>Quote</th>
                                <th>Recommend</th>
                               
                            </tr>
                        </tfoot>
                        <tbody>
                           @php $i=1; @endphp
                           @foreach($feeds as $feed)
                           <tr>
                               <td>{{$i++}}</td>
                               <td>{{$feed->trouble}}</td>
                               <td>{{$feed->benefit}}</td>
                               <td>{{$feed->teaching}}</td>
                               <td>{{$feed->mentoring}}</td>
                               <td>{{$feed->favourite}}</td>
                               <td>{{$feed->quote}}</td>
                               <td>{{$feed->recommend}}</td>
                           </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>

  

    

@endsection
