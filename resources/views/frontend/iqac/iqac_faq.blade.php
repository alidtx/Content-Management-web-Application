@extends('frontend/partials/iqac_layout')

@php
    $page_title = "FAQ"
@endphp
@section('title'){{$page_title}} @endsection
@section('content')
@include('frontend.partials.sections.banner', ['page_title' => $page_title])

<!-- Contact -->
<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
  <div class="view-content accordion" id="accordion">
    @foreach($faqs as $faq)
    <div class="accordion-item">
      <button id="myButton-{{@$faq->id}}" onclick="myFunction({{@$faq->id}})" class="bottomRightPlus collapsed" data-bs-toggle="collapse" data-bs-target="#collapse-{{@$faq->id}}" aria-expanded="false" aria-labelledby="heading-{{@$faq->id}}"></button>
      <h3 class="accordion-header" id="heading-{{@$faq->id}}">
        <button onclick="myFunction({{@$faq->id}})" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{@$faq->id}}" aria-expanded="false" aria-controls="collapse-{{@$faq->id}}" tabindex="-1">
        {{@$faq->question}}
        </button>
      </h3>
      <div id="collapse-{{@$faq->id}}" class="accordion-collapse collapse" aria-labelledby="heading-{{@$faq->id}}" aria-hidden="true" data-bs-parent="#accordion" style="">
        <div class="accordion-body">
          <p>{!!@$faq->answer!!}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>


<script>
  var z = 0;
  function myFunction(id) {
      $check = document.getElementById('myButton-'+id).classList.contains("collapsed");
      //alert($check);
      if($check)
      {
        //alert('rotated');
        document.getElementById('myButton-'+id).classList.remove("rotated");
        document.getElementById('myButton-'+id).classList.add("collapsed");
        z=1;
      }
      else
      {
        //alert('collapsed');
        document.getElementById('myButton-'+id).classList.remove("collapsed");
        document.getElementById('myButton-'+id).classList.add("rotated");
        z=0;
      }
  }
</script>


<style>
  .bottomRightPlus{width:0px;height:0px;border-bottom:70px solid #8C0100 !important;border-left:70px solid transparent;bottom:0;right:0;position:absolute;transition:.35s all;margin:0;padding:0;background:transparent;}
  .bottomRightPlus:hover,.bottomRightPlus:focus{border-bottom-color:#000;}
  .bottomRightPlus::before{content:" ";display:inline-block;position:absolute;right:20px;transition:.35s all;height:20px;width:2px;background-color:#fff;top:35px;}
  .bottomRightPlus::after{content:" ";display:inline-block;position:absolute;right:11px;transition:.35s all;width:20px;height:2px;background-color:#fff;top:44px;transform:none;}
  .bottomRightPlus:hover{cursor:pointer;}
  .bottomRightPlus.rotated::before{transform:rotate(45deg);}
  .bottomRightPlus.rotated::after{transform:rotate(45deg);}
  button{border:none;}
  @media screen and (max-width:767px){
  button{width:100%;}
  }
  @media screen and (min-width:768px){
  button{width:auto;}
  }
  .accordion-item{border:2px solid #8C0100 !important;border-radius:0!important;margin-bottom:20px;position:relative;padding-right:50px;padding-left:50px;}
  .accordion-item .bottomRightPlus{z-index:10;}
  .accordion-item .accordion-button{font-family:franklin-gothic-atf,sans-serif;font-weight:bold;font-style:normal;font-size:18px;line-height:24px;-webkit-font-smoothing:antialiased;padding:23px 1rem;}
  .accordion-item .accordion-button:focus{z-index:3;border:none;outline:0;box-shadow:none;}
  .accordion-item .accordion-button:after{flex-shrink:0;width:1.25rem;height:1.25rem;margin-left:auto;content:"";background-image:none;background-repeat:no-repeat;background-size:1.25rem;transition:transform .2s ease-in-out;}
  .accordion-item .accordion-body a{display:inline;font-weight:normal;text-decoration:underline;text-decoration-color:#8C0100;text-underline-offset:2px;color:#212529;text-transform:inherit;}
  .accordion-item .accordion-body a:hover,.accordion-item .accordion-body a:focus{color:#8C0100 !important;text-decoration:none;}
  .view-faqs-accordion .accordion{margin-top:60px;}
  .accordion-button:not(.collapsed) {
      color: unset !important; 
      background-color: unset !important;
      box-shadow: unset !important;
  }
</style>




@endsection