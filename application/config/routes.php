<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'isms';
$route['404_override'] = 'isms/page_missing';
$route['isms/user_cat/(:num)'] = 'isms/user_cat';
$route['kemasukan/senarai_pemohon/(:num)'] = 'kemasukan/senarai_pemohon';
$route['kemasukan/progmohon/(:num)'] = 'kemasukan/progmohon';
$route['kemasukan/rayuan_permohonan/(:num)'] = 'kemasukan/rayuan_permohonan';
$route['kemasukan/akademik/(:num)'] = 'kemasukan/akademik';
$route['kemasukan/waris/(:num)'] = 'kemasukan/waris';
$route['kemasukan/edit_permohonan/(:num)'] = 'kemasukan/edit_permohonan';
$route['kemasukan/mohon_pelajar/(:num)'] = 'kemasukan/mohon_pelajar';
$route['kewangan/bayar_prmhnn/(:any)'] = 'kewangan/bayar_prmhnn';
$route['kewangan/pmbyrn_resit/(:any)'] = 'kewangan/pmbyrn_resit';
$route['hea/edit/(:any)'] = 'hea/edit';
$route['hea/edit_waris/(:any)'] = 'hea/edit_waris';
$route['hea/edit_akademik/(:any)'] = 'hea/edit_akademik';
$route['hea/urus_subjek/(:any)'] = 'hea/urus_subjek';
$route['hea/daftar_subjek/(:num)'] = 'hea/daftar_subjek';
$route['hea/status_pelajar/(:num)'] = 'hea/status_pelajar';
$route['hea/urus_status/(:any)'] = 'hea/urus_status';
$route['hea/assign_lect/(:num)'] = 'hea/assign_lect';
$route['hea/kemaskini_gred/(:num)'] = 'hea/kemaskini_gred';
$route['hea/cetak_slip_exam/(:num)'] = 'hea/cetak_slip_exam';
$route['hea/edit_hadir/(:num)'] = 'hea/edit_hadir';
$route['perpustakaan/kemas_stud/(:num)'] = 'perpustakaan/kemas_stud';
$route['hep/bilik_asrama/(:any)'] = 'hep/bilik_asrama';
$route['hep/edit_bilik_asrama/(:num)'] = 'hep/edit_bilik_asrama';
$route['hep/kemaskini_asrama/(:any)'] = 'hep/kemaskini_asrama';
$route['hep/daftar_pelajar/(:num)'] = 'hep/daftar_pelajar';



/* End of file routes.php */
/* Location: ./application/config/routes.php */