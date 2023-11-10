@extends('backend.layouts.app')

@section('content')

<style>
  .des{
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 20ch;
  }
</style>
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Message</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Message</li>
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
	        	<div class="card">
	        		<div class="card-header">
	        			<a href="{{ route('message.add') }}" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add Message</a>
	        		</div>
		            <div class="card-body">
		              <table id="dataTable" class="table table-sm table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>#</th>
		                  <th>Type</th>
		                  <th>Category</th>
		                  <th>Head</th>
		                  <th>Title First Part</th>
		                  <th>Status</th>
                      <th>Short Description</th>
                      <th>Long Description</th>
                      <th width="80">Action</th>
		                </tr>
		                </thead>
		                <tbody>
		                @foreach($messages as $message)
                      <tr>
                        <td> {{$loop->iteration}}</td>
                        @if($message['type_id'] == 1)
                        <td>Faculty</td>
                        <td>{{ $message['faculty']['name'] }}</td>
                        @elseif($message['type_id'] == 2)
                        <td>Department</td>
                        <td>{{ $message['department']['name'] }}</td>
                        @elseif($message['type_id'] == 3)
                        <td>Office</td>
                        <td>{{ $message['office']['name'] }}</td>
                        @elseif($message['type_id'] == 4)
                        <td>Hall</td>
                        <td>{{ $message['hall']['name'] }}</td>
                        @else
                        <td>-</td>
                        @endif
                        
                        <td>{{ @$message['profile']['nameEn'] }}</td>
                        <td>{{ $message['title_first_part'] }}</td>
                        <td>{{ @$message['status'] == '1' ? 'Active' : 'Inactive' }}</td>

                          <td class="des">{!!  $message['short_description']   !!}</td>
                          <td class="des" >{!!  $message['long_description']   !!}</td>

                          <td><a href="{{ route('message.edit', $message->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a class="btn btn-danger btn-sm delete" id="delete" title="Delete" data-id="{{ $message->id }}" data-token={{csrf_token()}} data-route="{{ route('message.delete') }}"><i class="fa fa-trash"></i></a>
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

