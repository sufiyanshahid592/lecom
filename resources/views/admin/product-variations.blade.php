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
					<form action="{{url('admin/save-product-variations')}}" method="post">
						@csrf
						<?php foreach($get_product_variations as $key=>$value){ ?>
						<div class="form-group">
							<label class="control-label">Select <?php echo $value->attribute_title; ?></label>
							<select class="form-control variation-value select2" data-placeholder="Select <?php echo $value->attribute_title; ?>" name="<?php echo $value->attribute_title; ?>[]" multiple>
								<option value="">Select <?php echo $value->attribute_title; ?></option>
								<?php echo get_attributes_value_by_id($value->attribute_id, Request::segment(3)); ?>
							</select>
						</div>
						<?php } ?>
						<div class="form-group">
							<input type="hidden" name="product_id" value="<?php echo Request::segment(3); ?>">
							<input type="submit" value="Next" class="btn btn-primary">
						</div>
						<div class="form-group add-new-variation-error"></div>
					</form>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>
</div>
@endsection
