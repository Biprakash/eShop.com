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
					<a href="#">Add Category</a>
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
						<h2><i class="halflings-icon edit"></i><span class="break"></span> Add Product</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="{{url('/save-product')}}" enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>
							 
							<div class="control-group">
							  <label class="control-label"  >Product Name</label>
							  <div class="controls">
								<input type="text"   name="product_name"> 
							  </div>
							</div>
							 <div class="control-group">
								<label class="control-label" for="selectError3">Product Category</label>  
                                <div class="controls">
								  <select id="selectError3"name="category_id" >
								  	<option>Select Category</option>
								  	<?php
                             			$all_cat_info= DB::table('tbl_category')
                                                ->where('publications_status',1)
                                                ->get();
                                foreach ($all_cat_info as $v_category) {?>
									<option value="{{$v_category->id}}" >{{$v_category->category_name}}</option>
									 
									 <?php }
									 ?>
								  </select>
								</div>
								
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError3">Product Sub Category</label>  
                                <div class="controls">
								  <select id="selectError3"name="sub_category_id" >
								  	<option>Select Sub Category</option>
								  	<?php
                             			$all_scat_info= DB::table('tbl_subcategory')
                                                ->where('publications_status',1)
                                                ->get();
                                foreach ($all_scat_info as $v_scategory) {?>
									<option value="{{$v_scategory->id}}" >{{$v_scategory->sub_category_name}}</option>
									 
									 <?php }
									 ?>
								  </select>
								</div>
								
							  </div>

							   <div class="control-group">
								<label class="control-label" for="selectError3">Product manufacture</label>
								<div class="controls">
								  <select id="selectError3"name="manufacture_id" >
								  		<option >Select Product</option>
								  	<?php
								  	$all_manufac_info= DB::table('tbl_manufacture')
								  					->where('publication_status',1)
								  					->get();
								  		foreach ($all_manufac_info as $manufac_info) {?>
								  			<option value="{{$manufac_info->manufacture_id}}" >{{$manufac_info->manufacture_name}}</option>
								  		
								  		<?php }

								  			?> 
								  </select>
								</div>
							  </div>
							        
							<div class="control-group hidden-phone">
							  <label class="control-label"  >Product Short Description</label>
							  <div class="controls">
								<textarea class="cleditor" type="textarea" name="product_short_description" rows="2"></textarea>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label"  >Product Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" type="textarea" name="product_long_description" rows="2"></textarea>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Product Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
							  </div>
							</div> 

							<div class="control-group">
							  <label class="control-label"  >Product price</label>
							  <div class="controls">
								<input type="text"   name="product_price" >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label"  >Product Size</label>
							  <div class="controls">
								<input type="text"   name="product_size" >
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label"  >Product Color</label>
							  <div class="controls">
								<input type="text"   name="product_color" >
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label"  >Publications Status</label>
							  <div class="controls">
								<input type="checkbox" name="publications_status" value="1">  
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Submit</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div>


@endsection