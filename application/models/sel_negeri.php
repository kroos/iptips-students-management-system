<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sel_negeri extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}
#############################################################################################################################
//CRUD for user_data

	//select		
	function get($id = FALSE){
		if ($id === FALSE)
        {
            return $this->db->get('sel_negeri');
            //return $query->result_array();
        }
        return $this->db->get_where('sel_negeri', array('id'=>$id));  
	}
}