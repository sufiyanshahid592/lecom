<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Cart;

class Cart_Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function cart(){
    	$data = array();
    	$data['get_cart_products'] = Cart::content();
    	return view("user/cart", $data);
    }
    public function add_to_cart(Request $request){
        /*echo "<pre>";
        print_r($request->input());*/
        Cart::add(['id'=>$request->input("product_id"), 'name'=>"First", 'qty'=>1, 'price'=>100, 'weight'=>24]);
        return Cart::content();
    }
    public function update_cart(Request $request){
        Cart::update($request->input("row_id"), $request->input("product_qty"));
    }
    public function update_cart_area(){
        ?>
        <a class="mini-cart-icon" href="<?php echo url('cart'); ?>">
            <img alt="Nest" src="<?php echo url('assets/user//imgs/theme/icons/icon-cart.svg'); ?>" />
            <span class="pro-count blue"><?php echo count(Cart::content()); ?></span>
        </a>
        <a href="<?php echo url('cart'); ?>"><span class="lable">Cart</span></a>
        <div class="cart-dropdown-wrap cart-dropdown-hm2">
            <ul>
                <?php foreach(Cart::content() as $key=>$value){ ?>
                <li>
                    <div class="shopping-cart-img">
                        <a href="shop-product-right.html"><img alt="Nest" src="<?php echo url('assets/uploads/products-images/'.$value->image); ?>" /></a>
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
                    <h4>Total <span>$<?php echo number_format(Cart::total(), 2); ?></span></h4>
                </div>
                <div class="shopping-cart-button">
                    <a href="<?php echo url('cart'); ?>" class="outline">View cart</a>
                    <a href="<?php echo url('checkout'); ?>">Checkout</a>
                </div>
            </div>
        </div>
        <?php
    }
    public function count_cart(){
        echo count($this->cart->contents());
    }
    public function checkout_total(){
        echo "$".Cart::total();
    }
    public function destroy_cart(){
        Cart::destroy();
    }
}
