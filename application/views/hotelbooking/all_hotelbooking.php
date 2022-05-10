<!-- Begin page-container -->
<div class="page-container">
   <!-- Begin page-content-wrapper -->
   <div class="page-content-wrapper">
      <!-- Begin page-content -->
      <div class="page-content">
         <!-- BEGIN SAMPLE TABLE PORTLET-->
         <?php $message = $this->session->flashdata('success'); 
            if($message){ echo '<span class="help-block help-block-success">'.$message.'</span>';}
            ?>
         <div class="portlet box blue" style="margin-bottom:0;">
            <div class="portlet-title">
               <div class="caption">
               <i class="fa-solid fa-hotel"></i> All Hotel Bookings
               </div>
               <a class="btn btn-primary float-end" href="<?php echo site_url("itineraries"); ?>" title="Book Hotel"><i class="fa-solid fa-book"></i> Book Hotel</a>

               <!-- Show hide filter button -->
               <button  class="btn float-end me-2 p-2 " title="Filter Hotel Bookings" type="button" data-bs-toggle="collapse" data-bs-target="#filter_collapse" aria-expanded="false" aria-controls="filter_collapse">
               <i class="fa-solid fa-filter fs-5"></i>
               </button>
            </div>
         </div>

         <!--Begin filter section-->
         <div class="bg-white p-3 rounded-4 shadow-sm mb-4 collapse" id="filter_collapse">
            <form id="form-filter" class="form-horizontal mb-0">
               <div class="actions row ">
                  <div class="form-group col-md-3">
                     <label class="control-label"><strong>Filter: </strong></label>
                     <input type="text" autocomplete="off" class="form-control" id="daterange" name="dateRange" title="Checkin filter" placeholder='Checkin date' />
                     <input type="hidden" name="date_from" id="date_from">
                     <input type="hidden" name="date_to" id="date_to">
                  </div>
                  <div class="col-md-9">
                     <div class="radio_filter_btns" data-toggle="buttons">
                        <label for="" class="control-label d-block">&nbsp;</label>
                        <label class="btn btn-default  custom_active active"><input type="radio" name="filter" value="all" checked="checked" id="all"/>All</label>
                        <label class="btn btn-default  custom_active"><input type="radio" name="filter" value="upcomming" id="upcomming" />Upcomming</label>
                        <label class="btn btn-default  custom_active"><input type="radio" name="filter" value="past" id="past" />Past</label>
                        <label class="btn btn-default  custom_active"><input type="radio" name="filter" value="approved" id="approved" />Approved</label>
                        <label class="btn btn-default  custom_active"><input type="radio" name="filter" value="declined" id="declined" />Declined</label>
                        <label class="btn btn-default  custom_active"><input type="radio" name="filter" value="cancel" id="cancel" />Cancel</label>
                        <label class="btn btn-default  custom_active"><input type="radio" name="filter" value="pending" id="pending" />Pending</label>
                        <!--label class="btn btn-default blue-madison custom_active"><input type="radio" name="filter" value="pending_gm" id="pending_gm" />Pending GM</label-->
                     </div>
                  </div>
               </div>
               <input type="hidden" name="filter_val" id="filter_val" value="all">
            </form>
         </div>
         <!--End filter section-->	

         <!-- Begin demo table design -->
         <div class="bg-white p-3 rounded-4 shadow-sm mb-4">
            <div class="table-responsive">
               <table class="table data-table-large">
                     <tbody>
                        <tr>
                           <td class="w-30">
                              <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                 <div class="d-flex justify-content-between px-1 w-100">
                                    <div class="requirment">
                                       <p class="fs-7 fw-bold mb-2 mt-0"> Booking ID : #545 </p>
                                       <p class="fs-7 fw-bold mb-1 mt-0"> Iti ID : #5708 </p>
                                    </div>
                                    <div class="ms-2">
                                          <p class="fs-7 mb-2 mt-0 ">
                                             <strong class="d-block mb-1">Rammohan Bachu</strong>
                                             <span title="Guest City" class="text-primary">Andhra Pradesh</span>
                                          </p>
                                    </div>
                                 </div>
                                 <div class="bg-light p-1 w-100">
                                    <div class="">
                                       <p class="fs-7 mb-2 mt-0 text-secondary">Sent Status </p>
                                       <div>
                                          <span class="me-3"> 
                                             <i class="fa-envelope fa-solid text-primary"></i> sent 1 Time 
                                          </span>
                                          <button class="btn btn-primary btn-x-sm"> Mail View</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                 <div class="d-flex justify-content-between w-100">
                                    <div class="px-2 mb-2">
                                       <strong class="d-block fs-7 mb-1">Shimla</strong> 
                                       <span class="fs-8 fw-500 text-secondary">Hotel City</span>
                                    </div>
                                    <div class="px-2 mb-2">
                                       <strong class="d-block fs-7 mb-1">Shimla Hill View	 </strong> 
                                       <span class="fs-8 fw-500 text-secondary">Hotel Name</span>
                                    </div>
                                 </div>
                                 <div class="bg-light p-1 w-100">
                                    <p class="fs-7 m-0 mb-2 text-dark"><strong>Luxury Room</strong></p>
                                    <p class="fs-8 fw-400 m-0 text-dark">Room Category</p>
                                 </div>
                              </div>
                           </td>
                           <td>
                                 <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                    <div class="mb-2 px-2">
                                       <p class="fw-bold m-0 fs-7">04-Feb-2022</p>
                                       <span class="fs-8 text-secondary">Till 08-Feb (4N/5D)</span>
                                    </div>
                                    <div class="bg-light p-1 w-100">
                                       <span class="d-block fs-7 mb-2 text-muted">Agent</span>
                                       <a class="text-primary fw-bold" href="" title="View Agent">Bookings Team</a>
                                    </div>
                                 </div>
                           </td>
                           <td>
                              <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                 <div class="mb-2 px-2">
                                    <p class="fw-bold m-0 fs-7">
                                       <i class="fa-solid fa-indian-rupee-sign"></i> 35,000/-
                                    </p>
                                    <span class="fs-8 text-secondary">Total Cost</span>
                                 </div>
                                 <div class="bg-light p-1 w-100">
                                    <span class="d-block fs-7 mb-2 text-secondary">Booking Date </span>
                                    <p class="fs-8 fw-400 m-0 text-dark">26-Jan-2022</p>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                 <div class="mb-2 px-2">
                                       <p class="fs-7 mb-2 mt-0 text-secondary">Booking Status </p>
                                       <!-- <div class="badge bg-success">
                                          <strong> <i class="fa-solid fa-thumbs-up"></i> Approved</strong>
                                       </div> -->
                                       <div>
                                          <button class="btn btn-sm btn-success">
                                             <i class="fa-solid fa-check"></i>
                                             
                                          </button>
                                          <button class="btn btn-sm btn-danger">
                                             <i class="fa-solid fa-xmark"></i>
                                             
                                          </button>
                                       </div>
                                 </div>
                                 <div class="bg-light p-1 w-100">
                                    <span class="d-block fs-7 mb-2 text-secondary">Booking on Hold</span>
                                    <p class="fs-7 fs-8 my-1 text-dark">Please Approve or Decline the Booking.</p>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="dropdown">
                                 <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-ellipsis-vertical"></i></a>
                                 <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="">
                                    <li>
                                          <a class="dropdown-item" href="#"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    </li>
                                    <li>
                                          <a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i> View</a>
                                    </li>
                                    <li>
                                          <a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can"></i> Delete</a>
                                    </li>
                                 </ul>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td class="w-30">
                              <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                 <div class="d-flex justify-content-between px-1 w-100">
                                    <div class="requirment">
                                       <p class="fs-7 fw-bold mb-2 mt-0"> Booking ID : #78455 </p>
                                       <p class="fs-7 fw-bold mb-1 mt-0"> Iti ID : #9754 </p>
                                    </div>
                                    <div class="ms-2">
                                          <p class="fs-7 mb-2 mt-0 ">
                                             <strong class="d-block mb-1">Anup Soni</strong>
                                             <span title="Guest City" class="text-primary">Gujrat</span>
                                          </p>
                                    </div>
                                 </div>
                                 <div class="bg-light p-1 w-100">
                                    <div class="">
                                       <p class="fs-7 mb-2 mt-0 text-secondary">Sent Status </p>
                                       <div>
                                          <span class="me-3"> 
                                             <i class="fa-envelope fa-solid text-primary"></i> sent 3 Time 
                                          </span>
                                          <button class="btn btn-primary btn-x-sm"> Mail View</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                 <div class="d-flex justify-content-between w-100">
                                    <div class="px-2 mb-2">
                                       <strong class="d-block fs-7 mb-1">Manali</strong> 
                                       <span class="fs-8 fw-500 text-secondary">Hotel City</span>
                                    </div>
                                    <div class="px-2 mb-2">
                                       <strong class="d-block fs-7 mb-1">Solang Valley Resort Manali</strong> 
                                       <span class="fs-8 fw-500 text-secondary">Hotel Name</span>
                                    </div>
                                 </div>
                                 <div class="bg-light p-1 w-100">
                                    <p class="fs-7 m-0 mb-2 text-dark"><strong>Luxury Room</strong></p>
                                    <p class="fs-8 fw-400 m-0 text-dark">Room Category</p>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                 <div class="mb-2 px-2">
                                    <p class="fw-bold m-0 fs-7">04-Feb-2022</p>
                                    <span class="fs-8 text-secondary">Till 08-Feb (4N/5D)</span>
                                 </div>
                                 <div class="bg-light p-1 w-100">
                                    <span class="d-block fs-7 mb-2 text-muted">Agent</span>
                                    <a class="text-primary fw-bold" href="" title="View Agent">Bookings Team</a>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                 <div class="mb-2 px-2">
                                    <p class="fw-bold m-0 fs-7">
                                       <i class="fa-solid fa-indian-rupee-sign"></i> 58,000/-
                                    </p>
                                    <span class="fs-8 text-secondary">Total Cost</span>
                                 </div>
                                 <div class="bg-light p-1 w-100">
                                    <span class="d-block fs-7 mb-2 text-secondary">Booking Date </span>
                                    <p class="fs-8 fw-400 m-0 text-dark">26-Jan-2022</p>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                 <div class="mb-2 px-2">
                                    <p class="fs-7 mb-2 mt-0 text-secondary">Booking Status </p>
                                    <div class="badge bg-success">
                                       <strong> <i class="fa-solid fa-thumbs-up"></i> Approved</strong>
                                    </div>
                                 </div>
                                 <div class="bg-light p-1 w-100">
                                    <span class="d-block fs-7 mb-2 text-secondary">Approved Comment</span>
                                    <p class="fs-7 fs-8 my-1 text-dark">Booking Done by our side</p>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="dropdown">
                                 <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-ellipsis-vertical"></i></a>
                                 <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="">
                                    <li>
                                          <a class="dropdown-item" href="#"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    </li>
                                    <li>
                                          <a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i> View</a>
                                    </li>
                                    <li>
                                          <a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can"></i> Delete</a>
                                    </li>
                                 </ul>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td class="w-30">
                              <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                 <div class="d-flex justify-content-between px-1 w-100">
                                    <div class="requirment">
                                       <p class="fs-7 fw-bold mb-2 mt-0"> Booking ID : #0754 </p>
                                       <p class="fs-7 fw-bold mb-1 mt-0"> Iti ID : #9547 </p>
                                    </div>
                                    <div class="ms-2">
                                       <p class="fs-7 mb-2 mt-0 ">
                                          <strong class="d-block mb-1">Neha Firdous</strong>
                                          <span title="Guest City" class="text-primary">Uttar Pradesh</span>
                                       </p>
                                    </div>
                                 </div>
                                 <div class="bg-light p-1 w-100">
                                    <div class="">
                                       <p class="fs-7 mb-2 mt-0 text-secondary">Sent Status </p>
                                       <div>
                                          <span class="me-3"> 
                                             <i class="fa-envelope fa-solid text-primary"></i> Not Sent 
                                          </span>
                                          <button class="btn btn-primary btn-x-sm"> Mail View</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                 <div class="d-flex justify-content-between w-100">
                                    <div class="px-2 mb-2">
                                       <strong class="d-block fs-7 mb-1">Dharmshala</strong> 
                                       <span class="fs-8 fw-500 text-secondary">Hotel City</span>
                                    </div>
                                    <div class="px-2 mb-2">
                                       <strong class="d-block fs-7 mb-1">Hotel Grand View</strong> 
                                       <span class="fs-8 fw-500 text-secondary">Hotel Name</span>
                                    </div>
                                 </div>
                                 <div class="bg-light p-1 w-100">
                                    <p class="fs-7 m-0 mb-2 text-dark"><strong>Super Luxury Room</strong></p>
                                    <p class="fs-8 fw-400 m-0 text-dark">Room Category</p>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                 <div class="mb-2 px-2">
                                    <p class="fw-bold m-0 fs-7">05-Feb-2022</p>
                                    <span class="fs-8 text-secondary">Till 07-Feb (4N/5D)</span>
                                 </div>
                                 <div class="bg-light p-1 w-100">
                                    <span class="d-block fs-7 mb-2 text-muted">Agent</span>
                                    <a class="text-primary fw-bold" href="" title="View Agent">Mukesh Sharma</a>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                 <div class="mb-2 px-2">
                                    <p class="fw-bold m-0 fs-7">
                                       <i class="fa-solid fa-indian-rupee-sign"></i> 28,000/-
                                    </p>
                                    <span class="fs-8 text-secondary">Total Cost</span>
                                 </div>
                                 <div class="bg-light p-1 w-100">
                                    <span class="d-block fs-7 mb-2 text-secondary">Booking Date </span>
                                    <p class="fs-8 fw-400 m-0 text-dark">01-Feb-2022</p>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="align-bottom align-content-between d-flex flex-wrap h-100">
                                 <div class="mb-2 px-2">
                                    <p class="fs-7 mb-2 mt-0 text-secondary">Booking Status </p>
                                    <div class="badge bg-danger">
                                       <strong> <i class="fa-solid fa-xmark"></i> Canceled</strong>
                                    </div>
                                 </div>
                                 <div class="bg-light p-1 w-100">
                                    <span class="d-block fs-7 mb-2 text-secondary">Declined Comment</span>
                                    <p class="fs-7 fs-8 my-1 text-dark">Booking cancelled due to unavailability of rooms.</p>
                                 </div>
                              </div>
                           </td>
                           <td>
                              <div class="dropdown">
                                 <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa-solid fa-ellipsis-vertical"></i></a>
                                 <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="">
                                    <li>
                                          <a class="dropdown-item" href="#"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    </li>
                                    <li>
                                          <a class="dropdown-item" href="#"><i class="fa-solid fa-eye"></i> View</a>
                                    </li>
                                    <li>
                                          <a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can"></i> Delete</a>
                                    </li>
                                 </ul>
                              </div>
                           </td>
                        </tr>
                     </tbody>
               </table>
            </div>
         </div>            
         <!-- End end demo table design -->

         <!-- Begin portlet-body -->
         <div class="portlet-body">
            <div class="bg-white p-3 rounded-4 shadow-sm">
               <div class="table-responsive">
                  <table id= "hotels-booking" class="table table-striped display white_space_fix">
                     <thead>
                        <tr>
                           <th> # </th>
                           <th> ID </th>
                           <th> Iti ID </th>
                           <th> G/Name </th>
                           <th> City </th>
                           <th> Hotel Name </th>
                           <th> Room Cat</th>
                           <th> Checkin Date </th>
                           <th> Total Cost </th>
                           <th>Sent Status</th>
                           <th>Status</th>
                           <th>Action</th>
                           <th>Agent</th>
                        </tr>
                     </thead>
                     <tbody>
                        <!--datatables goes here-->
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <!-- End portlet-body -->
      </div>
      <!-- End page-content -->
   </div>
   <!-- End page-content-wrapper -->
