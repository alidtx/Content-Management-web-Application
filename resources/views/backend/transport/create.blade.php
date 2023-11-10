@extends('backend.layouts.app') 

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">University Transport Route {{ !empty($editData)? 'Update' : 'Add' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Transport</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <a href="{{route('transport.list')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> Transport List</a>
            </div>
            
           
            <div class="card-body">
                <form action="{{ !empty($editData)? route('transport.update',$editData->id) : route('transport.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="route_title"> Route Title</label>
                                <input type="text" class="form-control @error('route_title') is-invalid @enderror" id="route_title" name="route_title" placeholder="Route Title" value="{{ !empty($editData)? $editData->route_title : old('route_title')}}">
                                @error('route_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="start_point"> Start point</label>
                                <input type="text" class="form-control @error('start_point') is-invalid @enderror" id="start_point" name="start_point" placeholder="Start Point" value="{{ !empty($editData)? $editData->start_point : old('start_point')}}" >
                                @error('start_point')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="end_point">End point</label>
                                <input type="text" class="form-control @error('end_point') is-invalid @enderror" id="end_point" name="end_point" placeholder="End Point" value="{{ !empty($editData)? $editData->end_point : old('end_point')}}">
                                @error('end_point')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror
                            </div>
                            
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="transport_up_root"> Up Route</label>
                                <input type="text" class="form-control @error('transport_up_root') is-invalid @enderror" id="transport_up_root" name="transport_up_root" placeholder="Up Route" value="{{ !empty($editData)? $editData->transport_up_root : old('transport_up_root')}}">
                                @error('transport_up_root')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="transport_down_root"> Down Route</label>
                                <input type="text" class="form-control @error('transport_down_root') is-invalid @enderror" id="transport_down_root" name="transport_down_root" placeholder="Down Route" value="{{ !empty($editData)? $editData->transport_down_root : old('transport_down_root')}}">
                                @error('transport_down_root')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection