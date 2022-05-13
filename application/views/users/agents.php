<!-- Begin page-container -->
<div class="page-container">
    <!-- Begin page-content-wrapper -->
    <div class="page-content-wrapper">
        <!-- Begin page-content -->
        <div class="page-content">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa-solid fa-users"></i> All Users
                    </div>
                    <a class="btn btn-primary float-end" href="<?php echo site_url("agents/addagent"); ?>"
                        title="add agent"><i class="fa-solid fa-plus"></i> Add User</a>

                    <!-- Show hide filter button -->
                    <button class="btn float-end me-2 p-2" title="Filter Users" type="button" data-bs-toggle="collapse"
                        data-bs-target="#filter_collapse" aria-expanded="false" aria-controls="filter_collapse">
                        <i class="fa-solid fa-filter fs-5"></i>
                    </button>
                </div>
            </div>

            <!-- Begin filter_collapse -->
            <div class="bg-white p-3 rounded-4 shadow-sm mb-4 collapse" id="filter_collapse">
                <?php 
               $ustatus = "";
               if( isset( $_GET['ustatus'] ) && !empty( $_GET['ustatus'] ) ){
                  $ustatus = $_GET['ustatus'];
               } ?>

                <form id="form-filter" class="form-horizontal mb-0">
                    <input type="hidden" name="filter_val" id="filter_val" value="">
                    <input type="hidden" name="userStatus_val" id="userStatus" value="">
                    <div class="filter_section">
                        <div id="filter"></div>
                        <div class="row">
                            <input type="hidden" id="ustatus" value="<?php echo $ustatus; ?>">
                            <div class="col-md-4 my-2">
                                <label class="control-label"><strong>Select User By Status:</strong></label>
                                <select name="userStatus" class='form-control mfilter'>
                                    <option value="">All Users</option>
                                    <option value="active">Active User</option>
                                    <option value="inactive">Inactive User</option>
                                    <option value="block">Block User</option>
                                </select>
                            </div>
                            <div class="col-md-4 my-2">
                                <label class="control-label"><strong>Select User By Role:</strong></label>
                                <select name="userFilter" class='form-control mfilter'>
                                    <option value="">All Roles</option>
                                    <?php if( get_all_users_role() ){
                                        $roles = get_all_users_role();
                                        foreach( $roles as $r ){
                                            if( $r->role_id == 99 ) continue;
                                            $role_name = ucfirst($r->role_name);
                                            echo "<option value='{$r->role_id}'>{$role_name}</option>";
                                        }
                                        } ?>
                                </select>
                            </div>
                            <div class="col-md-2 my-2">
                                <label for="" class="control-label d-block">&nbsp;</label>
                                <input type="submit" class="btn btn-success" value="Filter">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- End filter_collapse -->

            <!-- Begin demo table design -->
            <!-- <div class="bg-white p-3 rounded-4 shadow-sm mb-4">
                <div class="table-responsive">
                    <table class="table data-table-large users-table">
                        <tbody>
                            <tr>
                                <td class="w-25">
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="px-1 w-100 d-flex">
                                            <div class="user_thumbnail">
                                                <img src="./site/images/user_profile.jpg" alt="User Profile">
                                            </div>
                                            <p class="fs-7 mb-2 mt-0 ms-3"> 
                                                <strong class="d-block mb-1">
                                                        Abhishek Thakur <i class="fa-solid fa-circle text-success fs-8"></i>
                                                </strong> 
                                                <span class="fs-8 fw-500 text-secondary">Name</span>
                                            </p>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <span class="d-block fw-500 mb-1 fs-7 ms-1">
                                                7807997327 
                                            </span>
                                            <span class="d-block fw-500 fs-7 ms-1">
                                                jitender.chauhan@kavyanshtravels.com
                                            </span>
									    </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="w-100">
                                            <div class="px-2">
                                                <p class="fs-7 mb-2 mt-0 ">
                                                    <strong class="d-block mb-1">Abhishek_Thakur</strong>
                                                    <span class="fs-8 fw-500 text-secondary">User Name</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <strong class="d-block fs-7 mb-1 text-dark">Service Team</strong>
                                            <span class="fs-7 text-secondary">user role</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100 ">
                                        <div class="px-2 mb-2">
                                            <strong class="d-block fs-7 mb-1"> 
                                                07-May-2022 10:16:49 AM	
                                            </strong> 
                                            <span class="fs-8 fw-500 text-secondary"> Last Login </span>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="fs-7 mb-1 mt-0 text-secondary ms-1">User Status </p>
                                                    <span class="badge bg-success ms-1"><strong>Active</strong></span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fs-7 mb-1 mt-0 text-secondary ms-1">Update User Status </p>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="user1" checked>
                                                        <label class="form-check-label mt-1" for="user1">
                                                            Active/Inactive
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-ellipsis-vertical"></i></a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="">
                                            <li>
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i> View</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can"></i> Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-25">
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="px-1 w-100 d-flex">
                                            <div class="user_thumbnail">
                                                <img src="./site/images/userwithspecs.jpg" alt="User Profile">
                                            </div>
                                            <p class="fs-7 mb-2 mt-0 ms-3"> 
                                                <strong class="d-block mb-1">
                                                    Mukesh Sharma 
                                                </strong> 
                                                <span class="fs-8 fw-500 text-secondary">Name</span>
                                            </p>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <span class="d-block fw-500 mb-1 fs-7 ms-1">
                                                7807997330 
                                            </span>
                                            <span class="d-block fw-500 fs-7 ms-1">
                                                accounts@kavyanshtravels.com
                                            </span>
									    </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="w-100">
                                            <div class="px-2">
                                                <p class="fs-7 mb-2 mt-0 ">
                                                    <strong class="d-block mb-1">Mukesh_Sharma</strong>
                                                    <span class="fs-8 fw-500 text-secondary">User Name</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <strong class="d-block fs-7 mb-1 text-dark">Accounts Team</strong>
                                            <span class="fs-7 text-secondary">user role</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100 ">
                                        <div class="px-2 mb-2">
                                            <strong class="d-block fs-7 mb-1"> 
                                                14-March-2022 10:02:39 AM	
                                            </strong> 
                                            <span class="fs-8 fw-500 text-secondary"> Last Login </span>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="fs-7 mb-1 mt-0 text-secondary ms-1">User Status </p>
                                                    <span class="badge bg-default text-muted ms-1"><strong>Inactive</strong></span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fs-7 mb-1 mt-0 text-secondary ms-1">Update User Status </p>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="user2">
                                                        <label class="form-check-label mt-1" for="user2">
                                                            Active/Inactive
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-ellipsis-vertical"></i></a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="">
                                            <li>
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i> View</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can"></i> Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="w-25">
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="px-1 w-100 d-flex">
                                            <div class="user_thumbnail">
                                                <img src="./site/images/redgirlavatar.jpg" alt="User Profile">
                                            </div>
                                            <p class="fs-7 mb-2 mt-0 ms-3"> 
                                                <strong class="d-block mb-1">
                                                    Ayushi Chauhan <i class="fa-solid fa-circle text-danger fs-8"></i>
                                                </strong> 
                                                <span class="fs-8 fw-500 text-secondary">Name</span>
                                            </p>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <span class="d-block fw-500 mb-1 fs-7 ms-1">
                                                9882456933 
                                            </span>
                                            <span class="d-block fw-500 fs-7 ms-1">
                                                ayushi.chauhan@kavyanshtravels.com
                                            </span>
									    </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="w-100">
                                            <div class="px-2">
                                                <p class="fs-7 mb-2 mt-0 ">
                                                    <strong class="d-block mb-1">Ayushi_Chauhan</strong>
                                                    <span class="fs-8 fw-500 text-secondary">User Name</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <strong class="d-block fs-7 mb-1 text-dark">Sales Team</strong>
                                            <span class="fs-7 text-secondary">user role</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100 ">
                                        <div class="px-2 mb-2">
                                            <strong class="d-block fs-7 mb-1"> 
                                                05-May-2022 09:30:00 AM	
                                            </strong> 
                                            <span class="fs-8 fw-500 text-secondary"> Last Login </span>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="fs-7 mb-1 mt-0 text-secondary ms-1">User Status </p>
                                                    <span class="badge bg-success ms-1"><strong>active</strong></span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fs-7 mb-1 mt-0 text-secondary ms-1">Update User Status </p>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="user3" checked>
                                                        <label class="form-check-label mt-1" for="user3">
                                                            Active/Inactive
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-ellipsis-vertical"></i></a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="">
                                            <li>
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i> View</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can"></i> Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>      -->


            <div class="bg-white p-3 rounded-4 shadow-sm mb-4">
                <div class="table-responsive userData">
                    <?php
                if( !empty($list) ){
                ?>
                    <table class="table data-table-large users-table">
                        <tbody>
                            <?php
                        foreach ($list as $agent) {
                            //Get online offline status
                            $check_online_status = get_user_online_status( $agent->user_id );
                            $online_offline_status = !empty( $check_online_status ) ? 
                            '<i class="fa-solid fa-circle text-success fs-8"></i>' 
                            : '<i class="fa-solid fa-circle text-danger fs-8"></i>';
                            if($agent->user_type == 99){
                                $agent_type = "Administrator";
                            }elseif($agent->user_type == 98){
                                $agent_type = get_manager_type( $agent->is_super_manager );
                            }else{
                                $agent_type = get_role_name($agent->user_type);
                            }
                            ?>
                            <tr>
                                <td class="w-25">
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="px-1 w-100 d-flex">
                                            <div class="user_thumbnail">
                                                <img src="<?php echo site_url() . 'site/images/userprofile/' . $agent->user_pic; ?>" alt="User Profile">
                                            </div>
                                            <p class="fs-7 mb-2 mt-0 ms-3">
                                                <strong class="d-block mb-1">
                                                    <?= $agent->first_name . " " . $agent->last_name; ?>
                                                    <?= $online_offline_status ?>
                                                </strong>
                                                <span class="fs-8 fw-500 text-secondary">Name</span>
                                            </p>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <span class="d-block fw-500 mb-1 fs-7 ms-1">
                                                <?= $agent->mobile ?>
                                            </span>
                                            <span class="d-block fw-500 fs-7 ms-1">
                                                <?= $agent->email ?>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                        <div class="w-100">
                                            <div class="px-2">
                                                <p class="fs-7 mb-2 mt-0 ">
                                                    <strong class="d-block mb-1"><?= $agent->user_name ?></strong>
                                                    <span class="fs-8 fw-500 text-secondary">User Name</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <strong class="d-block fs-7 mb-1 text-dark"><?= $agent_type ?>m</strong>
                                            <span class="fs-7 text-secondary">user role</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="align-bottom align-content-between d-flex flex-wrap h-100 ">
                                        <div class="px-2 mb-2">
                                            <strong class="d-block fs-7 mb-1">
                                                <?= date("d-F-Y h:i:s a", strtotime($agent->last_login)); ?>
                                            </strong>
                                            <span class="fs-8 fw-500 text-secondary"> Last Login </span>
                                        </div>
                                        <div class="bg-light p-1 w-100">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <p class="fs-7 mb-1 mt-0 text-secondary ms-1">User Status </p>
                                                    <span
                                                        class="badge bg-success ms-1"><strong><?= ucfirst($agent->user_status) ?></strong></span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fs-7 mb-1 mt-0 text-secondary ms-1">Update User Status
                                                    </p>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input inSlider"  data-id ="<?= $agent->user_id ?>" type="checkbox" id="user1"
                                                        <?=$agent->user_status == "active" ? 'checked' : '' ?> >
                                                        <label class="form-check-label mt-1" for="user1">
                                                            <!-- Active/Inactive -->
                                                            <?= ucfirst($agent->user_status) ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
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
                                                    href="<?= site_url("agents/view/$agent->user_id")?>"><i
                                                        class="fa-solid fa-eye"></i> View</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                    href="<?=site_url("agents/editagent/$agent->user_id")  ?>"><i
                                                        class="fa-solid fa-pen-to-square"></i> Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item ajax_delete_user"   data-id ="<?= $agent->user_id ?>" href="#"><i class="fa-solid fa-trash-can"></i>
                                                    Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php
		                	}
			                ?>
                        </tbody>
                    </table>
                    <p><?php echo $links; ?></p>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- End end demo table design -->
        </div>
        <!-- End page-content -->
    </div>
    <!-- End page-content-wrapper -->
</div>
<!-- End page-container -->

<!-- Modal -->
<script type="text/javascript">
//    $(document).ready(function() {
//     // _this.parent().append(
//     //     '<p class="bef_send"><i class="fa fa-spinner fa-spin"></i> Please wait...</p>');
//     $.ajax({
//         type: "GET",
//         "url": "<?php echo site_url('agents/ajax_list')?>",
//     }).done(function(data) {
//         $(".userData").html(data);

//     }).error(function() {
//         $(".bef_send").hide();
//         $(".userData").html("Error! Please try again later!");
//     });
// });

jQuery(document).ready(function($) {
    $(document).on("click", ".ajax_delete_user", function() {
        var user_id = $(this).attr("data-id");
        //alert(user_id);
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
            $.ajax({
                url: "<?php echo base_url(); ?>" + "AjaxRequest/ajax_deleteUser?id=" + user_id,
                type: "GET",
                data: user_id,
                dataType: "json",
                cache: false,
                success: function(r) {
                    if (r.status = true) {
                        swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                });
                    } else {
                        alert("Error! Please try again.");
                    }
                }
            });
        }
    });
});
</script>
<script type="text/javascript">
var table;
$(document).ready(function() {
    //on change filter
    //  $(document).on('change', ".mfilter", function() {
    //      var val = $(this).find(":selected").val();
    //      $("#filter_val").val(val);
    //      console.log(val);
    //      //console.log(val);
    //  });
    $(document).on("change", 'select[name=userFilter]', function() {
        var filter_val = $(this).val();
        $("#filter_val").val(filter_val);
    });


    $(document).on("change", 'select[name=userStatus]', function() {
        var userStatus = $(this).val();
        $("#userStatus").val(userStatus);
        console.log(userStatus);
    });


    $("#form-filter").submit(function(e) {
        e.preventDefault();
        table.ajax.reload(null, true);
    });


    var table;
    var tableFilter;
    //datatables
    table = $('#table').DataTable({
        "aLengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, 'All']
        ],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        language: {
            search: "<strong>Search By User Id/User Name:</strong>",
            searchPlaceholder: "Search..."
        },
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('agents/ajax_list')?>",
            "type": "POST",
            "data": function(data) {
                data.filter = $("#filter_val").val();
                data.userStatus = $("#userStatus").val();
                //  data.from = $("#date_from").attr("data-date_from");
                //  data.end = $("#date_to").attr("data-date_to");
                //  data.todayStatus = $("#todayStatus").val();
                //  data.agent_id = $("#sales_user_id").val();
            },
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],

    });

});
</script>
<script>
jQuery(document).ready(function($) {
    $(document).on("click", '.inSlider', function() {
        var ajaxReq;
        //get review status
        if (!$(this).is(':checked')) {
            var chkVal = "inactive";
        } else {
            var chkVal = "active";
        }
        //get review id
        var id = $(this).attr("data-id");
        console.log(id);
        console.log(chkVal);
        if (ajaxReq) {
            ajaxReq.abort();
        }
        //ajax request to update status	
        ajaxReq = $.ajax({
            url: "<?php echo base_url(); ?>" + "agents/ajax_user_updateStatus",
            type: "POST",
            data: {
                "id": id,
                "ustatus": chkVal
            },
            dataType: 'json',
            cache: false,
            success: function(r) {
                if (r.status = true) {
                    location.reload();
                    console.log("ok" + r.msg);
                    //console.log(r.msg);
                } else {
                    alert("Error! Please try again.");
                }
            }
        });
    });
});
</script>