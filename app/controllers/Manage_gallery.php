<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Manage_gallery extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
        $this->load->helper('security');
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
        // Load image model 
        $this->load->model('image'); 

         
        // Default controller name 
        $this->controller = 'admin'; 
         
        // File upload path 
        $this->uploadPath = 'uploads/images/'; 
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
 
        $data['gallery'] = $this->image->getRows();
		
        $data['title'] = 'ألبوم الصور'; 
        $header['page_title'] = 'ألبوم الصور'; 
        $header['description'] = 'ألبوم الصور'; 
        $header['keywords'] = 'ألبوم الصور'; 

        // Load the list page view 
        $this->load->view(''.$this->controller.'/header', $header); 
        $this->load->view(''.$this->controller.'/manage_gallery', $data); 
        $this->load->view(''.$this->controller.'/footer'); 
    } 
     
    public function view($id){ 
        $data = array(); 
         
        // Check whether id is not empty 
        if(!empty($id)){ 
            $con = array('id' => $id); 
            $data['image'] = $this->image->getRows($con); 
            $data['title'] = $data['image']['title']; 
             
            // Load the details page view 
            $header['page_title'] = 'ألبوم الصور'; 
            $header['description'] = 'ألبوم الصور'; 
            $header['keywords'] = 'ألبوم الصور'; 

           // Load the list page view 
            $this->load->view(''.$this->controller.'/header', $header); 
            $this->load->view(''.$this->controller.'/manage_gallery_view', $data); 
            $this->load->view(''.$this->controller.'/footer'); 
        }else{ 
            redirect('Manage_gallery'); 
        } 
    } 
     
    public function add(){ 
        $data = $imgData = array(); 
        $error = ''; 
         
        // If add request is submitted 
        if($this->input->post('imgSubmit')){ 
            // Form field validation rules 
            $this->form_validation->set_rules('title', 'image title', 'required'); 
            $this->form_validation->set_rules('image', 'image file', 'callback_file_check'); 
             
            // Prepare gallery data 
            $imgData = array( 
                'title' => $this->input->post('title') 
            ); 
             
            // Validate submitted form data 
            if($this->form_validation->run() == true){ 
                // Upload image file to the server 
                if(!empty($_FILES['image']['name'])){ 
                    //$imageName = $_FILES['image']['name']; 
                     
                    // File upload configuration 
                    $config['upload_path'] = $this->uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
					//$config['allowed_types'] = '*'; 
                    $config['encrypt_name'] = TRUE;
                    //$new_name = time().$_FILES["userfiles"]['name'];
                   // $config['file_name'] = $new_name;

                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('image')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data(); 
                        $imgData['file_name'] = $fileData['file_name']; 
					    $uploadedImage = $fileData['file_name']; 

					$source_path = $this->uploadPath.$uploadedImage; 
                    $thumb_path = $this->uploadPath.'thumb/'; 
                    $thumb_width = 280; 
                    $thumb_height = 175; 
                     
                    // Image resize config 
                    $config['image_library']    = 'gd2'; 
                    $config['source_image']     = $source_path; 
                    $config['new_image']         = $thumb_path; 
                    $config['maintain_ratio']     = FALSE; 
                    $config['width']            = $thumb_width; 
                    $config['height']           = $thumb_height; 
                     
                    // Load and initialize image_lib library 
                    $this->load->library('image_lib', $config); 
                     
                    // Resize image and create thumbnail 
                    if($this->image_lib->resize()){ 
                        $thumbnail = $thumb_path.$uploadedImage; 
                    }else{ 
                        $error = ''.$this->image_lib->display_errors(); 
                    } 
						
					  $imgData['thumbnail'] = $thumbnail; 
					  
                    }else{ 
                        $error = $this->upload->display_errors();  
                    } 
                } 
                 
                if(empty($error)){ 
                    // Insert image data 
                    $insert = $this->image->insert($imgData); 
                     
                    if($insert){ 
					//Image has been uploaded successfully.
                        $this->session->set_userdata('success_msg', 'تم تحميل الصورة بنجاح'); 
                        redirect('Manage_gallery'); 
                    }else{ 
					//Some problems occurred, please try again.
                        $error = 'هناك مشكل ما الرجاء أعد المحاولة'; 
                    } 
                } 
                 
                $data['error_msg'] = $error; 
            } 
        } 
         
        $data['image'] = $imgData; 
        $data['title'] = 'تحميل صورة'; 
        $data['action'] = 'تحميل صورة'; 
         
        // Load the add page view 
        $header['page_title'] = 'ألبوم الصور'; 
        $header['description'] = 'ألبوم الصور'; 
        $header['keywords'] = 'ألبوم الصور'; 

        $this->load->view(''.$this->controller.'/header', $header);
        $this->load->view(''.$this->controller.'/manage_gallery_add-edit', $data); 
        $this->load->view(''.$this->controller.'/footer'); 
    } 
     
    public function edit($id){ 
        $data = $imgData = array(); 
         
        // Get image data 
        $con = array('id' => $id); 
        $imgData = $this->image->getRows($con); 
        $prevImage = $imgData['file_name']; 
         
        // If update request is submitted 
        if($this->input->post('imgSubmit')){ 
            // Form field validation rules 
            $this->form_validation->set_rules('title', 'gallery title', 'required'); 
             
            // Prepare gallery data 
            $imgData = array( 
                'title' => $this->input->post('title') 
            ); 
             
            // Validate submitted form data 
            if($this->form_validation->run() == true){ 
                // Upload image file to the server 
                if(!empty($_FILES['image']['name'])){ 
                    //$imageName = $_FILES['image']['name']; 
                     
                    // File upload configuration 
                    $config['upload_path'] = $this->uploadPath; 
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('image')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data(); 
                        $imgData['file_name'] = $fileData['file_name']; 
					
					$uploadedImage = $fileData['file_name']; 

					$source_path = $this->uploadPath.$uploadedImage; 
                    $thumb_path = $this->uploadPath.'thumb/'; 
                    $thumb_width = 280; 
                    $thumb_height = 175; 
                     
                    // Image resize config 
                    $config['image_library']    = 'gd2'; 
                    $config['source_image']     = $source_path; 
                    $config['new_image']         = $thumb_path; 
                    $config['maintain_ratio']     = FALSE; 
                    $config['width']            = $thumb_width; 
                    $config['height']           = $thumb_height; 
                     
                    // Load and initialize image_lib library 
                    $this->load->library('image_lib', $config); 
                     
                    // Resize image and create thumbnail 
                    if($this->image_lib->resize()){ 
                        $thumbnail = $thumb_path.$uploadedImage; 
                    }else{ 
                        $error = ''.$this->image_lib->display_errors(); 
                    } 
						
					  $imgData['thumbnail'] = $thumbnail; 
					                           
                        // Remove old file from the server  
                        if(!empty($prevImage)){ 
                            @unlink($this->uploadPath.$prevImage); 
						    @unlink($this->uploadPath.'thumb/'.$prevImage.'');  

                        } 
                    }else{ 
                        $error = $this->upload->display_errors();  
                    } 
                } 
                 
                if(empty($error)){ 
                    // Update image data 
                    $update = $this->image->update($imgData, $id); 
                     
                    if($update){ 
					//Image has been updated successfully.
                        $this->session->set_userdata('success_msg', 'تم تحديث الصورة بنجاح'); 
                        redirect('Manage_gallery'); 
                    }else{ 
					//Some problems occurred, please try again.
                        $error = 'هناك مشكل ما الرجاء أعد المحاولة'; 
                    } 
                } 
                 
                $data['error_msg'] = $error; 
            } 
        } 
 
         
        $data['image'] = $imgData; 
        $data['title'] = 'تعديل صورة'; 
        $data['action'] = 'تعديل صورة'; 
         
        // Load the edit page view 
        $header['page_title'] = 'ألبوم الصور'; 
        $header['description'] = 'ألبوم الصور'; 
        $header['keywords'] = 'ألبوم الصور'; 

        $this->load->view(''.$this->controller.'/header', $header); 
        $this->load->view(''.$this->controller.'/manage_gallery_add-edit', $data); 
        $this->load->view(''.$this->controller.'/footer'); 
    } 
     
    public function block($id){ 
        // Check whether id is not empty 
        if($id){ 
            // Update image status 
            $data = array('status' => 0); 
            $update = $this->image->update($data, $id); 
             
            if($update){ 
			//Image has been blocked successfully.
                $this->session->set_userdata('success_msg', 'تم حظر الصورة بنجاح'); 
            }else{ 
			//Some problems occurred, please try again.
                $this->session->set_userdata('error_msg', 'هناك مشكل ما الرجاء أعد المحاولة'); 
            } 
        } 
 
        redirect('Manage_gallery'); 
    } 
     
    public function unblock($id){ 
        // Check whether is not empty 
        if($id){ 
            // Update image status 
            $data = array('status' => 1); 
            $update = $this->image->update($data, $id); 
             
            if($update){ 
			//Image has been activated successfully.
                $this->session->set_userdata('success_msg', 'تم تفعيل الصورة بنجاح'); 
            }else{ 
			//Some problems occurred, please try again.
                $this->session->set_userdata('error_msg', 'هناك مشكل ما الرجاء أعد المحاولة'); 
            } 
        } 
 
        redirect('Manage_gallery'); 
    } 
     
    public function delete($id){ 
        // Check whether id is not empty 
        if($id){ 
            $con = array('id' => $id); 
            $imgData = $this->image->getRows($con); 
             
            // Delete gallery data 
            $delete = $this->image->delete($id); 
             
            if($delete){ 
                // Remove file from the server  
                if(!empty($imgData['file_name'])){ 
                    @unlink($this->uploadPath.$imgData['file_name']);
					@unlink($this->uploadPath.'thumb/'.$imgData['file_name'].'');  

                }  
                 //Image has been removed successfully.
                $this->session->set_userdata('success_msg', 'تم حذف الصورة بنجاح'); 
            }else{ 
			// Some problems occurred, please try again.
                $this->session->set_userdata('error_msg', 'هناك مشكل ما حاول مرة أخري'); 
            } 
        } 
 
        redirect('Manage_gallery'); 
    } 
     
    public function file_check($str){ 
        if(empty($_FILES['image']['name'])){
                   //		Select an image file to upload.	
            $this->form_validation->set_message('file_check', 'إختر صورة لتحميلها'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    } 
}
