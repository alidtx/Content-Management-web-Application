 @extends('backend.layouts.app')
 @section('content')
     <style type="text/css">
         .i-style {
             display: inline-block;
             padding: 10px;
             width: 2em;
             text-align: center;
             font-size: 2em;
             vertical-align: middle;
             color: #444;
         }

         .demo-icon {
             cursor: pointer;
         }
     </style>
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h4 class="m-0 text-dark">Personal To User</h4>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                         <li class="breadcrumb-item active">@lang('User')</li>
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
                             @lang('User') @lang('Update')
                         @else
                             @lang('User') @lang('Add')
                         @endif
                         <a class="btn btn-sm btn-success float-right" href="{{ route('user') }}"><i class="fa fa-list"></i>
                             @lang('User') @lang('List')</a>
                     </h5>
                 </div>
                 <!-- Form Start-->

                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-12">
                             <form method="post" action="{{ route('personals_user.store') }}" id="myForm"
                                 enctype="multipart/form-data">
                                 {{ csrf_field() }}
                                 <div class="form-row">
                                     <div class="form-group col-md-6">
                                         <label class="control-label">@lang('Select Personal To User') <span
                                                 class="text-red">*</span></label>
                                         <select name="profile_id" id="profileId" class="form-control select2">
                                             <option value="">Select</option>
                                             @foreach ($profiles as $profile)
                                                 <option value="{{ $profile->id }}">{{ $profile->nameEn }}</option>
                                             @endforeach
                                         </select>
                                     </div>
                                     <div class="form-group col-md-6">
                                         <label class="control-label">@lang('Name') <span class="text-red">*</span> </label>
                                         <input type="text" name="name" id="name"
                                             class="form-control form-control-sm" value="{{ @$editData->name }}"
                                             placeholder="Name">
                                     </div>
                                     <div class="form-group col-md-6">
                                         <label class="control-label">@lang('Email') <span class="text-red">*</span> </label>
                                         <input type="email" name="email" id="email"
                                             class="form-control form-control-sm" value="{{ @$editData->email }}"
                                             placeholder="Email" autocomplete="off">
                                         <font color="red">{{ $errors->has('email') ? $errors->first('email') : '' }}
                                         </font>
                                     </div>

                                     <div class="form-group col-md-6">
                                         <label class="control-label">@lang('Mobile No') <span class="text-red">*</span></label>
                                         <input type="text" name="mobile" id="mobile"
                                             class="form-control form-control-sm" value="{{ @$editData->mobile }}"
                                             placeholder="Mobile">
                                         {{-- <input type="number" name="mobile" id="mobile"
                                             class="form-control form-control-sm" value="{{ @$editData->mobile }}"
                                             oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                             maxlength="14" placeholder="Mobile"> --}}
                                         <font color="red">
                                             {{ $errors->has('mobile') ? $errors->first('mobile') : '' }}</font>
                                     </div>
                                     @if (!isset($editData))
                                         <div class="form-group col-md-4">
                                             <label class="control-label">@lang('Password') <span class="text-red">*</span></label>
                                             <input type="password" name="password" id="password"
                                                 class="form-control form-control-sm" autocomplete="off">
                                         </div>
                                         <div class="form-group col-md-4">
                                             <label class="control-label">@lang('Confirm') @lang('Password') <span class="text-red">*</span> </label>
                                             <input type="password" name="password2" class="form-control form-control-sm">
                                         </div>
                                     @endif
                                     <div class="form-group col-md-4">
                                         <label class="control-label">@lang('Role') <span class="text-red">*</span></label>
                                         <select name="role_id" id="role_id" class="form-control form-control-sm">
                                             <option value="">@lang('Select')</option>
                                             @foreach ($roles as $role)
                                                 <option value="{{ $role->id }}"
                                                     {{ @$editData['user_roles']['role_id'] == $role->id ? 'selected' : '' }}>
                                                     {{ $role->name }}</option>
                                             @endforeach
                                         </select>
                                     </div>
                                     <div class="col-sm-3"
                                         @if (!isset($editData)) style="margin-bottom: 0;margin-top: 35px;" @else style="margin-bottom: 0;margin-top: 35px;" @endif>
                                         <div class="form-check" style="margin-left: 5px;">
                                             <input type="checkbox" name="status" class="form-check-input" id="status"
                                                 value="1" {{ @$editData->status == 1 ? 'checked' : '' }}>
                                             <label data-toggle="tooltip"
                                                 title="ON/OFF the checkbox to Active/Inactive user !"
                                                 class="form-check-label" for="status">
                                                 @if (session()->get('language') == 'en')
                                                     Active / Inactive
                                                 @else
                                                     Active / Inactive
                                                 @endif
                                             </label>
                                         </div>
                                     </div>

                                     <div class="col-md-4">
                                         <div class="card">
                                             <div class="card-header">
                                                 <label class="control-label">User Image</label>
                                                 <input type="file" name="image" id="Vcimage"
                                                     class="@error('image') is-invalid @enderror">
                                             </div>
                                             <div class="card-body">
                                                 <img id="show_Vcimage" class="img-fluid"
                                                     src="{{ !empty(@$editData->image) ? url('public/upload/vc/' . @$editData->image) : url('public/upload/no_image.png') }}">
                                             </div>
                                         </div>
                                     </div>
                                     <div class="form-group col-md-12">
                                         <button type="submit" class="btn btn-success btn-sm" style="">
                                             @if (isset($editData))
                                                 @lang('Update')
                                             @else
                                                 @lang('Save')
                                             @endif
                                         </button>
                                     </div>
                                 </div>
                         </div>
                     </div>
                 </div>
             </div>
             </form>
             <!--Form End-->
         </div>
     </div>

     <script type="text/javascript">
        $(document).ready(function(){
            $('#Vcimage').change(function (e) { //show Image before upload
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_Vcimage').attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>

     <script type="text/javascript">
         $(document).ready(function() {
             $('#profileId').on('change', function() {
                 var id = $(this).val();
                 $.ajax({
                     url: "{{ route('find_single_profile') }}",
                     type: "GET",
                     data: {
                         profile_id: id
                     },
                     success: function(response) {
                         if (response) {
                             // console.log(typeof(response));
                             jQuery.each(response, function(index, person) {
                                 $('#name').val(person.nameEn);
                                 $('#mobile').val(person.mobile);
                                 $('#email').val(person.email);
                             });
                         }
                     }
                 });
             })
         });
     </script>

     <script>
         $(document).ready(function() {
             $('[data-toggle="tooltip"]').tooltip();
         });
     </script>

     <script type="text/javascript">
         $(document).ready(function() {
             $('#myForm').validate({
                 onkeyup: false,
                 rules: {
                     name: {
                         required: true,
                     },
                     // email: {
                     //    required: true,
                     //   email:true
                     // },
                     mobile: {
                         required: true,
                     },
                     role_id: {
                         required: true,
                     },
                     // password : {
                     //   required : true,
                     //   pwcheck:true,
                     //   minlength:8
                     // },
                     // password2 : {
                     //   required : true,
                     //   equalTo : '#password'
                     // }
                 },
                 messages: {
                     password: {
                         required: "Password required",
                         pwcheck: "Password must contain combination with upper, lower, special character and numeric digit",
                         minlength: "password must be 8 characters long"
                     }
                 },
                 errorElement: 'span',
                 errorPlacement: function(error, element) {
                     error.addClass('invalid-feedback');
                     element.closest('.form-group').append(error);
                 },
                 highlight: function(element, errorClass, validClass) {
                     $(element).addClass('is-invalid');
                 },
                 unhighlight: function(element, errorClass, validClass) {
                     $(element).removeClass('is-invalid');
                 }
             });
             $.validator.addMethod("pwcheck", function(value) {
                 return /^[A-Za-z0-9\d=!\-@._$!%*#?&]*$/.test(value) // consists of only these
                     &&
                     /[a-z]/.test(value) // has a lowercase letter
                     &&
                     /[A-Z]/.test(value) // has a uppercase letter
                     &&
                     /[@$!%*#?&]/.test(value) // has a uppercase letter
                     &&
                     /\d/.test(value) // has a digit
             });

             $('#myForm').on('submit', function(e) {
                 $("#myForm").valid();
             });
         });
     </script>
 @endsection
