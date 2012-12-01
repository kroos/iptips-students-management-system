<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_akademik extends CI_Model
	{
		public function _construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//select
		public function get_app_akademik($id = FALSE)
			{
				if ($id === FALSE)
					{
						return $this->db->get('app_akademik');
					}
					return $this->db->get_where('app_akademik', array('id'=>$id));
			}
    
		public function get_where($where = array())
			{
				return $this->db->get_where('app_akademik', $where);
			}
#############################################################################################################################
//insert
		public function set_app_akademik($data)
			{
				return $this->db->insert('app_akademik', $data);
			}

#############################################################################################################################
//update
		public function edit_app_akademik()
			{
				$data = array(
						'id' => $this->input->post('id'),
						'id_mohon' => $this->input->post('id_mohon'),
						'level' => $this->input->post('ic'),
						'institusi' => $this->input->post('passport'),
						'tahun' => $this->input->post('dt_lahir')
				);
				return $this->db->update('app_pelajar', $data, $data['id']);
			}
#############################################################################################################################
//delete
	}