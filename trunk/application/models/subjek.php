<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Subjek extends CI_Model
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//SELECT
		function GetAll()
			{
				return $this->db->order_by('namasubjek_MY DESC')->get('subjek');
			}

		function GetAllPage($num, $offset)
			{
				return $this->db->order_by('namasubjek_MY DESC')->limit($num, $offset)->get('subjek');
			}

		function GetWhere($where)
			{
				$this->db->get_where('subjek', $where);
			}

		function GetWherePage($where, $limit, $offset)
			{
				$this->db->get_where('subjek', $where, $limit, $offset);
			}

		function get_subj($id = NULL)
			{
				if ($id === FALSE)
					{
						return $this->db->order_by('namasubjek_MY DESC')->get('subjek');
					}
					return $this->db->order_by('namasubjek_MY DESC')->get_where('subjek', array('id'=>$id));
			}
		
/*  		function search_subj($nama = NULL)
			{
				if($nama == NULL)
					{
						return $this->db->get('subjek');
					}
				$this->db->like('namasubjek_MY',$nama);
				$this->db->or_like('kodsubjek', $nama);
				$this->db->order_by('namasubjek_MY', 'asc');
				return $this->db->get('subjek');
			} */

		function SearchSub($nama)
			{
				//hanya 1 baris shj kalau perasan...
				return $this->db->
				order_by('namasubjek_MY', 'asc')->
				like('namasubjek_MY',$nama)->
				or_like('kodsubjek', $nama)->
				get('subjek');
			}

		function get_where($where = array())
			{
				return $this->db->get_where('subjek', $where);
			}

//INSERT
		function set_subj($data)
			{
				return $this->db->insert('subjek', $data);
			}

		function insert($data)
			{
				return $this->db->insert('subjek', $data);
			}

//UPDATE
		function edit_subj()
			{
				$data = array(
				'id'=>$this->input->post('id'),
				'kodsubjek'=>$this->input->post('kodsubjek'),
				'namasubjek_MY'=>$this->input->post('namasubjek_MY'),
				'namasubjek_EN'=>$this->input->post('namasubjek_EN'),
				'namasubjek_AR'=>$this->input->post('namasubjek_AR'),
				'kredit'=>$this->input->post('kredit'));
				return $this->db->update('subjek', $data, $data['id']);
			}

		function update($where, $update)
			{
				return $this->db->update('subjek', $update, $where);
			}
	}
?>