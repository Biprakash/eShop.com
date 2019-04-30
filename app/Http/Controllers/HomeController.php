<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{
    public function index(){
    	$all_published_product= DB::table('tbl_products')
		    						->join('tbl_category','tbl_products.category_id', '=','tbl_category.id')
		    						->join('tbl_manufacture','tbl_products.manufacture_id', '=','tbl_manufacture.manufacture_id')
		    						->where('publication_statuse',1)
		    						->limit(6)
		    						->get();
		    						 
		   		$manage_published_product = view('pages.home')
		   						->with('all_published_product',$all_published_product);
		   	return view('sliderlayout')
		   				->with('pages.home',$manage_published_product);


    	// return view('pages.home');
    }

    public function show_product_by_category($id){
    		$product_by_category= DB::table('tbl_products')
		    						->join('tbl_category','tbl_products.category_id', '=','tbl_category.id')
		    						->where('tbl_products.publication_statuse',1)
		    						->where('category_id',$id)
		    						->limit(18)
		    						->get();
		    						 
		   		$manage_product_by_category = view('pages.category_by_products')
		   						->with('product_by_category',$product_by_category);
		   	return view('layout')
		   				->with('pages.category_by_products',$manage_product_by_category);

    }
    public function show_product_by_subcategory($id){
    		$product_by_subcategory= DB::table('tbl_products')
		    						->join('tbl_subcategory','tbl_products.product_name', '=','tbl_subcategory.sub_category_name')
		    						->where('tbl_products.publication_statuse',1)
		    						->where('sub_category_id',$id)
		    						->limit(18)
		    						->get();
		    						 
		   		$manage_product_by_subcategory = view('pages.products_by_subcategory')
		   						->with('product_by_subcategory',$product_by_subcategory);
		   	return view('layout')
		   				->with('pages.product_by_subcategory',$manage_product_by_subcategory);

    }
    public function show_product_by_manufacture($id){
    		$product_by_manufacture= DB::table('tbl_products')		    						 
		    						->where('tbl_products.publication_statuse',1)
		    						->where('manufacture_id',$id)
		    						->limit(18)
		    						->get();
		    						 
		   		$manage_product_by_manufacture = view('pages.products_by_manufacture')
		   						->with('product_by_manufac',$product_by_manufacture);
		   	return view('layout')
		   				->with('pages.products_by_manufacture',$manage_product_by_manufacture);

    }

    public function view_product($id){
    	$product_details= DB::table('tbl_products')
    								->join('tbl_category','tbl_products.category_id', '=','tbl_category.id')
		    						->join('tbl_manufacture','tbl_products.manufacture_id', '=','tbl_manufacture.manufacture_id')		    						 
		    						->where('tbl_products.publication_statuse',1)
		    						->where('product_id',$id)
		    						->first();
		    						 
		   		$manage_product_details= view('pages.product_details')
		   						->with('product_details',$product_details);
		   	return view('layout')
		   				->with('pages.product_details',$manage_product_details);
    }

    public function search_product(Request $req){
					$searchdata= $req->searchdata;

				$data = DB::table('tbl_products')
						->join('tbl_category','tbl_category.id','tbl_products.category_id')
						->where('product_name','like','%'. $searchdata . '%')
						->get();

				
				$product_by_search= view('pages.products_by_search')
		   						->with('search_data',$data);
		   	return view('layout')
		   				->with('pages.product_by_search',$product_by_search);
				 
				//return view('pages.products',['data'=>$data, 'catByUser'=>$searchdata]);
				}

}
