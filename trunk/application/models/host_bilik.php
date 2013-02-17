<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Host_bilik extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('host_bilik', $limit, $offset);
			}

		function GetWhere($where, $limit, $offset)
			{
				return $this->db->get_where('host_bilik', $where, $limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('host_bilik', $insert);
			}

//UPDATE
		function update($where, $update)
			{
				return $this->db->update('host_bilik', $update, $where);
			}

//DELETE
		function delete($where)
			{
				return $this->db->delete('host_bilik', $where);
			}
	}
?>