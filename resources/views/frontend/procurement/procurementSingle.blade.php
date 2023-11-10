
@extends('frontend.landing')
@php
    $page_title = 'Procurement';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
@include('frontend.partials.sections.banner', ['page_title' => $page_title])

<main class="container">
<div class="row">
        @foreach ($procurementSingle as $item)
          <div class="col-lg-8 mt-4">
          <h1 class="fs-4 text-primary fw-bold">{{$item->title}}</h1>
          <h6 class="text-secondary fw-bold">{{$item->start_date}}</h6>
          <p>{!! $item->long_desc !!}</p>
      </div>
      @endforeach
</main>
@endsection
