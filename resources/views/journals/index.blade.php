@extends('backendtemplate')

@section('content')
    <h1 class="h3 mb-4 text-gray-800"> Journals </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> All Journals
                <a href="{{route('journals.create')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-plus mr-2"></i>Add New</a>
            </h5>
        </div>
        <div class="card-body">

            <nav class="mb-4">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> Activity </a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Knowledge Sharing </a>
                </div>
            </nav>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped display" width="100%" cellspacing="0">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th> No </th>
                                    <th> Title </th>
                                    <th> Posted </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach($activities as $activity)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td> <?= substr($activity->title, 0, 30) . '...'; ?>    </td>
                                        <td>
                                            <p class="text-dark mb-0 font-16 font-weight-medium"> 
                                            {{ date('M d, Y',strtotime($activity->created_at)) }}  
                                            </p>
                                            <span class="text-muted font-14">
                                                {{$activity->user->name}}
                                            </span>
                                                    
                                        </td>
                                        <td>
                                            <a href="{{route('journals.show',$activity->id)}}" class="btn btn-primary btn-sm" >
                                                <i class="fas fa-info"></i>
                                            </a>

                                            <a href="{{route('journals.edit',$activity->id)}}" class="btn btn-warning btn-sm" >
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                            <form method="post" action="{{route('journals.destroy',$activity->id)}}" class="d-inline-block btn-sm">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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
                                    <th> No </th>
                                    <th> Title </th>
                                    <th> Posted </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach($sharings as $sharing)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td> <?= substr($sharing->title, 0, 30) . '...'; ?>    </td>
                                    <td>
                                        <p class="text-dark mb-0 font-16 font-weight-medium"> 
                                        {{ date('M d, Y',strtotime($sharing->created_at)) }}  
                                        </p>
                                        <span class="text-muted font-14">
                                            By {{$sharing->user->name}}
                                        </span>
                                                
                                    </td>
                                    <td>
                                        <a href="{{route('journals.show',$sharing->id)}}" class="btn btn-primary btn-sm" >
                                            <i class="fas fa-info"></i>
                                        </a>

                                        <a href="{{route('journals.edit',$sharing->id)}}" class="btn btn-warning btn-sm" >
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form method="post" action="{{route('journals.destroy',$sharing->id)}}" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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

@endsection
