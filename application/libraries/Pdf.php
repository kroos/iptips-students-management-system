<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/Tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
	
	//Page header
	public function Header() {
		// Logo
		//$image_file = K_PATH_IMAGES.'logo_example.jpg';
		$image_file = 'images/IPTIPs_logo.png';
		// Set font
		$this->SetFont('helvetica', 'B', 11);
		// Title
		$title = '<table><tr><td><div id="logo"><image src="images/IPTIPs_logo.png" width="100px" height="100px" /></div></td>
			<td><div id="header_text"><h1>Institusi Pengajian Tinggi Perlis</h1>
			<h2>Islamic Institute of Higher Education Perlis</h3>
			<p><i>(Milik PenuhYayasan Islam Perlis)</i></p></div></td></tr></table>';
		//$this->Cell(0, 15, $title, 0, false, 'C', 0, '', 0, false, 'M', 'M');
		$this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		$this->writeHTML($title, true, false, true, false, '');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}


/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */