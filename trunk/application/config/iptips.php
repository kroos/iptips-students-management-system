<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

#############################################################################################
//Website
$config['title'] = 'Sistem Pengurusan Pelajar';

#############################################################################################
$config['insts'] = 'IPTIPs';
$config['instl'] = 'Institut Pengajian Tinggi Islam Perlis';

#############################################################################################
//Mailer Configurations
//pop3 server and port
$config['pop3_server'] = 'pop.gmail.com';
$config['pop3_port'] = 110;

//smtp server
$config['SMTP_auth'] = TRUE;
$config['smtp_server'] = 'smtp.gmail.com';
$config['smtp_port'] = 465;
$config['SMTP_Secure'] = 'ssl';

//email account from sender associated to the pop3 n smtp server settings.
$config['username'] = 'a3outlaw@gmail.com';				//gmail username
$config['password'] = '0162172420';				//gmail password
$config['addreplyto_email'] = 'admin@isms.com';					//this might probably differ from $config['username']. Example, admin@domain.com
$config['addreplyto_name'] = 'Admin';					//example, [GM]Cabal
$config['from'] = 'admin@isms.com';								//this might probably differ from $config['username']. Example, admin@domain.com
$config['from_name'] = 'Admin';							//example [GM]Cabal

#############################################################################################
//kategori jantina untuk asrama
$config['kat_jantina'] = array
								(
									'1' => 'Lelaki',
									'2' => 'Perempuan',
									'3' => 'Campur'
								);

#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################
#############################################################################################

/* End of file iptips.php */
/* Location: ./application/config/iptips.php */
