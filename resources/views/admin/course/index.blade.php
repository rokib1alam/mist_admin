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
                                <h4>Course
                                        <a href="{{ url('admin/courses/create') }}"  class="btn btn-outline-primary btn-sm float-end">Add Course</a>
                                </h4>
                                </div>
                                <div class="card-body">
                                        <table class="table table-bordered table-striped "> 
                                                <thead>
                                                <tr>
                                                        <th>ID</th>
                                                        <th>Department</th>
                                                        <th>Department Head</th>
                                                        <th>Hour</th>
                                                        <th>Description</th>
                                                        <th>Image</th>
                                                        <th>Total Fee</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        @if($courses->isNotEmpty())
                                                                @foreach ($courses as $course)
                                                                <tr>
                                                                        <td>{{$course->id}}</td>
                                                                        <td>{{$course->department}}</td>
                                                                        <td>{{$course->Depthead}}</td>
                                                                        <td>{{$course->hour}}</td>
                                                                        <td>{{ $course->description }}</td>
                                                                        <td>
                                                                                <img src="{{ asset($course->image) }}" style="width:70px; height:70px" alt="slider" >
                                                                        </td>
                                                                        <td>{{ $course->totalcost }}</td>
                                                                        <td>{{ $course->status == '1' ? 'Hidden':'Visible'}}</td>
                                                                        <td >
                                                                                
                                                                                <a href="{{ url ('admin/courses/'.$course->id.'/edit')}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"  style="color:green;" >&#xE254;</i></a>
                                                                                <a href="{{ url ('admin/courses/'.$course->id.'/delete')}}"
                                                                                onclick="return confirm('Are you suer, You want to delete this courses?');"
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