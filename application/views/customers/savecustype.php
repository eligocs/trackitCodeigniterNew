<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-content">
            <?php echo validation_errors('<span class="help-block help-block-error1">', '</span>'); ?>
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <?php $message = $this->session->flashdata('success'); 
                if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>';}
                ?>
                    <!--error message-->
                    <?php $err = $this->session->flashdata('error'); 
                if($err){ echo '<span class="help-block help-block-error2 red">'.$err.'</span>';}
                ?>

            <!--redirect if user try to edit travel parter category-->
            <?php isset( $customer_type[0]->id ) && $customer_type[0]->id < 3 ? redirect("customers/customer_type") : ""; ?>

            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption"><i class="fa-solid fa-user"></i>Add/Edit Customer Type</div>
                    <a class="btn btn-outline-primary float-end" href="<?php echo site_url("customers/customer_type"); ?>"
                        title="Back"><i class="fa-solid fa-reply"></i> Back</a>
                </div>
            </div>

            <div class="portlet-body bg-white p-3 shadow-sm rounded-4">
                <form class="mb-0" role="form" id="addCat" method="post" action="<?php echo site_url("customers/updatecustomertype/" ); ?>">
                    <div class="row">
                        <div class="form-group col-md-4 my-2">
                            <label class="control-label">Customer Type <sup class="text-danger">*</sup></label>
                            <input type="text" name="customer_type" placeholder="Customer Type. eg: Travel Partner"
                                class="form-control"
                                value="<?php echo isset( $customer_type[0]->name ) ? $customer_type[0]->name : set_value('customer_type'); ?>" />
                        </div>
                        <div class="col-md-12 my-2">
                            <input type="hidden" name="id"
                                value="<?php echo isset( $customer_type[0]->id ) ? $customer_type[0]->id : set_value('id'); ?>">
                            <button type="submit" class="btn green uppercase add_agent">Add Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
    </div>
    <!-- page-container -->
</div>
