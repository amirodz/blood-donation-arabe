<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
  
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
		$this->load->helper('security');
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
        $this->load->model('user_model');
		$this->load->model('Pages_model');
        $this->controller = 'admin'; 

    }
  
    public function index()
    {
			if ( !$this->session->userdata('login')){
		 redirect('login');
	
		}	
        $data['notes'] = $this->Pages_model->notes_list();
        $data['title'] = 'Notes List';
 		
		$header['page_title'] = 'إدارة الأخبار';
        $header['description'] = 'إدارة الأخبار';
        $header['keywords'] = 'إدارة الأخبار';
            
            // Load the details page view
        $this->load->view(''.$this->controller.'/header', $header);
        $this->load->view(''.$this->controller.'/pages_list', $data);
		$this->load->view(''.$this->controller.'/footer');
    }
  
    public function create()
    {
		
        $data['title'] = 'إضافة صفحة';
		$header['page_title'] = 'إضافة صفحة';
        $header['description'] = 'إضافة صفحة';
        $header['keywords'] = 'إضافة صفحة';
            
            // Load the details page view
        $this->load->view(''.$this->controller.'/header', $header);
        $this->load->view(''.$this->controller.'/pages_create', $data);
		$this->load->view(''.$this->controller.'/footer');

    }
      
    public function edit($id)
    {
		
        $id = $this->uri->segment(3);
        $data = array();
 
        if (empty($id))
        { 
         show_404();
        }else{
          $data['note'] = $this->Pages_model->get_notes_by_id($id);
		 
		  $header['page_title'] = 'تعديل صفحة';
          $header['description'] = 'تعديل صفحة';
          $header['keywords'] = 'تعديل صفحة';
            
            // Load the details page view
          $this->load->view(''.$this->controller.'/header', $header);
          $this->load->view(''.$this->controller.'/pages_edit', $data);
		  $this->load->view(''.$this->controller.'/footer');

        }
    }
    public function store()
    {
 
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        //$this->form_validation->set_rules('read_more', 'read_more', 'required');

        $id = $this->input->post('id');
 
        if ($this->form_validation->run() === FALSE)
        {  
            if(empty($id)){
              redirect( base_url('Pages/create') ); 
            }else{
             redirect( base_url('Pages/edit/'.$id) ); 
            }
        }
        else
        {
            $data['note'] = $this->Pages_model->createOrUpdate();
            redirect( base_url('Pages') ); 
        }
         
    }
     
     
    public function delete()
    {
        $id = $this->uri->segment(3);
         
        if (empty($id))
        {
            show_404();
        }
                 
        $notes = $this->Pages_model->delete($id);
         
        redirect( base_url('Pages') );        
    }

}
