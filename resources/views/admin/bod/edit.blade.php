@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif 
            <div class="card">
                <div class="card-header">
                    <h4>Update BODS
                        <a href="{{ url('admin/bod/') }}"  class="btn btn-outline-danger btn-sm float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('admin/bod/'.$bods->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method ('PUT')

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="Name" value="{{ $bods->Name }}" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <label>Designation</label>
                                <input type="text" name="designation" value="{{ $bods->designation }}" class="form-control" />
                            </div>

            
 
                            <div class="mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control"/>
                                <img src="{{ asset($bods->image) }}" width= "60px" height= "60px" />
                            </div>

                            <div class="mb-3">
                                <label>Status</label> <br/>
                                <input type="checkbox" name="status" {{$bods->status == '1' ? 'checked' :''}} />
                                   Chacked=Hidden, Unchacked=visible
                            </div>

                            <div class=" mb-3">
                                <button type="submit" class="btn btn-outline-success float-end">Update</button>
                            </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection