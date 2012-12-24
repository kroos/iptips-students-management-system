<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pel_subjek_gred extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('pel_subjek_gred', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('pel_subjek_gred', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('pel_subjek_gred', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('pel_subjek_gred', $update, $where);
			}

#############################################################################################################################
//TRUNCATE
		public function truncate()
			{
				return $this->db->truncate('pel_subjek_gred');
			}
	}
?>