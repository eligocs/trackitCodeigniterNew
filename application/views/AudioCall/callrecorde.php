<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <?php $message = $this->session->flashdata('success');
            if ($message) {
                echo '<span class="help-block help-block-success">' . $message . '</span>';
            }
            ?>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cart-plus"></i>All Bank/Cash Accounts
                    </div>
                    <a class="btn btn-primary float-end" href="<?php echo site_url("accounts/add_account"); ?>" title="Add New Account"><i class="fa-solid fa-plus"></i> Add account</a>
                </div>
            </div>
            <div class="portlet-body second_custom_card">
                <div class="table-responsive margin-top-20">
                    <table class="table table-striped display all_banks_accounts">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Customer id </th>
                                <th> iti_id </th>
                                <th> Audio </th>
                            </tr>
                        </thead>
                        <tbody>
                            <div id="res"></div>
                            <?php
                            if ($callrecords) {
                                $i = 1;
                                foreach ($callrecords as $callrecord) {
                                    echo " 
									<tr>
										<td> {$i} </td>
										<td> {$callrecord->cus_id}</td>
										<td> {$callrecord->iti_id} </td>							
										<td> <audio controls>
                                            <source src='<?php echo base_url();?>site/assets/audio/' . {$callrecord->audio} type='audio/mp3'>
                                            Your browser does not support the audio tag.
                                            </audio> </td>							
									</tr>";
                                    $i++;
                                }
                            } else {
                                echo "<tr>";
                                for ($colspan = 1; $colspan <= 8; $colspan++) {
                                    echo $colspan == 1 ? "<td style='border-left:none;border-right:none'>No Account Found !</td>" : "<td style='border-left:none;border-right:none'></td>";
                                }
                                echo "</tr>";
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