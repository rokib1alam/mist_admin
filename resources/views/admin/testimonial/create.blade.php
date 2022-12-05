@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif 
            <div class="card">
                <div class="card-header">
                    <h4>Add Testimonial
                        <a href="{{ url('admin/testimonials') }}"  class="btn btn-outline-danger btn-sm float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('admin/testimonials/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="Name" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Designation</label>
                                <input type="text" name="designation" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control"/>
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