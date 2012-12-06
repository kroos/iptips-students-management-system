<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Month extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for view table
//saja nak bg suruh mysql kira masa... senang sikit...
//SELECT
		//cari berapa bulan antara 2 tarikh
		function month($date_start, $date_end)
			{
				//must add 1 to the month
				$y = $this->db->query("SELECT PERIOD_DIFF(EXTRACT(YEAR_MONTH FROM '$date_end'), EXTRACT(YEAR_MONTH FROM '$date_start')) AS month");
				return $y;
			}

		//carian berapa bulan dan berapa hari dari tarikh tertentu
		function month_day($date_start, $month, $day)
			{
				return $this->db->query("SELECT DATE_ADD(DATE_ADD('$date_start', interval $month MONTH), interval $day day) AS nmp");
			}

		//tarikh akhir dari tarikh tertentu
		function month_end($date)
			{
				return $this->db->query("SELECT LAST_DAY('$date') AS me");
			}

		//tarikh awal dari tarikh tertentu
		function month_start($date)
			{
				return $this->db->query("SELECT DATE_ADD(LAST_DAY(DATE_SUB('$date', interval 1 month)), interval 1 day) AS ms");
			}

		//tarikh apa sblm dari berapa hari dari tatrikh tertentu
		function bftd($date, $day)
			{
				return $this->db->query("SELECT DATE_SUB('$date', interval $day day) AS bftd");
			}

		function aftd($date, $day)
			{
				return $this->db->query("SELECT DATE_ADD('$date', interval $day day) AS aftd");
			}
	}
?>