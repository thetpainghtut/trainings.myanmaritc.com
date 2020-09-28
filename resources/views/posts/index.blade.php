@extends('backendtemplate')

@section('content')

    <h1 class="h3 mb-4 text-gray-800"> Posts </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> All Posts
                <a href="{{route('posts.create')}}" class="btn btn-outline-primary float-right btn-sm"> <i class="fas fa-plus mr-2"></i>Add New</a>
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Topic</th>
                            <th>Teacher Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php 
                            $i=1;
                        @endphp
                        @foreach($posts as $post)
                            <td>{{$i++}}</td>
                            <td>{{$post->title}}</td>
                            <td>{!!$post->content!!}</td>
                            <td>{{$post->topic->name}}</td>
                            <td>{{$post->user->name}}</td>
                             <td>
                                <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary btn-sm" >
                                    <i class="fas fa-info"></i>
                                </a>

                                <a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning btn-sm" >
                                    <i class="fas fa-edit"></i>
                                </a>
                                            
                                <form method="post" action="{{route('posts.destroy',$post->id)}}" class="d-inline-block btn-sm" onsubmit="return confirm('Are you sure want to Delete!')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                                          
                            </td>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection