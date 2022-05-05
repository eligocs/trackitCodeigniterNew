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
            <?php
                if( isset( $_GET["todayStatus"] ) ){	
                    $todayStatus = $_GET["todayStatus"];
                    $first_day_this_month = $todayStatus; 
                    $last_day_this_month  = $todayStatus;
                    $hideClass = "hideFilter";
                }else{
                    $todayStatus = "";
                    $first_day_this_month = ""; 
                    $last_day_this_month  = "";
                    $hideClass = "";
                }
            ?>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa-solid fa-money-check-dollar"></i> All Payments
                    </div>

                    <!-- Show hide filter button -->
                    <button  class="btn float-end me-2 p-2" title="Filter Payments" type="button" data-bs-toggle="collapse" data-bs-target="#filter_collapse" aria-expanded="false" aria-controls="filter_collapse">
                        <i class="fa-solid fa-filter fs-5"></i>
                    </button>
                </div>
            </div>

            <!--start filter form-->
            <div class="bg-white p-3 rounded-4 shadow-sm mb-4 collapse" id="filter_collapse">
                <form id="form-filter" class="form-horizontal mb-0 <?php echo $hideClass; ?>">
                    <div class="actions">
                        <div class="row">
                            <div class="col-xl-3 col-md-4 my-2">
                                <div class="form-group">
                                    <label class="control-label">Filter: </label>
                                    <input type="text" class="form-control" id="daterange" autocomplete="off" name="dateRange" value="" required />
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-4 my-2">
                                <div class="fillter_box form-group">
                                    <label class="control-label" for="">Payment Status</label>
                                    <select name="filter" id="" class="form-control">
                                        <option  value="all" id="all">All</option>
                                        <option  value="pay_received" id="received">Received</option>
                                        <option  value="complete" id="complete">Complete</option>
                                        <option  value="refund" id="refund">Refund </option>
                                        <option  value="travel_date" id="travel_date">TD</option>
                                        <option  value="pm_ci" id="pm_ci">Closed</option>
                                        <option  value="pm_oi" id="pm_oi">Open</option>
                                        <option title="Pending Payment Confirmation"
                                            value="pending_confirm" id="pending_confirm">PPC</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-4 my-2">
                                <input type="hidden" name="date_from" id="date_from" data-date_from="<?php if( isset( $_GET['leadfrom'] ) ){ echo $_GET['leadfrom'] ; }else {echo $first_day_this_month; } ?>"
                                    value="">
                                <input type="hidden" name="date_to" id="date_to" data-date_to="<?php if( isset( $_GET['leadto'] ) ){ echo $_GET['leadto'] ; }else{ echo $last_day_this_month; } ?>" value="">
                                <input type="hidden" name="filter_val" id="filter_val" value="<?php if( isset( $_GET['payStatus'] ) ){ echo $_GET['payStatus']; }else{ echo "all";	} ?> ">
                                <input type="hidden" name="todayStatus" id="todayStatus" value="<?php echo $todayStatus; ?>">
                                <label class="d-none d-md-block control-label" for="">&nbsp;</label>
                                <input type="submit" class="btn btn-success" value="Filter">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!--End filter form-->

            <!-- Begin portlet-body -->
            <div class="portlet-body">
                <div class="bg-white rounded-4 p-3 shadow-sm">
                    <div class="table-responsive">
                        <table id="payments" class="table table-striped">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Iti ID </th>
                                    <th> Type </th>
                                    <th> Customer Name </th>
                                    <th> Customer Contact </th>
                                    <th> Package Cost </th>
                                    <th> Balance</th>
                                    <th> Next Due Date</th>
                                    <th> Status</th>
                                    <th> Action </th>
                                    <th> Pay. Confirm Status </th>
                                    <th> TD </th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="loader"></div>
                                <div id="res"></div>
                                <!--DataTable Goes here-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End portlet-body -->
        </div>
        <!-- End page-content -->
    </div>
    <!-- End page-content-wrapper -->
