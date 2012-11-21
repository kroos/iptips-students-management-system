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

										$r = $this->user_data->login($username, $password);
										if ($r->num_rows() == 1)
											{
												$id_user = $r->row()->id;

												$session = array
																(
																	'id_user' => $id_user,
																	'username' => $username,
																	'password' => $password,
																	'logged_in' => TRUE,
																);

												$this->session->set_userdata($session);
												redirect('/isms/home', 'location');
											}
											else
											{
												$data['info'] = 'Sila semula semak nama pengguna dan kata laluan anda';
												$this->load->view('login', $data);
											}
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

		public function home()
			{
				if ($this->session->userdata('logged_in') === TRUE)
					{
						if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === TRUE)
							{
								$this->load->view('home');
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

		public function add_user()
			{
				if ($this->session->userdata('logged_in') === TRUE)
					{
						if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === TRUE)
							{
								$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$this->load->view('add_user');
										
									}
									else
									{
										//form process
										if($this->input->post('next', TRUE))
											{
												$name = ucwords(strtolower($this->input->post('name', TRUE)));
												$ic = $this->input->post('ic', TRUE);
												$username = $this->input->post('username', TRUE);
												$password = $this->input->post('password', TRUE);
												$email = $this->input->post('email', TRUE);
												$address = ucwords(strtolower($this->input->post('address', TRUE)));
												$city = ucwords(strtolower($this->input->post('city', TRUE)));
												$state = ucwords(strtolower($this->input->post('state', TRUE)));
												$zip = $this->input->post('zip', TRUE);
												$cellphone = $this->input->post('cellphone', TRUE);
												$telephone = $this->input->post('telephone', TRUE);

												//masukkan dalam session in case kalau nak kena back
												$session = array(
																	'name' => $name,
																	'ic' => $ic,
																	'username1' => $username,
																	'password1' => $password,
																	'email' => $email,
																	'address' => $address,
																	'city' => $city,
																	'state' => $state,
																	'zip' => $zip,
																	'cellphone' => $cellphone,
																	'telephone' => $telephone
																);
												$this->session->set_userdata($session);
												redirect('/isms/user_dept', 'location');
											}
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

		public function user_dept()
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

		public function devel()
			{
				if ($this->session->userdata('logged_in') === TRUE)
					{
						if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === TRUE)
							{
								$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$data['i'] = $this->user_department->GetAll();
										$this->load->view('devel', $data);
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
//unauthorised page
		public function unauthorised()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						$this->load->view('unauthorised');
					}
					else
					{
						redirect('/isms/index', 'location');
					}
			}
#############################################################################################################################
//logout
		public function logout()
			{
				if ($this->session->userdata('logged_in') === TRUE)
					{
						//process
						$array = array 
								(
									'id_user' => '',
									'username' => '',
									'password' => '',
									'user_role' => '',
									'logged_in' => FALSE
								);
						$this->session->unset_userdata($array);
						redirect('', 'location');
					}
					else
					{
						redirect('', 'location');
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

/* End of file isms.php */
/* Location: ./application/controllers/isms.php */