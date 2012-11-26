<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_function extends CI_Model 
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
				return $this->db->get('user_function');
			}

		function id($id)
			{
				return $this->db->get_where('user_function', array('id' => $id));
			}
//UPDATE


//INSERT
		function insert_function($function, $remarks, $menu, $display)
			{
				return $this->db->insert('user_function', array('function' => $function, 'remarks' => $remarks, 'menu' => $menu, 'menu_display' => $display));
			}

//DELETE

	}
?>