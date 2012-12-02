<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sel_statusmohon extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll()
			{
				return $this->db->get('sel_statusmohon');
			}

		function GetWhere($where)
			{
				return $this->db->get_where('sel_statusmohon', $where);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('sel_statusmohon', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->where($where)->update('sel_statusmohon', $update);
			}
	}
?>