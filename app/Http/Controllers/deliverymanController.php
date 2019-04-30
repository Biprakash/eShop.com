<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Session;

class deliverymanController extends Controller
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
   

 	public function add_delivery_man(){
 			return view('admin.add_delivery_man');
 		}


 	public function save_delivery_man( Request $request){
   	 $this->AdminAuth();
      
     $data= array();
   	 $data['delivery_man_name']= $request->delivery_man_name;
   	 $data['delivery_area']= $request->delivery_area;

     $image= $request->file('dmimage');

      if ($image) {
        
        $img_name= str_random(20);
        $ext= strtolower($image->getClientOriginalExtension());
        $image_full_name= $img_name.'.'.$ext;
        $upload_path= 'image/';
        $img_url=$upload_path.$image_full_name;
        $success=$image->move($upload_path,$image_full_name);

        if ($success) {
           $data['image']= $img_url;

           DB::table('delivery_man')->insert($data);

            Session::put('message','Deliver man added Sucessfully!');
           return Redirect::to('/add_delivery_man');
        }
      }

   	 // $data['image']= '';

   	 DB::table('delivery_man')->insert($data);

   	 Session::put('message','Deliver man added successfully !!');
   	 return Redirect::to('/add_delivery_man');

   }

  public function all_delivery_man(){
      $this->AdminAuth();
   	$all_dvman_info = DB::table('delivery_man')->get();
   	$delivery_man_view = view('admin.all_delivery_man')
   						->with('all_delivery_man_info',$all_dvman_info);
   	
   	return view('admin_layout')
   				->with('admin.all_delivery_man',$delivery_man_view);

}

public function edit_dvman($id){
   $this->AdminAuth();
  $category_info= DB::table('delivery_man')
   ->where('id',$id)
   ->first();

  // Session::put('message','Contact Deleted Successfully!');
   $manage_dvman= view('admin.edit_category')
          ->with ('category_info',$category_info);

  return view('admin_layout')
      ->with('admin.edit_category',$manage_dvman);

   
}

public function delete_dvman($id){
  DB::table('delivery_man')
      ->where('id',$id)
      ->delete();
      Session::put('message','Deleted Successfully !');
      return redirect::to('/all_delivery_man');
}


}