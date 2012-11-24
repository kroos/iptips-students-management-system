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
		function view_user_access_level($id_user)
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
											user_dept_func.active = 1 ;
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
	}
?>