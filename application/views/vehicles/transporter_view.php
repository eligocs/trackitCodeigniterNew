<?php if($vehicles){ 	$vehicle = $vehicles[0]; ?>
<div class="page-container">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa-solid fa-taxi"></i> Transporter Name:
						<strong> <?php  echo $vehicle->trans_name; ?> </strong>
					</div>
					<a class="btn btn-outline-primary float-end" href="<?php echo site_url("vehicles/transporters"); ?>" title="Back"><i class="fa-solid fa-reply"></i> Back</a>
				</div>
			</div>
			<!--Show success message if Category edit/add -->
			<?php $message = $this->session->flashdata('success'); 
				if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>'; }
			?>
			<div class="portlet-body bg-white p-3 rounded-4 shadow-sm">
				<h3>Transporter Details</h3>
				<div class="table-responsive">	
					<table class="table table-condensed table-hover table-bordered table-striped">	
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Transporter Name: </strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><?php  echo $vehicle->trans_name; ?></div></td>
						</tr>
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Email: </strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><?php  echo $vehicle->trans_email; ?></div></td>
						</tr>
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Contact: </strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><?php  echo $vehicle->trans_contact; ?></div></td>
						</tr>
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Address: </strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><?php  echo $vehicle->trans_address; ?></div></td>
						</tr>
						<?php 
						$car_list = $vehicle->trans_cars_list;
						$c = "";
						if( !empty($car_list) ){
							$clist = explode(",",$car_list);
							foreach( $clist as $cc ){
								$c .= get_car_name($cc) . ", ";
							}
							
						} ?>
						<tr>
							<td width="20%"><div class="col-mdd-2 form_vl border_right_none"><strong>Vehicles Available: </strong></div></td>	
							<td><div class="col-mdd-10 form_vr"><?php  echo $c; ?></div></td>
						</tr>
					</table>	
					<!--Edit Button-->
					<?php if( !is_salesteam() ){ ?>
						<div class="text-center">
							<a class="btn btn-outline-secondary" title='Edit Transporter' href="<?php echo site_url("vehicles/transporteredit/{$vehicle->id}"); ?>" class="" ><i class="fa-solid fa-pen-to-square"></i> Edit Transporter</a> <strong class="mx-3">OR</strong>
							<a class="btn btn-outline-secondary" href="<?php echo site_url("vehicles/transporteradd"); ?>" title="Add Transporter"><i class="fa-solid fa-plus"></i> Add Transporter</a>
						</div>	
					<?php } ?>
				</div>	
			</div>	
		</div>
	</div>
</div>
<?php } ?>	

