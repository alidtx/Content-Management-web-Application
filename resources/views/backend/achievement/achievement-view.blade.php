@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark">News | Event | Notice</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Special Achievements</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        	<div class="col-lg-12">
	        	<div class="card card-outline card-primary"> 
	        		<div class="card-header">
                <h5 class="m-0 text-dark float-left">Special Achievements</h5>
                <a href="{{ route('special_achievement.add') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Add New</a>
                <a href="{{ route('special_achievement.filter_student') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> Student</a>
                <a href="{{ route('special_achievement.filter_teacher') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> Teacher</a>
                <a href="{{ route('special_achievement.filter_organization') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> Organization</a>
                {{-- <a href="{{ route('special_achievement.filter_general_notice') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> General Notice</a>
                <a href="{{ route('special_achievement.filter_special_notice') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> Special Notice</a>
                <a href="{{ route('special_achievement.filter_tender_notice') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> Tender Notice</a> --}}
                <a href="{{ route('special_achievement.list') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> All</a>
	        		</div>

              
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped ">
		                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Category</th>
                      <th>Date</th>
                      <th>Title</th>
                      {{-- <th>Program Info</th>
                      <th>Course Info</th> --}}
                      <th>Image</th>
                      <th width="80">Action</th>
		                </tr>
		                </thead>
		                <tbody>
                       @foreach($achievements as $achievement)  
                    <tr>    
                    <td>{{ $loop->iteration }}</td>                                     
                      <td>
                        @if($achievement['category'] == 1)
                        Student
                        @elseif($achievement['category'] == 2)
                        Teacher
                        @elseif($achievement['category'] == 3)
                        Organization
                        @endif
                      </td>
                      <td>{{date('d/m/Y',strtotime($achievement['date']))}}</td>
                      <td>{{$achievement['title']}}</td>
                      {{-- <td>{{@$achievement['program_info']['name']??'General'}}</td>
                      <td>{{@$achievement['course_info']['name']??'General'}}</td> --}}
                      <td><img src="{{asset('public/upload/special_achievement/'.$achievement['image']) }}" width="80" height="80"></td>
                      <td>
                        <a href="{{ route('special_achievement.edit',$achievement->id) }}" class="btn btn-primary btn-flat btn-sm" data-type="image"><i class="fas fa-edit"></i></a>
                        {{-- | <a class="delete btn btn-danger btn-flat btn-sm" data-route="{{ route('special_achievement.delete') }}" data-id="{{ $n->id }}" ><i class="fas fa-trash"></i></a> --}}
                      </td>
                    </tr>
                    @endforeach    
		                 
		                              
		                </tbody>                
		              </table>
		            </div>
	            <!-- /.card-body -->
          		</div>
          <!-- /.card -->
        	</div>
        </div>
      </div>
      <!--/. container-fluid -->
    </section>
@endsection

