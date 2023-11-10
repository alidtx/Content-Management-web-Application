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
                    <h1 class="m-0 text-dark">{{ !empty($editData) ? 'Update Trainee' : 'Add Trainees' }}
                    </h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Trainee</li>
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
                <div class="card-header row">
                   
                </div>
                <form method="post"  action="{{ !empty($editData) ? route('oefcd.staff.training_event.trainee_update', $editData->id) : route('oefcd.staff.training_event.trainee_store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-sm-4">
                                <label class="control-label">Training Title</label>
                                <input type="text" class="form-control" value="{{$training->title}}" disabled>
                                 <input type="hidden" name="training_id" value="{{$training->id}}">
                                 <input type="hidden" name="type" value="2">
                            </div>
                         
                            <div class="form-group col-sm-4">
                                <label class="control-label">Trainees</label>
                                <select id="trainee_id" @if (!empty($editData))  @endif
                                    class="form-control form-control-sm select2" name="trainee_id">
                                    <option value="" selected>Select Trainer</option>
                                    @foreach ($trainer_list as $profile)
                                        <option value="{{ @$profile->id }}"
                                            {{ @$editData->member_id == $profile->id ? 'selected' : '' }}>
                                            {{ $profile->nameEn }}</option>
                                    @endforeach

                                </select>
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
        
    </script>
 

 
@endsection
