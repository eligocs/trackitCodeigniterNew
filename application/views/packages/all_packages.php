<!-- Begin page-container -->
<div class="page-container">
    <!-- Begin page-content-wrapper -->
    <div class="page-content-wrapper">
        <!-- Begin page-content -->
        <div class="page-content">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <?php $message = $this->session->flashdata('success'); 
				if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>';}
			?>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-users"></i>All Packages
                    </div>
                    <a class="btn btn-primary float-end" href="<?php echo site_url("packages/add"); ?>"
                        title="Add Package"><i class="fa-solid fa-plus"></i> Add Package</a>

                    <!-- Show hide filter button -->
                    <button class="btn float-end me-2 p-2 " title="Filter Packages" type="button"
                        data-bs-toggle="collapse" data-bs-target="#filter_collapse" aria-expanded="false"
                        aria-controls="filter_collapse">
                        <i class="fa-solid fa-filter fs-5"></i>
                    </button>
                </div>
            </div>

            <!--Begin filter section-->
            <div class="cat_wise_filter bg-white p-3 rounded-4 shadow-sm mb-4 collapse" id="filter_collapse">
                <form class="mb-0" role="form" id="filter_frm" method="post">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-sm-6 my-2">
                            <label class="control-label">State</label>
                            <div class="form-group">
                                <select name='state' class='form-control' id='stateID'>
                                    <option value="">All States</option>
                                    <?php $state_list = get_indian_state_list(); 
									if( $state_list ){
										foreach($state_list as $state){
											echo '<option value="'.$state->id.'">'.$state->name.'</option>';
										}
									} ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-sm-6 my-2">
                            <label class="control-label">Package Category </label>
                            <div class="form-group">
                                <select name="p_cat_id" id="cat_id" class="form-control">
                                    <option value="">All Package Category</option>
                                    <?php 
									$cats = get_package_categories();
									if( $cats ){
									foreach($cats as $cat){
										echo '<option value = "'.$cat->p_cat_id .'" >'.$cat->package_cat_name.'</option>';
										}
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 my-2">
                            <label class="control-label d-none d-lg-block" for="">&nbsp;</label>
                            <button type="submit" class="btn btn-success uppercase add_user"><i
                                    class="fa-solid fa-filter"></i> Filter</button>
                            <a href="javascript:void(0);" class="btn btn-success uppercase reset_filter"><i
                                    class="fa fa-refresh"></i> Reset</a>
                        </div>
                    </div>
                </form>
                <div class="res"></div>
            </div>
            <!-- End filter section -->


            <!-- Begin  design -->
            <div class="bg-white p-3 rounded-4 shadow-sm mb-4">
                <div class="table-responsive">
                    <?php
					if(!empty($list)){

						?>
                    <table class="table data-table-large">
                        <tbody>
                            <?php
								foreach($list as $package){
								$package_id = $package->package_id;
								$key = $package->temp_key;
								$pub_status = $package->publish_status;
								//get publish status
									if( $pub_status == "publish" ){
										$p_status = '<span class="badge bg-success"><strong>' . ucfirst($pub_status) . '</strong></span>';											
									}else{
										$p_status = '<span class="badge bg-danger">
										<strong>' . ucfirst($pub_status) . '</strong>
										</span>';
									}
								?>
                            <tr>
                                <td class="tour_thumbnail">
                                    <div>
                                        <img src="<?= site_url() . 'site/images/tour_thumbnail/' . $package->thumbimg; ?>" class="img-thumbnail">
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="px-1 w-100 ">
                                            <p class="fs-7 mb-2 mt-0">
                                                <strong class="d-block"><?=  ucfirst($package->package_name) ?></strong>
                                                <span class="fs-8 fw-500 text-secondary">Package Name</span>
                                            </p>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <div class="p-1">
                                                <p class="fs-7 mb-1 mt-0 text-secondary"> Category </p>
                                                <div>
                                                    <strong
                                                        class="fs-7"><?= get_package_cat_name($package->p_cat_id) ?></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="px-1 w-100">
                                            <p class="fs-7 mb-2 mt-0">
                                                <strong
                                                    class="d-block"><?=  get_state_name($package->state_id) ?></strong>
                                                <span class="fs-8 fw-500 text-secondary">Package State</span>
                                            </p>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <span class="d-block fs-7 mb-2 text-muted">Puplish Status</span>
                                            <?= $p_status ?>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100 text-nowrap">
                                        <div class="px-2 mb-2">
                                            <strong class="d-block fs-7 mb-1">Abhishek Sharma</strong>
                                            <span class="fs-8 fw-500 text-secondary">Created by</span>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <span class="d-block fs-7 mb-2 text-muted">Created On</span>
                                            <span
                                                class="fs-7"><strong><?=  date("d-F-Y h:s A", strtotime( $package->created )); ?></strong></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="px-2 mb-2">
                                            <strong class="d-block"> <i class="fa-solid fa-indian-rupee-sign"></i>
                                               <?= $package->pakage_starting_cost ?> </strong>
                                            <span class="fs-8 fw-500 text-secondary">Package Starting Cost(PP)</span>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <button class="btn btn-sm btn-success ms-2 mt-2">
                                                <i class="fa-solid fa-file-pdf"></i> PDF
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false"> <i
                                                class="fa-solid fa-ellipsis-vertical"></i></a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="<?= site_url("packages/edit/{$package_id}/{$key}") ?>"><i
                                                        class="fa-solid fa-pen-to-square"></i> Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="<?= site_url("packages/view/{$package_id}/{$key}") ?>"><i
                                                        class="fa-solid fa-eye"></i> View</a>
                                            </li>
                                            <?php
											//delete Package button only for admin
											if( $pub_status == "publish" ){
												if( ( is_admin() || is_manager() ) ){ 
											?>
                                            <a class="dropdown-item ajax_delete_package" data-id="<?= $package_id ?>"
                                                href="javascript:void(0)"><i class="fa-solid fa-trash-can"></i>
                                                Delete</a>
                                            <?php
												}else{ 
											?>
                                            <a class="dropdown-item delete_package_permanent"
                                                data-id="<?= $package_id ?>" href="#javascript:void(0)"><i
                                                    class="fa-solid fa-trash-can"></i>
                                                Delete</a>
                                            <?php
												}	
											}
											?>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php
								}
							?>
                        </tbody>
                    </table>
                    <?php
						}
					?>
                </div>
            </div>
            <!-- End table design -->

            <!-- Begin demo table design -->
            <div class="bg-white p-3 rounded-4 shadow-sm mb-4">
                <div class="table-responsive">
                    <table class="table data-table-large">
                        <tbody>
                            <tr>
                                <td class="tour_thumbnail">
                                    <div>
                                        <img src="./site/images/tour_thumbnail.jpg" class="img-thumbnail">
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="px-1 w-100 ">
                                            <p class="fs-7 mb-2 mt-0">
                                                <strong class="d-block">Shimla and Manali Group Tour</strong>
                                                <span class="fs-8 fw-500 text-secondary">Package Name</span>
                                            </p>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <div class="p-1">
                                                <p class="fs-7 mb-1 mt-0 text-secondary"> Category </p>
                                                <div>
                                                    <strong class="fs-7">Honeymoon Package by Volvo</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="px-1 w-100">
                                            <p class="fs-7 mb-2 mt-0">
                                                <strong class="d-block">Andhra Pradesh</strong>
                                                <span class="fs-8 fw-500 text-secondary">Package State</span>
                                            </p>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <span class="d-block fs-7 mb-2 text-muted">Puplish Status</span>
                                            <span class="badge bg-danger">
                                                <strong>Draft</strong>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100 text-nowrap">
                                        <div class="px-2 mb-2">
                                            <strong class="d-block fs-7 mb-1">Abhishek Sharma</strong>
                                            <span class="fs-8 fw-500 text-secondary">Created by</span>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <span class="d-block fs-7 mb-2 text-muted">Created On</span>
                                            <span class="fs-7"><strong>02-May-2022 11:48 PM</strong></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="px-2 mb-2">
                                            <strong class="d-block"> <i class="fa-solid fa-indian-rupee-sign"></i>
                                                3000.00 </strong>
                                            <span class="fs-8 fw-500 text-secondary">Package Cost</span>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <button class="btn btn-sm btn-success ms-2 mt-2">
                                                <i class="fa-solid fa-file-pdf"></i> PDF
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false"> <i
                                                class="fa-solid fa-ellipsis-vertical"></i></a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="">
                                            <li>
                                                <a class="dropdown-item" href="#"><i
                                                        class="fa-solid fa-pen-to-square"></i> Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i>
                                                    View</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can"></i>
                                                    Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tour_thumbnail">
                                    <div>
                                        <img src="./site/images/logo1651577144.png" class="img-thumbnail">
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="px-1 w-100 ">
                                            <p class="fs-7 mb-2 mt-0">
                                                <strong class="d-block">Golden Himachal Tour With Amritsar</strong>
                                                <span class="fs-8 fw-500 text-secondary">Package Name</span>
                                            </p>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <div class="p-1">
                                                <p class="fs-7 mb-1 mt-0 text-secondary"> Category </p>
                                                <div>
                                                    <strong class="fs-7">Honeymoon Package by Cab</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="px-1 w-100">
                                            <p class="fs-7 mb-2 mt-0">
                                                <strong class="d-block">Himachlal Pradesh</strong>
                                                <span class="fs-8 fw-500 text-secondary">Package State</span>
                                            </p>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <span class="d-block fs-7 mb-2 text-muted">Puplish Status</span>
                                            <span class="badge bg-success">
                                                <strong>Published</strong>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100 text-nowrap">
                                        <div class="px-2 mb-2">
                                            <strong class="d-block fs-7 mb-1">Mr.Admin</strong>
                                            <span class="fs-8 fw-500 text-secondary">Created by</span>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <span class="d-block fs-7 mb-2 text-muted">Created On</span>
                                            <span class="fs-7"><strong>05-May-2022 03:26 PM</strong></span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="px-2 mb-2">
                                            <strong class="d-block"> <i class="fa-solid fa-indian-rupee-sign"></i>
                                                25000.00 </strong>
                                            <span class="fs-8 fw-500 text-secondary">Package Cost</span>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <button class="btn btn-sm btn-success ms-2 mt-2">
                                                <i class="fa-solid fa-file-pdf"></i> PDF
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-bs-toggle="dropdown" aria-expanded="false"> <i
                                                class="fa-solid fa-ellipsis-vertical"></i></a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="">
                                            <li>
                                                <a class="dropdown-item" href="#"><i
                                                        class="fa-solid fa-pen-to-square"></i> Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i>
                                                    View</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can"></i>
                                                    Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End end demo table design -->
        </div>
        <!-- End page-content -->
    </div>
    <!-- End page-content-wrapper -->
</div>
<!-- End page-container -->
</div>

<div id="myModal" class="modal" role="dialog"></div>
<!-- Modal -->



<script type="text/javascript">
//update package del status
jQuery(document).ready(function($) {
    $(document).on("click", ".ajax_delete_package", function() {
        var id = $(this).attr("data-id");
        if (confirm("Are you sure?")) {
            $.ajax({
                url: "<?php echo base_url(); ?>" + "packages/update_del_status_package?id=" +
                    id,
                type: "GET",
                data: id,
                dataType: 'json',
                cache: false,
                success: function(r) {
                    if (r.status = true) {
                        location.reload();
                        //console.log("ok" + r.msg);
                        //console.log(r.msg);
                    } else {
                        alert("Error! Please try again.");
                    }
                }
            });
        }
    });
    //delete permanently Draft Itineraries
    $(document).on("click", ".delete_package_permanent", function() {
        var id = $(this).attr("data-id");
        if (confirm("Are you sure?")) {
            $.ajax({
                url: "<?php echo base_url(); ?>" + "packages/delete_package_permanently?id=" +
                    id,
                type: "GET",
                data: id,
                dataType: 'json',
                cache: false,
                success: function(r) {
                    if (r.status = true) {
                        location.reload();
                        //console.log("ok" + r.msg);
                        //console.log(r.msg);
                    } else {
                        alert("Error! Please try again.");
                    }
                }
            });
        }
    });
});
</script>