<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pel_sem extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('pel_sem', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('pel_sem', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('pel_sem', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('pel_sem', $update, $where);
			}

#############################################################################################################################
//TRUNCATE
		public function truncate()
			{
				return $this->db->truncate('pel_sem');
			}
	}
?>