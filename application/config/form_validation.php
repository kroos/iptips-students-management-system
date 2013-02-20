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
					'kemasukan/permohonan_baru' => array
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
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'passport',
								'label' => 'Nombor Pasport',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
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
								'rules' => 'trim|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'negeri',
								'label' => 'Negeri',
								'rules' => 'trim|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'negara',
								'label' => 'Negara',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'sesi_mohon',
								'label' => 'Sesi Pengambilan',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'notel',
								'label' => 'No Telefon',
								'rules' => 'trim|min_length[1]|max_length[10]|xss_clean'
							),
						array
							(
								'field' => 'nohp',
								'label' => 'No Telefon Bimbit',
								'rules' => 'trim|required|min_length[1]|max_length[10]|xss_clean'
							),
						array
							(
								'field' => 'emel',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email|is_unique[app_pelajar.emel]|xss_clean'
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
								'field' => 'menu',
								'label' => 'Menu Function',
								'rules' => 'trim|min_length[2]|max_length[50]|is_unique[user_function.menu]|xss_clean'
							),
						array
							(
								'field' => 'display',
								'label' => 'Paparkan di Menu',
								'rules' => 'trim|required|is_natural|exact_length[1]|xss_clean'
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
					'kemasukan/senarai_pemohon' => array
					(
						//hanya ada 1 input sahaja
						array
							(
								'field' => 'nama',						//<-- input name
								'label' => 'Nama',						//<-- input label
								'rules' => 'trim|xss_clean'	//<-- input filter, boleh refer kat http://codeigniter.com/user_guide/libraries/form_validation.html#rulereference
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
					'kemasukan/rayuan_permohonan' => array
					(
						array
							(
								'field' => 'id_appprogmohon',
								'label' => 'ID',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'id_mohon',
								'label' => 'ID Mohon',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'kodprog',
								'label' => 'Kod Program',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'catatan',
								'label' => 'Catatan',
								'rules' => 'trim|required|min_length[2]|xss_clean'
							)
					),
					'kemasukan/akademik' => array
					(
						array
							(
								'field' => 'institusi',
								'label' => 'Institusi Pengajian',
								'rules' => 'trim|required|min_length[2]|xss_clean'
							),
						array
							(
								'field' => 'tahun',
								'label' => 'Tahun Tamat Pengajian',
								'rules' => 'trim|required|exact_length[4]|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'level',
								'label' => 'Tahap Pengajian',
								'rules' => 'trim|required|min_length[2]|alpha|xss_clean'
							),
///*
						array
							(
								'field' => 'gred[]',
								'label' => 'Gred',
								'rules' => 'required|min_length[1]|xss_clean'
							),
							array
							(
								'field' => 'subjek[]',
								'label' => 'Mata Pelajaran',
								'rules' => 'required|min_length[1]|xss_clean'
							),
//*/
					),
					'kemasukan/waris' => array
					(
						array
							(
								'field' => 'nama',
								'label' => 'Nama',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'hubungan',
								'label' => 'Hubungan',
								'rules' => 'trim|required|min_length[1]|max_length[100]|xss_clean'
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
								'rules' => 'trim|min_length[1]|max_length[255]|xss_clean'
							),
						array
							(
								'field' => 'poskod',
								'label' => 'Poskod',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
						array
							(
								'field' => 'notel_rumah',
								'label' => 'Telefon Tetap',
								'rules' => 'trim|max_length[12]|xss_clean'
							),
						array
							(
								'field' => 'notel_pej',
								'label' => 'Telefon Pejabat',
								'rules' => 'trim|max_length[12]|xss_clean'
							),
						array
							(
								'field' => 'nohp',
								'label' => 'Telefon Bimbit',
								'rules' => 'trim|required|max_length[12]|xss_clean'
							),
						array
							(
								'field' => 'email',
								'label' => 'Email',
								'rules' => 'trim|valid_email|xss_clean'
							),
					),
					'kemasukan/progmohon' => array
					(
						array
							(
								'field' => 'kod_prog[]',
								'label' => 'Program',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'catatan[]',
								'label' => 'Catatan',
								'rules' => 'trim|xss_clean'
							),
					),
					'kemasukan/mohon_pelajar' => array
					(
						array
							(
								'field' => 'id_appprogmohon',
								'label' => 'ID Permohonan Program',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'id_mohon',
								'label' => 'ID Pemohon',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'kodprog',
								'label' => 'Kod Program',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'catatan',
								'label' => 'Catatan',
								'rules' => 'trim|required|xss_clean'
							),
					),
					'kemasukan/mohon_rayuan' => array
					(
						array
							(
								'field' => 'id_appprogmohon',
								'label' => 'ID Permohonan Program',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'id_mohon',
								'label' => 'ID Pemohon',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'kodprog',
								'label' => 'Kod Program',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'catatan',
								'label' => 'Catatan',
								'rules' => 'trim|required|xss_clean'
							),
					),

					'kemasukan/edit_permohonan' => array
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
								'rules' => 'trim|required|min_length[1]|max_length[12]|numeric|xss_clean'
							),
						array
							(
								'field' => 'passport',
								'label' => 'Nombor Pasport',
								'rules' => 'trim|min_length[1]|max_length[30]|xss_clean'
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
								'rules' => 'trim|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'negeri',
								'label' => 'Negeri',
								'rules' => 'trim|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'negara',
								'label' => 'Negara',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'sesi_mohon',
								'label' => 'Sesi Pengambilan',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'notel',
								'label' => 'No Telefon',
								'rules' => 'trim|min_length[1]|max_length[10]|xss_clean'
							),
						array
							(
								'field' => 'nohp',
								'label' => 'No Telefon Bimbit',
								'rules' => 'trim|required|min_length[1]|max_length[10]|xss_clean'
							),
						array
							(
								'field' => 'emel',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email|xss_clean'
							)
					),
					'kewangan/pmbyrn_penawarn' => array
					(
						array
							(
								'field' => 'carian',
								'label' => 'Carian',
								'rules' => 'trim|required|xss_clean'
							)
					),
					'kewangan/bayar_prmhnn' => array
					(
						array
							(
								'field' => 'noresit',
								'label' => 'No Resit',
								'rules' => 'trim|required|is_unique[pel_resit.noresit]|alpha_dash|xss_clean'
							),
						array
							(
								'field' => 'ktr_bayaran',
								'label' => 'Catatan',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'jumlah',
								'label' => 'Jumlah',
								'rules' => 'trim|required|decimal|xss_clean'
							),
					),
					'kemasukan/permohonan' => array
					(
						array
							(
								'field' => 'ic',
								'label' => 'No Kad Pengenalan / No Passport',
								'rules' => 'trim|required|xss_clean'
							)
					),
/*  					'kemasukan/pendaftaran' => array
					(
						array
							(
								'field' => 'carian',
								'label' => 'No Kad Pengenalan / No Passport / Nama',
								'rules' => 'trim|required|xss_clean'
							)
					), */
					'isms/truncate' => array
					(
						array
							(
								'field' => 'truncate',
								'label' => 'Truncate',
								'rules' => 'trim|required|xss_clean'
							)
					),
/* 					'kemasukan/daftar_student' => array
					(
						array
							(
								'field' => 'nomatriks',
								'label' => 'No Matriks',
								'rules' => 'trim|required|is_unique[pelajar.matrik]|xss_clean'
							)
					), */
					'kemasukan/sesi_intake' => array
					(
						array
							(
								'field' => 'kodsesi',
								'label' => 'Sesi Kemasukan',
								'rules' => 'trim|required|alpha_dash|is_unique[sesi_intake.kodsesi]|xss_clean'
							),
						array
							(
								'field' => 'kodmula',
								'label' => 'Kod Mula',
								'rules' => 'trim|required|alpha_dash|is_unique[sesi_intake.kodmula]|xss_clean'
							),
						array
							(
								'field' => 'tarikh_mula',
								'label' => 'Tarikh Mula',
								'rules' => 'trim|required|alpha_dash|is_unique[sesi_intake.tarikh_mula]|xss_clean'
							),
						array
							(
								'field' => 'tarikh_tamat',
								'label' => 'Tarikh Tamat',
								'rules' => 'trim|required|alpha_dash|is_unique[sesi_intake.tarikh_tamat]|xss_clean'
							),
						array
							(
								'field' => 'tarikh_daftar',
								'label' => 'Tarikh Daftar',
								'rules' => 'trim|required|alpha_dash|is_unique[sesi_intake.tarikh_daftar]|xss_clean'
							),
					),
					'kemasukan/edit_template' => array
					(
						array
							(
								'field' => 'lang',
								'label' => 'Bahasa',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'nama_template',
								'label' => 'Nama Template',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'header',
								'label' => 'Template',
								'rules' => 'trim|required|xss_clean'
							),
						/*array
							(
								'field' => 'address',
								'label' => 'Alamat',
								'rules' => 'trim|required'
							),*/
					),
					'hea/info_pelajar' => array
					(
						array
							(
								'field' => 'ic',
								'label' => 'Nama / Nombor Kad Pengenalan / No Passport / No Matrik',
								'rules' => 'trim|required|min_length[2]|xss_clean'
							)
					),
					'hea/edit' => array
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
								'rules' => 'trim|required|min_length[1]|max_length[12]|numeric|xss_clean'
							),
						array
							(
								'field' => 'passport',
								'label' => 'Nombor Pasport',
								'rules' => 'trim|min_length[1]|max_length[30]|xss_clean'
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
								'rules' => 'trim|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'negeri',
								'label' => 'Negeri',
								'rules' => 'trim|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'negara',
								'label' => 'Negara',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'sesi_daftar',
								'label' => 'Sesi Pengambilan',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'notel',
								'label' => 'No Telefon',
								'rules' => 'trim|min_length[1]|max_length[10]|xss_clean'
							),
						array
							(
								'field' => 'nohp',
								'label' => 'No Telefon Bimbit',
								'rules' => 'trim|required|min_length[1]|max_length[10]|xss_clean'
							),
						array
							(
								'field' => 'emel',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email|xss_clean'
							)
					),
					'hea/edit_waris' => array
					(
						array
							(
								'field' => 'nama',
								'label' => 'Nama',
								'rules' => 'trim|required|min_length[1]|max_length[30]|xss_clean'
							),
						array
							(
								'field' => 'hubungan',
								'label' => 'Hubungan',
								'rules' => 'trim|required|min_length[1]|max_length[100]|xss_clean'
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
								'rules' => 'trim|min_length[1]|max_length[255]|xss_clean'
							),
						array
							(
								'field' => 'poskod',
								'label' => 'Poskod',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
						array
							(
								'field' => 'no_telefon',
								'label' => 'Telefon',
								'rules' => 'trim|max_length[12]|xss_clean'
							)
					),
					'hea/daftar_subjek' => array
					(
						array
							(
								'field' => 'ic',
								'label' => 'No Matrik',
								'rules' => 'trim|xss_clean'
							)
					),
					'hea/status_pelajar' => array
					(
						array
							(
								'field' => 'ic',
								'label' => 'No Matrik',
								'rules' => 'trim|xss_clean'
							)
					),
					'hea/urus_subjek' => array
					(
						array
							(
								'field' => 'subjek',
								'label' => 'Matapelajaran',
								'rules' => 'trim|required|min_length[2]|xss_clean'
							),
						array
							(
								'field' => 'sem',
								'label' => 'Matapelajaran',
								'rules' => 'trim|required|numeric|xss_clean'
							),
						array
							(
								'field' => 'matrik',
								'label' => 'No Matrik',
								'rules' => 'trim|required|min_length[2]|xss_clean'
							)
					),
					'hea/urus_status' => array
					(
						array
							(
								'field' => 'stat',
								'label' => 'Status',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'statDtl',
								'label' => 'Status Detail',
								'rules' => 'trim|required|xss_clean'
							)
					),
					'kewangan/pembayaran' => array
					(
						array
							(
								'field' => 'ic',
								'label' => 'No Matrik',
								'rules' => 'trim|xss_clean'
							),
					),
					'kewangan/pmbyrn_resit' => array
					(
						array
							(
								'field' => 'noresit',
								'label' => 'No Resit',
								'rules' => 'trim|required|is_unique[pel_resit.noresit]|alpha_dash|xss_clean'
							),
						array
							(
								'field' => 'ktr_bayaran',
								'label' => 'Catatan',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'jumlah',
								'label' => 'Jumlah',
								'rules' => 'trim|required|decimal|xss_clean'
							),
					),
					'hea/pensyarah' => array
					(
						array
							(
								'field' => 'ic',
								'label' => 'Nama Staff',
								'rules' => 'trim|xss_clean'
							)
					),
					'hea/assign_lect' => array
					(
						array
							(
								'field' => 'kodsubjek',
								'label' => 'Subjek',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'sesi',
								'label' => 'Sesi Akademik',
								'rules' => 'trim|required|xss_clean'
							),
					),
					'hea/pemarkahan' => array
					(
						array
							(
								'field' => 'jum_mark',
								'label' => 'Markah',
								'rules' => 'trim|required|greater_than[-1]|less_than[101]|xss_clean'
							),
						array
							(
								'field' => 'jum_pemutihan',
								'label' => 'Pemutihan',
								'rules' => 'trim|required|greater_than[-1]|less_than[101]|xss_clean'
							)
					),
					'hea/kemaskini_gred' => array
					(
						array
							(
								'field' => 'jum_mark',
								'label' => 'Markah',
								'rules' => 'trim|required|greater_than[-1]|less_than[101]|xss_clean'
							),
						array
							(
								'field' => 'jum_pemutihan',
								'label' => 'Pemutihan',
								'rules' => 'trim|required|greater_than[-1]|less_than[101]|xss_clean'
							)
					),
					'hea/slip_exam' => array
					(
						array
							(
								'field' => 'matrik',
								'label' => 'Matrik',
								'rules' => 'trim|xss_clean'
							)
					),
					'hea/kehadiran' => array
					(
						array
							(
								'field' => 'jum_hari',
								'label' => 'Jumlah Hari Kelas',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'id',
								'label' => 'ID',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'peratus_wajib',
								'label' => 'Peratus Wajib Hadir',
								'rules' => 'trim|required|is_natural_no_zero|less_than[101]|xss_clean'
							),
						array
							(
								'field' => 'jum_hadir',
								'label' => 'Jumlah Hadir',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
					),
					'hea/edit_hadir' => array
					(
						array
							(
								'field' => 'jum_hari',
								'label' => 'Jumlah Hari Kelas',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'peratus_wajib',
								'label' => 'Peratus Wajib Hadir',
								'rules' => 'trim|required|is_natural_no_zero|less_than[101]|xss_clean'
							),
						array
							(
								'field' => 'jum_hadir',
								'label' => 'Jumlah Hadir',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
					),
					'perpustakaan/pinjam' => array
					(
						array
							(
								'field' => 'matrik',
								'label' => 'No Matrik',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'tarikh_clear',
								'label' => 'Tarikh Pemulangan',
								'rules' => 'trim|xss_clean'
							)
					),
					'perpustakaan/edit_pinjaman' => array
					(
						array
							(
								'field' => 'matrik',
								'label' => 'No Matrik',
								'rules' => 'trim|xss_clean'
							)
					),
					'perpustakaan/kemas_stud' => array
					(
						array
							(
								'field' => 'matrik',
								'label' => 'No Matrik',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'tarikh_clear',
								'label' => 'Tarikh Pemulangan',
								'rules' => 'trim|xss_clean'
							)
					),
					'hep/hostel_pelajar' => array
					(
						array
							(
								'field' => 'matrik',
								'label' => 'No Matrik',
								'rules' => 'trim|xss_clean'
							)
					),
					'hep/konfigurasi_asrama' => array
					(
						array
							(
								'field' => 'kodhostel',
								'label' => 'Kod Hostel',
								'rules' => 'trim|required|is_unique[hostel.kodhostel]|alpha_dash|xss_clean'
							),
						array
							(
								'field' => 'namahostel',
								'label' => 'Nama Hostel',
								'rules' => 'trim|required|is_unique[hostel.namahostel]|xss_clean'
							),
						array
							(
								'field' => 'alamat1',
								'label' => 'Alamat 1',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'alamat2',
								'label' => 'Alamat 2',
								'rules' => 'trim|xss_clean'
							),
						array
							(
								'field' => 'bandar',
								'label' => 'Bandar',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'negeri',
								'label' => 'Negeri',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'kat_jantina',
								'label' => 'Kategori Jantina',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
					),
					'hep/bilik_asrama' => array
					(
						array
							(
								'field' => 'nobilik',
								'label' => 'No Bilik',
								'rules' => 'trim|required|is_unique[host_bilik.nobilik]|alpha_dash|xss_clean'
							),
						array
							(
								'field' => 'harga_hari',
								'label' => 'Harga Hari',
								'rules' => 'trim|required|greater_than[-1]|xss_clean'
							),
						array
							(
								'field' => 'harga_bulan',
								'label' => 'Harga Bulan',
								'rules' => 'trim|required|greater_than[-1]|xss_clean'
							),
						array
							(
								'field' => 'max_capacity',
								'label' => 'Max Capacity',
								'rules' => 'trim|required|greater_than[0]|xss_clean'
							)
					),
					'hep/edit_bilik_asrama' => array
					(
						array
							(
								'field' => 'nobilik',
								'label' => 'No Bilik',
								'rules' => 'trim|required|alpha_dash|xss_clean'
							),
						array
							(
								'field' => 'harga_hari',
								'label' => 'Harga Hari',
								'rules' => 'trim|required|greater_than[-1]|xss_clean'
							),
						array
							(
								'field' => 'harga_bulan',
								'label' => 'Harga Bulan',
								'rules' => 'trim|required|greater_than[-1]|xss_clean'
							),
						array
							(
								'field' => 'max_capacity',
								'label' => 'Max Capacity',
								'rules' => 'trim|required|greater_than[0]|xss_clean'
							)
					),
					'hep/kemaskini_asrama' => array
					(
						array
							(
								'field' => 'namahostel',
								'label' => 'Nama Hostel',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'alamat1',
								'label' => 'Alamat 1',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'alamat2',
								'label' => 'Alamat 2',
								'rules' => 'trim|xss_clean'
							),
						array
							(
								'field' => 'bandar',
								'label' => 'Bandar',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'negeri',
								'label' => 'Negeri',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'kat_jantina',
								'label' => 'Kategori Jantina',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
					),



				);


/* End of file form_validator.php */
/* Location: ./application/config/form_validator.php */
