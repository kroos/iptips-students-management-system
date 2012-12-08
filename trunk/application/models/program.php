<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Program extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('program', $limit, $offset);
			}

		function GetWhere($where, $limit, $offset)
			{
				return $this->db->get_where('program', $where, $limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('program', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->where($where)->update('program', $update);
			}
	}
?>