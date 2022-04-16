<div class="page-container customer_content">
    <div class="page-content-wrapper">
        <div class="page-content">
            <?php $mealplan = $mealplans[0]; 
				if( !empty( $mealplan ) ){	?>
            <?php $message = $this->session->flashdata('error'); 
				if($message){ echo '<span class="help-block help-block-error1 red">'.$message.'</span>';} ?>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                    <i class="fa-solid fa-pen-to-square"></i> Edit Mealplan
                    </div>
                    <a class="btn btn-outline-primary float-end" href="<?php echo site_url("hotels/mealplan"); ?>" title="Back"><i class="fa-solid fa-reply"></i> Back</a>
                </div>
            </div>
            <div class="bg-white p-3 rounded-4 shadow-sm">
                <form class="mb-0" role="form" id="editMeal" method="post" action="<?php echo site_url("hotels/updatemealplan"); ?>">
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <div class="form-group">
                                    <label class="control-label">Mealplan Name*</label>
                                    <input type="text" required placeholder="Meal Plan Name. eg: Breakfast,dinner etc."
                                        name="inp[name]" class="form-control" value="<?php echo $mealplan->name; ?>" />
                                </div>
                            </div>
                            <input type="hidden" name="inp[id]" class="form-control" value="<?php echo $mealplan->id; ?>" />
                            <div class="col-md-12 my-2">
                                <button type="submit" class="btn green uppercase add_roomcategory">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
        <!-- End page-content -->
        <?php }else{
        redirect("hotels/mealplan");
        }	?>
    </div>  
    <!-- End page-content-wrapper -->
</div>
<!-- End page-container -->
</div>


<!-- Modal -->

<script type="text/javascript">
jQuery(document).ready(function($) {
    $("#editMeal").validate();
});
</script>