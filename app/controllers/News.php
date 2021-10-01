<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
         
		 $this->load->database();

        // Load News model
        $this->load->model('News_model');
        //$this->load->model('Settings_model');

        // Load form helper and library
    	$this->load->helper('security');
        $this->load->helper(array('form','url'));
        // Load pagination library
        $this->load->library('pagination');
        $this->load->library(array('session', 'form_validation'));
        
		// Default controller name 
        $this->controller = 'admin'; 
        //$this->setting = $this->Settings_model->get_settings();

        // Per page limit
        $this->perPage = 10;
    }
    
    public function index(){
			if ( !$this->session->userdata('login')){
		 redirect('login');
	
		}	
		
        $data = array();
        
        // Get messages from the session
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }
        
        // If search request submitted
        if($this->input->post('submitSearch')){
            $inputKeywords = $this->input->post('searchKeyword');
            $searchKeyword = strip_tags($inputKeywords);
            if(!empty($searchKeyword)){
                $this->session->set_userdata('searchKeyword',$searchKeyword);
            }else{
                $this->session->unset_userdata('searchKeyword');
            }
        }elseif($this->input->post('submitSearchReset')){
            $this->session->unset_userdata('searchKeyword');
        }
        $data['searchKeyword'] = $this->session->userdata('searchKeyword');
        
        // Get rows count
        $conditions['searchKeyword'] = $data['searchKeyword'];
        $conditions['returnType']    = 'count';
        $rowsCount = $this->News_model->getRows($conditions);
        
        // Pagination config
        $config['base_url']    = base_url().'News/index/';
        $config['uri_segment'] = 3;
        $config['total_rows']  = $rowsCount;
        $config['per_page']    = $this->perPage;
        
        // Initialize pagination library
        $config['full_tag_open'] = "<ul class='pagination justify-content-center'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='page-item disabled'><li class='page-item active'><a class='page-link' href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['first_url'] = '';
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['next_link'] = '&gt;&gt;';
        $config['prev_link'] = '&lt;&lt;';
        $config['first_link'] = 'الأولي';
        $config['last_link'] = 'الأخيرة';
        $config['attributes'] = array('class' => 'page-link');


        $this->pagination->initialize($config);
        
        // Define offset
        $page = $this->uri->segment(3);
        $offset = !$page?0:$page;
        
        // Get rows
        $conditions['returnType'] = '';
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->perPage;
        $data['News'] = $this->News_model->getRows($conditions);
       
    	$header['page_title'] = 'إدارة الأخبار';
        $header['description'] = 'إدارة الأخبار';
        $header['keywords'] = 'إدارة الأخبار';
     //   $header['template'] = $this->setting['theme'];

        // Load the list page view
        $this->load->view(''.$this->controller.'/header', $header);
        $this->load->view(''.$this->controller.'/News', $data);
        $this->load->view(''.$this->controller.'/footer');
    }

    public function view($id){
        $data = array();
        
        // Check whether News id is not empty
        if(!empty($id)){
            $data['News'] = $this->News_model->getRows(array('id' => $id));
			
   	    $header['page_title'] = 'إدارة الأخبار';
        $header['description'] = 'إدارة الأخبار';
        $header['keywords'] = 'إدارة الأخبار';
      //  $header['template'] = $this->setting['theme'];
    
            // Load the details page view
            $this->load->view(''.$this->controller.'/header', $header);
            $this->load->view(''.$this->controller.'/News_view', $data);
            $this->load->view(''.$this->controller.'/footer');
        }else{
            redirect('News');
        }
    }
    
    public function add(){
        $data = array();
        $memData = array();
        
        // If add request is submitted
        if($this->input->post('memSubmit')){
            // Form field validation rules
            $this->form_validation->set_rules('post_title', 'العنوان', 'required');
            $this->form_validation->set_rules('post_content', 'الموضوع', 'required');
            
            // Prepare News data
            $memData = array(
                'post_title'     => $this->input->post('post_title'),
                'post_content'   => $this->input->post('post_content'),
				'read_more'   => $this->input->post('read_more')
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Insert News data
                $insert = $this->News_model->insert($memData);

                if($insert){
					//News has been added successfully.
                    $this->session->set_userdata('success_msg', 'تم إضافة الخبر بنجاح');
                    redirect('News');
                }else{
					//Some problems occured, please try again.
                    $data['error_msg'] = 'هناك مشكل ما الرجاء المحاولة';
                }
            }
        }
        
        $data['News'] = $memData;
        
        // Load the add page view
        			
   	    $header['page_title'] = 'إضافة خبر';
        $header['description'] = 'إضافة خبر';
        $header['keywords'] = 'إضافة خبر';
       // $header['template'] = $this->setting['theme'];
   
            // Load the details page view
        $this->load->view(''.$this->controller.'/header', $header);
        $this->load->view(''.$this->controller.'/News_add-edit', $data);
        $this->load->view(''.$this->controller.'/footer');
    }
    
    public function edit($id){
        $data = array();
        
        // Get News data
        $memData = $this->News_model->getRows(array('id' => $id));
        
        // If update request is submitted
        if($this->input->post('memSubmit')){
            // Form field validation rules
            $this->form_validation->set_rules('post_title', 'العنوان', 'required');
            $this->form_validation->set_rules('post_content', 'الموضوع', 'required');
            
            // Prepare News data
            $memData = array(
                'post_title'     => $this->input->post('post_title'),
                'post_content'   => $this->input->post('post_content'),
				'read_more'   => $this->input->post('read_more')
            );
            
            // Validate submitted form data
            if($this->form_validation->run() == true){
                // Update News data
                $update = $this->News_model->update($memData, $id);

                if($update){
					//News has been updated successfully.
                    $this->session->set_userdata('success_msg', 'تم تحديث الخبر بنجاح');
                    redirect('News');
                }else{
					//Some problems occured, please try again.
                    $data['error_msg'] = 'هناك مشكل ما الرجاء المحاولة';
                }
            }
        }

        $data['News'] = $memData;
        
        // Load the edit page view
			
   	    $header['page_title'] = 'تعديل خبر';
        $header['description'] = 'تعديل خبر';
        $header['keywords'] = 'تعديل خبر';
       // $header['template'] = $this->setting['theme'];
         
            // Load the details page view
        $this->load->view(''.$this->controller.'/header', $header);
	    $this->load->view(''.$this->controller.'/News_add-edit', $data);
        $this->load->view(''.$this->controller.'/footer');
    }
    
    public function delete($id){
        // Check whether News id is not empty
        if($id){
            // Delete News
            $delete = $this->News_model->delete($id);
            
            if($delete){
				//News has been removed successfully.
                $this->session->set_userdata('success_msg', 'تم حذف الخبر بنجاح');
            }else{
				//Some problems occured, please try again.
                $this->session->set_userdata('error_msg', 'هناك مشكل ما الرجاء المحاولة');
            }
        }
        
        // Redirect to the list page
        redirect('News');
    }
}
