@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif 
            <div class="card">
                <div class="card-header">
                    <h4>Add Topbar
                        <a href="{{ url('admin/topbars') }}"  class="btn btn-outline-danger btn-sm float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('admin/topbars/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Mobile</label>
                                <input type="text" name="mobile" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Status</label> <br/>
                                <input type="checkbox" name="status"  />
                                   Chacked=Hidden, Unchacked=visible
                            </div>

                            <div class=" mb-3">
                                <button type="submit" class="btn btn-outline-success float-end">Save</button>
                            </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection