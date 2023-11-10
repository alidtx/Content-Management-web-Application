@extends('frontend.bangabandhu_chair.landing')

@php
$page_title = 'Bangabandhu Chair Research';
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
                <div class="col-md-3 research-type-list">
                    <ul>
                        <h5 class="text-success">RESEARCH TYPE</h5>

                        <li class="research_type" data-research_type="ongoing_research">
                            <label for="ongoing_research"><input type="radio" id="ongoing_research" name="research_type"
                                    value="ongoing_research" checked> <span class="research_type_name">Ongoing
                                    Research</span>
                                <span class="research_type_count">{{ $count_completed_research }}</span>
                            </label>
                        </li>

                        <li class="research_type" data-research_type="completed_research">
                            <label for="completed_research"><input type="radio" id="completed_research"
                                    name="research_type" value="completed_research"> <span
                                    class="research_type_name">Completed Research</span>
                                <span class="research_type_count">{{ $count_ongoing_research }}</span>
                            </label>
                        </li>
                    </ul>
                </div>

                <div class="col-md-1">

                </div>
                <div class="col-md-8" id="research-list">
                    {{-- @foreach ($infos as $key => $info)

                    <div class="row">
                        <div class="card card-background" style="padding-top: 10px;margin-bottom: 15px;">
                            <h4 class="content-title"><a
                                    href="{{ route('bangabandhu_chair.research.detail', ['ongoing_research', $info->id]) }}"
                                    style="text-decoration: none">{{ $info->title }}</a></h4>
                            <h6 class="fs-6">{{@$info->pi_co}}</h6>
                        </div>
                    </div>
                    @endforeach --}}

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')

<script>
    $(function(){
    $(document).on('click', '.research_type', function(){
        // $('#research-list').html('');
        var research_type = $(this).data('research_type');
        var category_id = 1;
        $.ajax({
            url: "{{ route('research_by_type') }}",
            type: "GET",
            data: {
                research_type: research_type,
                category_id: category_id
            },
            success: function(data) {
                $('#research-list').html(data);
            }
        });
    });

    $('.research_type:first').trigger('click');
});
</script>

@endsection