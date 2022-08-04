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
    
    public function add_to_cart(Request $request){
        // Cart::destroy();
        // $get_product_details_by_id = DB::table("products")->where("product_id", $request->input("product_id"))->get();
        /*print_r($request->post("variation_content"));
        die();*/
        // Cart::add(['id'=>$request->input("product_id"), 'name'=>"First", 'qty'=>1, 'price'=>$get_product_details_by_id[0]->product_discount_price, 'variations'=>$product_variations, 'weight'=>1]);
    }
}
