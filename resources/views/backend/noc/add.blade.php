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
                    <h1 class="m-0 text-dark">{{ !empty($editData) ? 'Update NOC/Office Order' : 'Add NOC/Office Order' }}
                    </h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">NOC/Office Order</li>
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
                <form id=""
                    action="{{ !empty($editData) ? route('noc.update', $editData->id) : route('noc.store') }}"
                    method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card-header row">
                        <div class="col-md-6">
                            <div class="container">
                                <div class="radio_container" id="type" name="type">
                                    <input type="radio" onclick="radio_handle(1)" class="category_type"
                                        name="category_type" id="radio_dept" value="1"
                                        {{ @$editData->type == '1' ? 'checked' : '' }} checked>
                                    <label for="radio_dept">Department</label>
                                    <input type="radio" onclick="radio_handle(2)" cWlass="category_type"
                                        name="category_type" id="radio_office" value="2"
                                        {{ @$editData->type == '2' ? 'checked' : '' }}>
                                    <label for="radio_office">Office</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('noc.list') }}" class="btn btn-info btn-sm"><i
                                    class="fas fa-stream"></i> View NOC/Office Order</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                <label class="control-label">Department/Office</label>
                                <select id="category_id" @if (!empty($editData))  @endif
                                    class="form-control form-control-sm select2" name="category_id">
                                    <option value="" selected>Select Department/office</option> 
                                  
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label class="control-label">Member</label>
                                <select id="member_id" @if (!empty($editData))  @endif
                                    class="form-control form-control-sm select2" name="member_id">
                                    <option value="" selected>Select Member</option>  
                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Designation</label>
                                <input type="text" class="form-control @error('designation_id') is-invalid @enderror"
                                    name="designation_id" id="designation_id" autocomplete="off"
                                    value="{{ !empty($editData->designation_id) ? $editData->designation_id : old('designation_id') }} "
                                    readonly>
                                @error('designation_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-7" style="margin-bottom: 0;">
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
                            <div class="form-group col-sm-3" style="margin-bottom: 0;">
                                <label>Publish Date</label>
                                <input id="publish_date" type="text"
                                    value="{{ !empty($editData->publish_date) ? date('d-m-Y', strtotime($editData->publish_date)) : old('publish_date') }}"
                                    class="form-control singledatepicker @error('publish_date') is-invalid @enderror"
                                    name="publish_date" placeholder="Date"> @error('publish_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-2" style="margin-top: 35px;" style="margin-bottom: 0;">
                                <div class="form-check" style="margin-left: 5px;">
                                    <input type="checkbox" name="status" class="form-check-input" id="status"
                                        value="1" {{ @$editData->status == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Show Status</label>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 increment">     
                                
                                    <label>Existing Files</label>
                            
                                <div class="form-group">
                                     
                                </div>
                              
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Upload new Attachment
                                    <small style="color: brown"> (Max 2 mb)</small>
                                </label>
                                <input id="attachment" type="file" value=""
                                    class="form-control @error('attachment') is-invalid @enderror" name="attachment">
                                @error('attachment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
 
                        </div>
                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i>
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

    <script>
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
    </script>

    <script>
        $(function() {
            @if (@$editData->category_type == 2)
                radio_handle(2);
            @else
                radio_handle(1);
            @endif
        });

        function radio_handle(val) {
            var category_type_value = val;

            $.ajax({
                url: "{{ route('category_wise_deptOrOffice') }}",
                type: "GET",
                data: {
                    category_type_value: category_type_value
                },
                success: function(data) {
                    if (data != 'fail') {
                        $('#category_id').html('<option value ="">Please Select</option>');
                        var selected = "{{ @$editData->category_id }}";
                    
                        $.each(data, function(index, category) {    
                            console.log(selected);
                            $('#category_id').append('<option value ="' + category.id + '"' + ((category
                                    .id == selected) ? ('selected') : '') + '>' + category.name +
                                '</option>');
                        });
                    } else {
                        $('#category_id').append('');
                    }
                }
            });
        };
    </script>
    <script>
        $(document).on('select change', '#category_id', function() {
            var category_id = $('#category_id').val();
            var category_type = $('input[name="category_type"]:checked').val();
            $.ajax({
                url: "{{ route('department_wise_member') }}",
                type: "GET",
                data: {
                    category_id: category_id,
                    category_type: category_type,
                },
                success: function(data) {
                    if (data != 'fail') {
                     
                        $('#member_id').html('<option value ="">Select Member</option>');
                        var selected = "{{ @$editData->id }}";
                        $.each(data, function(index, member) {
        console.log(member.id);
                            $('#member_id').append('<option value ="' + member.id + '"' + ((
                                    member.id == selected) ? ('selected') : '') + '>' +
                                member.name + '</option>');
                        });
                    } else {
                        $('#member_id').append('');
                    }
                }
            });
        });
    </script>
@endsection
