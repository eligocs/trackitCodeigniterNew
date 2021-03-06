<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <?php $message = $this->session->flashdata('success'); 
            if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>';}
            
            ?>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa-solid fa-building-columns"></i> All Banks
                    </div>
                    <a class="btn btn-primary float-end" href="<?php echo site_url("bank/add"); ?>" title="Add Bank Details"><i class="fa-solid fa-plus"></i> Add Bank</a>
                </div>
            </div>
            <div class="portlet-body bg-white p-3 rounded-4 shadow-sm">
                <div class="table-responsive">
                    <table class="table table-striped display white_space_fix">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Bank Name</th>
                                <th> Payee Name </th>
                                <th> Account Type </th>
                                <th> Account Number </th>
                                <th> Branch Address</th>
                                <th> IFSC Code</th>
                                <th> Edit </th>
                                <th> Delete </th>
                            </tr>
                        </thead>
                        <tbody>
                            <div id="res"></div>
                            <?php 
                        if($banks){
                        
                        	$i = 1;
                        
                        	foreach($banks as $bank) {
                        
                        	echo " 
                        
                        		<tr data-id={$bank->bank_id}>
                        
                        			<td> {$i} </td>
                        
                        			<td> {$bank->bank_name}</td>
                        
                        			<td> {$bank->payee_name } </td>
                        
                        			<td> {$bank->account_type} </td>
                        
                        			<td> {$bank->account_number}</td>
                        
                        			<td> {$bank->branch_address}</td>
                        
                        			<td> {$bank->ifsc_code}</td>
                        
                        			<td><a href=" . site_url("bank/edit/{$bank->bank_id}") . " class='btn_pencil ajax_edit_hotel_table' ><i class='fa-solid fa-pen-to-square'></i></a></td>
                        
                        			<td><a href='javascript:void(0)' class='btn_trash ajax_delete_bank'><i class='fa-solid fa-trash-can'></i></a></td>
                        
                        		</tr>";
                        
                        		$i++; 
                        
                        	}	
                        
                        }else{
                        
                        	echo "<tr><td colspan='9'>No Banks Found !</td></tr>";
                        
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- Modal -->
<script type="text/javascript">
jQuery(document).ready(function($) {

    $(".ajax_delete_bank").click(function() {

        var res = $("#res");

        var bank_id = $(this).closest("tr").attr("data-id");



        if (confirm("Are you sure?")) {

            $.ajax({

                url: "<?php echo base_url(); ?>" + "AjaxRequest/delete_bank?id=" + bank_id,

                type: "POST",

                data: bank_id,

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