@extends('admin_layout')
@section('admin_content')
 <ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">All Delivery Members</a></li>
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
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
								  <th>ID</th>
								  <th>Name</th>
								  <th>Image</th>								  
								  <th>Area</th>							 
								  <th>Actions</th>
							  </tr>
						  </thead> 
						  @foreach($all_delivery_man_info as $v_dvman)  
						  <tbody>
							<tr>
								<td> {{$v_dvman-> id}}</td>
								<td class="center">{{$v_dvman->delivery_man_name}}</td>
								<td style="height:140px; width:140px"><img src="{{URL::to($v_dvman->image)}}" ></td>
								<td class="center">{{$v_dvman->delivery_area}}</td>
								<td class="center">

									<a class="btn btn-info" href="{{URL::to('/edit_dvman/'.$v_dvman->id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" id="delete" href="{{URL::to('/delete_dvman/'.$v_dvman->id)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							 
						  </tbody>
						  @endforeach
					  </table>            
					</div>
				</div>
				</div>


@endsection