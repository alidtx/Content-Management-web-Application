@extends('frontend.landing')
@php
    $page_title = 'Completed Research';
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

    .content h3{
       padding: 20px 0 0px 0;
    }

  content .content-text{
    margin: 0 !important;
    padding: 0 !important;
    padding: 8px 0 8px 0 !important;

  }
  .content-text p{
    margin: 0 !important;
    padding: 0 !important;
    margin-top: 7px !important
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
    .img-box{
       width: 100%;
    }
    .img-box img{
      display: block;
      width: 100%;
      height: 300px;

    }
    .content p img {
      display: block;
      width: 40px;
      height: 40px;
      cursor: pointer;
    }


</style>

<div class="container">
  <div class="content">
    <h3>{{$completed_research->title}}</h3>
    <div class="content-text" style="padding:7px 0 7px 0">
      <p> <strong>Author:</strong>&nbsp;{{$completed_research->author}}</p>
      <p> <strong>Journal Name:</strong>&nbsp; {{$completed_research->journal_name}}</p>
      <p> <strong>Publish Status:</strong>&nbsp; {{$completed_research->author}}</p>
      <p> <strong>Researcher fellow:</strong>&nbsp; {{$completed_research->profile->nameEn}}</p>
      <p> <strong>Journal Index:</strong>&nbsp; {{$completed_research->journal_index}}</p>
      <p> <strong>Journal Category:</strong>&nbsp; {{$completed_research->journal_category}}</p>
       @if ($completed_research->research_for==1)
       <p> <strong>Research For:</strong>&nbsp; Bangabandhu Chair</p>
       @else
       <p> <strong>Research For:</strong>&nbsp; CHSR</p>
       @endif
      <p> <strong>Reseach Paper:</strong>&nbsp; <a href="{{asset('public/upload/journal/'.$completed_research->pdf)}}" download><img src="{{asset('public/dummy/pdf.png')}}"  alt=""></a></p>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="text-box">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus, non, magni necessitatibus obcaecati tenetur repudiandae quos nam neque sequi ab nobis aliquam nihil sit fugit? Earum ullam optio dolorum at?</p>
             <a href="{{$completed_research->url}}" target="_blank">Get Research Url</a>
        </div>
      </div>
       <div class="col-lg-6">
        <div class="img-box">
          <img src="{{asset('public/upload/journal/'.$completed_research->image)}}" alt="">
        </div>
       </div>
    </div>
  </div>
</div>
@endsection







