<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class User_Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function register(){
    	return view("user/register");
    }
    public function register_process(Request $request){
    	$data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['username'] = $request->username;
    	$data['email'] = $request->email;
    	$data['password'] = md5($request->password);
    	$result = DB::table("users")->insert($data);
    	if($result==1){
    		Session::flash('success', 'Your Account Created Successfully!...');
    		return redirect('login');
    	}
    }
    public function check_email_exist(Request $request){
        $email = $request->input("email");
        $check_email_exist = DB::table("users")->where("email", $email)->get();
        if(count($check_email_exist)==1){
            return "false";
        }else{
            return "true";
        }
    }
    public function check_username_exist(Request $request){
        $username = $request->input("username");
        $check_email_exist = DB::table("users")->where("username", $username)->get();
        if(count($check_email_exist)==1){
            return "false";
        }else{
            return "true";
        }
    }
    public function login(){
    	return view("user/login");
    }
    public function login_process(Request $request){
    	$username_email = $request->username_email;
        $password = md5($request->password);
        $check_user_by_email = DB::table("users")->where("email", $username_email)->where("password", $password)->get();
        if(count($check_user_by_email)==0){
            $check_user_by_email = array();
        }
        $check_user_by_username = DB::table("users")->where("username", $username_email)->where("password", $password)->get();
        if(count($check_user_by_username)==0){
            $check_user_by_username = array();
        }
        $result = array_merge((array)$check_user_by_email, (array)$check_user_by_username);
        if(count($result)==1){
            foreach($result as $key=>$value){
                Session::put("user_login_id", $value[0]->user_id);
                return redirect('dashboard');
            }
        }else{
            Session::flash("error", "Invalid Email/Username and Password");
            return redirect('login');
        }
    }
    public function logout(){
        Session::forget("user_login_id");
        return redirect("/");
    }
    public function forgot_password(){
        $data = array();
        return view("user/forgot-password", $data);
    }
    public function forgot_password_process(Request $request){
        if($request->input("random_number")==$request->input("hidden_random_number")){
            
        }else{
            Session::put("error", "Security Code is not matched!...");
            return redirect('forgot-password');
        }
    }
}
