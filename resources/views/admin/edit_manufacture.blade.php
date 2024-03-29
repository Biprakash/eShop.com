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
					<a href="#">Update Category</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span> Update Manufacture</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="{{url('/update_manufacture',$manufacture_info->manufacture_id)}}">
							{{csrf_field()}}
						  <fieldset>
							 
							<div class="control-group">
							  <label class="control-label"  >Category Name</label>
							  <div class="controls">
								<input type="text"   name="manufacture_name" value="{{$manufacture_info->manufacture_name}}">
							  </div>
							</div>

							        
							<div class="control-group hidden-phone">
							  <label class="control-label"  >Category Description</label>
							  <div class="controls">
								<textarea class="cleditor" type="textarea" name="manufacture_description"rows="2">{{$manufacture_info->manufacture_description}}</textarea>
							  </div>
							</div>
							 
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Update</button>
							  
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div>


@endsection