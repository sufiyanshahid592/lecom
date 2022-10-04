<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminCategory_Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function add_new_category(){
        if(empty(Session::get("admin_login_id"))){
            return redirect('admin/login');
        }
        $data['get_all_categories'] = DB::table("categories")->get();
        return view("admin/add-new-category", $data);
    }
    public function add_new_category_process(Request $request){
        $data['category_name'] = $request->input("category_name");
        $data['category_slug'] = $request->input("category_slug");
        $data['category_meta_title'] = $request->input("category_meta_title");
        $data['category_meta_keyword'] = $request->input("category_meta_keyword");
        $data['category_meta_description'] = $request->input("category_meta_description");
        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $fileExtension = $file->getClientOriginalName();
            $fileName = $fileExtension;
            $file->move('assets/images/', $fileName);
            $data['category_image'] = $fileName;
        }
        if ($request->hasFile('category_icon')) {
            $file = $request->file('category_icon');
            $fileExtension = $file->getClientOriginalName();
            $fileName = $fileExtension;
            $file->move('assets/images/', $fileName);
            $data['category_icon'] = $fileName;
        }
        $data['parent_category'] = $request->input("parent_category");
        $data['category_placement'] = json_encode($request->input("category_placement"));
        $data['popular_product'] = $request->input("popular_product");
        $data['daily_best_sells'] = $request->input("daily_best_sells");
        $result = DB::table("categories")->insert($data);
        if($result==1){
            Session::flash("success", "Category Added Successfully!...");
            return redirect("admin/all-categories");
        }
    }
    public function all_categories(){
        if(empty(Session::get("admin_login_id"))){
            return redirect('admin/login');
        }
        $data['get_all_categories'] = DB::table("categories")->get();
        return view("admin/all-categories", $data);
    }
    public function edit_category($id){
        $data['get_all_categories'] = DB::table("categories")->get();
        $data['get_category_by_id'] = DB::table("categories")->where("category_id", $id)->get();
        return view("admin/edit-category", $data);
    }
    public function edit_category_process(Request $request){
        $data['category_name'] = $request->input("category_name");
        $data['category_slug'] = $request->input("category_slug");
        $data['category_meta_title'] = $request->input("category_meta_title");
        $data['category_meta_keyword'] = $request->input("category_meta_keyword");
        $data['category_meta_description'] = $request->input("category_meta_description");
        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $fileExtension = $file->getClientOriginalName();
            $fileName = $fileExtension;
            $file->move('assets/images/', $fileName);
            $data['category_image'] = $fileName;
        }else{
            $data['category_image'] = $request->input("old_category_image");
        }
        if ($request->hasFile('category_icon')) {
            $file = $request->file('category_icon');
            $fileExtension = $file->getClientOriginalName();
            $fileName = $fileExtension;
            $file->move('assets/images/', $fileName);
            $data['category_icon'] = $fileName;
        }else{
            $data['category_icon'] = $request->input("old_category_icon");
        }
        $data['parent_category'] = $request->input("parent_category");
        $data['category_placement'] = json_encode($request->input("category_placement"));
        $data['popular_product'] = $request->input("popular_product");
        $data['daily_best_sells'] = $request->input("daily_best_sells");
        $result = DB::table("categories")->where("category_id", $request->input("category_id"))->update($data);
        if($result==1){
            Session::flash("success", "Category Update Successfully!...");
            return redirect("admin/all-categories");
        }else{
            return redirect("admin/all-categories");
        }
    }
    public function edit_delete($id){
        DB::table('categories')->where("category_id", $id)->delete();
        Session::flash("success", "Category Deleted Successfully");
        return redirect("admin/all-categories");
    }
}
