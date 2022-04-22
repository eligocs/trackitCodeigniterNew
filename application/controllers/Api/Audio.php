<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';
 
class Audio extends \Restserver\Libraries\REST_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Api/AudioModel');
    }

    /* uplode cal record */
    public function callrecord_POST(){
        header("Access-Control-Allow-Origin: *");
        
        // Load Authorization Token Library
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if(!empty($is_valid_token ) && $is_valid_token['status'] === TRUE)  {
            
            $cus_id =  !empty($_POST['cus_id'])  ? $_POST['cus_id'] :  '';
            $iti_id =  !empty($_POST['iti_id']) ? $_POST['iti_id'] : '';
            
            $year = date("Y");
			$month = date("m");
            $doc_path =  dirname($_SERVER["SCRIPT_FILENAME"]) . '/site/assets/audio/'. date("Y") . '/' . date("m") . '-'  . $cus_id . '/';
            
            //check if path exists
            if(!is_dir($doc_path)){
                if (!mkdir($doc_path, 0777, true)) {
                    $message = [
                        'status' => 400,
                        'data' => [],
                        'message' => "File not uploaded. Please contact administrator."
                    ];
                    $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                }
            }
            
            $file_prefix = date("Y") . "/".  date("m") . "-" . $cus_id . "/";
            
            if( isset( $_FILES['callAudio']['name'] ) && !empty( $_FILES['callAudio']['name'] ) ){
                
                $f_n = $_FILES['callAudio']['name'];
                $n = str_replace(' ', '_', $f_n);
                $file_name = $iti_id . "_audio_{$cus_id}_"  . $n;

                $config['allowed_types'] = 'mp3';
                $config['upload_path'] = $doc_path;
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                
                if(!$this->upload->do_upload('callAudio')){
						$err = $this->upload->display_errors();
                        $message = [
                            'status' => 400,
                            'data' => $err ,
                            'message' => "Some Error"
                        ];
                        $this->response($message, REST_Controller::HTTP_NOT_FOUND);
					}else{
						$data_a = $this->upload->data();
						$callrecord = $file_prefix . $data_a['file_name'];
                        $data =  array(
                                'cus_id' => $cus_id,
                                'audio' => $callrecord,
                                'status' => 0,
                                'iti_id' => $iti_id,
                                'created_date' => current_datetime(),
                        );
                        $this->AudioModel->AudioInsertdata($callrecord);
                        $message = [
                            'status' => 200,
                            'data' => $callrecord ,
                            'message' => "Recoding Save"
                        ];
                        $this->response($message, REST_Controller::HTTP_OK);
					}
					unset($config);
                }

        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }

    }

}