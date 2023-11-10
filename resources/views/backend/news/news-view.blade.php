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
              <li class="breadcrumb-item active">News | Event | Notice</li>
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
                <h5 class="m-0 text-dark float-left">News | Event | Notice</h5>
                <a href="{{ route('news.add') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Add News | Event | Notice</a>
                <a href="{{ route('news.filter_news') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> News</a>
                <a href="{{ route('news.filter_event') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> Event</a>
                <a href="{{ route('news.filter_notice') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> Notice</a>
                {{-- <a href="{{ route('news.filter_general_notice') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> General Notice</a>
                <a href="{{ route('news.filter_special_notice') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> Special Notice</a>
                <a href="{{ route('news.filter_tender_notice') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> Tender Notice</a> --}}
                <a href="{{ route('news.list') }}" class="btn btn-sm btn-primary float-right" style="margin-right: 2px;"><i class="fas fa-stream"></i> All</a>
	        		</div>

              
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped ">
		                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Type</th>
                      <th>Date</th>
                      <th>Title</th>
                      {{-- <th>Program Info</th>
                      <th>Course Info</th> --}}
                      <th>Image</th>
                      <th>File</th>
                      <th width="80">Action</th>
		                </tr>
		                </thead>
		                <tbody>
                       @foreach($news as $n)  
                    <tr>    
                    <td>{{ $loop->iteration }}</td>                                     
                      <td>
                        @if($n['type'] == 1)
                        News
                        @elseif($n['type'] == 2)
                        Event
                        @elseif($n['type'] == 3)
                        Notice
                        @elseif($n['type'] == 4)
                        General Notice
                        @elseif($n['type'] == 5)
                        Special Notice
                        @elseif($n['type'] == 6)
                        Tender Notice
                        @endif
                      </td>
                      <td>{{date('d/m/Y',strtotime($n['date']))}}</td>
                      <td>{{$n['title']}}</td>
                      {{-- <td>{{@$n['program_info']['name']??'General'}}</td>
                      <td>{{@$n['course_info']['name']??'General'}}</td> --}}
                      <td><img src="{{asset('public/upload/news/'.$n['image']) }}" width="80" height="80"></td>
                      @if(!empty($n['file']))
                        <td><a target="_blank" href="{{ asset('public/upload/news/'.$n['file']) }}"><i class="fas fa-eye fa-2x"></i></a></td>
                      @else
                      <td><a><i class="fas fa-eye fa-2x"></i></a></td>
                      @endif
                      <td>
                        <a href="{{ route('news.edit',$n->id) }}" class="btn btn-primary btn-flat btn-sm" data-type="image"><i class="fas fa-edit"></i></a>
                        {{-- | <a class="delete btn btn-danger btn-flat btn-sm" data-route="{{ route('news.delete') }}" data-id="{{ $n->id }}" ><i class="fas fa-trash"></i></a> --}}
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

