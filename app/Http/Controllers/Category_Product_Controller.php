<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Category_Product_Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function dynamic_pages($slug){
        $data['get_category_by_id'] = DB::table("categories")->where("category_slug", $slug)->get();
        $data['get_product_by_id'] = DB::table("products")->leftJoin('categories', 'categories.category_id', '=', 'products.product_category')->where("product_slug", $slug)->get();
        /*echo "<pre>";
        print_r($data);
        die();*/
        if(count($data['get_category_by_id'])>0){
            $data['get_product_by_category_id'] = DB::table("products")->leftJoin('categories', 'categories.category_id', '=', 'products.product_category')->where("product_category", $data['get_category_by_id'][0]->category_id)->get();
            return view("user/category", $data);
        }elseif(count($data['get_product_by_id'])>0){
            $data['get_related_product'] = DB::table("products")->whereIn("product_id", json_decode($data['get_product_by_id'][0]->related_product))->get();
            return view("user/product", $data);
        }else{
            return view("user/404");
        }
    }
    public function product_variations_price(Request $request){
        $product_id = $request->input("product_id");
        $product_variation_data = $request->input("variation_content");
        $result = DB::table("product_variations")->where("product_id", $product_id)->where("product_variation_data", $product_variation_data)->get();
        if(count($result)>0){
            return number_format($result[0]->product_variation_price, 2);
        }else{
            echo "Not Available";
        }
    }
}
