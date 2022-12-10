@extends('layouts.app')
@section('page_title', '|Home|')
@section('content')

    @include('layouts.include.frontend.top_header')
    @include('layouts.include.frontend.header')
    @include('layouts.include.frontend.navbar')
    <br /><br /><br />
    @include('frontend.pages.slider')
    @include('frontend.pages.massage_of_director')
    @include('frontend.pages.why_mist')
    @include('frontend.pages.Course')
    @include('frontend.pages.about')
    {{-- @include('frontend.pages.contact') --}}
    @include('frontend.pages.testimonials')
    @include('frontend.pages.news_update')



    @include('frontend.pages.join_us')
    {{-- @include('layouts.include.frontend.footer') --}}

@endsection
