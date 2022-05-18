<?php
$customer_name = $customer->customer_name;
$customer_email = $customer->customer_email;
$customer_contact = $customer->customer_contact;
$customer_type = $customer->customer_type;
$customer_name = $customer->customer_name;
$reference_name = $customer->reference_name;
$reference_contact_number = $customer->reference_contact_number;
$customer_address = $customer->customer_address;
$agent_id = $customer->agent_id;
// dump($customer);die;

?>
<form class="mb-0 needs-validation" id="customer_form" method="post" novalidate>
    <input type="hidden" name="inp[temp_key]" value="<?php echo getTokenKey(15); ?>">
    <div class="mb-3">
        <label class="control-label">Customer Name</label>
        <input type="text" placeholder="eg. Mr. Hem Singh" name="inp[customer_name]" class="form-control textfield"
            value="<?php if(isset($customer_name)){ echo $customer_name; }else{ echo set_value('inp[customer_name]'); } ?>" />
    </div>
    <div class="mb-3">
        <label class="control-label">Email</label>
        <input type="email" placeholder="eg: your-name@domain.com" name="inp[customer_email]" class="form-control"
            value="<?php if(isset($customer_email)){ echo $customer_email; }else{ echo set_value('inp[customer_email]'); } ?>" />
    </div>
    <div class="mb-3">
        <label class="control-label">Contact Number <sup class="text-danger">*</sup></label>
        <input required type="number" placeholder="eg: 8988225521" name="inp[customer_contact]"
            class="form-control numberfield"
            value="<?php if(isset($customer_contact)){ echo $customer_contact; }else{ echo set_value('inp[customer_contact]'); } ?>" />
        <div class="invalid-feedback">
            This field is required.
        </div>
    </div>
    <?php $get_cus_type = get_customer_type(); ?>
    <div class="mb-3">
        <label class="control-label">Customer Type <sup class="text-danger">*</sup></label>
        <select required name="inp[customer_type]" class="form-control form-select" id="cus_type" required>
            <option value="" selected disabled>Select Customer Type</option>
            <?php if( !empty( $get_cus_type ) ){
                              foreach( $get_cus_type as $type ){
                                  ?>
            <option value='<?= isset($customer_type ) ? $customer_type  : $type->id ?>'
                <?= isset($customer_type )  && ($customer_type == $type->id ) ?  'selected' : '' ?>><?= $type->name ?>
            </option>
            <?php
                              }
                              } ?>
        </select>
        <div class="invalid-feedback">
            This field is required.
        </div>
    </div>
    <div class="mb-3 reference_section_div"
        style="<?= isset($customer_type ) && ($customer_type == '2')  ? 'display: block' : 'display: none'; ?>">
        <label class="control-label">Reference Name <sup class="text-danger">*</sup></label>
        <input type="text" placeholder="eg. Reference Name" name="inp[reference_name]"
            class="form-control textfield reference_section_field"
            value="<?php if(isset($reference_name)){ echo $reference_name; }else{ echo set_value('inp[reference_name]'); } ?>" />
    </div>
    <div class="mb-3 reference_section_div"
        style="<?= isset($customer_type ) && ($customer_type == '2')  ? 'display: block' : 'display: none';?>">
        <label class="control-label">Reference Contact Number <sup class="text-danger">*</sup></label>
        <input type="number" placeholder="Reference Contact Number" name="inp[reference_contact_number]"
            class="form-control numberfield reference_section_field"
            value="<?php if(isset($reference_contact_number)){ echo $reference_contact_number; }else{ echo set_value('inp[reference_contact_number]'); } ?>" />
    </div>
    <div class="mb-3">
        <label class="control-label">Assign To <sup class="text-danger">*</sup></label>
        <select name="inp[agent_id]" class="form-control form-select" required>
            <option value="" selected disabled>Select Sales Team Agents</option>
            <?php if( is_admin_or_manager() ){
                            //  $agentsAll = get_all_sales_team_agents();
                            //  $agents = get_all_sales_team_agents();
                              // var_dump($agent);die;
                           $agents = get_all_sales_team_loggedin_today();
                              if($agents){
                                 $teamL = "";
                                 $teamM = "";
                                 foreach( $agents as $a ){
                                    //remove teamleader
                                    //if( is_teamleader( $a->user_id ) ) continue; 		
                                    $agent_full_name = $a->first_name . ' ' . $a->last_name;
                                    //echo '<option value="'. $a->user_id . '">' . $a->user_name .' ( '. $agent_full_name . ' ) '. $count_leads .' </option>';
                                    if( is_teamleader( $a->user_id ) ){
                                       $count_leads = get_assigned_leads_to_team_today( $a->user_id );
                                       $count_leads = !empty( $count_leads ) ? "( {$count_leads} )" : "";
                                       
                                       $team_na = "<strong style='color: red;' > ( TEAM LEADER ) </strong>";
                                       $teamL .= "<option value='{$a->user_id}'>{$a->user_name} ( {$agent_full_name} ) {$count_leads} {$team_na}  </option>";	
                                    }else{
                                       $count_leads = get_assigned_leads_today( $a->user_id );
                                       $selected = isset($customer_type) ? 'selected' : ''; 
                                       $count_leads = !empty( $count_leads ) ? "( {$count_leads} )" : "";
                                       $teamM .= "<option value='{$a->user_id}' {$selected}>{$a->user_name} ( {$agent_full_name} ) {$count_leads} </option>";	
                                    }
                                 }
                                 echo $teamL . $teamM;
                              }else{
                                 echo '<option value="">No Loggedin Agent Found!</option>';
                              }
                              }else if( is_teamleader() ) {
                              $logedin_agents = is_teamleader();
                              if( $logedin_agents ){
                                 foreach( $logedin_agents as $agent ){
                                    //if( !is_agent_login_today( $agent ) ) continue;
                                    $count_leads = get_assigned_leads_today($agent);
                                    $count_leads = !empty( $count_leads ) ? "( {$count_leads} )" : "";
                                    echo '<option value="'. $agent . '">' . get_user_name($agent) . $count_leads .' </option>';
                                 }
                              }else{
                                 echo '<option value="">No Loggedin Agent Found!</option>';
                              }	
                              }else{
                              echo '<option value="">No Loggedin Agent Found!</option>';
                              }	
                              ?>
        </select>
        <div class="invalid-feedback">
            This field is required.
        </div>
    </div>
    <div class="mb-3">
        <label for="address" class="control-label">Address</label>
        <textarea name="customer_address" id="" cols="30" rows="3"
            class="form-control h-auto"><?= isset($customer_address) ? $customer_address :  set_value('inp[customer_address]')?></textarea>
        <span class="bg-light d-inline-block fs-7 mt-0 text-muted">Note : <em>Required only for
                Invoice.</em></span>
    </div>
    <div class="col-md-12 my-2">
        <button type="submit" class="btn green uppercase add_Customer">Add Customer</button>
    </div>
    <div id="customerRes" class="sam_res"></div>                                     
</form>
<script src="<?php echo base_url();?>site/assets/js/btvalidation.js" type="text/javascript"></script>