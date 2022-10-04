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
					<h1>Manage Product Variations</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Manage Product Variations</li>
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
					<form class="form-inline add-new-variation" onsubmit="return false;">
					<!-- <form action="{{url('admin/save-product-variations')}}" method="post"> -->
						<?php //print_r(json_decode($get_product_by_id[0]->product_variations_values)); ?>
						<?php foreach(json_decode($get_product_by_id[0]->product_variations_values) as $key=>$value){ ?>
						<div class="form-group">
							<select class="form-control variation-value" data-placeholder="Select <?php echo $key; ?>" name="<?php echo $key; ?>">
								<option value="">Select <?php echo $key; ?></option>
								<?php foreach($value as $key1=>$value1){ ?>
								<option value="<?php echo $value1; ?>"><?php echo $value1; ?></option>
								<?php } ?>
								<?php //echo get_attributes_value_by_id_second($value->attribute_id); ?>
							</select>
						</div>
						<?php } ?>
						<div class="form-group">
							<input type="text" class="form-control add-new-variation-price" placeholder="Price" name="price">
						</div>
						<div class="form-group">
							<input type="hidden" name="product_id" value="<?php echo Request::segment(3); ?>">
							<input type="submit" value="Add New Variation" class="btn btn-primary">
						</div>
						<div class="form-group add-new-variation-error"></div>
					</form>
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Manage Product Variations</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="{{url('admin/product-finish-step')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="form-group">
									<label>Manage Product Variations</label>
									<table class="table table-bordered">
										<thead>
											<tr>
												<?php foreach($get_product_variations as $key=>$value){ ?>
												<th><?php echo $value->attribute_title; ?></th>
												<?php } ?>
												<th>Price</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1; foreach($get_product_variations_data as $key=>$value){ ?>
											<tr class="product-variation-row <?php echo $value->product_variation_id; ?>">
												<?php foreach(json_decode($value->product_variation_data) as $v_key=>$v_value){ foreach($get_product_variations as $key1=>$value1){if($value1->attribute_title==$v_key){?>
												<td>
													<?php echo $v_value; ?>
													<input type="hidden" name="<?php echo "row_".$i."[".$v_key."]"; ?>" value="<?php echo $v_value; ?>" >
												</td>
												<?php } } } ?>
												<td>
													<?php echo $value->product_variation_price; ?>
													<input type="hidden" name="row_<?php echo $i; ?>[price]" value="<?php echo $value->product_variation_price; ?>" />
												</td>
												<td>
													<a class='btn btn-warning edit-variation' data-row-id='<?php echo $value->product_variation_id; ?>'>Edit</a>
													<a class='btn btn-danger delete-variation' data-row-id='<?php echo $value->product_variation_id; ?>'>Delete</a>
												</td>
											</tr>
											<?php $i++; } ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<input type="hidden" name="product_id" value="<?php echo Request::segment(3); ?>">
								<!-- <button onclick="document.location='admin/all-products'" class="btn btn-primary">Finish</button> -->
								<button type="submit" class="btn btn-primary">Finish</button>
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
