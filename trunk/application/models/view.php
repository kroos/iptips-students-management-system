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

	}
?>