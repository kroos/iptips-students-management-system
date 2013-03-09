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
				$this->load->model('host_bilik');						//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_dafhostel');						//nak tau controller ni pakai model mana 1...
				$this->load->model('view');						//nak tau controller ni pakai model mana 1...

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
						$data['es'] = $se->row()->kodsesi;
						//$data['ps'] = $this->pel_sem->GetWhere(array('sesi' => $data['es'], 'status_pel' => '01', 'aktif' => 1), NULL, NULL);
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == TRUE)
							{
								if($this->input->post('cari', TRUE))
									{
										$matrik = strtoupper(strtolower($this->input->post('matrik', TRUE)));

										$data['ps'] = $this->pel_sem->GetWhere(array('matrik LIKE ' => '%'.$matrik.'%', 'sesi' => $data['es'], 'status_pel' => '01', 'aktif' => 1), NULL, NULL);
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
				$se = $this->sesi_akademik->GetWhere(array('aktif' => 1), NULL, NULL);
				if ($se->num_rows() == 1)
					{
						$es = $se->row()->kodsesi;
						$c = $this->pel_sem->GetWhere(array('sesi' => $es, 'status_pel' => '01', 'aktif' => 1, 'id' => $id), NULL, NULL);
						if ($c->num_rows() == 1)
							{
								$data['ps'] = $c;

								//check availability of the hostel => check dulu jantina pelajar
								//echo $c->row()->matrik;
								$h = $this->pelajar->GetWhere(array('matrik' => $c->row()->matrik), NULL, NULL);
								//echo $h->row()->jantina;
								if($h->row()->jantina == 1)
									{
										$data['host'] = $this->hostel->GetWhere(array('aktif' => 1, 'kat_jantina = 1 OR kat_jantina = 3' => NULL), NULL, NULL);
										//echo $this->db->last_query();
									}
									else
									{
										$data['host'] = $this->hostel->GetWhere(array('aktif' => 1, 'kat_jantina = 2 OR kat_jantina = 3' => NULL), NULL, NULL);
										//echo $this->db->last_query();
									}
								$this->load->view('hep/daftar_pelajar', $data);
							}
					}
			}

		public function conf_daftar_pelajar()
			{
				$idp = $this->uri->segment(3, 0);
				$idb = $this->uri->segment(4, 0);

				if(is_numeric($idp) && is_numeric($idb))
					{
						//cari pelajar
						$se = $this->sesi_akademik->GetWhere(array('aktif' => 1), NULL, NULL);
						if ($se->num_rows() == 1)
							{
								$es = $se->row()->kodsesi;
								$c = $this->pel_sem->GetWhere(array('sesi' => $es, 'status_pel' => '01', 'aktif' => 1, 'id' => $idp), NULL, NULL);
								if ($c->num_rows() == 1)
									{
										$h = $this->pelajar->GetWhere(array('matrik' => $c->row()->matrik), NULL, NULL);
										$z = $this->host_bilik->GetWhere(array('id' => $idb, 'aktif' => 1), NULL, NULL);
										if($z->num_rows() == 1)
											{
												$data['p'] = $h;
												$data['b'] = $z;
											}
									}
							}
						$this->load->view('hep/conf_daftar_pelajar', @$data);
					}
			}

		public function registered()
			{
				$idp = $this->uri->segment(3, 0);
				$idb = $this->uri->segment(4, 0);

				if(is_numeric($idp) && is_numeric($idb))
					{
						//cari pelajar
						$se = $this->sesi_akademik->GetWhere(array('aktif' => 1), NULL, NULL);
						if ($se->num_rows() == 1)
							{
								$es = $se->row()->kodsesi;
								$c = $this->pel_sem->GetWhere(array('sesi' => $es, 'status_pel' => '01', 'aktif' => 1, 'id' => $idp), NULL, NULL);
								if ($c->num_rows() == 1)
									{
										$h = $this->pelajar->GetWhere(array('matrik' => $c->row()->matrik), NULL, NULL);
										$z = $this->host_bilik->GetWhere(array('id' => $idb, 'aktif' => 1), NULL, NULL);
										if($z->num_rows() == 1)
											{
												$l = $this->pel_dafhostel->insert(array('matrik' => $h->row()->matrik, 'idbilik' => $z->row()->id, 'tarikh_masuk' => date_db(now()), 'sesi' => $c->row()->sesi, 'id_add' => $this->session->userdata('id_user'), 'dt_add' => date_db(now())));
												if($l)
													{
														redirect('hep/hostel_pelajar', 'location');
													}
													else
													{
													
													}
											}
									}
							}
					}
			}

		public function checkout_asrama()
			{
				$se = $this->sesi_akademik->GetWhere(array('aktif' => 1), NULL, NULL);
				if ($se->num_rows() == 1)
					{
						$sesi = $se->row()->kodsesi;

						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == TRUE)
							{
								if($this->input->post('cari', TRUE))
									{
										$matrik = strtoupper(strtolower($this->input->post('matrik', TRUE)));

										$data['ps'] = $this->view->view_peldafhost($matrik, $sesi);
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
				$this->load->view('hep/checkout_asrama', @$data);
			}

		public function conf_check_out()
			{
				$id = $this->uri->segment(3, 0);
				if(is_numeric($id))
					{
						$r = $this->pel_dafhostel->GetWhere(array('id' => $id), NULL, NULL);
						if($r->num_rows() == 1)
							{
								$data['p'] = $r;
							}
							else
							{
								$data['info'] = 'Better dont talk too much......';
							}
					}
				$this->load->view('hep/conf_check_out', @$data);
			}

		public function check_out()
			{
				$id = $this->uri->segment(3, 0);
				if (is_numeric($id))
					{
						$t = $this->pel_dafhostel->GetWhere(array('id' => $id), NULL, NULL);
						if ($t->num_rows() == 1)
							{
								$a = $this->pel_dafhostel->update(array('id' => $id), array('tarikh_keluar' => date_db(now()), 'id_edit' => $this->session->userdata('id_user'), 'dt_edit' => date_db(now())));
								if($a)
									{
										redirect ('hep/checkout_asrama', 'location');
									}
									else
									{
										redirect ('hep/checkout_asrama', 'location');
									}
							}
					}
					else
					{
						redirect ('hep/checkout_asrama', 'location');
					}
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

		public function bilik_asrama()
			{
				$id = $this->uri->segment(3, 0);
				$r = $this->hostel->GetWhere(array('kodhostel' => $id), NULL, NULL);
				if($r->num_rows() == 1)
					{
						$id1 = $r->row()->kodhostel;
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == TRUE)
							{
								if($this->input->post('simpan', TRUE))
									{
										$bi = $this->input->post(NULL, TRUE);
										unset($bi['simpan']);
										$l = array('kodhostel' => $id1, 'aktif' => 1);
										$res = array_merge($bi, $l);
										$m = $this->host_bilik->insert($res);
										if($m)
											{
												$data['info'] = 'Data disimpan';
											}
											else
											{
												$data['info'] = 'Sila cuba sebentar lagi';
											}
									}
							}
					}
				$data['ps'] = $this->host_bilik->GetWhere(array('kodhostel' => $id1), NULL, NULL);
				$this->load->view('hep/bilik_asrama', $data);
			}

		public function toggle_bilik_asrama()
			{
				$id = $this->uri->segment(3, 0);
				$tog = $this->uri->segment(4, 0);
				$g = $this->host_bilik->GetWhere(array('id' => $id), NULL, NULL);
				if($g->num_rows() == 1)
					{
						if($tog == 1 || $tog == 0)
							{
								//patut kena check dulu samada ada ahli atau dak...
								$r = $this->host_bilik->update(array('id' => $id), array('aktif' => $tog));
								if($r)
									{
										redirect('hep/bilik_asrama/'.$g->row()->kodhostel, 'location');
									}
									else
									{
										redirect('hep/bilik_asrama/'.$g->row()->kodhostel, 'location');
									}
							}
					}
			}

		public function toggle_konf_asrama()
			{
				$id = $this->uri->segment(3, 0);
				$tog = $this->uri->segment(4, 0);
				$s = $this->hostel->GetWhere(array('kodhostel' => $id), NULL, NULL);
				if($s->num_rows() == 1)
					{
						//check ada bilik yg aktif dak?
						$t = $this->host_bilik->GetWhere(array('kodhostel' => $id, 'aktif' => 1), NULL, NULL);
						if ($t->num_rows() > 0)
							{
								redirect ('hep/konfigurasi_asrama', 'location');
							}
							else
							{
								$v = $this->hostel->update(array('kodhostel' => $id), array('aktif' => $tog));
								if($v)
									{
										redirect ('hep/konfigurasi_asrama', 'location');
									}
									else
									{
										redirect ('hep/konfigurasi_asrama', 'location');
									}
							}
					}
			}

		public function edit_bilik_asrama()
			{
				$id = $this->uri->segment(3, 0);
				$j = $this->host_bilik->GetWhere(array('id' => $id), NULL, NULL);
				if($j->num_rows() == 1)
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == TRUE)
							{
								if($this->input->post('simpan', TRUE))
									{
										$gi = $this->input->post(NULL, TRUE);
										unset($gi['simpan']);
										$l = $this->host_bilik->update(array('id' => $id), $gi);
										if($l)
											{
												redirect('hep/bilik_asrama', 'location');
											}
											else
											{
												$data['info'] = 'Sila cuba sebentar lagi';
											}
									}
							}
						$data['ps'] = $j;
					}
				$this->load->view('hep/edit_bilik_asrama', $data);
			}

		public function kemaskini_asrama()
			{
				$id = $this->uri->segment(3, 0);
				$o = $this->hostel->GetWhere(array('kodhostel' => $id), NULL, NULL);
				if($o->num_rows() == 1)
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == TRUE)
							{
								if($this->input->post('simpan', TRUE))
									{
										$ho = $this->input->post(NULL, TRUE);
										unset($ho['simpan']);
										$k = $this->hostel->update(array('kodhostel' => $o->row()->kodhostel), $ho);
										if($k)
											{
												redirect ('hep/konfigurasi_asrama', 'location');
											}
											else
											{
												$data['info'] = 'Sila cuba sebentar lagi';
											}
									}
							}
						$data['p'] = $o;
					}
				$this->load->view('hep/kemaskini_asrama', $data);
			}

		public function laporan_asrama()
			{
				$data['ho'] = $this->hostel->GetWhere(array('aktif' => 1), NULL, NULL);
				$data['se'] = $this->sesi_akademik->GetAll(NULL, NULL);
				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('cari', TRUE))
							{
								$r = $this->input->post(NULL, TRUE);
								unset($r['cari']);

								$e = $this->view->GetWhere(array(), NULL, NULL);
							}
					}
				$this->load->view('hep/laporan_asrama', @$data);
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