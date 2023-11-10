@extends('frontend.landing')
@php
    if($type == 'Events'){

        $page_title = 'Events';
    }elseif($type == 'Notice'){
        
        $page_title = 'Notice';
    }else{
        
        $page_title = 'News';
    }
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')

<main class="container mt-5">

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6"> 
                    <h1 class="fs-4 text-primary py-3 fw-bold">All {{$type}}</h1> 
                </div>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="row">

            
          @foreach($news as $key => $n) 
          @php
            if($n->type == 1){
                $type = 'news';
            }elseif($n->type == 2){
                $type = 'events';
            }else{
                $type = 'notice';
            }
          @endphp

            <div class="profile shadow-sm p-3 mb-3 rounded">
                <div class="row d-flex justify-content-center align-items-center">
                    @if(!empty($n->image))
                    <div class="col-lg-2 col-md-6 profile-img">
                        <img
                        class="rounded-circle"
                        src="{{asset('public/upload/news/'.$n['image']) }}"
                        style="width: 100%"
                        />
                    </div>
                    @endif
                    <div class="col-10 profile-info">
                        <h1 class="fs-4 fw-bold mb-0"><a href="{{ route($type.'.details', $n->id) }}">{{$n->title}}</a></h1>
                        <h1 class="fs-4 fw-bold text-primary">{{date("d M Y",strtotime(@$n->date))}}</h1>
                        <p> {{$n->short_description}}   </p>
                    </div>
                </div>
            </div>

                
          @endforeach 
                
            </div>

            <div class="row">
                <div class="col-sm-12 paginaion_right">
                    <nav>
                        <ul class="pagination">
                
                            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                <span class="page-link" aria-hidden="true">‹ Previous</span>
                            </li> 
                    
                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                            <li class="page-item"><a class="page-link" href="#news-events?page=2">2</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#news-events?page=2" rel="next" aria-label="Next »">Next ›</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </section>

</main>
 
@endsection
