<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sel_negara extends CI_Model 
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
            return $this->db->order_by('namanegara ASC')->get('sel_negara');
        }
        return $this->db->get_where('sel_negara', array('kodnegara' => $kodnegara));  
	}
}