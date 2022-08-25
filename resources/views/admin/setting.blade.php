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
					<h1>Setting</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Setting</li>
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
							<h3 class="card-title">Setting</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="{{url('admin/update-setting-process')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="form-group">
									<label>Website Title</label>
									<input type="text" name="website_title" class="form-control" placeholder="Enter Website Title" value="<?php if(!empty($website_setting[0]->website_title)){echo $website_setting[0]->website_title;} ?>">
								</div>
								<div class="form-group">
									<label>Website Currency</label>
									<input type="text" name="website_currency" class="form-control" placeholder="Enter Website Currency" value="<?php if(!empty($website_setting[0]->website_currency)){echo $website_setting[0]->website_currency;} ?>">
								</div>
								<div class="form-group">
									<label>Website Logo</label>
									<input type="file" name="website_logo" class="form-control" >
									<?php if(!empty($website_setting[0]->website_title)){ ?> 
										<img src="{{url('assets/images/'.$website_setting[0]->website_logo)}}" alt="">
									<?php } ?>
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