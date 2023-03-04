<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminBanners_Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function banners(){
        if(empty(Session::get("admin_login_id"))){
            return redirect('admin/login');
        }
        $data = array();
        $data['banners'] = DB::table("banners")->where("banner_id", 1)->get();
    	return view("admin/banners", $data);
    }
    public function update_banners_process(Request $request){
    	/*echo "<pre>";
    	print_r($_FILES);
    	die();*/
    	for($i = 1; $i <= 10; $i++){ 
			$text = "banner_".$i."_title";
			$image = "banner_".$i."_image";
            $old_image = "old_banner_".$i."_image";
	    	$data[$text] = $request->input($text);
	    	if($request->hasFile($image)){
                @unlink(storage_path("uploads/banners/banner-".$i.".webp"));
	            $file = $request->file($image);
	            $fileExtension = $file->getClientOriginalName();
	            $fileName = "banner-".$i.".webp";
	            $file->move('elitemallpro/storage/uploads/banners/', $fileName);
	            $data[$image] = $fileName;
	        }else{
                $data[$image] = $request->input($old_image);
            }
		}
        /*echo "<pre>";
        print_r($data);
        die();*/
        DB::table("banners")->where("banner_id", 1)->update($data);
        return redirect("admin/banners");
    }
}