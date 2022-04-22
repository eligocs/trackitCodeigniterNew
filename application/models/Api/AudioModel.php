<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AudioModel extends CI_Model
{
    protected $user_table = 'callrecord';

    	// Audio File Insert
	function AudioInsertdata($data){
        if($data){
            $ins_qry=$this->db->insert('callrecord',$data);
            if($ins_qry){
                return true;
            }else{
                return false;
            }
        }
	}

}
