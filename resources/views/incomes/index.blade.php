@extends('backendtemplate')

@section('content')

    <h1 class="h3 mb-4 text-gray-800"> Incomes </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> All Incomes
                @role('Recruitment')
                <a href="{{route('incomes.create')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-plus mr-2"></i>Add New</a>
                @endrole
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Location Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i = 1; @endphp
                        
                        @foreach($incomes as $income)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$income->amount}}</td>
                                <td>{{$income->description}}</td>
                                <td>{{$income->date}}</td>
                                <td>{{$income->location->name}}</td>
                                <td>
                  
                                    <a href="{{route('incomes.edit',$income->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                 
                                    <form method="post" action="{{route('incomes.destroy',$income->id)}}" class="d-inline-block">
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
@endsection