<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pel_daftarsubjek extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('pel_daftarsubjek', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('pel_daftarsubjek', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('pel_daftarsubjek', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('pel_daftarsubjek', $update, $where);
			}

	}
?>