<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pel_dafhostel extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('pel_dafhostel', $limit, $offset);
			}

		function GetWhere($where, $limit, $offset)
			{
				return $this->db->get_where('pel_dafhostel', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('pel_dafhostel', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('pel_dafhostel', $update, $where);
			}

//DELETE
		function delete($delete)
			{
				return $this->db->delete('pel_dafhostel', $delete);
			}

//TRUNCATE
		function truncate()
			{
				return $this->db->truncate('pel_dafhostel');
			}
	}
?>