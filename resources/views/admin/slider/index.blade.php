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
                                <h4>Slider
                                        <a href="{{ url('admin/slider/create') }}"  class="btn btn-outline-primary btn-sm float-end">Add Slider</a>
                                </h4>
                                </div>
                                <div class="card-body">
                                        <table class="table table-bordered table-striped "> 
                                                <thead>
                                                <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Image</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        @foreach ($sliders as $slid)
                                                            <tr>
                                                                <td>{{$slid->id}}</td>
                                                                <td>{{$slid->title}}</td>
                                                                <td>{{ $slid->description }}</td>
                                                                <td>
                                                                        <img src="{{ asset($slid->image) }}" style="width:70px; height:70px" alt="slider" >
                                                                </td>
                                                                <td>{{ $slid->status == '1' ? 'Hidden':'Visible'}}</td>
                                                                <td >
                                                                        
                                                                        <a href="{{ url ('admin/slider/'.$slid->id.'/edit')}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"  style="color:green;" >&#xE254;</i></a>
                                                                        <a href="{{ url ('admin/slider/'.$slid->id.'/delete')}}"
                                                                        onclick="return confirm('Are you suer, You want to delete this sliders?');"
                                                                        class="delete" title="Delete" data-toggle="tooltip">
                                                                        <i class="material-icons" style="color:red;" >&#xE872;</i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                         
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