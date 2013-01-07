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

		function GetWhereBetween($jum_mark)
			{
				$dateRange = "'$jum_mark' BETWEEN mark1 AND  mark2";
				$this->db->where($dateRange, NULL, FALSE);  
				return $this->db->get('gredmata');
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