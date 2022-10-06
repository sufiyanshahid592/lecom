@extends('admin/template/main')
@section('title', 'Home')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Slider</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Slider</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
      	<?php if(Session::get("success")){ ?>
      	<div class="row">
      		<div class="col-lg-12 alert alert-success text-center"><?php echo Session::get("success"); ?></div>
      	</div>
      	<?php } ?>
      	<?php if(Session::get("error")){ ?>
      	<div class="row">
      		<div class="col-lg-12 alert alert-danger text-center"><?php echo Session::get("error"); ?></div>
      	</div>
      	<?php } ?>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Slider</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  	<?php foreach($all_sliders as $key=>$value){ ?>
                    <tr>
                      <td><?php echo $value->slider_title; ?></td>
                      <td><img width="150px" src="{{url('assets/images/'.$value->slider_image)}}" alt=""></td>
                      <td>
                        <a href="{{url('admin/edit-slider/'.$value->slider_id)}}" onclick="return confirm('Are you sure you want to edit this slider?')" class="btn btn-warning">Edit</a>
                        <a href="{{url('admin/delete-slider/'.$value->slider_id)}}" onclick="return confirm('Are you sure you want to delete this slider?')" class="btn btn-danger">Delete</a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection