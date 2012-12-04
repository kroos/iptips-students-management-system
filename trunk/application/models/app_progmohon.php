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

		function GetWhereGroup($group, $where)
			{
				return $this->db->group_by($group)->get_where('app_progmohon', $where);
			}

		function app_mohon()
			{
				return $this->db->query("
											SELECT
											app_progmohon.id,
											app_progmohon.id_mohon,
											app_progmohon.siri_mohon,
											app_progmohon.kod_prog,
											app_progmohon.pilihan,
											app_progmohon.status_mohon,
											app_progmohon.user_edit,
											app_progmohon.dt_edit,
											app_progmohon.catatan
											FROM `app_progmohon`
											WHERE
											app_progmohon.status_mohon <> 'DIP'
											GROUP BY
											app_progmohon.id_mohon
										");
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
	}
?>