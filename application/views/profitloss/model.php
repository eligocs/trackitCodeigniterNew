<input type="hidden" value="" class="iti_id">
<style>
    .profitper,
.profitvalue,
.profit,
.loss,
.profitin_per,
.lossin_per,
.lossper,
.lossvalue {
    display: none;
}

.lossin_per,
.loss {
    color: red;
}

.profit,
.profitin_per {
    color: green;
}

.showproandloss {
    display: block;
}
</style>
<?php
// dump($data);
$tax  = !empty(get_tax()) ? get_tax() : '';
$iti = $data;
// dump($iti);die;
$f_cost =  !empty($iti->final_amount)  && $iti->iti_status == 9  && get_iti_booking_status($iti->iti_id) == 0  ? $iti->final_amount :
 (!empty($data->sellingPrice) ? $data->sellingPrice : '');
?>
<div class="row">
    <div class="col-md-6">
        <h5> Total Cost: <?= number_format($f_cost) . '/-' ?></h5>
    </div>
    <div class="col-md-6">
        <h5> Total Cost Without Gst:
            <?= number_format(calculate_total_reverse_margin($f_cost, $tax)) . '/-' ?> </h5>
    </div>
</div>
<form class="storeMargin">
    <input type="hidden" value="<?= calculate_total_reverse_margin($f_cost, $tax) ?>" class="witoutGst">
    <input type="hidden" name="sellingPrice" value="<?= $f_cost ?>" id="sp">
    <input type="hidden" id="editIti" name="editIti" value="<?= !empty($data->id) ?  $data->id : '' ?>">
    <input type="hidden" id="cust_id" name="cust_id" value="<?= !empty($data->customer_id) ?  $data->customer_id : '' ?>">
    <input type="hidden" id="agent_id" name="agent_id" value="<?= !empty($data->agent_id) ?  $data->agent_id : '' ?>">
    <input type="hidden" name="withoutMrg" value="<?= calculate_total_reverse_margin($f_cost, $tax) ?>" id="sp">
    <div class="row">
        <div class="form-group col-md-6 my-2">
            <label for="email">Cab:</label>
            <input type="number" value="<?= !empty($data->cab_price) ?  $data->cab_price : '' ?>" class="form-control calCab"  name="cab_price">
        </div>
        <!--CC Email Address-->
        <div class="form-group col-md-6 my-2">
            <label for="cc_email">Hotel:</label>
            <input type="number" value="<?= !empty($data->hotel_price) ?  $data->hotel_price : '' ?>" class="form-control calhotel"  name="hotel_price">
        </div>
        <!--BCC Email Address-->
        <div class="form-group col-md-6 my-2">
            <label for="bcc_email">Volvo:</label>
            <input type="number" value="<?= !empty($data->volvo_price) ?  $data->volvo_price : '' ?>" class="form-control calvolvo"  name="volvo_price">
        </div>
        <div class="form-group col-md-6 my-2">
            <label for="bcc_email">Flight:</label>
            <input type="number" value="<?= !empty($data->flight_price) ?  $data->flight_price : '' ?>" class="form-control calflight"  name="flight_price">
        </div>
        <div class="form-group col-md-6 my-2">
            <label for="bcc_email">Train:</label>
            <input type="number" value="<?= !empty($data->train_price) ?  $data->train_price : '' ?>" class="form-control caltrain"  name="train_price">
        </div>
        <div class="form-group col-md-6 my-2">
            <label for="bcc_email">Other:</label>
            <input type="number" value="<?= !empty($data->other_price) ?  $data->other_price : '' ?>" class="form-control calother"  name="other_price">
        </div>
        <div class="form-group col-md-6 my-2">
            <!-- <span style="color:red"> Clike Calculate After Enter Rates *</span><br> -->
            <label for="sub">Total Expenses:<a href="#" class="totalexpen"> calculate </a></label>
            <input type="number" required class="form-control subtotal"  name="total_cost" value="<?= !empty($data->total_cost) ?  $data->total_cost : '' ?>" readonly>
        </div>
        <div class="form-group col-md-6  my-2 <?= !empty($data->is_loss_profit) ?  'showproandloss' : 'profitvalue' ;?>">
            <label for="sub"> 
                <span class="profit" style="<?= ($data->is_loss_profit == 1) ? 'display:block' : '' ; ?>"> Profit </span>
                <span class="loss" style="<?= ($data->is_loss_profit == 2) ? 'display:block' : '' ; ?>"> Loss </span> </label>
            </label>
            <input type="number" required class="form-control profitval"  name="proft_value" value="<?= !empty($data->total_margin_cost) ?  $data->total_margin_cost : '' ?>" readonly>
        </div>
        <div class="form-group col-md-6 my-2 <?= !empty($data->is_loss_profit) ?  'showproandloss' : 'profitper' ;?>">
            <label for="sub">
            <span class="profitin_per" style="<?= ($data->is_loss_profit == 1) ? 'display:block' : '' ; ?>"> Profit in % </span>
            <span class="lossin_per" style="<?= ($data->is_loss_profit == 2) ? 'display:block' : '' ; ?>">Loss in %</span> </label> </label>
            <input type="profit_loss_per" required class="form-control prrofit_per"  name="profit_per" value="<?= !empty($data->total_margin_per) ?  $data->total_margin_per : '' ?>" readonly>
        </div>
    </div>
    <input type="hidden" required class="form-control is_loss_profit"  name="is_loss_profit" value="">
    <input type="hidden" required class="form-control" name="iti_id" value="<?= $iti->iti_id ?>">
    <div class="clearfix"></div>
    <hr>
    <button type="submit" class="btn btn-success disabled stormrg">Store Margin</button>
</form>