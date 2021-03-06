<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Newsletters extends CI_Controller {
	public function __construct(){
		parent::__construct();
		validate_login();
		$this->load->model('newsletter_model');
		$this->load->model('marketing_model');
		$this->load->helper('email');
		$this->load->helper('path');
		$this->load->helper('share');
	}
	public function index(){
		$user = $this->session->userdata('logged_in');
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95' || $user['role'] == '96'){
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('newsletter/newsletter_list');
			$this->load->view('inc/footer');
		}else{	
			redirect("dashboard");
		}
	}
	
	/* default template */
	public function template(){
		$user = $this->session->userdata('logged_in');
		$user_id = $user['user_id'];
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95' ){
			$data['templates'] = $this->newsletter_model->getdata("newsletter_templates", "id"); 
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('newsletter/template', $data);
			$this->load->view('inc/footer');
		}
		else{
			redirect("dashboard");
		}
	}
	
	/* Create newsletter */
	public function create(){
		$user = $this->session->userdata('logged_in');
		$user_id = $user['user_id'];
		$data["user_role"] = $user["role"];
		$data["marketing_category"] = $this->marketing_model->getAllCategory();
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95' || $user['role'] == '96' ){
			$data['templates'] = $this->newsletter_model->getdata("newsletter_templates"); 
			/* limit for show customer emails on page load */
			$limit = 1000;
			$data['customers'] = $this->newsletter_model->getcustomers( $limit ); 
			$data['textTemplate'] = $this->global_model->getdata('text_template');
			$data['imageTemplate'] = $this->global_model->getdata('image_template');
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('newsletter/create_newsletter', $data);
			$this->load->view('inc/footer');
		}else{
			redirect("dashboard");
		}
	}
	/*View Newsletter*/
	public function view(){
		$newsletter_id = trim($this->uri->segment(3));
		$temp_key = trim($this->uri->segment(4));
		$user = $this->session->userdata('logged_in');
		$user_id = $user['user_id'];
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95'){
			$where = array("id" => $newsletter_id , "temp_key" => $temp_key);
			$data['newsletter'] = $this->global_model->getdata( "newsletters", $where );
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('newsletter/view', $data);
			$this->load->view('inc/footer');
		}else if($user['role'] == '96'){
			$where = array("id" => $newsletter_id , "temp_key" => $temp_key, "agent_id" => $user_id );
			$data['newsletter'] = $this->global_model->getdata( "newsletters", $where );
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('newsletter/view', $data);
			$this->load->view('inc/footer');
		}else{
			redirect("login");
		}	
	}
	/* Edit Newsletter */
	public function edit(){
		$newsletter_id = trim($this->uri->segment(3));
		$temp_key = trim($this->uri->segment(4));
		$user = $this->session->userdata('logged_in');
		$data["marketing_category"] = $this->marketing_model->getAllCategory();
		$user_id = $user['user_id'];
		$data["user_role"] = $user['role'];
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95'){
			$where = array("id" => $newsletter_id , "temp_key" => $temp_key);
			$newsletters = $this->global_model->getdata( "newsletters", $where );
			$data['newsletter'] = $newsletters;
			$limit = 1000;
			if($newsletters){ 	
				/* $news = $newsletters[0];
				$sent_emails = explode(",", $news->emails); 
				if( $sent_emails ){
					$sent_emails_list = $sent_emails;
					$data['customers'] = $this->newsletter_model->getcustomers($limit, $sent_emails_list);
				}else{
					$data['customers'] = $this->newsletter_model->getcustomers($limit);
				} */
				$this->load->view('inc/header');
				$this->load->view('inc/sidebar');
				$this->load->view('newsletter/edit_newsletter', $data);
				$this->load->view('inc/footer');
			}else{
				redirect("newsletters");
			}	
		}else if( $user['role'] == '96' ){
			$where = array("id" => $newsletter_id , "temp_key" => $temp_key, "agent_id" => $user_id );
			$newsletters = $this->global_model->getdata( "newsletters", $where );
			$data['newsletter'] = $newsletters;
			$limit = 1000;
			if($newsletters){ 	
				/* $news = $newsletters[0];
				$sent_emails = explode(",", $news->emails); 
				if( $sent_emails ){
					$sent_emails_list = $sent_emails;
					$data['customers'] = $this->newsletter_model->getcustomers($limit, $sent_emails_list);
				}else{
					$data['customers'] = $this->newsletter_model->getcustomers($limit);
				} */
				$this->load->view('inc/header');
				$this->load->view('inc/sidebar');
				$this->load->view('newsletter/edit_newsletter', $data);
				$this->load->view('inc/footer');
			}else{
				redirect("newsletters");
			}
		}else{
			redirect("login");
		}	
	}
	
	//delete newsletters
	public function update_newsletter_del_status(){
		$id = $this->input->get('id', TRUE);
		$where = array("id" => $id);
		$result = $this->global_model->update_del_status("newsletters", $where);
		if( $result){
			$this->session->set_flashdata('success',"Newsletter Deleted Successfully.");
			$res = array('status' => true, 'msg' => "Newsletter delete Successfully!");
		}else{
			$res = array('status' => false, 'msg' => "Error! please try again later");
		}
		die(json_encode($res));
	}
	//update Deulat template request
	public function ajax_update_template(){
		$type = $this->security->xss_clean($this->input->post('type'));
		$data = array('template' => htmlspecialchars($this->input->post('template')));
		$id = $this->security->xss_clean($this->input->post('id'));
		$where = array( 'id' => $id );
		$result = $this->newsletter_model->update_data("newsletter_templates", $type, $where, $data);
		
		if( $result){
			$res = array('status' => true, 'msg' => "Template is updated Successfully!");
		}else{
			$res = array('status' => false, 'msg' => "Please Try Again ! cannot be updated");
		}
		die(json_encode($res));
	}
	
	/* Get All Marketing users list */	
	public function ajax_marketing_users_email_list(){
		if(isset($_POST["cat"]) && !empty( $_POST["cat"] ) ){
			$limit = 1000;
			$state 		= trim($_POST["state"]);
			$city 		= trim($_POST["city"]);
			$cat		= trim($_POST["cat"]);
			$res_html 	= "";
			
			$news_id	= isset( $_POST['news_id'] ) && !empty( $_POST['news_id'] ) ? $_POST['news_id'] : "";
			//if newsletter id exists
			if( !empty( $news_id  ) ){
				$where_n = array( "id" => $news_id );
				$newsletters = $this->global_model->getdata( "newsletters", $where_n );
				$sent_contacts = isset($newsletters[0]) && !empty($newsletters[0]->emails) ? explode(",", $newsletters[0]->emails) : ""; 
			}else{
				$sent_contacts = array();
			}
			
			//get data by cat id
			//get data by cat id
			if( $cat == "all_leads" ){ //all leads
				$table = "customers_inquery";
				$email_key = "customer_email";
				$name_key 	= "customer_name";
				$where = array("del_status" => 0 , "customer_contact !=" => "" );
				$get_data = $this->marketing_model->get_customer_contact_list( $table, $where, $email_key, $sent_contacts, $limit );
			}else if( $cat == "working_lead" ){ // working leads
				$table 			= "customers_inquery";
				$email_key = "customer_email";
				$name_key 		= "customer_name";
				$where = array("del_status" => 0 , "customer_contact !=" => "", "cus_status" => 0 );
				$get_data = $this->marketing_model->get_customer_contact_list( $table, $where, $email_key, $sent_contacts, $limit );
			}else if( $cat == "booked_lead" ){ //booked leads
				$table = "customers_inquery";
				$email_key = "customer_email";
				$name_key 	= "customer_name";
				$where = array("del_status" => 0 , "customer_contact !=" => "", "lead_close_status" => 0, "cus_status" => 9 );
				$get_data = $this->marketing_model->get_customer_contact_list( $table, $where, $email_key, $sent_contacts, $limit );
			}else if( $cat == "declined_lead" ){ //declined leads
				$table = "customers_inquery";
				$email_key = "customer_email";
				$name_key 	= "customer_name";
				$where = array("del_status" => 0 , "customer_contact !=" => "", "cus_status" => 8 );
				$get_data = $this->marketing_model->get_customer_contact_list( $table, $where, $email_key, $sent_contacts, $limit );
			}else if( $cat == "closed_lead" ){
				$table = "customers_inquery";
				$email_key = "customer_email";
				$name_key 	= "customer_name";
				$where = array("del_status" => 0 , "customer_email !=" => "", "lead_close_status" => 1 );
				$get_data = $this->marketing_model->get_customer_contact_list( $table, $where, $email_key, $sent_contacts, $limit );
			}else if( $cat == "process_lead" ){
				$name_key 	= "customer_name";
				$table		 = "customers_inquery";
				$email_key = "customer_email";
				$get_data = $this->marketing_model->get_process_leads_email_lists( $sent_contacts, $limit );
			}else if( $cat == "reference" ){
				$name_key 	= "name";
				$email_key = "email";
				$where = array("del_status" => 0 , "email !=" => "" );
				if( !empty( $state ) ){ $where["state"] = $state; }
				if( !empty( $city ) ){ $where["city"] = $city; }
				$get_data = $this->marketing_model->get_customer_contact_list( "reference_customers", $where,$email_key, $sent_contacts , $limit );
			}else{
				$name_key 	= "name";
				$email_key = "email_id";
				$where = array( "cat_id" => $cat, "del_status"	=> 0, "email_id !=" => "" );
				if( !empty( $state ) ) $where["state"] = $state;
				if( !empty( $city ) ) $where["city"] = $city;
				$get_data = $this->marketing_model->get_customer_contact_list( "marketing", $where, $email_key, $sent_contacts, $limit );
			}
			
			//if data exists
			if( !empty( $get_data ) ){
				$total = count( $get_data );
				
				$res_html .= "<div class='border form-group my-4 nl-input-field pb-2'>
						<h5 class='bg-light p-3' for='emails'><strong>Select Customer Emails:</strong></h5>
						<div class='p-3 border-bottom'>
							<label class='strong mb-2'>
								<input type='checkbox' id='checkAll'/> Select all
							</label>
							Total Records Found: <strong> {$total} </strong><br>
							<div class=''>
								<span class='red small'>Note:</span>
									<span class='small'><em> By click on select all you can select only first 1000 checkbox.</em></span>
							</div>
						</div>";
						
				$res_html .= "<div class='mails-db mt-2' id='mails-db'>";
							$list_id = 1;
							foreach( $get_data as $customer ){
								$company_name = isset( $customer->company_name ) && !empty( $customer->company_name ) ? $customer->company_name : "";
								$name = !empty( $company_name ) ? $company_name : $customer->$name_key;
								
								$email = $customer->$email_key;
								$res_html .= "<div class='all_mails'><input id='emaillist_{$list_id}'  class='form-check-input cus_emails' name='customer_email[]' type='checkbox' value='{$email}' /><label for='emaillist_{$list_id}'>{$email}< {$name} ></label></div>";
								$list_id++;
							} 
							$res_html .= "</div>
								<div class='clearfix'></div>
								<div class='clearfix'></div><div id='emails_res'></div>";
				$res_html .= "</div>";
				
				
				
				/* $res_html .= "<div class='well'><label class='strong'>
					<input type='checkbox' id='checkAll'/> Select all</label>
					<div class=''>
						Total Records Found: <strong> {$total} </strong><br>
						<span class='red small'>Note:</span>
							<span class='small'><em> By click on select all you can select only first 1000 checkbox.</em></span>
					</div></div>";
					
					$res_html .= "<div class='mails-db' id='mails-db'>";
					$list_id = 1;
					
					foreach( $get_data as $customer ){
						$name = $customer->name;
						$email = $customer->$email_key;
						$contact = $customer->$contact_key;
						
						$res_html .= "<div class='all_mails'><input id='emaillist_{$list_id}' required class='form-control cus_emails' name='customer_contacts[]' type='checkbox' value='{$contact}' /><label for='emaillist_{$list_id}'>{$contact} < {$name} ></label></div>";
						$list_id++;
					}
					
					$res_html .=  "</div>";	
					//$res_html .=  "<div class='clearfix'></div><a href='#' class='btn btn-success pull-right' id='loadMore'>LoadMore</a>";
					$res_html .=  "<div class='clearfix'></div><div id='emails_res'></div>"; */
				
				$res = array("status" => true, "msg" => "All Customers Found!", "res_html" => $res_html );
			}else{
				$res = array("status" => false, "msg" => "No customers found!");
			}
		}else{
			$res = array("status" => false, "msg" => "Invalid Request!");
		}
		die( json_encode($res) );
	}
	
	/* Send Newsletter For Customers */
	public function ajax_send_newsletter(){
		$user = $this->session->userdata('logged_in');
		$user_id = $user['user_id'];
		
		$subject 			= strip_tags($this->input->post("subject"));
		$customer_emails 	= $this->input->post("customer_email");
		$type				= $this->input->post("type");
		if($type == 3 ){
			$body			=  $this->input->post("imagetemplate");
			$youtube_link = "N/A" ;
			}
		elseif($type == 2){
			$body		= $this->input->post("texttemplate");
			$youtube_link = "N/A" ;
		}
		elseif($type == 1){
			$body				= $this->input->post("template");
			$youtube_link		= $this->input->post("youtube_link");
		}
		//$body = $hy;
		$temp_key	= $this->input->post("temp_key");
		$action		= $this->input->post("action_type");
		$slug		=  str_replace(' ', '-', strtolower( $subject ));

			/* $res = array('status' => false, 'msg'=>$body);
			die( json_encode($res) ); */
			//$res = array('status' => false, 'msg' => $body);
			//die( json_encode($res) );
		/* Create newsletter slug */
		$new_slug = create_unique_slug($subject, "newsletters","slug");
		$filtered_emails 	= array();
		
		if( !empty( $customer_emails ) && !empty($subject) && !empty($body)  ){
			foreach($customer_emails as $email){
				/* check email validation */
				if(valid_email( $email )){
					$filtered_emails[] = $email;
				}
			}	
			if( count($filtered_emails) > 0 ){
					/* if( $action	== "add" ){
						$news_emails = implode("," , $filtered_emails );
						$data = array(
							'subject' 		=> $subject,
							'temp_key' 		=> $temp_key,
							'youtube_link' 	=> $youtube_link,
							'body'		 	=> htmlspecialchars($body),
							'emails' 		=> $news_emails,
							'slug'			=> trim($new_slug),	
						);
						//post on social
						$insert_id = $this->global_model->insert_data( "newsletters", $data);
						if( $insert_id ){
							$news_id		= trim( $insert_id );
							$where 			= array("id" => $news_id );
							$get_data		= $this->global_model->getdata( "newsletters", $where );
							$news_letter 	= $get_data[0];
							$slug		 	= $news_letter->slug;
							$link 			= base_url() . "promotion/article/{$slug}";
							$subject		= $news_letter->subject;
							$youtube_link 	= $news_letter->youtube_link;
							
							if( !empty( $youtube_link ) ){
								$fb_message = "{$subject}. Click on link to watch video {$youtube_link} ";
								$twitter_status = "{$subject}. Click on link {$link} to see newsletter. Click to watch video {$youtube_link}";
							}else{
								$fb_message = "{$subject}";
								$twitter_status = "{$subject}. Click on link {$link} to see newsletter.";
							}
						
						}  
					}
					$res = array('status' => false, 'msg' => "All fields are required.");
					die( json_encode($res) ); */
				/*get admin email*/
				$admin_email = admin_email();
				$from = "info@Trackitinerary.com";
				/* clear email variable */
				$this->email->clear();
					$this->email
					->from($from, 'trackitinerary Pvt. Ltd.')
					->to( $admin_email )
					->bcc( $filtered_emails )
					->subject( $subject )
					->message( $body )
					->set_mailtype('html');
				/*send email*/
				$sent_mail = $this->email->send(); 
				//echo $this->email->print_debugger();
				$insert_id = "";
				if( $sent_mail ){
					/* Save newsletter data to database */
					if( $action	== "add" ){
						$news_emails = implode("," , $filtered_emails );
						$data = array(
							'subject' 		=> $subject,
							'temp_key' 		=> $temp_key,
							'youtube_link' 	=> $youtube_link,
							'body'		 	=> htmlspecialchars($body),
							'emails' 		=> $news_emails,
							'slug'			=> trim($new_slug),	
							'agent_id'		=> $user_id,	
						);
						//post on social
						$insert_id = $this->global_model->insert_data( "newsletters", $data);
						
						if( $insert_id ){
							$news_id		= trim( $insert_id );
							$where 			= array("id" => $news_id );
							$get_data		= $this->global_model->getdata( "newsletters", $where );
							$news_letter 	= $get_data[0];
							$slug		 	= $news_letter->slug;
							$link 			= base_url() . "promotion/article/{$slug}";
							$subject		= $news_letter->subject;
							$youtube_link 	= $news_letter->youtube_link;
							
							if( !empty( $youtube_link ) ){
								$fb_message = "{$subject}. Click on link to watch video {$youtube_link} ";
								$twitter_status = "{$subject}. Click on link {$link} to see newsletter. Click to watch video {$youtube_link}";
							}else{
								$fb_message = "{$subject}";
								$twitter_status = "{$subject}. Click on link {$link} to see newsletter.";
							}
							//post on social media
							//$post_on_fb = $this->_postfacebook( $link, $fb_message );
							//$post_on_tw = $this->_posttwitter( $twitter_status );
						}  
					}elseif( $action == "edit" ){
						/* Update newsletter data*/
						$type = $this->security->xss_clean($this->input->post('action_type'));
						$id = $this->security->xss_clean($this->input->post('id'));
						$where = array( 'id' => $id );
						$result = $this->newsletter_model->update_data_emails("newsletters",$where, $filtered_emails);
					}	
					
					$this->session->set_flashdata('success',"Newsletter Sent Successfully.");
					$res = array('status' => true, 'msg' => "Newsletter sent successfully.", "insert_id" => $insert_id, "temp_key" => $temp_key);
					$this->session->set_flashdata('msg',"Newsletter sent successfully.");
				redirect("newsletters/");	
				}else{
					$res = array('status' => false, 'msg' => "Newsletter not sent.");
					$this->session->set_flashdata('msg',"{$res}");
				redirect("newsletters/");	
				}
			}else{
				$res = array('status' => false, 'msg' => "No valid customer email.");
				$this->session->set_flashdata('msg',"{$res}");
				redirect("newsletters/");	
			}
				$this->session->set_flashdata('msg',"{$res}");
				redirect("newsletters/");			
		}else{
			$res = array('status' => false, 'msg' => "All fields are required.");
			$this->session->set_flashdata('msg',"{$res}");
				redirect("newsletters/");		
		}	
	}
	
	
	/* data table get all Newsletter */
	public function newsletter_list(){
		$user = $this->session->userdata('logged_in');
		$u_id = $user['user_id'];
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95' || $user['role'] == '96'){
			$list = $this->newsletter_model->get_datatables();
			$data = array();
			$no = $_POST['start'];
			if( !empty($list) ){
				foreach ($list as $newsletter) {
					$emails_ids = explode(',', $newsletter->emails);
					$len = count($emails_ids);
					if( $len > 3 ){
						$counter = 1;
						$newsletter_emails = "";
						foreach( $emails_ids as $email ){
							if( $counter === 3 ) {
								$newsletter_emails .= rtrim($newsletter_emails, ", ");
								$newsletter_emails .= " ..........";
								break;
							}
							$newsletter_emails .= "{$email}, "; 
							$counter++;
						}
					}else{
						$newsletter_emails = $newsletter->emails;
					}
					
					$row1="";
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $newsletter->id;
					$row[] = $newsletter->subject;
					$row[] = rtrim($newsletter_emails, ", ");
					$row[] = $newsletter->updated;
					$row[] = get_user_name($newsletter->agent_id);
					
					if( is_admin() ){
						$row1 = "<a title='delete' href='javascript:void(0)' data-id = {$newsletter->id} class='btn btn-danger ajax_delete_newsletter'><i class='fa-solid fa-trash-can'></i></a>";
					}
					$rowedit = "<a title='Send' href=" . site_url("newsletters/edit/{$newsletter->id}/{$newsletter->temp_key}") . " class='btn btn-success' ><i class='fa fa-paper-plane' aria-hidden='true'></i></a>";
					$row[] = "<div class='d-flex'><a title='view' href=" . site_url("newsletters/view/{$newsletter->id}/{$newsletter->temp_key}") . " class='btn btn-success' ><i class='fa-solid fa-eye'></i></a>" . $rowedit . $row1 . "</div>";
					
					$data[] = $row;
				}
			}	
			
			$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->newsletter_model->count_all(),
				"recordsFiltered" => $this->newsletter_model->count_filtered(),
				"data" => $data,
			);
			//output to json format
			echo json_encode($output);
		}	
	}
	
	/* Ajax get customers emails */
	public function ajax_get_customers_emails(){
		$page = $this->input->get("page");
		if( empty($page) &&  !is_numeric( $page ) ){
			$res = array( "status" => false, "msg" => "Invalid page number." );
			die( json_encode($res) );
		}
		$customer_emails = $this->newsletter_model->ajax_pagination_getcustomers( $page ); 
		
		$res_data = "";
		if( $customer_emails ){
			$list_id = 100;
			foreach( $customer_emails as $customer ){
				$email = $customer->customer_email;
				$res_data .= "<div class='all_mails'><input id='emaillist_{$list_id}'  class='form-check-input cus_emails' name='customer_email[]' type='checkbox' value='{$email}' /><label for='emaillist_{$list_id}'>{$email}</label></div>";
				$list_id++;
			}
			$res = array( "status" => true, "data" => $res_data );
		}else{
			$res = array( "status" => "all", "msg" => "No more customer emails." );
		}
		die( json_encode($res) );	
	}
	
	/* Ajax get Pending customers emails */
	public function ajax_get_customers_emails_pending(){
		$page = $this->input->get("page");
		$id = $this->input->get("id");
		
		if( empty($page) &&  !is_numeric( $page ) ){
			$res = array( "status" => false, "msg" => "Invalid page number." );
			die( json_encode($res) );
		}
		$where = array("id" => $id, "del_status" => 0 );
		$newsletters = $this->global_model->getdata( "newsletters", $where );
		$limit = 1;
		if($newsletters){ 	
			$news = $newsletters[0];
			$sent_emails = explode(",", $news->emails); 
			if( $sent_emails ){
				$sent_emails_list = $sent_emails;
			}else{
				$sent_emails_list = array();
			}
		}	
		
		$customer_emails = $this->newsletter_model->ajax_pagination_getcustomers( $page, $sent_emails_list ); 
		$res_data = "";
		if( $customer_emails ){
			$list_id = 100;
			foreach( $customer_emails as $customer ){
				$email = $customer->customer_email;
				$res_data .= "<div class='all_mails'><input id='emaillist_{$list_id}'  class='form-check-input cus_emails' name='customer_email[]' type='checkbox' value='{$email}' /><label for='emaillist_{$list_id}'>{$email}</label></div>";
				$list_id++;
			}
			$res = array( "status" => true, "data" => $res_data );
		}else{
			$res = array( "status" => "all", "msg" => "No more customer emails." );
		}
		die( json_encode($res) );	
	}

	// auto Post newsletter on facebook
	private function _postfacebook( $link, $msg ){
		$this->load->library('Socialpost');
		//get api credential	
		$PAGE_ID = get_soical_api('fb_page_id'); // The page you want to post to (you must be a manager)	
		$FACEBOOK_APP_ID = get_soical_api('fb_app_id'); // Your facebook app ID
		$FACEBOOK_SECRET = get_soical_api('fb_app_secret'); // Your facebook secret
		$ACCESS_TOKEN =get_soical_api('fb_access_token'); // The access token you receieved above
		
		$p_id		    = trim( $PAGE_ID );
		$fb_app_id		= trim( $FACEBOOK_APP_ID );
		$fb_secret		= trim( $FACEBOOK_SECRET );
		$fb_acc_tok     = trim( $ACCESS_TOKEN );
		if( !empty($p_id) &&  !empty($fb_app_id) && !empty($fb_secret) &&!empty($fb_acc_tok) ){
			$fb = new Facebook\Facebook([
			  'app_id' => $fb_app_id,
			  'app_secret' => $fb_secret,
			  'default_graph_version' => 'v2.2',
			  ]);
			  
			//Check for access token  
			try{
				$page_access_token = $fb->get("/{$p_id}/?fields=access_token", $ACCESS_TOKEN);
				$_decoded_access_token = $page_access_token->getDecodedBody();
				$ac =  $_decoded_access_token['access_token'];
			}catch(\Facebook\Exceptions\FacebookSDKException $e) {
				//echo "Error to get access token";
				//exit;
				log_message( 'debug', "Facebook API Error: $e->getMessage()" );
				//return false;
			}
			
			
			//Postdata array
			/* 	$linkData = [
			  'link' => 'http://www.belogical.biz',
			  'message' => 'User test message tst http://www.belogical.biz',
			]; */
			
			//Postdata array
			$linkData = [
			  'link' => $link,
			  'message' => $msg,
			];
			try {
				// Returns a `Facebook\FacebookResponse` object
				$response = $fb->post("/{$p_id}/feed", $linkData, $ac );
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
				log_message( 'debug', "Facebook API Error: $e->getMessage()" );
				//echo 'Error: ' . $e->getMessage();
				//exit;
				//return false;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
				log_message( 'debug', "Facebook API Error: $e->getMessage()" );
				//echo 'Error: ' . $e->getMessage();
				//exit;
				//return false;
			}
			return true;
		}else{
			//echo "Facebook API credencial error. Please contact your administrator.";
			return true;
		}
	}
	
	// auto Post newsletter on twitter
	private function _posttwitter( $t_status ){
		$this->load->library('Socialpost');
		
		$twitter_customer_key           = get_soical_api('twitter_api_key');
		$twitter_customer_secret        = get_soical_api('twitter_api_secret');
		$twitter_access_token           = get_soical_api('twitter_access_token');
		$twitter_access_token_secret    = get_soical_api('twitter_access_token_secret');
		
		$tw_cus_key = trim($twitter_customer_key);
		$tw_cus_sec = trim($twitter_customer_secret);
		$tw_cus_acc_tkn = trim($twitter_access_token);
		$tw_acc_sec = trim($twitter_access_token_secret);

		
		$c_keys = \Codebird\Codebird::setConsumerKey( $tw_cus_key, $tw_cus_sec );
		$cb = \Codebird\Codebird::getInstance();
		$getauth = $cb->setToken( $tw_cus_acc_tkn , $tw_acc_sec );
	
		$params = array(
		  'status' => $t_status,
		);
		$reply = $cb->statuses_update($params); 
		$status = $reply->httpstatus;
		if( $status == 200 ){
			return true;
			//echo "Twitter successfully posted.";
		}else{
			log_message( 'debug', 'Please check twitter api credencial' );
		}
		
		/* elseif( $status == 400 ){
			echo "Bad Request";
		}elseif( $status == 401 ){
			echo "Unauthorized";
		}elseif( $status == 403 ){
			echo "Twitter text limit/daily update limit exceeds";
		}else{
			echo "Error: {$status}";
		} */
	}	
	
	
	public function txtTemplate(){
	$user = $this->session->userdata('logged_in');
		$user_id = $user['user_id'];
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95'){
			$data['templates'] = $this->newsletter_model->getdata("newsletter_templates"); 
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('newsletter/textTemplate', $data);
			$this->load->view('inc/footer');
		}
		else{
			redirect("dashboard");
		}
	}
	//Edit text template
	public function editTemplate($id=null){
	$user = $this->session->userdata('logged_in');
		$user_id = $user['user_id'];
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95'){
			$where = array("id" => $id);
			$data['template'] = $this->global_model->getdata( "text_template", $where );	
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('newsletter/edittextTemplate', $data);
			$this->load->view('inc/footer');
		}
		else{
			redirect("dashboard");
		}
	}
	public function ajax_update_text_template(){
		$iti = serialize($this->input->post('group_iti'));
		$inclusion = serialize($this->input->post('group_inclusion'));
		$rand = getTokenKey(8); 
		$date = date("Ymd"); 
		$time = time(); 
		$slug 	= $rand . "_" . $date . "_" . $time; 
		$data = array('greeting' => htmlspecialchars($this->input->post('greeting')),
					   'offer' =>htmlspecialchars($this->input->post('offer')),
					   'welcome_note' =>htmlspecialchars($this->input->post('welcome_note')),
					   'inclusion' =>$inclusion,
					   'day_wis_Iti' =>$iti,
					   'slug'=>$slug,
					   'template_type'=>htmlspecialchars($this->input->post('template_type')),
					   'hotel_type' =>htmlspecialchars($this->input->post('hotel_type')),
					   'hotel_price' =>htmlspecialchars($this->input->post('hotel_price')),
					   );
		//$id = $this->security->xss_clean($this->input->post('id'));
//$where = array( 'id' => $id );
		$type="Add";
		$result = $this->newsletter_model->update_data("text_template", $type,'', $data);
		
		if( $result){
			$res = array('status' => true, 'msg' => "Template is updated Successfully!");
		}else{
			$res = array('status' => false, 'msg' => "Please Try Again ! cannot be updated");
		}
		die(json_encode($res));
	}
	public function ajax_update_text_edit_template(){
		$iti = serialize($this->input->post('group_iti'));
		$inclusion = serialize($this->input->post('group_inclusion'));
		$id = $this->input->post('id');
		$data = array('greeting' => htmlspecialchars($this->input->post('greeting')),
					   'offer' =>htmlspecialchars($this->input->post('offer')),
					   'welcome_note' =>htmlspecialchars($this->input->post('welcome_note')),
					   'inclusion' =>$inclusion,
					   'day_wis_Iti' =>$iti,
					   'template_type'=>htmlspecialchars($this->input->post('template_type')),
					   'hotel_type' =>htmlspecialchars($this->input->post('hotel_type')),
					   'hotel_price' =>htmlspecialchars($this->input->post('hotel_price')),
					   );
		//$id = $this->security->xss_clean($this->input->post('id'));
		$where = array( 'id' => $id );
		$result = $this->newsletter_model->update_data("text_template",'' ,$where, $data);
		
		if( $result){
			$res = array('status' => true, 'msg' => "Template is updated Successfully!");
		}else{
			$res = array('status' => false, 'msg' => "Please Try Again ! cannot be updated");
		}
		die(json_encode($res));
	}
	
	public function uploadImage(){
		$data = $_FILES['file'];
		$rand = getTokenKey(8); 
		$date = date("Ymd"); 
		$time = time(); 
		$slug 	= $rand . "_" . $date . "_" . $time; 
		$img_fname = $_FILES['file']['name'];
		$ext = $_FILES['file']['type'];
			$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/site/images/imageTemplate';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 1024 * 2;
			
            $config['file_name'] = $img_fname;
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('file')){
				$err = $this->upload->display_errors();
				echo "<div class='alert alert-danger'>{$err}</div>";
			}else{
				$data = $this->upload->data();
				$img_fname = $data['file_name'];
		
			//echo $img_fname;die;
			//file_put_contents('site/images/imageTemplate/'.$img_fname, $data);
			$insert_data = array( "img_name" => $img_fname, "url_path" =>$img_fname ,'slug'=> $slug  );
			$insert_id = $this->global_model->insert_data( "image_template", $insert_data);
			if( $insert_id ){
				$this->session->set_flashdata('success',"Image Added successfully.");
			}else{
				$this->session->set_flashdata('success',"Error .");
			}
		}
		redirect('newsletters/imagetemplateList');
	}
	public function templateList(){
		$user = $this->session->userdata('logged_in');
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95'){
			$data['data']= $this->newsletter_model->getdata('text_template', "id");
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('newsletter/templateList',$data);
			$this->load->view('inc/footer');
		}else{	
			redirect("dashboard");
		}
	}
	
	/*View Text Template*/
	public function viewTemplate($id=null){
		if($id){
		$user = $this->session->userdata('logged_in');
		$user_id = $user['user_id'];
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95'){
			$where = array("id" => $id);
			$data['Text_Template'] = $this->global_model->getdata( "text_template", $where );
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('newsletter/viewTexttemplate', $data);
			$this->load->view('inc/footer');
		}else{
			redirect("login");
		}
		}
		else{
			echo "404";
		}
		
	}
	//delete text template
	public function deleteTemplate($id=null){
		$where = array("id" => $id);
		$result = $this->global_model->delete_data("text_template", $where);
		if( $result){
			$this->session->set_flashdata('success',"Template Deleted Successfully.");
			$res = array('status' => true, 'msg' => "Template delete Successfully!");
		}else{
			$res = array('status' => false, 'msg' => "Error! please try again later");
		}
			redirect($_SERVER['HTTP_REFERER']);
	}
	//image template list 
		public function imagetemplateList(){
		$user = $this->session->userdata('logged_in');
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95'){
			$data['data']= $this->newsletter_model->getdata('image_template', "id");
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('newsletter/imagetemplatelis',$data);
			$this->load->view('inc/footer');
		}else{	
			redirect("dashboard");
		}
	}
	//Add Image Template
	public function imgTemplate(){
	$user = $this->session->userdata('logged_in');
		$user_id = $user['user_id'];
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95'){
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('newsletter/imageTemplate');
			$this->load->view('inc/footer');
		}
		else{
			redirect("dashboard");
		}
	}
	//editImgTemplate
	public function editImgTemplate($id=null){
		$user = $this->session->userdata('logged_in');
		$user_id = $user['user_id'];
		$where = array("id" => $id);
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95'){
			$data['img'] = $this->global_model->getdata("image_template",$where); 
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('newsletter/editimageTemplate', $data);
			$this->load->view('inc/footer');
		}
		else{
			redirect("dashboard");
		}
	}	
	//View Image Template
	public function viewImgTemplate($id=null){
		$user = $this->session->userdata('logged_in');
		$user_id = $user['user_id'];
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95'){
			$where = array("id" => $id);
			$data['img'] = $this->global_model->getdata("image_template",$where); 
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('newsletter/viewTmageTemplate', $data);
			$this->load->view('inc/footer');
		}
		else{
			redirect("dashboard");
		}
	}
	//delete Image template
	public function deleteImgTemplate($id=null){
		$where = array("id" => $id);
		$result = $this->global_model->delete_data("image_template", $where);
		if( $result){
			$this->session->set_flashdata('success',"Template Deleted Successfully.");
			$res = array('status' => true, 'msg' => "Template delete Successfully!");
		}else{
			$res = array('status' => false, 'msg' => "Error! please try again later");
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	//Edit image Template
	public function edituploadImage($id=null){
		if($id){
		$data = $_FILES['file'];
		$rand = getTokenKey(8); 
		$date = date("Ymd"); 
		$time = time(); 
		$slug 	= $rand . "_" . $date . "_" . $time; 
		$img_fname = $_FILES['file']['name'];
		$ext = $_FILES['file']['type'];
			$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/site/images/imageTemplate';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 1024 * 2;
			
            $config['file_name'] = $img_fname;
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('file')){
				$err = $this->upload->display_errors();
				
				$this->session->set_flashdata('error',"{$err}");
				redirect("newsletters/viewImgTemplate/$id");
			}else{
				$data = $this->upload->data();
				$img_fname = $data['file_name'];
		
		//echo $img_fname;die;
		//file_put_contents('site/images/imageTemplate/'.$img_fname, $data);
		$insert_data = array( "img_name" => $img_fname, "url_path" =>$img_fname ,'slug'=> $slug  );
		$whre = array('id'=>$id);
		
		$update_id = $this->global_model->update_data( "image_template",$whre, $insert_data);
		if( $update_id ){
			$this->session->set_flashdata('success',"Image Updated successfully.");
		}else{
			$this->session->set_flashdata('error',"Unable to update .");
		}
			}
			redirect("newsletters/viewImgTemplate/$id");
		}
	}
	function get_imagedata(){
			$id = $this->input->get("id");
		if( empty($id) &&  !is_numeric( $id ) ){
			$res = array( "status" => false, "msg" => "Invalid page number." );
			die( json_encode($res) );
		}
		$where = array("id"=>$id);
		$imagedata = $this->global_model->getdata('image_template', $where ); 
		
		$res_data = "";
		if( $imagedata ){
				
				$res_data .= "<div><textarea></textarea></div>";
				$list_id++;
			
			$res = array( "status" => true, "data" => $res_data );
		}else{
			$res = array( "status" => "all", "msg" => "No more customer emails." );
		}
		die( json_encode($res) );	
	}
	///newslettr send
	function send(){
		$user = $this->session->userdata('logged_in');
		$user_id = $user['user_id'];
		
		$subject 			= strip_tags($this->input->post("subject"));
		$customer_emails 	= $this->input->post("customer_email");
		$type				= $this->input->post("type");
		
		
		if($type == 3 ){
			$body			=  $this->input->post("imagetemplate");
			$youtube_link = "N/A" ;
			}
		elseif($type == 2){
			$body		= $this->input->post("texttemplate");
			$youtube_link = "N/A" ;
		}
		elseif($type == 1){
			$body				= $this->input->post("template");
			$youtube_link		= $this->input->post("youtube_link");
		}
		//$body = $hy;
		$temp_key	= $this->input->post("temp_key");
		$action		= $this->input->post("action_type");
		$slug		=  str_replace(' ', '-', strtolower( $subject ));

		/* Create newsletter slug */
		$new_slug = create_unique_slug($subject, "newsletters","slug");
		$filtered_emails 	= array();
		
		if( !empty( $customer_emails ) && !empty($subject) && !empty($body)  ){
			foreach($customer_emails as $email){
				/* check email validation */
				if(valid_email( $email )){
					$filtered_emails[] = $email;
				}
			}	
			if( count($filtered_emails) > 0 ){
					
				/*get admin email*/
				$admin_email = admin_email();
				$from = "info@Trackitinerary.com";
				/* clear email variable */
				$this->load->library('email');
				$this->email->clear();
					$this->email
					->from($from, 'trackitinerary Pvt. Ltd.')
					->to( $admin_email )
					->bcc( $filtered_emails )
					->subject( $subject )
					->message( $body )
					->set_mailtype('html');
				//send email
			$sent_mail = $this->email->send();  
				//echo $this->email->print_debugger();
				$insert_id = "";
				if( $sent_mail  ){
					/* Save newsletter data to database */
					if( $action	== "add" ){
						$news_emails = implode("," , $filtered_emails );
						$data = array(
							'subject' 		=> $subject,
							'temp_key' 		=> $temp_key,
							'youtube_link' 	=> $youtube_link,
							'body'		 	=> htmlspecialchars($body),
							'emails' 		=> $news_emails,
							'slug'			=> trim($new_slug),	
							'agent_id'		=> $user_id,	
						);
						//post on social
					
						$insert_id = $this->global_model->insert_data( "newsletters", $data);
						
						if( $insert_id ){
							$news_id		= trim( $insert_id );
							$where 			= array("id" => $news_id );
							$get_data		= $this->global_model->getdata( "newsletters", $where );
							$news_letter 	= $get_data[0];
							$slug		 	= $news_letter->slug;
							$link 			= base_url() . "promotion/article/{$slug}";
							$subject		= $news_letter->subject;
							$youtube_link 	= $news_letter->youtube_link;
							
							if( !empty( $youtube_link ) ){
								$fb_message = "{$subject}. Click on link to watch video {$youtube_link} ";
								$twitter_status = "{$subject}. Click on link {$link} to see newsletter. Click to watch video {$youtube_link}";
							}else{
								$fb_message = "{$subject}";
								$twitter_status = "{$subject}. Click on link {$link} to see newsletter.";
							}
							//post on social media
							//$post_on_fb = $this->_postfacebook( $link, $fb_message );
							//$post_on_tw = $this->_posttwitter( $twitter_status );
						}  
					}elseif( $action == "edit" ){
						/* Update newsletter data*/
						$type = $this->security->xss_clean($this->input->post('action_type'));
						$id = $this->security->xss_clean($this->input->post('id'));
						$where = array( 'id' => $id );
						$result = $this->newsletter_model->update_data_emails("newsletters",$where, $filtered_emails);
					}	
					
					$this->session->set_flashdata('success',"Newsletter Sent Successfully.");
					$res = array('status' => true, 'msg' => "Newsletter sent successfully.", "insert_id" => $insert_id, "temp_key" => $temp_key);
					$this->session->set_flashdata('error',"{$err}");
						redirect("newsletters/");
				}else{
					$res = array('status' => false, 'msg' => "Newsletter not sent.");
					$this->session->set_flashdata('error',"{$err}");
				redirect("newsletters/");
				}
			}else{
				$res = array('status' => false, 'msg' => "No valid customer email.");
				$this->session->set_flashdata('error',"{$err}");
				redirect("newsletters/");
			}	
		}else{
			$res = array('status' => false, 'msg' => "All fields are required.");
			$this->session->set_flashdata('error',"{$err}");
				redirect("newsletters/");
		}	
}
		//offerrs
		public function offers(){
		$user = $this->session->userdata('logged_in');
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95'){
			$data['data']= $this->newsletter_model->getdata('offer');
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('newsletter/offers',$data);
			$this->load->view('inc/footer');
		}else{	
			redirect("dashboard");
		}
	}
	//add OFfer
	public function addoffers($id=null){
			//echo 'yes'; die;
		$user = $this->session->userdata('logged_in');
		$user_id = $user['user_id'];
		if(!empty($id)){
		$where = array("offerid" => $id);
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95'){
			$data['offer'] = $this->global_model->getdata("offer",$where); 
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('newsletter/editOffer', $data);
			$this->load->view('inc/footer');
		}else{	
			redirect("dashboard");
		}
		}
		else{
		if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95'){
			$this->load->view('inc/header');
			$this->load->view('inc/sidebar');
			$this->load->view('newsletter/addOffer');
			$this->load->view('inc/footer');
		}
		else{	
			redirect("dashboard");
		}
		}
		}
	public function ajax_update_offer($id=null){
		$rand = getTokenKey(8); 
		$date = date("Ymd"); 
		$time = time(); 
		$slug 	= $rand . "_" . $date . "_" . $time; 
		//data For Offer
		$data1 = array('title1' => htmlspecialchars($this->input->post('title1')),
					  'title2' =>htmlspecialchars($this->input->post('title2')),
					  'title3' =>htmlspecialchars($this->input->post('title3')),
					  'offerslug'=>$slug,
					  'content1' =>htmlspecialchars($this->input->post('content1')),
					  'content2' =>htmlspecialchars($this->input->post('content2')),
					  'content3' =>htmlspecialchars($this->input->post('content3')),
					   );
		if(isset($_FILES["image"]["name"]) ){
			$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"]).'/site/images/offer';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 1024 * 2;
			//$config['max_width']  = 600;
           /// $config['max_height'] = 400;
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image')){
				$data = $this->upload->data();
				$img_fname = $data["file_name"];
				$data1['offer_image']=$img_fname;
			}
		}
		
		if(!empty($id)){
		$where = array("offerid" => $id);
		$result = $this->newsletter_model->update_data("offer",'',$where, $data1);
			
		}else{			   
		$type="Add";
		$result = $this->newsletter_model->update_data("offer", $type,'', $data1);
		}
		if( $result){
			$res = array('status' => true, 'msg' => "Offer is updated Successfully!");
			redirect('newsletters/offers');
		}else{
			$res = array('status' => false, 'msg' => "Please Try Again ! cannot be updated");
			redirect($_SERVER['HTTP_REFERER']);
		}
		
	}	
	//delete
		//delete Image template
	public function deleteOffer($id=null){
		$where = array("offerid" => $id);
		$result = $this->global_model->delete_data("offer", $where);
		if( $result){
			$this->session->set_flashdata('success',"Offer Deleted Successfully.");
			$res = array('status' => true, 'msg' => "Offer delete Successfully!");
		}else{
			$res = array('status' => false, 'msg' => "Error! please try again later");
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function viewOffer($id=null){
	$user = $this->session->userdata('logged_in');
	$user_id = $user['user_id'];
	if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95'){
		$where = array("offerid" => $id);
		$data['offer'] = $this->global_model->getdata("offer",$where); 
		$this->load->view('inc/header');
		$this->load->view('inc/sidebar');
		$this->load->view('newsletter/viewoffer', $data);
		$this->load->view('inc/footer');
	}
	else{
		redirect("dashboard");
	}
	}
	public function sendOffer($id=null){
	$user = $this->session->userdata('logged_in');
	$user_id = $user['user_id'];
	if( $user['role'] == '99' || $user['role'] == '98' || $user['role'] == '95'){
		$where = array("offerid" => $id);
		$data['offer'] = $this->global_model->getdata("offer",$where); 
		$this->load->view('inc/header');
		$this->load->view('inc/sidebar');
		$this->load->view('newsletter/sendoffer', $data);
		$this->load->view('inc/footer');
	}
	else{
		redirect("dashboard");
	}
	}
	///Offer send
	function sendoffers(){
		$user = $this->session->userdata('logged_in');
		$user_id = $user['user_id'];
		
		$subject 			= strip_tags($this->input->post("subject"));
		$customer_emails 	= $this->input->post("customer_email");
		$body				= $this->input->post("offertemplate");
		
		//$body = $hy;
		$temp_key	= $this->input->post("temp_key");
		$action		= $this->input->post("action_type");
		$slug		=  str_replace(' ', '-', strtolower( $subject ));

		/* Create newsletter slug */
		$new_slug = create_unique_slug($subject, "newsletters","slug");
		$filtered_emails 	= array();
		//Echo $body; die;
		if( !empty( $customer_emails ) && !empty($subject) && !empty($body)  ){
			foreach($customer_emails as $email){
				/* check email validation */
				if(valid_email( $email )){
					$filtered_emails[] = $email;
				}
			}	
			if( count($filtered_emails) > 0 ){
					
				/*get admin email*/
				$admin_email = admin_email();
				$from = "info@Trackitinerary.com";
				/* clear email variable */
				$this->load->library('email');
				$this->email->clear();
					$this->email
					->from($from, 'trackitinerary Pvt. Ltd.')
					->to( $admin_email )
					->bcc( $filtered_emails )
					->subject( $subject )
					->message( $body )
					->set_mailtype('html');
				//send email
			$sent_mail = $this->email->send();  
				//echo $this->email->print_debugger();
				$insert_id = "";
				if( $sent_mail  ){
					/* Save newsletter data to database */
					if( $action	== "add" ){
						$news_emails = implode("," , $filtered_emails );
						$data = array(
							'subject' 		=> $subject,
							'temp_key' 		=> $temp_key,
							'body'		 	=> htmlspecialchars($body),
							'emails' 		=> $news_emails,
							'slug'			=> trim($new_slug),	
							'agent_id'		=> $user_id,	
						);
						//post on social
					
						$insert_id = $this->global_model->insert_data( "sentoffers", $data);
						
					/* 	if( $insert_id ){
							$news_id		= trim( $insert_id );
							$where 			= array("id" => $news_id );
							$get_data		= $this->global_model->getdata( "sentoffers", $where );
							$news_letter 	= $get_data[0];
							$slug		 	= $news_letter->slug;
							$link 			= base_url() . "promotion/article/{$slug}";
							$subject		= $news_letter->subject;
							
							if( !empty( $youtube_link ) ){
								$fb_message = "{$subject}. Click on link to watch video {$youtube_link} ";
								$twitter_status = "{$subject}. Click on link {$link} to see newsletter. Click to watch video {$youtube_link}";
							}else{
								$fb_message = "{$subject}";
								$twitter_status = "{$subject}. Click on link {$link} to see newsletter.";
							}
							//post on social media
							//$post_on_fb = $this->_postfacebook( $link, $fb_message );
							//$post_on_tw = $this->_posttwitter( $twitter_status );
						}  
					}elseif( $action == "edit" ){
						/* Update newsletter data*/
						/*$type = $this->security->xss_clean($this->input->post('action_type'));
						$id = $this->security->xss_clean($this->input->post('id'));
						$where = array( 'id' => $id );
						$result = $this->newsletter_model->update_data_emails("newsletters",$where, $filtered_emails);
					}	 */
					
					$this->session->set_flashdata('success',"Offer Sent Successfully.");
					$res = array('status' => true, 'msg' => "Offer sent successfully.", "insert_id" => $insert_id, "temp_key" => $temp_key);
					$this->session->set_flashdata('msg',"{$err}");
				redirect("newsletters/offers");
				}
				}
				else{
					$res = array('status' => false, 'msg' => "Offer not sent.");
					$this->session->set_flashdata('error',"{$err}");
				redirect("newsletters/offers");
				}
			}else{
				$res = array('status' => false, 'msg' => "No valid customer email.");
				$this->session->set_flashdata('error',"{$err}");
				redirect("newsletters/offers");
			}	
		}else{
			$res = array('status' => false, 'msg' => "All fields are required.");
			$this->session->set_flashdata('error',"{$err}");
				redirect("newsletters/offers");
		}	


}
}
?>