<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Session;

class sliderController extends Controller
{
    
    public function add_sliders(){
    	return view('admin.add_sliders');
    }

    

   
    public function save_sliders(Request $request){
    	$data= array();

    	 $data['publication_status']= $request->publications_status;

    	
    	$image=$request->file('slider_image');

    	if ($image) {
    		
    		$img_name= str_random(20);
    		$ext= strtolower($image->getClientOriginalExtension());
    		$image_full_name= $img_name.'.'.$ext;
    		$upload_path= 'sliders/';
    		$img_url=$upload_path.$image_full_name;
    		$success= $image->move($upload_path,$image_full_name);

    		if ($success) {
    			 $data['slider_image']= $img_url;

    			 DB::table('tbl_slider')->insert($data);

    			  Session::put('message','Product added Sucessfully!');
    			 return Redirect::to('/add_sliders');
    		}
    	}

    		$data['slider_image']='';

    			 DB::table('tbl_products')->insert($data);

    			  Session::put('message','Slider added Sucessfully!');
    			return Redirect::to('/add_sliders');
    }


    public function all_sliders(){
    	$all_sliders_info= DB::table('tbl_slider')
    					->get();
    			$manage_sliders=view('admin.all_sliders')
    					->with('all_sliders_info',$all_sliders_info);
    			return view('admin_layout')
    					->with('admin.all_sliders',$manage_sliders);
    }


    public function unactive_slider($id){    
				   	DB::table('tbl_slider')
				   	->where('slider_id',$id)
				   	->update(['publication_status'=>0]);
				   	return Redirect::to('/all_sliders');
				   }
    public function active_slider($id){    
				   	DB::table('tbl_slider')
				   	->where('slider_id',$id)
				   	->update(['publication_status'=>1]);
				   	return Redirect::to('/all_sliders');
   					}
   	public function delete_slider($id){
   					DB::table('tbl_slider')
   					->where('slider_id',$id)
   					->delete();
   					Session::put('message','Slider Deleted Sucessfully!');
    			return Redirect::to('/all_sliders');
   	}

}
