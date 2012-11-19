<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_department extends CI_Model 
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
				return $this->db->get('user_department');
			}

		function id($id)
			{
				return $this->db->get_where('user_department', array('id' => $id));
			}
//UPDATE


//INSERT


//DELETE

	}
?>