@extends('frontend.landing')
@php
    $page_title = $info->title;
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])
  
<main class="container">
       
      <div class="row">
            <div class="col-lg-8 mt-4">
            <h1 class="fs-4 text-primary fw-bold">{{$info->title}}</h1>
            <h6 class="text-secondary fw-bold">
                    {{@$info->author}} - {{date("d M Y",strtotime(@$info->date))}}
            </h6>
            <p>
                    {!! $info->long_description !!}
            </p> 
            </div>

            @include('frontend.partials.latest_notice') 
           
    
</main>

@endsection
