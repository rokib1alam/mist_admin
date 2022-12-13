@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Update gallery
                        <a href="{{ url('admin/gallery/') }}" class="btn btn-outline-danger btn-sm float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('admin/gallery/' . $galleris->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method ('PUT')

                        <div class="mb-3">
                            <label>gallery Title</label>
                            <input type="text" name="title" value="{{ $galleris->title }}" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control" />
                            <img src="{{ asset($galleris->image) }}" width="60px" height="60px" />
                        </div>

                        <div class="mb-3">
                            <label for="">Image Tag</label>
                            <input type="text" value="{{ $galleris->imgTag }}" name="imgTag" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Status</label> <br />
                            <input type="checkbox" name="status" {{ $galleris->status == '1' ? 'checked' : '' }} />
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
