<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// User Routes
Route::get('/', "Home_Controller@index");
Route::get('page-privacy-policy', "Home_Controller@page_privacy_policy");
Route::post('add-to-cart', "Cart_Controller@add_to_cart");

Route::get('register', "User_Controller@register");
Route::post('register-process', "User_Controller@register_process");
Route::post('check-username-exist', "User_Controller@check_username_exist");
Route::post('check-email-exist', "User_Controller@check_email_exist");
Route::get('login', "User_Controller@login");
Route::post('login-process', "User_Controller@login_process");
Route::get('logout', "User_Controller@logout");

Route::get("dashboard", "Dashboard_Controller@dashboard");
Route::get("orders", "Dashboard_Controller@orders");
Route::get("track-orders", "Dashboard_Controller@track_orders");
Route::get("address", "Dashboard_Controller@address");
Route::get("account-detail", "Dashboard_Controller@account_detail");

Route::post("product-quick-view", "Home_Controller@product_quick_view");

Route::get("{any}", "Category_Product_Controller@dynamic_pages");

// Admin Routes
Route::get("admin", "Admin_Controller@index");
Route::get("admin/dashboard", "Admin_Controller@index");
Route::get("admin/login", "AdminUser_Controller@login");
Route::post("admin/login-process", "AdminUser_Controller@login_process");
Route::get("admin/logout", "AdminUser_Controller@logout");

// Admin Category
Route::get("admin/add-new-category", "AdminCategory_Controller@add_new_category");
Route::post("admin/add-new-category-process", "AdminCategory_Controller@add_new_category_process");
Route::get("admin/edit-category/{any}", "AdminCategory_Controller@edit_category");
Route::post("admin/edit-category-process", "AdminCategory_Controller@edit_category_process");
Route::get("admin/delete-category/{any}", "AdminCategory_Controller@edit_delete");
Route::get("admin/delete-category/{any}", "AdminCategory_Controller@edit_delete");
Route::get("admin/all-categories", "AdminCategory_Controller@all_categories");

// Admin Products 
Route::get("admin/add-new-product", "AdminProduct_Controller@add_new_product");
Route::post("admin/add-new-product-process", "AdminProduct_Controller@add_new_product_process");
Route::get("admin/edit-product/{any}", "AdminProduct_Controller@edit_product");
Route::post("admin/edit-product-process", "AdminProduct_Controller@edit_product_process");
Route::get("admin/delete-product/{any}", "AdminProduct_Controller@delete_product");
Route::get("admin/all-products", "AdminProduct_Controller@all_products");