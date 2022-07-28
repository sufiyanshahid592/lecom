<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminUser_Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function login(){
        if(!empty(Session::get("admin_login_id"))){
            return redirect('admin/dashboard');
        }
    	return view("admin/login");
    }
    public function login_process(Request $request){
        $email = $request->input('email');
        $password = md5($request->input('password'));
        $result = DB::table("admin")->where("admin_email", $email)->where("admin_password", $password)->get();
        if(count($result)){
            Session::put("admin_login_id", $result[0]->admin_id);
            return redirect('admin/dashboard');
        }
    }
    public function logout(){
        Session::forget("admin_login_id");
        return redirect("admin/login");
    }
}
