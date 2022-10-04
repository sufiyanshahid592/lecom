@extends('user/template/main')
@section('title', 'Home')
@section('content')
<main class="main">
    <section class="home-slider position-relative mb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 d-none d-lg-flex">
                    <div class="categories-dropdown-wrap style-2 font-heading mt-30">
                        <div class="d-flex categori-dropdown-inner">
                            <ul>
                                <?php $i = 1; foreach($get_all_categories as $key=>$value){ if($i<12){ if(in_array(1, (array)json_decode($value->category_placement))){ ?>
                                <li>
                                    <a href="{{url($value->category_slug)}}"> <img src="{{url('assets/images/'.$value->category_icon)}}" alt="" /><?php echo $value->category_name; ?></a>
                                </li>
                                <?php } } $i++; } ?>
                            </ul>
                        </div>
                        <div class="more_slide_open" style="display: none">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    <?php $i = 1; foreach($get_all_categories as $key=>$value){ if($i>11){ ?>
                                    <li>
                                        <a href="{{url($value->category_slug)}}"> <img src="{{url('assets/images/'.$value->category_icon)}}" alt="" /><?php echo $value->category_name; ?></a>
                                    </li>
                                    <?php } $i++; } ?>
                                </ul>
                            </div>
                        </div>
                        <?php if(count($get_all_categories)>11){ ?>
                        <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="home-slide-cover mt-30">
                        <div class="hero-slider-1 style-5 dot-style-1 dot-style-1-position-2">
                            <div class="single-hero-slider single-animation-wrap" style="background-image: url(assets/user/imgs/slider/slider-7.png)">
                                <div class="slider-content">
                                    <h1 class="display-2 mb-40">
                                        Don’t miss amazing<br />
                                        grocery deals
                                    </h1>
                                    <p class="mb-65">Sign up for the daily newsletter</p>
                                    <form class="form-subcriber d-flex">
                                        <input type="email" placeholder="Your emaill address" />
                                        <button class="btn" type="submit">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                            <div class="single-hero-slider single-animation-wrap" style="background-image: url(assets/user/imgs/slider/slider-8.png)">
                                <div class="slider-content">
                                    <h1 class="display-2 mb-40">
                                        Fresh Vegetables<br />
                                        Big discount
                                    </h1>
                                    <p class="mb-65">Save up to 50% off on your first order</p>
                                    <form class="form-subcriber d-flex">
                                        <input type="email" placeholder="Your emaill address" />
                                        <button class="btn" type="submit">Subscribe</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="slider-arrow hero-slider-1-arrow"></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-md-6 col-lg-12">
                            <div class="banner-img style-4 mt-30">
                                <img src="{{url('assets/user/imgs/banner/banner-14.png')}}" alt="" />
                                <div class="banner-text">
                                    <h4 class="mb-30">
                                        Everyday Fresh &amp; <br />Clean with Our<br />
                                        Products
                                    </h4>
                                    <a href="shop-grid-right.html" class="btn btn-xs mb-50">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-12">
                            <div class="banner-img style-5 mt-5 mt-md-30">
                                <img src="{{url('assets/user/imgs/banner/banner-15.png')}}" alt="" />
                                <div class="banner-text">
                                    <h5 class="mb-20">
                                        The best Organic <br />
                                        Products Online
                                    </h5>
                                    <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End hero slider-->
    <section class="popular-categories section-padding">
        <div class="container wow animate__animated animate__fadeIn">
            <div class="section-title">
                <div class="title">
                    <h3>Featured Categories</h3>
                    <!-- <ul class="list-inline nav nav-tabs links">
                        <li class="list-inline-item nav-item"><a class="nav-link" href="shop-grid-right.html">Cake & Milk</a></li>
                        <li class="list-inline-item nav-item"><a class="nav-link" href="shop-grid-right.html">Coffes & Teas</a></li>
                        <li class="list-inline-item nav-item"><a class="nav-link active" href="shop-grid-right.html">Pet Foods</a></li>
                        <li class="list-inline-item nav-item"><a class="nav-link" href="shop-grid-right.html">Vegetables</a></li>
                    </ul> -->
                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-10-columns-arrow" id="carausel-10-columns-arrows"></div>
            </div>
            <div class="carausel-10-columns-cover position-relative">
                <div class="carausel-10-columns" id="carausel-10-columns">
                    <?php $i = 1; foreach($get_all_categories as $key=>$value){if(in_array(2, (array)json_decode($value->category_placement))){ ?>
                    <div class="card-2 bg-<?php echo $i; ?> wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <figure class="img-hover-scale overflow-hidden">
                            <a href="{{url($value->category_slug)}}"><img src="{{url('assets/images/'.$value->category_image)}}" alt="" /></a>
                        </figure>
                        <h6><a href="{{url($value->category_slug)}}"><?php echo $value->category_name; ?></a></h6>
                        <span><?php echo get_category_product_count($value->category_id); ?> items</span>
                    </div>
                    <?php if($i>15){$i = 1;}else{$i++;} } } ?>
                </div>
            </div>
        </div>
    </section>
    <!--End category slider-->
    <section class="banners mb-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <img src="{{url('assets/user/imgs/banner/banner-1.png')}}" alt="" />
                        <div class="banner-text">
                            <h4>
                                Everyday Fresh & <br />Clean with Our<br />
                                Products
                            </h4>
                            <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-img wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <img src="{{url('assets/user/imgs/banner/banner-2.png')}}" alt="" />
                        <div class="banner-text">
                            <h4>
                                Make your Breakfast<br />
                                Healthy and Easy
                            </h4>
                            <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-md-none d-lg-flex">
                    <div class="banner-img mb-sm-0 wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                        <img src="{{url('assets/user/imgs/banner/banner-3.png')}}" alt="" />
                        <div class="banner-text">
                            <h4>The best Organic <br />Products Online</h4>
                            <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End banners-->
    <section class="product-tabs section-padding position-relative">
        <div class="container">
            <div class="section-title style-2 wow animate__animated animate__fadeIn">
                <h3>Popular Products</h3>
                <ul class="nav nav-tabs links" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
                    </li>
                    <?php foreach($get_popular_category as $key=>$value){ ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-<?php echo $value->category_slug; ?>" data-bs-toggle="tab" data-bs-target="#<?php echo $value->category_slug; ?>" type="button" role="tab" aria-controls="<?php echo $value->category_slug; ?>" aria-selected="false"><?php echo $value->category_name; ?></button>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        <?php foreach($get_all_products as $key=>$value){ ?>
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{$value->product_slug}}">
                                            <img class="default-img" src="{{url('assets/images/'.$value->product_image)}}" alt="" />
                                            <img class="hover-img" src="{{url('assets/images/'.$value->product_hover_image)}}" alt="" />
                                        </a>
                                    </div>
                                    <!-- <div class="product-action-1">
                                        <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                        <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                        <a aria-label="Quick view" class="action-btn quickViewModal" data-product-id="{{$value->product_id}}" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                    </div> -->
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <?php if($value->product_label==1){ ?>
                                            <span class="hot">Hot</span>
                                        <?php }elseif($value->product_label==2){ ?>
                                            <span class="sale">Sale</span>
                                        <?php }elseif($value->product_label==3){ ?>
                                            <span class="best">Best sale</span>
                                        <?php }elseif($value->product_label==4){ ?>
                                            <span class="new">New</span>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="{{$value->category_slug}}">{{$value->category_name}}</a>
                                    </div>
                                    <h2><a href="{{$value->product_slug}}">{{$value->product_title}}</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                    <!-- <div>
                                        <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                    </div> -->
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span><?php echo website_currency()." ".number_format($value->product_discount_price, 2); ?></span>
                                            <span class="old-price"><?php echo website_currency()." ".number_format($value->product_sale_price, 2); ?></span>
                                        </div>
                                        <!-- <div class="add-cart">
                                            <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!--end product card-->
                    </div>
                    <!--End product-grid-4-->
                </div>
                <!--En tab one-->
                <?php foreach($get_popular_category as $key=>$value){ ?>
                <div class="tab-pane fade" id="<?php echo $value->category_slug; ?>" role="tabpanel" aria-labelledby="<?php echo $value->category_slug; ?>">
                    <?php get_popular_category_products($value->category_id); ?>
                </div>
                <?php } ?>
            </div>
            <!--End tab-content-->
        </div>
    </section>
    <!--Products Tabs-->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="banner-img style-6 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <img src="{{url('assets/user/imgs/banner/banner-16.png')}}" alt="" />
                        <div class="banner-text">
                            <h6 class="mb-10 mt-30">Everyday Fresh with<br />Our Products</h6>
                            <p>Go to supplier</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="banner-img style-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                        <img src="{{url('assets/user/imgs/banner/banner-17.png')}}" alt="" />
                        <div class="banner-text">
                            <h6 class="mb-10 mt-30">100% guaranteed all<br />Fresh items</h6>
                            <p>Go to supplier</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="banner-img style-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                        <img src="{{url('assets/user/imgs/banner/banner-18.png')}}" alt="" />
                        <div class="banner-text">
                            <h6 class="mb-10 mt-30">Special grocery sale<br />off this month</h6>
                            <p>Go to supplier</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="banner-img style-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
                        <img src="{{url('assets/user/imgs/banner/banner-19.png')}}" alt="" />
                        <div class="banner-text">
                            <h6 class="mb-10 mt-30">
                                Enjoy 15% OFF for all<br />
                                vegetable and fruit
                            </h6>
                            <p>Go to supplier</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End 4 banners-->
    <section class="section-padding pb-5">
        <div class="container">
            <div class="section-title wow animate__animated animate__fadeIn">
                <h3 class="">Daily Best Sells</h3>
                <ul class="nav nav-tabs links" id="myTab-2" role="tablist">
                    <?php foreach($get_daily_best_sells_category as $key=>$value){ ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-<?php echo $value->category_slug; ?>" data-bs-toggle="tab" data-bs-target="#daily-best-sells-<?php echo $value->category_slug; ?>" type="button" role="tab" aria-controls="daily-best-sells-<?php echo $value->category_slug; ?>" aria-selected="false"><?php echo $value->category_name; ?></button>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                    <div class="banner-img style-2">
                        <div class="banner-text">
                            <h2 class="mb-100">Bring nature into your home</h2>
                            <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                    <div class="tab-content" id="myTabContent-1">
                        <?php $i = 1; foreach($get_daily_best_sells_category as $key=>$value){ ?>
                        <div class="tab-pane fade <?php if($i==1){echo "show active";} ?>" id="daily-best-sells-<?php echo $value->category_slug; ?>" role="tabpanel" aria-labelledby="daily-best-sells-<?php echo $value->category_slug; ?>">
                            <?php get_daily_best_sells_products($value->category_id); ?>
                        </div>
                        <?php $i++; } ?>
                    </div>
                    <!--End tab-content-->
                </div>
                <!--End Col-lg-9-->
            </div>
        </div>
    </section>
    <!--End Best Sales-->
    <section class="section-padding pb-5">
        <div class="container">
            <div class="section-title wow animate__animated animate__fadeIn" data-wow-delay="0">
                <h3 class="">Deals Of The Day</h3>
                <a class="show-all" href="shop-grid-right.html">
                    All Deals
                    <i class="fi-rs-angle-right"></i>
                </a>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="product-img-action-wrap">
                            <div class="product-img">
                                <a href="shop-product-right.html">
                                    <img src="{{url('assets/user/imgs/banner/banner-5.png')}}" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="deals-countdown-wrap">
                                <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>
                            </div>
                            <div class="deals-content">
                                <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, & Red Rice</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$32.85</span>
                                        <span class="old-price">$33.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <div class="product-img-action-wrap">
                            <div class="product-img">
                                <a href="shop-product-right.html">
                                    <img src="{{url('assets/user/imgs/banner/banner-6.png')}}" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="deals-countdown-wrap">
                                <div class="deals-countdown" data-countdown="2026/04/25 00:00:00"></div>
                            </div>
                            <div class="deals-content">
                                <h2><a href="shop-product-right.html">Perdue Simply Smart Organics Gluten Free</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">Old El Paso</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$24.85</span>
                                        <span class="old-price">$26.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 d-none d-lg-block">
                    <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <div class="product-img-action-wrap">
                            <div class="product-img">
                                <a href="shop-product-right.html">
                                    <img src="{{url('assets/user/imgs/banner/banner-7.png')}}" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="deals-countdown-wrap">
                                <div class="deals-countdown" data-countdown="2027/03/25 00:00:00"></div>
                            </div>
                            <div class="deals-content">
                                <h2><a href="shop-product-right.html">Signature Wood-Fired Mushroom and Caramelized</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 80%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (3.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">Progresso</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$12.85</span>
                                        <span class="old-price">$13.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 d-none d-xl-block">
                    <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <div class="product-img-action-wrap">
                            <div class="product-img">
                                <a href="shop-product-right.html">
                                    <img src="{{url('assets/user/imgs/banner/banner-8.png')}}" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="deals-countdown-wrap">
                                <div class="deals-countdown" data-countdown="2025/02/25 00:00:00"></div>
                            </div>
                            <div class="deals-content">
                                <h2><a href="shop-product-right.html">Simply Lemonade with Raspberry Juice</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 80%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (3.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">Yoplait</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$15.85</span>
                                        <span class="old-price">$16.8</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Deals-->
    <section class="section-padding mb-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                    <h4 class="section-title style-1 mb-30 animated animated">Top Selling</h4>
                    <div class="product-list-small animated animated">
                        <?php foreach($get_top_selling_products as $key=>$value){ ?>
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{$value->product_slug}}"><img src="{{url('assets/images/'.$value->product_image)}}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{$value->product_slug}}"><?php echo $value->product_title; ?></a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    <span><?php echo website_currency()." ".number_format($value->product_discount_price, 2); ?></span>
                                    <span class="old-price"><?php echo website_currency()." ".number_format($value->product_sale_price, 2); ?></span>
                                </div>
                            </div>
                        </article>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                    <h4 class="section-title style-1 mb-30 animated animated">Trending Products</h4>
                    <div class="product-list-small animated animated">
                        <?php foreach($get_trending_products as $key=>$value){ ?>
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{$value->product_slug}}"><img src="{{url('assets/images/'.$value->product_image)}}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{$value->product_slug}}"><?php echo $value->product_title; ?></a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    <span><?php echo website_currency()." ".number_format($value->product_discount_price, 2); ?></span>
                                    <span class="old-price"><?php echo website_currency()." ".number_format($value->product_sale_price, 2); ?></span>
                                </div>
                            </div>
                        </article>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                    <div class="product-list-small animated animated">
                        <?php foreach($get_recently_added_products as $key=>$value){ ?>
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{$value->product_slug}}"><img src="{{url('assets/images/'.$value->product_image)}}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{$value->product_slug}}"><?php echo $value->product_title; ?></a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    <span><?php echo website_currency()." ".number_format($value->product_discount_price, 2); ?></span>
                                    <span class="old-price"><?php echo website_currency()." ".number_format($value->product_sale_price, 2); ?></span>
                                </div>
                            </div>
                        </article>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <h4 class="section-title style-1 mb-30 animated animated">Top Rated</h4>
                    <div class="product-list-small animated animated">
                        <?php foreach($get_top_rated_products as $key=>$value){ ?>
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{$value->product_slug}}"><img src="{{url('assets/images/'.$value->product_image)}}" alt="" /></a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{$value->product_slug}}"><?php echo $value->product_title; ?></a>
                                </h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div class="product-price">
                                    <span><?php echo website_currency()." ".number_format($value->product_discount_price, 2); ?></span>
                                    <span class="old-price"><?php echo website_currency()." ".number_format($value->product_sale_price, 2); ?></span>
                                </div>
                            </div>
                        </article>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End 4 columns-->
</main>
@endsection