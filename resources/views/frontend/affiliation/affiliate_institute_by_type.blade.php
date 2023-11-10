@foreach ($infos as $key => $info)

{{-- <div class="row {{ $key==0 ? '' : 'pt-3' }}">
    <div class="card card-background ">
        <h4 class="content-title"><a href="{{ route('affiliation', $info->id) }}">{!! $info->inst_name !!}</a></h4>
        <p>{!! Str::limit($info->inst_description, 220) !!}</p>
    </div>
</div> --}}

<div class="row">
    <div class="card card-background" style="padding-top: 10px;margin-bottom: 15px;">
        <h4 class="content-title"><a href="{{ route('affiliation', $info->id) }}">{!!
                $info->inst_name !!}</a></h4>
        <p>{!! Str::limit($info->inst_description, 220) !!}</p>
    </div>
</div>
@endforeach