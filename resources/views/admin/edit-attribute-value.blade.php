@extends('admin/template/main')
@section('title', 'Home')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Edit <?php echo $get_attribute_value_by_id[0]->attribute_title; ?> Attribute Value</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Edit <?php echo $get_attribute_value_by_id[0]->attribute_title; ?> Attribute Value</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Edit <?php echo $get_attribute_value_by_id[0]->attribute_title; ?> Attribute Value</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="{{url('admin/edit-attributes-value-process')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="form-group">
									<label>Attribute Value Title</label>
									<input type="text" name="attribute_value_title" class="form-control" placeholder="Enter Attribute Title" value="<?php echo $get_attribute_value_by_id[0]->attribute_value_title; ?>">
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<input type="hidden" name="attribute_value_id" value="<?php echo $get_attribute_value_by_id[0]->attribute_value_id; ?>">
								<input type="hidden" name="attribute_id" value="<?php echo $get_attribute_value_by_id[0]->attribute_id; ?>">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
						</form>
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>
</div>
@endsection
