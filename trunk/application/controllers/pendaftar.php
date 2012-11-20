<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftar extends CI_Controller
	{
		//contructor
	public function __construct(){
		parent::__construct();
		$this->load->model('app_pelajar_model');
	}
		public function index()
			{
				if ($this->session->userdata('logged_in') === TRUE)
					{
						if(user_role($this->session->userdata('user_role'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === TRUE)
							{
								$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$this->load->view('pendaftar/home');
									}
									else
									{
										//form process
										
									}
							}
							else
							{
								redirect('/isms/unauthorised', 'location');
							}
					}
					else
					{
						redirect('/isms/index', 'location');
					}
			}

#############################################################################################################################
//error 404
		public function page_missing()
			{
				$this->load->view('errors/error_custom_404');
			}

#############################################################################################################################

	//senarai pemohon
	public function senarai_pemohon(){
		$data['title'] = 'Senarai Pemohon';
		$data['pemohon'] = array();
        //$where = false;
		$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('ic', 'Nombor Kad Pengenalan', 'required');
		if ($this->form_validation->run() === TRUE)
		{
			//echo 'cari la';
			$nama = $this->input->post('nama', TRUE);
			$ic = $this->input->post('ic', TRUE);
			$data['pemohon'] = $this->app_pelajar_model->seacrh_app($nama,$ic);
		}		
		else{
			//echo 'woi';
			$data['pemohon'] = $this->app_pelajar_model->get_app_pelajar();	
			//$this->load->view('pendaftar/senarai_pemohon', $data);		
		}
		$this->load->view('pendaftar/senarai_pemohon', $data);
	}
	
	//insert pemohon
	public function insert_pemohon(){
		$data['title'] = 'Permohonan Baru';
		
		$this->form_validation->set_rules('nama', 'Namae', 'required');
		$this->form_validation->set_rules('ic', 'Nombor Kad Pengenalan', 'required');
		$this->form_validation->set_rules('dt_lahir', 'Tarikh Lahir', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{	
			$this->load->view('pendaftar/permohonan_baru',$data);
			
		}
		else
		{
			$this->app_pelajar_model->set_app_pelajar();
			$data['info'] = 'Data telah berjaya disimpan';
			$this->load->view('pendaftar/permohonan_baru',$data);
		}
	}
//template
/*
		public function home()
			{
				if ($this->session->userdata('logged_in') === TRUE)
					{
						if(user_role($this->session->userdata('user_role'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === TRUE)
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
							else
							{
								redirect('/isms/unauthorised', 'location');
							}
					}
					else
					{
						redirect('/isms/index', 'location');
					}
			}
*/
#############################################################################################################################
	}

/* End of file pendaftar.php */
/* Location: ./application/controllers/pendaftar.php */