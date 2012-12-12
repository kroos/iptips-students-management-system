<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Prog_subjek extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('prog_subjek', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('prog_subjek', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('prog_subjek', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('prog_subjek', $update, $where);
			}

	}
?>