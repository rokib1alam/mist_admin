@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif 
            <div class="card">
                <div class="card-header">
                    <h4>Update About Section
                        <a href="{{ url('admin/abouts/') }}"  class="btn btn-outline-danger btn-sm float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('admin/abouts/'.$abouts->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method ('PUT')

                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" value="{{ $abouts->title }}" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" rows="5" class="form-control">{{ $abouts->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Short Description</label>
                                <textarea name="shortdes" rows="3" class="form-control">{{ $abouts->shortdes }}</textarea>
                            </div>
 
                            <div class="mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control"/>
                                <img src="{{ asset($abouts->image) }}" width= "60px" height= "60px" />
                            </div>

                            <div class="mb-3">
                                <label>Add Image Class</label>
                                <input type="text" name="img_class" value="{{ $abouts->img_class }}" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <label>Add Text Class</label>
                                <input type="text" name="text_class" value="{{ $abouts->text_class }}" class="form-control" />
                            </div>

                            <div class="mb-3">
                                <label>Status</label> <br/>
                                <input type="checkbox" name="status" {{$abouts->status == '1' ? 'checked' :''}} />
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