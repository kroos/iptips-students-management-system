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
	function get($kodnegeri = FALSE){
		if ($kodnegeri === FALSE)
        {
            return $this->db->order_by('namabandar')->get('sel_bandar');
            //return $query->result_array();
        }
        return $this->db->order_by('namabandar')->get_where('sel_bandar', array('kodnegeri' => $kodnegeri));  
	}
}