@extends('admin_layout')
@section('admin_content')
<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Delivery Member</a>
				</li>
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
						<h2><i class="halflings-icon edit"></i><span class="break"></span> Add Delivery Member</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="{{url('/save_delivery_man')}}" enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>						 
							<div class="control-group">
							  <label class="control-label"  >Full Name</label>
							  <div class="controls">
								<input type="text"   name="delivery_man_name"> 
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="dmimage" id="fileInput" type="file">
							  </div>
							</div> 						        
							<div class="control-group hidden-phone">
							  <label class="control-label"  >Delivery Area</label>
							  <div class="controls">
								<input  type="text" name="delivery_area"  ></input>
							  </div>
							</div>
							 
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Member</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div>


@endsection