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
								'rules' => 'trim|required|exact_length[12]|numeric|is_unique[user_data.ic]|xss_clean'
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
								'rules' => 'trim|required|valid_email|min_length[10]|max_length[50]|is_unique[user_data.email]|xss_clean'
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
								'rules' => 'trim|required|exact_length[10]|is_unique[user_data.cellphone]|xss_clean'
							),
						array
							(
								'field' => 'telephone',
								'label' => 'Telefon Tetap',
								'rules' => 'trim|min_length[9]|max_length[10]|xss_clean'
							),
						array
							(
								'field' => 'jabatan',
								'label' => 'Jabatan',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'jawatan',
								'label' => 'Jawatan',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
					),
					'pendaftar/permohonan_baru' => array
					( 
						array
							(
								'field' => 'nama',
								'label' => 'Nama Pemohon',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'ic',
								'label' => 'Nombor Kad Pengenalan',
								'rules' => 'trim|required|min_length[1]|max_length[12]|numeric|is_unique[user_data.username]|xss_clean'
							),
						array
							(
								'field' => 'passport',
								'label' => 'Nombor Pasport',
								'rules' => 'trim|required|min_length[1]|max_length[30]|is_unique[user_data.username]|xss_clean'
							),
						array
							(
								'field' => 'dt_lahir',
								'label' => 'Tarikh Lahir',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'tempat_lahir',
								'label' => 'Tempat Lahir',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'status_warga',
								'label' => 'Taraf Warganegara',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'warganegara',
								'label' => 'Warganegara',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'bangsa',
								'label' => 'Bangsa',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'jantina',
								'label' => 'Jantina',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'status_kahwin',
								'label' => 'Taraf Perkahwinan',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'alamat1',
								'label' => 'Alamat',
								'rules' => 'trim|required|min_length[1]|max_length[255]|xss_clean'
							),
						array
							(
								'field' => 'alamat2',
								'label' => 'Alamat',
								'rules' => 'min_length[1]|max_length[255]|xss_clean'
							),
						array
							(
								'field' => 'poskod',
								'label' => 'Poskod',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'bandar',
								'label' => 'Bandar',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'negeri',
								'label' => 'Negeri',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'negara',
								'label' => 'Negara',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
							
					),
					'isms/devel' => array
					( 
						array
							(
								'field' => 'ctrlr',
								'label' => 'Jabatan/controller/modul',
								'rules' => 'trim|required|is_natural_no_zero|max_length[12]|xss_clean'
							),
						array
							(
								'field' => 'function',
								'label' => 'Nama Function',
								'rules' => 'trim|required|alpha_dash|min_length[2]|max_length[50]|is_unique[user_function.function]|xss_clean'
							),
						array
							(
								'field' => 'remarks',
								'label' => 'Catitan Function',
								'rules' => 'trim|required|min_length[2]|max_length[255]|is_unique[user_function.remarks]|xss_clean'
							),
					),
					'isms/profile' => array
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
					'isms/change_pass' => array
					( 
						array
							(
								'field' => 'opass',
								'label' => 'Kata Laluan Sekarang',
								'rules' => 'trim|required|min_length[6]|max_length[10]|xss_clean'
							),
						array
							(
								'field' => 'npass1',
								'label' => 'Kata Laluan Baru',
								'rules' => 'trim|required|min_length[6]|matches[npass2]|max_length[10]|xss_clean'
							),
						array
							(
								'field' => 'npass2',
								'label' => 'Taip Semula Kata Laluan Baru',
								'rules' => 'trim|required|min_length[6]|max_length[10]|xss_clean'
							),
					),
					'isms/user_cat' => array
					( 
						array
							(
								'field' => 'id_user_data',
								'label' => 'Nama Staff',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'jabatan',
								'label' => 'Jabatan',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'jawatan',
								'label' => 'Jawatan',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
					),
					//baca kat sini hanya selepas siapkan ./application/views/pendaftar/senarai_pemohon.php
					'pendaftar/senarai_pemohon' => array
					(
						//hanya ada 1 input sahaja
						array
							(
								'field' => 'nama',						//<-- input name
								'label' => 'Nama',						//<-- input label
								'rules' => 'trim|required|xss_clean'	//<-- input filter, boleh refer kat http://codeigniter.com/user_guide/libraries/form_validation.html#rulereference
							)
					),
					//refer balik kat controller pendaftar.php, checklist no 10
					'isms/user_perm_edit' => array
					(
						array
							(
								'field' => 'name',
								'label' => 'Nama Staf',
								'rules' => 'trim|required|min_length[2]|xss_clean'
							)
					),
				);


/* End of file form_validator.php */
/* Location: ./application/config/form_validator.php */
