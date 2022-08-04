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
        /*echo "<pre>";
        print_r($request->input());*/
        Cart::add(['id'=>$request->input("product_id"), 'name'=>"First", 'qty'=>1, 'price'=>100, 'weight'=>24]);
    }
}
