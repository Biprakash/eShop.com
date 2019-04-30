@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
 
			<div class="register-req">
				<h4>Please fill up this:</h4>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					 
					<div class="col-sm-8 clearfix">
						<div class="bill-to">
							<p>Shipping Details</p>
							<div class="form-one">
								<form action="{{url('/save_shipping')}}" method="post">
								{{csrf_field()}}									
									 
									<input type="text" name="customer_first_aname" placeholder="First Name *"> 
									<input type="text"name="customer_last_aname" placeholder="Last Name *">		 
									<input type="text" name="customer_address" placeholder="Address">
									<input type="text" name="customer_city" placeholder="City">
									<input type="text" name="customer_mobile" placeholder="Mobile Number">
																		

									<p class="alert-danger" style="color:red">
									<?php
									$mes= Session::get('message');
									if ($mes) {


										echo "$mes";
										Session::put('message',null);
									}

									?>
									</p>
									<input type="submit" class="btn btn-defult" placeholder="Submit">
								</form>
							</div>
							 
						</div>
					</div>
					 					
				</div>
			</div>
			 
			 
		</div>
	</section> <!--/#cart_items-->

@endsection