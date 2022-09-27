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
        $data = array();
        $data['get_all_order_by_user_id'] = DB::table("orders")->get();
    	return view("user/orders", $data);
    }
    public function order_details($id){
        $data = array();
        $data['get_order_details_by_id'] = DB::table("orders")->where("order_id", $id)->get();
        return view("user/order-details", $data);
    }
    public function track_orders(){
    	return view("user/track-orders");
    }
    public function address(){
    	return view("user/address");
    }
    public function account_detail(){
        $data = array();
        $data['get_account_details'] = DB::table("users")->where("user_id", Session::get("user_login_id"))->get();
    	return view("user/account-detail", $data);
    }
    public function update_profile(Request $request){
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        if($request->change_password=="on"){
            $check_user = DB::table("users")->where("email", $request->email)->where("password", md5($request->old_password))->get();
            if(count($check_user)==1){
                $data['password'] = md5($request->password);
            }
        }
        $result = DB::table("users")->where("user_id", $request->user_id)->update($data);
        if($result==1){
            Session::flash('success', 'Your Account Update Successfully!...');
            return redirect('account-detail');
        }else{
            Session::flash('warning', 'Account Details Not Changed!...');
            return redirect('account-detail');
        }
    }
}
