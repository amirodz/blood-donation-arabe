<?php
class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->helper(array('form','url','html','security'));
        $this->load->library(array('session', 'form_validation'));
		$this->load->database();
		$this->load->model('user_model');
		$this->load->model('Settings_model');
		$this->load->model('user_insert');
	}
   function add_image(){
        if($this->input->post('userSubmit')){
            
            //Check whether user upload picture
            if(!empty($_FILES['picture']['name'])){
                $config['upload_path'] = 'uploads/images/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['picture']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
              
			  if ( ! $this->upload->do_upload('picture'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $picture = '';

                      //  print_r( $error);
                }
                else
                {
                        
						$data = array('upload_data' => $this->upload->data());
						
						// print_r( $data);

                        //$uploadData = $this->upload->data();
                        //$picture = $uploadData['file_name'];
						/*
						Array ( [upload_data] => Array ( [file_name] => Lighthouse_-_Copie.jpg [file_type] => image/jpeg [file_path] => C:/laragon/www/9atrathayat/uploads/images/ [full_path] => C:/laragon/www/9atrathayat/uploads/images/Lighthouse_-_Copie.jpg [raw_name] => Lighthouse_-_Copie [orig_name] => Lighthouse_-_Copie.jpg [client_name] => Lighthouse - Copie.jpg [file_ext] => .jpg [file_size] => 548.12 [is_image] => 1 [image_width] => 1024 [image_height] => 768 [image_type] => jpeg [image_size_str] => width="1024" height="768" ) )
						*/
						
						$picture = 'uploads/images/'.$data['upload_data']['file_name'].'';
						
                }
				            		
            }else{
             $picture = '';
               }
            
            //Prepare array of user data
            $userData = array(
                'avatar' => $picture
            );
			
            $id = $this->input->post('user_id');
			$this->delete($id);
            //Pass user data to model
            $insertUserData = $this->user_insert->update($userData,$id);
            
            //Storing insertion status message.
            if($insertUserData){
				//User data have been added successfully.
                $this->session->set_flashdata('success_msg','<div class="alert alert-success" role="alert">تم  إضافة المعلومات بنجاح</div>');
            }else{
				//Some problems occured, please try again.
                $this->session->set_flashdata('error_msg', '<div class="alert alert-danger" role="alert">هناك مشكل ما لرجاء إعادة المحاولة</div>');
            }
        }
        //Form for adding user data
       redirect('Profile');
     }
	 
   function delete($id){
 
	 $query = $this->db->query("SELECT avatar FROM user WHERE id = ".$id."");
     $row   = $query->row();

      if ( file_exists($row->avatar) ) {
	
       unlink($row->avatar);

       // Be sure we deleted the file
      if ( !file_exists($row->avatar) ) {
    //Successfully Deleted.
	$response = array ('success'    => '1','msg' => 'حذف بنجاح ', );
 
        } else {
            // Check the directory's permissions
			//We screwed up, the file can\'t be deleted.
     $response = array ('success'    => '0','msg' => 'هناك مشكل الملف لا يحذف', );
    
        }

        } else {
        // Something weird happend and we lost the file
		//Couldn\'t find the requested file :(
	 $response = array ('success'    => '0','msg' => 'لا يستطيع إيجاد الملف', );
       }
	return $this->output ->set_content_type('application/json')->set_output(json_encode($response));  
	 } 
	 
	function index()
	{
	if ( !$this->session->userdata('login')){
		 redirect('login');
	
		}
		$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
		$user['uname'] = $details[0]->fname . " " . $details[0]->lname;
		$user['uemail'] = $details[0]->email;
		$user['avatar'] = $details[0]->avatar;
		$user['id'] = $details[0]->id;

		$setting = $this->Settings_model->get_settings();

		$data['page_title'] = $setting['site_title'];
		$data['keywords'] = $setting['site_keywords'];
		$data['description'] = $setting['site_description'];

		$this->load->view('admin/header', $data);
		$this->load->view('admin/profile_view', $user);
        $this->load->view('admin/footer');

	}

 function admin()
	{
		if ( !$this->session->userdata('login')){
		 redirect('login');
	
		}	
		$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
		//print_r($details);
		$user['uname'] = $details[0]->fname;
		$user['lname'] = $details[0]->lname;
		$user['uemail'] = $details[0]->email;
		
		$setting = $this->Settings_model->get_settings();

		$data['page_title'] = $setting['site_title'];
		$data['keywords'] = $setting['site_keywords'];
		$data['description'] = $setting['site_description'];

		$this->load->view('admin/header', $data);
		$this->load->view('admin/update_profile', $user);
        $this->load->view('admin/footer');

	}
	
   function update_admin()
    {
		
        // set form validation rules
        $this->form_validation->set_rules('fname', 'الإسم الاول', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('lname', 'اللقب', 'trim|required|alpha|min_length[3]|max_length[30]|xss_clean');
		
        //$this->form_validation->set_rules('email', 'البريد الإلكتروني', 'trim|required|valid_email|is_unique[user.email]');
		
		$this->form_validation->set_rules(
        'email', 'البريد الإلكتروني',
        'trim|required|valid_email',
        array(
                'required'      => 'ملأ حقل %s إجباري .',
        )
         );
		
		if(!empty($this->input->post('password'))){

		$this->form_validation->set_rules('password', 'كلمة السر', 'trim|required|md5');
		$this->form_validation->set_rules('cpassword', 'تأكيد كلمة السر', 'trim|required|md5|matches[password]');
		}
		
        // submit
        if ($this->form_validation->run() == FALSE)
        {
            // fails
		$setting = $this->Settings_model->get_settings();
		$details = $this->user_model->get_user_by_id($this->session->userdata('uid'));
		$user['uname'] = $details[0]->fname;
		$user['lname'] = $details[0]->lname;
		$user['uemail'] = $details[0]->email;
		
		$data['page_title'] = 'تعديل معلومات المدير';
		$data['keywords'] = 'تعديل معلومات المدير';
		$data['description'] = 'تعديل معلومات المدير';

		$this->load->view('admin/header', $data);
		$this->load->view('admin/update_profile',$user);
        $this->load->view('admin/footer');

        }
        else
        {
            //update user details into db
			if(!empty($this->input->post('password'))){
				
				$data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
              );
				
            			  
			}else{
				
				$data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
              );

			}
             //$id =   $this->input->post('id');
			 $id = $this->session->userdata('uid');
			 $this->db->where('id', $id);
             $insert_settings  =   $this->db->update('user', $data);

            if ($insert_settings)
            {
				//You are Successfully Registered! Please login to access your Profile!
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">تم تحديث البيانات بنجاح </div>');
                redirect('update_profile');
            }
            else
            {
                // Oops! Error.  Please try again later!!!
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center"> هناك مشكل ما الرجاء المحاولة </div>');
                redirect('update_profile');
            }
        }
    }	
}
