<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Pendaftaran Kemasukan Pelajar ke Asrama Kediaman</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Cari pelajar melalui nombor matrik<br />
			Klik Cari untuk pencarian semua pelajar</p>
        </div>

        <div class="info"><?=@$info?></div>

		<?=form_open()?>
		<div class="form_settings">
			<p><span><?=form_label('No Matrik', 'matrik')?></span>
			<?=form_input(array('name' => 'matrik', 'value' => set_value('matrik'), 'id' => 'matrik'))?>
			<br /><?=form_error('matrik')?></p>

			<p><span>&nbsp;</span><?=form_submit('cari', 'Cari','class="submit"')?></p>
		</div>
		<?=form_close()?>

		<?if($this->form_validation->run() == TRUE):?>
			<?if($ps->num_rows() > 0):?>
				<div class="demo">
					<table style="width:100%; border-spacing:0;">
						<tr>
							<th>Matrik</th>
							<th>Nama</th>
							<th>Program</th>
							<th>Sesi</th>
							<th>Semester</th>
						</tr>
						<?foreach($ps->result() AS $n):?>
						<?$g = $this->pelajar->GetWhere(array('matrik' => $n->matrik), NULL, NULL)?>
						<?$a = $this->program->GetWhere(array('kod_prog' => $n->kod_prog), NULL, NULL)?>
							<tr>
								<td><?=anchor('hep/daftar_pelajar/'.$n->id, $n->matrik, 'title="Pilih '.$g->row()->nama.'"')?></td>
								<td><?=$g->row()->nama?></td>
								<td><?=$a->row()->namaprog_MY?></td>
								<td><?=$n->sesi?></td>
								<td><?=$n->sem?></td>
							</tr>
						<?endforeach?>
					</table>
				</div>
			<?else:?>
				<p>Tiada rekod dengan carian matrik <b><font color="#FF0000"><?=$this->input->post('matrik', TRUE)?></font></b></p>
			<?endif?>
		<?endif?>
	<?php endblock()?>

<?php end_extend() ?>