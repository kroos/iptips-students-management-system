<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class App_progmohon extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll()
			{
				return $this->db->get('app_progmohon');
			}

		function GetWhere($where)
			{
				return $this->db->get_where('app_progmohon', $where);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('app_progmohon', $insert);
			}
//UPDATE
		function update($where, $update)
			{
				return $this->db->update('app_progmohon', $update, $where);
			}
//DELETE
		function delete($where)
			{
				return $this->db->delete('app_progmohon', $where);
			}
			
#############################################################################################################################
//TRUNCATE
		public function truncate()
			{
				return $this->db->truncate('app_progmohon');
			}
	}
?>