<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class App_pelajar_model extends CI_Model{
	public function _construct(){
		$this->load->database();
	}
	
	//select
	public function get_app_pelajar($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('app_pelajar');
            return $query->result_array();
        }
        $query = $this->db->get_where('app_pelajar', array('id'=>$id));
        return $query->result_array();        
    }
    
    public function seacrh_app($nama = NULL, $ic = NULL){
    	if($nama == NULL && $ic == NULL){
    		return $this->get_app_pelajar();
    	}
    	$sql = "select nama, ic, passport, warganegara from app_pelajar where nama like %?% or ic = ? or passport = ?";
    	$query = $this->db->query($sql,array($nama, $ic, $ic));
    	return $query->result_array();
    }
    
    //insert
    public function set_app_pelajar(){
        $this->load->helper('url');
	
	//$slug = url_title($this->input->post('userid'), 'dash', TRUE);
	
		$data = array(
//	            'matrik' => $this->input->post('matrik'),
	            'nama' => $this->input->post('nama'),
	            'ic' => $this->input->post('ic'),
	            'passport' => $this->input->post('passport'),
	            'dt_lahir' => $this->input->post('dt_lahir'),
	            'tempat_lahir' => $this->input->post('tempat_lahir'),
	            'status_warga' => $this->input->post('status_warga'),
	            'warganegara' => $this->input->post('warganegara'),
	            'bangsa' => $this->input->post('bangsa'),
	            'jantina' => $this->input->post('bangsa'),
	            'status_kahwin' => $this->input->post('status_kahwin'),
	            'alamat1' => $this->input->post('alamat1'),
	            'alamat2' => $this->input->post('alamat2'),
	            'poskod' => $this->input->post('poskod'),
	            'bandar' => $this->input->post('bandar'),
	            'negeri' => $this->input->post('negeri'),
	            'negara' => $this->input->post('negara'),
	            'id_add' => $this->input->post('id_add'),
	            'dt_add' => $this->input->post('dt_add'),
	            'id_edit' => $this->input->post('id_edit'),
	            'dt_edit' => $this->input->post('dt_edit'),
	            'layak' => $this->input->post('layak'),
	            'id_transfer' => $this->input->post('id_transfer'),
	            'dt_transfer' => $this->input->post('dt_transfer')
		);
		
		return $this->db->insert('app_pelajar', $data);
    }
    
    //update
    public function edit_app_pelajar(){
    	$data = array(
	            'matrik' => $this->input->post('matrik'),
	            'nama' => $this->input->post('nama'),
	            'ic' => $this->input->post('ic'),
	            'passport' => $this->input->post('passport'),
	            'dt_lahir' => $this->input->post('dt_lahir'),
	            'tempat_lahir' => $this->input->post('tempat_lahir'),
	            'status_warga' => $this->input->post('status_warga'),
	            'warganegara' => $this->input->post('warganegara'),
	            'bangsa' => $this->input->post('bangsa'),
	            'jantina' => $this->input->post('bangsa'),
	            'status_kahwin' => $this->input->post('status_kahwin'),
	            'alamat1' => $this->input->post('alamat1'),
	            'alamat2' => $this->input->post('alamat2'),
	            'poskod' => $this->input->post('poskod'),
	            'bandar' => $this->input->post('bandar'),
	            'negeri' => $this->input->post('negeri'),
	            'negara' => $this->input->post('negara'),
	            'id_add' => $this->input->post('id_add'),
	            'dt_add' => $this->input->post('dt_add'),
	            'id_edit' => $this->input->post('id_edit'),
	            'dt_edit' => $this->input->post('dt_edit'),
	            'layak' => $this->input->post('layak'),
	            'id_transfer' => $this->input->post('id_transfer'),
	            'dt_transfer' => $this->input->post('dt_transfer')
		);
		
		return $this->db->update('app_pelajar', $data, $data['matrik']);
    }
}
?>
