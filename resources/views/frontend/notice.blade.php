@extends('layouts.app')
@section('page_title', '|notice|')
@section('content')

    @include('layouts.include.frontend.top_header')
    @include('layouts.include.frontend.header')
    @include('layouts.include.frontend.navbar')
    <br /><br /><br />
    {{-- @include('frontend.pages.about_banner_section') --}}

    @include('frontend.pages.breadcam')

    <br />

    @include('frontend.pages.notice')

    @include('frontend.pages.join_us')

@endsection
