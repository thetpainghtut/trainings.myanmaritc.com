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
                        <tr>
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
                              @foreach($post->batches as $s)
                             
                              
                             
                                @foreach($batches as $l)
                               
                              @if($l->id != $s->id)
                              <a href=""></a>
                              
                              @else
                              <a href="#" class="btn btn-info" data-toggle="modal" data-target="#assignpostmodal">Assign</a>
                              @endif

                              @endforeach
                              <a href=""></a>
                              @endforeach
                              
                                
                               
                            </td>
                        </tr>
                        <!-- Assign Modal -->
                        <div class="modal" tabindex="-1" id="assignpostmodal">
                          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Assign Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="{{route('postassign')}}" method="post">
                                @csrf
                                <input type="hidden" name="post" value="{{$post->id}}">
                              <div class="modal-body">
                                
                                <div class="form-group row">
                                    <label for="batchName" class="col-sm-2 col-form-label">Batch</label>
                                    @role('Admin')
                                    <div class="col-sm-10">
                                        <select class="form-control" name="batch" id="batchName">
                                            <option>Choose One</option>
                                            
                                            @foreach($batches as $batch)
                                            @foreach($post->batches as $pb)
                                            @if($pb->id != $batch->id)
                                                <option value="{{$batch->id}}">{{$batch->title}}</option>
                                            @endif
                                            @endforeach
                                            @if($post->batches->isEmpty())
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @endrole
                                    @role('Teacher')
                                    <div class="col-sm-10">
                                        <select class="form-control" name="batch" id="batchName">
                                            <option>Choose One</option>
                                            @foreach($batches as $batch)
                                                <option value="{{$batch->batch_id}}">{{$batch->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endrole
                                </div>
                                
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>


@endsection