<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pel_resit extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll()
			{
				return $this->db->get('pel_resit');
			}

		function GetWhere($where)
			{
				return $this->db->get_where('pel_resit', $where);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('pel_resit', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('pel_resit', $update, $where);
			}
	}
?>