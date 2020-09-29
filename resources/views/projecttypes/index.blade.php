@extends('backendtemplate')

@section('content')

    <h1 class="h3 mb-4 text-gray-800"> Project Types </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary"> All Project Types
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Project Name</th>
                            <th>User Name</th>
                            <th>Course Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i=1; @endphp
                        @foreach($projecttypes as $projtype)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$projtype->name}}</td>
                            <td>{{$projtype->user->name}}</td>
                            <td>@foreach($projtype->courses as $p) {{$loop->first ? '':', '}}{{$p->name}} @endforeach</td>
                            <td>
                                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#assignprojectmodal">Assign</a>
                            </td>
                        </tr>
                        <div class="modal" tabindex="-1" id="assignprojectmodal">
                          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Assign Project Type</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="{{route('projecttypes.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="projecttype" value="{{$projtype->id}}">
                              <div class="modal-body">
                                
                                <div class="form-group row">
                                    <label for="batchName" class="col-sm-2 col-form-label">Batch</label>
                                    @role('Admin')
                                    <div class="col-sm-10">
                                        <select class="form-control" name="batch" id="batchName">
                                            <option>Choose One</option>
                                            
                                            @foreach($batches as $batch)
                                           
                                                <option value="{{$batch->id}}">{{$batch->title}}</option>
                                            
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