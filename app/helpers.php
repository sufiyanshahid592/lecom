<?php 
use Illuminate\Support\Facades\DB;

function website_title(){
    $website_setting = DB::table("setting")->where("setting_id", 1)->get();
    if(Request::segment(1)=="admin" AND Request::segment(2)=="setting"){
        return "Admin Setting | ".$website_setting[0]->website_title;
    }elseif(Request::segment(1)=="cart"){
        return "Cart | ".$website_setting[0]->website_title;
    }elseif(Request::segment(1)=="checkout"){
        return "Checkout | ".$website_setting[0]->website_title;
    }else{
        return $website_setting[0]->website_title;
    }
}
function website_logo(){
    $website_setting = DB::table("setting")->where("setting_id", 1)->get();
    return $website_setting[0]->website_logo;
}
function website_address(){
    $website_setting = DB::table("setting")->where("setting_id", 1)->get();
    return $website_setting[0]->website_address;
}
function website_number(){
    $website_setting = DB::table("setting")->where("setting_id", 1)->get();
    return $website_setting[0]->website_number;
}
function website_email(){
    $website_setting = DB::table("setting")->where("setting_id", 1)->get();
    return $website_setting[0]->website_email;
}
function website_timing(){
    $website_setting = DB::table("setting")->where("setting_id", 1)->get();
    return $website_setting[0]->website_timing;
}
function website_footer_description(){
    $website_setting = DB::table("setting")->where("setting_id", 1)->get();
    return $website_setting[0]->website_footer_description;
}
function website_currency(){
    $website_setting = DB::table("setting")->where("setting_id", 1)->get();
    return $website_setting[0]->website_currency;
}
function get_category_product_count($category_id){
	$result = DB::table("products")->where("product_category", $category_id)->get();
	return count($result);
}
function get_discount_percentage($sale_price, $discount_price){
	// return ($sale_price / 100) * $discount_price;
	return number_format((($sale_price - $discount_price)/$sale_price)*100, 0);
}
function get_popular_category_products($category_id){
	$get_product_by_id = DB::table("products")->limit(10)->leftJoin('categories', 'categories.category_id', '=', 'products.product_category')->where("category_id", $category_id)->get();
	//print_r($get_product_by_id);
	?>
    <div class="row product-grid-4">
        <?php foreach($get_product_by_id as $key=>$value){ ?>
        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
            <div class="product-cart-wrap mb-30">
                <div class="product-img-action-wrap">
                    <div class="product-img product-img-zoom">
                        <a href="<?php echo $value->product_slug; ?>">
                            <img class="default-img" src="<?php echo url('assets/images/'.$value->product_image); ?>" alt="" />
                            <img class="hover-img" src="<?php echo url('assets/images/'.$value->product_hover_image); ?>" alt="" />
                        </a>
                    </div>
                    <!-- <div class="product-action-1">
                        <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                        <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                        <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
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
                        <a href="<?php echo $value->category_slug; ?>"><?php echo $value->category_name; ?></a>
                    </div>
                    <h2>
                        <a href="<?php echo $value->product_slug; ?>"><?php echo $value->product_title; ?></a>
                    </h2>
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
                        <div class="add-cart">
                            <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!--end product card-->
    </div>
	<?php
}
function get_daily_best_sells_products($category_id, $i){
    $get_product_by_id = DB::table("products")->limit(10)->leftJoin('categories', 'categories.category_id', '=', 'products.product_category')->where("category_id", $category_id)->get();
    ?>
    <div class="carausel-4-columns-cover arrow-center position-relative">
        <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
        <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-<?php if($i!=1){echo $i;} ?>">
            <?php foreach($get_product_by_id as $key=>$value){ ?>
            <div class="product-cart-wrap">
                <div class="product-img-action-wrap">
                    <div class="product-img product-img-zoom">
                        <a href="shop-product-right.html">
                            <img class="default-img" src="<?php echo url('assets/images/'.$value->product_image); ?>" alt="" />
                            <img class="hover-img" src="<?php echo url('assets/images/'.$value->product_hover_image); ?>" alt="" />
                        </a>
                    </div>
                    <!-- <div class="product-action-1">
                        <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i class="fi-rs-eye"></i></a>
                        <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                        <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
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
                        <a href="<?php echo $value->category_slug; ?>"><?php echo $value->category_name; ?></a>
                    </div>
                    <h2>
                        <a href="<?php echo $value->product_slug; ?>"><?php echo $value->product_title; ?></a>
                    </h2>
                    <div class="product-rate d-inline-block">
                        <div class="product-rating" style="width: 80%"></div>
                    </div>
                    <div class="product-price mt-10">
                        <span>$238.85 </span>
                        <span class="old-price">$245.8</span>
                    </div>
                    <div class="sold mt-15 mb-15">
                        <div class="progress mb-5">
                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="font-xs text-heading"> Sold: 90/120</span>
                    </div>
                    <a href="shop-cart.html" class="btn w-100 hover-up"><i class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php
}
function get_all_category_for_dropdown(){
    $get_all_categories = DB::table("categories")->get();
    foreach($get_all_categories as $key=>$value){ 
    ?>
    <option value="<?php echo $value->category_slug; ?>"><?php echo $value->category_name; ?></option>
    <?php 
    }
}
function get_cart_content(){
    ?>
    <a class="mini-cart-icon" href="<?php echo url('cart'); ?>">
        <img alt="Nest" src="<?php echo url('assets/user//imgs/theme/icons/icon-cart.svg'); ?>" />
        <span class="pro-count blue"><?php echo count(Cart::content()); ?></span>
    </a>
    <a href="<?php echo url('cart'); ?>"><span class="lable">Cart</span></a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            <?php foreach(Cart::content() as $key=>$value){ ?>
            <li class="<?php echo $value->rowId; ?>">
                <div class="shopping-cart-img">
                    <a href="shop-product-right.html"><img alt="Nest" src="<?php echo url('assets/images/'.$value->options['image']); ?>" /></a>
                </div>
                <div class="shopping-cart-title">
                    <h4><a href="shop-product-right.html"><?php echo $value->name; ?></a></h4>
                    <h4><span><?php echo $value->qty; ?> × </span>$<?php echo $value->price; ?>.00</h4>
                </div>
                <div class="shopping-cart-delete">
                    <a><i class="fi-rs-cross-small remove-from_cart" data-id="<?php echo $value->rowId; ?>"></i></a>
                </div>
            </li>
            <?php } ?>
        </ul>
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total">
                <h4>Total <span>$<?php echo Cart::total(); ?>.00</span></h4>
            </div>
            <div class="shopping-cart-button">
                <a href="<?php echo url('cart'); ?>" class="outline">View cart</a>
                <a href="<?php echo url('checkout'); ?>">Checkout</a>
            </div>
        </div>
    </div>
    <?php
}
function get_attributes_value_by_id($attribute_id, $product_id){
    $get_attributes_by_id = DB::table("attributes")->where("attribute_id", $attribute_id)->get();
    $get_attributes_value_by_id = DB::table("attributes_value")->where("attribute_id", $attribute_id)->get();
    $get_product_detail_by_id = DB::table("products")->where("product_id", $product_id)->get();
    $product_variation = json_decode($get_product_detail_by_id[0]->product_variations_values);
    $variation_title = $get_attributes_by_id[0]->attribute_title;
    foreach($get_attributes_value_by_id as $key=>$value){
        ?>
        <option <?php foreach($product_variation as $key1=>$value1){if($variation_title==$key1){if(!empty($product_variation)){if(in_array($value->attribute_value_title,$product_variation->$variation_title)){echo "selected";}}}} ?> value="<?php echo $value->attribute_value_title; ?>"><?php echo $value->attribute_value_title; ?></option>
        <?php
    }
}
function get_attributes_value_by_id_second($attribute_id){
    $get_attributes_by_id = DB::table("attributes")->where("attribute_id", $attribute_id)->get();
    $get_attributes_value_by_id = DB::table("attributes_value")->where("attribute_id", $attribute_id)->get();
    foreach($get_attributes_value_by_id as $key=>$value){
        ?>
        <option value="<?php echo $value->attribute_value_title; ?>"><?php echo $value->attribute_value_title; ?></option>
        <?php
    }
}
function dropdown_category(){
    $get_all_parent_category = DB::table("categories")->where("parent_category")->get();
    $i = 1;
    ?><div class="d-flex categori-dropdown-inner"> <ul> <?php
    foreach($get_all_parent_category as $key=>$value){
        if($i<=5){
        ?>
            <li>
                <a href="<?php echo $value->category_slug; ?>"> <img src="<?php echo url('assets/images/'.$value->category_icon); ?>" alt="" /><?php echo $value->category_name; ?></a>
            </li>
        <?php $i++; }
    }
    ?> </ul><ul> <?php $i = 1;
    foreach($get_all_parent_category as $key=>$value){
        if($i>=6 AND $i<=10){
        ?>
            <li>
                <a href="<?php echo $value->category_slug; ?>"> <img src="<?php echo url('assets/images/'.$value->category_icon); ?>" alt="" /><?php echo $value->category_name; ?></a>
            </li>
        <?php } $i++; 
    }
    ?> </ul></div><div class="more_slide_open" style="display: none"><div class="d-flex categori-dropdown-inner"><ul> <?php $i = 1;
    foreach($get_all_parent_category as $key=>$value){
        if($i>10 AND $i % 2 != 0){
        ?>
            <li>
                <a href="<?php echo $value->category_slug; ?>"> <img src="<?php echo url('assets/images/'.$value->category_icon); ?>" alt="" /><?php echo $value->category_name; ?></a>
            </li>
        <?php  }$i++;
    }
    ?> </ul><ul> <?php $i = 1;
    foreach($get_all_parent_category as $key=>$value){
        if($i>10 AND $i % 2 == 0){
        ?>
            <li>
                <a href="<?php echo $value->category_slug; ?>"> <img src="<?php echo url('assets/images/'.$value->category_icon); ?>" alt="" /><?php echo $value->category_name; ?></a>
            </li>
        <?php } $i++; 
    }
    ?> </div></div> <?php
}
function get_number_of_category_products($category_id){
    $result = DB::table("products")->where("product_category", $category_id)->get();
    return count($result);
}
function get_time_ago( $time )
{
    $time_difference = time() - $time;

    if($time_difference < 1){ 
        return 'less than 1 second ago'; 
    }
    $condition = array( 
        12 * 30 * 24 * 60 * 60 =>  'year',
        30 * 24 * 60 * 60       =>  'month',
        24 * 60 * 60            =>  'day',
        60 * 60                 =>  'hour',
        60                      =>  'minute',
        1                       =>  'second'
    );
    foreach($condition as $secs => $str){
        $d = $time_difference / $secs;
        if($d >= 1){
            $t = round( $d );
            return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}

?>