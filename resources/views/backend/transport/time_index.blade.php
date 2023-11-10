@extends('backend.layouts.app') 

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Transport Route Schedule List</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Route Schedule</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<section class="content">
	<div class="container-fluid">
        <div class="card">
            <div class="card-header">
            	
               <a class="btn btn-sm btn-info" href="{{ route('transport.list') }}">Back</a>
                <a href="{{route('route.time.create', $my->id)}}" class="btn btn-success btn-sm"><i class="fas fa-stream"></i> Add Route Schedule</a> 
            </div>
            <div class="card-body">
            	<div class="table-responsive">
            		<table class="table table-bordered">
            			<thead>
            				<tr>
            					<th>Sl no.</th>
                                <th>Route Title</th>
            					<th>Start Time</th>
            					<th>End Time</th>
            					<th>Transport Way</th>
            					<th>Action</th>
            				</tr>
            			</thead>
            			<tbody>
            				@foreach($data as $i => $item)
            				<tr>
            					<td>{{ $loop->iteration }}</td>
            					<td>{{ $item->transport->route_title }}</td>
                                <td>{{ $item->start_time }}</td>
            					<td>{{ $item->end_time }}</td>
            					<td>{{ $item->route_way == 1 ? 'Up Way' : 'Down Way' }}</td>
            					<td>
            						<a class="btn btn-sm btn-warning" href="{{ route('route.time.edit', $item->id) }}">Edit</a>
            						<a class="btn btn-sm btn-danger" href="{{ route('route.time.delete', $item->id) }}">Delete</a>
                                    
            					</td>
            				</tr>
            				@endforeach
            			</tbody>
            		</table>
            	</div>
            </div>
        </div>
    </div>
</section>

@endsection