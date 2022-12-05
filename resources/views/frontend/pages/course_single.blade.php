@extends('layouts.app')
@section('page_title','|Course|')
@section('content')

@include('layouts.include.frontend.top_header')
@include('layouts.include.frontend.header')
@include('layouts.include.frontend.navbar')
<br/><br/><br/>
@include('frontend.pages.about_banner_section')

@include('frontend.pages.breadcam')
    
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                <br/>
                    <p>
                        <img src="{{asset($courses -> image)}}" alt="Image" class="img-fluid">
                    </p>
                </div>
                <div class="col-lg-5 ml-auto align-self-center">
                    <h2 class="section-title-underline mb-5">
                        <span>{{$courses->department}}</span>
                    </h2>
                            
                    <p><strong class="text-black d-block">Department Head:</strong> {{$courses->Depthead }}</p>
                    <p class="mb-5"><strong class="text-black d-block">Hours:</strong> {{$courses->hour }}</p> 
                    <p>{{$courses->shortdesc}}</p>
                    <p>{{$courses->description}}</p>
        
                    <ul class="ul-check primary list-unstyled mb-5">
                        <li>{{$courses->admissionfee}}</li>
                        <li>{{$courses->semesterfee}}</li>
                        <li>{{$courses->tutionfee}}</li>
                        <li>{{$courses->totalcost}}</li>
                        
                    </ul>
{{-- 
                        <p>
                            <a href="#" class="btn btn-primary rounded-0 btn-lg px-5">Enroll</a>
                        </p> --}}
        
                </div>
            </div>
        </div>

<br/>

@include('frontend.pages.join_us')
@endsection