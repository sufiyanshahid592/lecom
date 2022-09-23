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
                    <h2><a href="<?php echo $value->product_slug; ?>"><?php echo $value->product_title; ?></a></h2>
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
        <option <?php if(!empty($product_variation)){if(in_array($value->attribute_value_title,$product_variation->$variation_title)){echo "selected";}} ?> value="<?php echo $value->attribute_value_title; ?>"><?php echo $value->attribute_value_title; ?></option>
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
function main_menu_category(){
    $get_all_parent_category = DB::table("categories")->limit(5)->where("parent_category")->get();
    foreach($get_all_parent_category as $key=>$value){
        $get_sub_category = DB::table("categories")->where("parent_category", $value->category_id)->get();
        ?>
        <li>
            <a class="active" href="<?php echo $value->category_slug; ?>"><?php echo $value->category_name; ?> 
            <?php if(count($get_sub_category)){ ?><i class="fi-rs-angle-down"></i></a> 
            <ul class="sub-menu">
                <?php foreach($get_sub_category as $key1=>$value1){ ?>
                <li><a href="<?php echo $value1->category_slug; ?>"><?php echo $value1->category_name; ?></a></li>
                <?php } ?>
            </ul>
            <?php } ?>
        </li>
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

?>