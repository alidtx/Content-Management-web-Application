@extends('backend.layouts.app') 
@section('content')
    <style>
        .radio_container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #cecece;
            width: 420px;
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
            width: 90px;
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
                    <h1 class="m-0 text-dark">{{ !empty($editData) ? 'Update Message' : 'Add Message' }}</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Message</li>
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

            <div class="card">
                <div class="card-header">
                    <a href="{{ route('message') }}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i>
                        View Message</a>
                </div>
                <div class="card-body">
                    <form
                        action="{{ !empty($editData) ? route('message.update', $editData->id) : route('message.store') }}"
                        method="post" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <div class="container">
                                    <div class="radio_container" id="type" name="type">
                                        <input type="radio" onclick="radio_handle(1)" class="type_id"
                                            name="type_id" id="radio_faculty" value="1"
                                            {{ @$editData->type_id == '1' || @$editData->type_id == '' ? 'checked' : '' }}>
                                        <label for="radio_faculty">Faculty</label>

                                        <input type="radio" onclick="radio_handle(2)" class="type_id"
                                            name="type_id" id="radio_dept" value="2"
                                            {{ @$editData->type_id == '2' ? 'checked' : '' }}>

                                        <label for="radio_dept">Department</label>
                                        <input type="radio" onclick="radio_handle(3)" class="type_id"
                                            name="type_id" id="radio_office" value="3"
                                            {{ @$editData->type_id == '3' ? 'checked' : '' }}>
                                        <label for="radio_office">Office</label>
                                        <input type="radio" onclick="radio_handle(4)" class="type_id"
                                            name="type_id" id="radio_hall" value="4"
                                            {{ @$editData->type_id == '4' ? 'checked' : '' }}>
                                        <label for="radio_hall">Hall</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Category</label>
                                <select id="category_id" @if (!empty($editData))  @endif
                                    class="form-control form-control-sm select2" name="category_id">
                                    <option value="" selected>Please Select</option>
                                    
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Member</label>
                                <input type="text" class="form-control @error('member') is-invalid @enderror"
                                    name="member" id="member" autocomplete="off"
                                    value="{{ !empty($editData->profile->name) ? $editData->profile->name : old('profile') }} "
                                    readonly>
                                @error('member')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="hidden" class="form-control @error('profile_id') is-invalid @enderror"
                                    name="profile_id" id="profile_id" autocomplete="off"
                                    value="{{ !empty($editData->profile->id) ? $editData->profile->id : old('profile_id') }} "
                                    readonly>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Title First Part</label>
                                <input id="title_first_part" type="text"
                                    value="{{ !empty($editData->title_first_part) ? $editData->title_first_part : old('title_first_part') }}"
                                    class="form-control @error('title_first_part') is-invalid @enderror"
                                    name="title_first_part" placeholder="Message Title First Part">
                                @error('title_first_part')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Status</label>
                                <select id="status" @if (!empty($editData))  @endif
                                    class="form-control form-control-sm select2" name="status">
                                    <option value="">Please Select</option>
                                    <option value="1" {{ @$editData->status == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ @$editData->status == '0' ? 'selected' : '' }}>Inactive</option>
                                    
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Short Description</label>
                                <textarea type="text" class="form-control @error('short_description') is-invalid @enderror textarea"
                                    name="short_description">{{ !empty($editData->short_description) ? $editData->short_description : old('short_description') }}</textarea>
                                @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Long Description</label>
                                <textarea type="text" class="form-control @error('long_description') is-invalid @enderror textarea"
                                    name="long_description">{{ !empty($editData->long_description) ? $editData->long_description : old('long_description') }}</textarea>
                                @error('long_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <button class="btn bg-gradient-success btn-sm"><i class="fas fa-save"></i>
                                {{ !empty($editData) ? 'Update' : 'Save' }}</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
        <!--/. container-fluid -->
    </section>

    <script>
        $(function() {
            @if (@$editData->type_id == 3)
                radio_handle(3);
            @elseif (@$editData->type_id == 4)
                radio_handle(4);
            @elseif (@$editData->type_id == 2)
                radio_handle(2);
            @else
                radio_handle(1);
            @endif
        });


        function radio_handle(val) {
            var type_id_value = val;
            $.ajax({
                url: "{{ route('type_wise_category') }}",
                type: "GET",
                data: {
                    type_id: type_id_value
                },
                success: function(data) {
                    if (data != 'fail') {
                        $('#category_id').html('<option value ="">Please Select</option>');
                        if ("{{ @$editData->type_id }}" == type_id_value) {
                            var selected = "{{ @$editData->category_id }}";
                        } else {
                            var selected = "";
                        }
                        $.each(data, function(index, category) {

                            $('#category_id').append('<option value ="' + category.id + '"' + ((category
                                    .id == selected) ? ('selected') : '') + '>' + category.name +
                                '</option>');
                        });
                    } else {
                        $('#category_id').html('');
                    }
                    $('#category_id').trigger('change');
                }
            });
        };
    </script>

    <script>
        $(document).on('select change', '#category_id', function() {
            var category_id = $('#category_id').val();
            var type_id = $('input[name="type_id"]:checked').val();
            $.ajax({
                url: "{{ route('category_wise_head') }}",
                type: "GET",
                data: {
                    category_id: category_id,
                    type_id: type_id
                },
                success: function(data) {

                    if (data != 'fail' && type_id == 1) {

                        $("#member").val(data?.profile?.nameEn);
                        $("#profile_id").val(data?.profile?.id);
                    } else if (data != 'fail' && (type_id == 2 || type_id == 3 || type_id == 4)) {
                        $("#member").val(data?.nameEn);
                        $("#profile_id").val(data?.id);
                    } else {
                        $('#member').val('');
                        $("#profile_id").val('');
                    }
                }
            });
        });
    </script>
@endsection
