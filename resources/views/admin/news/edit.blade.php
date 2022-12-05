@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Update News
                        <a href="{{ url('admin/news/') }}" class="btn btn-outline-danger btn-sm float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('admin/news/' . $newses->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method ('PUT')

                        <div class="mb-3">
                            <label>Div Class id</label>
                            <select name="class_id" class="form-control">
                                @foreach ($class as $classes)
                                    <option
                                        value="{{ $classes->id }}"{{ $classes->id == $newses->class_id ? 'selected' : '' }}>
                                        {{ $classes->id }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Date</label>
                            <input type="text" name="date" value="{{ $newses->date }}" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label>Notice Title</label>
                            <input type="text" name="notice_title" value="{{ $newses->notice_title }}"
                                class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" value="{{ $newses->title }}" class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control" />
                            <img src="{{ asset($newses->image) }}" width="60px" height="60px" />
                        </div>
                        <div class="mb-3">
                            <label for="">Document </label>
                            <input type="file" name="attach_document" class="form-control" />
                            <iframe id="ifrm" src="{{ asset($newses->attach_document) }}"></iframe>
                        </div>

                        <div class="mb-3">
                            <label>Status</label> <br />
                            <input type="checkbox" name="status" {{ $newses->status == '1' ? 'checked' : '' }} />
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
