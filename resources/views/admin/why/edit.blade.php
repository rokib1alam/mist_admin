@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif 
            <div class="card">
                <div class="card-header">
                    <h4>Update Content
                        <a href="{{ url('admin/why/') }}"  class="btn btn-outline-danger btn-sm float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('admin/why/'.$mist->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method ('PUT')

                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" value="{{ $mist->title }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Icon</label>
                                <textarea name="icontext" rows="3" class="form-control">{{ $mist->icontext }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <textarea name="description" rows="3" class="form-control">{{ $mist->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Status</label> <br/>
                                <input type="checkbox" name="status" {{$mist->status == '1' ? 'checked' :''}} />
                                   Chacked=Hidden, Unchacked=visible
                            </div>

                            <div class=" mb-3">
                                <button type="submit" class="btn btn-outline-success float-end">Save</button>
                            </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection