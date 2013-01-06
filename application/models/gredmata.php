<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gredmata extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('gredmata', $limit, $offset);
			}

		function GetWhere($where, $limit, $offset)
			{
				return $this->db->get_where('gredmata', $where, $limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('gredmata', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('gredmata', $update, $where);
			}
	}
?>