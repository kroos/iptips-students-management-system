<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kewangan extends CI_Controller
	{
		//contructor => default utk semua function dlm controller nih...
		public function __construct()
			{
				parent::__construct();

				$this->load->model('app_pelajar');				//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_resit');				//nak tau controller ni pakai model mana 1...
				$this->load->model('pelajar');				//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_sem');				//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_invois');				//nak tau controller ni pakai model mana 1...
				$this->load->model('pel_item_invois');				//nak tau controller ni pakai model mana 1...
				$this->load->model('akaun');				//nak tau controller ni pakai model mana 1...

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
				$this->load->view('kewangan/home');
			}

		public function pmbyrn_penawarn()
			{
				//cari pelajar dulu <= harap2 cara ni tidak melambatkan proses mysql...
				//cari dulu sesi_mohon dari sesi_intake
				$data['h'] = $this->sesi_intake->GetWhere(array('aktif' => 1));
				$where = array('status_mohon' => 'TW', 'dt_transfer' => NULL, 'sesi_mohon' => $data['h']->row()->kodsesi);
				$data['u'] = $this->app_pelajar->GetWhere($where);

				$this->load->library('pagination');
				$config['base_url'] = base_url().'kewangan/pmbyrn_penawarn';
				$config['total_rows'] = $data['u']->num_rows();
				$config['per_page'] = 5;
				$config['suffix'] = '.exe';

				$this->pagination->initialize($config);

				$data['paginate'] = $this->pagination->create_links();

				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('cari', TRUE))
							{
								$nama = $this->input->post('carian', TRUE);
								$s = "status_mohon = 'TW' AND dt_transfer IS NULL AND sesi_mohon = '".$data['h']->row()->kodsesi."' AND (ic LIKE '%$nama%' OR nama LIKE '%$nama%' OR passport LIKE '%$nama%')";
								$data['r'] = $this->app_pelajar->GetWherePage($s, $config['per_page'], $this->uri->segment(3, 0));
								//echo $this->db->last_query();
							}
					}
					else
					{
						$data['r'] = $this->app_pelajar->GetWherePage($where, $config['per_page'], $this->uri->segment(3, 0));
					}
				$this->load->view('kewangan/pmbyrn_penawarn', $data);
			}

		public function bayar_prmhnn()
			{
				$data['info'] = '';
				$siri_mohon = $this->uri->segment(3, 0);
				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('simpan', TRUE))
							{
								$noresit = ucwords(strtolower($this->input->post('noresit', TRUE)));
								$ktr_bayaran = ucwords(strtolower($this->input->post('ktr_bayaran', TRUE)));
								$jumlah = $this->input->post('jumlah', TRUE);

								$insert = array
											(
												'noresit' => $noresit,
												'matrik' => $siri_mohon,
												'ktr_bayaran' => $ktr_bayaran,
												'tarikhmasa_resit' => datetime_db(now()),
												'jumlah' => $jumlah,
												'id_add' => $this->session->userdata('id_user'),
												'dt_add' => datetime_db(now()),
												'aktif' => 1
											);
								$x = $this->pel_resit->insert($insert);
								if($x)
									{
										$data['info'] = 'Pembayaran direkodkan';
									}
									else
									{
										$data['info'] = 'Pembayaran tidak berjaya direkodkan. Sila cuba sebentar lagi';
									}
							}
					}
				$this->load->view('kewangan/bayar_prmhnn', $data);
			}

		public function invoice_pelajar()
			{
				//buat pencarian dulu
				$data['info'] = '';
				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						if($this->input->post('cari', TRUE))
							{
								$matrik = $this->input->post('ic', TRUE);
								$d = $this->pelajar->GetWhere(array('matrik LIKE \'%'.$matrik.'%\'' => NULL), NULL, NULL);
								if ($d)
									{
										$data['info'] = 'Carian berjaya dilakukan';
										$data['all'] = $this->pelajar->GetWhere(array('matrik LIKE \'%'.$matrik.'%\'' => NULL), NULL, NULL);
									}
									else
									{
										$data['info'] = 'Sila cuba sebentar lagi';
									}
							}
					}
				$this->load->view('kewangan/cari_pelajar', $data);
			}

		public function invois()
			{
				$data['info'] = '';
				$matrik = $this->uri->segment(3, 0);
				$data['all'] = $this->pel_invois->GetWhere(array('matrik' => $matrik), NULL, NULL);
				$data['res'] = $this->pel_resit->GetWhere(array('matrik' => $matrik), NULL, NULL);
				$this->load->view('kewangan/invois', $data);
			}

		public function pembayaran()
			{
				
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

/* End of file kewangan.php */
/* Location: ./application/controllers/kewangan.php */