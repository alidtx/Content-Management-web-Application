<!-- ===== slider section start ===== -->
@extends('frontend.landing')
@php
$page_title = 'Affiliate Institute';
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

    .affiliate-type-list ul {
        padding-left: 0px;
    }

    .affiliate-type-list li label {
        width: 100%;
        cursor: pointer;
    }

    .affiliate-type-list li:hover {
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

    .affiliate_type_name {
        font-weight: 400;
        padding-left: 5px;
    }

    .affiliate_type_count {
        display: inline-block;
        float: right;
        font-weight: 500;
    }
    .search-box:focus{
        box-shadow: none !important;
    }
</style>
@section('content')
@include('frontend.partials.sections.banner', ['page_title' => $page_title])
<!-- Banner -->

<section>
    <div class="container">
        <div class="row mb-3 mt-3" style="height:200px; background-color: #f1f1f1">
            <div class="col-md-4 d-block my-auto justify-content-center align-items-center">
                <h3>AFFILIATE SEARCH</h3>
                <p>Use the filters below to find affiliate institute!</p>
            </div>
            <div class="col-md-8 my-auto justify-content-center">
                <div class="input-group" style="height : 60px;">
                    <input type="search" class="form-control search-box" placeholder="Enter Keywords ..." aria-label="Search" id="input-field"
                        aria-describedby="search-addon"
                        style="border-radius: 0; font-size: 20px; background-color: #F2CD00; border: none;" />
                    <span class="input-group-text" id="search-addon"
                        style="width : 50px; cursor: pointer; border-radius: 0; background-color: #F2CD00">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<main>
    <section>
        <div class="academic-details mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 affiliate-type-list">
                        <ul>
                            <h5 class="text-success">AFFILIATE INSTITUTE TYPE</h5>
                            <li class="affiliate_type" data-affiliate_type="All">
                                <label for="all"><input type="radio" id="all" name="affiliate_type" value="All" checked>
                                    <span class="affiliate_type_name">All</span>
                                    <span class="affiliate_type_count">{{ count($infos)}}</span>
                                </label>
                            </li>
                            @foreach ($infos->groupBy('institution_type') as $institution_type => $item)
                            <li class="affiliate_type" data-affiliate_type="{{ $institution_type }}">
                                <label for="{{ $institution_type }}"><input type="radio" id="{{ $institution_type }}"
                                        name="affiliate_type" value="{{ $institution_type }}"> <span
                                        class="affiliate_type_name">{{ $institution_type }}</span>
                                    <span class="affiliate_type_count">{{ count($item) }}</span>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-md-1">

                    </div>
                    <div class="col-md-8" id="affiliate-list">
                        @foreach ($infos as $key => $info)

                        <div class="row">
                            <div class="card card-background" style="padding-top: 10px;margin-bottom: 15px;">
                                <h4 class="content-title"><a href="{{ route('affiliation', $info->id) }}" style="text-decoration: none">{!!
                                        $info->inst_name !!}</a></h4>
                                <p>{!! Str::limit($info->inst_description, 220) !!}</p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@section('script')

<script>
    $(document).on('click', '.affiliate_type', function(){
        // $('#affiliate-list').html('');
        var affiliate_type = $(this).data('affiliate_type');
        $.ajax({
            url: "{{ route('affiliate_institutes_by_type') }}",
            type: "GET",
            data: {
                affiliate_type: affiliate_type
            },
            success: function(data) {
                $('#affiliate-list').html(data);
            }
        });
    });
    
</script>

<script>
    const searchInput = document.getElementById('input-field');
    searchInput.addEventListener('input', () => {
        const dataList = document.querySelectorAll('.content-title');
        const searchTerm = searchInput.value;
      for (let i = 0; i < dataList.length; i++) {
          const itemText = dataList[i].textContent;
          if ((itemText.toLowerCase()).includes((searchTerm.toLowerCase()))) {
            const result = [...itemText.matchAll(new RegExp(searchTerm, 'gi'))];
            var textsplit = itemText.split(new RegExp(searchTerm, 'gi'));
              var text = '';
              const textsplit_length = textsplit.length;
              for (let i = 0; i < textsplit_length; i++) {
                if((textsplit_length-1) == i){
                    text += textsplit[i];
                }else{
                    text += textsplit[i]+"<span class='text-danger text-bold'>"+result[i]['0']+"</span>";
                }
              }
            dataList[i].childNodes[0].innerHTML=text;
            dataList[i].parentNode.style.display ='block';
        } else {
            dataList[i].parentNode.style.display ='none';
        }
      }
    });
</script>
@endsection