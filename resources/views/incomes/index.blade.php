@extends('backendtemplate')

@section('content')
    <h2 class="d-inline-block">All Incomes</h2>
      <a href="{{route('incomes.create')}}" class="btn btn-info float-right"><i class="fas fa-plus"></i>Add New</a>

      <table class="table">
        <thead>
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
          @php
            $i = 1;
          @endphp
          @foreach($incomes as $income)
          <tr>
            <td>{{$i++}}</td>
            <td>{{$income->amount}}</td>
            <td>{{$income->description}}</td>
            <td>{{$income->date}}</td>
            <td>{{$income->location->name}}</td>
            <td>
              
              <a href="{{route('incomes.edit',$income->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
             
              <form method="post" action="{{route('incomes.destroy',$income->id)}}" class="d-inline-block">
                @csrf
                @method('DELETE')
                
                  <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
        
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection