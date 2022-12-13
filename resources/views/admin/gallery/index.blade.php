@extends('layouts.admin')

@section('content')
    <div>
        <div class="row">
            <div class="col-md-12 grid-margin">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4> Add Images
                            <a href="{{ url('admin/gallery/create') }}" class="btn btn-outline-primary btn-sm float-end">
                                Add Images</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image Title</th>
                                    <th>Image</th>
                                    <th>Image tag</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($imgs->isNotEmpty())
                                    @foreach ($imgs as $img)
                                        <tr>gallery
                                            <td>{{ $img->id }}</td>
                                            <td>{{ $img->title }}</td>

                                            <td>{{ $img->image }}</td>
                                            <td>
                                                <img src="{{ asset($img->image) }}" style="width:70px; height:70px"
                                                    alt="header">
                                            </td>
                                            <td>{{ $img->status == '1' ? 'Hidden' : 'Visible' }}</td>

                                            <td>

                                                <a href="{{ url('admin/gallery/' . $img->id . '/edit') }}" class="edit"
                                                    title="Edit" data-toggle="tooltip"><i class="material-icons"
                                                        style="color:green;">&#xE254;</i></a>
                                                <a href="{{ url('admin/gallery/' . $img->id . '/delete') }}"
                                                    onclick="return confirm('Are you suer, You want to delete this Message section?');"
                                                    class="delete" title="Delete" data-toggle="tooltip">
                                                    <i class="material-icons" style="color:red;">&#xE872;</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p>No posts found</p>
                                @endif

                            </tbody>
                        </table>
                        <div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
