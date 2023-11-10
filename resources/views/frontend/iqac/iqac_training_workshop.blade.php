@extends('frontend/partials/iqac_layout')

@php
    $page_title = "Training and Workshop"
@endphp
@section('title'){{$page_title}} @endsection
@section('content')
@include('frontend.partials.sections.banner', ['page_title' => $page_title])

  <!-- Our Faculty Person -->
  <section>
    <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
      {{-- <h1 class=" text-secondary fs-3 mb-0 text-center pt-3">Team</h1> --}}
      <div class="row g-3 d-flex justify-content-between ">
        @foreach($trainingWorkshopSeminars as $single)
        <div class="card rounded-0 col-lg-4 col-md-12 my-5" style="width: 22rem;">
          <div class="card-body">
            <p class="card-text mb-0">{{ date('d M Y',strtotime(@$single->schedule)) }}</p>
            <h5 class="card-title">Training: {{@$single->traning}}</h5>
            <p class="card-text">
              Workshop: {{@$single->work_shop}}, 
              Seminar: {{@$single->seminar}}, 
              Participant: {{@$single->participant}}, 
              Facilator: {{@$single->member->nameEn}}.
            </p>
          </div>
        </div>
        @endforeach
        {{-- <div class="card rounded-0 col-lg-4 col-md-12 my-5" style="width: 22rem;">
          <div class="card-body">
            <p class="card-text mb-0">Craig Bator - 27 Dec 2020</p>
            <h5 class="card-title">Being self-controlled child may lead to healthier middle-age</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
          </div>
        </div>
        <div class="card rounded-0 col-lg-4 col-md-12 my-5" style="width: 22rem;">
          <div class="card-body">
            <p class="card-text mb-0">Craig Bator - 27 Dec 2020</p>
            <h5 class="card-title">Being self-controlled child may lead to healthier middle-age</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
          </div>
        </div>
        <div class="card rounded-0 col-lg-4 col-md-12 my-5" style="width: 22rem;">
          <div class="card-body">
            <p class="card-text mb-0">Craig Bator - 27 Dec 2020</p>
            <h5 class="card-title">Being self-controlled child may lead to healthier middle-age</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
              content.</p>
          </div>
        </div> --}}
      </div>
    </div>
  </section>

@endsection