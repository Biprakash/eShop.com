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
//Frontend 
Route::get('/','HomeController@index');
Route::get('/product_by_category/{id}','HomeController@show_product_by_category');
Route::get('/product_by_subcategory/{id}','HomeController@show_product_by_subcategory');
Route::get('/product_by_manufacture/{id}','HomeController@show_product_by_manufacture');
Route::get('/view_product/{id}','HomeController@view_product');
Route::get('/search','HomeController@search_product');


//Add_toCart  

Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show_cart','CartController@show_cart');
Route::get('/delet_cart/{rowId}','CartController@delete_cart');
Route::post('/update_cart','CartController@update_cart');

//checkout

Route::get('/checkout','checkoutController@checkout');
Route::get('/login','checkoutController@login');
Route::post('/customer_reg','checkoutController@customer_reg');
Route::post('/customer_login','checkoutController@customer_login');
Route::get('/customer_logout','checkoutController@customer_logout');


//Shipping

Route::post('/save_shipping','checkoutController@save_shipping');
Route::get('/payment','checkoutController@payment');
Route::post('/order_place','checkoutController@order_place');
Route::get('/pending_order','checkoutController@pending_order');
Route::get('/delivered_order','checkoutController@delivered_order');
Route::get('/unactive_order/{order_id}','checkoutController@unactive_order');
Route::get('/active_order/{order_id}','checkoutController@active_order');
Route::get('/view_order/{order_id}','checkoutController@view_order');
Route::get('/delete_porder/{order_id}','checkoutController@delete_porder');
Route::get('/delete_dorder/{order_id}','checkoutController@delete_dorder');



//Delivery man

Route::get('/add_delivery_man','deliverymanController@add_delivery_man');
Route::post('/save_delivery_man','deliverymanController@save_delivery_man');
Route::get('/all_delivery_man','deliverymanController@all_delivery_man');
Route::get('/delete_dvman/{id}','deliverymanController@delete_dvman');
Route::get('/edit_dvman/{id}','deliverymanController@edit_dvman');


//Backend
Route::get('/logout','SuperAdminController@logout');
Route::get('/reset','SuperAdminController@reset');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','SuperAdminController@index');
Route::post('/admin_dashboard','AdminController@dashboard');

//Category
Route::get('/add_category','CategoryController@index');
Route::get('/all_category','CategoryController@all_category');
Route::post('/save-category','CategoryController@save_category');
Route::get('/unactive_category/{id}','CategoryController@unactive_category');
Route::get('/active_category/{id}','CategoryController@active_category');
Route::get('/edit_category/{id}','CategoryController@edit_category');
Route::post('/update_category/{id}','CategoryController@update_category');
Route::get('/delete_category/{id}','CategoryController@delete_category');

//Sub Category
Route::get('/add_sub_category','SubCategoryController@index');
Route::post('/save_sub_category','SubCategoryController@save_sub_category');
Route::get('/all_sub_category','SubCategoryController@all__sub_category');
Route::get('/unactive_sub_category/{id}','SubCategoryController@unactive_sub_category');
Route::get('/active_sub_category/{id}','SubCategoryController@active_sub_category');
Route::get('/edit_sub_category/{id}','SubCategoryController@edit_sub_category');
Route::post('/update_sub_category/{id}','SubCategoryController@update_sub_category');
Route::get('/delete_sub_category/{id}','SubCategoryController@delete_sub_category');

//Manufactures or brands........

Route::get('/add_manufacture','ManufacturesController@add_manufacture');
Route::post('/save_manufacture','ManufacturesController@save_manufacture');
Route::get('/all_manufacture','ManufacturesController@all_manufacture');
Route::get('/unactive_manufacture/{manufacture_id}','ManufacturesController@unactive_manufac');
Route::get('/active_manufacture/{manufacture_id}','ManufacturesController@active_manufacture');
Route::get('/edit_manu/{manufacture_id}','ManufacturesController@edit_manufac');
Route::post('/update_manufacture/{manufacture_id}','ManufacturesController@update_manufacture');
Route::get('/delete_manufacture/{manufacture_id}','ManufacturesController@delete_manufacture');


//products routs..

Route::get('/add_products','ProductsController@add_product');
Route::post('/save-product','ProductsController@save_product');
Route::get('/all_products','ProductsController@all_products');
Route::get('/unactive_product/{product_id}','ProductsController@unactive_product');
Route::get('/active_product/{product_id}','ProductsController@active_product'); 
Route::get('/edit_product/{product_id}','ProductsController@edit_product'); 
Route::post('/update_product/{product_id}','ProductsController@update_product'); 
Route::get('/delete_product/{product_id}','ProductsController@delete_product'); 

//Slider routs...
Route::get('/add_sliders','sliderController@add_sliders');
Route::post('/save_sliders','sliderController@save_sliders');
Route::get('/all_sliders','sliderController@all_sliders');
Route::get('/unactive_slider/{slider_id}','sliderController@unactive_slider');
Route::get('/active_slider/{slider_id}','sliderController@active_slider');
Route::get('/delete_slider/{slider_id}','sliderController@delete_slider'); 