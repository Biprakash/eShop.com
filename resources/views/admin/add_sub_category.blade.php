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
					<a href="#">Add Sub Category</a>
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
						<h2><i class="halflings-icon edit"></i><span class="break"></span> Add Sub Category</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="{{url('/save_sub_category')}}">
							{{csrf_field()}}
						  <fieldset>
							 
							<div class="control-group">
								<label class="control-label" for="selectError3">Category</label>  
                                <div class="controls">
								  <select id="selectError3"name="cat_name" >
								  	<option>Select Category</option>
								  	<?php
                             			$all_cat_info= DB::table('tbl_category')
                                                ->where('publications_status',1)
                                                ->get();
                                foreach ($all_cat_info as $v_category) {?>
									<option value="{{$v_category->category_name}}" >{{$v_category->category_name}}</option>
									 
									 <?php }
									 ?>
								  </select>
								</div>
								
							  </div>
							<div class="control-group">
							  <label class="control-label">Sub Category Name</label>
							  <div class="controls">
								<input type="text"   name="sub_category_name" >
							  </div>
							</div>

							        
							<div class="control-group hidden-phone">
							  <label class="control-label"  >Sub Category Description</label>
							  <div class="controls">
								<textarea class="cleditor" type="textarea" name="category_description" rows="2"></textarea>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label"  >Publications Status</label>
							  <div class="controls">
								<input type="checkbox" name="publications_status" value="1">  
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Sub Category</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div>


@endsection