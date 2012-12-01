<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Select_list extends CI_Controller{
	
	public function json_select_negara($id = false){
		$this->load->model('sel_negara');
		if ($id === FALSE)
        {
        	$data['negara'] = $this->sel_negara->get();
        }else{
        	$data['negara'] = $this->sel_negara->get($id);
        }
        
        foreach($data['negara']->result() as $negara){
        	$json[] = array(
        		'label'=>$negara->namanegara,
        		'value'=>$negara->namanegara,
        		'kod'=>$negara->kodnegara
        	);
        }
        
        $jsdata = json_encode($json);
		echo $jsdata;
	}
	
	//select list negeri
	public function ajax_select_negeri(){
		$this->load->model('sel_negeri');
		if($this->input->post('negara',TRUE)){
			$post = array('kodnegara'=>$this->input->post('negara'));
			$negeri = $this->sel_negeri->get_where($post);
		}
		
		foreach($negeri->result() as $n){
			$optionnegeri[$n->kodnegeri] = $n->namanegeri;
		}
		echo 'haha';
	}
	//select list subjek
	public function ajax_select_subjek(){
		if($this->input->post('level',TRUE)){
			$get = array('level'=>$this->input->post('level'),
				'aktif'=>'1');
			$subjek = $this->sel_subjek->get_where($get);
		}
		foreach($subjek->result() as $sub){
			$optionsubjek[$sub->kodsubjek] = $sub->subjek_MY;
		}
		//echo form_dropdown('subjek[]', $optionsubjek, set_select('subjek'), 'id="subjek"');
		echo 'oi';
	}
	
	public function select_gred(){
		
	}

	public function sel_negara(){

		$array = array();
		if ($_GET['_name'] == 'negara') 
			{
				$y = $this->sel_negara->get();
				foreach($y->result() as $g)
					{
						if ( $_GET['_value'] == $g->kodnegara )//usa
							{
								$x = $this->sel_negeri->get($g->kodnegara);
								foreach($x->result() as $z)
									{
										$array[] = array($z->kodnegeri => $z->namanegeri);
									}
							}
					}
			}
			else
			{
				if ($_GET['_name'] == 'negeri')
					{
						$u = $this->sel_negeri->get();
						foreach ($u->result() as $h)
							{
								if ( $_GET['_value'] == $h->kodnegeri )//New York
									{
										$j = $this->sel_bandar->get($h->kodnegeri);
										foreach($j->result() as $l)
											{
												$array[] = array($l->kodbandar => $l->namabandar);
											}
									}
							}
					}
			}
		echo json_encode( $array );
	}
}