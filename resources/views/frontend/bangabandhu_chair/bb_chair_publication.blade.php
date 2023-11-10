@extends('frontend.bangabandhu_chair.landing')

@php
$page_title = 'Bangabandhu Chair Publication';
@endphp
@section('title')
{{ $page_title }}
@endsection

@section('content')

{{-- Banner --}}
@include('frontend.partials.sections.banner', ['page_title' => $page_title])


<!-- Section -->
<section>
    <div class="my-3">
        <div class="container">
            <div class="row">

                </div>
                <div class="col-md-12">
                    @foreach ($infos as $key => $info)

                    <div class="row">
                        <div class="card card-background" style="padding-top: 10px;margin-bottom: 15px;">
                            <h4 class="content-title"><a
                                    href="{{ route('bangabandhu_chair.publication.details', $info->id) }}"
                                    style="text-decoration: none">{{ $info->paper_title }}</a></h4>
                            <h6 class="fs-6">{{@$info->authors}}</h6>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@endsection