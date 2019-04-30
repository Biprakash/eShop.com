<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  DB;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Session;

class SubCategoryController extends Controller
{
    public function index(){
    	 //$this->AdminAuth();
   	return view('admin/add_sub_category');
    }

  public function  save_sub_category(Request $req){

  	$data= array();

  	$data['category_name']= $req->cat_name;
  	$data['sub_category_name']= $req->sub_category_name;
  	$data['category_description']= $req->category_description;
  	$data['publications_status']= $req->publications_status;

  	 DB::table('tbl_subcategory')->insert($data);

   	 Session::put('message','Sub Category added successfully !!');
   	 return Redirect::to('/add_sub_category');
  }

  public function all__sub_category(){
  	$all__sub_categoryinfo= DB::table('tbl_subcategory')->get();

  	$manage_category = view('admin.all_sub_category')
   						->with('all_sub_category_info',$all__sub_categoryinfo);
   	return view('admin_layout')
   				->with('admin.all_sub_category',$manage_category);
  }



  public function unactive_sub_category($id){
      //$this->AdminAuth();
   	DB::table('tbl_subcategory')
   	->where('id',$id)
   	->update(['publications_status'=>0]);
   	return Redirect::to('/all_sub_category');
   }
   public function active_sub_category($id){
     // $this->AdminAuth();
   	DB::table('tbl_subcategory')
   	->where('id',$id)
   	->update(['publications_status'=>1]);
   	return Redirect::to('/all_sub_category');
   }

   public function edit_sub_category($id){
   		// $this->AdminAuth();
	$sub_category_info= DB::table('tbl_subcategory')
	 ->where('id',$id)
	 ->first();

	// Session::put('message','Contact Deleted Successfully!');
	  $manage_sub_category= view('admin.edit_sub_category')
	  						->with('all_scategoryinfo',$sub_category_info);
	  				return view('admin_layout')
	  						->with('admin.edit_sub_category',$manage_sub_category);

   }

   public function update_sub_category(Request $request,$id){
   		$data= array();

	$data['category_name']= $request->category_name;
	$data['sub_category_name']= $request->sub_category_name;
	$data['category_description']= $request->category_description;

	DB::table('tbl_subcategory')
			->where('id',$id)
			->update($data);
	Session::put('message','Sub Category updated Successfully !');

	return redirect::to('/all_sub_category');
   }


   public function delete_sub_category($id){

   		DB::table('tbl_subcategory')
   				->where('id',$id)
   				->delete();
   		Session::put('message','Sub Category Deleted Successfully!');
   		return redirect::to('/all_sub_category');
   }
}

