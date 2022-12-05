@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif 
            <div class="card">
                <div class="card-header">
                    <h4>Add courses
                        <a href="{{ url('admin/courses') }}"  class="btn btn-outline-danger btn-sm float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('admin/courses/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <div class="mb-3">
                                <label>Department</label>
                                <input type="text" name="department" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Department Head</label>
                                <input type="text" name="Depthead" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Hour</label>
                                <input type="text" name="hour" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Short Description</label>
                                <textarea name="shortdesc" rows="3" class="form-control"></textarea>
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
                                <label>Addmission Fee</label>
                                <input type="text" name="admissionfee" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Semister Fee</label>
                                <input type="text" name="semesterfee" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Tution Fee</label>
                                <input type="text" name="tutionfee" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Total Cost</label>
                                <input type="text" name="totalcost" class="form-control" />
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