<div class="page-container">
	<div class="page-content-wrapper">
		<div class="page-content">
			<form role="form" id="addCat" method="post">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption"><i class="fa-solid fa-user"></i>Add Category</div>
					<a class="btn btn-outline-primary float-end" href="<?php echo site_url("marketing/viewcat"); ?>" title="Back"><i class="fa-solid fa-reply"></i> Back</a>
				</div>
			</div>
			<div class="portlet-body bg-white p-3 rounded-4 shadow-sm">
				<div class="row">
					<div class="col-md-4 my-2">
						<div class="form-group">
							<label class="control-label">Category Name*</label>
							<input  required type="text" name="category_name" placeholder="Category Name" class="form-control" value="" /> 
						</div>
					</div>
					<div class="col-md-12 my-2">
						<!--input type="hidden" name="added_by" value="<?php //echo $user_id; ?>"-->
						<button type="submit" class="btn green uppercase add_agent">Add Category</button>
					</div>
				</div>
				</form>
			</div>
			<!--End portlet body -->
		</div> <!-- portlet -->
		<div id="addresEd"></div>		
	</div>
	<!-- END page-content-wrapper -->
</div>
<!-- End page-container -->

<!-- Modal -->
<script type="text/javascript">
jQuery(document).ready(function($){
	var form = $("#addCat");
	var ajaxReq;
	$("#addCat").validate({
		rules: {
			category_name: {
			  required: true,
			},

		},
		submitHandler: function(form) {
			var resp = $("#addresEd");
			var formData = $("#addCat").serializeArray();
			//console.log(formData);
			if (ajaxReq) {
					ajaxReq.abort();
				}
				ajaxReq = $.ajax({
				type: "POST",
				url: "<?php echo base_url('AjaxRequest/ajaxAddCat'); ?>" ,
				dataType: 'json',
				data: formData,
				beforeSend: function(){
					resp.html('<p><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
				},
				success: function(res) {
					if (res.status == true){
						resp.html('<div class="alert alert-success"><strong>Success! </strong>'+res.msg+'</div>');
						//console.log("done");
						 $("#addCat")[0].reset();
						window.location.href = "<?php echo site_url("marketing/viewcat");?>"; 
					}else{
						resp.html('<div class="alert alert-danger"><strong>Error! </strong>'+res.msg+'</div>');
						console.log("error");
					}
				},
				error: function(e){
						console.log(e);
					//response.html('<div class="alert alert-danger"><strong>Error!</strong>Please Try again later! </div>');
				}
			});
			return false;
		}
	});	
}); 
</script>
