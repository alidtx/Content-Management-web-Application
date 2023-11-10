<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <title>Club member registration Form</title>
  </head>
  <body>
  <div class="container">
    <h1 class="text-center">Club member registration Form</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('registration.form.submit')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Student ID</label>
                <input type="number" name="student_id" class="form-control" id="" placeholder="Student Id">
              </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" id="" placeholder="Name">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" id="" placeholder="Email   ">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Phone</label>
                <input type="number" name="phone" class="form-control" id="" placeholder="Phone">
              </div>
        </div>
        <div class="col-6">
            @php
               $faculties = App\Models\Faculty::all();
            @endphp
            <div class="form-group">
                <label for="">Faculty Name</label>
                <select name="faculty_id" id="" class="form-control">
                    <option value="1">Select Faculty</option>
                    @foreach ($faculties as $faculty)
                    <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-6">
        @php
            $departments = App\Models\Department::all();
         @endphp
            <div class="form-group">
                <label for="">Department Name</label>
                <select name="department_id" id="" class="form-control">
                    <option value="1">Select Department</option>
                     @foreach ($departments as $department)
                     <option value="{{$department->id}}">{{$department->name}}</option>
                     @endforeach
                </select>
            </div>
        </div>
        {{-- <div class="col-6">
        @php
            $clubs = App\Models\Club::all();
         @endphp
            <div class="form-group">
                <label for="">Club Name</label>
                <select name="club_id" id="" class="form-control">
                    <option value="1">Select Club</option>
                   @foreach ($clubs as $club)
                       <option value="{{$club->id}}">{{$club->name}}</option>
                   @endforeach
                </select>
            </div>
        </div> --}}
        <div class="col-6">
            <div class="form-group">
                <label for="">Photo</label>
                <input type="file" name="photo" id="image">
                <img id="showImage" width="300" class="img-fluid" src="{{(!empty(@$editData->banner)) ? url('public/upload/banner/'.@$editData->banner) : url('public/upload/no_image.jpg')}}">
            </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function (e) { //show Image before upload
                var reader = new FileReader();
                // console.log(reader);
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
  </body>
</html>