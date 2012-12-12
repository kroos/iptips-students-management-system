<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pelajar extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('pelajar', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('pelajar', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('pelajar', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('pelajar', $update, $where);
			}

#############################################################################################################################
//TRUNCATE
		public function truncate()
			{
				return $this->db->truncate('pelajar');
			}
	}
?>