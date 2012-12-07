<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat_cetak extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}
#############################################################################################################################
//CRUD for user_data

	//select		
	function get($array = FALSE){
		if ($array === FALSE)
        {
            return $this->db->get('surat_cetak'); //get all
        }
        //return $this->db->get_where('template_surat', array('id' => $id)); 
        return $this->get_where($array);  //get condition $array = array('id' => '1');
	}
	
	function get_where($array){
		return $this->db->get_where('surat_cetak', $array);
	}
	
	//insert
	function set($array){
		return $this->db->insert('surat_cetak', $array);
	}
	
	//update
	function edit($set, $where){
		return $this->db->update('surat_cetak', $set, $where);
	}
}