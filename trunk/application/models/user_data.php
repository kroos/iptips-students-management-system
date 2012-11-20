<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_data extends CI_Model 
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
				return $this->db->get('user_data');
			}

		function login($user, $pass)
			{
				return $this->db->get_where('user_data', array('username' => $user, 'password' => $pass));
			}

		function id($id)
			{
				return $this->db->get_where('user_data', array('id' => $id));
			}
//UPDATE


//INSERT
		function insert_user($username, $password, $ic, $name, $address, $city, $state, $zip, $cellphone, $telephone, $email, $dateAdded)
			{
				return $this->db->insert('user_data', array('username' => $username, 'password' => $password, 'ic' => $ic, 'name' => $name, 'address' => $address, 'city' => $city, 'state' => $state, 'zip' => $zip, 'cellphone' => $cellphone, 'telephone' => $telephone, 'email' => $email, 'dateAdded' => $dateAdded));
			}

//DELETE

	}
?>