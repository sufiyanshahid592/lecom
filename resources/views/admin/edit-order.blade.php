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
					<h1>Edit Order</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Edit Order</li>
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
							<h3 class="card-title">Shipping Details</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<table class="table">
							<tr>
								<th>Full Name</th>
								<td><?php echo $get_order_detail_by_id[0]->fname." ".$get_order_detail_by_id[0]->lname; ?></td>
							</tr>
							<tr>
								<th>Address 1</th>
								<td><?php echo $get_order_detail_by_id[0]->billing_address1; ?></td>
							</tr>
							<tr>
								<th>Address 1</th>
								<td><?php echo $get_order_detail_by_id[0]->billing_address2; ?></td>
							</tr>
							<tr>
								<th>Country</th>
								<td><?php echo $get_order_detail_by_id[0]->country; ?></td>
							</tr>
							<tr>
								<th>City</th>
								<td><?php echo $get_order_detail_by_id[0]->city; ?></td>
							</tr>
							<tr>
								<th>Zipcode</th>
								<td><?php echo $get_order_detail_by_id[0]->zipcode; ?></td>
							</tr>
							<tr>
								<th>Phone</th>
								<td><?php echo $get_order_detail_by_id[0]->phone; ?></td>
							</tr>
							<tr>
								<th>Additional Information</th>
								<td><?php echo $get_order_detail_by_id[0]->additional_information; ?></td>
							</tr>
						</table>
					</div>
					<!-- /.card -->
				</div>
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Product List</h3>
						</div>
						<table class="table">
							<tr>
								<th>Name</th>
								<th>Variation</th>
								<th>Price</th>
							</tr>
							<?php //echo "<pre>"; print_r(json_decode($get_order_detail_by_id[0]->cart_product)); ?>
							<?php foreach(json_decode($get_order_detail_by_id[0]->cart_product) as $key=>$value){ ?>
							<tr>
								<td><?php echo $value->name; ?></td>
								<td><?php foreach(json_decode($value->options->product_variations) as $key1=>$value1){echo "<b>".$key1.":</b> ".$value1.", ";} ?></td>
								<td><?php echo $value->price; ?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Payment Status</h3>
						</div>
						<form action="{{url('admin/edit-order-process')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="form-group">
									<select name="payment_status" class="form-control">
										<option <?php if($get_order_detail_by_id[0]->payment_status==0){echo "selected";} ?> value="0">Pending Payment</option>
										<option <?php if($get_order_detail_by_id[0]->payment_status==1){echo "selected";} ?> value="1">Processing</option>
										<option <?php if($get_order_detail_by_id[0]->payment_status==2){echo "selected";} ?> value="2">Completed</option>
									</select>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<input type="hidden" name="order_id" value="<?php echo $get_order_detail_by_id[0]->order_id; ?>" >
								<button type="submit" class="btn btn-primary">Next</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection
