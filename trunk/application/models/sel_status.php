<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sel_status extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('sel_status', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('sel_status', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('sel_status', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('sel_status', $update, $where);
			}

	}
?>