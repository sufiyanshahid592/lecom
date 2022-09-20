@extends('admin/template/main')
@section('title', 'Home')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders Process</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders Process</li>
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
                <h3 class="card-title">Orders Delivered</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Date</th>
                    <th>Full Name</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($all_orders as $key=>$value){ ?>
                    <tr>
                      <td><?php echo date("d-m-Y", $value->order_date); ?></td>
                      <td><?php echo $value->fname." ".$value->lname; ?></td>
                      <td><?php echo "$".$value->order_total; ?> for <?php echo count((array)json_decode($value->cart_product)); ?> item</td>
                      <td><?php if($value->payment_status==0){echo "Pending Payment";}elseif($value->payment_status==1){echo "Processing";}elseif($value->payment_status==2){echo "Completed";} ?></td>
                      <td><a href="{{url('admin/edit-order/'.$value->order_id.'?redirect_page=delivered-orders')}}" class="btn btn-primary">Edit Order</a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Date</th>
                    <th>Full Name</th>
                    <th>Total</th>
                    <th>Status</th>
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