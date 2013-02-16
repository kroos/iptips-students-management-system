<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hostel extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('hostel', $limit, $offset);
			}

		function GetWhere($where, $limit, $offset)
			{
				return $this->db->get_where('hostel', $where, $limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('hostel', $insert);
			}

//UPDATE
		function update($where, $update)
			{
				return $this->db->update('hostel', $update, $where);
			}

//DELETE
		function delete($where)
			{
				return $this->db->delete('hostel', $where);
			}
	}
?>