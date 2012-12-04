<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sel_hubungan extends CI_Model 
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
				return $this->db->get('sel_hubungan');
			}

		function GetWhere($where)
			{
				return $this->db->get_where('sel_hubungan', $where);
			}

//UPDATE
		function update($update, $where)
			{
				return $this->db->update('sel_hubungan', $update, $where);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('sel_hubungan', $insert);
			}

//DELETE
		function delete($where)
			{
				return $this->db->delete('sel_hubungan', $where);
			}
	}
?>