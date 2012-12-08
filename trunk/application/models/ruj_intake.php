<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ruj_intake extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
	}
#############################################################################################################################
//CRUD for user_data

	//select		
	function get($array = FALSE){
		if ($array === FALSE)
        {
            return $this->db->get('ruj_intake');
        }
        return $this->db->get_where('ruj_intake', $array);  
	}

	//insert
	function set_template($array){
		return $this->db->insert('ruj_intake', $array);
	}
	
	//update
	function edit_template($set, $where){
		return $this->db->update('ruj_intake', $set, $where);
	}

#############################################################################################################################
//TRUNCATE
		public function truncate()
			{
				return $this->db->truncate('ruj_intake');
			}
}