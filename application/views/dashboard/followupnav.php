
<?php
$user_data = get_user_info();
$h_user_role = isset($user_data[0]->user_type) ? $user_data[0]->user_type : "";
?>
<nav class="quick-nav">
    <a class="quick-nav-trigger" href="javascript: void(0)">
        <span aria-hidden="true"></span>
    </a>
    <ul class="sidebar-buttons">
        <?php
        if ($h_user_role == 99 || $h_user_role == 93) {
        ?>
        <li><button class="btn" id="btn_load_payment_followup"><i class="fa-solid fa-indian-rupee-sign"></i> Payment Follow
                Up</button></li>
        <li><button class="btn" id="btn_load_ad_payment_followup"><i class="fa-solid fa-indian-rupee-sign"></i> Advance
                Payment
                Follow Up</button></li>
        <li><button class="btn" id="btn_load_balance_payment_followup"><i class="fa-solid fa-indian-rupee-sign"></i> Balance
                Payment Follow Up</button></li>
        <li><button class="btn" id="btn_load_travel_followup"><i class="fa-solid fa-calendar-days"></i> Travel Dates
                Follow</button></li>
                <?php
        }
        if($h_user_role == 98 || $h_user_role == 96){ 
            ?>
        <li><button class="btn sidebar-button btn-side-1 cal_toggle_btn" data-target="myModal1"><i class="fa fa-users"></i> Lead Follow Up</button></li>
        <?php
        }
        ?>
    </ul>
    <span aria-hidden="true" class="quick-nav-bg"></span>
</nav>
<?php
if ($h_user_role == 99 || $h_user_role == 98) {
?>
<div class="quick-nav-chart">
    <a id="quick-nav-triggered" type="submit">
        <img class="modal-target" src="<?php echo base_url();?>site/images/chart-icon.svg" alt="">
    </a>
</div>
<?php

}
?>