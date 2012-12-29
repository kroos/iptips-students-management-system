<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hea extends CI_Controller
	{
		//contructor => default utk semua function dlm controller nih...
		public function __construct()
			{
				parent::__construct();

				$this->load->model('subjek');					//nak tau controller ni pakai model mana 1...
				$this->load->model('pelajar');					//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_waris');					//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_sem');					//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_akademik');					//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_subjek_akademik');					//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_daftarsubjek');					//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_subjek_gred');					//nak tau controller ni pakai model mana 1...
				$this->load->model('prog_subjek');					//nak tau controller ni pakai model mana 1...
				$this->load->model('sesi_akademik');					//nak tau controller ni pakai model mana 1...
				$this->load->model('lect_ajar');					//nak tau controller ni pakai model mana 1...

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
				$this->load->view('hea/home');
			}

#############################################################################################################################
//error 404
		public function page_missing()
			{
				$this->load->view('errors/error_custom_404');
			}

#############################################################################################################################
		public function info_pelajar()
			{
				//pagination process
				$this->load->library('pagination');
				$config['base_url'] = base_url().'hea/info_pelajar';
				$config['total_rows'] = $this->pelajar->GetAll(NULL, NULL)->num_rows();
				$config['per_page'] = 5;
				$config['suffix'] = '.exe';
				$this->pagination->initialize($config);

				$data['all'] = $this->pelajar->GetAll($config['per_page'], $this->uri->segment(3, 0));

				$data['paginate'] = $this->pagination->create_links();
				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('check', TRUE))
							{
								$ic = $this->input->post('ic', TRUE);
								$array = 'nama LIKE \'%'.$ic.'%\' OR matrik LIKE \'%'.$ic.'%\' OR ic LIKE \'%'.$ic.'%\' OR passport LIKE \'%'.$ic.'%\'';
								$data['all'] = $this->pelajar->GetWhere($array, $config['per_page'], $this->uri->segment(3, 0));
								//echo $this->db->last_query();
							}
					}
				$this->load->view('hea/info_pelajar', $data);
			}

		public function edit()
			{
				$matrik = $this->uri->segment(3, 0);
				$data['v'] = $this->sel_negara->get();
				$data['vq'] = $this->sel_gender->get();
				$data['vw'] = $this->sel_marital->get();
				$data['bandar'] = $this->sel_bandar->get();
				$data['warga'] = $this->sel_warga->get();
				$data['bangsa'] = $this->sel_race->get();

				$data['ses'] = $this->sesi_intake->GetAllPage('tarikh_mula', NULL, NULL);

				$data['z'] = $this->pelajar->GetWhere(array('matrik' => $matrik), NULL ,NULL);

				if($data['z']->num_rows() == 1)
					{
						$data['title'] = 'Kemaskini Pelajar '.$data['z']->row()->nama;

						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == TRUE)
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
															'id_edit' => $this->session->userdata('id_user'),
															'dt_edit' => date_db(now()),
															'sesi_daftar' => $this->input->post('sesi_daftar', TRUE),
															'notel' => $this->input->post('notel', TRUE),
															'nohp' => $this->input->post('nohp', TRUE),
															'emel' => $this->input->post('emel', TRUE)
														);
										$d = $this->pelajar->update(array('matrik' => $matrik), $insert);
										if ($d)
											{
												redirect('hea/edit_waris/'.$matrik, 'location');
											}
											else
											{
												$data['info'] = 'Data tidak berjaya disimpan. Sila cuba sebentar lagi';
											}
									}
							}
						$this->load->view('hea/edit_pelajar', $data);
					}
			}

		public function edit_waris()
			{
				$matrik = $this->uri->segment(3, 0);
				$data['c'] = $this->pel_waris->GetWhere(array('matrik' => $matrik), NULL ,NULL);
				if($data['c']->num_rows() == 1)
					{
						$data['info'] = '';
						$data['h'] = $this->sel_hubungan->GetAll();
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == TRUE)
							{
								if($this->input->post('waris', TRUE))
									{
										$insert = array
														(
															'nama' => ucwords(strtolower($this->input->post('nama', TRUE))),
															'hubungan' => $this->input->post('hubungan', TRUE),
															'alamat1' => ucwords(strtolower($this->input->post('alamat1', TRUE))),
															'alamat2' => ucwords(strtolower($this->input->post('alamat2', TRUE))),
															'poskod' => $this->input->post('poskod', TRUE),
															'no_telefon' => $this->input->post('no_telefon', TRUE)
														);
										$v = $this->pel_waris->update(array('matrik' => $matrik), $insert);
										if($v)
											{
												redirect ('/hea/edit_akademik/'.$matrik, 'location');
											}
											else
											{
												$data['info'] = 'Data tidak berjaya disimpan. Sila cuba sebentar lagi';
											}
									}
							}
						$this->load->view('hea/edit_waris', $data);
					}
					else
					{
						redirect('/hea/index', 'location');
					}
			}

		public function edit_akademik()
			{
				$data['title'] = 'Kelayakan Akademik';
				$matrik = $this->uri->segment(3, 0);

				$data['lev'] = $this->sel_level->GetAktif(1);
				
				//dapatkan maklumat akademik
				$data['akademik'] = $this->pel_akademik->GetWhere(array('matrik' => $matrik), NULL, NULL);
				
				if ($data['akademik']->num_rows() > 0)
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == TRUE)
							{
								if($this->input->post('simpan', TRUE))
									{
										$y = $this->pel_akademik->GetWhere(array('matrik' => $matrik, 'level' => $this->input->post('level', TRUE), 'institusi' => ucwords(strtolower($this->input->post('institusi', TRUE)))));
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
												$r = $this->pel_akademik->set_app_akademik($insert);
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
														redirect('kemasukan/permohonan', 'location');
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
						$this->load->view('hea/edit_akademik', $data);
					}
			}

		public function daftar_subjek()
			{
				//tak tau nak start dari mana niiii..........hentam sajalah labuuuu...
				//papar student, program dan subjek? kendian boleh edit?
				//mbik terus dari pel_sem?

				$data['info'] = '';
				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('check', TRUE))
							{
								$ic = $this->input->post('ic', TRUE);
								$array = 'status_pljr = \'A\' AND (nama LIKE \'%'.$ic.'%\' OR matrik LIKE \'%'.$ic.'%\' OR ic LIKE \'%'.$ic.'%\' OR passport LIKE \'%'.$ic.'%\')';
								$data['all'] = $this->pelajar->GetWhere($array, NULL, NULL);
								if($data['all'])
									{
										$data['info'] = 'Carian berjaya dilakukan';
									}
									else
									{
										$data['info'] = 'Carian tidak berjaya';
									}
							}
					}
				$this->load->view('hea/daftar_subjek', $data);
			}

		public function urus_subjek()
			{
				$matrik = $this->uri->segment(3, 0);
				$m = $this->pelajar->GetWhere(array('matrik' => $matrik), NULL, NULL);
				$pelsem = $this->pel_sem->GetWhere(array('matrik' => $matrik, 'aktif' => 1), NULL, NULL);

				if($m->num_rows() == 1)
					{
						$data['m'] = $this->pel_subjek_gred->GetWhere(array('matrik' => $matrik, 'sesi' => $pelsem->row()->sesi, 'sem' => $pelsem->row()->sem, 'id_drop IS NULL' => NULL, 'id_ign IS NULL' => NULL), NULL, NULL);
						//echo $this->db->last_query();

						if($pelsem->row()->status_pel == '01')
							{
								$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
								if ($this->form_validation->run() == TRUE)
									{
										if($this->input->post('save', TRUE))
											{
												$h = $this->input->post('subjek', TRUE);
												$matrik = $this->input->post('matrik', TRUE);
												$erray = array
																(
																	'matrik' => $matrik,
																	'kodsubjek' => $h,
																	'sesi' => $pelsem->row()->sesi,
																	'sem' => $pelsem->row()->sem,
																	'kredit' => $this->subjek->GetWhere(array('kodsubjek' => $h))->row()->kredit,
																	'id_add' => $this->session->userdata('id_user'),
																	'dt_add' => datetime_db(now())
																);
												$erray1 = array
																(
																	'matrik' => $matrik,
																	'kodsubjek' => $h,
																	'sesi' => $pelsem->row()->sesi,
																	'sem' => $pelsem->row()->sem,
																	'kredit' => $this->subjek->GetWhere(array('kodsubjek' => $h))->row()->kredit,
																	'id_drop IS NULL' => NULL,
																	'id_ign IS NULL' => NULL
																);
												$vm = $this->pel_subjek_gred->GetWhere($erray1, NULL, NULL);
												if($vm->num_rows == 1)
													{
														$data['info'] = 'Matapelajaran ini sudah pun didaftarkan';
													}
													else
													{
														$gh = $this->pel_subjek_gred->insert($erray);
														if($gh)
															{
																$data['info'] = 'Penambahan matapelajaran berjaya dilakukan';
																$data['m'] = $this->pel_subjek_gred->GetWhere(array('matrik' => $matrik, 'sesi' => $pelsem->row()->sesi, 'sem' => $pelsem->row()->sem, 'id_drop IS NULL' => NULL, 'id_ign IS NULL' => NULL), NULL, NULL);
															}
															else
															{
																$data['info'] = 'Sila cuba sebentar lagi. Penambahan tidak berjaya';
																$data['m'] = $this->pel_subjek_gred->GetWhere(array('matrik' => $matrik, 'sesi' => $pelsem->row()->sesi, 'sem' => $pelsem->row()->sem, 'id_drop IS NULL' => NULL, 'id_ign IS NULL' => NULL), NULL, NULL);
															}
													}
											}
									}
							}
							else
							{
								$data['info'] = 'Pelajar berstatus selain dari aktif';
							}
						$this->load->view('hea/urus_subjek', $data);
					}
			}

		public function drop_subj()
			{
				$matrik = $this->uri->segment(3, 0);
				$id = $this->uri->segment(4, 0);
				$drp = $this->pel_subjek_gred->update(array('id' => $id), array('id_drop' => $this->session->userdata('id_user'), 'dt_drop' => datetime_db(now())));
				if($drp)
					{
						redirect('hea/urus_subjek/'.$matrik, 'location');
					}
					else
					{
						redirect('hea/urus_subjek/'.$matrik, 'location');
					}
			}

		public function status_pelajar()
			{
				$data['info'] = '';
				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('cari', TRUE))
							{
								$matrik = $this->input->post('ic', TRUE);
								$d = $this->pelajar->GetWhere(array('matrik LIKE \'%'.$matrik.'%\'' => NULL, 'status_pljr' => 'A'), NULL, NULL);
								if ($d)
									{
										$data['info'] = 'Carian berjaya dilakukan';
										$data['all'] = $this->pelajar->GetWhere(array('matrik LIKE \'%'.$matrik.'%\'' => NULL, 'status_pljr' => 'A'), NULL, NULL);
									}
									else
									{
										$data['info'] = 'Sila cuba sebentar lagi';
									}
							}
					}
				$this->load->view('hea/status_pelajar', $data);
			}

		public function urus_status()
			{
				$matrik = $this->uri->segment(3, 0);
				$data['st'] = $this->sel_status->GetWhere(array('kodstatus = "T" OR kodstatus = "US"' => NULL), NULL, NULL);
				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('save', TRUE))
							{
								$st = $this->input->post('stat', TRUE);
								$std = $this->input->post('statDtl', TRUE);
								echo $st.$std;

								//byk benda kena check..
								//pelajr, pel_sem, pel_lib, pel_invoice, pel_subjek_gred, pel_dafhostel, 
							}
					}
				$this->load->view('hea/urus_status', $data);
			}

		public function kehadiran()
			{
				
			}

		public function pensyarah()
			{
				//tambah pensyarah
				$data['info'] = '';
				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('cari', TRUE))
							{
								$st = $this->input->post('ic', TRUE);
								$r = $this->user_data->cari($st);
								if($r)
									{
										$data['info'] = 'Carian berjaya';
										$data['all'] = $r;
									}
									else
									{
										$data['info'] = 'Sila cuba sebentar lagi';
									}
							}
					}
				$this->load->view('hea/pensyarah', $data);
			}

		public function assign_lect()
			{
				$data['info'] = '';
				$noStaff = $this->uri->segment(3, 0);
				$k = $this->user_data->GetWhere(array('id' => $noStaff), NULL, NULL);
				if ($k->num_rows() == 1)
					{
						$se = $this->sesi_akademik->GetWhere(array('aktif' => 1), NULL, NULL);
						$data['su'] = $this->subjek->GetAll();

						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == TRUE)
							{
								if($this->input->post('save', TRUE))
									{
										
									}
							}
						$data['all'] = $this->lect_ajar->GetAll(NULL, NULL);
						$this->load->view('hea/assign_lect', $data);
					}
			}

























































































































#############################################################################################################################
	}

/* End of file hea.php */
/* Location: ./application/controllers/hea.php */