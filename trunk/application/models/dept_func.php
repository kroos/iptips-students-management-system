<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dept_func extends CI_Model 
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
				return $this->db->get('dept_func');
			}

		function id_user_department($id)
			{
				return $this->db->get_where('dept_func', array('id_user_department' => $id));
			}

		function id($id)
			{
				return $this->db->get_where('dept_func', array('id' => $id));
			}
//UPDATE


//INSERT
		function insert_func($id_user_department, $id_user_function)
			{
				return $this->db->insert('dept_func', array('id_user_department' => $id_user_department, 'id_user_function' => $id_user_function));
			}

//DELETE

	}
?>