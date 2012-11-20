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
												/*t = $this->view->view_user_access_level($id_user);
												foreach ($t->result() as $f)
													{
														//$role[$f->dept_ctrlr] = $f->function;
														echo $f->dept_ctrlr.'&nbsp;',$f->function.'<br />';
													}
												//*/

												$session = array
																(
																	'id_user' => $id_user,
																	'username' => $username,
																	'password' => $password,
																	'logged_in' => TRUE,
																);
												/*
												echo '<pre>';
												print_r($role);
												echo '</pre>';
												echo '<pre>';
												print_r($session);
												echo '</pre>';
												//*/
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
								$this->load->view('add_user');
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

/* End of file isms.php */
/* Location: ./application/controllers/isms.php */