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
            $doc_path =  dirname($_SERVER["SCRIPT_FILENAME"]) . '/site/assets/audio/'. date("Y") . '/' . date("m") . '/'  . $cus_id . '/';
            
            //check if path exists
            if(!is_dir($doc_path)){
                if (!mkdir($doc_path, 0777, true)) {
                    $message = [
                        'status' => 500,
                        'data' => [],
                        'message' => "File not uploaded. Please contact administrator."
                    ];
                    $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                }
            }
            
            $file_prefix = date("Y") . "/".  date("m") . "/" . $cus_id . "/";
            
            // file_put_contents('audio.mp3', base64_decode($data));
            if( isset( $_FILES['callAudio']['name'] ) && !empty( $_FILES['callAudio']['name'] ) ){  
                // $data =  base64_encode( file_get_contents( $_FILES['callAudio'] ) );
                define('UPLOAD_DIR', $doc_path);

                $path = $_FILES['callAudio']['tmp_name'];
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = base64_encode($data);

                $rea1 = base64_decode($base64);

                $f_n = $_FILES['callAudio']['name'];
                $n = str_replace(' ', '_', $rea1);
                $file_name = $iti_id . "_audio_{$cus_id}_"  . $n;

                file_put_contents('audio.mp3', base64_decode($base64));
                $file= UPLOAD_DIR .uniqid().'.mp3';
                 $res = file_put_contents($file, $base64);
                dump($res);die;
                
                // $config['allowed_types'] = 'mp3';
                $config['upload_path'] = $doc_path;
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                
                if(!$this->upload->do_upload($rea1)){
                   
						$err = $this->upload->display_errors();
                        $message = [
                            'status' => 500,
                            'data' => $err ,
                            'message' => "Fail to upload file."
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
                     $insert_id =   $this->AudioModel->AudioInsertdata($data);
                        if($insert_id){
                            $message = [
                                'status' => 200,
                                'data' => $callrecord ,
                                'message' => "Recoding Save successful"
                            ];
                            $this->response($message, REST_Controller::HTTP_OK);
                        }else{
                            $message = [
                                'status' => 500,
                                'data' => [] ,
                                'message' => "Fail to save image in database."
                            ];
                            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                        }
					}
					unset($config);
                }else{
                    $message = [
                        'status' => 500,
                        'data' => [],
                        'message' => "Audio file not present in request"
                    ];
                    $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                }

        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }

    }

}