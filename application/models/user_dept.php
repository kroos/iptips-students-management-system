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


//DELETE

	}
?>