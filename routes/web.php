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

Route::get('register', "User_Controller@register");
Route::post('register-process', "User_Controller@register_process");
Route::post('check-username-exist', "User_Controller@check_username_exist");
Route::post('check-email-exist', "User_Controller@check_email_exist");
Route::get('login', "User_Controller@login");
Route::post('login-process', "User_Controller@login_process");
Route::get('logout', "User_Controller@logout");
Route::get('forgot-password', "User_Controller@forgot_password");
Route::post('forgot-password-process', "User_Controller@forgot_password_process");

// Cart
Route::get('cart', "Cart_Controller@cart");
Route::post('add-to-cart', "Cart_Controller@add_to_cart");
Route::post('update-cart', "Cart_Controller@update_cart");
Route::get('update-cart-area', "Cart_Controller@update_cart_area");
Route::post('count-cart', "Cart_Controller@count_cart");
Route::get('checkout-total', "Cart_Controller@checkout_total");
Route::post('remove-cart', "Cart_Controller@remove_cart");
Route::get('destroy-cart', "Cart_Controller@destroy_cart");

// Checkout
Route::get('checkout', "Checkout_Controller@checkout");
Route::post('checkout-process', "Checkout_Controller@checkout_process");

// Dashboard
Route::get("dashboard", "Dashboard_Controller@dashboard");
Route::get("orders", "Dashboard_Controller@orders");
Route::get("order-details/{any}", "Dashboard_Controller@order_details");
Route::get("track-orders", "Dashboard_Controller@track_orders");
Route::get("address", "Dashboard_Controller@address");
Route::get("account-detail", "Dashboard_Controller@account_detail");
Route::post("update-profile", "Dashboard_Controller@update_profile");

Route::post("product-quick-view", "Home_Controller@product_quick_view");
Route::post("product-variations-price", "Category_Product_Controller@product_variations_price");

// Blogs

Route::get("blogs", "Blogs_Controller@index");
Route::get("blog/{any}", "Blogs_Controller@bolg_detail");

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
Route::post("admin/check-product-slug-exist", "AdminProduct_Controller@check_product_slug_exist");
Route::get("admin/attributes", "AdminProduct_Controller@attributes");
Route::get("admin/add-new-attribute", "AdminProduct_Controller@add_new_attribute");
Route::post("admin/add-new-attribute-process", "AdminProduct_Controller@add_new_attribute_process");
Route::get("admin/product-variations/{any}", "AdminProduct_Controller@product_variations");
Route::post("admin/update-product-variations", "AdminProduct_Controller@update_product_variations");
Route::post("admin/delete-product-variation-row", "AdminProduct_Controller@delete_product_variation_row");
Route::post("admin/edit-product-variation-row", "AdminProduct_Controller@edit_product_variation_row");
Route::post("admin/product-finish-step", "AdminProduct_Controller@product_finish_step");
Route::get("admin/edit-attributie/{any}", "AdminProduct_Controller@edit_attributie");
Route::post("admin/add-new-attribute-process", "AdminProduct_Controller@add_new_attribute_process");
Route::post("admin/edit-attributes-process", "AdminProduct_Controller@edit_attributes_process");
Route::get("admin/delete-attribute/{any}", "AdminProduct_Controller@delete_attribute");
Route::get("admin/attribute-values/{any}", "AdminProduct_Controller@attribute_values");
Route::get("admin/add-new-attribute-value/{any}", "AdminProduct_Controller@add_new_attributie_value");
Route::post("admin/add-new-attribute-value-process", "AdminProduct_Controller@add_new_attribute_value_process");
Route::get("admin/edit-attributie-value/{any}", "AdminProduct_Controller@edit_attributie_value");
Route::post("admin/edit-attributes-value-process", "AdminProduct_Controller@edit_attributes_value_process");
Route::get("admin/delete-attribute-value/{any}", "AdminProduct_Controller@delete_attribute_value");
Route::post("admin/update-product-variation-row", "AdminProduct_Controller@update_product_variation_row");


// Admin Orders

Route::get("admin/all-orders", "AdminOrders_Controller@all_orders");
Route::get("admin/pending-orders", "AdminOrders_Controller@pending_orders");
Route::get("admin/process-orders", "AdminOrders_Controller@process_orders");
Route::get("admin/delivered-orders", "AdminOrders_Controller@delivered_orders");
Route::get("admin/edit-order/{any}", "AdminOrders_Controller@edit_order");
Route::post("admin/edit-order-process", "AdminOrders_Controller@edit_order_process");


Route::post("admin/admin-variation-modal", "AdminProduct_Controller@admin_variation_modal");
Route::post("admin/save-product-variations", "AdminProduct_Controller@save_product_variations");
Route::get("admin/add-product-variation-price/{any}", "AdminProduct_Controller@add_product_variation_price");
Route::get("admin/setting", "Admin_Setting@setting");
Route::post("admin/update-setting-process", "Admin_Setting@update_setting_process");
Route::get("{any}", "Category_Product_Controller@dynamic_pages");


// Admin Sliders

Route::get("admin/add-new-slider", "AdminSlider_Controller@add_new_slider");
Route::get("admin/all-sliders", "AdminSlider_Controller@all_sliders");
Route::post("admin/add-new-slider-process", "AdminSlider_Controller@add_new_slider_process");
Route::get("admin/edit-slider", "AdminSlider_Controller@edit_slider");
Route::get("admin/delete-slider/{any}", "AdminSlider_Controller@delete_slider");

// Admin Blog

Route::get("admin/add-new-blog", "AdminBlog_Controller@add_new_blog");
Route::post("admin/add-new-blog-process", "AdminBlog_Controller@add_new_blog_process");
Route::get("admin/all-blogs", "AdminBlog_Controller@all_blogs");
Route::get("admin/delete-blog/{any}", "AdminBlog_Controller@delete_blog");
Route::get("admin/edit-blog/{any}", "AdminBlog_Controller@edit_blog");
Route::post("admin/edit-blog-process", "AdminBlog_Controller@edit_blog_process");