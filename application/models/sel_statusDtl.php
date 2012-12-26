<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sel_statusDtl extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('sel_statusDtl', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('sel_statusDtl', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('sel_statusDtl', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('sel_statusDtl', $update, $where);
			}

	}
?>