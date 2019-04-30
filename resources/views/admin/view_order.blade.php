@extends('admin_layout')
@section('admin_content')
<div class="box span12">
<div class="box-header" data-original-title>
	<h2><span class="center">Details About Order</span> </h2>

	<div class="box-icon">
		
	</div>
</div> 

						        
</div>



<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><span class="break">Order No:{{$order_detail->order_id}}</span> </h2>

						<div class="box-icon">
							
						</div>
					</div>  
<div class="box-content">

						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead >
						   	  <tr>
								
								  <th>Customer ID</th> 
								  <th>Customer Name</th>
								  <th>Customer Mobile Number</th>
								  
							  </tr>
						  </thead>   
						  <tbody>
                            <tr>
								<td>{{$order_detail->customer_id}}</td>
								<td>{{$order_detail->customer_name}}</td>
								<td>{{$order_detail->customer_mobile}}</td>

						    </tr>
                            <tr>
                             
                             <td> </td>                                                        
                            </tr>	                       							
						  </tbody>
					  </table>            
</div><!--Box Content--->   

</div><div class="box span12">
					<div class="box-header" data-original-title>
						<h2><span class="break">Order Details :</span> </h2>

						<div class="box-icon">
							
						</div>
					</div>  
<div class="box-content">

						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead >
						   	  <tr>
								
								  
								  <th>Product ID</th>
								  <th>Product Name</th>
								  <th>Price</th>
								  <th>Qty</th>
								  <th>Sub Total</th>
								  

							  </tr>
						  </thead>   
						  <tbody>
                             @foreach($cart_detail as $cart_detail)
                            <tr>
                            	<td>{{$cart_detail->product_id}}</td>
                            	<td>{{$cart_detail->product_name}}</td>
                            	<td>{{$cart_detail->product_price}}</td>
                            	<td>{{$cart_detail->product_sales_quantity}}</td>
                            	<td>{{$cart_detail->product_price*$cart_detail->product_sales_quantity}}</td>

                            </tr>
                            @endforeach
                            
                            <tr>
                             
                             <td colspan="4"><b>TOTAL : <b></td>                                                        
                             <td  ><b>{{$order_detail->order_total}}<b></td>                                                        
                            </tr>	                       							
						  </tbody>
					  </table>            
</div><!--Box Content--->   
</div>


<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><span class="break">Delivery Detail</span> </h2>

						<div class="box-icon">
							
						</div>
					</div>  
<div class="box-content">

						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead >
							  <tr>
								
								  <th>Delivery ID</th> 
								  <th>Whom to delivery</th>
								  <th>Contact</th>
								  <th>City</th>
								  <th>Address</th>
								  <th>Payment Method</th>


							  </tr>
						  </thead>   
						  <tbody>
                             
                           

							<tr>
								<td>{{$order_detail->id}}</td>
								<td>{{$order_detail->customer_first_aname}}</td>
								<td>{{$order_detail->customer_mobile}}</td>
								<td>{{$order_detail->customer_city}}</td>
								<td>{{$order_detail->customer_address}}</td>
								<td>{{$order_detail->payment_method}} </td>
								
						    </tr>
							
						 
						  </tbody>
					  </table> 

</div><!--Box Content--->   
</div>



@endsection