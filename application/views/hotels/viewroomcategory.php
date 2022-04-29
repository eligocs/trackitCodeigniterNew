<div class="page-container">
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="portlet box blue">
				<div id="messageres"></div>	
				<div class="portlet-title">
					<div class="caption">
					<i class="fa-solid fa-people-roof"></i> View Room Category
					</div>
					<?php //$count_room_cat = isset($roomcategory) ? count($roomcategory) : 0 ; ?>
					<!--Hide add room category button if roomcategory equal to five-->
					<?php /* if( $count_room_cat < 5 ){ */ ?>
						<a class="btn btn-primary float-end" href="<?php echo site_url("hotels/addroomcategory"); ?>" title="add room category"><i class="fa-solid fa-plus"></i> Add Room Category</a>
					<?php /* }  */?>	
				</div>
				<!--Show success message if Category edit/add -->
				<?php $message = $this->session->flashdata('success'); 
					if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>'; }
				?>
			</div>
			<!-- Start portlet-body -->
			<div class="portlet-body bg-white p-3 rounded-4 shadow-sm">
				<div class="table-responsive">
					<table class="table table-striped display">
						<thead>
							<tr>
								<th> # </th>
								<th> Room Category Name</th>
								<th> Action </th>
								
							</tr>
						</thead>
						<tbody>
						<?php 
						if($roomcategory){
							$i = 1;
							foreach($roomcategory as $category) {
								$h_cat = $category->room_cat_id;
							echo " 
								<tr data-id={$category->room_cat_id}>
									<td> ${i} </td>
									<td> {$category->room_cat_name}</td>
									<td colspan='2'><a href=" . site_url("hotels/roomcategoryedit/{$category->room_cat_id}") . " class='btn_pencil ajax_edit_hotel_table' ><i class='fa-solid fa-pen-to-square' aria-hidden='true'></i></a>";
									
									//Remove delete option
									/* if( $i > 4 ){
										echo " <a href='javascript:void(0)' class='btn btn-danger ajax_delete_roomcategory'><i class='fa-solid fa-trash-can' aria-hidden='true'></i></a>";
									} */
									
								echo "</td></tr>";
								$i++; 
							}	
						}else{
							echo "<tr><td colspan='3'>No Room Category Found !</td></tr>";
						} ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- End portlet-body -->
		</div>
		<!-- End page-content -->
	</div>
	<!-- End page-content-wrapper -->
</div>
<!-- End page-container-->


<!-- Modal -->
 


<script type="text/javascript">
jQuery(document).ready(function($){
	//table
	$(".table").dataTable();
	
	var resp = $("#addresEd");
	$(document).on("click",".ajax_delete_roomcategory",function(){
		var cat_id = $(this).closest("tr").attr("data-id");
		
		if (confirm("Are you sure?")) {
			$.ajax({
				url: "<?php echo base_url(); ?>" + "AjaxRequest/ajax_deleteRoomCategory?id=" + cat_id,
				type:"GET",
				dataType: 'json',
				cache: false,
				success: function(r){
					if(r.status = true){
						location.reload();
					  console.log(r.msg);
					}else{
						resp.html('<div class="alert alert-danger"><strong>Error! </strong>'+r.msg+'</div>');
					}
				}
			});	
		}   
	});
});
</script>
