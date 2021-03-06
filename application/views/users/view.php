<?php if($agent){ 	$agent = $agent[0];		?>
<div class="page-container">
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <!-- <div class="caption"><i class="fa fa-users"></i>
                            <strong class="me-3">User Name: <span ><?php echo $agent->user_name; ?></span></strong>
                            <strong class="me-3">Last Login: <span ><?php  $newDate = date("d-m-Y", strtotime($agent->last_login));  
                            echo $newDate; ?></span></strong>
                            <strong class="me-3">Last Login Ip: <span ><?php echo $agent->login_ip; ?></span></strong>
                    </div> -->
                    <a class="btn btn-outline-primary float-end" href="<?php echo site_url("agents"); ?>" title="Back"><i class="fa-solid fa-reply"></i> Back</a>
                </div>
            </div>
            <div class="bg-white p-3 rounded-4 shadow-sm">
                <?php $message = $this->session->flashdata('success'); 
				if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>'; }
				?>
                <?php
				$check_online_status = get_user_online_status( $agent->user_id );
				$online_offline_status = !empty( $check_online_status ) ? 
					'<i title="Online" class="fa fa-circle online" style="color:green"></i> Online  ' 
					: '<i title="Offline" class="fa fa-circle offline" style="color:red"></i> Offline';
					?>
                    <?php	
                            if($agent->user_type == 99){
                                $agent_type = "Administrator";
                            }elseif($agent->user_type == 98){
                                $agent_type = get_manager_type( $agent->is_super_manager );
                                /* 	if(   $agent->is_super_manager == 1 ){
                                        $agent_type = "Super Manager";
                                    }else if( $agent->is_super_manager == 2 ){
                                        $agent_type = "Leads Manager";
                                    }else{
                                        $agent_type = get_role_name($agent->user_type);
                                    } */
                            }else{
                                $agent_type = get_role_name($agent->user_type);
                            }
                            
                            ?>

                <div class="portlet-body">
                    <h3 class="mb-3">User Details <?php echo $online_offline_status; ?></h3>
                    <div class="table-responsive">
                        <table class="table table-condensed table-hover table-striped">
                            <tr>
                                <td width="20%">
                                    <div class="col-mdd-2 form_vl border_right_none"><strong>First Name: </strong></div>
                                </td>
                                <td>
                                    <div class="col-mdd-10 form_vr"><?php echo $agent->first_name; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <div class="col-mdd-2 form_vl border_right_none"><strong>Last Name: </strong></div>
                                </td>
                                <td>
                                    <div class="col-mdd-10 form_vr"><?php echo $agent->last_name; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <div class="col-mdd-2 form_vl border_right_none"><strong>User Name:</strong></div>
                                </td>
                                <td>
                                    <div class="col-mdd-10 form_vr"><?php echo $agent->user_name; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <div class="col-mdd-2 form_vl border_right_none"><strong>User Role:</strong></div>
                                </td>
                                <td>
                                    <div class="col-mdd-10 form_vr green"><strong><?php echo $agent_type; ?></strong></div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <div class="col-mdd-2 form_vl border_right_none"><strong>Email: </strong></div>
                                </td>
                                <td>
                                    <div class="col-mdd-10 form_vr"><?php echo $agent->email; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <div class="col-mdd-2 form_vl border_right_none"><strong>Office Timing: </strong>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                    $loginTime_Av = $agent->in_time . ' ' . ' To '. ' ' . $agent->out_time ;
                                    $loginTime_not = '00:00' . ' ' .'To'.  ' ' . '00:00' ;
                                    ?>
                                    <?= !empty( $agent->in_time && $agent->out_time) ? $loginTime_Av : $loginTime_not;?>
        
                   
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <div class="col-mdd-2 form_vl border_right_none"><strong>Mobile Number:</strong></div>
                                </td>
                                <td>
                                    <div class="col-mdd-10 form_vr"><?= !empty($agent->mobile) ? $agent->mobile : 'N/A'; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <div class="col-mdd-2 form_vl border_right_none"><strong>Mobile Number For Login:</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-mdd-10 form_vr"><strong><?= !empty($agent->mobile_otp) ? $agent->mobile_otp : 'N/A'; ?></strong></div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <div class="col-mdd-2 form_vl border_right_none"><strong>Gender:</strong></div>
                                </td>
                                <td>
                                    <div class="col-mdd-10 form_vr"><?php echo $agent->gender; ?></div>
                                </td>
                            </tr>
                            <?php	
                            if($agent->user_type == 99){
                                $agent_type = "Administrator";
                            }elseif($agent->user_type == 98){
                                $agent_type = get_manager_type( $agent->is_super_manager );
                                /* 	if(   $agent->is_super_manager == 1 ){
                                        $agent_type = "Super Manager";
                                    }else if( $agent->is_super_manager == 2 ){
                                        $agent_type = "Leads Manager";
                                    }else{
                                        $agent_type = get_role_name($agent->user_type);
                                    } */
                            }else{
                                $agent_type = get_role_name($agent->user_type);
                            }
                            
                            ?>
                            <?php if( is_admin() && $agent->user_type == 98 ){ 
                            $checked = isset( $agent->is_super_manager ) && $agent->is_super_manager == 1 ? "checked" : ""; 
                            $checked_leads = isset( $agent->is_super_manager ) && $agent->is_super_manager == 2 ? "checked" : ""; 
                            $checked_sales = isset( $agent->is_super_manager ) && $agent->is_super_manager == 3 ? "checked" : ""; 
                            $checked_acc = isset( $agent->is_super_manager ) && $agent->is_super_manager == 4 ? "checked" : ""; 
                            $checked_gm = isset( $agent->is_super_manager ) && $agent->is_super_manager == 5 ? "checked" : ""; 
                            $checked_none = isset( $agent->is_super_manager ) && $agent->is_super_manager == 0 ? "checked" : ""; 
                            $val_m = isset( $agent->is_super_manager ) && $agent->is_super_manager==1 ? 0 : 1; ?>
                            <tr>
                                <td width="20%">
                                    <div class="col-mdd-2 form_vl border_right_none"><strong>Is Super Manager:</strong></div>
                                </td>
                                <td>
                                    <div class="col-mdd-10 form_vr manager_roles">
                                        <!--label class='mt-checkbox'> 
                                            <input <?php //echo $checked; ?> type='checkbox' value='<?php //echo $val_m; ?>' data-user_id =<?php //echo $agent->user_id; ?> id='isSuper_manager' class='form-control'>
                                            <span class="chk_is_manager"></span>
                                            </label-->
                                        <label class='mt-radio5'>
                                            <input type='radio' <?php echo $checked_gm; ?> value='5' id='isSuper_manager6'
                                                title="General Manager" name="change_status"
                                                class=' isSuper_manager'><strong>GM</strong>
                                        </label> &nbsp;&nbsp;
                                        <label class='mt-radio1'>
                                            <input type='radio' <?php echo $checked; ?> value='1' id='isSuper_manager'
                                                title="Super Manager" name="change_status" class=' isSuper_manager'>
                                            <strong>Super Manager</strong>
                                        </label>&nbsp;&nbsp;
                                        <label class='mt-radio2'>
                                            <input type='radio' <?php echo $checked_leads; ?> value='2' id='isSuper_manager2'
                                                title="Leads Manager" name="change_status"
                                                class=' isSuper_manager'><strong>Leads Manager</strong>
                                        </label>&nbsp;&nbsp;
                                        <label class='mt-radio3'>
                                            <input type='radio' <?php echo $checked_sales; ?> value='3' id='isSuper_manager4'
                                                title="Sales Manager" name="change_status"
                                                class=' isSuper_manager'><strong>Sales Manager</strong>
                                        </label>&nbsp;&nbsp;
                                            <!--label class='mt-radio5'>
                                            <input type='radio' <?php echo $checked_acc; ?> value='4' id='isSuper_manager5' title="Account Manager" name="change_status" class='form-control isSuper_manager'><strong>Account Manager</strong>
                                            </label-->
                                        <label class='mt-radio2'>
                                            <input type='radio' <?php echo $checked_none; ?> value='0' id='isSuper_manager3'
                                                title="Manager" name="change_status"
                                                class=' isSuper_manager'><strong>Manager</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <div class="col-mdd-2 form_vl border_right_none"><strong>Pin: </strong></div>
                                </td>
                                <td>
                                    <div class="col-mdd-10 form_vr"><span
                                            id="altPassTemp"><?php echo $agent->alt_pass; ?></span>
                                        <?php if( !empty( $agent->alt_pass ) ){ ?>
                                        <button class="btn btn_blue_outline margin_left_15" onclick="copy_alt_pass()">Copy</button>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                           
                            <tr>
                                <td width="20%">
                                    <div class="col-mdd-2 form_vl border_right_none"><strong>Added By:</strong></div>
                                </td>
                                <td>
                                    <div class="col-mdd-10 form_vr"><?php echo !empty(get_user_name($agent->added_by)) ? get_user_name($agent->added_by) : 'N/A'; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <div class="col-mdd-2 form_vl border_right_none"><strong>User Status:</strong></div>
                                </td>
                                <td>
                                    <div class="col-mdd-10 form_vr"><?php echo $agent->user_status; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <div class="col-mdd-2 form_vl border_right_none"><strong>Website:</strong></div>
                                </td>
                                <td>
                                    <div class="col-mdd-10 form_vr"><?php echo !empty($agent->website) ? $agent->website : 'N/A'; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <div class="col-mdd-2 form_vl border_right_none"><strong>Last Login:</strong></div>
                                </td>
                                <td>
                                    <div class="col-mdd-10 form_vr"><?php  $newDate = date("d-m-Y", strtotime($agent->last_login));  
                            echo $newDate; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <div class="col-mdd-2 form_vl border_right_none"><strong>Last Login Ip:</strong></div>
                                </td>
                                <td>
                                    <div class="col-mdd-10 form_vr"><?php echo $agent->login_ip; ?></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="text-center">
                        <input type="hidden" value="<?php echo $agent->user_id; ?>" name="user_id" id="user_id_v">
                        <a class="btn btn-outline-secondary" title='Edit User' href="<?php echo site_url("agents/editagent/{$agent->user_id}"); ?>" class=""><i class="fa-solid fa-pen-to-square"></i> Edit User</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End page-content -->
    </div>
    <!-- End page-content-wrapper -->
</div>
<!-- End page-container -->

<div class="loader"></div>
<?php }else{
   redirect(404);
   } ?>
<script>
jQuery(document).ready(function($) {
    //Update manager to super manager
    $(document).on("click", ".isSuper_manager", function(e) {
        //var user_id = $(this).attr("data-user_id");
        var user_id = $("#user_id_v").val();
        var _val = $(this).val();
        if (confirm("Are you sure to change manager type ?")) {
            //alert( _val + " User Id " + user_id );
            $.ajax({
                url: "<?php echo base_url("agents/update_super_manager_status"); ?>",
                type: "post",
                dataType: "json",
                data: {
                    user_id: user_id,
                    is_super_manager: _val
                },

                beforeSend: function() {
                    $(".loader").show();
                    console.log("sending....");
                },
                success: function(res) {
                    $(".loader").hide();
                    alert(res.msg);
                    location.reload();
                },
                error: function(e) {
                    alert("Error: Please try again.");
                    console.log(e);

                }

            })
        }
        return false;
    });
});

function copy_alt_pass() {
    /* Get the text field */
    var element = document.getElementById("altPassTemp");

    /* Alert the copied text */
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    var copyText = document.execCommand("copy");
    alert("Password Copied: " + $(element).text());
    $temp.remove();
}
</script>