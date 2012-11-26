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
				return $this->db->order_by('name', 'ASC')->get('user_data');
			}

		function GetAllXAdmin()
			{
				return $this->db->order_by('name', 'ASC')->get_where('user_data', array('id <>' => 1));
			}

		function login($user, $pass)
			{
				return $this->db->get_where('user_data', array('username' => $user, 'password' => $pass));
			}

		function forgot_pass($user, $email)
			{
				return $this->db->get_where('user_data', array('username' => $user, 'email' => $email));
			}

		function id($id)
			{
				return $this->db->get_where('user_data', array('id' => $id));
			}

		function search_user($name)
			{
				return $this->db->order_by('name', 'ASC')->get_where('user_data', array('id <>' => 1, 'name' => $name));
			}

//UPDATE
		function update_profile($id_user, $name, $ic, $email, $address, $city, $state, $zip, $cellphone, $telephone)
			{
				return $this->db->where(array('id' => $id_user))->update('user_data', array('name' => $name, 'ic' => $ic, 'email' => $email, 'address' => $address, 'city' => $city, 'state' => $state, 'zip' => $zip, 'cellphone' => $cellphone, 'telephone' => $telephone));
			}

		function update_pass($id_user, $password)
			{
				return $this->db->where(array('id' => $id_user))->update('user_data', array('password' => $password));
			}
//INSERT
		function insert_user($username, $password, $ic, $name, $address, $city, $state, $zip, $cellphone, $telephone, $email, $dateAdded)
			{
				return $this->db->insert('user_data', array('username' => $username, 'password' => $password, 'ic' => $ic, 'name' => $name, 'address' => $address, 'city' => $city, 'state' => $state, 'zip' => $zip, 'cellphone' => $cellphone, 'telephone' => $telephone, 'email' => $email, 'dateAdded' => $dateAdded));
			}

//DELETE

	}
?>