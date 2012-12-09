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

										//check valid user or not
										$g = $this->user_data->forgot_pass($username, $email);
										if ($g->num_rows() == 1)		//->num_rows() = mysql_num_rows()
											{
												$message = "
																<h1>IPTIPs Student Management System</h1>
																<h2>System Pemerolehan Kata Laluan untuk pengguna ".$g->row()->name."</h2>
																<p>Berikut adalah Kata Laluan anda untuk sistem ini :</p>
																<p>Kata Laluan : <strong>".$g->row()->password."</strong></p>
															";
												//process phpmailer
												$this->load->library('phpmailer/Pop3');
												$this->pop3->Authorise($this->config->item('pop3_server'), $this->config->item('pop3_port'), 30, $this->config->item('username'), $this->config->item('password'), 1);

												$this->phpmailer->IsSMTP();
												$this->phpmailer->SMTPDebug  = 0;											//debug = 0 (no debug), 1 = errors and messages, 2 = messages only
												$this->phpmailer->SMTPAuth   = $this->config->item('SMTP_auth');			// enable SMTP authentication
												$this->phpmailer->Host       = $this->config->item('smtp_server');
												$this->phpmailer->Port       = $this->config->item('smtp_port');			//change this port if you are using different port than mine
												$this->phpmailer->SMTPSecure = $this->config->item('SMTP_Secure');

												$this->phpmailer->Username   = $this->config->item('username');				//change this too
												$this->phpmailer->Password   = $this->config->item('password');				//this too

												$this->phpmailer->AddReplyTo($this->config->item('from'), $this->config->item('from_name'));	//from who
												$this->phpmailer->SetFrom($this->config->item('from'), $this->config->item('from_name'));		//reply to who?
												$this->phpmailer->AddAddress($g->row()->email, $g->row()->name);											//recipient

												$this->phpmailer->IsHTML(TRUE);
												$this->phpmailer->Subject = 'IPTIPs Student Management System Pemerolehan Kata Laluan';
												$this->phpmailer->MsgHTML($message);
												$this->phpmailer->AltBody    = "To view the message, please use an HTML compatible email viewer!";		// optional, comment out and test

												if (!$this->phpmailer->Send())
													{
														$data['info'] = $this->phpmailer->ErrorInfo;
													}
													else
													{
														$data['info'] = 'Success sending email';
													}
											}
											else
											{
												$data['info'] = 'Nama Pengguna dan Email anda tidak sepadan atau ia tidak wujud dalam pengkalan data. Sila semak Nama Pengguna dan Email anda';
											}
										$this->load->view('forgot_password', $data);
									}
							}
					}
			}

		public function home()
			{
				if ($this->session->userdata('logged_in') === TRUE)
					{
						$this->load->view('home');
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
										$data['i'] = $this->user_department->GetAll();
										$this->load->view('add_user', $data);
									}
									else
									{
										//form process
										if($this->input->post('save', TRUE))
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
												$jabatan = $this->input->post('jabatan', TRUE);
												$jawatan = $this->input->post('jabatan', TRUE);

												//masukkan dalam database user_data
												$k = $this->user_data->insert_user($username, $password, $ic, $name, $address, $city, $state, $zip, $cellphone, $telephone, $email, datetime_db(now()));

												// id user from the last operation of database i.e from query $k
												$id_user = $this->db->insert_id();

												//masukkan data ke dalam table user_dept
												$c = $this->user_dept->insert_us_dept($id_user, $jabatan);

												//kemudian masukkan user ini ke controller/modul/jabatan yang telah dipilih i.e table user_dept_jaw
												$a = $this->user_dept_jaw->insert_jaw($id_user, $jabatan, $jawatan);

												//masukkan function dari $jabatan ni shj untuk user ni kedalam table user_dept_func
												$l = $this->dept_func->id_user_department($jabatan);
												foreach ($l->result() as $j)
													{
														if($j->id_user_function == 1)
															{
																$v[] = $this->user_dept_func->insert($id_user, $j->id_user_department, $j->id_user_function, 1);
															}
															else
															{
																$v[] = $this->user_dept_func->insert($id_user, $j->id_user_department, $j->id_user_function, 0);
															}
													}

												if ($k && $c && $a && $v)
													{
														//$data['info'] = 'Kemasukan pengguna berjaya. Sila semak pengguna ini untuk "ACCESS LEVEL"';
														//bw ke set privilleges...
														redirect('/isms/set_privillege/'.$id_user, 'location');
													}
													else
													{
														$data['info'] = 'Kemasukkan pengguna adalah tidak berjaya. Sila cuba sekali lagi';
													}

												//papar balik berserta dengan message
												$data['i'] = $this->user_department->GetAll();
												$this->load->view('add_user', $data);
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

		public function combobox()
			{
				$array = array();
				if ($_GET['_name'] == 'jabatan') 
					{
						$rt = $this->user_department->GetAll();
						foreach($rt->result() as $y)
							{
								if ( $_GET['_value'] == $y->id )
									{
										$th = $this->view->view_dept_jaw_search($y->id);
										foreach($th->result() as $b)
											{
												$array[] = array($b->id_jawatan => $b->jawatan);
											}
									}
							}
					}
				echo json_encode( $array );
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
										if($this->input->post('save', TRUE))
											{
												$ctrlr = strtolower($this->input->post('ctrlr', TRUE));
												$func = strtolower($this->input->post('function', TRUE));
												$remarks = ucwords(strtolower($this->input->post('remarks', TRUE)));
												$display = $this->input->post('display', TRUE);
												$menu = ucwords(strtolower($this->input->post('menu', TRUE)));

												//masukkan dalam table function
												//nak kena dapatkan dulu posisi
												$mn = $this->view->menu($ctrlr)->num_rows();
												//echo $mn;
												//tambah 1
												$mnb = $mn + 1;
												$y = $this->user_function->insert_function($func, $remarks, $menu, $display, $mnb);

												//masukkan dalam table dept_func utk func tadi, akan tetapi perlu dapatkan id untk function dulu
												$id_func = $this->db->insert_id();
												$n = $this->dept_func->insert_func($ctrlr, $id_func);
												
												//masukkan jugak dalam table user_dept_func khas utk admin dan enable sekali
												$u = $this->user_dept_func->insert(1, $ctrlr, $id_func, 1);
												
												if($y && $n && $u)
													{
														$data['info'] = 'Kini user admin boleh mencapai modul/controller dan juga function yang akan dibina';
													}
													else
													{
														$data['info'] = 'Something teribly happen, Please try again later';
													}
												$data['i'] = $this->user_department->GetAll();
												$this->load->view('devel', $data);
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

		public function profile()
			{
				if ($this->session->userdata('logged_in') === TRUE)
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$data['o'] = $this->user_data->id($this->session->userdata('id_user'));
								$this->load->view('profile', $data);
							}
							else
							{
								//form process
								if($this->input->post('psave', TRUE))
									{
										$name = ucwords(strtolower($this->input->post('name', TRUE)));
										$ic = $this->input->post('ic', TRUE);
										$email = $this->input->post('email', TRUE);
										$address = ucwords(strtolower($this->input->post('address', TRUE)));
										$city = ucwords(strtolower($this->input->post('city', TRUE)));
										$state = ucwords(strtolower($this->input->post('state', TRUE)));
										$zip = $this->input->post('zip', TRUE);
										$cellphone = $this->input->post('cellphone', TRUE);
										$telephone = $this->input->post('telephone', TRUE);
										
										$q = $this->user_data->update_profile($this->session->userdata('id_user'), $name, $ic, $email, $address, $city, $state, $zip, $cellphone, $telephone);
										if($q)
											{
												$data['info'] = 'Data berjaya disimpan';
											}
											else
											{
												$data['info'] = 'Something teribly happen. please try again later';
											}
										$data['o'] = $this->user_data->id($this->session->userdata('id_user'));
										$this->load->view('profile', $data);
									}
							}
					}
					else
					{
						redirect('/isms/index', 'location');
					}
			}

		public function change_pass()
			{
				if ($this->session->userdata('logged_in') === TRUE)
					{
						$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$data['o'] = $this->user_data->id($this->session->userdata('id_user'));
								$this->load->view('change_pass', $data);
							}
							else
							{
								//form process
								if($this->input->post('change', TRUE))
									{
										$opass = $this->input->post('opass', TRUE);
										$npass1 = $this->input->post('npass1', TRUE);
										$npass2 = $this->input->post('npass2', TRUE);

										$data['o'] = $this->user_data->id($this->session->userdata('id_user'));
										if ($data['o']->row()->password != $npass1)
											{
												$q = $this->user_data->update_pass($this->session->userdata('id_user'), $npass1);
												if($q)
													{
														$data['info'] = 'Data berjaya disimpan';
													}
													else
													{
														$data['info'] = 'Something teribly happen. please try again later';
													}
											}
											else
											{
												$data['info'] = 'Kata Laluan anda tidak berubah dari kata laluan anda yang lama. Sila ubah';
											}
										$this->load->view('change_pass', $data);
									}
							}
					}
					else
					{
						redirect('/isms/index', 'location');
					}
			}

		public function set_privillege()
			{
				if ($this->session->userdata('logged_in') === TRUE)
					{
						if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === TRUE)
							{
								$id_user = $this->uri->segment(3, 0);
								if(is_numeric($id_user))
									{
										$data['u'] = $this->view->view_user_access($id_user);
										$this->load->view('set_privillege', $data);
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

		public function update_privillege()
			{
				if ($this->session->userdata('logged_in') === TRUE)
					{
						if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === TRUE)
							{
								$id_user_dept_func = $this->uri->segment(3, 0);
								$id_user = $this->uri->segment(4, 0);
								$active = $this->uri->segment(5, 0);
								if(is_numeric($id_user_dept_func) && is_numeric($id_user) && is_numeric($active))
									{
										$c = $this->user_dept_func->update_active($id_user_dept_func, $active);
										if($c)
											{
												redirect('/isms/set_privillege/'.$id_user, 'location');
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

		public function user_cat()
			{
				if ($this->session->userdata('logged_in') === TRUE)
					{
						if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === TRUE)
							{
								//pagination process
								$this->load->library('pagination');
								$config['base_url'] = base_url().'isms/user_cat';
								$config['total_rows'] = $this->view->view_user_dept_jaw()->num_rows();
								$config['per_page'] = 5;

								$this->pagination->initialize($config);

								$data['ie'] = $this->view->view_user_dept_jaw_page($config['per_page'], $this->uri->segment(3, 0));

								$data['paginate'] =$this->pagination->create_links();

								//for jabatan n jawatan block
								$data['i'] = $this->user_department->GetAll();

								$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$this->load->view('user_cat', $data);
									}
									else
									{
										//form process
										if($this->input->post('tambah', TRUE))
											{
												$id_user_data = $this->input->post('id_user_data', TRUE);
												$jabatan = $this->input->post('jabatan', TRUE);
												$jawatan = $this->input->post('jawatan', TRUE);

												//x boleh masukkan staff dalam jabatan atau jawatan yang dah dia ada dah...
												$y = $this->user_dept_jaw->user_dept_jaw($id_user_data, $jabatan);
												if($y->num_rows() < 1)
													{
														//masukkan data ke dalam table user_dept
														$c = $this->user_dept->insert_us_dept($id_user_data, $jabatan);

														//kemudian masukkan user ini ke controller/modul/jabatan yang telah dipilih i.e table user_dept_jaw
														$a = $this->user_dept_jaw->insert_jaw($id_user_data, $jabatan, $jawatan);

														//masukkan function dari $jabatan ni shj untuk user ni kedalam table user_dept_func
														$l = $this->dept_func->id_user_department($jabatan);
														foreach ($l->result() as $j)
															{
																if($j->id_user_function == 1)
																	{
																		$v[] = $this->user_dept_func->insert($id_user_data, $j->id_user_department, $j->id_user_function, 1);
																	}
																	else
																	{
																		$v[] = $this->user_dept_func->insert($id_user_data, $j->id_user_department, $j->id_user_function, 0);
																	}
															}

														if ($c && $a && $v)
															{
																//$data['info'] = 'Kemasukan pengguna berjaya. Sila semak pengguna ini untuk "ACCESS LEVEL"';
																//bw ke set privilleges...
																redirect('/isms/set_privillege/'.$id_user_data, 'location');
															}
															else
															{
																$data['info'] = 'Kemasukkan pengguna adalah tidak berjaya. Sila cuba sekali lagi';
																$this->load->view('user_cat', $data);
															}
													}
													else
													{
														$data['info'] = 'Pengguna ini sudah pun berada dalam jabatan yang dipilih';
														$this->load->view('user_cat', $data);
													}
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

		public function user_perm_edit()
			{
				if ($this->session->userdata('logged_in') === TRUE)
					{
						if(user_role($this->session->userdata('id_user'), $this->uri->segment(1, 0), $this->uri->segment(2, 0)) === TRUE)
							{
								$data['ui'] =$this->user_data->GetAllXAdmin();
								$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
								if ($this->form_validation->run() == TRUE)
									{
										//form process
										if($this->input->post('search', TRUE))
											{
												$name = ucwords(strtolower($this->input->post('name', TRUE)));
												//echo $name.' = nama<br />';
												$l = $this->user_data->search_user($name);
												//echo $l->num_rows().' = num rows<br />';
												if($l->num_rows() == 1)
													{
														redirect('/isms/set_privillege/'.$l->row()->id, 'location');
													}
													else
													{
														$data['info'] = 'Nama yang anda cari tidak dapat dijumpai';
													}
											}
									}
								$this->load->view('user_perm_edit', $data);
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

		public function truncate()
			{
				$data['info'] = '';
				$this->form_validation->set_error_delimiters('<font color="#FF0000">', '</font>');
				if ($this->form_validation->run() == TRUE)
					{
						//form process
						if($this->input->post('truncate', TRUE))
							{
/* 								//padam terus
								$r[] = $this->app_akademik->truncate();
								$r[] = $this->app_pelajar->truncate();
								$r[] = $this->app_progmohon->truncate();
								$r[] = $this->app_subjek_akademik->truncate();
								$r[] = $this->app_waris->truncate();
								$r[] = $this->pel_resit->truncate(); */
								if($r)
									{
										$data['info'] = 'System kosong';
									}
									else
									{
										$data['info'] = 'sila cuba sebentar lagi';
									}
							}
					}
				$this->load->view('truncate', $data);
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