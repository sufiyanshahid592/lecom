<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminBlog_Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function all_blogs(){
        if(empty(Session::get("admin_login_id"))){
            return redirect('admin/login');
        }
        $data = array();
        $data['all_blogs'] = DB::table("blogs")->get();
        return view("admin/blogs", $data);
    }
    public function add_new_blog(){
        if(empty(Session::get("admin_login_id"))){
            return redirect('admin/login');
        }
        $data = array();
        return view("admin/add-new-blog", $data);
    }
    public function add_new_blog_process(Request $request){
        $data["blog_title"] = $request->input("blog_title");
        $data["blog_slug"] = $request->input("blog_slug");
        $data["blog_meta_keywords"] = $request->input("blog_meta_keywords");
        $data["blog_meta_description"] = $request->input("blog_meta_description");
        $data["blog_short_description"] = $request->input("blog_short_description");
        $data["blog_long_description"] = $request->input("blog_long_description");
        if($request->hasFile('blog_image')){
            $file = $request->file('blog_image');
            $fileExtension = $file->getClientOriginalName();
            $fileName = $fileExtension;
            $file->move('assets/images/', $fileName);
            $data['blog_image'] = $fileName;
        }
        $data['blog_time'] = time();
        $result = DB::table("blogs")->insert($data);
        if($result==1){
            Session::flash("success", "Blog Added Successfully!...");
            return redirect("admin/all-blogs");
        }
    }
    public function delete_blog($id){
        DB::table("blogs")->where("blog_id", $id)->delete();
        Session::flash("success", "Blog Delete Successfully!...");
        return redirect("admin/all-blogs");
    }
    public function edit_blog($id){
        $data = array();
        $data['get_blog_by_id'] = DB::table("blogs")->where("blog_id", $id)->get();
        return view("admin/edit-blog", $data);
    }
    public function edit_blog_process(Request $request){
        $data["blog_title"] = $request->input("blog_title");
        $data["blog_slug"] = $request->input("blog_slug");
        $data["blog_meta_keywords"] = $request->input("blog_meta_keywords");
        $data["blog_meta_description"] = $request->input("blog_meta_description");
        $data["blog_short_description"] = $request->input("blog_short_description");
        $data["blog_long_description"] = $request->input("blog_long_description");
        if($request->hasFile('blog_image')){
            $file = $request->file('blog_image');
            $fileExtension = $file->getClientOriginalName();
            $fileName = $fileExtension;
            $file->move('assets/images/', $fileName);
            $data['blog_image'] = $fileName;
        }
        $result = DB::table("blogs")->where("blog_id", $request->input("blog_id"))->update($data);
        if($result==1){
            Session::flash("success", "Blog Updated Successfully!...");
            return redirect("admin/all-blogs");
        }else{
            return redirect("admin/all-blogs");
        }
    }
}
