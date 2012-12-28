<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dept_jaw extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for user_data

//SELECT
		function GetAll()
			{
				return $this->db->get('dept_jaw', $limit, $offset);
			}

		function GetWhere($where)
			{
				return $this->db->get_where('dept_jaw', $where, $limit, $offset);
			}
//UPDATE


//INSERT
		function insert($insert)
			{
				return $this->db->insert('dept_jaw', $insert);
			}

//DELETE

	}
?>