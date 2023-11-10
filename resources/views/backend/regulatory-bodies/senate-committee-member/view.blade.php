@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">List of Committee Member</h1> --}}
                    {{-- <h1 class="m-0 text-dark">List of Senate Committee Member</h1> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Department')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script type="text/javascript">
                $(function() {
                    $.notify("{{ $error }}", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                });
            </script>
        @endforeach
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h5>Committee Member
                            <a class="btn btn-sm btn-primary float-right"
                                href="{{ route('regulatory_bodies.senate.committee.member.add') }}"><i
                                    class="fa fa-plus-circle"></i> Committee Member Add</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-sm table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Committee</th>
                                    <th>Post</th>
                                    <th>Order</th>
                                    <th>Image</th>
                                    <th style="width:3%">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($committes as $committe)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ isset($committe->profile->nameEn) ? $committe->profile['nameEn'] : '' }}
                                        </td>
                                        <td>{{ isset($committe->committeeType->name) ? $committe->committeeType->name : '' }}
                                        </td>
                                        @if ($committe->post_id == 1)
                                            <td>Chairman</td>
                                        @elseif($committe->post_id == 2)
                                            <td>Vice-Chairman</td>
                                        @elseif($committe->post_id == 3)
                                            <td>Secretary</td>
                                        @else($committe->post_id == 4)
                                            <td>Member</td>
                                        @endif

                                        <td>{{ $committe->sort }}</td>
                                        <td>
                                            <img src="{{ asset('public/upload/profiles/' . $committe->profile->photo) }}"
                                                onerror="this.onerror=null;this.src='{{ asset('public/upload/user-dummy.jpeg') }}';"
                                                width="100" alt="Image" />
                                            {{-- <img src="{{ asset('public/upload/profiles/' . $committe->getProfile->photo) }}"
                                                width="100" alt="userImage"> --}}
                                            {{-- <img src="{{ isset($comitte->getProfile[0]['photo_path']) ? $comitte->getProfile[0]['photo_path'] : ''}}" alt="userImage"> --}}
                                        </td>
                                        <td>
                                            <a href="{{ route('regulatory_bodies.senate.committee.member.edit', ['id' => $committe->id]) }}"
                                                class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>

                                            @if (@$committe->status == 0)
                                                <a onclick="event.preventDefault(); document.getElementById('approve_program_form{{ @$committe->id }}').submit();"
                                                    class="btn btn-danger" style="background: #e99e9e;"><i
                                                        class="fa fa-times"></i></a>
                                            @else
                                                <a onclick="event.preventDefault(); document.getElementById('approve_program_form{{ @$committe->id }}').submit();"
                                                    class="btn btn-success" style="background: #0ad714;"><i
                                                        class="fa fa-check"></i></a>
                                            @endif
                                            <form style="display: none;" method="post"
                                                id="approve_program_form{{ @$committe->id }}"
                                                action="{{ route('member.status.change', @$committe->id) }}">
                                                @csrf
                                                <input type="hidden" name="status"
                                                    @if (@$committe->status == 1) value="0" @else value="1" @endif>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
