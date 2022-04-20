<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_Api_Model extends CI_Model{
	
	function __construct(){
        parent::__construct();
        
	}


	//datatable view all customers
	private function _get_datatables_query($user, $where , $q_type = null , $custom_where =NULL ){
		ini_set('max_execution_time', 10000);
		$u_id = $user->id;
		$role = $user->role;
		
		if( $q_type == "count" ){
			$this->db->select('customers_inquery.customer_id'); 
		}else{
			$this->db->select('customers_inquery.*,pay.travel_date,pay.iti_booking_status as booking_status, cf.customer_id as followup_id, itinerary.iti_status');
		} 
		
		
        $this->db->from('customers_inquery AS customers_inquery');
		$this->db->join('customer_followup AS cf', 'customers_inquery.customer_id = cf.customer_id', 'LEFT')
		->join('itinerary as itinerary', 'customers_inquery.customer_id = itinerary.customer_id', 'LEFT')
		->join('iti_payment_details as pay', 'customers_inquery.customer_id = pay.customer_id', 'LEFT');
		
		//add custom filter with Date Range
		if( isset( $_POST['filter'] ) && isset( $_POST['from'] ) && isset( $_POST['end'] ) ){
			$filter_data = trim($this->input->post('filter'));
			$date_from 	 = $this->input->post('from');
			$date_end 	 = $this->input->post('end');
			if( isset( $_POST['todayStatus'] ) && !empty( $_POST['todayStatus'] ) ){
				$date = $_POST['todayStatus'];
				//date can be month or day format eg: Y-m or Y-m-d
				$todayDate = $date;
				//$todayDate = date('Y-m-d', strtotime($today));
				switch( $filter_data ){
					case "9":
						//$this->db->where( "customers_inquery.cus_status", "9" );
						//$this->db->like( "customers_inquery.lead_last_followup_date", $todayDate );
						$this->db->where( "itinerary.iti_status", "9" );
						$this->db->like( array(  "itinerary.iti_decline_approved_date" => $todayDate, "itinerary.lead_created" => $todayDate ) );
						break;
					case "approved":
						$this->db->where( "itinerary.iti_status", "9" );
						$this->db->like( array(  "itinerary.iti_decline_approved_date" => $todayDate ) );
						break;
					case "revApproved":
						$this->db->where( "itinerary.iti_status", "9" );
						$this->db->where( "itinerary.lead_created <", $todayDate  );
						$this->db->like( array(  "itinerary.iti_decline_approved_date" => $todayDate ) );
						break;
					case "8":
						$this->db->where( "customers_inquery.cus_status", "8" );
						$this->db->like( array( "customers_inquery.lead_last_followup_date" => $todayDate, "customers_inquery.created" => $todayDate ) );
						break;
					case "declined":
						$this->db->where( "customers_inquery.cus_status", "8" );
						$this->db->like( array( "customers_inquery.lead_last_followup_date" => $todayDate ) );
						break;
					case "revDeclineLeads":
						$this->db->where( "customers_inquery.cus_status", "8" );
						$this->db->where( "customers_inquery.created <", $todayDate );
						$this->db->like( array( "customers_inquery.lead_last_followup_date" => $todayDate ) );
						break;
					case "callpicked":
						$this->db->where( 'customers_inquery.cus_last_followup_status' ,"Picked call");
						$this->db->where( 'customers_inquery.cus_status !=' , 8 );
						$this->db->like( array( "customers_inquery.lead_last_followup_date" => $todayDate, "customers_inquery.created" => $todayDate ) );
						break;
					case "callnotpicked":
						$this->db->where( 'customers_inquery.cus_last_followup_status' ,"Call not picked");
						$this->db->like( array( "customers_inquery.lead_last_followup_date" => $todayDate, "customers_inquery.created" => $todayDate ) );
						break;
					case "unwork":
						$this->db->like( array( "customers_inquery.created" => $todayDate, "customers_inquery.cus_last_followup_status" => 0  ) );
						break;
					case "pending":
						$this->db->where("(customers_inquery.cus_status = 0 OR itinerary.iti_status = 0 )");
						//$this->db->where( array( "customers_inquery.cus_status" => "0" ) );
						$this->db->like( "customers_inquery.created", $todayDate );
					break;
					//if get todays customer follow up customers_inquery
					case "getFollowUp":
						$this->db->join('iti_followup AS ifup', 'customers_inquery.customer_id = ifup.customer_id', 'LEFT');
						$this->db->where( "(( cf.call_status = 0 AND cf.nextCallDate LIKE '%$todayDate%') 	OR ( ifup.call_status = 0 AND ifup.nextCallDate LIKE '%$todayDate%' ))");
						//$this->db->or_where( "ifup.call_status = 0 AND ifup.nextCallDate LIKE '%$todayDate%'");
						//$this->db->where("cf.call_status", 0 );
						//$this->db->like("cf.nextCallDate", $todayDate);
					break;
					case "Qsent":
						$this->db->where( "itinerary.parent_iti_id" , 0 );
						$this->db->like( array( "itinerary.lead_created" => $todayDate, "itinerary.quotation_sent_date" => $todayDate ) );
					break;
					case "QsentPast":
						$this->db->where("itinerary.lead_created <", $todayDate );
						$this->db->like( array("itinerary.quotation_sent_date" => $todayDate ));
					break;
					case "QsentRevised":
						$this->db->where( "itinerary.parent_iti_id !=" , 0 );
						$this->db->like( array( "itinerary.quotation_sent_date" => $todayDate, "itinerary.lead_created" => $todayDate ) );
					break;
					case "all":
						$this->db->like( "customers_inquery.created", $todayDate );
						break;
				// 	default:
				// 		continue2;
				} 
			}else if( !empty($filter_data) && !empty($date_from) && !empty($date_end) ){
				$d_from 	= date('Y-m-d', strtotime($date_from));
				$d_to	 	= date('Y-m-d H:i:s', strtotime($date_end . "23:59:59"));
				$_month	 	= date('Y-m', strtotime($date_from));
				switch( $filter_data ){
					case "9":
						//$this->db->where( "customers_inquery.cus_status", "9" );
						//$this->db->where("customers_inquery.lead_last_followup_date >=", $d_from );
						//$this->db->where("customers_inquery.lead_last_followup_date <=", $d_to );
						$this->db->where( "itinerary.iti_status", "9" );
						$this->db->where("itinerary.iti_decline_approved_date >=", $d_from );
						$this->db->where("itinerary.iti_decline_approved_date <=", $d_to );
						break;
					case "8":
						$this->db->where( "customers_inquery.cus_status", "8" );
						$this->db->where("customers_inquery.lead_last_followup_date >=", $d_from );
						$this->db->where("customers_inquery.lead_last_followup_date <=", $d_to );
						break;
					case "callpicked":
						$this->db->where( "customers_inquery.cus_status", "Picked call" );
						$this->db->where("customers_inquery.lead_last_followup_date", $d_from );
						$this->db->where("customers_inquery.lead_last_followup_date <=", $d_to );
						$this->db->like( array( "customers_inquery.lead_last_followup_date" => $_month, "customers_inquery.created" => $_month ) );
						break;
					case "callnotpicked":
						$this->db->where( "customers_inquery.cus_status", "Call not picked" );
						$this->db->where("customers_inquery.lead_last_followup_date >=", $d_from );
						$this->db->where("customers_inquery.lead_last_followup_date <=", $d_to );
						break;
					case "pending":
						//$this->db->where( array( "customers_inquery.cus_status" => "0" ) );
						$this->db->where("((customers_inquery.cus_status = 0 AND cf.customer_id IS NOT NULL) OR itinerary.iti_status = 0 )");
						$this->db->where("customers_inquery.created >=", $d_from );
						$this->db->where("customers_inquery.created <=", $d_to ); 
						break;
					case "notwork": //not work if folloup not take
						$this->db->where( array( "customers_inquery.cus_status" => "0" ) );
						$this->db->where("cf.customer_id IS NULL");
						$this->db->where("customers_inquery.created >=", $d_from );
						$this->db->where("customers_inquery.created <=", $d_to ); 
					break;
					case "revDeclineLeadsMonth":
						$this->db->where( "customers_inquery.cus_status", "8" );
						$this->db->where( "customers_inquery.created <", $d_from );
						$this->db->like( array( "customers_inquery.lead_last_followup_date" => $_month ) );
						break;
					case "all":
						$this->db->where("customers_inquery.created >=", $d_from );
						$this->db->where("customers_inquery.created <=", $d_to ); 
						break;
					case "revised":
						$this->db->where("itinerary.is_amendment", 2 );
						$this->db->where("customers_inquery.created >=", $d_from );
						$this->db->where("customers_inquery.created <=", $d_to ); 
						break;
					case "hold":
						//$this->db->where( array( "itinerary.iti_status" => "9", "itinerary.publish_status" => "publish" ) );
						$this->db->where( array( "itinerary.publish_status" => "publish" ) );
						$this->db->where("pay.iti_booking_status !=", 0 );
						$this->db->where("customers_inquery.created >=", $d_from );
						$this->db->where("customers_inquery.created <=", $d_to ); 
						break;
					case "draft":
						$this->db->where( "itinerary.publish_status", "draft" );
						$this->db->where("customers_inquery.created >=", $d_from );
						$this->db->where("customers_inquery.created <=", $d_to ); 
						break;
					case "travel_date":
						$this->db->where("pay.travel_date >=", $d_from );
						$this->db->where("pay.travel_date <=", $d_to ); 
						break;
					case "QsentMonth":
						$this->db->where("itinerary.quotation_sent_date >=", date('Y-m-d', strtotime($date_from)) );
						$this->db->where("itinerary.quotation_sent_date <=", date('Y-m-d H:i:s', strtotime($date_end . "23:59:59")) );
						break;
					case "QsentPastMonth":
						$this->db->where("itinerary.lead_created <", $date_from );
						$this->db->like( array("itinerary.quotation_sent_date" => $_month ));
						break;
					case "revApprovedMonth":
						$this->db->where( "itinerary.iti_status", "9" );
						$this->db->where( "itinerary.lead_created <", $date_from  );
						$this->db->like( array(  "itinerary.iti_decline_approved_date" => $_month ) );
						break;
					case "revDeclineMonth":
						$this->db->where( "itinerary.iti_status", "7" );
						$this->db->where( "itinerary.lead_created <", $date_from  );
						$this->db->like( array(  "itinerary.iti_decline_approved_date" => $_month ) );
						break;
				// 	default:
				// 		continue2;
				} 
			}
        }
    }


        function get_datatables($user, $where = array(), $custom_where = NULL ){
            $this->_get_datatables_query($user, $where, $count = NULL , $custom_where);
            if($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
            if(isset($_POST['order'])){
                $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }else if(isset($this->order)){
                $order = $this->order;
                $this->db->order_by(key($order), $order[key($order)]);
            }
            $query = $this->db->get();
            return $query->result();
        }
	
}