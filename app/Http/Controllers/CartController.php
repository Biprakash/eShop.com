<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use Illuminate\support\Facades\Redirect;
use DB;
use Cart;
class CartController extends Controller
{
      public function add_to_cart(Request $request)
    {
    	$quantity=$request->quantity;
    	$product_id=$request->product_id;

    	$product_info=DB::table('tbl_products')
    				->where('product_id',$product_id)
    				->first();
    				 
 		$data['qty']=$quantity;
 		$data['id']=$product_info->product_id;
 		$data['name']=$product_info->product_name;
 		$data['price']=$product_info->product_price;
 		$data['options']['image']=$product_info->product_image;

 		Cart::add($data);

 		return Redirect::to('/show_cart');
 		 
    }

    public function show_cart(){
    	$category_info= DB::table('tbl_category')
						 ->where('publications_status',1)
						 ->first();

	// Session::put('message','Contact Deleted Successfully!');
	 $manage_category= view('pages.add_to_cart')
					->with ('category_info',$category_info);

	return view('layout')
			->with('pages.add_to_cart',$manage_category);
    }


    public function delete_cart($rowId){
    	Cart::update($rowId,0);
    	return Redirect::to('/show_cart');

    }

    public function update_cart(Request $req){
    	$qty=$req->quantity;
    	$rowId=$req->rowId;

    	Cart::update($rowId,$qty);
    	return Redirect::to('/show_cart');
    }
}
