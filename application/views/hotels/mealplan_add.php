<div class="page-container customer_content">
    <div class="page-content-wrapper">
        <div class="page-content">
            <?php $message = $this->session->flashdata('error'); 
			if($message){ echo '<span class="help-block help-block-error1 red">'.$message.'</span>';} ?>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-plus"></i>Add Mealplan
                    </div>
                    <a class="btn btn-success" href="<?php echo site_url("hotels/mealplan"); ?>" title="Back">Back</a>
                </div>
            </div>
            <div class="second_custom_card">
                <form role="form" id="addMeal" method="post" action="<?php echo site_url("hotels/savemealplan"); ?>">
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
                                <button type="submit" class="btn green uppercase add_roomcategory">Add Mealplan</button>
                            </div>
                        </div> <!-- row -->
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>


<script type="text/javascript">
jQuery(document).ready(function($) {
    $("#addMeal").validate();
});
</script>