</div>
<!-- End page-container -->


<div id="myModal" class="modal" role="dialog"></div>
<!-- Modal -->
<script type="text/javascript">
   jQuery(document).ready(function($){
   	$(document).on("click",".ajax_delete_booking",function(){
   		var id = $(this).attr("data-id");
   		if (confirm("Are you sure?")) {
   			$.ajax({
   				url: "<?php echo base_url(); ?>" + "AjaxRequest/ajax_delete_booking?id=" + id,
   				type:"GET",
   				data:id,
   				dataType: 'json',
   				cache: false,
   				success: function(r){
   					if(r.status = true){
   						location.reload();
   					  //console.log("ok" + r.msg);
   						//console.log(r.msg);
   					}else{
   						alert("Error! Please try again.");
   					}
   				}
   			});	
   		}   
   	});
   });

   jQuery(document).ready(function($){
   	$(document).on("click", ".ajax_booking_status", function(){
   		var iti_id = $(this).attr("data-id");
   		$.ajax({
   			url: "<?php echo base_url(); ?>" + "AjaxRequest/hotelbooking_status_popup",
   			type:"POST",
   			data:{ id: iti_id },
   			dataType: "json",
   			cache: false,
   			beforeSend: function(){
   				/*console.log("Please wait.......");*/
   			},
   			success: function(r){
   				if(r.status = true){
   					$( "#myModal" ).html('<div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h4 class="modal-title"> '  + r.s +' </h4><button type="button" class="close" data-dismiss="modal">Close</button></div><div class="modal-body"> <p>' + r.data + '</p></div></div></div>').fadeIn();
   					//console.log("ok" + r.data);
   				}else{
   					console.log("Error.......");
   				}
   			},
   			error: function(){
   				console.log("error");
   			}
   		});
   	});
   	jQuery(document).on("click", ".close",function(){
   		jQuery("#myModal").fadeOut();
   	});
   });
