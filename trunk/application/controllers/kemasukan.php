<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kemasukan extends CI_Controller
	{
		//contructor => default utk semua function dlm controller nih...
		public function __construct()
			{
				parent::__construct();

				$this->load->model('app_pelajar');				//nak tau controller ni pakai model mana 1...
				$this->load->model('app_akademik');				//nak tau controller ni pakai model mana 1...
				$this->load->model('app_subjek_akademik');		//nak tau controller ni pakai model mana 1...
				$this->load->model('app_waris');				//nak tau controller ni pakai model mana 1...

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
#############################################################################################################################
		public function index()
			{
				$this->load->view('kemasukan/home');
			}

		public function senarai_pemohon()
			{
				$data['title'] = 'Senarai Pemohon';

				//pagination process
				$this->load->library('pagination');
				$config['base_url'] = base_url().'kemasukan/senarai_pemohon';
				$config['total_rows'] = $this->app_pelajar->GetAll()->num_rows();
				$config['per_page'] = 5;
				$config['suffix'] = '.exe';

				$this->pagination->initialize($config);

				$data['pemohon'] = $this->app_pelajar->GetAllPage($config['per_page'], $this->uri->segment(3, 0));

				$data['paginate'] =$this->pagination->create_links();
			
				$data['negara'] = $this->sel_negara->get();

				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('cari', TRUE))
							{
								$nama = $this->input->post('nama', TRUE);
								$data['pemohon'] = $this->app_pelajar->seacrh_app($nama);
							}
					}
				$this->load->view('kemasukan/senarai_pemohon', $data);
			}
	
			//maklumat pemohon individual
			public function detail_pemohon()
				{
					$id = $this->uri->segment(3, 0);
					if(is_numeric($id))
						{
							$data['pe'] = $this->app_pelajar->get_app_pelajar($id);
							$this->load->view('kemasukan/detail_pemohon', $data);
						}
				}
	
	//insert pemohon
	public function permohonan_baru()
		{
			$data['title'] = 'Permohonan Baru';
			$data['v'] = $this->sel_negara->get();
			$data['vq'] = $this->sel_gender->get();
			$data['vw'] = $this->sel_marital->get();
			$data['bandar'] = $this->sel_bandar->get();
			$data['warga'] = $this->sel_warga->get();
			$data['bangsa'] = $this->sel_race->get();
			$data['ses'] = $this->sesi_intake->GetIntake(1);

			$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
			if ($this->form_validation->run() === TRUE)
				{
					if($this->input->post('simpan', TRUE))
						{
							$insert = array(
												'nama' => ucwords(strtolower($this->input->post('nama', TRUE))),
												'ic' => $this->input->post('ic', TRUE),
												'passport' => $this->input->post('passport', TRUE),
												'dt_lahir' => $this->input->post('dt_lahir', TRUE),
												'tempat_lahir' => ucwords(strtolower($this->input->post('tempat_lahir', TRUE))),
												'status_warga' => $this->input->post('status_warga', TRUE),
												'warganegara' => ucwords(strtolower($this->input->post('warganegara', TRUE))),
												'bangsa' => ucwords(strtolower($this->input->post('bangsa', TRUE))),
												'jantina' => $this->input->post('jantina', TRUE),
												'status_kahwin' => ucwords(strtolower($this->input->post('status_kahwin', TRUE))),
												'alamat1' => ucwords(strtolower($this->input->post('alamat1', TRUE))),
												'alamat2' => ucwords(strtolower($this->input->post('alamat2', TRUE))),
												'poskod' => $this->input->post('poskod', TRUE),
												'bandar' => $this->input->post('bandar', TRUE),
												'negeri' => $this->input->post('negeri', TRUE),
												'negara' => $this->input->post('negara', TRUE),
												'id_add' => $this->session->userdata('id_user'),
												'dt_add' => date_db($date),
												'sesi_mohon' => $this->input->post('sesi_mohon')
												//'id_mohon' => camelize(ucwords(strtolower($this->input->post('id_mohon'))))
											);
							$v = $this->app_pelajar->set_app_pelajar($insert);
							$id = $this->db->insert_id();
							if($v)
								{
									//$data['info'] = 'Data telah berjaya disimpan';
									//redirect('kemasukan/akademik/'.$id.'/'.$this->input->post('id_mohon'), 'location');
									redirect('kemasukan/akademik/'.$id, 'location');
								}
								else
								{
									$data['info'] = 'Data tidak berjaya disimpan. Sila cuba sekali lagi';
								}
						}
				}
			$this->load->view('kemasukan/permohonan_baru',$data);
		}
	
	//akademik
	public function akademik()
		{
			$data['title'] = 'Kelayakan Akademik';
			$id = $this->uri->segment(3, 0);

			if (is_numeric($id))
				{
					$data['lev'] =$this->sel_level->GetAktif(1);

					$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
					if ($this->form_validation->run() == TRUE)
						{
							if($this->input->post('simpan', TRUE))
								{
									$y = $this->app_akademik->get_where(array('id_mohon' => $id, 'level' => $this->input->post('level', TRUE), 'institusi' => ucwords(strtolower($this->input->post('institusi', TRUE)))));
									if($y->num_rows() < 1)
										{
											//app_akademik dulu
											$insert = array
															(
																'id_mohon' => $id,
																'level' => $this->input->post('level', TRUE),
																'institusi' => ucwords(strtolower($this->input->post('institusi', TRUE))),
																'tahun' => $this->input->post('tahun', TRUE)
															);
											$r = $this->app_akademik->set_app_akademik($insert);
											$akademik_id = $this->db->insert_id();

											//masukkan dalam app_subjek_akademik
											$c = array_combine($this->input->post('subjek', TRUE), $this->input->post('gred', TRUE));

											foreach($c as $s => $g)
												{
													$dat[] = $this->app_subjek_akademik->set_app_akademik(array('akademik_id' => $akademik_id, 'subjek' => ucwords(strtolower($s)), 'gred' => ucwords(strtolower($g))));
												}

											if($r && $dat)
												{
													$data['info'] = 'Data telah berjaya disimpan';
													redirect('kemasukan/waris/'.$id, 'location');
												}
												else
												{
													$data['info'] = 'Data tidak berjaya disimpan. Sila cuba sebentar lagi';
												}
										}
										else
										{
											$data['info'] = 'Data yang anda masukkan sudah pun direkodkan';
										}
								}
								else
								{
									if($this->input->post('simpanTam', TRUE))
										{
											$y = $this->app_akademik->get_where(array('id_mohon' => $id, 'level' => $this->input->post('level', TRUE), 'institusi' => ucwords(strtolower($this->input->post('institusi', TRUE)))));
											if($y->num_rows() < 1)
												{
													//app_akademik dulu
													$insert = array
																	(
																		'id_mohon' => $id,
																		'level' => $this->input->post('level', TRUE),
																		'institusi' => ucwords(strtolower($this->input->post('institusi', TRUE))),
																		'tahun' => $this->input->post('tahun', TRUE)
																	);
													$r = $this->app_akademik->set_app_akademik($insert);
													$akademik_id = $this->db->insert_id();

													//masukkan dalam app_subjek_akademik
													$c = array_combine($this->input->post('subjek', TRUE), $this->input->post('gred', TRUE));

													foreach($c as $s => $g)
														{
															$dat[] = $this->app_subjek_akademik->set_app_akademik(array('akademik_id' => $akademik_id, 'subjek' => ucwords(strtolower($s)), 'gred' => ucwords(strtolower($g))));
														}

													if($r && $dat)
														{
															$data['info'] = 'Data telah berjaya disimpan';
															redirect('kemasukan/akademik/'.$id, 'location');
														}
														else
														{
															$data['info'] = 'Data tidak berjaya disimpan. Sila cuba sebentar lagi';
														}
												}
												else
												{
													$data['info'] = 'Data yang anda masukkan sudah pun direkodkan';
												}
										}
								}
						}
					$this->load->view('kemasukan/akademik', $data);
				}
		}

	//waris
		public function waris()
			{
				$id_mohon = $this->uri->segment(3, 0);
				if(is_numeric($id_mohon))
					{
						$data['info'] = '';
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == TRUE)
							{
								if($this->input->post('waris', TRUE))
									{
										$insert = array
														(
															'id_mohon' => $id_mohon,
															'nama' => ucwords(strtolower($this->input->post('nama', TRUE))),
															'hubungan' => ucwords(strtolower($this->input->post('hubungan', TRUE))),
															'alamat1' => ucwords(strtolower($this->input->post('alamat1', TRUE))),
															'alamat2' => ucwords(strtolower($this->input->post('alamat2', TRUE))),
															'poskod' => $this->input->post('poskod', TRUE),
															'notel_rumah' => $this->input->post('notel_rumah', TRUE),
															'notel_pej' => $this->input->post('notel_pej', TRUE),
															'nohp' => $this->input->post('nohp', TRUE),
															'email' => $this->input->post('email', TRUE)
														);
										$v = $this->app_waris->insert_all($insert);
										if($v)
											{
												redirect ('/kemasukan/index', 'location');
											}
											else
											{
												$data['info'] = 'Data tidak berjaya disimpan. Sila cuba sebentar lagi';
											}
									}
							}
						$this->load->view('kemasukan/waris', $data);
					}
					else
					{
						redirect('/kemasukan/index', 'location');
					}
			}
#############################################################################################################################
	}

/* End of file kemasukan.php */
/* Location: ./application/controllers/kemasukan.php */
