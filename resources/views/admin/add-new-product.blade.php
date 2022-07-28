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
					<h1>Add New Product</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Add New Product</li>
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
							<h3 class="card-title">Add New Product</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="{{url('admin/add-new-product-process')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="form-group">
									<label>Product Title</label>
									<input type="text" name="product_title" class="form-control" placeholder="Enter Product Name">
								</div>
								<div class="form-group">
									<label>Product Slug</label>
									<input type="text" name="product_slug" class="form-control" placeholder="Enter Product Meta Title">
								</div>
								<div class="form-group">
									<label>Product Meta Title</label>
									<input type="text" name="product_meta_title" class="form-control" placeholder="Enter Product Meta Title">
								</div>
								<div class="form-group">
									<label>Product Meta Keyword</label>
									<input type="text" name="product_meta_keyword" class="form-control" placeholder="Enter Product Meta Keyword">
								</div>
								<div class="form-group">
									<label>Product Meta Description</label>
									<input type="text" name="product_meta_description" class="form-control" placeholder="Enter Product Meta Description">
								</div>
								<div class="form-group">
									<label>Product Short Description</label>
									<textarea class="summernote" name="product_short_description"  placeholder="Enter Product Long Description"></textarea>
								</div>
								<div class="form-group">
									<label>Product Long Description</label>
									<textarea class="summernote" name="product_long_description"  placeholder="Enter Product Long Description"></textarea>
								</div>
								<div class="form-group">
									<label>Product Image</label>
									<input type="file" name="product_image" class="form-control" placeholder="Enter Product Meta Description">
								</div>
								<div class="form-group">
									<label>Product Hover Image</label>
									<input type="file" name="product_hover_image" class="form-control" placeholder="Enter Product Meta Description">
								</div>
								<div class="form-group">
									<label>Product Gallery</label>
									<input type="file" name="product_gallery[]" multiple class="form-control" placeholder="Enter Product Meta Description">
								</div>
								<div class="form-group">
									<label>Select Category</label>
									<select class="form-control select2" name="product_category" style="width: 100%;">
										<option value="">-- Select Category --</option>
										<?php foreach($get_all_categories as $key=>$value){ ?>
										<option value="<?php echo $value->category_id; ?>"><?php echo $value->category_name; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Product Sale Price</label>
									<input type="text" name="product_sale_price" class="form-control" placeholder="Enter Product Meta Keyword">
								</div>
								<div class="form-group">
									<label>Product Discount Price</label>
									<input type="text" name="product_discount_price" class="form-control" placeholder="Enter Product Meta Keyword">
								</div>
								<div class="form-group">
									<label>Select Product Label</label>
									<select class="form-control select2" name="product_label" style="width: 100%;">
										<option value="">-- Select Product Label --</option>
										<option value="1">Hot</option>
										<option value="2">Sale</option>
										<option value="3">Best Sale</option>
										<option value="4">New</option>
									</select>
								</div>
								<div class="form-group clearfix">
									<label>Product Fall In</label>
								</div>
								<div class="form-group clearfix">
									<div class="icheck-primary d-inline"> 
										<input type="radio" id="radioPrimary1" value="1" name="product_fall_in">
										<label for="radioPrimary1" style="font-weight: normal;">Top Selling</label>
									</div>
								</div>
								<div class="form-group clearfix">
									<div class="icheck-primary d-inline">
										<input type="radio" id="radioPrimary2" value="2" name="product_fall_in">
										<label for="radioPrimary2" style="font-weight: normal;">Tranding Products</label>
									</div>
								</div>
								<div class="form-group clearfix">
									<div class="icheck-primary d-inline">
										<input type="radio" id="radioPrimary3" value="3" name="product_fall_in">
										<label for="radioPrimary3" style="font-weight: normal;">Recently added</label>
									</div>
								</div>
								<div class="form-group clearfix">
									<div class="icheck-primary d-inline">
										<input type="radio" id="radioPrimary4" value="3" name="product_fall_in">
										<label for="radioPrimary4" style="font-weight: normal;">Top Rated</label>
									</div>
								</div>
								<div class="form-group">
									<label>Select Related Product</label>
									<select class="form-control select2" data-placeholder="Select Category Placement" name="related_product[]" style="width: 100%;" multiple>
										<?php foreach($get_all_products as $key=>$value){ ?>
										<option value="<?php echo $value->product_id; ?>"><?php echo $value->product_title; ?></option>
										<?php } ?>
									</select>
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