@extends('backend.layouts.app') 

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Transport Route Schedule {{ !empty($editData)? 'Update' : 'Add' }}</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Transport Schedule</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <a href="{{route('route.time.list', $mine->id)}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> Back</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('route.time.update',$editData->id) : route('route.time.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="transport_id">Transport Route Title</label>
                                <input type="text" class="form-control" value="{{$mine->route_title}}" disabled>
                                {{-- <select class="form-control" id="transport_id" name="transport_id">
                                  <option value="" {{ !empty($editData)? '' : 'selected' }}>Select an option</option>
                                  @foreach($transports as $item)
                                  <option value="{{ $item->id }}" {{ @$editData->transport_id == $item->id ? 'selected' : '' }}>{{ $item->route_title }}</option>
                                  @endforeach
                                </select> --}}
                                <input class="d-none" type="text" value="{{$mine->id}}" name="transport_id">
                            </div>

                            <div class="form-group">
                                <label for="start_time">Start Time</label>
                                <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" placeholder="Start Point" value="{{ !empty($editData)? $editData->start_time : old('start_time')}}" >
                                @error('start_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="end_time">End Time</label>
                                <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" placeholder="End Point" value="{{ !empty($editData)? $editData->end_time : old('end_time')}}" >
                                @error('end_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="route_way">Transport Route </label>
                                <select class="form-control @error('route_way') is-invalid @enderror" id="route_way" name="route_way">
                                  <option value="" {{ !empty($editData)? 'selected' : '' }}>Select an option</option>
                                    <option value="1" {{ @$editData->route_way == "1" ? 'selected' : '' }}>Up way</option>
                                    <option value="2" {{ @$editData->route_way == "2" ? 'selected' : '' }}>Down way</option>
                                </select>
                                @error('route_way')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            
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