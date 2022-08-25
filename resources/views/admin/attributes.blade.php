@extends('admin/template/main')
@section('title', 'Home')
@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>All Attribues</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">All Attribues</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<?php if(Session::get("success")){ ?>
			<div class="row">
				<div class="col-lg-12 alert alert-success text-center"><?php echo Session::get("success"); ?></div>
			</div>
			<?php } ?>
			<?php if(Session::get("error")){ ?>
			<div class="row">
				<div class="col-lg-12 alert alert-danger text-center"><?php echo Session::get("error"); ?></div>
			</div>
			<?php } ?>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">All Attribues</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>#</th>
										<th width="50%">Title</th>
										<th>Image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tfoot>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Image</th>
									<th>Action</th>
								</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
@endsection