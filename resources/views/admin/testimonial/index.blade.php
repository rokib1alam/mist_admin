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
                                <h4>Testimonial
                                        <a href="{{ url('admin/testimonials/create') }}"  class="btn btn-outline-primary btn-sm float-end">Add Testimonial</a>
                                </h4>
                                </div>
                                <div class="card-body">
                                        <table class="table table-bordered table-striped "> 
                                                <thead>
                                                <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Designation</th>
                                                        <th>Description</th>
                                                        <th>Image</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                @if($testi->isNotEmpty())
                                                        @foreach ($testi as $test)
                                                                <tr>
                                                                <td>{{ $test->id }}</td>
                                                                <td>{{ $test->Name }}</td>
                                                                <td>{{ $test->designation }}</td>
                                                                <td>{{ $test->description }}</td>
                                                                <td>
                                                                        <img src="{{ asset($test->image) }}" style="width:70px; height:70px" alt="header" >
                                                                </td>
                                                                <td>{{ $test->status == '1' ? 'Hidden':'Visible'}}</td>
                                                                <td >
                                                                        
                                                                        <a href="{{ url ('admin/testimonials/'.$test->id.'/edit')}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"  style="color:green;" >&#xE254;</i></a>
                                                                        <a href="{{ url ('admin/testimonials/'.$test->id.'/delete')}}"
                                                                        onclick="return confirm('Are you suer, You want to delete this testimonials?');"
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