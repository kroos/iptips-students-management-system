<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hea extends CI_Controller
	{
		//contructor => default utk semua function dlm controller nih...
		public function __construct()
			{
				parent::__construct();

				$this->load->model('subjek');					//nak tau controller ni pakai model mana 1...
				$this->load->model('app_pelajar');				//nak tau controller ni pakai model mana 1...
				$this->load->model('app_akademik');				//nak tau controller ni pakai model mana 1...
				$this->load->model('app_subjek_akademik');		//nak tau controller ni pakai model mana 1...
				$this->load->model('app_waris');				//nak tau controller ni pakai model mana 1...
				$this->load->model('app_progmohon');			//nak tau controller ni pakai model mana 1...

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
		public function subj_mgmt()
			{
				$data['title'] = 'Senarai Subjek';

				//pagination process
				$this->load->library('pagination');
				$config['base_url'] = base_url().'hea/subj_mgmt';
				$config['total_rows'] = $this->subjek->GetAll()->num_rows();
				$config['per_page'] = 5;
				$config['suffix'] = '.exe';

				$this->pagination->initialize($config);

				$data['subjek'] = $this->subjek->GetAllPage($config['per_page'], $this->uri->segment(3, 0));

				$data['paginate'] =$this->pagination->create_links();

				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('cari', TRUE))
							{
								$namasubjek = $this->input->post('namasubjek', TRUE);
								$data['subjek'] = $this->subjek->search_subj($namasubjek);

								#########################################################
								$data['sub'] = $this->subjek->SearchSub($nama);
								//bandingkan dgn model dgn yang ina buat....

								//check balik kalau query kat atas menjadi..kalau tidak paparkan carian yg depa cari tu takdak
								if($data['sub'])
									{
										$data['info'] = '';
									}
									else
									{
										$data['info'] = 'Query x menjadi, check balik database connection';
									}
								#########################################################
							}
					}
				
				$this->load->view('hea/subj_mgmt', $data);
			}

		public function mohon_pelajar()
			{
				//mula2 buat list dulu, ambik dari list app_pelajar dan letak apa yang patut...sepatutnya ada checking dulu utk terima masuk sbg pelajar...
				//query ni check semua status mohon "dalam proses" tp buang user yg salah satu tu dah ada status selain dr "dlm proses"
				$this->load->library('pagination');
				$config['base_url'] = base_url().'hea/mohon_pelajar';
				$config['total_rows'] = $this->app_pelajar->GetWhere(array('status_mohon' => 'DIP'))->num_rows();
				$config['per_page'] = 5;
				$config['suffix'] = '.exe';

				$this->pagination->initialize($config);

				$data['u'] = $this->app_pelajar->GetWherePage(array('status_mohon' => 'DIP'), $config['per_page'], $this->uri->segment(3, 0));

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
								//1. gaglkan program semua program dulu
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
				$this->load->view('hea/mohon_pelajar', $data);
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
								redirect('/hea/mohon_pelajar', 'location');
							}
					}
			}

		public function pmhn_gagal()
			{
				//permohonan gagal
				$id = $this->uri->segment(3, 0);
				if(is_numeric($id))
					{
						$g = $this->app_pelajar->update(array('dt_edit' => date_db(now()), 'id_edit' => $this->session->userdata('id_user'),'status_mohon' => 'GL'), array('id' => $id));

						//update sekali app_progmohon
						$r = $this->app_progmohon->update(array('id_mohon' => $id), array('status_mohon' => 'GL', 'user_edit' => $this->session->userdata('id_user'), 'dt_edit' => datetime_db(now()), 'catatan' => 'Permohonan Gagal'));
						if($g && $r)
							{
								redirect('/hea/mohon_pelajar', 'location');
							}
					}
			}

#############################################################################################################################
	}

/* End of file hea.php */
/* Location: ./application/controllers/hea.php */