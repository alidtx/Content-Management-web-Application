@extends('frontend.bangabandhu_chair.landing')

@php
$page_title = 'Bangabandhu Chair Collaborations';
@endphp
@section('title')
{{ $page_title }}
@endsection

@section('content')

{{-- Banner --}}
@include('frontend.partials.sections.banner', ['page_title' => $page_title])


<!-- Section -->
<section class="container">
    <div class="rounded my-5">
        <div class="row d-flex">
        </div>
    </div>
</section>

@endsection