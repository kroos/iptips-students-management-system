<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sel_gender extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}
#############################################################################################################################
//CRUD for user_data

	//select		
	function get($kodgender = FALSE){
		if ($kodgender === FALSE)
        {
            return $this->db->order_by('kodgender')->get('sel_gender');
            //return $query->result_array();
        }
        return $this->db->get_where('sel_gender', array('kodgender' => $kodgender));  
	}
}