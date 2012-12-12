<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Yuran_jadual extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('yuran_jadual', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('yuran_jadual', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('yuran_jadual', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('yuran_jadual', $update, $where);
			}

	}
?>