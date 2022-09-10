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
						<?php foreach($get_product_variations as $key=>$value){ ?>
						<div class="form-group">
							<select class="form-control variation-value select2" name="<?php echo $value->attribute_title; ?>">
								<option value="">Select <?php echo $value->attribute_title; ?></option>
								<?php echo get_attributes_value_by_id($value->attribute_id); ?>
							</select>
							<!-- <input type="text" class="form-control variation-value" placeholder="<?php //echo $value->attribute_title; ?>" name="<?php //echo $value->attribute_title; ?>"> -->
						</div>
						<?php } ?>
						<div class="form-group">
							<input type="text" class="form-control add-new-variation-price" placeholder="Price" name="price">
						</div>
						<div class="form-group">
							<input type="hidden" name="product_id" value="<?php echo Request::segment(3); ?>">
							<input type="submit" value="Add New Row" class="btn btn-primary">
						</div>
						<div class="form-group add-new-variation-error"></div>
					</form>
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Manage Product Variations</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="{{url('admin/update-product-variations/'.Request::segment(3))}}" method="post" enctype="multipart/form-data">
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
											<tr class="product-variation-row <?php echo $i; ?>">
												<?php foreach(json_decode($value->product_variation_data) as $v_key=>$v_value){ ?>
												<td><?php echo $v_value; ?></td>
												<?php } ?>
												<td><?php echo $value->product_variation_price; ?></td>
												<td>
													<a class='btn btn-danger delete-variation' data-row-id='<?php echo $i; ?>'>Delete</a></td>
												</td>
											</tr>
											<?php $i++; } ?>
										</tbody>
									</table>
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
