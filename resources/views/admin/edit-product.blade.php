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
						<form action="{{url('admin/edit-product-process')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="form-group">
									<label>Product Title</label>
									<input type="text" name="product_title" class="form-control" value="<?php echo $get_product_by_id[0]->product_title; ?>" placeholder="Enter Product Name">
								</div>
								<div class="form-group">
									<label>Product Slug</label>
									<input type="text" name="product_slug" class="form-control" value="<?php echo $get_product_by_id[0]->product_slug; ?>" placeholder="Enter Product Meta Title">
								</div>
								<div class="form-group">
									<label>Product Meta Title</label>
									<input type="text" name="product_meta_title" class="form-control" value="<?php echo $get_product_by_id[0]->product_meta_title; ?>" placeholder="Enter Product Meta Title">
								</div>
								<div class="form-group">
									<label>Product Meta Keyword</label>
									<input type="text" name="product_meta_keyword" class="form-control" value="<?php echo $get_product_by_id[0]->product_meta_keyword; ?>" placeholder="Enter Product Meta Keyword">
								</div>
								<div class="form-group">
									<label>Product Meta Description</label>
									<input type="text" name="product_meta_description" class="form-control" value="<?php echo $get_product_by_id[0]->product_meta_description; ?>" placeholder="Enter Product Meta Description">
								</div>
								<div class="form-group">
									<label>Product Short Description</label>
									<textarea class="summernote" name="product_short_description"  placeholder="Enter Product Long Description"><?php echo $get_product_by_id[0]->product_short_description; ?></textarea>
								</div>
								<div class="form-group">
									<label>Product Long Description</label>
									<textarea class="summernote" name="product_long_description"  placeholder="Enter Product Long Description"><?php echo $get_product_by_id[0]->product_long_description; ?></textarea>
								</div>
								<div class="form-group">
									<label>Product Image</label>
									<input type="file" name="product_image" class="form-control" placeholder="Enter Product Meta Description">
									<img width="150px" src="{{url('assets/images/'.$get_product_by_id[0]->product_image)}}" style="margin-top: 10px;">
									<input type="hidden" name="old_product_image" value="<?php echo $get_product_by_id[0]->product_image; ?>" class="form-control" placeholder="Enter Product Meta Description">
								</div>
								<div class="form-group">
									<label>Product Hover Image</label>
									<input type="file" name="product_hover_image" class="form-control" placeholder="Enter Product Meta Description">
									<img width="150px" src="{{url('assets/images/'.$get_product_by_id[0]->product_hover_image)}}" style="margin-top: 10px;">
									<input type="hidden" name="old_product_hover_image" value="<?php echo $get_product_by_id[0]->product_hover_image; ?>" class="form-control" placeholder="Enter Product Meta Description">
								</div>
								<div class="form-group">
									<label>Product Gallery</label>
									<input type="file" name="product_gallery[]" multiple class="form-control" placeholder="Enter Product Meta Description">
									<div class="row" style="margin-top: 10px;">
									<?php 
										$product_image_gallery = json_decode($get_product_by_id[0]->product_gallery);
										$i = 1;
										foreach($product_image_gallery as $key=>$value){
									?>
										<div class="col-lg-1 text-center product-gallery-image-<?php echo $i; ?>" data-id="<?php echo $i; ?>">
											<img src="{{url('assets/images/'.$value)}}" width="100%" alt="">
											<input type="hidden" name="old_product_image_gallery[]" value="<?php echo $value; ?>">
											<span class="btn btn-danger delete-product-gallery-image" style="margin-top: 5px;" data-id="<?php echo $i; ?>">Delete</span>
										</div>
									<?php
										$i++;
										}
									?>
									</div>
								</div>
								<div class="form-group">
									<label>Select Category</label>
									<select class="form-control select2" name="product_category" style="width: 100%;">
										<option value="">-- Select Category --</option>
										<?php foreach($get_all_categories as $key=>$value){ ?>
										<option <?php if($get_product_by_id[0]->product_category==$value->category_id){echo "selected";} ?> value="<?php echo $value->category_id; ?>"><?php echo $value->category_name; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<label>Product Sale Price</label>
									<input type="text" name="product_sale_price" class="form-control" value="<?php echo $get_product_by_id[0]->product_sale_price; ?>" placeholder="Enter Product Meta Keyword">
								</div>
								<div class="form-group">
									<label>Product Discount Price</label>
									<input type="text" name="product_discount_price" class="form-control" value="<?php echo $get_product_by_id[0]->product_discount_price; ?>" placeholder="Enter Product Meta Keyword">
								</div>
								<div class="form-group">
									<label>Select Product Label</label>
									<select class="form-control select2" name="product_label" style="width: 100%;">
										<option value="">-- Select Product Label --</option>
										<option <?php if($get_product_by_id[0]->product_label==1){echo "selected";} ?> value="1">Hot</option>
										<option <?php if($get_product_by_id[0]->product_label==2){echo "selected";} ?> value="2">Sale</option>
										<option <?php if($get_product_by_id[0]->product_label==3){echo "selected";} ?> value="3">Best Sale</option>
										<option <?php if($get_product_by_id[0]->product_label==4){echo "selected";} ?> value="4">New</option>
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
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<input type="hidden" name="product_id" value="<?php echo $get_product_by_id[0]->product_id; ?>">
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