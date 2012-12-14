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
				$this->load->model('app_progmohon');			//nak tau controller ni pakai model mana 1...
				$this->load->model('sesi_intake');				//nak tau controller ni pakai model mana 1...
				$this->load->model('template_surat');			//load table tamplate surat tawaran
				$this->load->model('ruj_intake');				//load table ruj_intake surat tawaran
				$this->load->model('program');					//load table program surat tawaran
				$this->load->model('jabatan');					//load table jabatan surat tawaran
				$this->load->model('sel_statusmohon');			//load table sel_statusmohon surat tawaran
				$this->load->model('pel_resit');				//load table tamplate surat tawaran
				$this->load->model('pel_invois');				//load table tamplate surat tawaran
				$this->load->model('pel_akademik');				//load table tamplate surat tawaran
				$this->load->model('pel_daftarsubjek');			//load table tamplate surat tawaran
				$this->load->model('pel_subjek_akademik');		//load table tamplate surat tawaran
				$this->load->model('pel_sem');					//load table tamplate surat tawaran
				$this->load->model('siri_invois');				//load table tamplate surat tawaran
				$this->load->model('pelajar');					//load table pelajar
				$this->load->model('pel_waris');				//load table tamplate surat tawaran
				$this->load->model('yuran_jadual');				//load table tamplate surat tawaran
				$this->load->model('yuran_prog');				//load table tamplate surat tawaran
				$this->load->model('prog_subjek');				//load table tamplate surat tawaran
				$this->load->model('pel_item_invois');				//load table tamplate surat tawaran
				
				$this->lang->load('form_validation', 'melayu');
				
	        	//$this->load->helper('hijri');

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

				//mula mula sekali nak kena tau sesi_intake mana
				$where = array('aktif' => 1);
				$g = $this->sesi_intake->GetWhere($where);

				//hanya nak tgk status permohonan dlm proses shj...
				$whe = array('status_mohon' => 'DIP', 'sesi_mohon' => $g->row()->kodsesi);
				$config['total_rows'] = $this->app_pelajar->GetWhere($whe)->num_rows();
				$config['per_page'] = 5;
				$config['suffix'] = '.exe';

				$this->pagination->initialize($config);

				$data['pemohon'] = $this->app_pelajar->GetWherePage($whe, $config['per_page'], $this->uri->segment(3, 0));

				$data['paginate'] = $this->pagination->create_links();
			
				$data['negara'] = $this->sel_negara->get();

				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('cari', TRUE))
							{
								$nama = $this->input->post('nama', TRUE);
								$s = "status_mohon = 'DIP' AND sesi_mohon = '".$g->row()->kodsesi."' AND (ic LIKE '%$nama%' OR nama LIKE '%$nama%' OR passport LIKE '%$nama%')";
								$data['pemohon'] = $this->app_pelajar->GetWhere($s);
								//echo $this->db->last_query();
								if($data['pemohon'])
									{
										$data['info'] = 'Carian berjaya';
									}
									else
									{
										$data['info'] = 'Sila cuba sebentar lagi';
									}
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

						$data['prog'] = $this->app_progmohon->GetWhere(array('id_mohon' => $id));
						$data['akad'] = $this->app_akademik->get_where(array('id_mohon' => $id));
						$data['war'] = $this->app_waris->GetWhere(array('id_mohon' => $id));

						$this->load->view('kemasukan/detail_pemohon', $data);
					}
			}

		//nak beza antara kemasukan semula bekas pelajar dan juga pelajar yang x pernah memohon (pelajar baru)
		public function permohonan()
			{
				$data['title'] = 'Pemeriksaan Permohonan';
				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('check', TRUE))
							{
								$ic = $this->input->post('ic' ,TRUE);

								//cari sesi_intake sekarang
								$semo = $this->sesi_intake->GetWhere(array('aktif' => 1, 'tarikh_tamat >=' => date_db(now())))->row()->kodsesi;

								//cari ic dulu untuk memnentukan a adalah benar2 pelajar baru
								$where = "ic = '$ic' OR passport = '$ic'";
								$d = $this->app_pelajar->GetWhere($where);
								echo $this->db->last_query().' query<br />';
								if ($d->num_rows() > 0)
									{
										//bukan budak baru
										//ada 4 kes
										//1. dalam proses (takut key in 2 kali)
										//2. dah tawar (dah tawar dan sesi_mohon sama sekarang)
										//3. incomplete (x lengkap dan sesi_mohon sama sekarang)
										//4. gagal (gagal dan sesi_mohon sama sekarang)

										$stat_moh = $d->row()->status_mohon;
										$dt_tran = $d->row()->dt_transfer;
										$akti = $d->row()->aktif;
										$sesim = $d->row()->sesi_mohon;
										echo $stat_moh.' stat moh<br />'.$dt_tran.' date transfer<br />'.$akti.' aktif<br />'.$sesim.' sesi_mohon<br />';

										//kes 1
										if($stat_moh == 'DIP' && $akti == 1 && $sesim == $semo)
											{
												$data['info'] = 'Status pemohon adalah "DALAM PROSES" untuk sesi '.$semo.'. Sila teruskan dengan permohonan yang lain';
											}
											else
											{
												if($stat_moh == 'TW' && $akti == 1 && $sesim == $semo && $dt_tran == NULL)
													{
														$data['info'] = 'Status pemohon adalah "TAWARAN" untuk sesi '.$semo.'. Sila teruskan dengan permohonan yang lain';
													}
													else
													{
														if ($stat_moh == 'INC' && $akti == 1 && $sesim == $semo)
															{
																$data['info'] = 'Status pemohon adalah "TIDAK LENGKAP" untuk sesi '.$semo.'. Sila teruskan dengan permohonan yang lain';
															}
															else
															{
																if($stat_moh == 'GL' && $akti == 0 && $sesim == $semo)
																	{
																		$data['info'] = 'Status pemohon adalah "GAGAL" untuk sesi '.$semo.'. Sila teruskan dengan permohonan yang lain';
																	}
																	else
																	{
																		//app_pelajar (insert) & app_waris (update) kena adjust kat sini siap2
																		$kodmula = $this->sesi_intake->GetWhere(array('aktif' => 1, 'tarikh_tamat >=' => date_db(now())))->row()->kodmula;
																		$siri = $this->sesi_intake->GetWhere(array('aktif' => 1, 'tarikh_tamat >=' => date_db(now())))->row()->siri;
																		//SIRI MMG AKAN JADI 4 digit SBB DISET DI DATABASE
																		$siri_mohon = $kodmula.$siri;

																		$insert = array(
																							'nama' => $d->row()->nama,
																							'ic' => $d->row()->ic,
																							'passport' => $d->row()->passport,
																							'dt_lahir' => $d->row()->dt_lahir,
																							'tempat_lahir' => $d->row()->tempat_lahir,
																							'status_warga' => $d->row()->status_warga,
																							'warganegara' => $d->row()->warganegara,
																							'bangsa' => $d->row()->bangsa,
																							'jantina' => $d->row()->jantina,
																							'status_kahwin' => $d->row()->status_kahwin,
																							'alamat1' => $d->row()->alamat1,
																							'alamat2' => $d->row()->alamat2,
																							'poskod' => $d->row()->poskod,
																							'bandar' => $d->row()->bandar,
																							'negeri' => $d->row()->negeri,
																							'negara' => $d->row()->negara,
																							'id_add' => $this->session->userdata('id_user'),
																							'dt_add' => date_db(now()),
																							'sesi_mohon' => $semo,
																							'siri_mohon' => $siri_mohon,
																							'status_mohon' => 'DIP',
																							'notel' => $d->row()->notel,
																							'nohp' => $d->row()->nohp,
																							'emel' => $d->row()->emel
																						);
																		//nak kena update +1 kepada siri
																		$siri1 = $siri + 1;
																		$s = $this->sesi_intake->update(array('kodmula' => $kodmula), array('siri' => $siri1));
																		$v = $this->app_pelajar->set_app_pelajar($insert);
																		$id = $this->db->insert_id();
								
																		//update waris
																		$u = $this->app_waris->GetWhere(array('id_mohon' => $d->row()->id));
																		if($u->num_rows() > 0)
																			{
																				$war = $this->app_waris->update_all(array('id_mohon' => $d->row()->id), array('id_mohon' => $id));
																			}
																			else
																			{
																				$war = TRUE;
																			}
								
																		if($v && $war)
																			{
																				redirect('kemasukan/progmohon/'.$id, 'location');
																			}
																			else
																			{
																				$data['info'] = 'Data tidak berjaya disimpan. Sila cuba sebentar lagi';
																			}
																	}
															}
													}
											}
									}
									else
									{
										//budak baru
										redirect('/kemasukan/permohonan_baru', 'location');
									}
							}
					}
				$this->load->view('kemasukan/permohonan', $data);
			}

		//insert pemohon
		public function permohonan_baru()
			{
				$id = $this->uri->segment(3, 0);
				if(is_numeric($id))
					{
					$data['z'] = $this->app_pelajar->get_app_pelajar($id);
					}
				$data['title'] = 'Proses Permohonan';
				$data['v'] = $this->sel_negara->get();
				$data['vq'] = $this->sel_gender->get();
				$data['vw'] = $this->sel_marital->get();
				$data['bandar'] = $this->sel_bandar->get();
				$data['warga'] = $this->sel_warga->get();
				$data['bangsa'] = $this->sel_race->get();
				$data['ses'] = $this->sesi_intake->GetWhere(array('aktif' => 1, 'tarikh_tamat >=' => date_db(now())));
	
				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('simpan', TRUE))
							{
								//kena cari siri_mohon dulu dari sesi_intake
								//dapatkan siri_mohon dari sesi_intake
								$semo = $this->input->post('sesi_mohon');
								$kodmula = $this->sesi_intake->GetWhere(array('kodsesi' => $semo))->row()->kodmula;
								$siri = $this->sesi_intake->GetWhere(array('kodsesi' => $semo))->row()->siri;
								//SIRI MMG AKAN JADI 4 digit SBB DISET DI DATABASE
								$siri_mohon = $kodmula.$siri;

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
													'sesi_mohon' => $semo,
													'siri_mohon' => $siri_mohon,
													'status_mohon' => 'DIP',
													'notel' => $this->input->post('notel', TRUE),
													'nohp' => $this->input->post('nohp', TRUE),
													'emel' => $this->input->post('emel', TRUE),
													'aktif' => 1
												);
								//nak kena update +1 kepada siri
								$siri1 = $siri + 1;
								$s = $this->sesi_intake->update(array('kodmula' => $kodmula), array('siri' => $siri1));
								$v = $this->app_pelajar->set_app_pelajar($insert);
								$id = $this->db->insert_id();
								if($v)
									{
										//$data['info'] = 'Data telah berjaya disimpan';
										//redirect('kemasukan/akademik/'.$id.'/'.$this->input->post('id_mohon'), 'location');
										redirect('kemasukan/waris/'.$id, 'location');
									}
									else
									{
										$data['info'] = 'Data tidak berjaya disimpan. Sila cuba sekali lagi';
										$this->load->view('kemasukan/permohonan_baru',$data);
									}
							}
					}
					$this->load->view('kemasukan/permohonan_baru',$data);
			}

	public function progmohon()
		{
			$id = $this->uri->segment(3, 0);
			if(is_numeric($id))
				{
					$data['prog'] = $this->program->GetAll(NULL, NULL);
					//$data['statm'] = $this->sel_statusmohon->GetWhere(array('kodstatus' => 'DIP'));
					$data['mohon'] = $this->app_progmohon->GetWhere(array('id_mohon'=>$id));

					$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
					if ($this->form_validation->run() == TRUE)
						{
							if($this->input->post('simpan', TRUE))
								{
									$kod_prog = $this->input->post('kod_prog', TRUE);
									$catatan = $this->input->post('catatan', TRUE);

									//mula2 combine array 2 tu dulu
									$c = array_combine($kod_prog, $catatan);

									//dapatkan siri mohon
									$siri_mohon = $this->app_pelajar->GetWhere(array('id' => $id))->row()->siri_mohon;	//tarik siri_mohon di app_pelajar

									$i = 1;
									foreach($c as $k => $h)
										{
											//mulakan proses insert
											$dat[] = $this->app_progmohon->insert(array( 'id_mohon' => $id, 'siri_mohon' => $siri_mohon, 'kod_prog' => $k, 'pilihan' => $i++, 'status_mohon' => 'DIP', 'user_edit' => $this->session->userdata('id_user'), 'dt_edit' => datetime_db(now()), 'catatan' => ucwords(strtolower($h))));
										}

									if($dat)
										{
											//redirect ke sini daripada permohonan_baru
											redirect('kemasukan/akademik/'.$id, 'location');
										}
										else
										{
											$data['info'] = 'Data tidak berjaya disimpan. Sila cuba sebentar lagi';
										}
								}
						}
					$this->load->view('kemasukan/progmohon', $data);
				}
		}

	//akademik
	public function akademik()
		{
			$data['title'] = 'Kelayakan Akademik';
			$id = $this->uri->segment(3, 0);

			if (is_numeric($id))
				{
					$data['lev'] =$this->sel_level->GetAktif(1);
					
					//dapatkan maklumat akademik
					$data['akademik'] = $this->app_akademik->get_where(array('id_mohon' => $id));

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
					$this->load->view('kemasukan/akademik', $data);
				}
		}

		//waris
		public function waris()
			{
				$id_mohon = $this->uri->segment(3, 0);
				if(is_numeric($id_mohon))
					{
						$data['c'] = $this->app_waris->GetWhere(array('id_mohon' => $id_mohon));
						$data['info'] = '';
						$data['h'] = $this->sel_hubungan->GetAll();
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
												redirect ('/kemasukan/progmohon/'.$id_mohon, 'location');
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
			
	//edit permohonan
	public function edit_permohonan()
		{
			$data['title'] = 'Kemaskini Maklumat Peribadi Pemohon';
			$data['v'] = $this->sel_negara->get();
			$data['vq'] = $this->sel_gender->get();
			$data['vw'] = $this->sel_marital->get();
			$data['bandar'] = $this->sel_bandar->get();
			$data['warga'] = $this->sel_warga->get();
			$data['bangsa'] = $this->sel_race->get();
			$data['ses'] = $this->sesi_intake->GetIntake(1);

			$id_mohon = $this->uri->segment(3, 0);
			if(is_numeric($id_mohon))
				{
					$data['z'] = $this->app_pelajar->get_app_pelajar($id_mohon);
					$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');

					if ($this->form_validation->run() == TRUE)
						{
							if($this->input->post('simpan', TRUE))
								{
									$insert = array
													(
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
														'bandar' => $this->input->post('bandar'),
														'negeri' => $this->input->post('negeri'),
														'negara' => $this->input->post('negara', TRUE),
														'status_mohon' => 'DIP',
														'sesi_mohon' => $this->input->post('sesi_mohon', TRUE),
														'notel' => $this->input->post('notel', TRUE),
														'nohp' => $this->input->post('nohp', TRUE),
														'emel' => $this->input->post('emel', TRUE)
													);
									$insert['id_edit'] = $this->session->userdata('id_user');
									$insert['dt_edit'] = date_db(now());
									$v = $this->app_pelajar->update($insert, array('id' => $id_mohon));

									if($v)
										{
											redirect('kemasukan/waris/'.$id_mohon, 'location');
										}
										else
										{
											$data['info'] = 'Data tidak berjaya disimpan. Sila cuba sekali lagi';
										}
								}
						}
					$this->load->view('kemasukan/permohonan_baru',$data);
				}
				else
				{
					redirect('/kemasukan/index', 'location');
				}
		}

		public function mohon_pelajar()
			{
				//mula2 buat list dulu, ambik dari list app_pelajar dan letak apa yang patut...sepatutnya ada checking dulu utk terima masuk sbg pelajar...
				//query ni check semua status mohon "dalam proses" tp buang user yg salah satu tu dah ada status selain dr "dlm proses"
				//nake kena tau sesi_intake dulu
				//mula mula sekali nak kena tau sesi_intake mana
				$where = array
							(
								'aktif' => 1
							);
				$g = $this->sesi_intake->GetWhere($where);

				//hanya nak tgk status permohonan dlm proses shj...
				$whe = array
							(
								'status_mohon' => 'DIP',
								'sesi_mohon' => $g->row()->kodsesi
							);

				$this->load->library('pagination');
				$config['base_url'] = base_url().'kemasukan/mohon_pelajar';
				$config['total_rows'] = $this->app_pelajar->GetWhere($whe)->num_rows();
				$config['per_page'] = 5;
				$config['suffix'] = '.exe';

				$this->pagination->initialize($config);

				$data['u'] = $this->app_pelajar->GetWherePage($whe, $config['per_page'], $this->uri->segment(3, 0));

				$data['paginate'] =$this->pagination->create_links();

				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('tawar', TRUE))
							{
								$id_appprogmohon = $this->input->post('id_appprogmohon', TRUE);
								$id_mohon = $this->input->post('id_mohon', TRUE);
								$kodprog = $this->input->post('kodprog', TRUE);
								$catatan = ucwords(strtolower($this->input->post('catatan', TRUE)));

								//upadte app_pelajar
								$g = $this->app_pelajar->update(array('dt_edit' => date_db(now()), 'id_edit' => $this->session->userdata('id_user'), 'status_mohon' => 'TW', 'progTawar' => $kodprog), array('id' => $id_mohon));

								//update app_progmohon
								//1. gagalkan program semua program dulu
								$r = $this->app_progmohon->update(array('id_mohon' => $id_mohon), array('status_mohon' => 'GL', 'user_edit' => $this->session->userdata('id_user'), 'dt_edit' => datetime_db(now()), 'catatan' => 'Penawaran Program Yang Lain'));
								//2. tawarkan program yang berkenaan
								$r1 = $this->app_progmohon->update(array('id_mohon' => $id_mohon, 'id' => $id_appprogmohon), array('status_mohon' => 'TW', 'user_edit' => $this->session->userdata('id_user'), 'dt_edit' => datetime_db(now()), 'catatan' => 'Penawaran Program '.$kodprog.' '.$catatan.''));

								if($g && $r && $r1)
									{
										$data['info'] = 'Proses Penawaran Berjaya';
										redirect('kemasukan/mohon_pelajar', 'location');
									}
									else
									{
										$data['info'] = 'Proses Penawaran Tidak Berjaya. Sila Cuba Sebentar Lagi';
									}
							}
					}
				$this->load->view('kemasukan/mohon_pelajar', $data);
			}

		public function pmhn_tdk_lgkp()
			{
				//permohonan tidak lengkap
				$id = $this->uri->segment(3, 0);
				if(is_numeric($id))
					{
						$g = $this->app_pelajar->update(array('dt_edit' => date_db(now()), 'id_edit' => $this->session->userdata('id_user'),'status_mohon' => 'INC'), array('id' => $id));

						//update sekali app_progmohon
						$r = $this->app_progmohon->update(array('id_mohon' => $id), array('status_mohon' => 'INC', 'user_edit' => $this->session->userdata('id_user'), 'dt_edit' => datetime_db(now()), 'catatan' => 'Maklumat Tidak Lengkap'));
						if($g && $r)
							{
								redirect('/kemasukan/mohon_pelajar', 'location');
							}
					}
			}

		public function pmhn_gagal()
			{
				//permohonan gagal
				$id = $this->uri->segment(3, 0);
				if(is_numeric($id))
					{
						$g = $this->app_pelajar->update(array('dt_edit' => date_db(now()), 'id_edit' => $this->session->userdata('id_user'),'status_mohon' => 'GL', 'aktif' => 0), array('id' => $id));

						//update sekali app_progmohon
						$r = $this->app_progmohon->update(array('id_mohon' => $id), array('status_mohon' => 'GL', 'user_edit' => $this->session->userdata('id_user'), 'dt_edit' => datetime_db(now()), 'catatan' => 'Permohonan Gagal'));
						if($g && $r)
							{
								redirect('/kemasukan/mohon_pelajar', 'location');
							}
					}
			}
			
		public function pmhn_berjaya(){
			$where = array
							(
								'aktif' => 1
							);
				$g = $this->sesi_intake->GetWhere($where);

				//hanya nak tgk status permohonan dlm bejaya sahaja...
				$whe = array
							(
								'status_mohon' => 'TW',
								'sesi_mohon' => $g->row()->kodsesi,
								'dt_transfer' => NULL
							);

				$this->load->library('pagination');
				$config['base_url'] = base_url().'kemasukan/pmhn_berjaya';
				$config['total_rows'] = $this->app_pelajar->GetWhere($whe)->num_rows();
				$config['per_page'] = 5;
				$config['suffix'] = '.exe';

				$this->pagination->initialize($config);

				$data['u'] = $this->app_pelajar->GetWherePage($whe, $config['per_page'], $this->uri->segment(3, 0));

				$data['paginate'] =$this->pagination->create_links();
				$this->load->view('kemasukan/pmhn_berjaya', $data);
		}
			
	//surat tawaran
		public function surat_tawar($id_mohon = NULL ){
			
			//base template
			$data['base'] = 'base_template_user';
			//button 
			$data['pdf'] = form_submit('pdf_v', 'PDF', 'submit');
			$data['print'] = form_submit('cetak', 'Cetak', 'submit', 'id="cetak"');
			
			//script cetak
			$data['jquery'] = '';
			$data['cetak'] = '';
			if($this->input->post('surat', TRUE)){
				foreach ($this->input->post() as $key => $val){
					$$key = $val;
				}
			}
			
			if($this->input->post('pdf_v', TRUE)){
					$id_mohon = $this->input->post('id_mohon');
			}
			
			if($this->input->post('cetak', TRUE)){
				$id_mohon = $this->input->post('id_mohon');
				$data['base'] = 'base_template_surat';
				//button 
				$data['pdf'] = '';
				$data['print'] = '';
				
				//script cetak
				$data['jquery'] = '<script src="<?=base_url()?>js/jquery/jquery.js"></script>';
				$data['cetak'] = 'window.onload = print();';
			}
			//$id_mohon = '7';
			$data['title'] = 'Surat Tawaran Kemasukan : '.$id_mohon;
			
			
			//maklumat pelajar
			//$pelajar = $this->db->select('sel_negara.namanegara, sel_negeri.namanegeri, sel_bandar.namabandar');
			$pelajar = $this->db->join('sel_negara', 'app_pelajar.negara = sel_negara.kodnegara', 'left');
			$pelajar = $this->db->join('sel_negeri', 'app_pelajar.negeri = sel_negeri.kodnegeri', 'left');
			$pelajar = $this->db->join('sel_bandar', 'app_pelajar.bandar = sel_bandar.kodbandar', 'left');
			$pelajar = $this->app_pelajar->get_where(array('id' => $id_mohon));
			
			$data['tarikh_masihi'] = date('d F Y');
			$data['today'] = convertHijri(date('Y-m-d'), TRUE);
			$data['id_mohon'] = $id_mohon;
			$data['siri_mohon']	= $pelajar->row()->siri_mohon;
			$data['nama_pemohon'] = $pelajar->row()->nama;
			$data['ic_pemohon'] = $pelajar->row()->ic;
			$data['alamat1_pemohon'] = $pelajar->row()->alamat1;	
			$data['alamat2_pemohon'] = $pelajar->row()->alamat2;
			$data['poskod']			= $pelajar->row()->poskod;
			$data['bandar']			= $pelajar->row()->namabandar;
			$data['negeri'] 		= $pelajar->row()->namanegeri;
			$data['negara'] 		= $pelajar->row()->namanegara;
			$data['kod_prog']		= $pelajar->row()->progTawar;
			$data['intake'] 		= $pelajar->row()->sesi_mohon;
			$data['status_mohon'] 	= $pelajar->row()->status_mohon;
			
			if($data['status_mohon'] != 'TW'){
				startblock('content');
					$status = $this->sel_statusmohon->GetWhere(array('kodstatus' => $data['status_mohon']));
					echo '<div class="info">Permohonan '.$status->row()->status_MY.'</div>';
				endblock();
			}else{
	
				$progTawar = $pelajar->row()->progTawar;
				$sesiMohon = $pelajar->row()->sesi_mohon;
				//$progTawar;
				//maklumat pgrogram
				$program = $this->program->GetWhere(array('kod_prog' => $progTawar));
				$tahap = $program->row()->kod_tahap;
				$kod_jabatan = $program->row()->id_jabatan;
				
				$jabatan = $this->jabatan->GetWhere(array('id' => $kod_jabatan));
				
				//maklumat rujukan surat
				$rujukan = $this->ruj_intake->get(array('kod_tahap' => $tahap, 'id_intake' => $sesiMohon));
				if ($rujukan->num_rows()==0){
					$rujukan = $this->ruj_intake->get(array('id_intake' => $sesiMohon));
				}
				
				$id_surat = $rujukan->row()->id_surat;
				$intake = $rujukan->row()->id_intake;
				$data['siri_ruj'] = $rujukan->row()->siri_ruj;
				
				//template surat
				$template = $this->template_surat->get(array('id' => $id_surat));
				
				$data['auto_generate_siri'] = $data['siri_ruj'];
				$data['tarikh_hijri'] = date('d F Y');
				$data['sesi_intake'] = $intake;
				$data['progTawar'] = $program->row()->namaprog_MY;
				$data['kulliyah'] = $jabatan->row()->jabatan;
				$data['tahun'] = date('Y');
				$data['tempoh_ngaji'] = $program->row()->tempoh.' semester';
				$data['tarikh_daftar'] = '';
				$data['masa_daftar'] = '';
				$data['tempat_daftar'] = '';
				$data['no_telefon'] = '';
			
				$data['header'] = $template->row()->header;
				$data['address'] = $template->row()->address;
				$data['title_surat'] = $template->row()->title;
				$data['content1'] = $template->row()->content1;
				$data['content2'] = $template->row()->content2;
				$data['content3'] = $template->row()->content3;
				$data['signiture'] = $template->row()->signiture;
				$data['footer'] = $template->row()->footer;
				
				
				if($this->input->post('pdf_v', TRUE)){
					$id_mohon = $this->input->post('id_mohon');
					$data['base'] = 'base_template_surat';
					//button 
					$data['pdf'] = '';
					$data['print'] = '';
					
					$this->surat_pdf($data);
				}
				
			}
			$this->load->view('kemasukan/surat_tawar',$data);
		}
		
		function surat_pdf($data){
			
			$this->load->library('Pdf');
			
			foreach($data as $key => $val){
				$$key = $val;
				//echo $key.' = '.$val.'<br>';
			}
			$pdf = new Pdf('P', 'px', 'A4', true, 'UTF-8', false);
			
			// set document information
			$this->pdf->SetCreator(PDF_CREATOR);
			$this->pdf->SetAuthor('Hishamudin Mohamad Azid');
			//$pdf->SetTitle('Penyata Gaji');
			$this->pdf->SetTitle($data['title']);
			
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
	        
	        $this->load->library('parser');
	        
	        
	        //$html = $p->parse($html1);
			$html = $this->parser->parse('kemasukan/surat_tawar', $data);;
	        
			$this->pdf->writeHTMLCell('auto', '', '', $y, $html, 0, 0, 0, true, 'J', true);
			//$pdf->writeHTML($html, true, false, true, false, '');
									
			// reset pointer to the last page
			$this->pdf->lastPage();
			
	        //Close and output PDF document
	        $this->pdf->Output('Surat_tawaran.pdf', 'I');   
			//$this->load->view('kemasukan/surat_tawar',$data);
		}

		public function rayuan_permohonan()
			{
				//mula2 buat list dulu, ambik dari list app_pelajar dan letak apa yang patut...sepatutnya ada checking dulu utk terima masuk sbg pelajar...
				//query ni check semua status mohon "dalam proses" tp buang user yg salah satu tu dah ada status selain dr "dlm proses"
				//nake kena tau sesi_intake dulu
				//mula mula sekali nak kena tau sesi_intake mana
				$where = array
							(
								'aktif' => 1
							);
				$g = $this->sesi_intake->GetWhere($where);

				//hanya nak tgk status permohonan dlm proses shj...
				$whe = "status_mohon <> 'DIP' AND status_mohon <> 'TW' AND sesi_mohon = '".$g->row()->kodsesi."'";

				$this->load->library('pagination');
				$config['base_url'] = base_url().'kemasukan/rayuan_permohonan';
				$config['total_rows'] = $this->app_pelajar->GetWhere($whe)->num_rows();
				$config['per_page'] = 5;
				$config['suffix'] = '.exe';

				$this->pagination->initialize($config);

				$data['u'] = $this->app_pelajar->GetWherePage($whe, $config['per_page'], $this->uri->segment(3, 0));
				//echo $this->db->last_query();

				$data['paginate'] =$this->pagination->create_links();
				

				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('tawar', TRUE))
							{
								$id_appprogmohon = $this->input->post('id_appprogmohon', TRUE);
								$id_mohon = $this->input->post('id_mohon', TRUE);
								$kodprog = $this->input->post('kodprog', TRUE);
								$catatan = ucwords(strtolower($this->input->post('catatan', TRUE)));

								//upadte app_pelajar
								$g = $this->app_pelajar->update(array('dt_edit' => date_db(now()), 'id_edit' => $this->session->userdata('id_user'), 'status_mohon' => 'TW', 'progTawar' => $kodprog), array('id' => $id_mohon));

								//update app_progmohon
								//1. gagalkan program semua program dulu
								$r = $this->app_progmohon->update(array('id_mohon' => $id_mohon), array('status_mohon' => 'GL', 'user_edit' => $this->session->userdata('id_user'), 'dt_edit' => datetime_db(now()), 'catatan' => 'Penawaran Program Yang Lain'));
								//2. tawarkan program yang berkenaan
								$r1 = $this->app_progmohon->update(array('id_mohon' => $id_mohon, 'id' => $id_appprogmohon), array('status_mohon' => 'TW', 'user_edit' => $this->session->userdata('id_user'), 'dt_edit' => datetime_db(now()), 'catatan' => 'Penawaran Program '.$kodprog.' '.$catatan.''));

								if($g && $r && $r1)
									{
										$data['info'] = 'Proses Penawaran Berjaya';
									}
									else
									{
										$data['info'] = 'Proses Penawaran Tidak Berjaya. Sila Cuba Sebentar Lagi';
									}
							}
					}
				$this->load->view('kemasukan/mohon_rayuan', $data);
			}

		public function pendaftaran()
			{
				$where = array
							(
								'aktif' => 1
							);
				$g = $this->sesi_intake->GetWhere($where);

				//hanya nak tgk status permohonan dlm proses shj...
				$whe = array
							(
								'status_mohon' => 'TW',
								'sesi_mohon' => $g->row()->kodsesi,
								'dt_transfer' => NULL
							);

				$this->load->library('pagination');
				$config['base_url'] = base_url().'kemasukan/mohon_pelajar';
				$config['total_rows'] = $this->app_pelajar->GetWhere($whe)->num_rows();
				$config['per_page'] = 5;
				$config['suffix'] = '.exe';

				$this->pagination->initialize($config);

				$data['u'] = $this->app_pelajar->GetWherePage($whe, $config['per_page'], $this->uri->segment(3, 0));
				$data['paginate'] =$this->pagination->create_links();

				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if($this->input->post('cari', TRUE))
					{
						$this->form_validation->set_rules('carian', 'No Kad Pengenalan / No Passport / Nama', 'trim|required|xss_clean');
					}
					else
					{
						if($this->input->post('reg', TRUE))
							{
								$this->form_validation->set_rules('nomatriks', 'No Matriks', 'trim|required|alpha_dash|is_unique[pelajar.matrik]|xss_clean');
							}
					}

				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('cari', TRUE))
							{
								$carian = $this->input->post('carian', TRUE);
								$whe = "status_mohon = 'TW' AND sesi_mohon = '".$g->row()->kodsesi."' AND dt_transfer IS NULL AND (nama LIKE '%$carian%' OR ic LIKE '%$carian%' OR passport LIKE '%$carian%')";
								$data['u'] = $this->app_pelajar->GetWherePage($whe, $config['per_page'], $this->uri->segment(3, 0));
								if ($data['u'])
									{
										$data['info'] = 'Carian berjaya';
									}
									else
									{
										$data['info'] = 'Sila cuba sekali lagi';
									}
							}
							else
							{
								if($this->input->post('reg', TRUE))
									{
										$siri_mohon = $this->input->post('siri_mohon', TRUE);
										$matrik = strtoupper(strtolower($this->input->post('nomatriks', TRUE)));
										$id_mohon = $this->input->post('id_mohon', TRUE);

										//proses copy data
										$pel = $this->app_pelajar->GetWhere(array('id' => $id_mohon));
										$insert = array
														(
															'matrik' => $matrik,
															'nama' => $pel->row()->nama,
															'ic' => $pel->row()->ic,
															'passport' => $pel->row()->passport,
															'status_pljr' => 'A',
															'dt_lahir' => $pel->row()->dt_lahir,
															'tempat_lahir' => $pel->row()->tempat_lahir,
															'status_warga' => $pel->row()->status_warga,
															'warganegara' => $pel->row()->warganegara,
															'bangsa' => $pel->row()->bangsa,
															'jantina' => $pel->row()->jantina,
															'status_kahwin' => $pel->row()->status_kahwin,
															'alamat1' => $pel->row()->alamat1,
															'alamat2' => $pel->row()->alamat2,
															'poskod' => $pel->row()->poskod,
															'bandar' => $pel->row()->bandar,
															'negeri' => $pel->row()->negeri,
															'negara' => $pel->row()->negara,
															'notel' => $pel->row()->notel,
															'nohp' => $pel->row()->nohp,
															'emel' => $pel->row()->emel,
															'dt_daftar' => date_db(now()),
															'sesi_daftar' => $pel->row()->sesi_mohon,
															'id_add' => $this->session->userdata('id_user'),
															'dt_add' => date_db(now())
														);
										//insert table pelajar
/* 										$reg = $this->pelajar->insert($insert);
 */
										//update table app_pelajar
/* 										$uap = $this->app_pelajar->update(array('dt_transfer' => date_db(now()), 'id_transfer' => $this->session->userdata('id_user')), array('id' => $id_mohon));
 */
										//insert to pel_sem
										$insertsem = array
															(
																'matrik' => $matrik,
																'sesi' => $pel->row()->sesi_mohon,
																'sem' => 1,
																'status_pel' => '01',
																'kod_prog' => $pel->row()->progTawar,
																'aktif' => 1,
																'terkini' => 1
															);
/* 										$pel_sem = $this->pel_sem->insert($insertsem);
 */
										//insert table pel_waris
										$war = $this->app_waris->GetWhere(array('id_mohon' => $id_mohon));
										$waris = array
														(
															'matrik' => $matrik,
															'nama' => $war->row()->nama,
															'hubungan' => $war->row()->hubungan,
															'alamat1' => $war->row()->alamat1,
															'alamat2' => $war->row()->alamat2,
															'poskod' => $war->row()->poskod,
															'no_telefon' => $war->row()->nohp,
														);
/* 										$regwar = $this->pel_waris->insert($waris);
 */
										//insert pel_akademik
										$app_akad = $this->app_akademik->get_where(array('id_mohon' => $id_mohon));
/* 										foreach ($app_akad->result() as $f)
											{
												$dat[] = $this->pel_akademik->insert(array('matrik' => $matrik, 'level' => $f->level, 'institusi' => $f->institusi, 'tahun' => $f->tahun));

												//insert pel_subjek_akademik
												$app_sub_akad = $this->app_subjek_akademik->get_where(array('akademik_id' => $f->id));
													foreach($app_sub_akad->result() as $hg)
														{
															$tad[] = $this->pel_subjek_akademik->insert(array('akademik_id' => $hg->akademik_id, 'subjek' => $hg->subjek, 'gred' => $hg->gred));
														}
											}
 */
										//insert to pel_daftarsubjek
										$prog_subjek = $this->prog_subjek->GetWhere(array('kod_prog' => $pel->row()->progTawar, 'sem' => 1), NULL, NULL);
/* 										foreach ($prog_subjek->result() as $ps)
											{
												$array = array
															(
																'matrik' => $matrik,
																'kodsubjek' => $ps->kodsubjek,
																'sesi' => $pel->row()->sesi_mohon,
																'sem' => 1,
																'kredit' => $this->subjek->GetWhere(array('kodsubjek' => $ps->kodsubjek))->row()->kredit,
																'id_add' => $this->session->userdata('id_user'),
																'dt_add' => datetime_db(now()),
																'aktif' => 1
															);
												$tda[] = $this->pel_daftarsubjek->insert($array);
											}
 */
										//insert into pel_invois
										$siri_invois = $this->siri_invois->GetWhere(array('aktif' => 1) , NULL, NULL);
										$km = $siri_invois->row()->kod_mula;
										$si = $siri_invois->row()->siri;
										$no_inv = $km.$si;
										//echo $no_inv.' no_inv<br />';
										$yuran_prog = $this->yuran_prog->GetWhere(array('kod_prog' => $pel->row()->progTawar, 'aktif' => 1) , NULL, NULL);
										$jumlah1 = 0;
 										foreach ($yuran_prog->result() as $yp)
											{
												$jumlah1 += $yp->jumlah;
											}
										$inv = array
													(
														'no_inv' => $no_inv,
														'tarikh_inv' => date_db(now()),
														'matrik' => $matrik,
														'ktr_invois' => 'INVOIS PENDAFTARAN',
														'jumlah' => $jumlah1,
														'id_add' => $this->session->userdata('id_user'),
														'dt_add' => datetime_db(now()),
														'aktif' => 1
													);
/* 										$yu = $this->pel_invois->insert($inv);
 */										//update $siri_invois
/* 										$tp = $this->siri_invois->update(array('aktif' => 1), array('siri' => ($siri_invois->row()->siri + 1)));
 */
										//update pel_resit
/* 										$per = $this->pel_resit->update(array('matrik' => $siri_mohon), array('matrik' => $matrik));
 */
										//insert pel_item_invois
/*  										foreach ($yuran_prog->result() as $yp1)
											{
												$tarray = array
																(
																	'no_inv' => $no_inv,
																	'kod_akaun' => $yp1->kod_akaun,
																	'jumlah' => $yp1->jumlah,
																	'aktif' => 1,
																	'id_add' => $this->session->userdata('id_user'),
																	'dt_add' => datetime_db(now())
																);
												$pii[] = $this->pel_item_invois->insert($tarray);
											}
 */



/* 										if($reg && $uap && $pel_sem && $regwar && $dat && $tad && $tda && $yu && $tp && $per && $pii)
											{
												$data['info'] = 'Tahniah!!<br />Pelajr berjaya didaftar<br />Selamat datang ke '.$this->config->item('instl');
												$data['u'] = $this->app_pelajar->GetWherePage($whe, $config['per_page'], $this->uri->segment(3, 0));
											}
											else
											{
												$data['info'] = 'Rekod tidak berjaya diproses, Sila cuba sebentar lagi';
											}
 */
											
											

										//try pakai transaction, boleh rollback kalau salah satu group fails.....
										$this->db->trans_start();
										$reg = $this->pelajar->insert($insert);
										$uap = $this->app_pelajar->update(array('dt_transfer' => date_db(now()), 'id_transfer' => $this->session->userdata('id_user')), array('id' => $id_mohon));
										$pel_sem = $this->pel_sem->insert($insertsem);
										$regwar = $this->pel_waris->insert($waris);
										foreach ($app_akad->result() as $f)
											{
												$dat[] = $this->pel_akademik->insert(array('matrik' => $matrik, 'level' => $f->level, 'institusi' => $f->institusi, 'tahun' => $f->tahun));

												//insert pel_subjek_akademik
												$app_sub_akad = $this->app_subjek_akademik->get_where(array('akademik_id' => $f->id));
													foreach($app_sub_akad->result() as $hg)
														{
															$tad[] = $this->pel_subjek_akademik->insert(array('akademik_id' => $hg->akademik_id, 'subjek' => $hg->subjek, 'gred' => $hg->gred));
														}
											}
										foreach ($prog_subjek->result() as $ps)
											{
												$array = array
															(
																'matrik' => $matrik,
																'kodsubjek' => $ps->kodsubjek,
																'sesi' => $pel->row()->sesi_mohon,
																'sem' => 1,
																'kredit' => $this->subjek->GetWhere(array('kodsubjek' => $ps->kodsubjek))->row()->kredit,
																'id_add' => $this->session->userdata('id_user'),
																'dt_add' => datetime_db(now()),
																'aktif' => 1
															);
												$tda[] = $this->pel_daftarsubjek->insert($array);
											}
										$yu = $this->pel_invois->insert($inv);
										//update $siri_invois
										$tp = $this->siri_invois->update(array('aktif' => 1), array('siri' => ($siri_invois->row()->siri + 1)));

										//update pel_resit
										$per = $this->pel_resit->update(array('matrik' => $siri_mohon), array('matrik' => $matrik));
										$this->db->trans_complete();

										//insert pel_item_invois
 										foreach ($yuran_prog->result() as $yp1)
											{
												$tarray = array
																(
																	'no_inv' => $no_inv,
																	'kod_akaun' => $yp1->kod_akaun,
																	'jumlah' => $yp1->jumlah,
																	'aktif' => 1,
																	'id_add' => $this->session->userdata('id_user'),
																	'dt_add' => datetime_db(now())
																);
												$pii[] = $this->pel_item_invois->insert($tarray);
											}

										if ($this->db->trans_status() === FALSE)
											{
												$data['info'] = 'Rekod tidak berjaya diproses, Sila cuba sebentar lagi';
											}
											else
											{
												$data['info'] = 'Tahniah!!<br />Pelajr berjaya didaftar<br />Selamat datang ke '.$this->config->item('instl');
												$data['u'] = $this->app_pelajar->GetWherePage($whe, $config['per_page'], $this->uri->segment(3, 0));
											}
									}
							}
					}
				$this->load->view('kemasukan/pendaftaran', $data);
			}

		public function sesi_intake()
			{
				$this->load->library('pagination');
				$config['base_url'] = base_url().'kemasukan/sesi_intake';
				$config['total_rows'] = $this->sesi_intake->GetAllPage('tarikh_tamat DESC', NULL, NULL)->num_rows();
				$config['per_page'] = 5;
				$config['suffix'] = '.exe';

				$this->pagination->initialize($config);

				$data['u'] = $this->sesi_intake->GetAllPage('tarikh_tamat DESC', $config['per_page'], $this->uri->segment(3, 0));

				$data['paginate'] = $this->pagination->create_links();

				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('insert', TRUE))
							{
								$carian = $this->input->post('carian', TRUE);
								$insert = array
												(
													'kodsesi' => $this->input->post('kodsesi', TRUE),
													'kodmula' => $this->input->post('kodmula', TRUE),
													'siri' => 1,
													'tarikh_mula' => $this->input->post('tarikh_mula', TRUE),
													'tarikh_tamat' => $this->input->post('tarikh_tamat', TRUE),
													'tarikh_daftar' => $this->input->post('tarikh_daftar', TRUE),
													'aktif' => 0
												);

								$u = $this->sesi_intake->insert($insert);
								if ($u)
									{
										$data['info'] = 'Sesi Permohonan Kemasukan Direkodkan';
									}
									else
									{
										$data['info'] = 'Sila cuba sekali lagi';
									}
							}
					}
				$this->load->view('kemasukan/sesi_intake', $data);
			}

		public function set_sesi()
			{
				$kodsesi = $this->uri->segment(3, 0);

				//x reti nak checking lagu mana ni...terus update pun bahaya gak......
				//check tarikh la ni dulu....
				$dateDaftar = $this->sesi_intake->GetWhere(array('kodsesi' => $kodsesi))->row()->tarikh_daftar;
				//echo $dateDaftar;
				if (date_db(now()) > $dateDaftar)
					{
						//update semua jadi unactive dulu
						$x = $this->sesi_intake->update(NULL, array('aktif' => 0));
						//kendian update kodsesi aktiv
						$m = $this->sesi_intake->update(array('kodsesi' => $kodsesi), array('aktif' => 1));
						if($x && $m)
							{
								redirect ('kemasukan/sesi_intake', 'location');
								//echo 'jadi';
							}
							else
							{
								redirect ('kemasukan/sesi_intake', 'location');
								//echo 'x jadi';
							}
					}
					else
					{
						redirect ('kemasukan/sesi_intake', 'location');
					}
			}
			
		//template surat
		public function template($id_template = '1', $buatapa = NULL){
			$data['title'] = 'Senarai Template';
			$data['hidden_field'] =  '';
			$this->load->library('pagination');
			#$this->load->library('ckeditor');
			
			/*
			 * /
			 *  
			 * */
						
			$config['base_url'] = base_url().'kemasukan/template';
			$config['total_rows'] = $this->template_surat->get()->num_rows();
			$config['per_page'] = 5;
			$config['suffix'] = '.exe';

			//ckeditor
			$path = base_url().'js/ckeditor/';
			$data['CKEditor'] = new CKEditor5($path);
	 		
			//nice edit
			/*
			$this->load->helper('nicEdit');
			$data['nicedit'] = array
			(
			    'path'    =>    'js/nicedit',
			    'id' => 'header',
			    
			    'config' => array
			    (
			        'iconsPath'    => "'".base_url()."js/nicedit/nicEditorIcons.gif'",
			        'fullPanel' => true
			    )
			);
			*/
			
	 		//baru
			$data['baru'] = $this->template_surat->get(array('id'=>1)); //get defaut valu bahasa melayu
			$data['btnSubmit'] = 'Simpan';
			if($this->input->post('lang', TRUE)){
				$data['baru'] = $this->template_surat->get(array('lang'=>$this->input->post('lang')));
			}
			
			if($buatapa == 'edit'){
				$data['btnSubmit'] = 'Kemaskini';
				$data['baru'] = $this->template_surat->get(array('id'=>$id_template));
				$data['hidden_field'] = array('id' => $id_template);
			}
			
			$this->pagination->initialize($config);
			$data['template'] = $this->db->limit(5, $this->uri->segment(3,0));
			$data['template'] = $this->template_surat->get();
			
			$data['paginate'] = $this->pagination->create_links();
			
			$this->load->view('kemasukan/template', $data);
		}
		
		public function new_template(){
			if($this->input->post('baru', TRUE)){
				$this->template('1', 'baru');
			}
		}
		
		public function edit_template(){
		
			if($this->input->post('edit', TRUE) || $this->form_validation->run() == FALSE){
				$this->template($this->input->post('id'), 'edit');
			}
			
			$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
			if ($this->form_validation->run() == TRUE)
			{
				if($this->input->post('simpan', TRUE))
				{
					foreach($this->input->post() as $key => $val){
						$$key = $val;
						if ($key != 'simpan' && $key != 'id' && !empty($val)){
							$update[$key] = html_entity_decode(html_entity_decode($val));//htmlspecialchars( stripslashes($val));
							echo $key.' '.$val;
						}
						if($key == 'id'){
							$where['id'] = $val;
						}
					}
					
					$this->template_surat->edit($update, $where);
					redirect ('kemasukan/template', 'location');
				}
			}
		}
		
		public function check_matrik(){
			if($this->input->post('matrik', TRUE)){
				$check = $this->db->select('matrik');
				$check = $this->pelajar->get_where(array('matrik' => $this->input->post('matrik')));
				if($check->num_rows()==0){
					echo 'No matrik ini tiada dalam rekod.';
				}else{
					echo 'No matrik ini sudah ada dalam rekod. Sila pilih nombor yang lain.';
				}
			}
		}
#############################################################################################################################
	}

/* End of file kemasukan.php */
/* Location: ./application/controllers/kemasukan.php */
