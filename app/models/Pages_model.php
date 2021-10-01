<?php
class Pages_model extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function notes_list()
    {
        $query = $this->db->get('pages');
        return $query->result();
    }
     
    public function get_notes_by_id($id)
    {
        $query = $this->db->get_where('pages', array('id' => $id));
        return $query->row();
    }
     
    public function createOrUpdate()
    {
        $this->load->helper('url');
        $id = $this->input->post('id');
 
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
			'read_more' => $this->input->post('read_more')
        );
        if (empty($id)) {
            return $this->db->insert('pages', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('pages', $data);
        }
    }
     
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('pages');
    }
}
?>