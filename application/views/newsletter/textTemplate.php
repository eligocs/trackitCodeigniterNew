<link href="<?php echo base_url();?>site/assets/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url();?>site/assets/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>site/assets/js/components-editors.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>site/assets/form-repeater.min.js" type="text/javascript"></script>


	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption"><i class="fa fa-newspaper-o" aria-hidden="true"></i>Create Text Template </div>
					<a class="btn btn-success pull-right" href="<?php echo site_url("newsletters/templateList"); ?>" title="Back">Back</a>
				</div>
			</div>
	
			<div class="portlet-body">
				<form role="form"  id="defalutTextTemplate" action="#">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Template Type</label>
								<select  name="template_type" >
								<option value="1" >Holiday</option>
								<option value="2" >Accomodation</option>
								</select>
							</div>
						</div> 	
					</div> 	
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label">Greetings</label>
								<input type="text" required name="greeting" placeholder="Dear Travel Partner" class="form-control">
							</div>
						</div> 
						<div class="col-md-4">
						</div>
							<div class="col-md-2">
						<div class="form-group">
								<label class="control-label">Offer</label>
								<input type="text"  required placeholder="Offer" name="offer" class="form-control">
							</div>
						</div>    
						</div>    
						<div class="row">
							<div class="col-md-6">
								<label class="control-label">Welcome Note</label>
						<div class="form-group">
								<textarea name='welcome_note'  required class="form-control" rows="3" placeholder="Welcome Note!!"></textarea>
								</div>
						</div>
						</div>
						<div class="row">
							<div class="col-md-6">
							<div class="form-group mt-repeater">
								<div data-repeater-list="group_iti">
									<div data-repeater-item class="mt-repeater-item mt-overflow">
										<label class="control-label">Day Wise Itineary</label>
										<div class="mt-repeater-cell">
											<input required type="text" name="iti" placeholder="Day Wise Itineary" class="form-control mt-repeater-input-inline">
											<a href="javascript:;" data-repeater-delete="" class="btn btn-danger mt-repeater-delete mt-repeater-del-right mt-repeater-btn-inline">
												<i class="fa fa-close"></i>
											</a>
										</div>
									</div>
								</div>
								<a href="javascript:;" data-repeater-create="" class="btn btn-success mt-repeater-add">
									<i class="fa-solid fa-plus"></i> Add New Day Wise Itineary</a>
							</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mt-repeater">
								<div data-repeater-list="group_inclusion">
									<div data-repeater-item class="mt-repeater-item mt-overflow">
										<label class="control-label">Inclusion</label>
										<div class="mt-repeater-cell">
											<input  required type="text" name="inclusion" placeholder="Inclusion" class="form-control mt-repeater-input-inline">
											<a href="javascript:;" data-repeater-delete="" class="btn btn-danger mt-repeater-delete mt-repeater-del-right mt-repeater-btn-inline">
												<i class="fa fa-close"></i>
											</a>
										</div>
									</div>
								</div>
								<a href="javascript:;" data-repeater-create="" class="btn btn-success mt-repeater-add">
									<i class="fa-solid fa-plus"></i> Add </a>
							</div>
							</div>
	
						</div>
						<div class="row"> 
							<div class="col-md-6">
								<h4><strong>Hotel Details</strong></h4>
								<div class="form-group">
									<label class="control-label">Hotel Type</label>
									<input type="text" required  name="hotel_type" placeholder="Type" class="form-control">
								</div>	
							</div> 
						</div> 
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Start From</label>
									<input type="text" required name="hotel_price" placeholder="Price" class="form-control">
								</div>		
						</div>		
						</div>		
						
						
							<div class="margin-top-10">
								<input type="submit" value="Save Changes" class="btn green">
								<a href="javascript:;" class="btn default">Cancel </a>
							</div>
						</form>
													<div id="res"></div>
	
					</div>
				</div>
			</div>

	</div>
		<!-- END CONTENT BODY -->
	</div>
	<!-- END CONTENT -->
 
<script type="text/javascript">
// Ajax a Account 
jQuery(document).ready(function($) {
	var ajaxRstr;
	//$("#defalutTextTemplate").submit(function(e){
		$("#defalutTextTemplate").validate({
			submitHandler: function(){
			var response = $("#res");
			var formData = $("#defalutTextTemplate").serializeArray();
			console.log(formData);
			if (confirm("Are you sure to save changes ?")) {
				if (ajaxRstr) {
					ajaxRstr.abort();
				}
				ajaxRstr =	jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "newsletters/ajax_update_text_template",
					dataType: 'json',
					data: formData,
					beforeSend: function(){
						response.html('<p><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
					},
					success: function(res) {
						if (res.status == true){
							response.html('<div class="alert alert-success"><strong>Success! </strong>'+res.msg+'</div>');
							//console.log("done");
							location.reload();
						}else{
							response.html('<div class="alert alert-danger"><strong>Error! </strong>'+res.msg+'</div>');
							//console.log("error");
						}
					},
					error: function(){
						response.html('<div class="alert alert-danger"><strong>Error! </strong>Please Try again later! </div>');
					}
				});
			}	
		}	
		
	});	
});	
</script>
