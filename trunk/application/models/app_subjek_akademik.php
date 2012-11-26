<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_subjek_akademik_model extends CI_Model{
	public function _construct(){
		$this->load->database();
	}
	
	//select
	public function get_app_subjek_akademik($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('app_subjek_akademik');
            return $query->result_array();
        }
        $query = $this->db->get_where('app_subjek_akademik', array('id'=>$id));
        return $query->row_array();        
    }
    
//    public function seacrh_app($nama = NULL, $ic = NULL){
//    	if($nama == NULL && $ic == NULL){
//    		return $this->get_app_pelajar();
//    	}
//    	$sql = "select * from app_pelajar where nama like '%$nama%' or ic = ? or passport = ?";
//    	$query = $this->db->query($sql,array($nama, $nama, $nama));
//    	return $query->result_array();
//    }
    
    public function get_where($where = array()){
    	$query = $this->db->get_where('app_subjek_akademik', $where);
        return $query->row_array();
    }
    
    //insert
    public function set_app_akademik(){
        $this->load->helper('url');
	
	//$slug = url_title($this->input->post('userid'), 'dash', TRUE);
	
		$data = array(
	            'id_mohon' => $this->input->post('id_mohon'),
	            'level' => $this->input->post('ic'),
	            'institusi' => $this->input->post('passport'),
	            'tahun' => $this->input->post('dt_lahir')
		);
		
		return $this->db->insert('app_subjek_akademik', $data);
    }
    
    //update
    public function edit_app_akademik(){
    	$data = array(
    		'id' => $this->input->post('id'),
	            'id_mohon' => $this->input->post('id_mohon'),
	            'level' => $this->input->post('ic'),
	            'institusi' => $this->input->post('passport'),
	            'tahun' => $this->input->post('dt_lahir')
		);
		
		return $this->db->update('app_subjek_akademik', $data, $data['id']);
    }
    
    //delete
}