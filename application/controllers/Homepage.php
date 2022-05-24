<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Homepage extends CI_Controller {
	public function __Construct(){
	 parent::__Construct();
	//  $this->load->library("google-api-php-client/src/Google_Client.php");
	//  $this->load->library("google-api-php-client/src/contrib/Google_DriveService.php");
	}
	

	public function index(){
		$data['info'] = $this->global_model->getdata('homepage_setting');
		$this->load->view('homepage/commingsoon',$data);
	}
	
	public function update_Info(){
		$id = $this->input->post('id');
		$counter = serialize($this->input->post('counter'));

		if($id){
			//$data = $this->input->post('inp', TRUE);
			$data = array(
					"logo_url"  => $this->input->post( 'logo_url'),
					"video_url" => $this->input->post( 'video_url'),
					"api_key"   => $this->input->post( 'api_key'),
					"address"   => $this->input->post( 'address'),
					"contact_no"=> $this->input->post( 'contact_no'),
					"counter"=> $counter,
					"website"   => $this->input->post( 'website'),
				);	
			$where = array("id"=>$id);	
			$result = $this->global_model->update_data("homepage_setting", $where, $data);
			if($result == true){
				$this->session->set_flashdata('success','Updated Homepage Info !');
				redirect("settings/homepage");
			}else{
				$this->session->set_flashdata('success','Error !');
				redirect("settings/homepage");
			}
	
		}
	}


	public function do_upload(){
		if(isset($_POST['type'])){
			$data = $_POST['image'];		
			list($type, $data) = explode(';', $data);
			list(, $data)      = explode(',', $data);
			
			$data = base64_decode($data);
			$imageName = 'logo'.time().'.png';
			file_put_contents('site/images/'.$imageName, $data);
			$data = array( "favicon" => $imageName );
			$id=1;
			$where = array("id"=>$id);	
			$result = $this->global_model->update_data("homepage_setting", $where, $data);			
			if( $result ){
				echo 'success';
			}else{
				echo "error";
			} 
			die();
		}else if($_POST['image']){
			$data = $_POST['image'];
			
			list($type, $data) = explode(';', $data);
			list(, $data)      = explode(',', $data);
			
			
			$data = base64_decode($data);
			$imageName = 'logo'.time().'.png';
			file_put_contents('site/images/'.$imageName, $data);
			$data = array( "logo_url" => $imageName );
			$id=1;
			$where = array("id"=>$id);	
			$result = $this->global_model->update_data("homepage_setting", $where, $data);			
			if( $result ){
				echo 'success';
			}else{
				echo "error";
			} 
			die();
			}
			// else if( isset($_POST['pdf_img']) && !empty($_POST['pdf_img']) ){
				// $name = $_FILES["file"]["name"];
				// $n = str_replace(' ', '_', $name);
				// $file_name = time() . "_" . $n; 
				// $config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/site/images/';
				// $config['allowed_types'] = 'jpg|jpeg|png';
				// $config['max_size'] = 1024 * 2;
				// $config['max_width']  = 779;
				// $config['max_height'] = 740;
				// $config['file_name'] = $file_name;
				// 	$this->load->library('upload', $config);
				// 	if(!$this->upload->do_upload('file')){
				// 		$err = $this->upload->display_errors();
				// 		$res = array('status' => false, 'msg' => 'The image you are attempting to upload doesn t fit into the allowed dimensions');
				// 		header('Content-Type: application/json');
				// 		 echo json_encode( $res );
				// 	}else{
				// 		$data = $this->upload->data();
				// 		$img_fname = $data['file_name'];
				// 		$id=$_POST['cus_id'];
				// 		$where = array("customer_id"=>$id);	
				// 		$data = array( "pdf_img" => $file_name );
				// 		$result = $this->global_model->update_data("itinerary", $where, $data);
				// 		$res = array('status' => true, 'msg' => "Image uploded ");
				// 		header('Content-Type: application/json');
				// 		 echo json_encode( $res );
				// 	}
				// unset($config);
				// $data = $_POST['pdf_img'];	
				// list($type, $data) = explode(';', $data);	
				// list(, $data)      = explode(',', $data);
				
				// $data = base64_decode($data);
				// $imageName = 'pdf_img'.time().'.png';				
				// file_put_contents('site/images/'.$imageName, $data);
				// $data = array( "pdf_img" => $imageName );
				// $id=$_POST['cus_id'];
				// $where = array("customer_id"=>$id);	
				// $data = array( "pdf_img" => $imageName );
				// $result = $this->global_model->update_data("itinerary", $where, $data);
				// if( $result ){
				// 	echo 'success';
				// }else{
				// 	echo "error";
				// } 
				// die();	
			}
		}
	
} 
  