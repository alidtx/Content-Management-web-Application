@extends('frontend.bangabandhu_chair.landing')

@php
$page_title = 'Bangabandhu Chair Publication';
@endphp
@section('title')
{{ $page_title }}
@endsection
<style>
    .card-background {
        border: none;
        background-color: #f1f1f1;
        border-radius: 0;
    }

    .research-type-list ul {
        padding-left: 0px;
    }

    .research-type-list li label {
        width: 100%;
        cursor: pointer;
    }

    .research-type-list li:hover {
        background-color: #f1f1f1;
    }

    input[type='radio']:checked:after {
        width: 13px;
        height: 13px;
        border-radius: 15px;
        top: 0px;
        left: 0px;
        position: relative;
        background-color: #000;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid #000;
    }

    .research_type_name {
        font-weight: 400;
        padding-left: 5px;
    }

    .research_type_count {
        display: inline-block;
        float: right;
        font-weight: 500;
    }

    .search-box:focus {
        box-shadow: none !important;
    }
</style>
@section('content')

{{-- Banner --}}
@include('frontend.partials.sections.banner', ['page_title' => $page_title])


<!-- Section -->

<section>
    <div class="my-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-background">
                        <div class="card-body">
                            <div class="pt-3">
                                <h1 class="fs-4 fw-bold text-primary">{{ $info->paper_title }}</h1>
                                <h1 class="fs-7 fw-bolder">Author: {{ $info->authors }}</h1>
                                <h1 class="fs-6 fw-bolder">Research Area: {{ $info->research_area }}</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card card-background">
                        <div class="card-body">
                            <div class="tab-content">
                                <div id="outline" class="tabcontent active">
                                    <p>{!! $info->description !!}</p>
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

@section('script')

<script>

</script>

@endsection