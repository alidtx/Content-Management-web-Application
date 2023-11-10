@extends('backend.layouts.app')
@section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h4 class="m-0 text-dark"> @lang('Newsletter Management')</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('OEFCD')</li>
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
            <div class="card">
                <div class="card-header">
                    <h6 class="">OEFCD</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="bg-success p-2 text-center">
                                <a href="{{ route('development_program') }}" class="card-link">Faculty Development
                                    Program</a>
                                </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="bg-success p-2 text-center">
                                <a href="{{ route('oefcd.staff.training.list') }}" class="card-link">Staff Training</a>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="bg-success p-2 text-center">
                                <a href="{{ route('international.affair') }}" class="card-link">International Affairs</a>
                                </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="bg-success p-2 text-center">
                                <a href="{{ route('manage_workshop_seminar') }}" class="card-link">IQAC</a>
                                </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="bg-success p-2 text-center">
                                <a href="http://apa.bup.edu.bd/" target="_blank" class="card-link">APA</a>
                                </h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
