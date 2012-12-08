<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hea extends CI_Controller
	{
		//contructor => default utk semua function dlm controller nih...
		public function __construct()
			{
				parent::__construct();

				$this->load->model('subjek');					//nak tau controller ni pakai model mana 1...

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


#############################################################################################################################
	}

/* End of file hea.php */
/* Location: ./application/controllers/hea.php */