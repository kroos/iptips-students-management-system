<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Siri_invois extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('siri_invois', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('siri_invois', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('siri_invois', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('siri_invois', $update, $where);
			}

	}
?>