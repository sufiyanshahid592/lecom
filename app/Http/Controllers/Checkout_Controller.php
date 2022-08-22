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

class Checkout_Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function checkout(){
        if(empty(Session::get("user_login_id"))){
            return redirect('login');
        }
    	return view("user/checkout");
    }
    public function checkout_process(Request $request){
    	$data["fname"] = $request->input("fname");
    	$data["lname"] = $request->input("lname");
    	$data["billing_address1"] = $request->input("billing_address1");
    	$data["billing_address2"] = $request->input("billing_address2");
    	$data["country"] = $request->input("country");
    	$data["city"] = $request->input("city");
    	$data["zipcode"] = $request->input("zipcode");
    	$data["phone"] = $request->input("phone");
    	$data["additional_information"] = $request->input("additional_information");
    	$data["payment_option"] = $request->input("payment_option");
    	print_r(Cart::content());
    }
}
