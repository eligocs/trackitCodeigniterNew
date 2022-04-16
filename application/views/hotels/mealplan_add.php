<div class="page-container customer_content">
    <div class="page-content-wrapper">
        <div class="page-content">
            <?php $message = $this->session->flashdata('error'); 
			if($message){ echo '<span class="help-block help-block-error1 red">'.$message.'</span>';} ?>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                    <i class="fa-solid fa-plus"></i> Add Mealplan
                    </div>
                    <a class="btn btn-outline-primary float-end" href="<?php echo site_url("hotels/mealplan"); ?>" title="Back"><i class="fa-solid fa-reply"></i> Back</a>
                </div>
            </div>
            <div class="portlet-body bg-white p-3 rounded-4 shadow-sm">
                <form class="mb-0" role="form" id="addMeal" method="post" action="<?php echo site_url("hotels/savemealplan"); ?>">
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-4 my-2">
                                <div class="form-group">
                                    <label class="control-label">Mealplan Name*</label>
                                    <input type="text" required placeholder="Mealplan Name. eg: Lunch,dinner."
                                        name="inp[name]" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="col-md-12 my-2">
                                <button type="submit" class="btn green uppercase add_roomcategory"><i class="fa-solid fa-plus"></i> Add Mealplan</button>
                            </div>
                        </div> <!-- row -->
                    </div>
                </form>
            </div>
        </div> 
        <!-- End page-content -->
    </div>
    <!-- End page-content-wrapper -->
</div>
<!-- End page-container -->


<script type="text/javascript">
jQuery(document).ready(function($) {
    $("#addMeal").validate();
});
</script>