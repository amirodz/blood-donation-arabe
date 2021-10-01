<?php
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('user_model');
		$this->load->model('Settings_model');
		$this->load->model('Pages_model');
		$this->setting = $this->Settings_model->get_settings();

	}
    public function index()
    {
	   
	    $data['notes'] = $this->Pages_model->notes_list();
	
		// get form input
		$email = $this->input->post("email");
        $password = $this->input->post("password");

		// form validation
		$this->form_validation->set_rules("email", "البريد الإلكتروني", "trim|required");
		$this->form_validation->set_rules("password", "كلمة السر", "trim|required");

		if ($this->form_validation->run() == FALSE)
        {
			// validation fail

		$data['page_title'] = $this->setting['site_title'];
		$data['keywords'] = $this->setting['site_keywords'];
		$data['description'] = $this->setting['site_description'];

		$this->load->view('admin/header', $data);
		$this->load->view('admin/login_view');
        $this->load->view('admin/footer');
	
		}
		else
		{
			// check for user credentials
			$uresult = $this->user_model->get_user($email, $password);
			if (count($uresult) > 0)
			{
				// set session
				$sess_data = array(
				'login' => TRUE,
				'uname' => $uresult[0]->fname,
				'uid' => $uresult[0]->id);
				
				$this->session->set_userdata($sess_data);
				redirect("profile");
			}
			else
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong Email-ID or Password!</div>');
				redirect('login');
			}
		}
    }
}
