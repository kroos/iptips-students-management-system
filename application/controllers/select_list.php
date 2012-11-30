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
				if ( $_GET['_value'] == 3 )//usa
					{
						$array[] = array('1' => 'New York');
						$array[] = array('2' => 'Montana');	
						$array[] = array('3' => 'Texas');	
					}
					else
					{
						$array[] = array('0' => 'No state');
					}
			}
			else
			{
				if ($_GET['_name'] == 'negeri')
					{
						if ( $_GET['_value'] == 2 )//New York
							{
								$array[] = array('1' => 'New York');
								$array[] = array('2' => 'Another city');	
							}
							else
							{
								$array[] = array('0' => 'No city');
							}
					}
					else
					{
						$array[] = array('1' => 'Data 1');
						$array[] = array('2' => 'Data 2');	
						$array[] = array('3' => 'Data 3');	
					}
			}
				echo json_encode( $array );
	}
}