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

		function GetAllXISMS()
			{
				return $this->db->get_where('user_department', array('id >' => 1));
			}

		function id($id)
			{
				return $this->db->get_where('user_department', array('id' => $id));
			}

		function GetWhere($where, $limit, $offset)
			{
				return $this->db->Get_where('user_department', $where, $limit, $offset);
			}
//UPDATE


//INSERT


//DELETE

	}
?>