<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Maklumat Pelajar</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Masukkan nama atau nombor kad pengenalan atau nombor passport atau nombor matrik untuk pencarian pelajar</p>
        </div>

        <div class="info"><?=@$info?></div>

        <div class="form_settings">
            <?=form_open()?>

			<p><span><?=form_label('Nama / Nombor Kad Pengenalan / No Passport / No Matrik', 'ic')?></span>
			<?=form_input(array('name' => 'ic', 'value' => set_value('ic'), 'id' => 'ic'))?>
			<br /><?=form_error('ic')?></p>

			<p><span>&nbsp;</span><?=form_submit('check','Cari','class="submit"')?></p>
		</div>
		<?=form_close()?>


		<?if($all->num_rows() < 1):?>

			<div class="info">Tiada pelajar dijumpai</div>

		<?else:?>

			<div class="demo">
			<p><?=$paginate?></p>
				<table style="width:100%; border-spacing:0;">
					<tr>
						<th>No Matrik</th>
						<th>Sesi Daftar</th>
						<th>Program</th>
						<th>Nama</th>
						<th>IC</th>
						<th>Passport</th>
						<th>Status</th>
						<th>Warganegara</th>
						<th>Bangsa</th>
						<th>Status Kahwin</th>
						<th>Alamat</th>
						<th>No Tel</th>
						<th>No HP</th>
						<th>Email</th>
					</tr>
					<?foreach($all->result() AS $v):?>
						<tr>
							<td><?=anchor('hea/edit/'.$v->matrik, $v->matrik, array('title' => 'Kemaskini '.$v->matrik))?></td>
							<td><?=$v->sesi_daftar?></td>
							<td><?=$this->program->GetWhere(array('kod_prog' => $this->pel_sem->GetWhere(array('matrik' => $v->matrik, 'sesi' => $v->sesi_daftar), NULL, NULL)->row()->kod_prog), NULL, NULL)->row()->namaprog_MY?></td>
							<td><?=$v->nama?></td>
							<td><?=$v->ic?></td>
							<td><?=$v->passport?></td>
							<td><?=$this->sel_status->GetWhere(array('kodstatus' => $v->status_pljr), NULL, NULL)->row()->status_MY?></td>
							<td><?=$this->sel_negara->get($v->warganegara)->row()->namanegara?></td>
							<td><?=$this->sel_race->get($v->bangsa)->row()->bangsa_MY?></td>
							<td><?=$this->sel_marital->get($v->status_kahwin)->row()->marital_MY?></td>
							<td><?=$v->alamat1.'<br />'.$v->alamat2.'<br />'.$v->poskod.'<br />'.$this->sel_bandar->get(array('kodbandar' => $v->bandar))->row()->namabandar.'<br />'.$this->sel_negeri->get($v->negeri)->row()->namanegeri.'<br />'.$this->sel_negara->get($v->negara)->row()->namanegara?></td>
							<td><?=$v->notel?></td>
							<td><?=$v->nohp?></td>
							<td><?=$v->emel?></td>
						</tr>
					<?endforeach?>
				</table>
			</div>

		<?endif?>

	<?php endblock()?>

<?php end_extend() ?>