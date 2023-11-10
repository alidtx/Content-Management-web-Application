@extends('backend.layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Top Menu</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Top Menu</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content-header">
    <div class="conyainer-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('frontend-menu.top_menu')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Menu</a>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{!empty($editData->id) ? route('frontend-menu.top_menu.update',$editData->id) : route('frontend-menu.top_menu.store')}}" id="myForm">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-md-6">
                                    <label>Menu Name</label>
                                    <input type="text" name="menu_name" class="form-control" placeholder="Menu type name" value="{{@$editData->menu_name}}">
                                </div>

                                <div class="col-md-12">
                                    <label for=""></label>
                                    <br>
                                    <button type="submit" class="btn btn-primary">{{(@$editData) ? 'Update' : 'Submit'}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
