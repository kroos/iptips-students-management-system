<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Laporan Asrama Kediaman</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>&nbsp;</p>
        </div>

        <div class="info"><?=@$info?></div>
<?php
foreach($ho->result() AS $ho1)
	{
		$ho2[$ho1->kodhostel] = $ho1->namahostel;
	}
foreach($se->result() AS $v)
	{
		$a[$v->kodsesi] = $v->kodsesi;
	}
?>
		<?=form_open()?>
		<div class="form_settings">
			<p><span><?=form_label('Asrama Kediaman', 'matrik')?></span>
			<?=form_dropdown('matrik', $ho2, set_value('matrik'), 'id="matrik"')?>
			<br /><?=form_error('matrik')?></p>

			<p><span><?=form_label('Sesi', 'sesi')?></span>
			<?=form_dropdown('sesi', $a, set_value('sesi'), 'id="sesi"')?>
			<br /><?=form_error('sesi')?></p>

			<p><span><?=form_label('Bilik Kosong', 'bilik')?></span>
			<?=form_checkbox('bilik', 'bilik', TRUE, 'id="bilik"');?>
			<br /><?=form_error('bilik')?></p>

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
							<?$v = $this->pel_dafhostel->GetWhere(array('matrik' => $n->matrik, 'sesi' => $es, 'tarikh_keluar IS NULL' => NULL), NULL, NULL)?>
							<?//=$this->db->last_query().' = query<br />'?>
							<?//=$v->num_rows().' = num_rows<br />'?>
							<?if($v->num_rows() < 1):?>
							<?$g = $this->pelajar->GetWhere(array('matrik' => $n->matrik), NULL, NULL)?>
							<?$a = $this->program->GetWhere(array('kod_prog' => $n->kod_prog), NULL, NULL)?>
								<tr>
									<td><?=anchor('hep/daftar_pelajar/'.$n->id, $n->matrik, 'title="Pilih '.$g->row()->nama.'"')?></td>
									<td><?=$g->row()->nama?></td>
									<td><?=$a->row()->namaprog_MY?></td>
									<td><?=$n->sesi?></td>
									<td><?=$n->sem?></td>
								</tr>
							<?endif?>
						<?endforeach?>
					</table>
				</div>
			<?else:?>
				<p>Tiada rekod dengan carian matrik <b><font color="#FF0000"><?=$this->input->post('matrik', TRUE)?></font></b></p>
			<?endif?>
		<?endif?>
	<?php endblock()?>

<?php end_extend() ?>