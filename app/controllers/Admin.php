<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->helper('security');

        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
        $this->load->model('User_model');
	    $this->load->model('Settings_model');

    }
	
    function index()
    {
	if ( !$this->session->userdata('login')){
		 redirect('login');
	
		}			
	    ## Total number of records without filtering
    $sel = $this->db->query("select count(*) as allcount from donor");
    $records = $sel->row_array();
    $data['allcount'] = $records['allcount'];
	
    $query = "select year(created_at) as year, month(created_at) as month, count(sex) as total_female from donor WHERE sex = 'أنثي' group by year(created_at), month(created_at) ";  
    $result = $this->db->query($query);   
    $rows = $result->row_array();
	
	//print_r($rows);
	
    $monthNum = $rows['month'];
	
    $dateObj = DateTime::createFromFormat('!m', $monthNum);
    $data['monthName'] = $dateObj->format('F');
	
	//echo $data['monthName'];
     // print_r($dateObj);

    $data['year'] =   $rows['year']; 
    $data['total_female'] =   $rows['total_female'];
	//echo  $data['total_female'];
   //echo days_in_month($monthNum, $rows['year']);

	$this->load->view('admin/header');
	$this->load->view('admin/index',$data);
	$this->load->view('admin/footer');

	}
	
   
}
