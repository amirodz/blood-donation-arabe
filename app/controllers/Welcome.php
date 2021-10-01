<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'html'));
		$this->load->library('session');
		$this->load->database();
		$this->load->model('Settings_model');
		$this->load->model('Pages_model');
		$this->load->model('News_model');
		$this->setting = $this->Settings_model->get_settings();

	}

	public function index()
	{
		/*
		require_once 'faker/src/autoload.php';
		$faker = Faker\Factory::create('ar_SA');

        for ($i = 0; $i < 10; $i++) {
          //echo $faker->name, "\n";
		  
		  $data = array(
        'fullname' => $faker->name.' '.$faker->lastName,
        'sex' => $faker->randomElement($array = array ('أنثي','ذكر')),
		'adress' => $faker->Address,
        'city' => $faker->city,
        'group1' => $faker->randomElement($array = array ('A+','AB+','AB-','O-','B+')),
        'lastDonationDate' => 'منذ شهر',
        'firstNbr' => $faker->e164PhoneNumber,
        'secondNbr' => $faker->PhoneNumber,
        'thirdNbr' => $faker->PhoneNumber,
        'contactMethod' => 'مكالمة هاتفية',
        'contactTime' => 'صباحا',
        'created_at	' => date('Y-m-d')
                );

         $this->db->insert('donor', $data);

           }
		   */
        $data['notes'] = $this->Pages_model->notes_list();
        $data['last10_news'] = $this->News_model->last_news();
		
		//print_r($data['last10_news']);
		$data['page_title'] = $this->setting['site_title'];
		$data['keywords'] = $this->setting['site_keywords'];
		$data['description'] = $this->setting['site_description'];
        $data['template'] = $this->setting['theme'];
        $data['site_address'] = $this->setting['site_address'];
        $data['site_phone'] = $this->setting['site_phone'];

		//$this->load->theme_view('themes', ''.$this->setting['theme'].'/header', $data);
		//$this->load->theme_view('themes', ''.$this->setting['theme'].'/home_view', $data);
       // $this->load->theme_view('themes', ''.$this->setting['theme'].'/footer');
		$this->load->view( ''.$this->setting['theme'].'/header', $data);
		$this->load->view(''.$this->setting['theme'].'/home_view', $data);
        $this->load->view( ''.$this->setting['theme'].'/footer');


	}
	
	 public function page($id)
    {
        $id = $this->uri->segment(2);
        $data = array();
 
        if (empty($id))
        { 
         show_404();
        }else{
         
  		  $data['note'] = $this->Pages_model->get_notes_by_id($id);
		  $data['notes'] = $this->Pages_model->notes_list();

		  $data['page_title'] = $data['note']->title;
          $data['description'] = $data['note']->description;
          $data['keywords'] = $data['note']->description;
          $data['template'] = $this->setting['theme'];
          $data['site_address'] = $this->setting['site_address'];
          $data['site_phone'] = $this->setting['site_phone'];

            // Load the details page view
          $this->load->view(''.$this->setting['theme'].'/header', $data);
          $this->load->view(''.$this->setting['theme'].'/page_single', $data);
		  $this->load->view(''.$this->setting['theme'].'/footer');

        }
    }
	function logout()
	{
		// destroy session
        $data = array(
		'login' => '',
		'uname' => '',
		'uid' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect('home');
	}	
}
