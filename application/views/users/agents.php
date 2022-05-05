<!-- Begin page-container -->
<div class="page-container">
    <!-- Begin page-content-wrapper -->
    <div class="page-content-wrapper">
        <!-- Begin page-content -->
        <div class="page-content">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                    <i class="fa-solid fa-users"></i> All Users
                    </div>
                    <a class="btn btn-primary float-end" href="<?php echo site_url("agents/addagent"); ?>" title="add agent"><i class="fa-solid fa-plus"></i> Add User</a>
                    
                    <!-- Show hide filter button -->
                    <button  class="btn float-end me-2 p-2" title="Filter Users" type="button" data-bs-toggle="collapse" data-bs-target="#filter_collapse" aria-expanded="false" aria-controls="filter_collapse">
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
                                <select name = "userStatus" class='form-control mfilter'>
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

            <!-- Begin portlet-body -->
            <div class="portlet-body bg-white p-3 rounded-4 shadow-sm">
                <div class="table-responsive">
                    <table class="table table-striped display" id="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Name </th>
                                <th> User Name </th>
                                <th> User Role </th>
                                <th> Email </th>
                                <th> Mobile </th>
                                <th> User Status </th>
                                <th> Action </th>
                                <th> Update Status </th>
                                <th> Last Login </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--Data table -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End portlet-body -->
        </div>
        <!-- End page-content -->
    </div>
    <!-- End page-content-wrapper -->
</div>
<!-- End page-container -->

<!-- Modal -->
<script type="text/javascript">
jQuery(document).ready(function($) {
    $(document).on("click", ".ajax_delete_user", function() {
        var user_id = $(this).attr("data-id");
        //alert(user_id);
        if (confirm("Are you sure?")) {
            $.ajax({
                url: "<?php echo base_url(); ?>" + "AjaxRequest/ajax_deleteUser?id=" + user_id,
                type: "GET",
                data: user_id,
                dataType: "json",
                cache: false,
                success: function(r) {
                    if (r.status = true) {
                        location.reload();
                        console.log("ok" + r.msg);
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



     //Custom Filter
   //   $("#form-filter").validate({
   //      rules: {
   //          filter: {
   //              required: true
   //          },
   //          dateRange: {
   //              required: true
   //          },
   //      },
   //  });

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

    //datatables
   //  table = $('#table').DataTable({
   //      "aLengthMenu": [
   //          [10, 25, 50, 100, -1],
   //          [10, 25, 50, 100, 'All']
   //      ],
   //      "processing": true, //Feature control the processing indicator.
   //      "serverSide": true, //Feature control DataTables' server-side processing mode.
   //      "order": [], //Initial no order
   //      language: {
   //          search: "<strong>Search By User name/Email Id:</strong>",
   //          searchPlaceholder: "Search..."
   //      },
   //      // Load data for the table's content from an Ajax source
   //      "ajax": {
   //          "url": "<?php echo site_url('agents/ajax_list')?>",
   //          "type": "POST"
   //      },

   //      //Set column definition initialisation properties.
   //      "columnDefs": [{
   //          "targets": [0], //first column / numbering column
   //          "orderable": false, //set not orderable
   //      }, ],

   //  });

});
</script>
<script>
jQuery(document).ready(function($) {
    $(document).on("click", '#inSlider', function() {
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