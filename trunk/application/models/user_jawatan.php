<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_jawatan extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for user_data

//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('user_jawatan', $limit, $offset);
			}

		function GetWhere($where, $limit, $offset)
			{
				return $this->db->get_where('user_jawatan', $where, $limit, $offset);
			}
//UPDATE


//INSERT
		function insert($insert)
			{
				return $this->db->insert('user_jawatan', $insert);
			}

//DELETE

	}
?>