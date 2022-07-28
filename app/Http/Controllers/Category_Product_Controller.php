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
        if(count($data['get_category_by_id'])>0){
            return view("user/category", $data);
        }elseif(count($data['get_product_by_id'])>0){
            $data['get_related_product'] = DB::table("products")->where("product_id", json_decode($data['get_product_by_id'][0]->related_product))->get();
            return view("user/product", $data);
        }
    }
}
