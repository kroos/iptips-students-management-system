<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sel_gred extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}
#############################################################################################################################
//CRUD for user_data

	//select		
	function get($kodgred = FALSE){
		if ($kodgred === FALSE)
        {
            return $this->db->order_by('nilaigred', 'desc')->get('sel_gred');
        }
        return $this->db->order_by('nilaigred', 'desc')->get_where('sel_gred', array('kodgred' => $kodgred));  
	}
	
	function get_where($array){
		return $this->db->get_where('sel_gred', $array);
	}
}