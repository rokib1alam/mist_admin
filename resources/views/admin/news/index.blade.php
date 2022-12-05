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
                                <h4>News
                                        <a href="{{ url('admin/news/create') }}"  class="btn btn-outline-primary btn-sm float-end">Add Messages</a>
                                </h4>
                                </div>
                                <div class="card-body">
                                        <table class="table table-bordered table-striped "> 
                                                <thead>
                                                <tr>
                                                        <th>ID</th>
                                                        <th>Date</th>
                                                        <th>News Title</th>
                                                        <th>Title</th>
                                                        <th>Image</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                @if($news->isNotEmpty())
                                                        @foreach ($news as $newes)
                                                                <tr>
                                                                <td>{{ $newes->id }}</td>
                                                                <td>{{ $newes->date }}</td>
                                                                <td>{{ $newes->notice_title }}</td>
                                                                <td>{{ $newes->title }}</td>           
                                                                <td>{{ $newes->pdf }}</td>
                                                                <td>{{ $newes->description }}</td>
                                                                <td>
                                                                        <img src="{{ asset($newes->image) }}" style="width:70px; height:70px" alt="header" >
                                                                </td>
                                                                <td>{{ $newes->status == '1' ? 'Hidden':'Visible'}}</td>
                                                                <td >
                                                                        
                                                                        <a href="{{ url ('admin/news/'.$newes->id.'/edit')}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"  style="color:green;" >&#xE254;</i></a>
                                                                        <a href="{{ url ('admin/news/'.$newes->id.'/delete')}}"
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