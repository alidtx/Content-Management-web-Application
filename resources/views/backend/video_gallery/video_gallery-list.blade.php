@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark">Video Gallery</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Video Gallery</li>
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
                <h5 class="m-0 text-dark float-left">Video Gallery</h5>
	        			<a href="{{ route('setup.video_gallery.add') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Add Video Gallery</a>
	        		</div>

              
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped ">
		                <thead>
		                <tr>
		                    <th>#</th>
                        <th>Title</th>
                        <th>Publish Date</th>
                        <th>Youtube Link</th>
                        <th>Description</th>
                        <th>Is Featured?</th>
                        <th width="80">Action</th>
		                </tr>
		                </thead>
		                <tbody>
                       @foreach($videoGalleries as $videoGallery)  
                      <tr>    
                        <td>{{ $loop->iteration }}</td>                                     
                        <td>{{$videoGallery['title']}}</td>
                        <td>{{date('d/m/Y',strtotime($videoGallery['publish_date']))}}</td>
                        <td><a target="_blank" href="{{$videoGallery['youtube_link']}}">{{$videoGallery['youtube_link']}}</a></td>
                        <td>{!! $videoGallery['description'] !!}</td>
                        <td><span class="badge {{ $videoGallery['is_featured'] == 1 ? 'badge-success' : 'badge-danger' }}">{{ $videoGallery['is_featured'] == 1 ? 'Yes' : 'No' }}</span></td>
                        <td>
                          <a href="{{ route('setup.video_gallery.edit',$videoGallery->id) }}" class="btn btn-primary btn-flat btn-sm" data-type="image"><i class="fas fa-edit"></i></a> | 
                          <a id="delete" class="btn btn-danger btn-flat btn-sm" data-route="{{ route('setup.video_gallery.delete') }}" data-id="{{ $videoGallery->id }}" data-token="{{csrf_token()}}"><i class="fas fa-trash"></i></a>
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

