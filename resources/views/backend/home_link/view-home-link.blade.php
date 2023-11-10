 @extends('backend.layouts.app')
@section('content')
<style type="text/css">
  .i-style{
        display: inline-block;
        padding: 10px;
        width: 2em;
        text-align: center;
        font-size: 2em;
        vertical-align: middle;
        color: #444;
  }
  .demo-icon{cursor: pointer; }
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Manage Home Link</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Home Link</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<div class="container fullbody">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<a id="demo-btn-addrow" class="btn btn-success btn-sm" href="{{route('home_link.add')}}">
					<i class="ion-plus"></i> Add Home Link
				</a>
			</div>
			<div class="card-body">
				<table id="datatable" class="table table-sm table-bordered">
					<thead>
						<tr>
							<th style="width:8%" class="text-center">#</th>
							<th class="text-center">Name</th>
							<th class="text-center">Route</th>
							<th class="text-center">Status</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($homeLinks as $homeLink)
						<tr>
							<td class="text-center">{{$loop->iteration}}</td>
							<td class="text-center">{{$homeLink->name}}</td>
							<td class="text-center">{{$homeLink->url_link}}</td>
							@if($homeLink->status==1)
							<td class="text-center">Active</td>
							@else
							<td class="text-center">Inactive</td>
							@endif

                            <td>
                                <a href="{{ route('home_link.edit',$homeLink->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> |
                                <a class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('home_link.delete') }}" data-id="{{ $homeLink->id }}" ><i class="fas fa-trash"></i></a>
                            </td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
