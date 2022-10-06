<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminSlider_Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function add_new_slider(){
        if(empty(Session::get("admin_login_id"))){
            return redirect('admin/login');
        }
        $data = array();
    	return view("admin/add-new-slider", $data);
    }
    public function all_sliders(){
        if(empty(Session::get("admin_login_id"))){
            return redirect('admin/login');
        }
        $data = array();
        $data['all_sliders'] = DB::table("sliders")->get();
        return view("admin/all-sliders", $data);
    }
    public function add_new_slider_process(Request $request){
        $data['slider_title'] = $request->input("slider_title");
        if($request->hasFile('slider_image')){
            $file = $request->file('slider_image');
            $fileExtension = $file->getClientOriginalName();
            $fileName = $fileExtension;
            $file->move('assets/images/', $fileName);
            $data['slider_image'] = $fileName;
        }
        $result = DB::table("sliders")->insert($data);
        if($result==1){
            Session::flash("success", "Slider Added Successfully!...");
            return redirect("admin/all-sliders");
        }
    }
}
