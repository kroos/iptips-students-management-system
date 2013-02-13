<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perpustakaan extends CI_Controller
	{
		//contructor => default utk semua function dlm controller nih...
		public function __construct()
			{
				parent::__construct();

				$this->load->model('pel_lib');				//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_sem');				//nak tau controller ni pakai model mana 1...
				$this->load->model('sesi_akademik');		//nak tau controller ni pakai model mana 1...

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
				$this->load->view('perpustakaan/home');
			}

		public function pinjam()
			{
				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('save', TRUE))
							{
								$h = $this->input->post(NULL, TRUE);
								unset($h['save']);
								//print_r($h);

								//mula2 kena check dulu matrik..kena x wujud nnt susah wooooo...
								$s = $this->sesi_akademik->GetWhere(array('aktif' => 1), NULL, NULL);
								$k = $this->pel_sem->GetWhere(array('sesi' => $s->row()->kodsesi, 'status_pel' => '01', 'aktif' => 1, 'matrik' => strtoupper(strtolower($this->input->post('matrik', TRUE)))), NULL, NULL);
								echo $this->db->last_query();

								if($k->num_rows() < 1)
									{
										$data['info'] = 'No matrik yang dimasukkan tiada dalam rekod. Sila periksa ejaan no matrik pelajar';
									}
									else
									{
										if($this->input->post('tarikh_clear', TRUE) == NULL)
											{
												$d = $this->pel_lib->insert(array('matrik' => strtoupper(strtolower($this->input->post('matrik', TRUE))), 'sesi' => $s->row()->kodsesi, 'sem' => $k->row()->sem, 'aktif' => 1));
												if($d)
													{
														$data['info'] = 'Data berjaya disimpan';
													}
													else
													{
														$data['info'] = 'Sila cuba sebentar lagi';
													}
											}
											else
											{
												$d = $this->pel_lib->insert(array('matrik' => strtoupper(strtolower($this->input->post('matrik', TRUE))), 'sesi' => $s->row()->kodsesi, 'sem' => $k->row()->sem, 'aktif' => 0, 'tarikh_clear' => $this->input->post('tarikh_clear', TRUE)));
												if($d)
													{
														$data['info'] = 'Data berjaya disimpan';
													}
													else
													{
														$data['info'] = 'Sila cuba sebentar lagi';
													}
											}
									}
							}
					}
				$this->load->view('perpustakaan/pinjam', $data);
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

/* End of file perpustakaan.php */
/* Location: ./application/controllers/perpustakaan.php */