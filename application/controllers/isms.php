<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Isms extends CI_Controller
	{
		public function index()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						redirect('/isms/home', 'location');
					}
					else
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('login');
							}
							else
							{
								//form process
								if ($this->input->post('login', TRUE))
									{
										$username = $this->input->post('username', TRUE);
										$password = $this->input->post('password', TRUE);
										//sangkut -.-"
									}
							}
					}
			}

		public function forgot_password()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						redirect('/isms/home', 'location');
					}
					else
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('forgot_password');
							}
							else
							{
								//form process
								if ($this->input->post('for_pass', TRUE))
									{
										$username = $this->input->post('username', TRUE);
										$email = $this->input->post('email', TRUE);
										//sangkut -.-"
									}
							}
					}
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
				if ($this->session->userdata('logged_in') == TRUE)
					{
						redirect('/isms/home', 'location');
					}
					else
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
			}
*/
#############################################################################################################################
	}

/* End of file isms.php */
/* Location: ./application/controllers/isms.php */