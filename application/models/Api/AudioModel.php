<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AudioModel extends CI_Model
{
    protected $user_table = 'callrecord';

    	// Audio File Insert
	function AudioInsertdata($data){
        if($data){
            if ( $this->db->insert('callrecord',$data) ) {
                $id = $this->db->insert_id();
                $result = $id;
            } else {
                $result = false;
            }
            return $result;
        }
	}

}
