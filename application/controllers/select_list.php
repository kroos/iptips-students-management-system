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
	
	//ajax select list negeri
	public function ajax_select_negeri(){
		$this->load->model('sel_negeri');
		if($this->input->post('negara',TRUE)){
			foreach($this->input->post() as $key => $val){
				$$key = $val;
			}
			$post = array('kodnegara'=>$this->input->post('negara'));
			$negeris = $this->sel_negeri->get_where($post);
		}
		
		if($negeris->num_rows()>0){
			foreach($negeris->result() as $n){
				$optionnegeri[$n->kodnegeri] = $n->namanegeri;
				if($n->kodnegeri == @$negeri){
					$selected = 'selected="selected"';
				}else
				{
					$selected = '';
				}
				echo '<option value="'.$n->kodnegeri.'" '.$selected.'">'.$n->namanegeri.'</option>';
			}
		}else{
			echo '<option value="">-tiada-</option>';
		}
		//echo 'haha';
	}
	
	//select list bandar
	public function ajax_select_bandar()
		{
			$this->load->model('sel_bandar');
			if($this->input->post('negara', TRUE))
				{
					foreach($this->input->post() as $key => $val)
						{
							$$key = $val;
						}
					$post = array('kodnegara' => $this->input->post('negara'), 'kodnegeri' => $negeri);
					$bandars = $this->sel_bandar->get($post);
				}
			if($bandars->num_rows()>0){
				foreach($bandars->result() as $n)
				{
					if(!strcmp($n->kodbandar, @$bandar))
						{
							$selected = 'selected="selected"';
						}
						else
						{
							$selected = '';
						}
					echo '<option value="'.$n->kodbandar.'" '.$selected.'">'.$n->namabandar.'</option>';
				}
			}else{
				echo '<option value="">-tiada-</option>';
			}
		}
	
	//select list subjek
	public function ajax_select_subjek()
	{
		if($this->input->post('level',TRUE))
		{
			$get = array('level'=>$this->input->post('level'), 'aktif'=>'1');
		}
		else
		{
			$get = array('aktif'=>'1');
		}
		$subjek = $this->sel_subjek->GetWhere($get);
		foreach($subjek->result() as $sub)
		{
			$optionsubjek[$sub->kodsubjek] = $sub->subjek_MY;
			echo '<option value="'.$sub->kodsubjek.'">'.$sub->subjek_MY.'</option>';
		}
	}
	
	//ajax select gred
	public function ajax_select_gred(){
		if($this->input->post('level',TRUE)){
			$get = array('level'=>$this->input->post('level'));
			if($this->input->post('level')=='SPM' && $this->input->post('tahun',TRUE)){
				$year = $this->input->post('tahun');
				$this->load->model('spm_gred_year');	
				$kodgred = $this->spm_gred_year->get_custom_where("thn_mula <= '$year' AND thn_akhir >= '$year'");
				$kod = $kodgred->row();
				$get['y_gred'] = $kod->kod_gred;
			}
			$gred = $this->sel_gred->get_where($get);
		}else{
			$gred = $this->sel_gred->get();
		}
		foreach($gred->result() as $grad){
			//$optiongred[$sub->kodsubjek] = $sub->subjek_MY;
			echo '<option value="'.$grad->nilaigred.'">'.$grad->gred.'</option>';
		}
	}
	
	public function sel_subjek()
		{
				$array = array();
				if ($_GET['_name'] == 'level') 
					{
						$rt = $this->sel_level->GetAll();
						foreach($rt->result() as $y)
							{
								if ( $_GET['_value'] == $y->kodtahap )
									{
										$th = $this->sel_subjek->GetWhere(array('level' => $y->kodtahap, 'aktif' => 1));
										foreach($th->result() as $b)
											{
												$array[] = array($b->kodsubjek => $b->subjek_MY);
											}
									}
							}
					}
				echo json_encode( $array );
		}

	public function sel_negara()
	{
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
	
	public function select_level(){
		$this->load->model('sel_level');
		$option = '';
		$level = $this->sel_level->get_where(array('aktif'=>'1'));
		foreach($level->result() as $l){
			$optionLevel[$l->kodtahap] = $l->tahap_MY;
			$option .= '<option value="'.$l->kodtahap.'"/>'.$l->tahap_MY.'</option>';
		}
		//echo form_dropdown('level', $option, 'id="level"');
		echo '<select>'.$option.'</select>';
		return $optionLevel;
	}

	//select sem
	public function select_sem()
	{
		$this->load->model('prog_subjek');
		$this->load->model('subjek');
		$option = '';
		$level = $this->prog_subjek->GetAll(NULL, NULL);
		foreach($level->result() as $l)
		{
			$optionLevel[$l->kodsubjek] = $this->subjek->GetWhere(array('kodsubjek' => $l->kodsubjek))->row()->namasubjek_MY;
			$option .= '<option value="'.$l->kodsubjek.'"/>'.$this->subjek->GetWhere(array('kodsubjek' => $l->kodsubjek))->row()->namasubjek_MY.'</option>';
		}
		//echo form_dropdown('level', $option, 'id="level"');
		echo '<select>'.$option.'</select>';
		return $optionLevel;
	}

}