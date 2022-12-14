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
        $data['get_all_products'] = DB::table("products")->leftJoin("categories", "categories.category_id", "=", "products.product_category")->get();
        return view("admin/all-products", $data);
    }
    public function add_new_product(){
        if(empty(Session::get("admin_login_id"))){
            return redirect('admin/login');
        }
        $data['get_all_categories'] = DB::table("categories")->get();
        $data['get_all_products'] = DB::table("products")->get();
        $data['get_all_attributes'] = DB::table("attributes")->get();
    	return view("admin/add-new-product", $data);
    }
    public function add_new_product_process(Request $request){
        /*echo "<pre>";
        print_r($_POST);
        die();*/
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
        $product_gallery = array();
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
        $data['product_fall_in'] = $request->input("product_fall_in");
        if(!empty($request->input("related_product"))){
            $data['related_product'] = json_encode($request->input("related_product"));
        }else{
            $data['related_product'] = [];
        }
        if(!empty($request->input("variation_title"))>0){
            foreach($request->input("variation_title") as $key=>$value){
                if(!empty($request->input($value."_variation_value"))){
                    $variations[$value] = json_encode($request->input($value."_variation_value"));
                }
            }
            $data['product_variations'] = json_encode($variations);
        }
        $data['product_variations'] = json_encode($request->input("product_variations"));
        $result = DB::table("products")->insertGetId($data);
        if(!empty($result)){
            Session::flash("success", "Product Added Successfully!...");
            // return redirect('admin/all-products');
            return redirect("admin/product-variations/".$result);
        }
    }
    public function product_variations($id){
        $data = array();
        $data['get_product_by_id'] = DB::table("products")->where("product_id", $id)->get();
        $data['get_product_variations'] = DB::table("attributes")->whereIn("attribute_id", json_decode($data['get_product_by_id'][0]->product_variations))->get();
        $data['get_product_variations_data'] = DB::table("product_variations")->where("product_id", $id)->get();
        /*echo "<pre>";
        print_r($data['get_product_variations']);
        die();*/
        return view("admin/product-variations", $data);
    }
    public function update_product_variations(Request $request){
        $data['product_variation_data'] = $request->input("variation_data");
        $data['product_variation_price'] = $request->input("product_variation_price");
        $data['product_id'] = $request->input("product_id");
        $result = DB::table("product_variations")->insertGetId($data);
        $random_key = md5(rand(223,234234));
        if(!empty($result)){
        ?>
            <tr class="product-variation-row <?php echo $result; ?>">
                <?php foreach(json_decode($data['product_variation_data']) as $v_key=>$v_value){ ?>
                <td>
                    <?php echo $v_value; ?>
                    <input type="hidden" name="<?php echo "row_".$random_key."[".$v_key."]"; ?>" value="<?php echo $v_value; ?>" >
                </td>
                <?php } ?>
                <td>
                    <?php echo $data['product_variation_price']; ?>
                    <input type="hidden" name="row_<?php echo $random_key; ?>[price]" value="<?php echo $data['product_variation_price']; ?>" />
                </td>
                <td>
                    <a class='btn btn-warning edit-variation' data-product-id="<?php echo $data['product_id']; ?>" data-row-id='<?php echo $result; ?>'>Edit</a>
                    <a class='btn btn-danger delete-variation' data-product-id="<?php echo $data['product_id']; ?>" data-row-id='<?php echo $result; ?>'>Delete</a>
                </td>
            </tr>
        <?php
        }
    }
    public function edit_product_variation_row(Request $request){
        $product_details_by_id = DB::table("products")->where("product_id", $request->input("product_id"))->get();
        $product_variation_row = DB::table("product_variations")->where("product_variation_id", $request->input("product_variation_id"))->get();
        // print_r($product_variation_row);
        ?>
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Product Variation</h4>
                        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="edit-product-variation" onsubmit="return false;" method="post">
                        <div class="modal-body">
                            <?php foreach(json_decode($product_details_by_id[0]->product_variations_values) as $key=>$value){ ?>
                            <div class="form-group">

                                <label class="control-label"><?php echo $key; ?></label>
                                <select name="<?php echo $key; ?>" class="form-control variation-value">
                                    <?php foreach($value as $key1=>$value1){ ?>
                                        <option <?php foreach((array)json_decode($product_variation_row[0]->product_variation_data) as $key2=>$value2){if($key2==$key){if($value1==$value2){echo "selected";}}} ?> value="<?php echo $value1; ?>"><?php echo $value1; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <?php } ?>
                            <div class="form-group">
                                <label class="control-label">Price</label>
                                <input type="text" class="form-control" name="product_variation_price" value="<?php echo $product_variation_row[0]->product_variation_price; ?>" >
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="product_variation_row" value="<?php echo $product_variation_row[0]->product_variation_id; ?>">
                            <button type="button" class="btn btn-default close-modal" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php
    }
    public function update_product_variation_row(Request $request){
        $data['product_variation_data'] = json_encode($request->input("variation_data"));
        $data['product_variation_price'] = $request->input("product_variation_price");
        $get_product_variation_row_detail = DB::table("product_variations")->where("product_variation_id", $request->input("product_variation_row"))->get();
        $result = DB::table("product_variations")->where("product_variation_id", $request->input("product_variation_row"))->update($data);
        $random_key = md5(rand(223,234234));
        ?>
        <?php foreach(json_decode($data['product_variation_data']) as $v_key=>$v_value){ ?>
        <td>
            <?php echo $v_value; ?>
            <input type="hidden" name="<?php echo "row_".$random_key."[".$v_key."]"; ?>" value="<?php echo $v_value; ?>" >
        </td>
        <?php } ?>
        <td>
            <?php echo $data['product_variation_price']; ?>
            <input type="hidden" name="row_<?php echo $random_key; ?>[price]" value="<?php echo $data['product_variation_price']; ?>" />
        </td>
        <td>
            <a class='btn btn-warning edit-variation' data-product-id="<?php echo $get_product_variation_row_detail[0]->product_id; ?>" data-row-id='<?php echo $get_product_variation_row_detail[0]->product_variation_id; ?>'>Edit</a>
            <a class='btn btn-danger delete-variation' data-product-id="<?php echo $get_product_variation_row_detail[0]->product_id; ?>" data-row-id='<?php echo $get_product_variation_row_detail[0]->product_variation_id; ?>'>Delete</a>
        </td>
        <?php
    }
    public function product_finish_step(Request $request){
        DB::table("product_variations")->where("product_id", $request->input("product_id"))->delete();
        unset($_POST['_token']);
        unset($_POST['product_id']);
        foreach($_POST as $key=>$value){
            $data = $value;
            unset($data['price']);
            $fdata['product_variation_data'] = json_encode($data);
            $fdata['product_variation_price'] = $value['price'];
            $fdata['product_id'] = $request->input('product_id');
            DB::table("product_variations")->insert($fdata);
        }
        Session::flash("success", "Product Update Successfully!...");
        return redirect('admin/all-products');
    }
    public function edit_product($id){
        if(empty(Session::get("admin_login_id"))){
            return redirect('admin/login');
        }
        $data['get_all_categories'] = DB::table("categories")->get();
        $data['get_product_by_id'] = DB::table("products")->where("product_id", $id)->get();
        $data['get_all_products'] = DB::table("products")->where("product_id","!=", $data['get_product_by_id'][0]->product_id)->get();
        $data['get_all_attributes'] = DB::table("attributes")->get();
        return view("admin/edit-product", $data);
    }
    public function edit_product_process(Request $request){
        /*echo "<pre>";
        print_r($_POST);
        die();*/
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
        $data['product_fall_in'] = $request->input("product_fall_in");
        if(!empty($request->input("related_product"))){
            $data['related_product'] = json_encode($request->input("related_product"));
        }else{
            $data['related_product'] = json_encode([]);
        }
        /*$data['product_variations'] = json_encode([]);
        if(!empty($request->input("variation_title"))>0){
            foreach($request->input("variation_title") as $key=>$value){
                if(!empty($request->input($value."_variation_value"))){
                    $variations[$value] = json_encode($request->input($value."_variation_value"));
                }
            }
            $data['product_variations'] = json_encode($variations);
        }*/
        $data['product_variations'] = json_encode($request->input("product_variations"));
        $result = DB::table("products")->where("product_id", $request->input("product_id"))->update($data);
        if($result==1){
            Session::flash("success", "Product Update Successfully!...");
            if($data['product_variations']=="null"){
                return redirect('admin/all-products');
            }else{
                return redirect("admin/product-variations/".$request->input("product_id"));
            }
        }elseif($result==0){
            Session::flash("success", "Product Update Successfully!...");
            if($data['product_variations']=="null"){
                return redirect('admin/all-products');
            }else{
                return redirect("admin/product-variations/".$request->input("product_id"));
            }
        }
    }
    public function check_product_slug_exist(Request $request){
        $result = DB::table("products")->where("product_slug", $request->input('product_slug'))->where("product_id", "!=", $request->input('product_id'))->get();
        if(count($result)==1){
            return "false";
        }else{
            return "true";
        }
    }
    public function delete_product($id){
        DB::table('products')->where("product_id", $id)->delete();
        DB::table("product_variations")->where("product_id", $id)->delete();
        Session::flash("success", "Product Deleted Successfully");
        return redirect("admin/all-products");
    }
    public function attributes(){
        $data = array();
        $data['get_all_attributes'] = DB::table("attributes")->get();
        return view('admin/attributes', $data);
    }
    public function add_new_attribute(){
        $data = array();
        return view('admin/add-new-attribute');
    }
    public function add_new_attribute_process(Request $request){
        $data['attribute_title'] = $request->input('attribute_title');
        $result = DB::table("attributes")->insert($data);
        if($result==1){
            Session::flash("success", "Attribute Successfully Added!...");
            return redirect("admin/attributes");
        }
    }
    public function edit_attributie($id){
        $data = array();
        $data['get_attribute_by_id'] = DB::table("attributes")->where("attribute_id", $id)->get();
        return view("admin/edit-attributes", $data);
    }
    public function edit_attributes_process(Request $request){
        $data['attribute_title'] = $request->input('attribute_title');
        $result = DB::table("attributes")->where("attribute_id", $request->input("attribute_id"))->update($data);
        if($result==1){
            Session::flash("success", "Attribute Successfully Updated!...");
            return redirect("admin/attributes");
        }else{
            return redirect("admin/attributes");
        }
    }
    public function delete_attribute($id){
        DB::table("attributes")->where("attribute_id", $id)->delete();
        Session::flash("success", "Attribute Successfully Deleted!...");
        return redirect("admin/attributes");
    }
    public function attribute_values($id){
        $data = array();
        $data['get_attribute_by_id'] = DB::table("attributes")->where("attribute_id", $id)->get();
        $data['get_attribute_value_by_id'] = DB::table("attributes_value")->where("attribute_id", $id)->get();
        return view('admin/attribute-values', $data);
    }
    public function add_new_attributie_value($id){
        $data = array();
        $data['get_attribute_by_id'] = DB::table("attributes")->where("attribute_id", $id)->get();
        return view("admin/add-new-attribute-value", $data);
    }
    public function add_new_attribute_value_process(Request $request){
        $data['attribute_value_title'] = $request->input('attribute_value_title');
        $data['attribute_id'] = $request->input('attribute_id');
        $result = DB::table("attributes_value")->insert($data);
        if($result==1){
            Session::flash("success", "Attribute Value Successfully Added!...");
            return redirect("admin/attribute-values/".$request->input('attribute_id'));
        }
    }
    public function edit_attributie_value($id){
        $data = array();
        $data['get_attribute_value_by_id'] = DB::table("attributes_value")->leftJoin("attributes","attributes.attribute_id","=","attributes_value.attribute_id")->where("attribute_value_id", $id)->get();
        return view("admin/edit-attribute-value", $data);
    }
    public function edit_attributes_value_process(Request $request){
        $data['attribute_value_title'] = $request->input('attribute_value_title');
        $result = DB::table("attributes_value")->where("attribute_value_id", $request->input("attribute_value_id"))->update($data);
        if($result==1){
            Session::flash("success", "Attribute Successfully Updated!...");
            return redirect("admin/attribute-values/".$request->input('attribute_id'));
        }else{
            return redirect("admin/attributes");
        }
    }
    public function delete_attribute_value($id){
        DB::table("attributes_value")->where("attribute_value_id", $id)->delete();
        Session::flash("success", "Attribute Successfully Deleted!...");
        return redirect()->back();
    }
    public function admin_variation_modal(){
        $get_all_attributes = DB::table("attributes")->get();
        ?>
        <div class="card-body">
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                <?php $i = 1; foreach($get_all_attributes as $key=>$value){ ?>
                <li class="nav-item">
                    <a class="nav-link <?php if($i==1){echo "active";} ?>" id="<?php echo str_replace(" ", "-", $value->attribute_title); ?>-tab" data-toggle="pill" href="#<?php echo str_replace(" ", "-", $value->attribute_title); ?>" role="tab" aria-controls="<?php echo str_replace(" ", "-", $value->attribute_title); ?>" aria-selected="<?php if($i==1){echo "true";}else{echo "false";} ?>"><?php echo $value->attribute_title; ?></a>
                </li>
                <?php $i++; } ?>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
                <?php $i = 1; foreach($get_all_attributes as $key=>$attribute_title){ ?>
                <div class="tab-pane fade <?php if($i==1){echo "active show";} ?>" id="<?php echo str_replace(" ", "-", $attribute_title->attribute_title); ?>" role="tabpanel" aria-labelledby="<?php echo str_replace(" ", "-", $attribute_title->attribute_title); ?>-tab">
                    <?php 
                        $get_attribute_value_by_id = DB::table("attributes_value")->leftJoin("attributes","attributes.attribute_id","=","attributes_value.attribute_id")->where("attributes_value.attribute_id", $attribute_title->attribute_id)->get();
                    ?>
                    <div class="row" style="padding: 20px;">
                    <?php
                        foreach($get_attribute_value_by_id as $key=>$attribute_value){
                    ?>
                        <div class="col-lg-4">
                            <input type="checkbox" class="attribute-value" value="<?php echo $attribute_value->attribute_value_title ?>" data-variation-title="<?php echo $attribute_value->attribute_title; ?>" data-variation-id="<?php echo $attribute_value->attribute_id; ?>">
                            <?php echo $attribute_value->attribute_value_title; ?>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <?php $i++; } ?>
            </div>
            <h4 class="mt-5 ">Variation Price</h4>
            <table class="table table-bordred">
                <thead class="variation-table-header">
                    <tr class="variation-table-header-row"></tr>
                </thead>
                <tbody class="variation-table-body">
                    <tr class="variation-table-body-row"></tr>
                </tbody>
            </table>
        </div>
        <?php
    }
    public function save_product_variations(Request $request){
        unset($_POST['_token']);
        unset($_POST['product_id']);
        foreach($_POST as $key=>$value){
            $product_variation[$key] = $value;
        }
        $data['product_variations_values'] = json_encode($product_variation);
        DB::table("products")->where("product_id", $request->input("product_id"))->update($data);
        return redirect('admin/add-product-variation-price/'.$request->input("product_id"));
    }
    public function add_product_variation_price($id){
        $data['get_product_by_id'] = DB::table("products")->where("product_id", $id)->get();
        $data['get_product_variations'] = DB::table("attributes")->whereIn("attribute_id", json_decode($data['get_product_by_id'][0]->product_variations))->get();
        $data['get_product_variations_data'] = DB::table("product_variations")->where("product_id", $id)->get();
        return view("admin/add-product-variation-price", $data);
    }
    public function delete_product_variation_row(Request $request){
        DB::table("product_variations")->where("product_variation_id", $request->input("product_variation_id"))->delete();
    }
}
