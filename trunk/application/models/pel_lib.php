<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pel_lib extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('pel_lib', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('pel_lib', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('pel_lib', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('pel_lib', $update, $where);
			}

#############################################################################################################################
//TRUNCATE
		public function truncate()
			{
				return $this->db->truncate('pel_lib');
			}
	}
?>