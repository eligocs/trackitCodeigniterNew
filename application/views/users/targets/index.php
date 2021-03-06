<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" rel="stylesheet" type="text/css" />

<!-- Begin page-container -->
<div class="page-container">
   <!-- Begin page-content-wrapper -->
   <div class="page-content-wrapper">
      <style>.hideinputbox{display:none;}</style>
      <!-- Begin page-content -->
      <div class="page-content">
         <!-- BEGIN SAMPLE TABLE PORTLET-->
         <?php $message = $this->session->flashdata('success'); 
            if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>'; }
            ?>
         <!--error message-->
         <?php $err = $this->session->flashdata('error'); 
            if($err){ echo '<span class="help-block help-block-error2 red">'.$err.'</span>';}
            ?>
         <!-- BEGIN SAMPLE TABLE PORTLET-->
         <div class="portlet box blue">
            <div class="portlet-title">
               <div class="caption">
               <i class="fa-solid fa-bullseye"></i> Agents Monthly Targets
               </div>

               <!-- Show hide filter button -->
               <button  class="btn float-end me-2 p-2" title="Filter" type="button" data-bs-toggle="collapse" data-bs-target="#filter_collapse" aria-expanded="false" aria-controls="filter_collapse">
                        <i class="fa-solid fa-filter fs-5"></i>
               </button>
            </div>
         </div>
         <!-- Begin filter_collapse -->
         <div class="bg-white p-3 rounded-4 shadow-sm mb-4 collapse" id="filter_collapse">
            <?php $sales_team_agents = get_all_sales_team_agents(); ?>
            <form id="frmInsentivecal" class="mb-0">
               <?php
                  $month = isset( $_GET['month'] ) && !empty($_GET['month']) ? $_GET['month'] : date("Y-m");
               ?>
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-group">
                           <label class="control-label" for="daterange">Select Month*:</label>
                           <input type="text" required autocomplete="off" class="form-control" id="daterange" name="dateRange" value="<?php echo $month; ?>" required />
                     </div> 
                  </div>
                  <!--input type="submit" class="btn btn-success" value="Check Target"-->
                  <input type="hidden" id="datefrom" name="datefrom" value="<?php echo $month; ?>" >
               </div>
            </form>	
         </div>
         <!-- End filter_collapse -->

         <!-- Begin portlet-body -->
         <div class="portlet-body bg-white p-3 rounded-4 shadow-sm">
            <h4 class='text-center'><span id='ainfo_name'></span> <strong class='red'>Month: </strong><span id='ainfo_month'><?php echo date("M,Y", strtotime($month) ); ?></span></h4>
            <!-- Begin agent_info_section -->
            <div class='agent_info_section'>
               <div class="table-responsive">
                  <table class="table table-striped display" id="table" cellspacing="0" width="100%">
                     <thead>
                        <tr>
                           <th> # </th>
                           <th> Name </th>
                           <th> User Name </th>
                           <th> Target (Pkg.) </th>
                           <th> Booked (Pkg.) </th>
                           <th> Assigned By </th>
                           <th> Action </th>
                        </tr>
                     </thead>
                     <tbody class="ins_data">
                        <?php if( isset( $monthly_targets ) && !empty( $monthly_targets ) ){
                           $counter = 1;
                           foreach( $monthly_targets as $target ){
                              
                              //remove teamleader
                              if( is_teamleader( $target->user_id ) ) continue;
                              
                              $assigned_by = !empty( $target->target_assigned_by ) ? get_user_name($target->target_assigned_by) : "SY";
                              $m_target = 	isset($target->target) ? $target->target : get_default_target();
                              $m_target_input = "<input class='hideinputbox' min='5' max='100' type='number' value='{$m_target}' >";
                              
                              $booked_pkg = get_agents_booked_packages( $target->user_id, $month );
                              $update_btn = "<a title='Update Target' href='javascript: void(0)' class='btn_pencil assign_target' ><i class='fa-solid fa-pen-to-square' aria-hidden='true'></i></a>";
                              
                              echo "<tr data-total_target= '{$m_target}' data-agent_id='{$target->user_id}' >
                                 <td>{$counter}.</td>
                                 <td>{$target->name}</td>
                                 <td>{$target->user_name}</td>
                                 <td><span class='mtupdate'>{$m_target}</span>{$m_target_input}</td>
                                 <td>{$booked_pkg}</td>
                                 <td>{$assigned_by}</td>
                                 <td>{$update_btn}</td>
                              </tr>";
                              $counter++;
                           }
                           }else{
                           echo "<tr><td colspan=3>No Data Found!</td></tr>";
                           } ?>
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- End agent_info_section -->
         </div>
         <!-- End portlet-body -->
      </div>   
      <!-- End page-content -->
   </div>
   <!-- End page-content-wrapper -->
</div>
<!-- End page-container -->

<!-- Modal -->
<script type="text/javascript">
   jQuery(document).ready(function($){
   var add_selected_date =  new Date('2019-02').toISOString();
   $('#daterange').datepicker({
   	startDate: new Date('2018-01-01'),
   	autoclose: true,
   	minViewMode: 1,
   	endDate: '+2m',
   	format: 'MM, yyyy',
   	//format: 'yyyy-mm',
   }).on('changeDate', function(selected){
   	//console.log( selected.format('yyyy-mm') );
   	$("#datefrom").val(selected.format('yyyy-mm'));
   	window.location.href = "<?php echo base_url("incentive/agenttargets?month="); ?>" + selected.format('yyyy-mm');
   });
   
   //Assign data
   $(document).on("click",".assign_target", function(e){
   	e.preventDefault();
   	var _this 	= $(this);
   	var _this_tr = _this.parent("td").parent("tr");
   	
   	$(".mtupdate").show();
   	$(".hideinputbox").hide();
   	$(".assign_target").removeClass("update_target");
   	$(".assign_target").html("<i class='fa-solid fa-pen-to-square' aria-hidden='true'></i>");
   	
   	_this_tr.find(".hideinputbox").show();
   	_this_tr.find(".mtupdate").hide();
   	_this.addClass('update_target');
   	
   	_this.html("Update");
   	
   });	
   
   //update target
   $(document).on("click",".update_target", function(e){
   	var _this 	= $(this);
   	var _this_tr = _this.parent("td").parent("tr");
   	
   	var target	= _this_tr.find(".hideinputbox").val();
   	var agent_id = _this_tr.attr("data-agent_id");
   	var month 	= $("#datefrom").val();
   	//check if target field not empty
   	if( target < 0 ){
   		alert("Target should be 0 or greater than 0.");
   		return false;
   	}
   	
   	if( confirm("Are you sure to update agent target ?") ){
   		$.ajax({
   			type: "POST",
   			url: "<?php echo base_url('incentive/update_agenttarget'); ?>",
   			dataType: 'json',
   			data: {month: month, target: target, agent_id: agent_id},
   			success: function(res) {
   				if (res.status == true){
   					$(".hideinputbox").hide();
   					_this_tr.find(".mtupdate").html(target).show();
   					$(".assign_target").removeClass("update_target");
   					$(".assign_target").html("<i class='fa-solid fa-pen-to-square' aria-hidden='true'></i>");
   					alert("Target Updated Successfully.");
   				}else{
   					alert("Please reload page and try again.");
   					location.reload();
   				}
   			},
   			error: function(e){
   				location.reload();
   				alert("Reload page and try again.");
   			}
   		});
   	}	
   	
   });	
   
   
   });
</script>
<script type="text/javascript">
   var table;
   $(document).ready(function() {
   	$("#table").DataTable();
   });
</script>