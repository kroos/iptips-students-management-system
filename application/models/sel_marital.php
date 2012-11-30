<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sel_marital extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}
#############################################################################################################################
//CRUD for user_data

	//select		
	function get($kod = FALSE){
		if ($kod === FALSE)
        {
            return $this->db->order_by('kod')->get('sel_marital');
            //return $query->result_array();
        }
        return $this->db->order_by('kod')->get_where('sel_marital', array('kod' => $kod));  
	}
}