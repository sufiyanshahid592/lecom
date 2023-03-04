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

class Blogs_Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index(){
        $data = array();
        $data["get_all_blogs"] = DB::table("blogs")->get();
        $data["pagination"] = DB::table("blogs")->paginate();
        return view("user/blogs", $data);
    }
    public function bolg_detail($slug){
    	$data = array();
    	$data['get_blog_detail_by_slug'] = DB::table("blogs")->where("blog_slug", $slug)->get();
    	return view("user/blog-details", $data);
    }
}
