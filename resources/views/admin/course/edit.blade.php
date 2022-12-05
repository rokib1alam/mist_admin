@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif 
            <div class="card">
                <div class="card-header">
                    <h4>Update Course
                        <a href="{{ url('admin/courses/') }}"  class="btn btn-outline-danger btn-sm float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ url('admin/courses/'.$course->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method ('PUT')

                            <div class="mb-3">
                                <label>Department</label>
                                <input type="text" name="department" value="{{ $course->department }}"  class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Department Head</label>
                                <input type="text" name="Depthead" value="{{ $course->Depthead }}"  class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Hour</label>
                                <input type="text" name="hour" value="{{ $course->hour }}"  class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Short Description</label>
                                <textarea name="shortdesc" rows="3" class="form-control">{{ $course->shortdesc }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" rows="3"  class="form-control">{{ $course->description }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control"/>
                                <img src="{{ asset($course->image) }}" width= "60px" height= "60px" />
                            </div>
                            <div class="mb-3">
                                <label>Addmission Fee</label>
                                <input type="text" name="admissionfee" value="{{ $course->admissionfee }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Semister Fee</label>
                                <input type="text" name="semesterfee" value="{{ $course->semesterfee }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Tution Fee</label>
                                <input type="text" name="tutionfee" value="{{ $course->tutionfee }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Total Cost</label>
                                <input type="text" name="totalcost" value="{{ $course->totalcost }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Status</label> <br/>
                                <input type="checkbox" name="status" {{$course->status == '1' ? 'checked' :''}} />
                                   Chacked=Hidden, Unchacked=visible
                            </div>

                            <div class=" mb-3">
                                <button type="submit" class="btn btn-outline-success float-end">Update</button>
                            </div>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection