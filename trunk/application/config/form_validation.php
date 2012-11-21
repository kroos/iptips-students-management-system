<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
##################################################################################################

//form validation through controller
//format
/*
$config = array	( 
					'controller/function' => array
					( 
						array
							(
								'field' => 'login',
								'label' => 'Login',
								'rules' => 'trim|required|min_length[6]|max_length[12]|xss_clean'
							)
					)
				);
*/
##################################################################################################
$config = array	( 
					'isms/index' => array
					( 
						array
							(
								'field' => 'username',
								'label' => 'Nama Pengguna',
								'rules' => 'trim|required|min_length[5]|max_length[12]|xss_clean'
							),
						array
							(
								'field' => 'password',
								'label' => 'Kata Laluan',
								'rules' => 'trim|required|min_length[6]|max_length[10]|xss_clean'
							),
					),
					'isms/forgot_password' => array
					( 
						array
							(
								'field' => 'username',
								'label' => 'Nama Pengguna',
								'rules' => 'trim|required|min_length[5]|max_length[12]|xss_clean'
							),
						array
							(
								'field' => 'email',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email|min_length[10]|max_length[50]|xss_clean'
							),
					),
					'isms/add_user' => array
					( 
						array
							(
								'field' => 'name',
								'label' => 'Nama Staf',
								'rules' => 'trim|required|min_length[5]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'ic',
								'label' => 'No. Kad Pengenalan',
								'rules' => 'trim|required|exact_length[12]|numeric|xss_clean'
							),
						array
							(
								'field' => 'username',
								'label' => 'Nama Pengguna',
								'rules' => 'trim|required|min_length[5]|max_length[12]|is_unique[user_data.username]|xss_clean'
							),
						array
							(
								'field' => 'password',
								'label' => 'Kata Laluan',
								'rules' => 'trim|required|min_length[6]|max_length[10]|xss_clean'
							),
						array
							(
								'field' => 'email',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email|min_length[10]|max_length[50]|xss_clean'
							),
						array
							(
								'field' => 'address',
								'label' => 'Alamat',
								'rules' => 'trim|min_length[5]|max_length[255]|xss_clean'
							),
						array
							(
								'field' => 'city',
								'label' => 'Bandar',
								'rules' => 'trim|min_length[2]|max_length[255]|xss_clean'
							),
						array
							(
								'field' => 'state',
								'label' => 'Negeri',
								'rules' => 'trim|min_length[2]|max_length[255]|xss_clean'
							),
						array
							(
								'field' => 'zip',
								'label' => 'Poskod',
								'rules' => 'trim|exact_length[5]|xss_clean'
							),
						array
							(
								'field' => 'cellphone',
								'label' => 'Telefon Bimbit',
								'rules' => 'trim|required|exact_length[10]|xss_clean'
							),
						array
							(
								'field' => 'telephone',
								'label' => 'Telefon Tetap',
								'rules' => 'trim|min_length[9]|max_length[10]|xss_clean'
							),
					),
					'isms/devel' => array
					( 
						array
							(
								'field' => 'ctrlr',
								'label' => 'Jabatan//controller/modul',
								'rules' => 'trim|required|is_natural_no_zero|max_length[12]|xss_clean'
							),
						array
							(
								'field' => 'function',
								'label' => 'Nama Function',
								'rules' => 'trim|required|alpha_dash|min_length[2]|max_length[50]|xss_clean'
							),
						array
							(
								'field' => 'remarks',
								'label' => 'Catitan Function',
								'rules' => 'trim|required|min_length[2]|max_length[50]|xss_clean'
							),
					),
				);


/* End of file form_validator.php */
/* Location: ./application/config/form_validator.php */
