<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminOrders_Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function all_orders(){
        $data = array();
        $data['all_orders'] = DB::table("orders")->get();
        return view("admin/all-orders", $data);
    }
    public function pending_orders(){
        return view("admin/pending-orders");
    }
    public function process_orders(){
        return view("admin/process-orders");
    }
    public function delivered_orders(){
        return view("admin/delivered-orders");
    }
    public function edit_order($id){
        $data = array();
        $data['get_order_detail_by_id'] = DB::table("orders")->where("order_id", $id)->get();
        return view("admin/edit-order", $data);
    }
    public function edit_order_process(Request $request){
        $data['payment_status'] = $request->input("payment_status");
        DB::table("orders")->where("order_id", $request->input('order_id'))->update($data);
        return redirect('admin/all-orders');
    }
}
