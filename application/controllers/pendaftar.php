<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftar extends CI_Controller
	{
		//contructor
	public function __construct(){
		parent::__construct();
		$this->load->model('app_pelajar_model');
		//$this->load->helper('template_inheritance');
		$this->load->view('CSS3_four/main_template');
		$this->load->view('base_template_user');
		if ($this->session->userdata('logged_in') === FALSE)
		{
			redirect('/isms/index', 'location');
		}
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

	//senarai pemohon
	public function senarai_pemohon(){
		$data['title'] = 'Senarai Pemohon';
		$data['pemohon'] = array();
        //$where = false;
		$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() === TRUE)
		{
			//echo 'cari la';
			$nama = $this->input->post('nama', TRUE);
			$data['pemohon'] = $this->app_pelajar_model->seacrh_app($nama);
			$data['info'] = count($data['pemohon']).' data dijumpai.';
		}		
		else{
			$data['pemohon'] = $this->app_pelajar_model->get_app_pelajar();	
			//$this->load->view('pendaftar/senarai_pemohon', $data);		
		}
		$this->load->view('pendaftar/senarai_pemohon', $data);
	}
	
	//maklumat pemohon individual
	public function detail_pemohon($id){
		$data['title'] = 'Keterangan Pemohon';
		$data['pemohon'] = $this->app_pelajar_model->get_app_pelajar($id);
		$data['field'] = $this->db->list_fields('app_pelajar');
		foreach($data['field'] as $fields){
			$data[$fields] = $data['pemohon'][$fields];
		}

//		$data['nama'] = $data['pemohon']['nama'];
//		$data['ic'] = $data['pemohon']['ic'];
//		$data['passport'] = $data['pemohon']['passport'];
		$this->load->view('pendaftar/detail_pemohon', $data);
	}
	
	//insert pemohon
	public function permohonan_baru(){
		$data['title'] = 'Permohonan Baru';
		
		$data['field'] = $this->db->list_fields('app_pelajar');
		
//		foreach($data['field'] as $fields){
//			$this->form_validation->set_rules($fields, $fields, 'required');
//		}
		
		$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
		if ($this->form_validation->run() === FALSE)
		{	
			if($this->input->post('simpan', TRUE)){
				$data['info'] = 'Data tidak berjaya disimpan';				
			}
			$this->load->view('pendaftar/permohonan_baru',$data);
		}
		else
		{		
			if($this->input->post('simpan', TRUE)){	
				//$this->app_pelajar_model->set_app_pelajar();
				$data['info'] = 'Data telah berjaya disimpan';
				$this->load->view('pendaftar/permohonan_baru',$data);
			}
		}
	}
	
	//akademik
	public function akademik($id = NULL){
		
		$data['title'] = 'Kelayakan Akademik';
		if(user_role($this->session->userdata('user_role'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === FALSE)
		{
			redirect('/isms/unauthorised', 'location');
		}
		
		$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
		if ($this->form_validation->run() == FALSE)
		{	
			$data['info'] = 'Data tidak berjaya disimpan';
			$this->load->view('pendaftar/akademik',$data);
		}
		else
		{
			$this->app_pelajar_model->set_app_pelajar();
			$data['info'] = 'Data telah berjaya disimpan';
			$this->load->view('pendaftar/waris',$data);
		}
	}

	//waris
	public function waris($id = NULL){
		
		$data['title'] = 'Maklumat Ibu Bapa/Penjaga';
		if(user_role($this->session->userdata('user_role'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === FALSE)
		{
			redirect('/isms/unauthorised', 'location');
		}
		
		$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('pendaftar/waris',$data);
		}
		else
		{
			$this->app_pelajar_model->set_app_pelajar();
			$data['info'] = 'Data telah berjaya disimpan';
			$this->load->view('pendaftar/detail_pemohon',$data);
		}
	}
//template
/*
		public function home()
			{
				if ($this->session->userdata('logged_in') === TRUE)
					{
						if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === TRUE)
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