@extends('admin_layout')
@section('admin_content')
 <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Pending Order Details</a></li>
			</ul>
			<p class="alert-success">
				<?php
				$message= Session::get('message');
				
				if ($message) {
					echo "$message";
					Session::put('message',null);
				}

				?>

			</p>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Orders</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Order ID</th>
								  <th>Customer Name</th>
								  <th>Total Price</th>	 
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead> 
						  @foreach($all_dorder_info as $v_order)  
						  @if($v_order->order_status == "delivered")

						  <tbody>
							<tr>
								
								<td> {{$v_order->order_id}}</td>
								<td class="center">{{$v_order->customer_name}}</td>
								<td class="center">{{$v_order->order_total}}</td>				  
								<td class="center">
									
									<span class="label label-danger">Delivered</span>
									 
								</td>  

								<td class="center">

									 
									<a class="btn btn-danger" href="{{URL::to('/unactive_order/'.$v_order->order_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									

									<a class="btn btn-info" href="{{URL::to('/view_order/'.$v_order->order_id)}}">
										View Detail 
									</a>
									<a class="btn btn-danger" id="delete" href="{{URL::to('/delete_dorder/'.$v_order->order_id)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
								
							</tr>
							 
						  </tbody>
						  @endif
						  @endforeach
					  </table>            
					</div>
				</div>
				</div>


@endsection