<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Penugasan Pensyarah</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Masukkan nama staff / pensyarah yang ingin di assign kan kepada subjek</p>
        </div>

        <div class="info"><?=@$info?></div>

        <div class="form_settings">
            <?=form_open()?>

			<p><span><?=form_label('Nama Staff', 'ic')?></span>
			<?=form_input(array('name' => 'ic', 'value' => set_value('ic'), 'id' => 'ic'))?>
			<br /><?=form_error('ic')?></p>

			<p><span>&nbsp;</span><?=form_submit('cari', 'Cari','class="submit"')?></p>
		</div>
		<?=form_close()?>

		<?if($this->form_validation->run() == TRUE):?>
		<?if($all->num_rows() < 1):?>

			<div class="info">Tiada staff dijumpai</div>

		<?else:?>

			<div class="demo">
				<table style="width:100%; border-spacing:0;">
					<tr>
						<th>Nama</th>
						<th>IC</th>
						<th>Telefon</th>
						<th>Email</th>
						<th>Jabatan</th>
						<th>Jawatan</th>
					</tr>
					<?foreach($all->result() AS $v):?>
						<tr>
							<td><?=anchor('hea/assign_lect/'.$v->id, $v->name, array('title' => 'Kemaskini '.$v->name))?></td>
							<td><?=$v->ic?></td>
							<td><?=$v->cellphone?></td>
							<td><?=$v->email?></td>
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

						</tr>
					<?endforeach?>
				</table>
			</div>
		<?endif?>
		<?endif?>

	<?php endblock()?>

<?php end_extend() ?>