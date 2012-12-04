<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class App_pelajar extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll()
			{
				return $this->db->order_by('sesi_mohon ASC')->get('app_pelajar');
			}

		function GetAllPage($num, $offset)
			{
				return $this->db->order_by('sesi_mohon ASC')->limit($num, $offset)->get('app_pelajar');
			}

		function GetWhere($where)
			{
				return $this->db->order_by('dt_add ASC')->get_where('app_pelajar', $where);
			}

		function GetWherePage($where, $num, $offset)
			{
				return $this->db->order_by('dt_add ASC')->limit($num, $offset)->get_where('app_pelajar', $where);
			}

		function get_app_pelajar($id = NULL)
			{
				if ($id === FALSE)
					{
						return $this->db->order_by('sesi_mohon DESC')->get('app_pelajar');
					}
				return $this->db->order_by('sesi_mohon DESC')->get_where('app_pelajar', array('id'=>$id));
			}
		
		function seacrh_app($nama = NULL)
			{
				if($nama == NULL)
					{
						return $this->db->get('app_pelajar');
					}
				$this->db->like('ic',$nama);
				$this->db->or_like('nama', $nama);
				$this->db->or_like('passport', $nama);
				//$this->db->order_by('nama', 'asc');
				return $this->db->get('app_pelajar');
			}
		
		function get_where($where = array())
			{
				return $this->db->get_where('app_pelajar', $where);
			}

//INSERT
		function set_app_pelajar($data)
			{
				return $this->db->insert('app_pelajar', $data);
			}

//UPDATE
		function update($update, $where)
			{
				return $this->db->update('app_pelajar', $update, $where);
			}

		function edit_app_pelajar()
			{
				$data = array(
								'id' => $this->input->post('id'),
								'matrik' => $this->input->post('matrik'),
								'nama' => $this->input->post('nama'),
								'ic' => $this->input->post('ic'),
								'passport' => $this->input->post('passport'),
								'dt_lahir' => $this->input->post('dt_lahir'),
								'tempat_lahir' => $this->input->post('tempat_lahir'),
								'status_warga' => $this->input->post('status_warga'),
								'warganegara' => $this->input->post('warganegara'),
								'bangsa' => $this->input->post('bangsa'),
								'jantina' => $this->input->post('bangsa'),
								'status_kahwin' => $this->input->post('status_kahwin'),
								'alamat1' => $this->input->post('alamat1'),
								'alamat2' => $this->input->post('alamat2'),
								'poskod' => $this->input->post('poskod'),
								'bandar' => $this->input->post('bandar'),
								'negeri' => $this->input->post('negeri'),
								'negara' => $this->input->post('negara'),
								'id_add' => $this->input->post('id_add'),
								'dt_add' => $this->input->post('dt_add'),
								'id_edit' => $this->input->post('id_edit'),
								'dt_edit' => $this->input->post('dt_edit'),
								'layak' => $this->input->post('layak'),
								'id_transfer' => $this->input->post('id_transfer'),
								'dt_transfer' => $this->input->post('dt_transfer')
							);
				return $this->db->update('app_pelajar', $data, $data['id']);
			}
	}
?>