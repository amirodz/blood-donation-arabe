<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Gallery extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
        $this->load->helper('security');
		$this->load->helper('text');
        $this->load->model('News_model');
		$this->load->library('pagination');
        $this->perPage = 10;

        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
        // Load image model 
        $this->load->model('image'); 
		$this->load->model('user_model');
		$this->load->model('Settings_model');
		$this->load->model('Pages_model');
        $this->setting = $this->Settings_model->get_settings();

        // Default controller name 
        $this->controller = $this->setting['theme']; 
    } 
     
    public function index(){ 
        $data = array(); 
         
        $con = array( 
            'where'=> array( 
                'status' => 1 
            ) 
        ); 
		
        $data['gallery'] = $this->image->getRows($con); 
		$data['notes'] = $this->Pages_model->notes_list();

        $data['title'] = 'ألبوم الصور'; 
        $data['page_title'] = 'ألبوم الصور'; 
        $data['description'] = 'ألبوم الصور'; 
        $data['keywords'] = 'ألبوم الصور'; 
        $data['template'] = $this->setting['theme'];
        $data['site_address'] = $this->setting['site_address'];
        $data['site_phone'] = $this->setting['site_phone'];

        // Load the list page view 
        $this->load->view(''.$this->controller.'/header', $data); 
        $this->load->view(''.$this->controller.'/gallery', $data); 
        $this->load->view(''.$this->controller.'/footer'); 
    } 
	public function single_image($id){ 
        $data = array(); 
        // Check whether id is not empty 
        if(!empty($id)){ 
            $con = array('id' => $id); 
            $data['image'] = $this->image->getRows($con); 
			//print_r($data);
            $data['title'] = $data['image']['title']; 
             
            // Load the details page view 
            $data['page_title'] = $data['image']['title']; 
            $data['description'] = 'ألبوم الصور'; 
            $data['keywords'] = 'ألبوم الصور'; 
		    $data['notes'] = $this->Pages_model->notes_list();
            $data['template'] = $this->setting['theme'];
            $data['site_address'] = $this->setting['site_address'];
            $data['site_phone'] = $this->setting['site_phone'];

           // Load the list page view 
            $this->load->view(''.$this->controller.'/header', $data); 
            $this->load->view(''.$this->controller.'/image', $data); 
            $this->load->view(''.$this->controller.'/footer'); 
        }else{ 
            redirect('gallery'); 
        } 
    } 
   public function news(){
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
        $config['base_url']    = base_url().'news/page/';
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
        //$config['first_link'] = 'الأولي';
        //$config['last_link'] = 'الأخيرة';
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
        $data['notes'] = $this->Pages_model->notes_list();

    	$data['page_title'] = ' الأخبار';
        $data['description'] = ' الأخبار';
        $data['keywords'] = ' الأخبار';
        $data['template'] = $this->setting['theme'];
        $data['site_address'] = $this->setting['site_address'];
        $data['site_phone'] = $this->setting['site_phone'];

        // Load the list page view
        $this->load->view(''.$this->controller.'/header', $data);
        $this->load->view(''.$this->controller.'/News', $data);
        $this->load->view(''.$this->controller.'/footer');
    }

    public function single_news($id){
        $data = array();
        
        // Check whether News id is not empty
        if(!empty($id)){
            $data['News'] = $this->News_model->getRows(array('id' => $id));
	        $data['notes'] = $this->Pages_model->notes_list();
	
   	        $data['page_title'] = $data['News']['post_title'];
            $data['description'] = $data['News']['post_content'];
            $data['keywords'] = $data['News']['post_content'];
            $data['template'] = $this->setting['theme'];
            $data['site_address'] = $this->setting['site_address'];
            $data['site_phone'] = $this->setting['site_phone'];

            // Load the details page view
            $this->load->view(''.$this->controller.'/header', $data);
            $this->load->view(''.$this->controller.'/news_single', $data);
            $this->load->view(''.$this->controller.'/footer');
        }else{
            redirect('News');
        }
    }
}
