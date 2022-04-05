<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profit_model extends CI_Model{
    public $table = 'profi_loss_table';
	function __construct(){
        parent::__construct();
	}



    
  public function get_datatables(){
		$user = $this->session->userdata('logged_in');
		$user_id = $user["user_id"];
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
        $this->db->select('*');
        $this->db->from('profi_loss_table');
		// $this->db->where('agent_id', $user_id);
		$query = $this->db->get();
		return $query->result();
	}


	public function count_all(){
		$this->db->from('profi_loss_table');
		return $this->db->count_all_results();
	}

	public function count_filtered(){
		$this->db->from('profi_loss_table');
		return $this->db->count_all_results();
	}

}
?>