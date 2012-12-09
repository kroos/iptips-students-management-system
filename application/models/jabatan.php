<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jabatan extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll()
			{
				return $this->db->get('jabatan');
			}

		function GetWhere($where)
			{
				return $this->db->get_where('jabatan', $where);
			}
			

//INSERT
		function insert($insert)
			{
				return $this->db->insert('jabatan', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->where($where)->update('jabatan', $update);
			}
	}
?>