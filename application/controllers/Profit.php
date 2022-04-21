<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Profit extends CI_Controller {
	public function __Construct(){
	   	parent::__Construct();
		validate_login();
		$this->load->model("Profit_model");
		$this->load->helper('email');
		$this->load->helper('path');
	}

	public function index(){
	    $user = $this->session->userdata('logged_in');
	    if( $user['role'] == 99 || $user['role'] == 98 || $user['role'] == 97 || $user['role'] == 93 ){
		$user = $this->session->userdata('logged_in');
		$user_id = $user["user_id"];
		$data['user_role'] 	= $user['role'];
		$data['user_id'] 	= $user['user_id'];
		$this->load->view('inc/header');
		$this->load->view('inc/sidebar');
		$this->load->view('profitloss/prfot_loss_file');
		$this->load->view('inc/footer'); 
	    }
	}

    /* Store  profit And Loss */
	public function calculate_profit_loss()
	{
		$cabPrice 	= 	!empty($_POST['cab_price']) ?  $_POST['cab_price']: 0;
		$hotelPrice = 	!empty($_POST['hotel_price']) ?  $_POST['hotel_price'] : 0;
		$volvoPrice =  	!empty($_POST['volvo_price']) ? $_POST['volvo_price'] : 0;
		$flightPrice =  !empty($_POST['flight_price']) ? $_POST['flight_price']: 0;
		$trainPrice = 	!empty($_POST['train_price']) ? $_POST['train_price'] : 0;
		$otherPrice = 	!empty($_POST['other_price'] ) ? $_POST['other_price'] : 0;
		if (!empty($_POST['is_loss_profit'])) {
			// $totalExpenses = $_POST['cab_price'] + $_POST['hotel_price'] + $_POST['volvo_price']  + $_POST['flight_price'] + $_POST['train_price'] + $_POST['other_price'];
			$totalExpenses = $cabPrice + $hotelPrice + $volvoPrice  + $flightPrice + $trainPrice + $otherPrice;
			if ($_POST['is_loss_profit'] == 1) {
				$calculateTotal  = $_POST['withoutMrg'] - $totalExpenses;
				$calculateTotalPer = ($calculateTotal / $_POST['withoutMrg']) * 100;
			} else if ($_POST['is_loss_profit'] == 2) {
				$calculateTotal = $totalExpenses - $_POST['withoutMrg'];
				$calculateTotalPer = ($calculateTotal / $totalExpenses) * 100;
			}
			if (!empty($_POST['editIti'])) {
				$where_key = array('id' => $_POST['editIti']);
				$update = array(
					'cab_price' => $_POST['cab_price'],
					'sellingPrice' => $_POST['sellingPrice'],
					'withoutMrg' => $_POST['withoutMrg'],
					'hotel_price' => $_POST['hotel_price'],
					'volvo_price' => $_POST['volvo_price'],
					'flight_price' => $_POST['flight_price'],
					'train_price' => $_POST['train_price'],
					'other_price' => $_POST['other_price'],
					'total_cost' => $_POST['total_cost'],
					'total_margin_cost' => $calculateTotal,
					'total_margin_per' => $calculateTotalPer,
					'is_loss_profit' => $_POST['is_loss_profit'],
				);
				$update_data = $this->global_model->update_data("profi_loss_table", $where_key, $update);
				if($update_data){
					$res = array('status' => true, 'msg' => "Update Data.");
				}
			} else {
				$insert_data = array(
					'iti_id' => $_POST['iti_id'],
					'cab_price' => $_POST['cab_price'],
					'sellingPrice' => $_POST['sellingPrice'],
					'withoutMrg' => $_POST['withoutMrg'],
					'hotel_price' => $_POST['hotel_price'],
					'volvo_price' => $_POST['volvo_price'],
					'flight_price' => $_POST['flight_price'],
					'train_price' => $_POST['train_price'],
					'other_price' => $_POST['other_price'],
					'total_cost' => $_POST['total_cost'],
					'total_margin_cost' => $calculateTotal,
					'total_margin_per' => $calculateTotalPer,
					'is_loss_profit' => $_POST['is_loss_profit'],
					'cust_id' => $_POST['cust_id'],
					'agent_id' => $_POST['agent_id'],
					'iti_decline_approved_date' => $_POST['iti_decline_approved_date'],
				);
				$insert = $this->global_model->insert_data('profi_loss_table', $insert_data);
				if($insert){
					$res = array('status' => true, 'msg' => "Store Data.");
				}
			}
		} else {
			$res = array('status' => false, 'msg' => "Error! Data not save.");
		}
		die(json_encode($res));
	}

	
	/* ajax request */
	public function  ajax_lis_profit(){
		$user = $this->session->userdata('logged_in');
		$u_id = $user['user_id'];
		$role = $user['role'];
		
		$list = $this->Profit_model->get_datatables();
        $data = array();
		$no = $_POST['start'];
        if(!empty($list)){
            foreach($list as $profitData){
				if( $profitData->is_loss_profit == 1 ){
					$l_pro_status = "<strong class='green'> ( Profit )</strong>";
				}else if($profitData->is_loss_profit == 2 ){
					$l_pro_status = "<strong class='red'> ( Loss )</strong>";
				}
				/*get customer information*/
				$get_customer_info =get_customer( $profitData->cust_id );
				$cust = $get_customer_info[0];
				$customer_name = $cust->customer_name;

                $no++;
				$row = array();
				$row[] = $no;
				$row[] = $profitData->iti_id;
				$row[] = date("d-m-Y", strtotime($profitData->iti_decline_approved_date));
				$row[] = $customer_name;
				$row[] =get_user_name( trim($profitData->agent_id) );
				$row[] = $profitData->sellingPrice;
				$row[] = $profitData->total_cost;
				$row[] = $profitData->total_margin_cost;
				$row[] = round($profitData->total_margin_per, 2);
				$row[] = $l_pro_status;
				$btn_view = "<a target='_blank' title='View' href=" . iti_view_link($profitData->iti_id) . " class='btn_eye' ><i class='fa-solid fa-eye' aria-hidden='true'></i></a>";
				$btn_view .= "
				<a  href='#'
						class='btn green uppercase editMargin' data-id='{$profitData->id}' data-itiid='{$profitData->iti_id}'>Edit Margin</a>";
			 	$row[] = $btn_view;
				$data[] = $row;
            }
        }
		$output = array(
		    "draw" 				=> $_POST['draw'],
			"recordsTotal" 		=> $this->Profit_model->count_all(),
			"recordsFiltered" 	=> $this->Profit_model->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

/* show model*/
public function renderModel(){
	if(!empty($_POST['type'] && $_POST['itiid'])){
		$isAmnd_rev = is_amendment_of_revised($_POST['itiid']);
		if(!empty($isAmnd_rev)){
			$this->db->select('*'); 
			$this->db->from('profi_loss_table'); 
			$this->db->where('id', $_POST['id'] ); 
			$q = $this->db->get();
			$data['dataEdit'] = $q->row();
			$data['data'] = $isAmnd_rev;
		}else{
			$this->db->select('*'); 
			$this->db->from('profi_loss_table'); 
			$this->db->where('id', $_POST['id'] ); 
			$q = $this->db->get();
			$data['dataEdit'] = $q->row(); 
		}
	}else{
		$this->db->select('*'); 
		$this->db->from('itinerary'); 
		$this->db->where('iti_id', $_POST['id'] ); 
		$q = $this->db->get();
		$data['data'] = $q->row(); 
	}
	$response = $this->load->view('profitloss/model', $data, TRUE);
	echo $response;
	
}
}
?>