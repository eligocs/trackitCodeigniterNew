<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profit_model extends CI_Model{
    // public $table = 'profi_loss_table';
	var $table = 'profi_loss_table';
	var $column_order = array(null, '*'); //set column field database for datatable orderable
	var $column_search = array('iti_id','cust_id','agent_id'); //set column field database for datatable searchable 
	var $order = array('id' => 'asc'); // default order 
	function __construct(){
        parent::__construct();
	}
		
	private function _get_datatables_query(){
			$this->db->from($this->table);
			$i = 0;
			foreach ($this->column_search as $item) // loop column 
			{
				if(isset($_POST['search']['value']) ? $_POST['search']['value'] : null)
			// if datatable send POST for search
				{
					if($i===0) // first loop
					{
						$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
						$this->db->like($item, $_POST['search']['value']);
					}
					else
					{
						$this->db->or_like($item, $_POST['search']['value']);
					}

					if(count($this->column_search) - 1 == $i) //last loop
						$this->db->group_end(); //close bracket
				}
				$i++;
			}
			if(isset($_POST['order'])) // here order processing
			{
				$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			} 
			else if(isset($this->order))
			{
				$order = $this->order;
				$this->db->order_by(key($order), $order[key($order)]);
			}
		}


		function get_datatables()
			{
				$this->_get_datatables_query();
				if($_POST['length'] != -1)
				$this->db->limit($_POST['length'], $_POST['start']);
				$query = $this->db->get();
				return $query->result();
			}

    
//   public function get_datatables(){
// 		$user = $this->session->userdata('logged_in');
// 		$user_id = $user["user_id"];
// 		if($_POST['length'] != -1)
// 		$this->db->limit($_POST['length'], $_POST['start']);
//         $this->db->select('*');
//         $this->db->from('profi_loss_table');
// 		$query = $this->db->get();
// 		return $query->result();
// 	}


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