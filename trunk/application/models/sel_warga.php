<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sel_warga extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}
#############################################################################################################################
//CRUD for user_data

//SELECT		
	function get($kodwarga = FALSE){
		if ($kodwarga === FALSE){
			return $this->db->order_by('kodwarga')->get('sel_warga');
		}
        return $this->db->order_by('kodwarga')->get_where('sel_warga', array('kodwarga' => $kodwarga));  
	}
}