<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Penugasan Pensyarah</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Pilih matapelajaran dan sesi akademik untuk diberikan kepada pensyarah. Fungsi pemarkahan dan kemaskini markah akan diberi secara auto kepada pensyarah berkenaan.</p>
        </div>
<?php
foreach($su->result() AS $g)
	{
		$stat[$g->kodsubjek] = $g->kodsubjek.'&nbsp;|&nbsp;'.$g->namasubjek_MY.'&nbsp;|&nbsp;'.$g->kredit.' Jam Kredit';
	}
foreach($se->result() AS $u)
	{
		$ses[$u->kodsesi] = $u->kodsesi;
	}
?>
        <div class="info"><?=@$info?></div>

        <div class="form_settings">
            <?=form_open()?>

			<p><span><?=form_label('Subjek', 'kodsubjek')?></span>
			<?=form_dropdown('kodsubjek', $stat, set_value('kodsubjek'), 'id="kodsubjek"')?>
			<br /><?=form_error('kodsubjek')?></p>

			<p><span><?=form_label('Sesi Akademik', 'sesi')?></span>
			<?=form_dropdown('sesi', $ses, set_value('sesi'), 'id="sesi"')?>
			<br /><?=form_error('sesi')?></p>

			<p><span>&nbsp;</span><?=form_submit('save', 'Simpan','class="submit"')?></p>
		</div>
		<?=form_close()?>

		<?if($all->num_rows() < 1):?>

			<div class="info">Tiada subjek yang diajar</div>

		<?else:?>

			<div class="demo">
				<table style="width:100%; border-spacing:0;">
					<tr>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Jawatan</th>
						<th>Subjek</th>
					</tr>

					<?foreach($all->result() AS $v):?>
						<tr>
							<td><?=$this->user_data->GetWhere(array('id' => $this->uri->segment(3, 0)), NULL, NULL)->row()->name?></td>
							<td colspan="2">

								<table style="width:100%; border-spacing:0;">
									<?$r = $this->user_dept->GetWhere(array('id_user_data' => $v->id), NULL, NULL)?>
									<?foreach ($r->result() AS $j):?>
										<tr>
											<td><?=$this->user_department->GetWhere(array('id' => $j->id_user_department), NULL, NULL)->row()->dept?></td>
											<td>

												<table style="width:100%; border-spacing:0;">
													<?$l = $this->user_dept_jaw->user_dept_jaw($v->id, $j->id_user_department)?>
													<?foreach($l->result() AS $b):?>
														<tr>
															<td><?=$this->user_jawatan->GetWhere(array('id' => $b->id_user_jawatan), NULL, NULL)->row()->jawatan?></td>
														</tr>
													<?endforeach?>
												</table>

											</td>
										</tr>
									<?endforeach?>
								</table>

							</td>
							<td>

								<?$pr = $this->lect_ajar->GetWhere(array('nostaf' => $this->uri->segment(3, 0), 'aktif' => 1), NULL, NULL)?>
								<?if($pr->num_rows() < 1):?>
									<div class="info">Tiada subjek yang diajar</div>
								<?else:?>
									<table style="width:100%; border-spacing:0;">
										<?foreach($pr->result() AS $b):?>
											<tr>
												<td><?=$b->kodsubjek.'&nbsp;'.$this->subjek->GetWhere(array('kodsubjek' => $b->kodsubjek))->row()->namasubjek_MY?></td>
											</tr>
										<?endforeach?>
									</table>
								<?endif?>

							</td>

						</tr>
					<?endforeach?>
				</table>
			</div>
		<?endif?>

	<?php endblock()?>

<?php end_extend() ?>