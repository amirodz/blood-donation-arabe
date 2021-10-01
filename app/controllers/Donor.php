<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Donor extends CI_Controller
{    
    public function __construct()
    {
        parent::__construct();
		$this->load->helper('security');
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->database();
		}
    
    public function index()
    {
    	if ( !$this->session->userdata('login')){
		 redirect('login');
	
		}	
	$this->load->view('admin/header'); 
	$this->load->view('admin/donor'); 
	$this->load->view('admin/footer'); 

    }
	
  // DataTable data
    public function getTable()
    {

	//print_r($_POST);
    ## Read value
	
	 $start = 0;
     $rowperpage = 10;
	 
     //$draw = $this->input->get_post('draw', TRUE);
     // $row = $this->input->get_post('start', TRUE);
     //$rowperpage = $this->input->get_post('length', TRUE); // Rows display per page
	 
      $postData = $this->input->post();
	  
      $draw = $postData['draw'];
      $start = $postData['start'];
      $rowperpage = $postData['length']; // Rows display per page
      $columnIndex = $postData['order'][0]['column']; // Column index
      $columnName = $postData['columns'][$columnIndex]['data']; // Column name
      $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
      $searchValue = $postData['search']['value']; // Search value

 
    ## Search 
    $searchQuery = " ";
    if($searchValue != ''){
        $searchQuery = " and (fullname like '%".$searchValue."%' or 
            city like '%".$searchValue."%' or 
            group1 like'%".$searchValue."%' ) ";
    }

    ## Total number of records without filtering
    $sel = $this->db->query("select count(*) as allcount from donor");
    $records = $sel->row_array();
    $totalRecords = $records['allcount'];

    ## Total number of records with filtering
    $sel = $this->db->query("select count(*) as allcount from donor WHERE 1 ".$searchQuery);
    $records = $sel->row_array();
    $totalRecordwithFilter = $records['allcount'];

    ## Fetch records
    $empQuery = "select * from donor WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$start.",".$rowperpage;
    $empRecords = $this->db->query($empQuery);
    $data = array();

    foreach  ($empRecords->result_array() as $row) {

        $data[] = array(
		        "id" => $row['id'],
                "fullname" => $row['fullname'],
                "sex" => $row['sex'],
				"city" => $row['city'],
				"firstNbr" => $row['firstNbr'],
                "group1" => $row['group1'],
            );
    }

    ## Response
    $response = array(
        "draw" => intval($draw),
        "iTotalRecords" => $totalRecords,
        "iTotalDisplayRecords" => $totalRecordwithFilter,
        "aaData" => $data
    );

    echo json_encode($response);
    exit;
}


// Fetch  details
    public function Fetch()
    {    $id = 0;

    if($this->input->get_post('id')){
        $id = $this->db->escape_str($this->input->get_post('id'));
    }

    $record = $this->db->query("SELECT * FROM donor WHERE id=".$id);

    $response = array();

    if($record->num_rows() > 0){
        $row = $record->row_array();
        $response = array(
		    "id" => $row['id'],
			"fullname" => $row['fullname'],
            "sex" => $row['sex'],
            "adress" => $row['adress'],
            "city" => $row['city'],
			"group1" => $row['group1'],
            "lastDonationDate" => $row['lastDonationDate'],
            "firstNbr" => $row['firstNbr'],
            "secondNbr" => $row['secondNbr'],
            "thirdNbr" => $row['thirdNbr'],
            "contactMethod" => $row['contactMethod'],
            "contactTime" => $row['contactTime'],
			"created_at" => $row['created_at'],

        );

        echo json_encode( array("status" => 1,"data" => $response) );
        exit;
    }else{
        echo json_encode( array("status" => 0) );
        exit;
    }
}

// Update 
    public function Update()
{
    $id = 0;

    if($this->input->get_post('id')){
        $id = $this->db->escape_str($this->input->get_post('id'));
    }

    // Check id
    $record = $this->db->query("SELECT id FROM donor WHERE id=".$id);
    if($record->num_rows() > 0){
		
        $fullname = $this->db->escape_str(trim($this->input->get_post('fullname')));
        $sex = $this->db->escape_str(trim($this->input->get_post('sex')));
        $adress = $this->db->escape_str(trim($this->input->get_post('adress')));
        $city = $this->db->escape_str(trim($this->input->get_post('city')));
        $group1 = $this->db->escape_str(trim($this->input->get_post('group1')));
        $lastDonationDate = $this->db->escape_str(trim($this->input->get_post('lastDonationDate')));
        $firstNbr = $this->db->escape_str(trim($this->input->get_post('firstNbr')));
        $secondNbr = $this->db->escape_str(trim($this->input->get_post('secondNbr')));
        $thirdNbr = $this->db->escape_str(trim($this->input->get_post('thirdNbr')));
        $contactMethod = $this->db->escape_str(trim($this->input->get_post('contactMethod')));
        $contactTime = $this->db->escape_str(trim($this->input->get_post('contactTime')));
        $created_at = $this->db->escape_str(trim($this->input->get_post('created_at')));

        if( $fullname != '' && $sex != '' && $city != '' && $group1 != '' ){

            $this->db->query("UPDATE donor SET fullname='".$fullname."',sex='".$sex."',adress='".$adress."',city='".$city."',group1='".$group1."',lastDonationDate='".$lastDonationDate."',firstNbr='".$firstNbr."',secondNbr='".$secondNbr."',thirdNbr='".$thirdNbr."',contactMethod='".$contactMethod."',contactTime='".$contactTime."',created_at='".$created_at."' WHERE id=".$id);

            echo json_encode( array("status" => 1,"message" => "تم التعديل بنجاح .") );
            exit;
        }else{
            echo json_encode( array("status" => 0,"message" => "لا تترك حقل فارغ.") );
            exit;
        }
    }else{
        echo json_encode( array("status" => 0,"message" => "Invalid ID.") );
        exit;
    }
}

// Delete 
    public function deletes()
     {
    $id = 0;

    if($this->input->get_post('id')){
        $id = $this->input->get_post('id');
    }

    // Check id
    $record = $this->db->query("SELECT id FROM donor WHERE id=".$id."");
	
    if($record->num_rows() > 0){

       // $this->db->query("DELETE FROM donor WHERE id=".$id."");
           $this->db->where('id', $id);
            $this->db->delete('donor');
        echo 1;
              exit;

    }else{
        echo 0;
              exit;

      }
    }

}
?>