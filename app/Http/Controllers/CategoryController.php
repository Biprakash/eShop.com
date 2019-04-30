<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
 use Illuminate\support\Facades\Redirect;
use Session;
class CategoryController extends Controller
{
   // public function __construct()
   // {
   //     $this->AdminAuth();

   //  }
     

   public function index(){
      $this->AdminAuth();
   	return view('admin/add_category');
   }
   

   public function all_category(){
      $this->AdminAuth();
   	$all_category_info = DB::table('tbl_category')->get();
   	$manage_category = view('admin.all_category')
   						->with('all_category_info',$all_category_info);
   	return view('admin_layout')
   				->with('admin.all_category',$manage_category);

   	//return view ('admin/all_category');
   }
   


    public function save_category( Request $request){
   	 $this->AdminAuth();
       $data= array();

   	 //$data['id']= $request->id;
   	 $data['category_name']= $request->category_name;
   	 $data['category_description']= $request->category_description;
   	 $data['publications_status']= $request->publications_status;
   	 DB::table('tbl_category')->insert($data);

   	 Session::put('message','Category added successfully !!');
   	 return Redirect::to('/add_category');

   }
   public function unactive_category($id){
      $this->AdminAuth();
   	DB::table('tbl_category')
   	->where('id',$id)
   	->update(['publications_status'=>0]);
   	return Redirect::to('/all_category');
   }
   public function active_category($id){
      $this->AdminAuth();
   	DB::table('tbl_category')
   	->where('id',$id)
   	->update(['publications_status'=>1]);
   	return Redirect::to('/all_category');
   }

    
  public function edit_category($id){
   $this->AdminAuth();
	$category_info= DB::table('tbl_category')
	 ->where('id',$id)
	 ->first();

	// Session::put('message','Contact Deleted Successfully!');
	 $manage_category= view('admin.edit_category')
					->with ('category_info',$category_info);

	return view('admin_layout')
			->with('admin.edit_category',$manage_category);

	 
}

public function update_category(Request $request, $id){
   $this->AdminAuth();
	$data= array();

	$data['category_name']= $request->category_name;
	$data['category_description']= $request->category_description;

	DB::table('tbl_category')
			->where('id',$id)
			->update($data);
	Session::put('message','Category updated Successfully !');

	return redirect::to('/all_category');
	 
}



public function delete_category($id){
	DB::table('tbl_category')
			->where('id',$id)
			->delete();
			Session::put('message','Category Deleted Successfully !');
			return redirect::to('/all_category');
}
 public function AdminAuth(){
      $admin_id=Session::get('admin_id');

      if ($admin_id) {
          return;
      }
      else{
         return Redirect::to('/admin')->send();
      }
    }
   

}
