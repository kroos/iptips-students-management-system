<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_surat extends CI_Model 
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
            return $this->db->get('template_surat'); //get all
        }
        //return $this->db->get_where('template_surat', array('id' => $id)); 
        return $this->get_where($array);  //get condition $array = array('id' => '1');
	}
	
	function get_where($array){
		return $this->db->get_where('template_surat', $array);
	}
	
	//insert
	function set_template($array){
		return $this->db->insert('template_surat', $array);
	}
	
	//update
	function edit_template($set, $where){
		return $this->db->update('template_surat', $set, $where);
	}
}