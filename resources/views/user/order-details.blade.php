@extends('user/template/main')
@section('title', 'Home')
@section('content')
<main class="main pages">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('dashboard')}}" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{url('orders')}}" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('track-orders')}}" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('address')}}" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('account-detail')}}" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">My Order Details</h3>
                                        </div>
                                        <div class="card-body">
                                            <h4>Shipping Details</h4>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>Full Name</th>
                                                        <td><?php echo $get_order_details_by_id[0]->fname." ".$get_order_details_by_id[0]->lname; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address1</th>
                                                        <td><?php echo $get_order_details_by_id[0]->billing_address1; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Address2</th>
                                                        <td><?php echo $get_order_details_by_id[0]->billing_address2; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Country</th>
                                                        <td><?php echo $get_order_details_by_id[0]->country; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>City</th>
                                                        <td><?php echo $get_order_details_by_id[0]->city; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Zipcode</th>
                                                        <td><?php echo $get_order_details_by_id[0]->zipcode; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Phone</th>
                                                        <td><?php echo $get_order_details_by_id[0]->phone; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Additional Information</th>
                                                        <td><?php echo $get_order_details_by_id[0]->additional_information; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <h4>Prodcut Details</h4>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Variations</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach(json_decode($get_order_details_by_id[0]->cart_product) as $key=>$value){ ?>
                                                        <tr>
                                                            <td><?php echo $value->name; ?></td>
                                                            <td><?php echo $value->price; ?></td>
                                                            <td><?php foreach(json_decode($value->options->product_variations) as $key1=>$value1){echo "<strong>".$key1.":</strong> ".$value1."<br>";} ?></td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection