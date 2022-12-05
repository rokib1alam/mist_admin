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
                                <h4>Topbar
                                        <a href="{{ url('admin/topbars/create') }}"  class="btn btn-outline-primary btn-sm float-end">Add Header</a>
                                </h4>
                                </div>
                                <div class="card-body">
                                        <table class="table table-bordered table-striped "> 
                                                <thead>
                                                <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                        <th>Mobile</th>
                                                        <th>Email</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                @if($topbars->isNotEmpty())
                                                        @foreach ($topbars as $top)
                                                                <tr>
                                                                <td>{{ $top->id }}</td>
                                                                <td>{{ $top->title }}</td>
                                                                <td>{{ $top->mobile }}</td>
                                                                <td>{{ $top->email }}</td>

                                                                <td>{{ $top->status == '1' ? 'Hidden':'Visible'}}</td>
                                                                <td >
                                                                        
                                                                        <a href="{{ url ('admin/topbars/'.$top->id.'/edit')}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"  style="color:green;" >&#xE254;</i></a>
                                                                        <a href="{{ url ('admin/topbars/'.$top->id.'/delete')}}"
                                                                        onclick="return confirm('Are you suer, You want to delete this headers?');"
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