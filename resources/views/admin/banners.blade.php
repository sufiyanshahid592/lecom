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
					<form action="{{url('admin/update-banners-process')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="card card-primary">
							<div class="card-header">
								<h3 class="card-title">Banners</h3>
							</div>
						</div>
						<?php 
							for($i = 1; $i <= 10; $i++){ 
								$text = "banner_".$i."_title";
								$image = "banner_".$i."_image";
								$old_image = "old_banner_".$i."_image";
						?>
						<div class="card card-primary">
							<div class="card-body">
								<div class="form-group">
									<label>Banner <?php echo $i; ?> link</label>
									<input type="text" name="<?php echo $text; ?>" class="form-control" placeholder="Enter Banner <?php echo $i; ?> link" value="<?php if(!empty($banners[0]->$text)){echo $banners[0]->$text;} ?>">
								</div>
								<div class="form-group">
									<label>Banner <?php echo $i; ?> Image</label>
									<input type="file" name="<?php echo $image; ?>" class="form-control" >
									<?php if(!empty($banners[0]->$image)){ ?> 
										<img src="{{url('elitemallpro/storage/uploads/banners/'.$banners[0]->$image)}}" style="margin-top: 10px;" >
										<input type="hidden" name="<?php echo $old_image; ?>" value="<?php echo $banners[0]->$image; ?>" >
									<?php } ?>
								</div>
							</div>
						</div>
						<?php } ?>
						<div class="card card-primary">
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Save Changes</button>
							</div>
						</div>
					</form>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>
</div>
@endsection