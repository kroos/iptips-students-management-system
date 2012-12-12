<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Yuran_prog extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('yuran_prog', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('yuran_prog', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('yuran_prog', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('yuran_prog', $update, $where);
			}

	}
?>