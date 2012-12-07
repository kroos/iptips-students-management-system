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
            return $this->db->order_by('namanegeri')->get('sel_negeri');
        }
        return $this->db->order_by('namanegeri')->get_where('sel_negeri', array('kodnegeri' => $kodnegara));  
	}
	
	function get_where($array){
		return $this->db->get_where('sel_negeri', $array);
	}
}