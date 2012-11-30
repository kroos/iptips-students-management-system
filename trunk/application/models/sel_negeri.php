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
	function get($kodnegara = FALSE){
		if ($kodnegara === FALSE)
        {
            return $this->db->get('sel_negeri');
        }
        return $this->db->get_where('sel_negeri', array('kodnegara' => $kodnegara));  
	}
}