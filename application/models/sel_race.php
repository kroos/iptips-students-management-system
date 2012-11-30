<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sel_race extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}
#############################################################################################################################
//CRUD for user_data

	//select		
	function get($kodbangsa = FALSE){
		if ($kodbangsa === FALSE){
			return $this->db->order_by('bangsa_MY')->get('sel_race');
		}
        return $this->db->order_by('bangsa_MY')->get_where('sel_race', array('kodbangsa' => $kodbangsa));  
	}
}