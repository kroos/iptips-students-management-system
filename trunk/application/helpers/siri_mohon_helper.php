<?php
#############################################################################################################################
///*
//digunakan untuk masukkan app_progmohon.siri_mohon yang diambil drpd sesi_intake.kodmula & sesi_intake.siri
function siri_mohon($kodmula, $siri)
	{
		$zerofill   = 8 - strlen($kodmula);
		$siri_zero  = str_pad($siri, $zerofill, 0, STR_PAD_LEFT);
		$siri_mohon = $kodmula.$siri_zero;

		return $siri_mohon;
	}
//*/
#############################################################################################################################

?>