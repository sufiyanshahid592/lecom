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
					<h1>Edit Category</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Edit Category</li>
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
								<h3 class="card-title">Edit Category</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form action="{{url('admin/edit-category-process')}}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="card-body">
									<div class="form-group">
										<label>Category Name</label>
										<input type="text" name="category_name" class="form-control" value="<?php echo $get_category_by_id[0]->category_name; ?>" placeholder="Enter Category Name">
									</div>
									<div class="form-group">
										<label>Category Slug</label>
										<input type="text" name="category_slug" class="form-control" value="<?php echo $get_category_by_id[0]->category_slug; ?>" placeholder="Enter Category Meta Title">
									</div>
									<div class="form-group">
										<label>Category Meta Title</label>
										<input type="text" name="category_meta_title" class="form-control" value="<?php echo $get_category_by_id[0]->category_meta_title; ?>" placeholder="Enter Category Meta Title">
									</div>
									<div class="form-group">
										<label>Category Meta Keyword</label>
										<input type="text" name="category_meta_keyword" class="form-control" value="<?php echo $get_category_by_id[0]->category_meta_keyword; ?>" placeholder="Enter Category Meta Keyword">
									</div>
									<div class="form-group">
										<label>Category Meta Description</label>
										<input type="text" name="category_meta_description" class="form-control" value="<?php echo $get_category_by_id[0]->category_meta_description; ?>" placeholder="Enter Category Meta Description">
									</div>
									<div class="form-group">
										<label>Category Image</label>
										<input type="file" name="category_image" class="form-control" value="<?php echo $get_category_by_id[0]->category_image; ?>" placeholder="Enter Category Meta Description">
										<img style="margin-top: 10px" src="{{url('assets/images/'.$get_category_by_id[0]->category_image)}}" alt="">
										<input type="hidden" name="old_category_image" value="<?php echo $get_category_by_id[0]->category_image; ?>">
									</div>
									<div class="form-group">
										<label>Category Icon</label>
										<input type="file" name="category_icon" class="form-control" placeholder="Enter Category Meta Description">
										<img style="margin-top: 10px" src="{{url('assets/images/'.$get_category_by_id[0]->category_icon)}}" alt="">
										<input type="hidden" name="old_category_icon" value="<?php echo $get_category_by_id[0]->category_icon; ?>">
									</div>
									<div class="form-group">
										<label>Select Parent Category</label>
										<select class="form-control select2" name="parent_category" style="width: 100%;">
											<option value="">-- Select Parent Category --</option>
											<?php foreach($get_all_categories as $key=>$value){ ?>
											<option <?php if($get_category_by_id[0]->parent_category==$value->category_id){echo "selected";} ?> value="<?php echo $value->category_id; ?>"><?php echo $value->category_name; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Select Category Placement</label>
										<select class="form-control select2" name="category_placement[]" style="width: 100%;" multiple>
											<option value="">-- Select Category Placement --</option>
											<option <?php if(in_array(1, (array)json_decode($get_category_by_id[0]->category_placement))){echo "selected";} ?> value="1">Home Page Slider Section</option>
											<option <?php if(in_array(1, (array)json_decode($get_category_by_id[0]->category_placement))){echo "selected";} ?> value="2">Home Page Carousel</option>
										</select>
									</div>
									<div class="form-group">
										<div class="icheck-primary d-inline">
											<input type="checkbox" name="popular_product" value="1" <?php if($get_category_by_id[0]->popular_product==1){echo "checked";} ?> id="checkboxPrimary1" >
											<label for="checkboxPrimary1">Add to Popular Products Section</label>
										</div>
									</div>
								</div>
								<!-- /.card-body -->
								<div class="card-footer">
									<input type="hidden" name="category_id" value="<?php echo $get_category_by_id[0]->category_id; ?>">
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