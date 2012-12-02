<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sel_subjek extends CI_Model 
	{
		function __construct()
		{
			parent::__construct();
		}
#############################################################################################################################
//CRUD for user_data
	
//SELECT		
			function GetWhere($where)
				{
					return $this->db->get_where('sel_subjek', $where);
				}

			function GetAll()
				{
					return $this->db->get('sel_subjek');
				}
	}