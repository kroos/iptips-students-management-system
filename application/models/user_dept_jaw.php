<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_dept_jaw extends CI_Model 
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
				return $this->db->get('user_dept_jaw');
			}

		function id_user_dept_jaw($id)
			{
				return $this->db->get_where('user_dept_jaw', array('id_user_department' => $id));
			}

		function id($id)
			{
				return $this->db->get_where('user_dept_jaw', array('id' => $id));
			}
//UPDATE


//INSERT
		function insert_jaw($id_user_data, $id_user_department, $id_user_jawatan)
			{
				return $this->db->insert('user_dept_jaw', array('id_user_data' => $id_user_data, 'id_user_department' => $id_user_department, 'id_user_jawatan' => $id_user_jawatan));
			}

//DELETE

	}
?>