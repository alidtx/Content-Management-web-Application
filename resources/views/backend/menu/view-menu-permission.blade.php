@extends('backend.layouts.app')
@section('content')
<style type="text/css">
  input[type=checkbox] {
    cursor: pointer;
    height: 30px;
    margin:4px 0 0;
    position: absolute;
    opacity: 0;
    width: 30px;
    z-index: 2;
  }

  input[type=checkbox] + span {
    background: #e74c3c;
    border-radius: 50%;
    box-shadow: 0 2px 3px 0 rgba(0,0,0,.1);
    display: inline-block;
    height: 30px;
    margin:4px 0 0;
    position:relative;
    width: 30px;
    transition: all .2s ease;
  }

  input[type=checkbox] + span::before, input[type=checkbox] + span::after{
    background:#fff;
    content:'';
    display:block;
    position:absolute;
    width:4px;
    transition: all .2s ease;
  }

  input[type=checkbox] + span::before{
    height:16px;
    left:13px;
    top:7px;
    -webkit-transform:rotate(-45deg);
    transform:rotate(-45deg);
  }

  input[type=checkbox] + span::after{
    height:16px;
    right:13px;
    top:7px;
    -webkit-transform:rotate(45deg);
    transform:rotate(45deg);
  }

  input[type=checkbox]:checked + span {
    background:#2ecc71;         
  }

  input[type=checkbox]:checked + span::before{
    height: 9px;
    left: 9px;
    top: 13px;
    -webkit-transform:rotate(-47deg);
    transform:rotate(-47deg);
  }

  input[type=checkbox]:checked + span::after{
    height: 15px;
    right: 11px;
    top: 8px;
  }
</style>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h2 class="m-0 text-dark">@lang('Menu') @lang('Permission')</h2>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
          <li class="breadcrumb-item active">@lang('Permission')</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <form method="post" action="{{route('user.permission.store')}}">
          @csrf
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th style="width:2%">#</th>
                <th>Page Name</th>
                @foreach($role as $r)
                <th class="text-center">{{$r->name}}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach($parent_menu_all as $mm_key => $mm)
              <tr>
                <td colspan="{{ count($role)+2 }}">{{ $mm_key+1 }} . {{ $mm->name }}</td>
              </tr>
              @php
              $child_menus = App\Models\Menu::with(['menu_routes'])->where('parent',$mm->id)->where([['id','!=',1],['status','1']])->orderBy('sort','asc')->get();
              @endphp
              @foreach($child_menus as $c_key =>$c)
              <tr>
                <td style="vertical-align: middle;">{{ $mm_key+1 }}.{{ $c_key+1 }}</td>
                <td style="vertical-align: middle;">{{$c->name}}</td>
                @foreach($role as $r)
                <td class="text-center" style="font-size: 12px;"> 
                  <div style="display: flex;justify-content: center;">
                    <div>
                      @php
                      $check_permission = App\Models\MenuPermission::where('menu_id',$c->id)->where('role_id',$r->id)->where('menu_from','menu')->first();
                      @endphp
                      <input type="checkbox" name="menu_list[]" value="menu_id={{$c->id}}@role_id={{$r->id}}@permitted_route={{$c->route}}@menu_from=menu" {{ ($check_permission?'checked':'') }}/>
                      <span></span><br/>View
                    </div>
                    @foreach($c->menu_routes as $csms)
                    <div class="mx-2">
                      @php
                      $check_permission = App\Models\MenuPermission::where('menu_id',$csms->menu_id)->where('role_id',$r->id)->where('menu_from','menu_route')->where('permitted_route',$csms->route)->first();
                      @endphp
                      <input type="checkbox" name="menu_list[]" value="menu_id={{$csms->menu_id}}@role_id={{$r->id}}@permitted_route={{$csms->route}}@menu_from=menu_route" {{ ($check_permission?'checked':'') }}/>
                      <span></span><br/>{{ $csms->name }}
                      {{-- <span></span><br/>{{ $c->id }} --}}
                    </div>
                    @endforeach
                  </div>
                </td>
                @endforeach
              </tr>
              @endforeach
              @endforeach
            </tbody>
          </table>        
          <div class="card">
            <div class="card-body">
              <button type="submit" class="btn btn-info btn-sm"><i class="ion-upload"></i>Menu Permission Add</button>
            </div>      
          </div> 
        </form>
      </div>
    </div>
  </div>
</div>
<style>
  .preload{
    position:fixed;
    top: 0;
    left:0;
    height:100vh;
    width: 100vw;
    display:flex;
    justify-content:center;
    align-items: center;
    background:rgba(35, 35, 35, 0.8);
  }
</style>

<div class="preload" style="display: none;">
  <img src="{{url('public/backend/images/loading/loading.gif')}}" class="" alt="Error">
</div>
@endsection