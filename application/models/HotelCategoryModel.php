<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class HotelCategoryModel extends CI_Model{
	
	/* datatable filter varibles for hotels */
	public $table = 'hotel_category';

	
	function __construct(){
        parent::__construct();
		validate_login();
	}


		//check if category name already exists
		function is_category_name_exists( $table, $key, $val, $id = null ){
			$this->db->select('id');
			$this->db->where($key, trim($val) );
			//on 
			if( !empty( $id ) ){
				$this->db->where_not_in('id', $id);
			}
			$query = $this->db->get($table);
			if ($query->num_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}


    	/*get hotel Category*/
	public function getAllCategory( ){
		$this->db->select('*');
        $this->db->from('hotel_category');
		$this->db->where('del_status', 0);
       	$query = $this->db->get();
		$res = $query->result();
		
        // $resultdata = unserialize($res->hotel_category_name);
		if($res){
			$result = $res;
		}else{
			$result = false;
		}
		return $result;
	}


	public function geteditCategory($id){
		$this->db->select('*');
        $this->db->from('hotel_category');
		$this->db->where('id', $id);
       	$query = $this->db->get();
		$res = $query->first_row();
        // $resultdata = unserialize($res->hotel_category_name);
		if($res){
			$result = $res;
		}else{
			$result = false;
		}
		return $result;
	}


	
}
?>