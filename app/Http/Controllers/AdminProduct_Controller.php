<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminProduct_Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function all_products(){
        if(empty(Session::get("admin_login_id"))){
            return redirect('admin/login');
        }
        $data['get_all_products'] = DB::table("products")->get();
        return view("admin/all-products", $data);
    }
    public function add_new_product(){
        if(empty(Session::get("admin_login_id"))){
            return redirect('admin/login');
        }
        $data['get_all_categories'] = DB::table("categories")->get();
    	return view("admin/add-new-product", $data);
    }
    public function add_new_product_process(Request $request){
        $data['product_title'] = $request->input("product_title");
        $data['product_slug'] = $request->input("product_slug");
        $data['product_meta_title'] = $request->input("product_meta_title");
        $data['product_meta_keyword'] = $request->input("product_meta_keyword");
        $data['product_meta_description'] = $request->input("product_meta_description");
        $data['product_short_description'] = $request->input("product_short_description");
        $data['product_long_description'] = $request->input("product_long_description");
        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $fileExtension = $file->getClientOriginalName();
            $fileName = $fileExtension;
            $file->move('assets/images/', $fileName);
            $data['product_image'] = $fileName;
        }
        if($request->hasFile('product_hover_image')){
            $file = $request->file('product_hover_image');
            $fileExtension = $file->getClientOriginalName();
            $fileName = $fileExtension;
            $file->move('assets/images/', $fileName);
            $data['product_hover_image'] = $fileName;
        }
        if($request->hasFile('product_gallery')){
            $i = 1;
            foreach($request->file('product_gallery') as $key=>$image){
                $file = $image;
                $fileExtension = $file->getClientOriginalName();
                $fileName = $fileExtension;
                $file->move('assets/images/', $fileName);
                $product_gallery['product_gallery_'.$i] = $fileName;
                $i++;
            }
        }
        $data['product_gallery'] = json_encode($product_gallery);
        $data['product_category'] = $request->input("product_category");
        $data['product_sale_price'] = $request->input("product_sale_price");
        $data['product_discount_price'] = $request->input("product_discount_price");
        $data['product_label'] = $request->input("product_label");
        $result = DB::table("products")->insert($data);
        if($result==1){
            Session::flash("success", "Product Added Successfully!...");
            return redirect('admin/all-products');
        }
    }
    public function edit_product($id){
        if(empty(Session::get("admin_login_id"))){
            return redirect('admin/login');
        }
        $data['get_all_categories'] = DB::table("categories")->get();
        $data['get_product_by_id'] = DB::table("products")->where("product_id", $id)->get();
        return view("admin/edit-product", $data);
    }
    public function edit_product_process(Request $request){
        $data['product_title'] = $request->input("product_title");
        $data['product_slug'] = $request->input("product_slug");
        $data['product_meta_title'] = $request->input("product_meta_title");
        $data['product_meta_keyword'] = $request->input("product_meta_keyword");
        $data['product_meta_description'] = $request->input("product_meta_description");
        $data['product_short_description'] = $request->input("product_short_description");
        $data['product_long_description'] = $request->input("product_long_description");
        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $fileExtension = $file->getClientOriginalName();
            $fileName = $fileExtension;
            $file->move('assets/images/', $fileName);
            $data['product_image'] = $fileName;
        }else{
            $data['product_image'] = $request->input("old_product_image");
        }
        if($request->hasFile('product_hover_image')){
            $file = $request->file('product_hover_image');
            $fileExtension = $file->getClientOriginalName();
            $fileName = $fileExtension;
            $file->move('assets/images/', $fileName);
            $data['product_hover_image'] = $fileName;
        }else{
            $data['product_hover_image'] = $request->input("old_product_hover_image");
        }
        $product_gallery = array();
        $i = 1;
        if($request->hasFile('product_gallery')){
            foreach($request->file('product_gallery') as $key=>$image){
                $file = $image;
                $fileExtension = $file->getClientOriginalName();
                $fileName = $fileExtension;
                $file->move('assets/images/', $fileName);
                $product_gallery['product_gallery_'.$i] = $fileName;
                $i++;
            }
        }
        if(count($request->input("old_product_image_gallery"))>0){
            $i = $i;
            foreach($request->input("old_product_image_gallery") as $key=>$value){
                $product_gallery['product_gallery_'.$i] = $value;
                $i++;
            }
        }
        $data['product_gallery'] = json_encode($product_gallery);
        $data['product_category'] = $request->input("product_category");
        $data['product_sale_price'] = $request->input("product_sale_price");
        $data['product_discount_price'] = $request->input("product_discount_price");
        $data['product_label'] = $request->input("product_label");
        $result = DB::table("products")->where("product_id", $request->input("product_id"))->update($data);
        if($result==1){
            Session::flash("success", "Product Update Successfully!...");
            return redirect('admin/all-products');
        }
    }
    public function delete_product($id){
        DB::table('products')->where("product_id", $id)->delete();
        Session::flash("success", "Product Deleted Successfully");
        return redirect("admin/all-products");
    }
}
