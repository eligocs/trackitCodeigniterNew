<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div id="messageres"></div>
            <!--Show success message if hotel edit/add -->
            <?php $message = $this->session->flashdata('success'); 
            if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>'; }
            ?>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                    <i class="fa-solid fa-truck-arrow-right"></i> View All Transporters
                    </div>
                    <a class="btn btn-primary float-end" href="<?php echo site_url("vehicles/transporteradd"); ?>"
                        title="Add Transporter"><i class="fa-solid fa-plus"></i> Add Transporter</a>
                </div>
            </div>
            <div class="portlet-body bg-white p-3 rounded-4 shadow-sm">
                <div class="table-responsive margin-top-20">
                    <table id="trans" class="table table-striped display">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Transporter Name </th>
                                <th> Email</th>
                                <th> Contact</th>
                                <th> Address</th>
                                <th> Vehicles</th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--data table goes here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End page-content -->
    </div>
    <!-- End page-content-wrapper -->
</div>
<!-- End page-container -->

<!-- Modal -->
<script type="text/javascript">
jQuery(document).ready(function($) {
    var resp = $("#addresEd");
    $(document).on("click", ".ajax_delete_trans", function() {
        var id = $(this).attr("data-id");
        if (confirm("Are you sure?")) {
            $.ajax({
                url: "<?php echo base_url(); ?>" + "AjaxRequest/ajax_deletetrans?id=" + id,
                type: "GET",
                data: id,
                dataType: "json",
                cache: false,
                success: function(r) {
                    console.log("error");
                    if (r.status = true) {
                        location.reload();
                        console.log("ok" + r.msg);
                    } else {
                        resp.html(
                            '<div class="alert alert-danger"><strong>Error! </strong>' +
                            r.msg + '</div>');
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
    //datatables
    table = $('#trans').DataTable({
        "aLengthMenu": [
            [5, 10, 50, 100, -1],
            [5, 10, 50, 100, 'All']
        ],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
        language: {
            search: "<strong>Search By Transporter Name:</strong>",
            searchPlaceholder: "Search..."
        },
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('vehicles/ajax_trans_list')?>",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],

    });
});
</script>