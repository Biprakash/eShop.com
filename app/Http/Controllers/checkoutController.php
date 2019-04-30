<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\support\Facades\Redirect;
use Session;
use Cart;
class checkoutController extends Controller
{
   
    public function login(){
        	return view ('pages.login');
        }
    
    public function customer_reg(Request $req){
        	$data=array();

            $data['customer_name']= $req->name;
        	$data['customer_email']= $req->email;
        	$data['customer_password']=md5($req->password);
        	$customer_id=DB::table('tbl_customer')
        					->insertGetId($data);
        	$customer_name=DB::table('tbl_customer')
        					->select('tbl_customer.customer_name')
                            ->first();
        	Session::put('customer_id',$customer_id);
        	Session::put('customer_name',$customer_name);
        	return Redirect('/checkout');
        }

    public function checkout(){
        	return view ('pages.checkout');
        }


    public function show_cart(){
        	return view ('pages.add_to_cart');
        }

    public function save_shipping(Request $req){
     
             $data=array(); 
             $data['customer_first_aname']= $req->customer_first_aname;
             $data['customer_last_aname']= $req->customer_last_aname;
             $data['customer_address']= $req->customer_address;
             $data['customer_mobile']= $req->customer_mobile;
             $data['customer_city']= $req->customer_city;
             $shipping_id=DB::table('tbl_shipping')
            			->insertGetId($data);
            Session::put('shipping_id',$shipping_id);
            return Redirect('/payment');

    }

    

    public function customer_login(Request $req){
    	 $customer_email= $req->email;
    	 $customer_password=md5($req->password);
    	 $result= DB::table('tbl_customer')
    	 			->where('customer_email',$customer_email)
    	 			->where('customer_password',$customer_password)
    	 			->first();
     		if ($result) { 
            Session::put('customer_id',$result->customer_id);			
     			return Redirect('/checkout');
     		}
     		else{
     			
     			Session::put('message','Email or password is incorrect !');
     			return Redirect('/login');

     		}
    } 

    public function customer_logout(Request $req){
    	 Session::flush();
    	 return Redirect('/');
    }
    
    public function payment(){
    	return view('pages.payment');
    }

    
    public function order_place(Request $req){
    	 
    		$payment_type=$req->payment_getway;
    		
            $data=array();
    		$data['payment_method']=$payment_type;
    		$data['payment_status']='pending';
    		$payment_id=DB::table('tbl_payment')
    					->insertGetId($data);
    		$order_data=array();
    		$order_data['customer_id']=Session::get('customer_id');
    		$order_data['shipping_id']=Session::get('shipping_id');
    		$order_data['payment_id']= $payment_id;
    		$order_data['order_total']= Cart::total();
    		$order_data['order_status']= 'pending';
    		$order_id=DB::table('tbl_order')
    					->insertGetId($order_data);
    		
            $contents=Cart::content();
    		$odr_dtails_data=array();
    		

            foreach ($contents as $v_content) {
    			 $odr_dtails_data['order_id']=$order_id;
    			 $odr_dtails_data['product_id']=$v_content->id;
    			 $odr_dtails_data['product_name']=$v_content->name;
    			 $odr_dtails_data['product_price']=$v_content->price;
    			 $odr_dtails_data['product_sales_quantity']=$v_content->qty;
    			  
    			  DB::table('tbl_order_details')
    			  			->insert($odr_dtails_data);
    		}

    		if ($payment_type=="handkash") {
    			Cart::destroy();
    			return view('pages.handkash');
    		}
    		elseif ($payment_type=="bikash") {
    			return view('pages.handkash');
    		}elseif ($payment_type=="payza") {
    			return view('pages.handkash');
    		}elseif ($payment_type=="papal") {
    			return view('pages.handkash');
    		}
    		else
    			echo "Not Selected";
    }


    public function pending_order(){
    	$all_porder_info = DB::table('tbl_order')
    						->join('tbl_customer','tbl_order.customer_id', '=','tbl_customer.customer_id')
                            ->join('tbl_shipping','tbl_order.shipping_id', '=','tbl_shipping.id')
    						->select('tbl_order.*','tbl_customer.customer_name','tbl_shipping.customer_address')
    						->get();
		    						 
		   	$manage_order = view('admin.pending_order')
		   						->with('all_porder_info',$all_porder_info);
		   	return view('admin_layout')
		   				->with('admin.pending_order',$manage_order);
    }
    
    public function delivered_order(){
        $all_dorder_info = DB::table('tbl_order')
                            ->join('tbl_customer','tbl_order.customer_id', '=','tbl_customer.customer_id')
                            ->join('tbl_shipping','tbl_order.shipping_id', '=','tbl_shipping.id')
                            ->select('tbl_order.*','tbl_customer.customer_name','tbl_shipping.customer_address')
                            ->get();
                                     
            $manage_order = view('admin.delivered_order')
                                ->with('all_dorder_info',$all_dorder_info);
            return view('admin_layout')
                        ->with('admin.delivered_order',$manage_order);

    }

    public function view_order($order_id){
    	$order_by_id = DB::table('tbl_order')
							->where('order_id',$order_id)

    						->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
    						 
    						->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.id')
    						->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
    						->select('tbl_order.*','tbl_customer.*','tbl_shipping.*','tbl_payment.payment_method')
    						 
							->first();		    						
		    						 

		$cart_detail=DB::table('tbl_order_details')
					    ->where('order_id',$order_id)
						->get();
										 
		    						// echo "<pre>";
		    						// print_r($cart_detail);
		    						// echo "</pre>";
		    						// exit();
		    						 
		$view_order = view('admin.view_order')
   						->with('order_detail',$order_by_id)
   						->with('cart_detail', $cart_detail);
		   	return view('admin_layout')
		   		->with('admin.view_order',$view_order);	   				 

    }
           
    public function unactive_order($order_id){
               
                    DB::table('tbl_order')
                    ->where('order_id',$order_id)
                    ->update(['order_status'=>"pending"]);
                    return Redirect::to('/delivered_order');
           }
    
    public function active_order($order_id){
               
                    DB::table('tbl_order')
                    ->where('order_id',$order_id)
                    ->update(['order_status'=>"delivered"]);
                    return Redirect::to('/pending_order');
                   }



    public function delete_porder($order_id){
        DB::table('tbl_order')
                            ->where('order_id',$order_id)
                            ->delete();
            
            Session::put('message','Order Deleted Successfully !');
              return redirect::to('/pending_order');
    }
    public function delete_dorder($order_id){
        DB::table('tbl_order')
                            ->where('order_id',$order_id)
                            ->delete();
            
            Session::put('message','Order Deleted Successfully !');
              return redirect::to('/delivered_order');
    }

    }