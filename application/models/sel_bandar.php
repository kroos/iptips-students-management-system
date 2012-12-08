<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sel_bandar extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}
#############################################################################################################################
//CRUD for user_data

	//select		
	function get($kodbandar = FALSE){
		if ($kodbandar === FALSE)
        {
            return $this->db->order_by('namabandar')->get('sel_bandar');
        }
        return $this->db->order_by('namabandar')->get_where('sel_bandar', array('kodbandar' => $kodbandar));  
	}
}