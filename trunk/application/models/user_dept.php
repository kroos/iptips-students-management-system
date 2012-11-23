<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_dept extends CI_Model 
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
				return $this->db->get('user_dept');
			}

		function id_user_data($id)
			{
				return $this->db->get_where('user_dept', array('id_user_data' => $id));
			}
//UPDATE


//INSERT
		function insert_us_dept($id_user_data, $id_user_department)
			{
				return $this->db->insert('user_dept', array('id_user_data' => $id_user_data, 'id_user_department' => $id_user_department));
			}

//DELETE

	}
?>