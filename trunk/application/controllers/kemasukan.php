<<<<<<< .mine
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kemasukan extends CI_Controller
	{
			/*		yang ni semua x payah seabab dia.... :
			//contructor
			public function __construct(){							ni mesti hang tgk dari example yang lama iaitu CI sblm version 2.0. hanya CI version 1.X perlu command ni...
				parent::__construct();
				$this->load->model('app_pelajar_model');			letak benda ni dalam autoload : /config/autoload.php section => $autoload['model']
				//$this->load->helper('template_inheritance');		letak benda ni dalam autoload : /config/autoload.php section => $autoload['helper']
				$this->load->view('CSS3_four/main_template');		payah nak terang ni....
				$this->load->view('base_template_user');			payah nak terang ni....
				if ($this->session->userdata('logged_in') === FALSE)
				{
					redirect('/isms/index', 'location');
				}
			}
			*/

		public function index()
			{
				if ($this->session->userdata('logged_in') === TRUE)
					{
						if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === TRUE)
							{
								$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$this->load->view('kemasukan/home');
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
	//aku buat structure aku...
	//1. sblm start buat process dlm function senarai_pemohon(), hang kena masukkan function ni dlm DB dulu
	//2. cara masukkan function ni dalam DB :
	//		a. login dlm system guna user : admin1	pass : 123123
	//		b. pi kat home->developer
	//		c. click kat "kemasukan" -> sbb function ni dlm controller kemasukan
	//		d. isi nama function, dlm cth ni "senarai_pemohon"
	//		e. isi "Catitan Function" seterang mungkin tp ringkas sebab, org iptips nak kena tau apa function ni buat dan juga developer yg lain
	//			cuba isi dalam format ni "kemasukan : senarai_pemohon : senaraikan semua pemohon dari tarikh a smpi tarikh b"
	//3. dah siap bhg userr access level sbb nak bg admin mencapai controller kemasukan dan function senarai_pemohon
	//4. so kita kena siapkan proses dibawah
	//5. buat link dulu untuk user access ke function ni
	//6. pi kat ./application/views/base_template_user.php dan tambah html dan php code yang berkaitan -> hang boleh refer file tu..aku dah comment out utk hang ; line 36
	
	public function senarai_pemohon()
		{
			//aku comment apa yang hang buat kat sini		<--skip baca kat komen ni
			/*$data['pemohon'] = array();
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
					//$this->load->view('kemasukan/senarai_pemohon', $data);		
				}
			$this->load->view('kemasukan/senarai_pemohon', $data);
			*/



			// janagan baca komen kat sini selagi mana ./application/views/base_template_user.php belum diedit
			if ($this->session->userdata('logged_in') === TRUE)																				//hanya logged in user shj boleh access function
				{
					if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === TRUE)		//hanya user yang logged in DAN yang berkenaan shj boleh access function senarai_pemohon
						{
							//7. ikut laa samada nak buat disini atau nak hardcode terus di view
							$data['title'] = 'Senarai Pemohon';																				//data ni kita paskan ke views sebab di views, "$data['title']" variables akan di'extract' jadi di views akan jadi "echo $title" yang mana memaparkan "Senarai Pemohon"
																																			//variable "$data['title']" letak kat sini supaya ia boleh diaccess dari dalam "if" atau yg mana difikirkan perlu
							//8. pastikan samada nak buat page tanpa form atau tidak, drpd hang punya coding aku tgk hang cuba nak buat form, so benda ni kena ada....
							//9. create ./application/views/kemasukan/senarai_pemohon.php, sila lhat fal tu..aku dah komen sedetail mungkin utk hang senang paham...
							$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');								//saja nak bg kaler merah kalau user letak input yang salah
							if ($this->form_validation->run() == FALSE)																		//bhg ni kalau user belum lg click submit button i.e bukak page ada form
								{
									//jangan baca kat sini selagi mana ./application/config/form_validation.php x settle ;
									//10. paparkan form

									$this->load->view('kemasukan/senarai_pemohon', $data);													//buat paparan file ./application/views/kemasukan/senarai_pemohon.php yang mana variable "$data" (variable array) dari controller akan di"pas"kan ke views/kemasukan/senarai_pemohon.php

									//pastikan ./application/config/form_validation.php telah diisi dgn lengkap. Pastikan setiap input user difilter dgn teliti
								}
								else
								{
									//11. buat form process
									if($this->input->post('cari', TRUE))																	//var dr submit button, refer views/kemasukan/senarai_pemohon.php

									//12. test form tu dengan cara click submit TANPA masukkan input walaupun else kat bawah hanya ada [ if($this->input->post('cari', TRUE)) {} ]
									//jika dibuat dengan betul, form error akan keluar. jadi dinasihatkan test dulu form tu dgn click submit button tanpa isi input.
									//jangkaan yg akan jadi ialah form error akan keluar, kalau x keluar check balik form_validation.php dan juga controller.
										{
											$nama = $this->input->post('nama', TRUE);														//equivalent to $_POST from form

											//13. pergi kat ./application/config/autoload.php untuk autoload model ./application/models/app_pelajar.php
											//jadi kita x payah nak manually load dgn command ni --> $this->load->model('app_pelajar');
											$data['pemohon'] = $this->app_pelajar->seacrh_app($nama);

											//14. dah siap utk 1 function, lihat hasil...
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
		$data['pemohon'] = $this->app_pelajar_model->get_app_pelajar($id);
		$data['field'] = $this->db->list_fields('app_pelajar');
		foreach($data['field'] as $fields){
			$data[$fields] = $data['pemohon'][$fields];
		}

//		$data['nama'] = $data['pemohon']['nama'];
//		$data['ic'] = $data['pemohon']['ic'];
//		$data['passport'] = $data['pemohon']['passport'];
		$this->load->view('kemasukan/detail_pemohon', $data);
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
			$this->load->view('kemasukan/permohonan_baru',$data);
		}
		else
		{		
			if($this->input->post('simpan', TRUE)){	
				//$this->app_pelajar_model->set_app_pelajar();
				$data['info'] = 'Data telah berjaya disimpan';
				$this->load->view('kemasukan/permohonan_baru',$data);
			}
		}
	}
	
	//akademik
	public function akademik($id = NULL){
		
		$data['title'] = 'Kelayakan Akademik';
		if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === FALSE)
		{
			redirect('/isms/unauthorised', 'location');
		}
		
		$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
		if ($this->form_validation->run() == FALSE)
		{	
			$data['info'] = 'Data tidak berjaya disimpan';
			$this->load->view('kemasukan/akademik',$data);
		}
		else
		{
			$this->app_pelajar_model->set_app_pelajar();
			$data['info'] = 'Data telah berjaya disimpan';
			$this->load->view('kemasukan/waris',$data);
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

/* End of file kemasukan.php */
/* Location: ./application/controllers/kemasukan.php */=======
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kemasukan extends CI_Controller
	{
			/*		yang ni semua x payah seabab dia.... :
			//contructor*/
			public function __construct(){							//ni mesti hang tgk dari example yang lama iaitu CI sblm version 2.0. hanya CI version 1.X perlu command ni...
				parent::__construct();
				$this->load->model('app_pelajar');			//letak benda ni dalam autoload : /config/autoload.php section => $autoload['model']
				//$this->load->helper('template_inheritance');		letak benda ni dalam autoload : /config/autoload.php section => $autoload['helper']
				//$this->load->view('CSS3_four/main_template');		payah nak terang ni....
				//$this->load->view('base_template_user');			payah nak terang ni....
				if ($this->session->userdata('logged_in') === FALSE)
				{
					redirect('/isms/index', 'location');
				}else{
                                    if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === false){
                                        redirect('/isms/unauthorised', 'location');
                                    }
                                }
			}
			

		public function index()
			{
				if ($this->session->userdata('logged_in') === TRUE)
					{
						if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === TRUE)
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
									$this->load->view('kemasukan/senarai_pemohon', $data);													//buat paparan file ./application/views/pendaftar/senarai_pemohon.php yang mana variable "$data" (variable array) dari controller akan di"pas"kan ke views/pendaftar/senarai_pemohon.php
                                                                }
								else
								{
									if($this->input->post('cari', TRUE))																	//var dr submit button, refer views/pendaftar/senarai_pemohon.php
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
		$data['pemohon'] = $this->app_pelajar_model->get_app_pelajar($id);
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
				//$this->app_pelajar_model->set_app_pelajar();
				$data['info'] = 'Data telah berjaya disimpan';
				$this->load->view('kemasukan/akademik',$data);
			}
		}
	}
	
	//akademik
	public function akademik($id = NULL){
		
		$data['title'] = 'Kelayakan Akademik';
		if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === FALSE)
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
                    if($this->input->post('simpan', TRUE)){
			$this->app_pelajar_model->set_app_akademik();
			$data['info'] = 'Data telah berjaya disimpan';
			$this->load->view('pendaftar/waris',$data);
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
/* Location: ./application/controllers/pendaftar.php */>>>>>>> .r60
