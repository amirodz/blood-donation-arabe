<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_insert extends CI_Model{
    function __construct() {
        $this->tableName = 'user';
        $this->primaryKey = 'id';
    }
    
    public function update($data = array(),$id){
        if(!array_key_exists("created",$data)){
            $data['created'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("modified",$data)){
            $data['modified'] = date("Y-m-d H:i:s");
        }
		
		 $this->db->where('id', $id);
         $update = $this->db->update($this->tableName,$data);
        if($update){
            return true;
        }else{
            return false;    
        }
    }
}