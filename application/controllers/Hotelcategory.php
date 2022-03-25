<?php defined('BASEPATH') or exit('No direct script access allowed');

class Hotelcategory extends CI_Controller
{
    public function __Construct()
    {
        parent::__Construct();
        validate_login();
        $this->load->model("hotel_category_model");
    }


    public function index()
    {
        $user = $this->session->userdata('logged_in');
        if ($user['role'] == '99') {
            $data['categories'] = $this->hotel_category_model->getAllCategory();
            $this->load->view('inc/header');
            $this->load->view('inc/sidebar');
            $this->load->view('hotels/hotelcategory', $data);
            $this->load->view('inc/footer');
        } else {
            redirect("dashboard");
        }
    }


    /********** Save Hotel Category */
    public function saveHotelCategory()
    {
        /* update */
        if (!empty($_POST['id'])) {
            $update_data = array(
                'hotel_category_name'        => $_POST['hotel_category'],
            );
            $check_category_exist = $this->hotel_category_model->is_category_name_exists("hotel_category", "hotel_category_name", $_POST['hotel_category'], $_POST['id']);   
            if ($check_category_exist) {
                $this->session->set_flashdata('error',"Hotel Category name already exists.");
                redirect("hotelcategory");
                exit();
            }
            $where_key = array('id' => $_POST['id']);
            $update_data = $this->global_model->update_data("hotel_category", $where_key, $update_data);
            if ($update_data) {
                $this->session->set_flashdata('success',"Hotel Category Edit successfully.");
                redirect("hotelcategory");           
            } else {
                $this->session->set_flashdata('error',"Hotel Category not Edit successfully.");
					redirect("hotelcategory");
            }
        } else {
            /*add */
            $insert_data = array(
                'hotel_category_name'        => $_POST['hotel_category'],
            );
            $check_category_exist = $this->hotel_category_model->is_category_name_exists("hotel_category", "hotel_category_name", $_POST['hotel_category']);  
            if ($check_category_exist) {
                $this->session->set_flashdata('error',"Hotel Category name already exists.");
					redirect("hotelcategory");
					exit();
            }

            $insert_iti = $this->global_model->insert_data('hotel_category', $insert_data);
            if ($insert_iti) {
                $this->session->set_flashdata('success',"Hotel Category added successfully.");
					redirect("hotelcategory");          
            } else {
                $this->session->set_flashdata('error',"Hotel Category not added successfully.");
					redirect("hotelcategory");
            }
        }
    }


    /* add Hotel Category */
    public function addcategory($id = null)
    {
        $user = $this->session->userdata('logged_in');
        $data = '';
        if ($user['role'] == '99') {
            if (!empty($id)) {
                $categories['category'] = $this->hotel_category_model->geteditCategory($id);
            }
            $this->load->view('inc/header');
            $this->load->view('inc/sidebar');
            $this->load->view('hotels/addhotelcategory', $categories);
            $this->load->view('inc/footer');
        }
    }

    //update delete status 
	public function deletecategory(){
		$id = $this->input->get('id', TRUE);
		$where = array("id" => $id);
		$result = $this->global_model->update_del_status("hotel_category", $where);
		if( $result){
			$res = array('status' => true, 'msg' => "Hotel Category ca delete Successfully!");
			$this->session->set_flashdata('success',"Hotel Category delete Successfully!");
		}else{
			$res = array('status' => false, 'msg' => "Error! please try again later");
		}
		die(json_encode($res));
	}
}
