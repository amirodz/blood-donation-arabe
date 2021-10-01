<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends CI_Controller
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
			
	$data['setting'] = $this->Settings_model->get_settings();
	//print_r($data['setting']);
	//print_r($_SESSION);

	$this->load->view('admin/header',$data);
	$this->load->view('admin/settings',$data);
	$this->load->view('admin/footer',$data);

	}
	
  function add()
    {
		
    	/*
    id	int(11) Auto Increment	
    site_title	varchar(100)	
    email_admin	varchar(255)	
    site_description	text	
    site_keywords	text	
    active_cache	int(11) [0]	
    theme	varchar(255)	

    	*/
		

	   $this->form_validation->set_rules('site_title', 'عنوان الموقع','trim|required',array('required'      => 'ملأ حقل %s إجباري .' ));
	   
	   $this->form_validation->set_rules('emailadmin', 'البريد الإلكتروني','trim|required',array('required'      => 'ملأ حقل %s إجباري .' ));
	   
        if ($this->form_validation->run() == FALSE)
        {
            // fails
	     $data['setting'] = $this->Settings_model->get_settings();
		 print_r($data['setting']);

	     $this->load->view('admin/settings',$data);
	        }
        else
        {
            //insert user details into db
            $data = array(
                'site_title' => $this->input->post('site_title'),
				'site_address' => $this->input->post('site_address'),
				'site_phone' => $this->input->post('site_phone'),
                'email_admin' => $this->input->post('emailadmin'),
                'site_description' => $this->input->post('site_description'),
                'site_keywords' => $this->input->post('site_keywords'),
				'active_cache' => $this->input->post('active_cache'),
                'theme' => $this->input->post('theme')
               );
			
             $this->db->where('id', '1');
             $insert_settings  =   $this->db->update('settings', $data);

            // $insert_settings  =  $this->db->insert('settings', $data);
			 
            if ($insert_settings)
            {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">تم تحديث البيانات بنجاح </div>');
                redirect('settings');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">هناك مشكل الرجاء المحاولة </div>');
                redirect('settings');
            }
        }
    }
}
