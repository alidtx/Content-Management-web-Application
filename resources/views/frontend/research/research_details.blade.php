<!-- ===== slider section start ===== -->
@extends('frontend.landing')

@php
$page_title = 'Affiliate Institute';
@endphp
@section('title')
{{ $page_title }}
@endsection

@section('content')
{{-- <style>
    .card-background {
        border: none;
        background-color: #f1f1f1;
        border-radius: 0;
    }
</style> --}}
@include('frontend.partials.sections.banner', ['page_title' => $page_title])
<!-- Banner -->
<section>
    <div class="academic-details py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-background">
                        <div class="card-body" style="min-height: 375px">
                            <div class="text-center">
                                <img class="rounded-circle"
                                    src="{{ asset('public/upload/affiliation/'. @$info->image ) }}"
                                    onerror="this.onerror=null;this.src='{{ asset('public/frontend/assets/img/home/brnad (1).png') }}';"
                                    style="width: 50%" />
                            </div>
                            <div class="pt-3">
                                <h1 class="fs-4 fw-bold text-primary">{{ $info->inst_name }}</h1>
                                <h1 class="fs-6">Type: {{ $info->institution_type }}</h1>
                                <h1 class="fs-6 fw-bolder">Location: {{ $info->location }}</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card card-background">
                        <div class="card-body">
                            <div class="tab-content">
                                <div id="outline" class="tabcontent active">
                                    <p>{!! $info->inst_description !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection