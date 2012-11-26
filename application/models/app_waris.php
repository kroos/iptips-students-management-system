<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class App_waris_model extends CI_Model{
	public function _construct(){
		$this->load->database();
	}
	
	//select
	public function get_app_waris($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('app_waris');
            return $query->result_array();
        }
        $query = $this->db->get_where('app_waris', array('id'=>$id));
        return $query->row_array();        
    }
    
    public function get_where($where = array()){
    	$query = $this->db->get_where('app_pelajar', $where);
        return $query->row_array();
    }
    
    //insert
    public function set_app_waris(){
        $this->load->helper('url');
		$field = $this->db->list_fields('app_pelajar');
		foreach ($field as $fields){
			$data[$fields] = $this->input->post($fields);
		}
		return $this->db->insert('app_pelajar', $data);
    }
    
    //update
    public function edit_app_waris(){
   		$field = $this->db->list_fields('app_pelajar');
		foreach ($field as $fields){
			$data[$fields] = $this->input->post($fields);
		}
		return $this->db->update('app_pelajar', $data, $data['id']);
    }
}
?>
