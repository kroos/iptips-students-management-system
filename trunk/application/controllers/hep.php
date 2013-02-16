<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hep extends CI_Controller
	{
		//contructor => default utk semua function dlm controller nih...
		public function __construct()
			{
				parent::__construct();

				$this->load->model('sesi_akademik');				//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_sem');						//nak tau controller ni pakai model mana 1...
				$this->load->model('pelajar');						//nak tau controller ni pakai model mana 1...
				$this->load->model('program');						//nak tau controller ni pakai model mana 1...
				$this->load->model('hostel');						//nak tau controller ni pakai model mana 1...

				//mesti ikut peraturan ni..
				//user mesti log on kalau tidak redirect to index
				if ($this->session->userdata('logged_in') === FALSE)
					{
						redirect('/isms/index', 'location');
					}
					else
					{
						//user mesti ada access ni kalau tidak redirect to unauthorised
						if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === FALSE)
							{
								redirect('/isms/unauthorised', 'location');
							}
					}
			}

		public function index()
			{
				$this->load->view('hep/home');
			}

		public function hostel_pelajar()
			{
				$se = $this->sesi_akademik->GetWhere(array('aktif' => 1), NULL, NULL);
				if ($se->num_rows() == 1)
					{
						$es = $se->row()->kodsesi;
						$data['ps'] = $this->pel_sem->GetWhere(array('sesi' => $es, 'status_pel' => '01', 'aktif' => 1), NULL, NULL);
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == TRUE)
							{
								if($this->input->post('cari', TRUE))
									{
										$matrik = strtoupper(strtolower($this->input->post('matrik', TRUE)));

										$data['ps'] = $this->pel_sem->GetWhere(array('matrik LIKE ' => '%'.$matrik.'%', 'sesi' => $es, 'status_pel' => '01', 'aktif' => 1), NULL, NULL);
										//echo $this->db->last_query();
										if($data['ps'])
											{
												$data['info'] = 'Carian berjaya';
											}
											else
											{
												$data['info'] = 'Sila cuba sebentar lagi';
											}
									}
							}
					}
					else
					{
						$data['info'] = 'Tidak dapat menentukan sesi akademik. Sila hubungi Admin';
					}
				$this->load->view('hep/hostel_pelajar', $data);
			}

		public function daftar_pelajar()
			{
				$id = $this->uri->segment(3, 0);
				if(is_numeric($id))
					{
						
					}
				$this->load->view('hep/daftar_pelajar', @$data);
			}

		public function konfigurasi_asrama()
			{
				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('simpan', TRUE))
							{
								$ho = $this->input->post(NULL, TRUE);
								unset($ho['simpan']);
								//print_r($ho);
								$k = $this->hostel->insert($ho);
								if($k)
									{
										$data['info'] = 'Data disimpan';
									}
									else
									{
										$data['info'] = 'Sila cuba sebentar lagi';
									}
							}
					}
				$data['ps'] = $this->hostel->GetAll(NULL, NULL);
				$this->load->view('hep/asrama', @$data);
			}



















































































































































































































































































#############################################################################################################################
//error 404
		public function page_missing()
			{
				$this->load->view('errors/error_custom_404');
			}

#############################################################################################################################
//template
/*
		public function home()
			{
				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == FALSE)
					{
						//form
						
					}
					else
					{
						//form process
						
					}
			}
*/
#############################################################################################################################
	}

/* End of file hep.php */
/* Location: ./application/controllers/hep.php */