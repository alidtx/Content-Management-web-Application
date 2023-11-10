@extends('frontend/partials/iqac_layout')

@php
    $page_title = "Documents"
@endphp
@section('title'){{$page_title}} @endsection
@section('content')
@include('frontend.partials.sections.banner', ['page_title' => $page_title])

  <!-- Our Faculty Person -->
  <section>
    <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
      {{-- <h1 class=" text-secondary fs-3 mb-0 text-center pt-3">Team</h1> --}}
       <!-- News -->
      <div class="col-md">
        <div class="d-flex justify-content-between align-items-end">
        </div>
        <div class=" position-relative" style="width: 100%; background-color: #10C45C; height: 1px;">
          <div class="position-absolute"
            style="width: 40%; background-color: #10C45C; height: 8px; margin-top: -4px;">
          </div>
        </div>
        <div class="shadow-lg p-3 mb-5 bg-light">
            @foreach($documents as $n)
            <div class="d-flex latest_newsevents justify-content-start align-items-center mt-3">
                <div class="col-lg-4">
                    <img class="" src="{{asset('storage/app/public/media/trainingimage/'.$n['image']) }}"
                        style="width: 70px; height: 70px" />
                </div>
                <div class="col-lg-5">
                    <h1 class="fs-5">{{@$n->title}}</h1>
                </div>
                <div class="col-lg-2">
                  <h1 class="fs-5">
                    <a target="_blank" class="btn btn-sm btn-info download_link" href="{{asset('storage/app/public/media/training/'.@$n->document)}}"> <i class="bi bi-eye"></i> View</a>
                    <a target="_blank" class="btn btn-sm btn-primary download_link" href="{{asset('storage/app/public/media/training/'.@$n->document)}}" download=""> <i class="bi bi-download"></i> Download</a>
                  </h1>
              </div>
            </div>
            @if(!$loop->last)
              <hr>
            @endif
            @endforeach
          
        </div>

      </div> 
    </div>
  </section>

@endsection