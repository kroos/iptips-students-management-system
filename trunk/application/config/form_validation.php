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
								'label' => 'Username',
								'rules' => 'trim|required|min_length[6]|max_length[12]|xss_clean'
							),
						array
							(
								'field' => 'password',
								'label' => 'Password',
								'rules' => 'trim|required|min_length[6]|max_length[10]|xss_clean'
							),
					),
					'isms/forgot_password' => array
					( 
						array
							(
								'field' => 'username',
								'label' => 'Username',
								'rules' => 'trim|required|min_length[6]|max_length[12]|xss_clean'
							),
						array
							(
								'field' => 'email',
								'label' => 'Email',
								'rules' => 'trim|required|valid_email|min_length[10]|max_length[50]|xss_clean'
							),
					),
				);


/* End of file form_validator.php */
/* Location: ./application/config/form_validator.php */
