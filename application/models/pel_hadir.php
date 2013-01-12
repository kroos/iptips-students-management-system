<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pel_hadir extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('pel_hadir', $limit, $offset);
			}

		function GetWhere($where, $limit, $offset)
			{
				return $this->db->get_where('pel_hadir', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('pel_hadir', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('pel_hadir', $update, $where);
			}

//DELETE
		function delete()
			{
				return $this->db->delete('pel_hadir', $where);
			}
		
		function truncate()
			{
				return $this->db->truncate('pel_hadir');
			}
	}
?>