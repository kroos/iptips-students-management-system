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
		$title = '<style>'.file_get_contents(base_url()."css/surat.css").'</style>
			<table><tr>
				<td id="header_text" width="500px" ><h2 align="center">INSTITUT PENGAJIAN TINGGI PERLIS</h2>
				<h3 align="center">Islamic Institute of Higher Education Perlis</h3>
				<p class="kecik senget" align="center">(Milik PenuhYayasan Islam Perlis)</p></td>
				</tr>
			</table>
			<p class="kecik kaler">378891-W</p>';
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
		$footer = '<p align="center">Ini adalah cetakan komputer, tandatangan tidak diperlukan</p>';
		$this->writeHTML($footer, true, false, true, false, '');
		// Page number		
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}


/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */