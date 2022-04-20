<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
 
class Customers extends \Restserver\Libraries\REST_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Api/Customer_Api_Model');
    }
    
    
    public function customerlist_POST(){
        header("Access-Control-Allow-Origin: *");
        
        // Load Authorization Token Library
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        
        $is_valid_token = $this->authorization_token->validateToken();
        if(!empty($is_valid_token ) && $is_valid_token['status'] === TRUE)  {

            $role =  $is_valid_token['data']->role;
            $u_id =  $is_valid_token['data']->id;

            if($role == '99 ' || $role == '98' || $role == '95'){

                $where = array("customers_inquery.del_status" => 0);
                //get customers by agent
                if( isset( $_POST['agent_id'] ) && !empty( $_POST['agent_id'] ) ){
                    $where["customers_inquery.agent_id"] = $_POST['agent_id'];
                }
            }elseif( $role == '96' ){
                if( is_teamleader() ){
                    $teammem = is_teamleader();
                    $where = array("customers_inquery.del_status" => 0);
                    $where_in = !empty($teammem) ? implode(",", $teammem) : $u_id;
                    $custom_where = "(customers_inquery.agent_id = {$u_id} OR customers_inquery.agent_id IN ({$where_in}))";
                }else{
                    $where = array("customers_inquery.del_status" => 0, "customers_inquery.agent_id" => $u_id);
                }
                
                //get customers by agent
                if( isset( $_POST['agent_id'] ) && !empty( $_POST['agent_id'] ) ){
                    $where["customers_inquery.agent_id"] = $_POST['agent_id'];
                }
            } 
            
            $list = $this->Customer_Api_Model->get_datatables($is_valid_token['data'], $where, $custom_where);
            if( !empty($list) ){
                $message = [
                    'status' => 200,
                    'data' => $list,
                    'message' => "Successful ! "
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            }else{
                $message = [
                    'status' => 200,
                    'data' => [],
                    'message' => "No Data Found"
                ];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);

            }
        }
    }

}