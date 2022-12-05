@extends('layouts.admin')

@section('content')
       <div>
                <div class="row">
                        <div class="col-md-12 grid-margin">
                                @if(session('message'))
                                        <div class="alert alert-success">{{session('message')}}</div>
                                @endif 
                        <div class="card">
                                <div class="card-header">
                                <h4>Videos
                                        <a href="{{ url('admin/video/create') }}"  class="btn btn-outline-primary btn-sm float-end">Add Messages</a>
                                </h4>
                                </div>
                                <div class="card-body">
                                        <table class="table table-bordered table-striped "> 
                                                <thead>
                                                <tr>
                                                        <th>ID</th> 
                                                        <th>video Title</th>
                                                        <th>Image</th>
                                                        <th>Video</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                @if($videos->isNotEmpty())
                                                        @foreach ($videos as $video)
                                                                <tr>video
                                                                <td>{{ $video->id }}</td>
                                                                <td>{{ $video->title }}</td>
                                                               
                                                                <td>{{ $video->video }}</td> 
                                                                <td>
                                                                        <img src="{{ asset($video->image) }}" style="width:70px; height:70px" alt="header" >
                                                                </td>
                                                                <td>
                                                                        <video src="{{ asset($video->video) }}" style="width:150px; height:150px" alt="{{ $video->title }}"></video>
                                                                        
                                                                </td>
                                                                <td>{{ $video->status == '1' ? 'Hidden':'Visible'}}</td>
                                                                <td >
                                                                        
                                                                        <a href="{{ url ('admin/video/'.$video->id.'/edit')}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"  style="color:green;" >&#xE254;</i></a>
                                                                        <a href="{{ url ('admin/video/'.$video->id.'/delete')}}"
                                                                        onclick="return confirm('Are you suer, You want to delete this Message section?');"
                                                                        class="delete" title="Delete" data-toggle="tooltip">
                                                                        <i class="material-icons" style="color:red;" >&#xE872;</i></a>
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