</div>
<!-- End page-container -->


<div id="myModal" class="modal" role="dialog"></div>
<script type="text/javascript">
var table;
$(document).ready(function() {
    //UPDATE CONFIRM PAYMENT STATUS
    $(document).on("click", '.is_payment_confirmed', function() {
        var _this = $(this);
        var ajaxReq;
        //get review id
        var id = $(this).attr("data-id");
        swal({
            buttons: {
                cancel: true,
                confirm: true,
            },
            title: "Are you sure to Update Payment Confirm Status?",
            text: "",
            icon: "warning",
            confirmButtonClass: "btn-danger",
            confirmButton: "Yes, Update it!",
            cancelButton: "No, cancel!",
            closeModal: false,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "<?php echo base_url(); ?>" +
                        "payments/ajax_payment_confirm_updateStatus",
                    type: "POST",
                    data: {
                        "id": id
                    },
                    dataType: 'json',
                    success: function(res) {
                        if (res.status == true) {
                            swal("Updated!", res.msg, "success");
                        } else {
                            swal("Error!", "Something went wrong!", "danger");
                        }
                        location.reload();
                    },
                    error: function(err) {
                        swal("Error!", "Something went wrong!", "danger");
                    }
                });
            } else {
                swal("Cancelled!", "Action Cancelled!", "success");
                _this.attr('checked', false);
            }
        });
    });

    var table;
    var tableFilter;
    //Custom Filter
    $("#form-filter").validate({
        rules: {
            filter: {
                required: true
            },
            dateRange: {
                required: true
            },
        },
    });
    $("#form-filter").submit(function(e) {
        e.preventDefault();
        table.ajax.reload(null, true);
    });

    $(document).on("change", 'select[name=filter]', function() {
        var filter_val = $(this).val();
        $("#filter_val").val(filter_val);
        console.log(filter_val);
    });

    //datatables
    table = $('#payments').DataTable({
        "aLengthMenu": [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, 'All']
        ],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        language: {
            search: "<strong>Search By Iti id/customer name:</strong>",
            searchPlaceholder: "Search..."
        },

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('payments/ajax_payments_list')?>",
            "type": "POST",
            "data": function(data) {
                data.filter = $("#filter_val").val();
                data.from = $("#date_from").attr("data-date_from");
                data.end = $("#date_to").attr("data-date_to");
                data.todayStatus = $("#todayStatus").val();
            },
            beforeSend: function() {
                console.log("sending....");
            }
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],

    });
});
</script>

<script type="text/javascript">
jQuery(document).ready(function($) {
    var date_from = $("#date_from").attr("data-date_from");
    if (date_from != "") {
        $('#daterange').val($("#date_from").attr("data-date_from") + '-' + $("#date_to").attr("data-date_to"));
    } else {
        $('#daterange').val("");
    }
    //Date range
    $("#daterange").daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            autoUpdateInput: false,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Next 30 Days': [moment(), moment().add(30, 'days')],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ],
                'Last Three Month': [moment().subtract(3, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')],
                'Next Three Month': [moment().add(1, 'month').startOf('month'), moment().add(3, 'month')
                    .endOf('month')
                ]
            },
        },
        function(start, end, label) {
            //$('#daterange').val( start.format('YYYY-MM-DD') + '-' +  end.format('YYYY-MM-DD')  );
            $('#daterange').val(start.format('D MMMM, YYYY') + ' to ' + end.format('D MMMM, YYYY'));
            //$('#daterange').val( start.format('YYYY-MM-DD') + '-' +  end.format('YYYY-MM-DD')  );
            $("#date_from").attr("data-date_from", start.format('YYYY-MM-DD'));
            $("#date_to").attr("data-date_to", end.format('YYYY-MM-DD'));
            $("#todayStatus").val("");
            console.log("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format(
                'YYYY-MM-DD'));
        });
});
</script>