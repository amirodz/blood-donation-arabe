<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
	
	// get settings
	function get_settings()
	{
		$this->db->where('id', '1');
        $query = $this->db->get('settings');
		return $query->row_array();
	}
	

}?>