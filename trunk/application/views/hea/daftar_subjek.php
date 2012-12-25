<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Kemaskini Matapelajaran</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Masukkan nombor matrik untuk pencarian pelajar</p>
        </div>

        <div class="info"><?=@$info?></div>

        <div class="form_settings">
            <?=form_open()?>

			<p><span><?=form_label('No Matrik', 'ic')?></span>
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
						<th>IC / Passport</th>
						<th>Status</th>
					</tr>
					<?foreach($all->result() AS $v):?>
						<tr>
							<td><?=anchor('hea/urus_subjek/'.$v->matrik, $v->matrik, array('title' => 'Kemaskini '.$v->matrik))?></td>
							<td><?=$v->sesi_daftar?></td>
							<td><?=$this->program->GetWhere(array('kod_prog' => $this->pel_sem->GetWhere(array('matrik' => $v->matrik, 'sesi' => $v->sesi_daftar), NULL, NULL)->row()->kod_prog), NULL, NULL)->row()->namaprog_MY?></td>
							<td><?=$v->nama?></td>
							<td><?=$v->ic?> / <?=$v->passport?></td>
							<td><?=$this->sel_status->GetWhere(array('kodstatus' => $v->status_pljr), NULL, NULL)->row()->status_MY?></td>
						</tr>
					<?endforeach?>
				</table>
			</div>

		<?endif?>

	<?php endblock()?>

<?php end_extend() ?>