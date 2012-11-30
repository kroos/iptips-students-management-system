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