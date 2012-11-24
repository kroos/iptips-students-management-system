<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_pelajar extends CI_Model			//aku buang perkataan model sbb benda ni dah model dah (App_pelajar_model)...kurangkan byk typing sebanyak mungkin.....hehehehe
{
	/*	sorry, aku terpaksa comment out yg ni sbb nak tunjuk kat hang dan mintak hang buat perbandingan.
	public function _construct()
		{
			$this->load->database();		x perlu sbb aku dah load database dalam ./application/config/autoload.php
											lgpun command salah bro.....
		}
	*/

	//ingat command ni bro....
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
	//select
	public function get_app_pelajar($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('app_pelajar');
            return $query->result_array();
        }
        $query = $this->db->get_where('app_pelajar', array('id'=>$id));
        return $query->row_array();        
    }

	//ini function yang digunakan dalam "pendaftar/senarai_pemohon"
	/*	bandingkan dgn yg aku buat kat bwh
    public function seacrh_app($nama = NULL, $ic = NULL)
		{
			if($nama == NULL && $ic == NULL)
				{
					return $this->get_app_pelajar();
				}
			$sql = "select * from app_pelajar where nama like '%$nama%' or ic = ? or passport = ?";
			$query = $this->db->query($sql,array($nama, $nama, $nama));
			return $query->result_array();
		}
	*/

	//ini function yang digunakan dalam "pendaftar/senarai_pemohon"
    public function seacrh_app($nama)																	//kalau dari form, hang hanya supply 1 input sj, jd apa guna var $ic? lihat function yg hang buat kat atas....lg 1 dr form_validation.php, var $nama akan sentiasa ada... jd x timbul langsung [ if($nama == NULL) ]
		{
			//if($nama == NULL)																			//aku delete $ic sbb arguments aku sama dgn atas...kalau dalam form_validation.php ada filter "required", so apa guna kalau $nama == NULL ?
			//	{
					//return $this->get_app_pelajar();													//ada tertinggal sikit dan CI xdak function ni [ get_app_pelajar() ]....check kat bawah
					return $this->db->where(array('nama' => $nama))->get('app_pelajar');				//equivalent to "select * from app_pelajar where nama = $nama"
					//atau boleh ditulis mcm kat bwh
					//return $this->db->get_where('app_pelajar', array('nama' => $nama));
					//hanya salah 1 digunakan, bukan 2 2 serentak....payah nnt...
			//	}
			//$sql = "select * from app_pelajar where nama like '%$nama%' or ic = ? or passport = ?";	//sql ni dah x relevent sbb
			//$query = $this->db->query($sql,array($nama, $nama, $nama));								//irrelevent
			//return $query->result_array();															//irrelevent too...

			//apa sbb aku pilih sql syntax sql mcm kat atas tu...sbb senang nak manipulate di controller dan jugak view...

			//	seacrh_app($nama) = $this->db->get_where('app_pelajar', array('nama' => $nama))
			//	$rs = mysql_query ("select * from app_pelajar where nama = $nama")

			//seacrh_app($nama)->num_rows() <== akan dapat bilangan rows, equivalent dgn syntax kat bwh
			//$rows = mysql_num_rows($rs)
			
			//jadi di model ni, lbh baik ltk sql sebasic mungkin, sbb nnt senang nak manipulate data di controller dan jugak view....check balik view dan jugak controller yg telah hang baca tadi....
		}
















		public function get_where($where = array()){
    	$query = $this->db->get_where('app_pelajar', $where);
        return $query->row_array();
    }
    
    //insert
    public function set_app_pelajar(){
        $this->load->helper('url');
	
	//$slug = url_title($this->input->post('userid'), 'dash', TRUE);
	
		$data = array(
//	            'matrik' => $this->input->post('matrik'),
	            'nama' => $this->input->post('nama'),
	            'ic' => $this->input->post('ic'),
	            'passport' => $this->input->post('passport'),
	            'dt_lahir' => $this->input->post('dt_lahir'),
	            'tempat_lahir' => $this->input->post('tempat_lahir'),
	            'status_warga' => $this->input->post('status_warga'),
	            'warganegara' => $this->input->post('warganegara'),
	            'bangsa' => $this->input->post('bangsa'),
	            'jantina' => $this->input->post('bangsa'),
	            'status_kahwin' => $this->input->post('status_kahwin'),
	            'alamat1' => $this->input->post('alamat1'),
	            'alamat2' => $this->input->post('alamat2'),
	            'poskod' => $this->input->post('poskod'),
	            'bandar' => $this->input->post('bandar'),
	            'negeri' => $this->input->post('negeri'),
	            'negara' => $this->input->post('negara'),
	            'id_add' => $this->input->post('id_add'),
	            'dt_add' => $this->input->post('dt_add'),
	            'id_edit' => $this->input->post('id_edit'),
	            'dt_edit' => $this->input->post('dt_edit'),
	            'layak' => $this->input->post('layak'),
	            'id_transfer' => $this->input->post('id_transfer'),
	            'dt_transfer' => $this->input->post('dt_transfer')
		);
		
		return $this->db->insert('app_pelajar', $data);
    }
    
    //update
    public function edit_app_pelajar(){
    	$data = array(
	            'id' => $this->input->post('id'),
	            'matrik' => $this->input->post('matrik'),
	            'nama' => $this->input->post('nama'),
	            'ic' => $this->input->post('ic'),
	            'passport' => $this->input->post('passport'),
	            'dt_lahir' => $this->input->post('dt_lahir'),
	            'tempat_lahir' => $this->input->post('tempat_lahir'),
	            'status_warga' => $this->input->post('status_warga'),
	            'warganegara' => $this->input->post('warganegara'),
	            'bangsa' => $this->input->post('bangsa'),
	            'jantina' => $this->input->post('bangsa'),
	            'status_kahwin' => $this->input->post('status_kahwin'),
	            'alamat1' => $this->input->post('alamat1'),
	            'alamat2' => $this->input->post('alamat2'),
	            'poskod' => $this->input->post('poskod'),
	            'bandar' => $this->input->post('bandar'),
	            'negeri' => $this->input->post('negeri'),
	            'negara' => $this->input->post('negara'),
	            'id_add' => $this->input->post('id_add'),
	            'dt_add' => $this->input->post('dt_add'),
	            'id_edit' => $this->input->post('id_edit'),
	            'dt_edit' => $this->input->post('dt_edit'),
	            'layak' => $this->input->post('layak'),
	            'id_transfer' => $this->input->post('id_transfer'),
	            'dt_transfer' => $this->input->post('dt_transfer')
		);
		
		return $this->db->update('app_pelajar', $data, $data['id']);
    }
}
?>