</script>
<script type="text/javascript">   
   var table;
   $(document).ready(function() {
       $("#daterange").daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            showDropdowns: true,
            minDate: new Date(2016, 10 - 1, 25),
            //singleDatePicker: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Tomorrow': [moment().add(1, 'days'), moment().add(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'Next 30 Days': [moment(), moment().add(30, 'days')],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month')
                    .endOf('month')
                ],
                'Last Three Month': [moment().subtract(3, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')],
            },
            autoUpdateInput: false,            
        },
        function(start, end, label) {
            $('#daterange').val(start.format('D MMMM, YYYY') + ' to ' + end.format('D MMMM, YYYY'));
            //$('#daterange').val(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $("#date_from").val(start.format('YYYY-MM-DD'));
            $("#date_to").val(end.format('YYYY-MM-DD'));            
            table.ajax.reload(null,true); 
        });
      
   	//Custom Filter
   	$(document).on("change", 'input[name=filter]:radio', function() {
   		var filter_val = $(this).val();
   		$("#filter_val").val( filter_val );
   		table.ajax.reload(null,true); 
   	});
   	
       //datatables
       table = $('#hotels-booking').DataTable({ 
   		"aLengthMenu": [[10,20, 50, 100, -1], [10, 25, 50, 100, 'All']],
           "processing": true, //Feature control the processing indicator.
           "serverSide": true, //Feature control DataTables' server-side processing mode.
           "order": [], //Initial no order.
   		language: {
   			search: "<strong>Search By Itinerary/Booking Id:</strong>",
   			searchPlaceholder: "Search..."
   		},
           // Load data for the table's content from an Ajax source
           "ajax": {
               "url": "<?php echo site_url('hotelbooking/ajax_hotelbooking_list')?>",
               "type": "POST",
   			   "data": function ( data ) {
   				   data.filter = $("#filter_val").val();
   				   data.date_from = $("#date_from").val();
   				   data.date_to = $("#date_to").val();
   			   } 
           },
           //Set column definition initialisation properties.
           "columnDefs": [
           { 
               "targets": [ 0 ], //first column / numbering column
               "orderable": false, //set not orderable
           },
           ],
   
       });
   });
</script>