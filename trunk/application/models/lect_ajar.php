<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lect_ajar extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('lect_ajar', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('lect_ajar', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('lect_ajar', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('lect_ajar', $update, $where);
			}

	}
?>