<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pel_waris extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('pel_waris', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('pel_waris', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('pel_waris', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('pel_waris', $update, $where);
			}

#############################################################################################################################
//TRUNCATE
		public function truncate()
			{
				return $this->db->truncate('pel_waris');
			}
	}
?>