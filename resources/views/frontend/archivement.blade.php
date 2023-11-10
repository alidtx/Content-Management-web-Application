@extends('frontend.landing')
@php
    $page_title = 'Special Archivement';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
@include('frontend.partials.sections.banner', ['page_title' => $page_title])

<style>
      .content{
         padding: 0px 0 25px 0;
      }
      .content img{
          display: block;
          width: 50%;
          height: 400px;
          float: right;
          margin-left: 10px;
          margin-top: 16px;
      }
      .content h3{
         padding: 20px 0 0px 0;
      }

    content .content-text{
      margin: 0 !important;
      padding: 0 !important;

    }
    .content-text p{
      margin: 0 !important;
      padding: 0 !important;
      margin-top: 15px;
      float: left;
      text-align: justify
    }
    .content h3{
         font-size: 40px;
         font-weight: 300;
         color: #198754
      }
      .content p{
        text-align: justify;
        padding-right: 10px
      }

</style>

<div class="container">
    <div class="content">
      <h3>{{@$achievements->title}}</h3>
      <img src="{{asset('public/upload/special_achievement/'.@$achievements->image)}}" alt="">
      {{-- <img src="{{asset('public/dummy/img2.jpg')}}" alt=""> --}}
      <p>{!!@$achievements->long_description!!}</p>
      <div class="content-text">

    </div>
    </div>
</div>

@endsection







