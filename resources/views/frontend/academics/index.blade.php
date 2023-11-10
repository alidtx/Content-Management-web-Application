@extends('frontend.landing')
@php
    $page_title = 'Academics';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])

<main class="container mt-5">
  <!-- Academics Card -->
  <seciton class="">
    <div class="row">
        
        @include('frontend.partials.academics_cat')

        <div class="col-lg-8">
            <div id="display_services" class=" row d-flex justify-content-around">
                
                @foreach($programs as $pr)  
                    <div class="academics-card shadow-sm p-3 mb-3 bg-light rounded col-lg-4 col-md-6 d-flex justify-content-center">
                        <div class="academics-card-icon text-center mt-4">
                            <a href="{{ route('academics.academics_details', $pr->id) }}">
                                <img class="rounded" src="{{ asset('public/frontend/assets/img/academics/card-icon (5).png') }}" alt="icon">
                                <h1 class="fs-6 text-center text-primary mt-2">{{$pr->program_category}}</h1>
                                <p>{{$pr->program_title}}</p>
                            </a>
                        </div>
                    </div>
                @endforeach

 

            </div>
        </div>
    </div>
  </seciton>
</main>
 
@endsection
