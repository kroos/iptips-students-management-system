<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class App_waris extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for App_waris

//SELECT
		function GetAll()
			{
				return $this->db->get('app_waris');
			}

		function GetWhere($where = array())
			{
				return $this->db->get_where('app_waris', $where);
			}
//UPDATE
		function update_all($where = array(), $update = array())
			{
				return $this->db->where($where)->update('app_waris', $update);
			}
//INSERT
		function insert_all($insert = array())
			{
				return $this->db->insert('app_waris', $insert);
			}
//DELETE
		function delete_id($where = array())
			{
				return $this->db->where($where)->delete('app_waris');
			}
	}
?>
