<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sel_level extends CI_Model 
	{
		function __construct()
		{
			parent::__construct();
		}
#############################################################################################################################
//CRUD for sel_level
//SELECT
		function GetAll()
			{
				return $this->db->get('sel_level');
			}

		function GetAktif($aktif)
			{
				return $this->db->get_where('sel_level', array('aktif' => $aktif));
			}

	function get($id = FALSE){
		if ($id === FALSE)
        {
            return $this->db->get('sel_level');
            //return $query->result_array();
        }
        return $this->db->get_where('sel_level', array('id'=>$id));  
	}
	
	function get_where($array){
		return $this->db->get_where('sel_level', $array);
	}
#############################################################################################################################
//UPDATE
		function update_aktif($kodtahap, $aktif)
			{
				return $this->db->where('kodtahap', $kodtahap)->update('sel_level', array('aktif' => $aktif));
			}
#############################################################################################################################
//INSERT
#############################################################################################################################
//DELETE
	}
?>