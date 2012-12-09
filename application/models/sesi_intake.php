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
				return $this->db->order_by('kod_sesi')->get('sesi_intake');
			}

		function GetWhere($where)
			{
				return $this->db->get_where('sesi_intake', $where);
			}

		function GetAllPage($order, $limit, $offset)
			{
				return $this->db->order_by($order)->get('sesi_intake', $limit, $offset);
			}

		function GetWherePage($where, $order, $limit, $offset)
			{
				return $this->db->order_by($order)->get_where('sesi_intake', $where, $limit, $offset);
			}

		function GetKodSesi($kodsesi)
			{
				return $this->db->get_where('sesi_intake', array('kodsesi' => $kodsesi));
			}

		function GetIntake($aktif)
			{
				return $this->db->get_where('sesi_intake', array('aktif' => $aktif ));
			}

//UPDATE
		function update($where, $update)
			{
				return $this->db->update('sesi_intake', $update, $where);
			}

//INSERT
		function insert($insert)
			{
				return $this->db->insert('sesi_intake', $insert);
			}

//DELETE

	}
?>