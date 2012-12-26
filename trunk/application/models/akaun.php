<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Akaun extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll($limit, $offset)
			{
				return $this->db->get('akaun', $limit, $offset);
			}

		function GetWhere($where , $limit, $offset)
			{
				return $this->db->get_where('akaun', $where ,$limit, $offset);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('akaun', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('akaun', $update, $where);
			}

	}
?>