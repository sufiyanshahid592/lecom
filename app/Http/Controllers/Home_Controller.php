<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Home_Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index(){
    	$data['get_all_categories'] = DB::table("categories")->get();
    	$data['get_all_products'] = DB::table("products")->limit(10)->leftJoin('categories', 'categories.category_id', '=', 'products.product_category')->get();
        $data['get_top_selling_products'] = DB::table("products")->leftJoin('categories', 'categories.category_id', '=', 'products.product_category')->where("product_fall_in", 1)->get();
        $data['get_trending_products'] = DB::table("products")->leftJoin('categories', 'categories.category_id', '=', 'products.product_category')->where("product_fall_in", 2)->get();
        $data['get_recently_added_products'] = DB::table("products")->leftJoin('categories', 'categories.category_id', '=', 'products.product_category')->where("product_fall_in", 3)->get();
        $data['get_top_rated_products'] = DB::table("products")->leftJoin('categories', 'categories.category_id', '=', 'products.product_category')->where("product_fall_in", 4)->get();
    	$data['get_popular_category'] = DB::table("categories")->where("popular_product", 1)->get();
    	return view("user/home", $data);
    }
    public function page_privacy_policy(){
    	return view("user/page-privacy-policy");
    }
    public function product_quick_view(Request $request){
    	$get_product_by_id = DB::table("products")->leftJoin('categories', 'categories.category_id', '=', 'products.product_category')->where("product_id", $request->input("product_id"))->get();
    	?>
    	<div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <?php if(!empty($get_product_by_id[0]->product_image)){ ?>
                                    <figure class="border-radius-10">
                                        <img src="<?php echo url('assets/images/'.$get_product_by_id[0]->product_image); ?>" alt="product image" />
                                    </figure>
                                    <?php } ?>
                                    <?php foreach(json_decode($get_product_by_id[0]->product_gallery) as $key=>$value){ ?>
                                    <figure class="border-radius-10">
                                        <img src="<?php echo url('assets/images/'.$value); ?>" alt="product image" />
                                    </figure>
                                    <?php } ?>
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails">
                                    <?php if(!empty($get_product_by_id[0]->product_image)){ ?>
                                    <div><img src="<?php echo url('assets/images/'.$get_product_by_id[0]->product_image); ?>" alt="product image" /></div>
                                    <?php } ?>
                                    <?php foreach(json_decode($get_product_by_id[0]->product_gallery) as $key=>$value){ ?>
                                    <div><img src="<?php echo url('assets/images/'.$value); ?>" alt="product image" /></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <span class="stock-status out-stock"> Sale Off </span>
                                <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">Sufiyan</a></h3>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">$<?php echo number_format($get_product_by_id[0]->product_discount_price, 2); ?></span>
                                        <span>
                                            <span class="save-price font-md color3 ml-15"><?php echo get_discount_percentage($get_product_by_id[0]->product_sale_price, $get_product_by_id[0]->product_discount_price); ?>% Off</span>
                                            <span class="old-price font-md ml-15">$<?php echo number_format($get_product_by_id[0]->product_sale_price, 2); ?></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="detail-extralink mb-30">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <span class="qty-val">1</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                                <div class="font-xs">
                                    <ul>
                                        <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                        <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2022</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    	<?php
    }
}
