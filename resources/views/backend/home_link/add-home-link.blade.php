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
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
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
				<h5><a class="btn btn-sm btn-success" href="{{route('home_link')}}"><i class="fa fa-list"></i> Home Link List</a></h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{(@$editData)?(route('home_link.update',$editData->id)):route('home_link.store')}}" id="myForm">
				@csrf
				<div class="card-body">
					<div class="row">
						<div class="col-sm-5">
							<div class="form-group">
								<label class="control-label">Home Link Name</label>
								<input type="text" id="name" name="name" value=" {{ !empty($editData->name)? $editData->name : old('name')  }}" class="form-control" placeholder="Enter Home Link Name" >
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group">
								<label class="control-label">URL(Route Name)</label>
								<input type="text" id="url_link" name="url_link" value="{{ !empty($editData->url_link)? $editData->url_link : old('url_link') }}" class="form-control" placeholder="Enter Route Name">
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<label class="control-label">Status</label>
								<select id="status" name="status" class="form-control">
									<option value="">Select Status</option>
									<option {{ @$editData->status == 1 ? "selected" : ""}} value="1" selected>Active</option>
									<option {{ @$editData->status == 0 ? "selected" : ""}} value="0">Inactive</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-sm">{{(@$editData) ? 'Update' : 'Save'}}</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<!--Form End-->
		</div>
	</div>
</div>


@endsection
