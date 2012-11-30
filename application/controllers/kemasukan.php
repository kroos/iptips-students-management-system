<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kemasukan extends CI_Controller
	{
		//contructor => default utk semua function dlm controller nih...
		public function __construct()
			{
				parent::__construct();

				$this->load->model('app_pelajar');				//nak tau controller ni pakai model mana 1...

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
				$this->load->view('kemasukan/home');
			}

	public function senarai_pemohon()
		{
			if ($this->session->userdata('logged_in') === TRUE)																				//hanya logged in user shj boleh access function
				{
					if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === TRUE)		//hanya user yang logged in DAN yang berkenaan shj boleh access function senarai_pemohon
						{
							$data['title'] = 'Senarai Pemohon';																				//data ni kita paskan ke views sebab di views, "$data['title']" variables akan di'extract' jadi di views akan jadi "echo $title" yang mana memaparkan "Senarai Pemohon"
																																			//variable "$data['title']" letak kat sini supaya ia boleh diaccess dari dalam "if" atau yg mana difikirkan perlu
							$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');								//saja nak bg kaler merah kalau user letak input yang salah
							if ($this->form_validation->run() == FALSE)																		//bhg ni kalau user belum lg click submit button i.e bukak page ada form
								{
									$data['pemohon'] = $this->app_pelajar->get_app_pelajar();	
									$this->load->view('kemasukan/senarai_pemohon', $data);													//buat paparan file ./application/views/kemasukan/senarai_pemohon.php yang mana variable "$data" (variable array) dari controller akan di"pas"kan ke views/kemasukan/senarai_pemohon.php
                                }
								else
								{
									if($this->input->post('cari', TRUE))																	//var dr submit button, refer views/kemasukan/senarai_pemohon.php
									{
                                        $nama = $this->input->post('nama', TRUE);														//equivalent to $_POST from form
                                        $data['pemohon'] = $this->app_pelajar->seacrh_app($nama);
									}
									$this->load->view('kemasukan/senarai_pemohon', $data);													//buat paparan balik jerrrr.....
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
	
	//maklumat pemohon individual
	public function detail_pemohon($id){
		$data['title'] = 'Keterangan Pemohon';
		$data['pemohon'] = $this->app_pelajar->get_app_pelajar($id);
		$data['field'] = $this->db->list_fields('app_pelajar');
		foreach($data['field'] as $fields){
			$data[$fields] = $data['pemohon'][$fields];
		}
		$this->load->view('Kemasukan/detail_pemohon', $data);
	}
	
	//insert pemohon
	public function permohonan_baru($id = NULL){
		$data['title'] = 'Permohonan Baru';
		
		$data['field'] = $this->db->list_fields('app_pelajar');
		
		$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
		if ($this->form_validation->run() === FALSE)
		{	
			if($this->input->post('simpan', TRUE)){
				$data['info'] = 'Data tidak berjaya disimpan';				
			}
			$this->load->view('kemasukan/permohonan_baru',$data);
		}
		else
		{		
			if($this->input->post('simpan', TRUE)){	
				$insert = array(
	//	            'matrik' => $this->input->post('matrik'),
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
		            'dt_add' => date('Y-d-m')
				);
				$this->app_pelajar->set_app_pelajar($insert);
				$data['insertID'] = $this->db->insert_id();
				$data['info'] = 'Data telah berjaya disimpan';
				redirect('kemasukan/akademik/'.$data['insertID']);
			}
		}
	}
	
	//akademik
	public function akademik($id = NULL){
		
		$data['title'] = 'Kelayakan Akademik';
		$data['id_mohon'] = $id;
		
		$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
		if ($this->form_validation->run() == FALSE)
		{	
			if($this->input->post('simpan', TRUE)){
				$data['info'] = 'Data tidak berjaya disimpan';
			}
			$this->load->view('kemasukan/akademik',$data);
		}
		else
		{
                    if($this->input->post('simpan', TRUE)){
			$this->app_pelajar_model->set_app_akademik();
			$data['info'] = 'Data telah berjaya disimpan';
			$this->load->view('kemasukan/waris',$data);
                    }
		}
	}

	//waris
	public function waris($id = NULL){
		
		$data['title'] = 'Maklumat Ibu Bapa/Penjaga';
		if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === FALSE)
		{
			redirect('/isms/unauthorised', 'location');
		}
		
		$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('kemasukan/waris',$data);
		}
		else
		{
			$this->app_pelajar_model->set_app_pelajar();
			$data['info'] = 'Data telah berjaya disimpan';
			$this->load->view('kemasukan/detail_pemohon',$data);
		}
	}

#############################################################################################################################
	}

/* End of file kemasukan.php */
/* Location: ./application/controllers/kemasukan.php */
