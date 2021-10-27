@extends('Admin.layout.main')
@section('content')

<!-- Page Wrapper -->
<div class="page-wrapper">

	<!-- Page Content -->
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Brand Products</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('admin/login') }}">Dashboard</a></li>
						<li class="breadcrumb-item active">Font - end</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_brand"><i class="fa fa-plus"></i> Add Brand Products	</a>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0">
						<thead>
							<tr>
								<th>#</th>
								<th>Brand ID</th>
								<th>Brand Image</th>
								<th>Brand Name </th>
								<th class="text-right">Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>123A</td>
								<td>
									<img class="inline-block" src="{{asset('backend/img/profiles/avatar-02.jpg') }}" alt="user">
								</td>
								<td>Vehicle</td>
								<td class="text-right">
									<div class="dropdown dropdown-action">
										<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_brand"><i class="fa fa-pencil m-r-5"></i> Edit</a>
											<a href="#" class="dropdown-item" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /Page Content -->

	<!-- Add Brand -->
	<div class="modal custom-modal fade" id="add_brand" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add New Brand</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="row">
							<div class="col-md-12">
								<div class="profile-img-wrap edit-img">
									<img class="inline-block" src="" alt="user">
									<div class="fileupload btn">
										<span class="btn-text">edit</span>
										<input class="upload" type="file">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Brand Name</label>
									<input type="text" class="form-control">
								</div>
							</div>
						</div>
						<div class="submit-section">
							<button type="submit" class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Add Brand -->

	<!-- Edit Brand -->
	<div class="modal custom-modal fade" id="edit_brand" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add New Brand</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="row">
							<div class="col-md-12">
								<div class="profile-img-wrap edit-img">
									<img class="inline-block" src="{{asset('backend/img/profiles/avatar-02.jpg') }}" alt="user">
									<div class="fileupload btn">
										<span class="btn-text">edit</span>
										<input class="upload" type="file">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label>Brand Name</label>
									<input type="text" class="form-control">
								</div>
							</div>
						</div>
						<div class="submit-section">
							<button type="submit" class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Brand -->

	<!-- Delete Brand -->
	<div class="modal custom-modal fade" id="delete" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<h3>Delete </h3>
						<p>Are you sure want to delete?</p>
					</div>
					<div class="modal-btn delete-action">
						<div class="row">
							<div class="col-6">
								<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
							</div>
							<div class="col-6">
								<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Delete Brand -->
</div>
<!-- /Page Wrapper -->
@endsection