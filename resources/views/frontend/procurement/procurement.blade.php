@extends('frontend.landing')
@php
    $page_title = 'Procurement';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
@include('frontend.partials.sections.banner', ['page_title' => $page_title])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .search-section {
            background: #e9ecef;
            padding: 32px 20px 59px 51px;
            text-align: justify;
            height: 250px;
            width: 100%;
        }

        .search-section .headline {
            font-size: 40px;
            color: #275d38;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }

        .search-section p {
            color: #313a45
        }

        .search-section .search-bar {
            margin-top: 63px;
            width: 96%;
        }

        .search-section .search-bar #input-field {
            width: 96%;
            outline-style: inset;
            background: #f2cd00;
            color: wheat;
            height: 50px;
            font-size: 20px;
            padding-left: 20px;
            outline: none;
            border: 0;
        }

        .search-bar #input-field::placeholder {
            color: white;
        }

        .fa-solid,
        .fas {
            font-weight: 900;
            margin-left: -41px;
        }

        .content {
            background: #e9ecef;
            padding: 18px 30px 18px 30px;
            margin-top: 20px;
        }

        .content-area {
            margin: 25px 0 25px 0;
        }
    </style>
<br>

    <section>
        <div class="container">
        <div class="search-section">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="headline">Procurement Search</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam dolor, expedita facilis rerum
                            autem maxime at dolore</p>
                    </div>
                    <div class="col-md-8">
                        <div class="search-bar">
                            <input type="text" placeholder="Search for Procurement" id="input-field">
                            <span><i class="fa-solid fa-magnifying-glass"></i></span>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </section>

    <section>
        <div class="content-area">
            <div class="container">
              @foreach ($procurement as $item)
                <div class="content">
                    <h3 class="content-title">{{$item->title}}</h3>
                 <p>{!! \Illuminate\Support\Str::limit($item->short_desc, 200, $end='...') !!}</p>
                    <a href="{{url('procurement/'.$item->id)}}">Read More</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <script>
const searchInput = document.getElementById('input-field');
const dataList = document.querySelectorAll('.content-title');
searchInput.addEventListener('input', () => {
  const searchTerm = searchInput.value.toLowerCase();
  for (let i = 0; i < dataList.length; i++) {
      const itemText = dataList[i].textContent.toLowerCase();
      if (itemText.includes(searchTerm)) {
        dataList[i].parentNode.style.display ='block';
    } else {
        dataList[i].parentNode.style.display ='none';
    }
  }
});
   </script>

@endsection
