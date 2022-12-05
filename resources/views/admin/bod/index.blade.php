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
                                <h4>BOD
                                        <a href="{{ url('admin/bod/create') }}"  class="btn btn-outline-primary btn-sm float-end">Add BODS</a>
                                </h4>
                                </div>
                                <div class="card-body">
                                        <table class="table table-bordered table-striped "> 
                                                <thead>
                                                <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Designation</th>
                                                        <th>Image</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                @if($bods->isNotEmpty())
                                                        @foreach ($bods as $bod)
                                                                <tr>
                                                                <td>{{ $bod->id }}</td>
                                                                <td>{{ $bod->Name }}</td>
                                                                <td>{{ $bod->designation }}</td>
                                                                <td>
                                                                        <img src="{{ asset($bod->image) }}" style="width:70px; height:70px" alt="header" >
                                                                </td>
                                                                <td>{{ $bod->status == '1' ? 'Hidden':'Visible'}}</td>
                                                                <td >
                                                                        
                                                                        <a href="{{ url ('admin/bod/'.$bod->id.'/edit')}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"  style="color:green;" >&#xE254;</i></a>
                                                                        <a href="{{ url ('admin/bod/'.$bod->id.'/delete')}}"
                                                                        onclick="return confirm('Are you sure, You want to delete this BOD?');"
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