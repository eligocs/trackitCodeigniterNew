<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Reference_customers extends CI_Controller {
	
	public function __Construct(){
	   	parent::__Construct();
		validate_login();
		$this->load->model("marketing_model");
	}
	public function index(){
		$user = $this->session->userdata('logged_in');
		if( $user['role'] == '99' || is_super_manager() || $user['role'] == '95' ){
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('reference_customers/all');
			$this->load->view('inc/footer');
		}
		else{	
			redirect("dashboard");
		}
	}
	//add marketing user
	public function add(){
		$user = $this->session->userdata('logged_in');
		if( $user['role'] == '99' || is_super_manager() || $user['role'] == '95'){
			$data['user_id'] = $user['user_id'];
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('reference_customers/add', $data);
			$this->load->view('inc/footer');
		}else{
			redirect("dashboard");
		}	
	}
	//insert ajax
	public function ajax_add_ref_customer(){
		if( isset( $_POST['inp']['name'] ) && !empty( $_POST['inp']['email'] ) ){
			$inp = $this->input->post('inp', TRUE);
			//strip tags from input
			foreach( $inp as $key=>$val ){
				$inp[$key] = strip_tags($val); 
			}
			$customer_id = $this->global_model->insert_data("reference_customers", $inp);
			if( $customer_id ){
				$res = array("status" => true, "msg" => "customer added successfully", "id" => $customer_id );
			}else{
				$res = array("status" => false, "msg" => "customer not added ." );
			}
			die( json_encode( $res ) );
		}
	}
	//edit marketing user
	public function edit($id){
		$user = $this->session->userdata('logged_in');
		if( $user['role'] == '99' || is_super_manager() || $user['role'] == '95'  || $user['role'] == '96'){
			if( !empty( $id ) && is_numeric( $id ) ){
				$m_id = trim( $id );
				$where = array("id" => $m_id);
				$data['m_user'] = $this->global_model->getdata( "reference_customers", $where );
				$data['user_id'] = $user['user_id'];
				$this->load->view('inc/header');
				$this->load->view('inc/sidebar');
				$this->load->view('reference_customers/edit', $data);
				$this->load->view('inc/footer');
			}else{
				redirect("dashboard");
			}	
		}	
	}
	
	//update referece customer
	public function ajax_update_ref_customer(){
		if( isset( $_POST['inp']['name'] ) && !empty( $_POST['inp']['email'] ) ){
			$id = $_POST['id'];
			$inp = $this->input->post('inp', TRUE);
			//strip tags from input
			foreach( $inp as $key=>$val ){
				$inp[$key] = strip_tags($val); 
			}
			$customer_id = $this->global_model->update_data("reference_customers", array("id" => $id), $inp);
			
			if( $customer_id ){
				$res = array("status" => true, "msg" => "customer added successfully" );
			}else{
				$res = array("status" => false, "msg" => "customer not added ." );
			}
			
		}else{
			$res = array("status" => false, "msg" => "Error: Please try again ." );
		}
			die( json_encode( $res ) );
	}
	
	//view marketing user
	public function view($id){
		$user = $this->session->userdata('logged_in');
		$user = $this->session->userdata('logged_in');
		$user_id = $user['user_id'];
		$data["user_id"] = $user['user_id'];
		$data["role"] 	= $user['role'];
		//get Customer followup data
		
		if( $user['role'] == '99' || is_super_manager() || $user['role'] == '95'){
			if( !empty( $id ) && is_numeric( $id ) ){
				$m_id = trim( $id );
				$where2 = array( "customer_id" => $m_id);
				$followUpData = $this->global_model->getdata("reference_customer_followup", $where2, "", "id");
				$where = array("id" => $m_id);
				$data['followUpData'] = $followUpData;
				$data['m_user'] = $this->global_model->getdata( "reference_customers", $where );
				$this->load->view('inc/header');
				$this->load->view('inc/sidebar');
				$this->load->view('reference_customers/view', $data);
				$this->load->view('inc/footer');
			}else{
				redirect("dashboard");
			}	
		}	
	}
	
	// update delete status marketing User
	public function ajax_ref_customer(){
		$id = $this->input->get('id', TRUE);
		$where = array("id" => $id);
		$result = $this->global_model->update_del_status("reference_customers", $where);
		if( $result){
			$this->session->set_flashdata('success',"Customer delete Successfully.");
			$res = array('status' => true, 'msg' => "Customer delete Successfully!");
		}else{
			$this->session->set_flashdata('error',"Error: Users not deleted.");
			$res = array('status' => false, 'msg' => "Error! please try again later");
		}
		die(json_encode($res));
	}

	/* data table get all referece customers */
	public function ajax_reference_customer_list(){
		$user = $this->session->userdata('logged_in');
		//Sort Variables
		$table = "reference_customers";
		$column_order = array(null, 'name'); 
		$column_search = array("name","contact", "email");
		$order = array('id' => 'DESC'); // default order 
		
		$where = array("del_status" => 0);
			
		//Get filter Data
		if( isset( $_POST['city_id'])  && isset( $_POST['state_id'] ) && !empty($_POST['state_id']) ){
			//if city_id not exists
			if( $_POST['city_id'] != "all"  ){
				$where["city"] 	= $_POST['city_id'];
			}	
			$where["state"] = $_POST['state_id'];
		}
		
		$list = $this->global_model->get_datatables( $table, $where, $column_order, $column_search, $order );
		$data = array();
		$no = $_POST['start'];
		if( !empty($list) )
		{
			foreach ($list as $customer){
					$del="";
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $customer->name;
					$row[] = $customer->email;
					$row[] = $customer->contact;
					$row[] = !empty( $customer->state ) ? get_state_name($customer->state) : "";
					$row[] = !empty( $customer->city ) ? get_city_name($customer->city) : "";
					
					if( is_admin() ){
						$del = "<a title='delete' href='javascript:void(0)' data-id = {$customer->id} class='btn_trash ajax_delete_user'><i class='fa-solid fa-trash-can'></i></a>";
					}
					$btn = "<a title='edit' href=" . site_url("reference_customers/edit/{$customer->id}") . " class='btn_pencil ajax_edit_user_table' ><i class='fa-solid fa-pen-to-square'></i></a>"; 
					$btn .= "<a title='edit' href=" . site_url("reference_customers/view/{$customer->id}") . " class='btn_eye' ><i class='fa-solid fa-eye'></i></a>"; 
					
					$row[] = $btn . $del;
					$data[] = $row;
			}
		}	
		
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->global_model->count_all_data($table, $where),
			"recordsFiltered" => $this->global_model->count_filtered($table, $where, $column_order, $column_search, $order ),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}
	
	/* Get City data By state Id */	
	public function cityListByStateId(){
		if(isset($_POST["state"])){
			$state_id = trim($_POST["state"]);
			// Define state and city array
			$city_list = get_city_list( $state_id );
			if( $city_list ){
				if($state_id !== ''){
					echo '<option value="">Select City</option>';
					foreach($city_list as $city){
						echo '<option value="'.$city->id.'">'.$city->name.'</option>';
					}
				}
			}else{
				echo '<option value="Other">Other City!</option>';
			}
			die();
		}
	}
	
	//Import marketing users
	public function import_marketing_users(){
		if( isset($_POST["Import"]) ){
			$filename = $_FILES["file"]["tmp_name"];
			if( $_FILES["file"]["size"] > 0 && $_FILES["file"]["type"] == "application/vnd.ms-excel" ){
				$file = fopen($filename, "r");
				$i = 0;
				$insert_data = array();
				while (($getData = fgetcsv($file, 10000, ",")) !== FALSE ){
					$i++;
					//skip first row
					if( $i == 1 ) continue;
					
					$insert_data[] = array(
						"cat_id"			=> $getData[1],
						"name"				=> $getData[2],
						"email_id"			=> $getData[3],
						"contact_number"	=> $getData[4],
						"whats_app_number"	=> $getData[5],
						"company_name"		=> $getData[6],
						"state"				=> $getData[7],
						"city"				=> $getData[8],
						"place"				=> $getData[9],
					);
				}
				//If data exists
				if( !empty( $insert_data ) ){
					$insert = $this->global_model->insert_batch_data( "marketing", $insert_data );
					if(!isset($insert)){
						echo "<script type=\"text/javascript\">
								alert(\"Invalid File:Please Upload CSV File.\");
							  </script>";
						$this->session->set_flashdata('error',"Error: Users not imported.");
					}else{
						$this->session->set_flashdata('success',"Users Imported successfully.");
						echo "<script type=\"text/javascript\">
							alert(\"User has been successfully Imported.\");
						</script>";
					}
				}else{
					$this->session->set_flashdata('error',"Error: Users not imported.");
				}	
				fclose($file);	
			}else{
				$this->session->set_flashdata('error',"Invalid File:Please Upload CSV File.");
			}
			redirect("marketing");	
		}else{
			redirect("marketing");	
		}	
		exit();
	}
	
	//Import Reference_customers
	public function import_ref_customers(){
		if( isset($_POST["Import"]) ){
			$filename = $_FILES["file"]["tmp_name"];
			if( $_FILES["file"]["size"] > 0 && $_FILES["file"]["type"] == "application/vnd.ms-excel" ){
				$file = fopen($filename, "r");
				$i = 0;
				$insert_data = array();
				while (($getData = fgetcsv($file, 10000, ",")) !== FALSE ){
					$i++;
					//skip first row
					if( $i == 1 ) continue;
					
					$insert_data[] = array(
						"name"				=> $getData[1],
						"email"				=> $getData[2],
						"contact"			=> $getData[3],
						"state"				=> $getData[4],
						"city"				=> $getData[5],
					);
				}
				//If data exists
				if( !empty( $insert_data ) ){
					$insert = $this->global_model->insert_batch_data( "reference_customers", $insert_data );
					if(!isset($insert)){
						echo "<script type=\"text/javascript\">
								alert(\"Invalid File:Please Upload CSV File.\");
							  </script>";
						$this->session->set_flashdata('error',"Error: Customers not imported.");
					}else{
						$this->session->set_flashdata('success',"Customers Imported successfully.");
						echo "<script type=\"text/javascript\">
							alert(\"User has been successfully Imported.\");
						</script>";
					}
				}else{
					$this->session->set_flashdata('error',"Error: Customers not imported.");
				}	
				fclose($file);	
			}else{
				$this->session->set_flashdata('error',"Invalid File:Please Upload CSV File.");
			}
			redirect("reference_customers");	
		}else{
			redirect("reference_customers");	
		}	
		exit();
	}
	
	/* Get City data By state Id */	
	public function ajax_get_ref_customer_city_list(){
		$state 	= $this->input->post("state", true);
		$city_html = "";
		$where = array( "state" => $state );
		$user_list = $this->marketing_model->get_city_list_by_cat_state( "reference_customers", $where );
		if( $user_list ){
			$all_count = $this->global_model->count_all( "reference_customers", $where );
			//Export Data buttong
			$city_html = "<button class='btn' title='Click to upload data' id='btn_export_data' data-state_id={$state} data-city_id=''> Export Data </button> ";
			
			$city_html .= "<button class='btn city_btn active' data-state_id={$state} data-city_id='all'> All ({$all_count}) </button> ";
			foreach( $user_list as $list ){
				$where_city 	= array( "city" => $list->city, "state" => $state );
				$count_data 	= $this->global_model->count_all("reference_customers", $where_city );
				$city_name		= get_city_name($list->city);
				$city_html		.= "<button class='btn city_btn' data-state_id={$state} data-city_id={$list->city} > {$city_name} ({$count_data}) </button> ";
			}
			$res = array( "status" => true, "msg" => "Success" , "city_data" => $city_html  );
		}else{
			$res = array( "status" => false, "msg" => "No Data Found."  );
		}
		die( json_encode( $res ) );
	}
	//ajax request to update Customer followup
	public function updateCustomerFollowup(){
		$user = $this->session->userdata('logged_in');
		$u_id = $user['user_id'];
		$role = $user['role'];
		$customer_id			= strip_tags($this->input->post("customer_id", TRUE));
		//echo  $customer_id; die;
		$agent_id				= strip_tags($this->input->post("agent_id", TRUE));
		//$temp_key				= strip_tags($this->input->post("temp_key", TRUE));
		$callType 				= strip_tags($this->input->post("callType", TRUE));
		$callSummary 			= strip_tags($this->input->post("callSummary", TRUE));
		$callSummaryNotpicked 	= strip_tags($this->input->post("callSummaryNotpicked", TRUE));
		$nextCallTime 			= strip_tags($this->input->post("nextCallTime", TRUE));
		$nextCallTimeNotpicked 	= strip_tags($this->input->post("nextCallTimeNotpicked", TRUE));
		$txtProspect 			= strip_tags($this->input->post("txtProspect", TRUE));
		$txtProspectNotpicked 	= strip_tags($this->input->post("txtProspectNotpicked", TRUE));
		$final_amount 			= strip_tags($this->input->post("final_amount", TRUE));
		$book_query 			= strip_tags($this->input->post("book_query", TRUE));
		$comment 				= strip_tags($this->input->post("comment", TRUE));
		
		
		$currentDate = current_datetime();
		
	if( !empty($customer_id) && !empty($callType)){
		 if( $callType == "Picked call" ){
				
				$where_iti = array( "customer_id" => $customer_id );
				$u_data = array( "cus_last_followup_status" => "Picked call" , "lead_last_followup_date" => $currentDate);
				//$update_status = $this->global_model->update_data( "customers_inquery", $where_iti, $u_data );
					
				$call_smry = $callSummary;
				$lead_status = $txtProspect;
				$nxt_call = $nextCallTime;
			}else{
				$call_smry = $callSummaryNotpicked;
				$lead_status = $txtProspectNotpicked;
				$nxt_call = $nextCallTimeNotpicked;
			}
			//Update status
			if( $callType == "Call not picked" ){
				if( empty( $book_query ) ||  $book_query != "9" ){
					$where_iti = array( "customer_id" => $customer_id );
					$u_data = array( "cus_last_followup_status" => "Call not picked", "lead_last_followup_date" 	=> $currentDate );
					//$update_status = $this->global_model->update_data( "customers_inquery", $where_iti, $u_data );
				}	
			}	
			
			$approved = "false";
			
			//update Lead status on decline
			if( $callType == "8" ){
				$where_iti = array( "customer_id" => $customer_id );
				//if reopen lead decline by customer
				$u_data = array( 
					"decline_reason"				=> $this->input->post('decline_reason', TRUE), 
					"decline_comment"				=> $this->input->post('decline_comment', TRUE), 
					"cus_status" 					=>8, 
					"lead_last_followup_date" 		=> $currentDate,
					"cus_last_followup_status" 		=> 8 
				);
				$update_status = $this->global_model->update_data( "customers_inquery", $where_iti, $u_data );
			} 
			
			$data= array(
				'customer_id' 		=> $customer_id,
				'callType' 			=> $callType,
				'callSummary' 		=> $call_smry,
				'comment' 			=> $comment,
				'nextCallDate'		=> $nxt_call,
				'customer_prospect'	=> $lead_status,
				'currentCallTime'	=> $currentDate,
				'agent_id'			=> $agent_id,
				'temp_key'			=> '',
			);
			
			//Update customer followUp last data
			$upf_data = array( "call_status" => 1 );
			$this->global_model->update_data("reference_customer_followup", array( "customer_id" => $customer_id ), $upf_data );
			
			$insert_id = $this->global_model->insert_data( "reference_customer_followup", $data );
			if( $insert_id ){
				$res = array('status' => true, 'msg' => "Call log detail update successfully!", "approved" => $approved, "customer_id" => $customer_id);
			}else{
				$res = array('status' => false, 'msg' => "Call log detail not update successfully!");
			}	
		}else{
			$res = array('status' => false, 'msg' => "Invalid request please try again later!");
		}
		die( json_encode($res) );
	}
}	

?>