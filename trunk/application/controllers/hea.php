<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hea extends CI_Controller
	{
		//contructor => default utk semua function dlm controller nih...
		public function __construct()
			{
				parent::__construct();

				$this->load->model('subjek');					//nak tau controller ni pakai model mana 1...
				$this->load->model('pelajar');					//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_waris');				//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_sem');					//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_akademik');				//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_subjek_akademik');		//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_daftarsubjek');			//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_subjek_gred');			//nak tau controller ni pakai model mana 1...
				$this->load->model('prog_subjek');				//nak tau controller ni pakai model mana 1...
				$this->load->model('sesi_akademik');			//nak tau controller ni pakai model mana 1...
				$this->load->model('lect_ajar');				//nak tau controller ni pakai model mana 1...
				$this->load->model('gredmata');					//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_invois');				//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_resit');				//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_hadir');				//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_lib');					//nak tau controller ni pakai model mana 1...

				$this->lang->load('form_validation', 'melayu');

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
				$lect = $this->session->userdata('id_user');
				//cari sesi dulu...
				$se = $this->sesi_akademik->GetWhere(array('aktif' => 1), NULL, NULL);
				if ($se->num_rows() == 1)
					{
						$data['sesi'] = $se->row()->kodsesi;
						$v = $this->lect_ajar->GetWhere(array('nostaf' => $lect, 'sesi' => $data['sesi'], 'aktif' => 1), NULL, NULL);
						if($v->num_rows() > 0)
							{
								$data['set'] = 1;
								$data['la'] = $v;
								$data['ps'] = $this->pel_sem->GetWhere(array('sesi' => $data['sesi'], 'status_pel' => '01', 'aktif' => 1), NULL, NULL);
								//$data['ph'] = $this->pel_hadir->GetAll(NULL, NULL);
								$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
								if ($this->form_validation->run() == TRUE)
									{
										if($this->input->post('save', TRUE))
											{
												$id = $this->input->post('id', TRUE);
												$jum_hari = $this->input->post('jum_hari', TRUE);
												$peratus_wajib = $this->input->post('peratus_wajib', TRUE);
												$jum_hadir = $this->input->post('jum_hadir', TRUE);
												
												$r = $this->pel_hadir->update(array('id' => $id), array('jum_hari' => $jum_hari, 'peratus_wajib' => $peratus_wajib, 'jum_hadir' => $jum_hadir, 'user_edit' => $lect, 'date_edit' => datetime_db(now())));
												if($r)
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
							else
							{
								$data['info'] = 'Anda tidak berada didalam senarai pensyarah. Jika ini adalah kesilapan, sila rujuk Admin';
								$data['set'] = 0;
							}
					}
					else
					{
						$data['info'] = 'Tidak dapat menentukan sesi sekarang. Sila rujuk Admin';
					}
				$this->load->view('hea/kehadiran', $data);
			}

		public function edit_hadir()
			{
				$id = $this->uri->segment(3, 0);
				$lect = $this->session->userdata('id_user');
				if(is_numeric($id))
					{
						$data['info'] = '';
						$data['t'] = $this->pel_hadir->GetWhere(array('id' => $id), NULL, NULL);
								$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
								if ($this->form_validation->run() == TRUE)
									{
										if($this->input->post('check', TRUE))
											{
												$jum_hari = $this->input->post('jum_hari', TRUE);
												$peratus_wajib = $this->input->post('peratus_wajib', TRUE);
												$jum_hadir = $this->input->post('jum_hadir', TRUE);
												$r = $this->pel_hadir->update(array('id' => $id), array('jum_hari' => $jum_hari, 'peratus_wajib' => $peratus_wajib, 'jum_hadir' => $jum_hadir, 'user_edit' => $lect, 'date_edit' => datetime_db(now())));
												if($r)
													{
														redirect('hea/kehadiran', 'location');
													}
													else
													{
														$data['info'] = 'Sila cuba sebentar lagi';
													}
											}
									}
						$this->load->view('hea/edit_hadir', $data);
					}
			}

		public function slip_exam()
			{
				//mula2 display dulu student... mbik jerrr dari pel_sem
				//carik sem dulu
				$sesi = $this->sesi_akademik->GetWhere(array('aktif' => 1), NULL, NULL)->row()->kodsesi;
				$data['sel'] = $this->pel_sem->GetWhere(array('sesi' => $sesi, 'aktif' => 1, 'status_pel' => '01'), NULL, NULL);

				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('cari', TRUE))
							{
								$matrik = $this->input->post('matrik', TRUE);
								$data['sel'] = $this->pel_sem->GetWhere(array('matrik LIKE \'%'.$matrik.'%\'' => NULL, 'sesi' => $sesi, 'aktif' => 1, 'status_pel' => '01'), NULL, NULL);
								//echo $this->db->last_query();
								if($data['sel'])
									{
										$data['info'] = 'Carian berjaya';
									}
									else
									{
										$data['info'] = 'Sila cuba sebentar lagi';
									}
							}
					}
				//$this->load->view('hea/slip_exam', $data);
				$this->load->view('hea/slip_exam', $data);
			}

		public function cetak_slip_exam()
			{
				// sham... tolong buat pdf kat sini...hahahhaha
				$data['title'] = 'Slip Peperiksaan';
				$data['matrik'] = $this->uri->segment(3, 0);
				if(!$data['matrik']){
					$data['matrik'] = $matrik;
				}
				$html = '<!doctype html>
					<head>
						<title>Slip Peperiksaan</title>
						<link href="'.base_url().'css/surat.css" rel="stylesheet" />
					</head>
					<body>';
				$data['pelajar'] = $this->pelajar->GetWhere(array('matrik' => $data['matrik']), NULL, NULL);
				$pelajar = $data['pelajar']->row();
				$pelsem = $this->pel_sem->GetWhere(array('matrik' => $data['matrik'], 'aktif' => 1), NULL, NULL);
				$data['pelsem'] = $pelsem;//$pelsem = $pelsem->row();
				
				if($data['pelajar']->num_rows() == 1)
					{
						$nokp = $pelajar->ic;
						if(empty($pelajar->ic)){
							$nokp = $pelajar->passport;
						}
						$html .= '<table>
							<tr><td>Nama</td>
								<td>'.$pelajar->nama.'</td></tr>
							<tr><td>Nombor Kad Pelajar</td>
								<td>'.$pelajar->matrik.'</td>
							</tr>
							<tr><td>Nombor Kad Pengenalan/Paspot</td>
								<td>'.$nokp.'</td>
							</tr>
							<tr><td>Program</td>
								<td>'.$pelsem->row()->kod_prog.' : '.$this->program->GetWhere(array('kod_prog'=>$pelsem->row()->kod_prog))->row()->namaprog_MY.'</td>
							</tr>
							<tr><td>Semester</td>
								<td>'.$pelsem->row()->sem.'</td>
							</tr>
							<tr><td>Sesi</td>
								<td>'.$pelsem->row()->sesi.'</td>
							</tr></table>';
						
						$data['subjek'] = $this->pel_subjek_gred->GetWhere(array('matrik' => $data['matrik'], 'sesi' => $pelsem->row()->sesi, 'sem' => $pelsem->row()->sem, 'id_drop IS NULL' => NULL, 'id_ign IS NULL' => NULL), NULL, NULL);
						//$data['subjek']->db->join('subjek','subjek.kodsubjek = pel_subjek_gred.kodsubjek');
						$subjek = $data['subjek']->result();
						$html1 = '';
						$html .= '<table>
							<tr><td>Kod Subjek</td>
								<td>Nama Subjek</td>
								<td>Jam Kredit</td>
							</tr>
							';
						foreach($subjek as $subjeks){
							$html .= '<tr><td>'.$subjeks->kodsubjek.'</td>
								<td>'.$this->subjek->GetWhere(array('kodsubjek'=>$subjeks->kodsubjek))->row()->namasubjek_MY.'</td>
								<td>'.$subjeks->kredit.'</td></tr>';
						}
						
						$html .= '</table>';
					}
				$html .= '</body></html>';
				$data['html'] = $html;
				//echo $html;
				
				$this->cetak_pdf($html);
				//$this->load->view('hea/cetak_slip_exam', $data);
			}

		public function cetak_pdf($html){
			$data['matrik'] = $this->uri->segment(3, 0);
			$this->load->library('Pdf');
				$pdf = new Pdf('P', 'px', 'A4', true, 'UTF-8', false);
			// create new PDF document
			$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			
				// set document information
				$this->pdf->SetCreator(PDF_CREATOR);
				$this->pdf->SetAuthor('Hishamudin Mohamad Azid');
				//$pdf->SetTitle('Penyata Gaji');
				$this->pdf->SetTitle('Slip Peperiksaan');

				// remove default header/footer
				$this->pdf->setPrintHeader(false);
				$this->pdf->setPrintFooter(false);

		        $y = $this->pdf->getY();

		        // set some language dependent data:
				$lg = Array();
				$lg['a_meta_charset'] = 'UTF-8';
				$lg['a_meta_dir'] = 'rtl';
				$lg['a_meta_language'] = 'fa';
				$lg['w_page'] = 'page';

				//set some language-dependent strings
				$pdf->setLanguageArray($lg);

		        // set font
		        //$this->pdf->SetFont('times', '', 12);

				// set LTR direction for english translation
				$this->pdf->setRTL(false); 

				$this->pdf->SetFont('aealarabiya', '', 10);
		        //$pdf->SetFont('aefurat', '', 10);	        

		        // add a page
		        $this->pdf->AddPage();
				//echo $html;
				//$html = '<table><tr><td>oi</td></tr></table>';
		        //$this->pdf->writeHTMLCell('auto', '', '', $y, $html, 0, 0, 0, true, 'J', true);
				$this->pdf->writeHTML($html, true, false, true, false, '');

				// reset pointer to the last page
				$this->pdf->lastPage();

		        //Close and output PDF document
		        $this->pdf->Output('slip_exam.pdf', 'I');
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
				$noStaff = $this->uri->segment(3, 0);
				$k = $this->user_data->GetWhere(array('id' => $noStaff), NULL, NULL);
				if ($k->num_rows() == 1)
					{
						$se = $this->sesi_akademik->GetWhere(array('aktif' => 1), NULL, NULL);
						$data['su'] = $this->subjek->GetAllPage(NULL, NULL);
						$data['se'] = $this->sesi_akademik->GetWhere(array('tahun >=' => mdate("%Y", now())), NULL, NULL);

						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == TRUE)
							{
								if($this->input->post('save', TRUE))
									{
										$sesi = $this->input->post('sesi', TRUE);
										$kodsubjek = $this->input->post('kodsubjek', TRUE);

										//autoinsert kalau user xdak dlm senarai user_dept_func
										$l1 = $this->user_dept_func->GetWhere(array('id_user_data' => $noStaff, 'id_user_department' => 2), NULL, NULL);
										if($l1->num_rows() < 1)
											{
												//insert
												$this->db->trans_start();
													//insert utk function pemarkahan
													$this->user_dept_func->insertall(array('id_user_data' => $noStaff, 'id_user_department' => 2, 'id_user_function' => 39, 'active' => 1));
													$this->user_dept_func->insertall(array('id_user_data' => $noStaff, 'id_user_department' => 2, 'id_user_function' => 40, 'active' => 1));
													//insert utk kehadiran
													$this->user_dept_func->insertall(array('id_user_data' => $noStaff, 'id_user_department' => 2, 'id_user_function' => 44, 'active' => 1));
													$this->user_dept_func->insertall(array('id_user_data' => $noStaff, 'id_user_department' => 2, 'id_user_function' => 53, 'active' => 1));
													$this->lect_ajar->insert(array('sesi' => $sesi, 'kodsubjek' => $kodsubjek, 'aktif' => 1, 'nostaf' => $noStaff));
												$this->db->trans_complete();
											}
											else
											{
												//update
												$this->db->trans_start();
													$this->user_dept_func->updatewhere(array('id_user_data' => $noStaff, 'id_user_department' => 2, 'id_user_function' => 39), array('active' => 1));
													$this->user_dept_func->updatewhere(array('id_user_data' => $noStaff, 'id_user_department' => 2, 'id_user_function' => 40), array('active' => 1));
													//insert utk kehadiran
													$this->user_dept_func->updatewhere(array('id_user_data' => $noStaff, 'id_user_department' => 2, 'id_user_function' => 44), array('active' => 1));
													$this->user_dept_func->updatewhere(array('id_user_data' => $noStaff, 'id_user_department' => 2, 'id_user_function' => 53), array('active' => 1));
													$this->lect_ajar->insert(array('sesi' => $sesi, 'kodsubjek' => $kodsubjek, 'aktif' => 1, 'nostaf' => $noStaff));
												$this->db->trans_complete();
											}
										if($this->db->trans_status() === TRUE)
											{
												$data['info'] = 'Penambahan pensyarah berjaya';
											}
											else
											{
												$data['info'] = 'Sila cuba sebentar lagi';
											}
									}
							}
						$data['all'] = $this->user_data->GetWhere(array('id' => $noStaff), NULL, NULL);
						$this->load->view('hea/assign_lect', $data);
					}
			}

		public function pemarkahan()
			{
				$lect = $this->session->userdata('id_user');
				//cari sesi dulu...
				$se = $this->sesi_akademik->GetWhere(array('aktif' => 1), NULL, NULL);
				if ($se->num_rows() == 1)
					{
						$data['sesi'] = $se->row()->kodsesi;
						$v = $this->lect_ajar->GetWhere(array('nostaf' => $lect, 'sesi' => $data['sesi'], 'aktif' => 1), NULL, NULL);
						if($v->num_rows() > 0)
							{
								$data['set'] = 1;
								$data['la'] = $v;
								$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
								if ($this->form_validation->run() == TRUE)
									{
										if($this->input->post('save', TRUE))
											{
												$jum_mark = $this->input->post('jum_mark', TRUE);
												$jum_pemutihan = $this->input->post('jum_pemutihan', TRUE);
												$id = $this->input->post('id', TRUE);

												$jum_mark1 = $jum_mark + $jum_pemutihan;
												//cari balik sama dgn gred apa...
												$gred = $this->gredmata->GetWhereBetween($jum_mark1)->row()->gred;
												$lulus = $this->gredmata->GetWhereBetween($jum_mark1)->row()->lulus;

												//update
												$x = $this->pel_subjek_gred->update(array('id' => $id), array('gred' => $gred, 'jum_mark' => $jum_mark, 'jum_pemutihan' => $jum_pemutihan, 'lulus' => $lulus));
												if($x)
													{
														$data['info'] = 'Markah berjaya dimasukkan';
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
								$data['info'] = 'Anda tidak berada didalam senarai pensyarah. Jika ini adalah kesilapan, sila rujuk Admin';
								$data['set'] = 0;
							}
					}
					else
					{
						$data['info'] = 'Tidak dapat menentukan sesi sekarang. Sila rujuk Admin';
					}
				$this->load->view('hea/pemarkahan', $data);
			}

		public function kemaskini_gred()
			{
				$pe = $this->uri->segment(3, 0);
				$data['m'] = $this->pel_subjek_gred->GetWhere(array('id' => $pe), NULL, NULL);
				$conf = $this->pel_sem->GetWhere(array('matrik' => $data['m']->row()->matrik, 'aktif' => 1), NULL, NULL);
				if($conf)
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == TRUE)
							{
								if($this->input->post('save', TRUE))
									{
										$jum_mark = $this->input->post('jum_mark', TRUE);
										$jum_pemutihan = $this->input->post('jum_pemutihan', TRUE);

										$jum_mark1 = $jum_mark + $jum_pemutihan;
										//cari balik sama dgn gred apa...
										$gred = $this->gredmata->GetWhereBetween($jum_mark1)->row()->gred;
										$lulus = $this->gredmata->GetWhereBetween($jum_mark1)->row()->lulus;
										$r = $this->pel_subjek_gred->update(array('id' => $pe), array('gred' => $gred, 'jum_mark' => $jum_mark, 'jum_pemutihan' => $jum_pemutihan, 'lulus' => $lulus));
										if($r)
											{
												//$data['info'] = 'Markah berjaya dikemaskini';
												redirect('hea/pemarkahan', 'location');
											}
											else
											{
												$data['info'] = 'Sila cuba sebentar lagi';
											}
									}
							}
						$this->load->view('hea/kemaskini_gred', $data);
					}
			}





















































































































#############################################################################################################################
	}

/* End of file hea.php */
/* Location: ./application/controllers/hea.php */