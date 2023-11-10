@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update News | Event | Notice' : 'Add News | Event | Notice' }}</h1> --}}
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">News | Event | Notice</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

        <div class="card card-outline card-info">
            <div class="card-header">
                <h5 class="m-0 text-dark float-left">{{ !empty($editData)? 'Update News | Event | Notice' : 'Add News | Event | Notice' }}</h5>
                <a href="{{ route('news.list') }}" class="btn btn-info btn-sm float-right"><i class="fas fa-stream"></i> View News | Event | Notice</a>
            </div>
            <div class="card-body">
                <form id="newsForm" action="{{ !empty($editData)? route('news.update',$editData->id) : route('news.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                        @csrf
                        <div class="form-row">

                            <div class="form-group col-sm-9">
                                <label>Title</label>
                                <input id="title" type="text"
                                    value="{{ !empty($editData->title) ? $editData->title : old('title') }}"
                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                    placeholder="Title"> @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3">
                                <label>File<small style="color: brown"> (Max 2 mb)</small></label>
                                <input type="file"
                                    class="form-control filer_input_single @error('file') is-invalid @enderror"
                                    name="file"> @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Date</label>
                                <input id="date" type="text"
                                    value="{{ !empty($editData->date) ? date('d-m-Y', strtotime($editData->date)) : old('date') }}"
                                    class="form-control singledatepicker @error('date') is-invalid @enderror" name="date"
                                    placeholder="Date"> @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Image<small style="color: brown"> (Max 2 mb)</small></label>
                                <input type="file"
                                    class="form-control filer_input_single @error('image') is-invalid @enderror"
                                    name="image"> @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="">Select Type</option>
                                    <option value="1" {{ @$editData->type == '1' ? 'selected' : '' }}>News</option>
                                    <option value="2" {{ @$editData->type == '2' ? 'selected' : '' }}>Event</option>
                                    <option value="3" {{ @$editData->type == '3' ? 'selected' : '' }}>Notice</option>
                                    {{-- <option value="4" {{(@$editData->type == '4')?('selected'):''}}>General Notice</option>
                                <option value="5" {{(@$editData->type == '5')?('selected'):''}}>Special Notice</option>
                                <option value="6" {{(@$editData->type == '6')?('selected'):''}}>Tender Notice</option> --}}
                                </select>
                            </div>
                            {{-- <div class="form-group  col-md-3" style="margin-top: 32px;">

                            <input id="display_on_scrollbar" type="checkbox" value="1" class="form-check-input @error('display_on_scrollbar') is-invalid @enderror" name="display_on_scrollbar" checked>
                            <label for="display_on_scrollbar" class="form-check-label">Display on Scrollbar</label>
                            @error('display_on_scrollbar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}
                            <div class="col-sm-3" style="margin-top: 35px;">
                                <div class="form-check" style="margin-left: 5px;">
                                    <input type="checkbox" name="display_on_scrollbar" class="form-check-input"
                                        id="display_on_scrollbar" value="1"
                                        {{ @$editData->display_on_scrollbar == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="display_on_scrollbar">Display on Scrollbar</label>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Short Description</label>
                                <textarea id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror"
                                    name="short_description">{{ !empty($editData->short_description) ? $editData->short_description : old('short_description') }}</textarea>
                                @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Start Date</label>
                                <input id="start_date" type="text"
                                    value="{{ !empty($editData->start_date) ? date('d-m-Y', strtotime($editData->start_date)) : old('start_date') }}"
                                    class="form-control singledatepicker @error('start_date') is-invalid @enderror"
                                    name="start_date" placeholder="Start Date"> @error('start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3">
                                <label>End Date</label>
                                <input id="end_date" type="text"
                                    value="{{ !empty($editData->end_date) ? date('d-m-Y', strtotime($editData->end_date)) : old('end_date') }}"
                                    class="form-control singledatepicker @error('end_date') is-invalid @enderror"
                                    name="end_date" placeholder="End Date"> @error('end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @include('backend.layouts.pertials.faculty_wise_department')

                            <div class="form-group col-sm-6">

                                @php
                                    $office_infos = \App\Models\Office::all();
                                @endphp
                                <label class="control-label">Office</label>
                                <select id="office_id" class="form-control form-control-sm select2" name="office_id">
                                    <option value="">All</option>
                                    @foreach ($office_infos as $office_info)
                                        <option @if (!empty($editData) && $editData->office_id == $office_info->ucam_office_id) selected @endif
                                            value="{{ $office_info->ucam_office_id }}">{{ $office_info->name }}</option>
                                    @endforeach

                                </select>
                                @error('office_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">

                                @php
                                    $club_infos = \App\Models\Club::all();
                                @endphp
                                <label class="control-label">Club</label>
                                <select id="club_id" class="form-control form-control-sm select2" name="club_id">
                                    <option value="">All</option>
                                    @foreach ($club_infos as $club_info)
                                        <option @if (!empty($editData) && $editData->club_id == $club_info->id) selected @endif
                                            value="{{ $club_info->id }}">{{ $club_info->name }}</option>
                                    @endforeach

                                </select>
                                @error('club_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">

                                @php
                                    $cpc_list = \App\Models\Cpc::all();
                                @endphp
                                <label class="control-label">Cpc</label>
                                <select id="cpc_id" class="form-control form-control-sm select2" name="cpc_id">
                                    <option value="">All</option>
                                    @foreach ($cpc_list as $cpc)
                                        <option @if (!empty($editData) && $editData->cpc_id == $cpc->id) selected @endif
                                            value="{{ $cpc->id }}">{{ $cpc->name }}</option>
                                    @endforeach

                                </select>
                                @error('club_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Author</label>
                                <input id="author" type="text"
                                    value="{{ !empty($editData->author) ? $editData->author : old('author') }}"
                                    class="form-control @error('author') is-invalid @enderror" name="author"
                                    placeholder=""> @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- <div class="form-group col-sm-6">
                            <label>Short Description</label>
                            <textarea id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror textarea" name="short_description">{{ !empty($editData->short_description)? $editData->short_description : old('short_description') }}</textarea>
                            @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>                  --}}
                            <div class="form-group col-sm-12">
                                <label>Long Description</label>
                                <textarea id="long_description" type="text"
                                    class="form-control @error('long_description') is-invalid @enderror textarea" name="long_description">{{ !empty($editData->long_description) ? $editData->long_description : old('long_description') }}</textarea>
                                @error('long_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                        </div>
                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i>
                            {{ !empty($editData) ? 'Update ' : 'Save' }}</button>
                    </form>

                </div>

            </div>
            <!--/. container-fluid -->
    </section>
@endsection
