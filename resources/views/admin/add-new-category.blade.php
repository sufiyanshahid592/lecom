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
					<h1>Add New Category</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Add New Category</li>
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
							<h3 class="card-title">Add New Category</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="{{url('admin/add-new-category-process')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="form-group">
									<label>Category Name</label>
									<input type="text" name="category_name" class="form-control" placeholder="Enter Category Name">
								</div>
								<div class="form-group">
									<label>Category Slug</label>
									<input type="text" name="category_slug" class="form-control" placeholder="Enter Category Meta Title">
								</div>
								<div class="form-group">
									<label>Category Meta Title</label>
									<input type="text" name="category_meta_title" class="form-control" placeholder="Enter Category Meta Title">
								</div>
								<div class="form-group">
									<label>Category Meta Keyword</label>
									<input type="text" name="category_meta_keyword" class="form-control" placeholder="Enter Category Meta Keyword">
								</div>
								<div class="form-group">
									<label>Category Meta Description</label>
									<input type="text" name="category_meta_description" class="form-control" placeholder="Enter Category Meta Description">
								</div>
								<div class="form-group">
									<label>Category Image</label>
									<input type="file" name="category_image" class="form-control" placeholder="Enter Category Meta Description">
								</div>
								<div class="form-group">
									<label>Category Icon</label>
									<input type="file" name="category_icon" class="form-control" placeholder="Enter Category Meta Description">
								</div>
								<div class="form-group">
									<label>Select Parent Category</label>
									<select class="form-control select2" name="parent_category" style="width: 100%;">
										<option value="">-- Select Parent Category --</option>
										<?php foreach($get_all_categories as $key=>$value){ ?>
										<option value="<?php echo $value->category_id; ?>"><?php echo $value->category_name; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Select Category Placement</label>
									<select class="form-control select2" data-placeholder="Select Category Placement" name="category_placement[]" style="width: 100%;" multiple>
										<option value="1">Home Page Slider Section</option>
										<option value="2">Home Page Carousel</option>
									</select>
								</div>
								<div class="form-group">
									<label>Add to Popular Products</label>
									<input type="checkbox" name="popular_product" value="1" data-bootstrap-switch>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
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