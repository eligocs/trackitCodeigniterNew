<?php
   $ORDER_ID = "";
   $requestParamList = array();
   $responseParamList = array();
   if ( isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "" ) {
   	// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
   	$ORDER_ID = $_POST["ORDER_ID"];
   	// Create an array having all required parameters for status query.
   	$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID); 
   	$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
   	
   	$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;
   	// Call the PG's getTxnStatusNew() function for verifying the transaction status.
   	$responseParamList = getTxnStatusNew($requestParamList);
   }
   
   ?>
<div class="page-container">
   <div class="page-content-wrapper">
      <div class="page-content">
         <div class="portlet box blue">
            <div class="portlet-title">
               <div class="caption">
                  <h2 class="check_order_status">Check Order Status</h2>
               </div>
            </div>
         </div>
         <form class="mb-0" method="post" action="">
   			<!-- <div class="second_custom_card">
			   <table class='table border-0'>
					<tbody>
						<tr>
							<td class="border_top_zero"><label> <strong>Enter ORDER_ID ::* </strong></label></td>
							<td class="border_top_zero"><input id="ORDER_ID" tabindex="1" class='form-control' maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php //echo $ORDER_ID ?>">
							</td>
							<td class="border_top_zero"><input value="Status Query"  class='btn btn-success' type="submit"	onclick=""></td>
						</tr>
					</tbody>
            	</table>
			   </div> -->

			   <div class="bg-white p-3 rounded-4 shadow-sm">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label"> <strong>Enter ORDER_ID <sup class="text-danger">*</sup> </strong></label>
								<input id="ORDER_ID" tabindex="1" class='form-control' maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>">
							</div>
						</div>
						<div class="col-md-4">
							<label for="" class="control-label d-block">&nbsp;</label>
							<input value="Status Query"  class='btn btn-success' type="submit"	onclick="">
						</div>
					</div>
			   </div>

				<?php
				if (isset($responseParamList) && count($responseParamList)>0 )
				{ 
				?>
				
				<div class="portlet box blue mt-5">
					<div class="portlet-title">
						<h3 class="custom_title">Response of status query:</h3>
					</div>
				</div>
				<div class="bg-white p-3 rounded-4 shadow-sm">
					<table  class='table table_payments_status table-striped' style="border: 1px solid nopadding" border="0">
						<tbody>
							<?php
								foreach($responseParamList as $paramName => $paramValue) {
								?>
							<tr >
								<td><label><?php echo $paramName?></label></td>
								<td><?php echo $paramValue?></td>
							</tr>
							<?php
								}
								?>
						</tbody>
					</table>
				</div>
				<?php
				}
				?>
         </form>
      </div>
   </div>
</div>