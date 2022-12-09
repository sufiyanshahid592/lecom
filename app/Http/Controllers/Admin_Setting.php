<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Admin_Setting extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function setting(){
        if(empty(Session::get("admin_login_id"))){
            return redirect('admin/login');
        }
        $data = array();
        $data['website_setting'] = DB::table("setting")->where("setting_id", 1)->get();
    	return view("admin/setting", $data);
    }
    public function update_setting_process(Request $request){
    	$data['website_title'] = $request->input("website_title");
    	$data['website_currency'] = $request->input("website_currency");
        $data['website_address'] = $request->input("website_address");
        $data['website_number'] = $request->input("website_number");
        $data['website_email'] = $request->input("website_email");
        $data['website_timing'] = $request->input("website_timing");
        $data['website_footer_description'] = $request->input("website_footer_description");
    	if($request->hasFile('website_logo')){
            $file = $request->file('website_logo');
            $fileExtension = $file->getClientOriginalName();
            $fileName = $fileExtension;
            $file->move('assets/images/', $fileName);
            $data['website_logo'] = $fileName;
        }
    	$result = DB::table("setting")->where("setting_id", 1)->update($data);
    	if($result==1){
    		return redirect('admin/setting');
    	}else{
    		return redirect('admin/setting');
    	}
    }
}
