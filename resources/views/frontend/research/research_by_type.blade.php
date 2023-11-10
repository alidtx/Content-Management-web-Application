@foreach ($infos as $key => $info)

<div class="row">
    <div class="card card-background" style="padding-top: 10px;margin-bottom: 15px;">
        @if($info->author)
        <h4 class="content-title"><a href="{{ route('bangabandhu_chair.research.detail', ['completed_research', $info->id]) }}">{{$info->title}}</a></h4>
        <h6 class="fs-6">{{@$info->author}}</h6>
        @else
        <h4 class="content-title"><a href="{{ route('bangabandhu_chair.research.detail', ['ongoing_research', $info->id]) }}">{{$info->title}}</a></h4>
            <h6 class="fs-6">{{@$info->pi_co}}</h6>
        @endif
    </div>
</div>
@endforeach