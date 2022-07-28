<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Dashboard_Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function dashboard(){
    	return view("user/dashboard");
    }
    public function orders(){
    	return view("user/orders");
    }
    public function track_orders(){
    	return view("user/track-orders");
    }
    public function address(){
    	return view("user/address");
    }
    public function account_detail(){
    	return view("user/account-detail");
    }
}
