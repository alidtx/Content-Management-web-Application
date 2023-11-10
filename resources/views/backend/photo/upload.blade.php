@extends('backend.layouts.app')

<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

<link rel='stylesheet' href='https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'>
<link rel='stylesheet' href='https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css'>
<link href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style>
    .filepond--drop-label {
        color: #4c4e53;
    }

    .filepond--label-action {
        text-decoration-color: #babdc0;
    }

    .filepond--panel-root {
        border-radius: 2em;
        background-color: #edf0f4;
        height: 1em;
    }

    .filepond--item-panel {
        background-color: #595e68;
    }

    .filepond--drip-blob {
        background-color: #7f8a9a;
    }

    .filepond--item {
        width: calc(20% - 0.5em);
    }
</style>
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark">Photo Gallery Add</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Photo Gallery')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h5>
                        @if (isset($editData))
                            @lang('Photo Gallery') @lang('Update')
                        @else
                            @lang('Photo Gallery') @lang('Add')
                        @endif
                        <a class="btn btn-sm btn-success float-right" href="{{ route('setup.photo') }}"><i
                                class="fa fa-list"></i> @lang('Photo Gallery') @lang('List')</a>
                    </h5>
                </div>

                <form id="addForm" method="post" action="{{ route('submitImage') }}" enctype="multipart/form-data">
                    <div class="form-group col-md-12">
                        <label for="title">@lang('Title')</label>
                        <input id="title" type="text" name="title" class="form-control"
                            value="{{ @$editData->title }}" placeholder="">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="file" name="image" id='image' class='p-5' multiple
                            data-allow-reorder="true" data-max-file-size="3MB" data-max-files="10">
                    </div>
                    <div class="mb-3" style="display: flex; justify-content:end">
                        <button type="submit" id='saveBtn' class="btn btn-primary">Save</button>
                    </div>
                </form>
                <!--Form End-->
            </div>
        </div>

        <script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>

        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src='https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js'></script>
        <script src='https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js'></script>
        <script src='https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js'></script>
        <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>



        <script>
            FilePond.registerPlugin(
                // encodes the file as base64 data
                FilePondPluginFileEncode,
                // validates the size of the file
                FilePondPluginFileValidateSize,
                // corrects mobile image orientation
                FilePondPluginImageExifOrientation,
                FilePondPluginFilePoster,
                // previews dropped images
                FilePondPluginImagePreview,
                FilePondPluginImageCrop,
                FilePondPluginImageEdit,

            )


            //configuration filepond
            // const inputElement = document.querySelector('input[id="image"]');
            // Create a FilePond instance
            // const pond = FilePond.create(inputElement);


            const pond = FilePond.create(
                document.querySelector('input[id="image"]'), {
                    labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,

                    // stylePanelLayout: 'compact circle',
                    // styleLoadIndicatorPosition: 'center bottom',
                    styleProgressIndicatorPosition: 'right bottom',
                    styleButtonRemoveItemPosition: 'left bottom',
                    styleButtonProcessItemPosition: 'right bottom',
                    // allowImageCrop: true,
                    imagePreviewHeight: 200,
                    imageCropAspectRatio: '1:1',
                    imageResizeTargetWidth: 200,
                    imageResizeTargetHeight: 200,
                }
            );

            //tujuan filepond
            FilePond.setOptions({
                server: {
                    process: '{{ route('upload') }}', //upload
                    revert: (uniqueFileId, load, error) => {
                        //delete file
                        deleteImage(uniqueFileId);
                        error('Error terjadi saat delete file');
                        load();
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            });
            //end config filepond
            function deleteImage(nameFile) {
                $.ajax({
                    url: '{{ route('hapus') }}',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "DELETE",
                    data: {
                        image: nameFile
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(response) {
                        console.log('error')
                    }
                });
            }
            $(document).ready(function() {
                $("#addForm").on('submit', function(e) {
                    e.preventDefault();
                    $("#saveBtn").html('Processing...').attr('disabled', 'disabled');
                    var link = $("#addForm").attr('action');
                    $.ajax({
                        url: link,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            $("#saveBtn").html('Save').removeAttr('disabled');
                            pond.removeFiles(); //clear
                            alert('Success');
                        },
                        error: function(response) {
                            $("#saveBtn").html('Save').removeAttr('disabled');
                            alert(response.error);
                        }
                    });
                });
            });
        </script>
    @endsection
