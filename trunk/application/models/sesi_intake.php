<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sesi_intake extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for user_data

//SELECT
		function GetAll()
			{
				return $this->db->order_by()->get('sesi_intake');
			}

		function GetKodSesi($kodsesi)
			{
				return $this->db->get_where('sesi_intake', array('kodsesi' => $kodsesi));
			}

		function GetIntake($aktif)
			{
				return $this->db->get_where('sesi_intake', array('aktif' => $aktif, 'tarikh_tamat >= ' => date_db(now())));
			}
//UPDATE


//INSERT
		function insert_sesi($id_user_data, $id_user_department)
			{
				return $this->db->insert('sesi_intake', array('id_user_data' => $id_user_data, 'id_user_department' => $id_user_department));
			}

//DELETE

	}
?>