<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Donate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->helper('security');
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
       	$this->load->model('Settings_model');
        $this->load->model('user_model');
		$this->load->model('Pages_model');

    } 
	function index()
     {
		$setting = $this->Settings_model->get_settings();
		$data['notes'] = $this->Pages_model->notes_list();

		$data['page_title'] = $setting['site_title'].'|أنقد حياة إنسان';
		$data['keywords'] = $setting['site_keywords'];
		$data['description'] = $setting['site_description'];
        $data['template'] = $setting['theme'];
        $data['site_address'] = $setting['site_address'];
        $data['site_phone'] = $setting['site_phone'];

		$this->load->view(''.$setting['theme'].'/header', $data);
		$this->load->view(''.$setting['theme'].'/donate_view');
    	$this->load->view(''.$setting['theme'].'/footer');	
	}
	
	  function success()
    {
		$setting = $this->Settings_model->get_settings();
		$data['notes'] = $this->Pages_model->notes_list();

		$data['page_title'] = $setting['site_title'];
		$data['keywords'] = $setting['site_keywords'];
		$data['description'] = $setting['site_description'];
        $data['template'] = $setting['theme'];
        $data['site_address'] = $setting['site_address'];
        $data['site_phone'] = $setting['site_phone'];

		$this->load->view(''.$setting['theme'].'/header', $data);
		$this->load->view(''.$setting['theme'].'/donate_success');
    	$this->load->view(''.$setting['theme'].'/footer');	
	}
 
    function add()
    {
		
	/*
	fullname	varchar(255)
	sex varchar(255)
    adresss	text	
    city	varchar(255)	
    group1	varchar(255)	
    lastDonationDate	varchar(255)	
    firstNbr	varchar(255)	
    secondNbr	varchar(255)	
    thirdNbr	varchar(255)	
    contactMethod	varchar(255)	
    contactTime	varchar(255)
	created_at   date
	*/
		

	   $this->form_validation->set_rules('fullname', 'الإسم الكامل','trim|required',array('required'      => 'ملأ حقل %s إجباري .' ));
	   $this->form_validation->set_rules('city', 'المدينة','trim|required',array('required'      => 'ملأ حقل %s إجباري .' ));
        if ($this->form_validation->run() == FALSE)
        {
            // fails
		$setting = $this->Settings_model->get_settings();

		$data['page_title'] = $setting['site_title'];
		$data['keywords'] = $setting['site_keywords'];
		$data['description'] = $setting['site_description'];
        $data['template'] = $setting['theme'];
        $data['site_address'] = $setting['site_address'];
        $data['site_phone'] = $setting['site_phone'];

		$this->load->view(''.$setting['theme'].'/header', $data);
		$this->load->view(''.$setting['theme'].'/donate_view');
    	$this->load->view(''.$setting['theme'].'/footer');	


        }
        else
        {
            //insert user details into db
            $data = array(
                'fullname' => $this->input->post('fullname'),
				'sex' => $this->input->post('sex'),
                'adress' => $this->input->post('adress'),
                'city' => $this->input->post('city'),
                'group1' => $this->input->post('group1'),
				'lastDonationDate' => $this->input->post('lastDonationDate'),
                'firstNbr' => $this->input->post('firstNbr'),
                'secondNbr' => $this->input->post('secondNbr'),
                'thirdNbr' => $this->input->post('thirdNbr'),
                'contactMethod' => $this->input->post('contactMethod'),
                'contactTime' => $this->input->post('contactTime'),
				'created_at' => date('Y-m-d'),

            );

             $insert_user  =  $this->db->insert('donor', $data);
			 
            if ($insert_user)
            {
				//You are Successfully Registered!
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">شكرا لقد تم تسجيل بياناتك  لدينا سنتصل بك في حالة إحتجنا إليك</div>');
                redirect('Donate/success');
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">المعذرة الرجاء عادة المحاولة</div>');
                redirect('Donate/index');
            }
        }
    }
}
