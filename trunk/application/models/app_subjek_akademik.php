<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_subjek_akademik extends CI_Model
	{
		public function _construct()
		{
			parent::__construct();
		}

#############################################################################################################################
//SELECT
		public function get_app_subjek_akademik($id = FALSE)
			{
				if ($id === FALSE)
				{
					return $this->db->get('app_subjek_akademik');
				}
				return $this->db->get_where('app_subjek_akademik', array('id'=>$id));
			}
    
		public function get_where($where = array())
			{
				return $this->db->get_where('app_subjek_akademik', $where);
			}

#############################################################################################################################
//INSERT
		public function set_app_akademik($data)
			{
				return $this->db->insert('app_subjek_akademik', $data);
			}

#############################################################################################################################
//UPDATE
		public function edit_app_akademik($id, $data)
			{
				return $this->db->where(array('id' => $id))->update('app_subjek_akademik', $data);
			}
    
#############################################################################################################################
//DELETE
		public function delete_app_subjek_akademik($id)
			{
				return $this->db->where(array('id' => $id))->delete('app_subjek_akademik');
			}
}