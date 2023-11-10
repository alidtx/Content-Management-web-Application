@extends('frontend.landing')
@php
    $page_title = 'Pages Details';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])

        @include('frontend.partials.page_body') 
 
@endsection
