<?php defined('BASEPATH') OR exit('No direct script access allowed');
   class Callrecord extends CI_Controller {
   	public $table = "callrecord";
   	public function __Construct(){
   	   	parent::__Construct();
   		validate_login();
   		$this->load->model("Callrecord_model");		
   	}
   	
   	//account details
   	public function index(){
   		$user = $this->session->userdata('logged_in');
   		$user_id = $user['user_id'];
   		$data['user_id'] = $user_id;
   		$data['user_role'] = $user['role'];		
           $data['callrecords'] = $this->global_model->getdata($this->table);
        //    dump($data);die;
   			$this->load->view('inc/header');
   			$this->load->view('inc/sidebar');
   			$this->load->view('AudioCall\callrecorde', $data);
   			$this->load->view('inc/footer');
   		
   	}

}