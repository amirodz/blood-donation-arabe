<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Signup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->helper('security');

        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
        $this->load->model('user_model');
		$this->load->model('Settings_model');
    }

    function index()
    {
        // set form validation rules
        $this->form_validation->set_rules('fname', 'الإسم الاول', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('lname', 'اللقب', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
		
        //$this->form_validation->set_rules('email', 'البريد الإلكتروني', 'trim|required|valid_email|is_unique[user.email]');
		
		$this->form_validation->set_rules(
        'email', 'البريد الإلكتروني',
        'trim|required|valid_email|is_unique[user.email]',
        array(
                'required'      => 'ملأ حقل %s إجباري .',
                'is_unique'     => 'هذا %s موجود مسبقا.'
        )
         );

		$this->form_validation->set_rules('password', 'كلمة السر', 'trim|required|md5');
		$this->form_validation->set_rules('cpassword', 'تأكيد كلمة السر', 'trim|required|md5|matches[password]');
        // submit
        if ($this->form_validation->run() == FALSE)
        {
            // fails
		$setting = $this->Settings_model->get_settings();

		$data['page_title'] = $setting['site_title'];
		$data['keywords'] = $setting['site_keywords'];
		$data['description'] = $setting['site_description'];

		$this->load->view('admin/header', $data);
		$this->load->view('admin/signup_view');
        $this->load->view('admin/footer');

        }
        else
        {
            //insert user details into db
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );

            if ($this->user_model->insert_user($data))
            {
				//You are Successfully Registered! Please login to access your Profile!
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">تم تسجيل البيانات بنجاح </div>');
                redirect('login');
            }
            else
            {
                // Oops! Error.  Please try again later!!!
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">هناك مشكل ما أعد المحاولة </div>');
                redirect('signup');
            }
        }
    }
}
