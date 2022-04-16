
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller {
    public function __construct() {
        parent::__construct();
       
     }
     
     /*query generator api*/
    public function savequery(){
        if(!empty($_POST['Name'])){
            $insert_data = array(
                'name' => $_POST['Name'],
                'email' => $_POST['Phone'],
                'mobile' => $_POST['Email'],
                'date' => $_POST['Date'],
                'query_from' => 'Google Query',
            );
            $insert_iti = $this->global_model->insert_data('it_queries', $insert_data);
            if($insert_iti){
                echo json_encode([
                    'status'=> 200,
                    'data' => $insert_iti,
                    'msg'=> "Data Saved!",
                ]);
            }else{
                echo json_encode([
                    'status'=> 400,
                    'msg'=> 'Some Error!'
                ]);
            }
        }
	}

}
