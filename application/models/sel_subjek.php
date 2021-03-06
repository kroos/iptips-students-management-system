<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sel_subjek extends CI_Model 
	{
		function __construct()
		{
			parent::__construct();
		}
#############################################################################################################################
//CRUD for user_data
	
//SELECT
	//select		
	function get($id = FALSE){
		if ($id === FALSE)
        {
            return $this->db->get('sel_subjek');
        }
        return $this->db->get_where('sel_subjek', array('id'=>$id));  
	}
	
	function get_where($array){
		return $this->db->get_where('sel_subjek', $array);
	}

	function GetWhere($array){
		$this->db->order_by('subjek_MY');
		return $this->db->get_where('sel_subjek', $array);
	}
	
	function GetAll()
		{
			return $this->db->get('sel_subjek');
		}
}