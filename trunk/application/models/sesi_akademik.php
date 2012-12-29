<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sesi_akademik extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('sesi_akademik', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('sesi_akademik', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('sesi_akademik', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('sesi_akademik', $update, $where);
			}

	}
?>