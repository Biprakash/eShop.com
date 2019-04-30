<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Session;

class ProductsController extends Controller
{
   public function AdminAuth(){
      $admin_id=Session::get('admin_id');

      if ($admin_id) {
          return;
      }
      else{
         return Redirect::to('/admin')->send();
      }
    }


    public function add_product(){
    	 $this->AdminAuth();
    	return view('admin.add_product');
    }
       
    public function save_product(Request $request ){
    		 $this->AdminAuth();
    	 $data= array();

    	 $data['category_id']= $request->category_id;
    	 $data['sub_category_id']= $request->sub_category_id;
    	 $data['manufacture_id']= $request->manufacture_id;
    	 $data['product_name']= $request->product_name;
    	 $data['product_short_description']= $request->product_short_description;
    	 $data['product_long_description']= $request->product_long_description;
    	 $data['product_price']= $request->product_price;
    	 $data['product_size']= $request->product_size;
    	 $data['product_color']= $request->product_color;
    	 $data['publication_statuse']= $request->publications_status;

    	
    	$image=$request->file('product_image');

    	if ($image) {
    		
    		$img_name= str_random(20);
    		$ext= strtolower($image->getClientOriginalExtension());
    		$image_full_name= $img_name.'.'.$ext;
    		$upload_path= 'image/';
    		$img_url=$upload_path.$image_full_name;
    		$success= $image->move($upload_path,$image_full_name);

    		if ($success) {
    			 $data['product_image']= $img_url;

    			 DB::table('tbl_products')->insert($data);

    			  Session::put('message','Product added Sucessfully!');
    			 return Redirect::to('/add_products');
    		}
    	}

    		$data['product_image']='';

    			 DB::table('tbl_products')->insert($data);

    			  Session::put('message','Product added Sucessfully!');
    			return Redirect::to('/add_products');

    }


		    public function all_products(){
		    	$this->AdminAuth();
		    	$all_product_info = DB::table('tbl_products')
		    						->join('tbl_category','tbl_products.category_id', '=','tbl_category.id')
		    						->join('tbl_manufacture','tbl_products.manufacture_id', '=','tbl_manufacture.manufacture_id')
		    						->get();
		    						// echo "<pre>";
		    						// print_r($all_product_info);
		    						// echo "</pre>";
		    						// exit();

		   		$manage_product = view('admin.all_product')
		   						->with('all_product_info',$all_product_info);
		   	return view('admin_layout')
		   				->with('admin.all_product',$manage_product);

		    }


			public function unactive_product($id){
							 $this->AdminAuth();
						   	DB::table('tbl_products')
						   	->where('product_id',$id)
						   	->update(['publication_statuse'=>0]);
						   	Session::put('message','Product unactive successfully !!');
						   	return Redirect::to('/all_products');
						   }
				   public function active_product($id){
				   				 $this->AdminAuth();
						   	DB::table('tbl_products')
						   	->where('product_id',$id)
						   	->update(['publication_statuse'=>1]);
						   	Session::put('message','product active successfully !!');
						   	return Redirect::to('/all_products');
						   }

					public function edit_product($id){
						 $this->AdminAuth();
						$product_info= DB::table('tbl_products')
						->where('product_id',$id)
						->first();

						$manage_product= view('admin.edit_product')
									->with('pro_info',$product_info);
									return view('admin_layout')
									->with('admin.edit_product',$manage_product);
					}

					public function update_product(Request $request, $id){
						 $this->AdminAuth();
						$data= array();
							 $data['category_id']= $request->category_id;
					    	 $data['manufacture_id']= $request->manufacture_id;
					    	 $data['product_name']= $request->product_name;
					    	 $data['product_short_description']= $request->product_short_description;
					    	 $data['product_long_description']= $request->product_long_description;
					    	 $data['product_price']= $request->product_price;
					    	 $data['product_size']= $request->product_size;
					    	 $data['product_color']= $request->product_color;
					    	 $data['publication_statuse']= $request->publications_status;

					    	
					    	$image=$request->file('product_image');

					    	if ($image) {
					    		
					    		$img_name= str_random(20);
					    		$ext= strtolower($image->getClientOriginalExtension());
					    		$image_full_name= $img_name.'.'.$ext;
					    		$upload_path= 'image/';
					    		$img_url=$upload_path.$image_full_name;
					    		$success= $image->move($upload_path,$image_full_name);

					    		if ($success) {
					    			 $data['product_image']= $img_url;

										}

							}

							DB::table('tbl_products')
							->where('product_id',$id)
							->update($data);

							Session::put('message','Product updated Sucessfully!');
							return Redirect::to('/all_products');
							}			

				public function delete_product($id){
					 $this->AdminAuth();

					DB::table('tbl_products')
							->where('product_id',$id)
							->delete();
							Session::put('message','product Deleted Sucessfully!');
							return Redirect::to('/all_products');

				}


				
}
