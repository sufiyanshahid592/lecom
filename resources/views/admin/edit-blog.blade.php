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
					<h1>Edit Blog</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Edit Blog</li>
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
							<h3 class="card-title">Edit Blog</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="{{url('admin/edit-blog-process')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="form-group">
									<label>Blog Title</label>
									<input type="text" name="blog_title" class="form-control" placeholder="Enter Blog Title" value="<?php echo $get_blog_by_id[0]->blog_title; ?>" required>
								</div>
								<div class="form-group">
									<label>Blog Slug</label>
									<input type="text" name="blog_slug" class="form-control" placeholder="Enter Blog Slug" value="<?php echo $get_blog_by_id[0]->blog_slug; ?>" required>
								</div>
								<div class="form-group">
									<label>Blog Meta Keywords</label>
									<input type="text" name="blog_meta_keywords" class="form-control" placeholder="Enter Blog Meta Keywords" value="<?php echo $get_blog_by_id[0]->blog_meta_keywords; ?>" required>
								</div>
								<div class="form-group">
									<label>Blog Meta Description</label>
									<input type="text" name="blog_meta_description" class="form-control" placeholder="Enter Blog Meta Description" value="<?php echo $get_blog_by_id[0]->blog_meta_description; ?>" required>
								</div>
								<div class="form-group">
									<label>Blog Short Description</label>
									<input type="text" name="blog_short_description" class="form-control" placeholder="Enter Blog Short Description" value="<?php echo $get_blog_by_id[0]->blog_short_description; ?>" required>
								</div>
								<div class="form-group">
									<label>Blog Long Description</label>
									<input type="text" name="blog_long_description" class="form-control" placeholder="Enter Blog Long Description" value="<?php echo $get_blog_by_id[0]->blog_long_description; ?>" required>
								</div>
								<div class="form-group">
									<label>Blog Image</label>
									<input type="file" name="blog_image" class="form-control" placeholder="Enter Blog Meta Description">
									<img width="200px" style="margin-top: 20px;" src="<?php echo url('assets/images/'.$get_blog_by_id[0]->blog_image); ?>">
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<input type="hidden" name="blog_id" value="<?php echo $get_blog_by_id[0]->blog_id; ?>">
								<button type="submit" class="btn btn-primary">Save</button>
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
