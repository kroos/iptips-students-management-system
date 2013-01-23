<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//only select for view

//SELECT
		function view_user_access_level($id_user, $ctrlr, $func)
			{
				return $this->db->query("
											select 
											`user_dept_func`.`id_user_data` AS `id_user_data`,
											`user_data`.`username` AS `username`,
											`user_dept_func`.`id_user_department` AS `id_user_department`,
											`user_department`.`dept_ctrlr` AS `dept_ctrlr`,
											`user_department`.`dept` AS `dept`,
											`user_dept_func`.`id_user_function` AS `id_user_function`,
											`user_function`.`function` AS `function`,
											`user_function`.`remarks` AS `remarks`,
											`user_dept_func`.`active` AS `active`
											from
											(((`user_data`
											inner join `user_department`)
											inner join `user_dept_func` on(((`user_dept_func`.`id_user_data` = `user_data`.`id`) and (`user_dept_func`.`id_user_department` = `user_department`.`id`))))
											inner join `user_function` on((`user_dept_func`.`id_user_function` = `user_function`.`id`)))
											WHERE
											user_dept_func.id_user_data = '$id_user' AND
											user_dept_func.active = 1  AND
											user_department.dept_ctrlr = '$ctrlr' AND
											user_function.`function` = '$func';
										");
			}

		function view_department_jawatan()
			{
				return $this->db-> query('
											select `dept_jaw`.`id_user_department` AS `id_user_department`,
											`user_department`.`dept_ctrlr` AS `dept_ctrlr`,
											`user_department`.`dept` AS `dept`,
											`dept_jaw`.`id_jawatan` AS `id_jawatan`,
											`user_jawatan`.`jawatan` AS `jawatan`
											from
											((`dept_jaw`
											inner join `user_jawatan` on((`dept_jaw`.`id_jawatan` = `user_jawatan`.`id`)))
											inner join `user_department` on((`user_department`.`id` = `dept_jaw`.`id_user_department`)))
											order by `dept_jaw`.`id_user_department`,
											`dept_jaw`.`id_jawatan`
										');
			}
			
		function view_dept_jaw_search($id_user_department)
			{
				return $this->db->query("
											select
											`dept_jaw`.`id_user_department` AS `id_user_department`,
											`user_department`.`dept_ctrlr` AS `dept_ctrlr`,
											`user_department`.`dept` AS `dept`,
											`dept_jaw`.`id_jawatan` AS `id_jawatan`,
											`user_jawatan`.`jawatan` AS `jawatan`
											from
											((`dept_jaw` join `user_jawatan` on((`dept_jaw`.`id_jawatan` = `user_jawatan`.`id`)))
											inner join `user_department` on((`user_department`.`id` = `dept_jaw`.`id_user_department`)))
											WHERE
											dept_jaw.id_user_department = $id_user_department
											order by `dept_jaw`.`id_user_department`,`dept_jaw`.`id_jawatan`
										");
			}

		function view_user_access($id_user)
			{
				return $this->db->query("
											select
											`user_dept_func`.`id` AS `id`,
											`user_dept_func`.`id_user_data` AS `id_user_data`,
											`user_data`.`name` AS `name`,
											`user_dept_func`.`id_user_department` AS `id_user_department`,
											`user_department`.`dept_ctrlr` AS `dept_ctrlr`,
											`user_department`.`dept` AS `dept`,
											`user_dept_func`.`id_user_function` AS `id_user_function`,
											`user_function`.`function` AS `function`,
											`user_function`.`remarks` AS `remarks`,
											`user_dept_func`.`active` AS `active`
											from
											(((`user_data` 
											inner join `user_department`)
											inner join `user_dept_func` on(((`user_dept_func`.`id_user_data` = `user_data`.`id`) and (`user_dept_func`.`id_user_department` = `user_department`.`id`))))
											inner join `user_function` on((`user_dept_func`.`id_user_function` = `user_function`.`id`)))
											WHERE
											user_dept_func.id_user_data = $id_user
											ORDER BY
											id_user_department ASC,
											id_user_function ASC
										");
			}

		function view_user_dept_jaw()
			{
				return $this->db->query("
											select
											`user_dept_jaw`.`id` AS `id`,
											`user_dept_jaw`.`id_user_data` AS `id_user_data`,
											`user_data`.`name` AS `name`,
											`user_dept_jaw`.`id_user_department` AS `id_user_department`,
											`user_department`.`dept_ctrlr` AS `dept_ctrlr`,
											`user_department`.`dept` AS `dept`,
											`user_dept_jaw`.`id_user_jawatan` AS `id_user_jawatan`,
											`user_jawatan`.`jawatan` AS `jawatan`,
											`user_jawatan`.`remarks` AS `remarks`
											from
											(((`user_dept_jaw` join `user_data` on((`user_dept_jaw`.`id_user_data` = `user_data`.`id`)))
											inner join `user_department` on((`user_dept_jaw`.`id_user_department` = `user_department`.`id`)))
											inner join `user_jawatan` on((`user_dept_jaw`.`id_user_jawatan` = `user_jawatan`.`id`)))
											ORDER BY
											`name` ASC,
											id_user_department ASC,
											id_user_jawatan ASC
										");
			}

		function view_user_dept_jaw_page($num, $offset)
			{
				return $this->db->query("
											select
											`user_dept_jaw`.`id` AS `id`,
											`user_dept_jaw`.`id_user_data` AS `id_user_data`,
											`user_data`.`name` AS `name`,
											`user_dept_jaw`.`id_user_department` AS `id_user_department`,
											`user_department`.`dept_ctrlr` AS `dept_ctrlr`,
											`user_department`.`dept` AS `dept`,
											`user_dept_jaw`.`id_user_jawatan` AS `id_user_jawatan`,
											`user_jawatan`.`jawatan` AS `jawatan`,
											`user_jawatan`.`remarks` AS `remarks`
											from
											(((`user_dept_jaw` join `user_data` on((`user_dept_jaw`.`id_user_data` = `user_data`.`id`)))
											inner join `user_department` on((`user_dept_jaw`.`id_user_department` = `user_department`.`id`)))
											inner join `user_jawatan` on((`user_dept_jaw`.`id_user_jawatan` = `user_jawatan`.`id`)))
											ORDER BY
											`name` ASC,
											id_user_department ASC,
											id_user_jawatan ASC
											LIMIT $offset, $num
										");
			}

		function menu($id_user_department)
			{
				return $this->db->query("
											SELECT
											`dept_func`.`id_user_department` AS `id_user_department`,
											`user_department`.`dept_ctrlr` AS `dept_ctrlr`,
											`user_department`.`dept` AS `dept`,
											`dept_func`.`id_user_function` AS `id_user_function`,
											`user_function`.`function` AS `function`,
											`user_function`.`remarks` AS `remarks`,
											`user_function`.`menu` AS `menu`,
											`user_function`.`menu_display` AS `menu_display`,
											`user_function`.`posisi` AS `posisi`
											from ((`dept_func`
											inner join `user_department` on((`dept_func`.`id_user_department` = `user_department`.`id`)))
											inner join `user_function` on((`dept_func`.`id_user_function` = `user_function`.`id`)))
											WHERE
											dept_func.id_user_department > 1 AND
											user_function.menu_display = 1 AND
											dept_func.id_user_function > 1 AND
											dept_func.id_user_department = $id_user_department
											order by `user_function`.`posisi`
										");
			}

		function menu1($id_user_department)
			{
				return $this->db->query("
											SELECT
											`dept_func`.`id_user_department` AS `id_user_department`,
											`user_department`.`dept_ctrlr` AS `dept_ctrlr`,
											`user_department`.`dept` AS `dept`,
											`dept_func`.`id_user_function` AS `id_user_function`,
											`user_function`.`function` AS `function`,
											`user_function`.`remarks` AS `remarks`,
											`user_function`.`menu` AS `menu`,
											`user_function`.`menu_display` AS `menu_display`,
											`user_function`.`posisi` AS `posisi`
											from ((`dept_func`
											inner join `user_department` on((`dept_func`.`id_user_department` = `user_department`.`id`)))
											inner join `user_function` on((`dept_func`.`id_user_function` = `user_function`.`id`)))
											WHERE
											dept_func.id_user_department > 1 AND
											dept_func.id_user_function > 1 AND
											dept_func.id_user_department = $id_user_department
											order by `user_function`.`posisi`
										");
			}

		function view_app_list()
			{
				return $this->db->query("
											SELECT
											`app_pelajar`.`id` AS `id`,
											`app_pelajar`.`nama` AS `nama`,
											`sel_negara`.`namanegara` AS `namanegara`,
											`app_akademik`.`institusi` AS `institusi`,
											`app_akademik`.`tahun` AS `tahun`,
											`sel_level`.`tahap_MY` AS `tahap_MY`,
											`sel_subjek`.`subjek_MY` AS `subjek_MY`,
											`app_subjek_akademik`.`gred` AS `gred`,
											`program`.`namaprog_MY` AS `namaprog_MY`,
											`app_progmohon`.`pilihan` AS `pilihan`,
											`app_progmohon`.`catatan` AS `catatan`,
											`sel_statusmohon`.`status_MY` AS `status_MY`
											FROM ((((((((`app_pelajar`
											LEFT JOIN `app_akademik` on((`app_pelajar`.`id` = `app_akademik`.`id_mohon`)))
											LEFT JOIN `app_progmohon` on((`app_pelajar`.`id` = `app_progmohon`.`id_mohon`)))
											LEFT JOIN `app_subjek_akademik` on((`app_subjek_akademik`.`akademik_id` = `app_akademik`.`id`)))
											LEFT JOIN `sel_level` on((`sel_level`.`kodtahap` = `app_akademik`.`level`)))
											LEFT JOIN `sel_subjek` on((`sel_subjek`.`kodsubjek` = `app_subjek_akademik`.`subjek`)))
											LEFT JOIN `program` on((`program`.`kod_prog` = `app_progmohon`.`kod_prog`)))
											LEFT JOIN `sel_statusmohon` on((`sel_statusmohon`.`kodstatus` = `app_progmohon`.`status_mohon`)))
											LEFT JOIN `sel_negara` on((`sel_negara`.`kodnegara` = `app_pelajar`.`warganegara`)))
											WHERE
											(`app_progmohon`.`status_mohon` = 'DIP')
										");
			}

		function view_prog_subj($kod_prog)
			{
				return $this->db->query("
											SELECT
											`subjek`.`namasubjek_MY` AS `namasubjek_MY`,
											`prog_subjek`.`kod_prog` AS `kod_prog`,
											`program`.`namaprog_MY` AS `namaprog_MY`,
											`prog_subjek`.`sem` AS `sem`,`prog_subjek`.`kodsubjek`
											AS `kodsubjek`,`subjek`.`kredit` AS `kredit`
											FROM ((`prog_subjek`
											INNER JOIN `program` ON((`prog_subjek`.`kod_prog` = `program`.`kod_prog`))) 
											INNER JOIN `subjek` on((`prog_subjek`.`kodsubjek` = `subjek`.`kodsubjek`)))
											WHERE
											prog_subjek.kod_prog = '$kod_prog'
											ORDER BY
											sem ASC,
											kredit ASC
										");
			}

		function view_prog_subj1($kod_prog, $sem)
			{
				return $this->db->query("
											SELECT
											`subjek`.`namasubjek_MY` AS `namasubjek_MY`,
											`prog_subjek`.`kod_prog` AS `kod_prog`,
											`program`.`namaprog_MY` AS `namaprog_MY`,
											`prog_subjek`.`sem` AS `sem`,`prog_subjek`.`kodsubjek`
											AS `kodsubjek`,`subjek`.`kredit` AS `kredit`
											FROM ((`prog_subjek`
											INNER JOIN `program` ON((`prog_subjek`.`kod_prog` = `program`.`kod_prog`))) 
											INNER JOIN `subjek` on((`prog_subjek`.`kodsubjek` = `subjek`.`kodsubjek`)))
											WHERE
											prog_subjek.kod_prog = '$kod_prog' AND
											prog_subjek.sem = '$sem'
											ORDER BY
											sem ASC,
											kredit ASC
										");
			}

		function view_pel_daf_sub_hadir($matrik, $kodsubjek, $sem)
			{
				return $this->db->query("
											SELECT
											pel_daftarsubjek.matrik,
											pel_daftarsubjek.kodsubjek,
											pel_daftarsubjek.sem,
											pel_hadir.id_daftarsubjek
											FROM
											pel_daftarsubjek
											INNER JOIN pel_hadir ON pel_daftarsubjek.id = pel_hadir.id_daftarsubjek
											WHERE
											pel_daftarsubjek.matrik = '$matrik' AND
											pel_daftarsubjek.kodsubjek = '$kodsubjek' AND
											pel_daftarsubjek.sem = '$sem'
										");
			}
	}
?>