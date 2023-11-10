@extends('backend.layouts.app')
@section('content')
    <style>
        .radio_container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #cecece;
            width: 280px;
            border-radius: 9999px;
            box-shadow: inset 0.5px 0.5px 2px 0 rgba(0, 0, 0, 0.15);
        }

        input[type="radio"] {
            appearance: none;
            display: none;
        }

        .radio_container label {
            font-size: .875rem;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: inherit;
            width: 110px;
            text-align: center;
            border-radius: 9999px;
            overflow: hidden;
            transition: linear 0.3s;
            margin-top: 8px;
        }

        input[type="radio"]:checked+label {
            background-color: #1e90ff;
            color: #f1f3f5;
            font-weight: 900;
            transition: 0.3s;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 20px;
        }
    </style>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">{{ !empty($editData) ? 'CHSR Office' : 'Add CHSR Office Member' }}
                    </h1> --}}
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">CHSR Office</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h5 class="m-0 text-dark float-left">{{ !empty($editData) ? 'CHSR Office' : 'Add CHSR Office Member' }}
                    </h5>
                    <a href="{{ route('chsr.about.office') }}" class="btn btn-info btn-sm float-right"><i class="fas fa-stream"></i> CHSR
                        Office List</a>
                </div>
                <form id=""
                    action="{{ !empty($editData) ? route('chsr.about.store', $editData->id) : route('chsr.about.store') }}"
                    method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                <label class="control-label">CHSR Office</label>
                                <select id="chsr_office_category" @if (!empty($editData))  @endif
                                    class="form-control form-control-sm select2" name="chsr_office_category">
                                    <option value="">Select CHSR office</option>
                                    <option value="1" {{@$editData->chsr_office_category == 1 ? 'selected' : ''}}>Dean</option>
                                    <option value="2" {{@$editData->chsr_office_category == 2 ? 'selected' : ''}}>Director's Info</option>
                                    <option value="3" {{@$editData->chsr_office_category == 3 ? 'selected' : ''}}>Deputy Director's Info</option>
                                    <option value="4" {{@$editData->chsr_office_category == 4 ? 'selected' : ''}}>Assistant Director's Info</option>
                                    <option value="5" {{@$editData->chsr_office_category == 5 ? 'selected' : ''}}>Officer's Info</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-4">
                                <label class="control-label">Name</label>
                                <select id="profile_id" @if (!empty($editData))  @endif
                                    class="form-control form-control-sm select2" name="profile_id">
                                    <option value="" selected>Select Name</option>
                                    @foreach ($profiles as $profile)
                                        <option value="{{ @$profile->id }}" {{ @$editData->profile_id == $profile->id ? 'selected' : ''}}>{{ $profile->nameEn }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="control-label">Rank</label>
                                <input type="text" class="form-control @error('rank') is-invalid @enderror"
                                    name="rank" id="rankName" autocomplete="off"
                                    value="{{ !empty($editData->rank) ? @$editData->rank : old('rank') }} " readonly>
                                @error('rank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @php
                                $designations = \App\Models\Designation::where('purpose', 5)->get();
                            @endphp
                            <div class="form-group col-sm-4">
                                <label>Designation</label>
                                <select id=""
                                    class="form-control form-control-sm select2" name="designation_id">
                                    <option value="">Select</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}" {{@$editData->designation_id == $designation->id ? 'selected' : ''}}>{{ $designation->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-sm-4" style="margin-bottom: 0;">
                                <label>Room No</label>
                                <input id="title" type="text"
                                    value="{{ !empty($editData->room_no) ? $editData->room_no : old('room_no') }}"
                                    class="form-control @error('room_no') is-invalid @enderror" name="room_no"
                                    placeholder="Room No"> @error('room_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4" style="margin-bottom: 0;">
                                <label>Email</label>
                                <input id="email" type="email"
                                    value="{{ !empty($editData->email) ? date('d-m-Y', strtotime($editData->email)) : old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    placeholder="Email"> @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <div class="form-check" style="margin-left: 5px;">
                                    <input type="checkbox" name="status" class="form-check-input" id="status"
                                        value="1" {{ @$editData->status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Active/Inactive</label>
                                </div>
                            </div>

                        </div>
                        <button class="btn bg-gradient-success btn-flat mt-4"><i class="fas fa-save"></i>
                            {{ !empty($editData) ? 'Update ' : 'Save' }}</button>

                    </div>
                </form>

            </div>
            <!--/. container-fluid -->
    </section>

    <script type="text/javascript">
        $(document).ready(function() {

            $(".btn-success").click(function() {
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });

        });
    </script>

    <script id="extra_taught_courses_templete" type="text/x-handlebars-template">
    <div class="row remove_taught_courses_extra_div" style="margin-top: 2px;margin-left: 0; margin-right:0;">
        <div class="col-11" style="border: 2px solid #e6e6b9;padding: 20px;border-radius: 10px 0px 0px 10px;">
            <div class="row">
                <div class="form-group col-sm-12">
                    <label>Upload new Attachments</label>
                    <input id="attachment" type="file" value="" multiple="multiple" class="form-control @error('attachment') is-invalid @enderror" name="attachment[@{{counter}}]"> @error('attachment')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> @enderror
                </div>
            </div>
        </div>
        <div class="col-1" style="text-align: center;writing-mode: vertical-lr;background: #e6e6b9;border-radius: 0px 10px 10px 0px;">

            <div class="form-group col-md-2">
                <i class="btn btn-info fa fa-plus-circle add_taught_courses_extra"></i>
                <i class="btn btn-danger fa fa-minus-circle remove_taught_courses_extra"> </i>
            </div>

        </div>
    </div>
</script>

    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 10000;
            $(document).on("click", ".add_taught_courses_extra", function() {
                var source = $("#extra_taught_courses_templete").html();
                var template = Handlebars.compile(source);
                var data = {
                    counter: counter
                };
                var html = template(data);
                counter++;
                $("#extra_taught_courses_div_here").append(html);
                $('.select2').select2();
            });

            $(document).on("click", ".remove_taught_courses_extra", function(event) {
                $(this).closest(".remove_taught_courses_extra_div").remove();
            });
        });
    </script>

    {{-- <script>
        $(document).on('select change', '#member_id', function() {
            var member_id = $('#member_id').val();
            $.ajax({
                url: "{{ route('member_wise_designation') }}",
                type: "GET",
                data: {
                    member_id: member_id
                },
                success: function(data) {
                    console.log(data);
                    if (data != 'fail') {
                        $("#designation_id").val(data);
                    } else {
                        $('#designation_id').append('');
                    }
                }
            });
        });
    </script> --}}


    <script>
        $(document).on('select change', '#profile_id', function() {
            var profile_id = $('#profile_id').val();
            // alert(profile_id);
            $.ajax({
                url: "{{ route('profile_wise_rank') }}",
                type: "GET",
                data: {
                    profile_id: profile_id
                },
                success: function(data) {
                    console.log(data.rank);
                    if (data != 'fail') {
                        $("#rankName").val(data.rank);
                        $("#email").val(data.email);
                    } else {
                        $('#rankName').append('');
                    }
                }
            });
        });
    </script>
@endsection
