<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Session;

class ManufacturesController extends Controller
{
    public function add_manufacture(){
    	return view('admin/add_manufacture');
    }
    


    public function save_manufacture(Request $request){
    	 $data= array();

     $data['manufacture_name']= $request->manufacture_name;
   	 $data['manufacture_description']= $request->manufacture_description;
   	 $data['publication_status']= $request->publications_status;
   	 
   	 DB::table('tbl_manufacture')->insert($data);

   	 Session::put('message','Manufacture added successfully !!');
   	 return Redirect::to('/add_manufacture');

    }
    

    public function all_manufacture(){
    	 $all_manufacture_info= DB::table('tbl_manufacture')->get();

    	 $manage_manufacture= view('admin.all_manufacture')
    	 					->with('all_manufacture_info',$all_manufacture_info);
    	 	return view('admin_layout')
    	 				->with('admin.all_manufacture',$manage_manufacture);
    }



    public function unactive_manufac($manufacture_id){
   					DB::table('tbl_manufacture')
   					->where('manufacture_id',$manufacture_id)
   					->update(['publication_status'=>0]);
   			return Redirect::to('/all_manufacture');
   }


   public function active_manufacture($manufacture_id){
							DB::table('tbl_manufacture')
							->where('manufacture_id',$manufacture_id)
						 	->update(['publication_status'=>1]);
   			return Redirect::to('/all_manufacture');
   }


   public function edit_manufac($manufacture_id){
							$manufacture_info= DB::table('tbl_manufacture')
									 ->where('manufacture_id',$manufacture_id)
									 ->first();

	// Session::put('message','Contact Deleted Successfully!');
                    
	 $manage_manufac= view('admin.edit_manufacture')
    	 					->with('manufacture_info',$manufacture_info);
    	 	return view('admin_layout')
    	 				->with('admin.edit_manufacture',$manage_manufac);
   }


  public function update_manufacture(Request $request, $manufacture_id){
  $date= array();

  $data['manufacture_name']= $request->manufacture_name;
  $data['manufacture_description']= $request->manufacture_description;

  DB::table('tbl_manufacture')
      ->where('manufacture_id',$manufacture_id)
      ->update($data);
  Session::put('message','Manufacture updated Successfully !');

  return redirect::to('/all_manufacture');
   
}




   public function delete_manufacture($manufacture_id){
          DB::table('tbl_manufacture')
              ->where('manufacture_id',$manufacture_id)
              ->delete();
              Session::put('message','Category Deleted Successfully !');
              return redirect::to('/all_manufacture');
}

}
 
