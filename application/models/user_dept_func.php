<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_dept_func extends CI_Model 
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
				return $this->db->get('user_dept_func');
			}

		function id_user_data($id)
			{
				return $this->db->get_where('user_dept_func', array('id_user_data' => $id));
			}

		function id($id)
			{
				return $this->db->get_where('user_dept_func', array('id' => $id));
			}
//UPDATE


//INSERT
		function insert($id_user_data, $id_user_department, $id_user_function, $active)
			{
				return $this->db->insert('user_dept_func', array('id_user_data' => $id_user_data, 'id_user_department' => $id_user_department, 'id_user_function' => $id_user_function, 'active' => $active));
			}

//DELETE

	}
?>