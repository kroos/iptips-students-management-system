<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_akademik extends CI_Model{
	function __construct()
			{
				parent::__construct();
			}
	
	//select
	function get_app_akademik($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('app_akademik');
            return $query->result_array();
        }
        $query = $this->db->get_where('app_akademik', array('id'=>$id));
        return $query->row_array();        
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
#############################################################################################################################
//truncate
		public function truncate()
			{
				return $this->db->truncate('app_akademik');
			}


	}