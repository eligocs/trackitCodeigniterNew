<div class="page-container customer_content">
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa-solid fa-plus"></i>Add Transporter:
                    </div>
                    <a class="btn btn-outline-primary float-end" href="<?php echo site_url("vehicles/transporters"); ?>"
                        title="Back"><i class="fa-solid fa-reply"></i> Back</a>
                </div>
            </div>
            <div class="portlet-body bg-white p-3 rounded-4 shadow-sm">
                <form role="form" id="addTranspoter">
                    <div class="row">
                        <div class="col-md-4 my-2">
                            <div class="form-group">
                                <label class="control-label">Transporter Name*:</label>
                                <input type="text" required placeholder="Transporter Name" name="trans_name"
                                    class="form-control" value="" />
                            </div>
                        </div>
                        <div class="col-md-4 my-2">
                            <div class="form-group">
                                <label class="control-label">Contact Number*:</label>
                                <input type="number" required placeholder="Contact Number" name="trans_contact"
                                    class="form-control" value="" />
                            </div>
                        </div>
                        <div class="col-md-4 my-2">
                            <div class="form-group">
                                <label class="control-label">Email Address*:</label>
                                <input type="email" required placeholder="Transpoter Email" name="trans_email"
                                    class="form-control" value="" />
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="control-label">Transporter Address:</label>
                                <textarea placeholder="Transpoter address" name="trans_address"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 my-2">
                            <div class="form-group">
                                <label class="control-label">Select Vehicles*:</label><span
                                    style="font-size: 10px; font-weight: bold;"> Press CTRL key to select multiple
                                    vehicles.</span>
                                <select required multiple name="trans_cars_list[]" class="form-control car_cat_trans">
                                    <?php $cars = get_car_categories(); 
									if( $cars ){
										foreach($cars as $car){
											echo '<option value = "'.$car->id .'" >'.$car->car_name.'</option>';
										}
									}else{
										echo '<option value="">No Vehicles availables. </option>';
									}
								?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <button type="submit" class="btn green uppercase add_trans"><i class="fa-solid fa-plus"></i> 
                            Add Transpoter</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End Portlet-body -->
        </div> 
        <!-- End page-content -->
        <div id="addresEd"></div>
    </div>
    <!-- END page-content-wrapper -->
</div>
<!-- End page-container -->


<script type="text/javascript">
jQuery(document).ready(function($) {
    var ajaxReq;
    $("#addTranspoter").validate({
        submitHandler: function(form) {
            var formData = $("#addTranspoter").serializeArray();
            var resp = $("#addresEd");

            //console.log(formData);
            if (ajaxReq) {
                ajaxReq.abort();
            }
            ajaxReq = $.ajax({
                type: "POST",
                url: "<?php echo base_url('AjaxRequest/addTranspoter'); ?>",
                dataType: 'json',
                data: formData,
                beforeSend: function() {
                    resp.html(
                        '<p><i class="fa fa-spinner fa-spin"></i> Please wait...</p>'
                        );
                },
                success: function(res) {
                    if (res.status == true) {
                        resp.html(
                            '<div class="alert alert-success"><strong>Success! </strong>' +
                            res.msg + '</div>');
                        //console.log("done");
                        $("#addTranspoter")[0].reset();
                        window.location.href =
                            "<?php echo site_url("vehicles/transporterview/");?>" + res
                            .tra_id;
                    } else {
                        resp.html(
                            '<div class="alert alert-danger"><strong>Error! </strong>' +
                            res.msg + '</div>');
                        //console.log("error");
                    }
                },
                error: function(e) {
                    //console.log(e);
                    resp.html(
                        '<div class="alert alert-danger"><strong>Error!</strong>Please Try again later! </div>'
                        );
                }
            });
            return false;
        }
    });
});
</script>