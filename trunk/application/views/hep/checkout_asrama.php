<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Daftar Keluar Pelajar ke Asrama Kediaman</h2>
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
							<th>Asrama</th>
							<th>Bilik</th>
							<th>Sesi</th>
							<th>Tarikh Masuk</th>
						</tr>
						<?foreach($ps->result() AS $n):?>
								<tr>
									<td><?=anchor('hep/conf_check_out/'.$n->ID_dafhostel, $n->matrik, 'title="Check Out '.$n->matrik.'"')?></td>
									<td><?=$n->namahostel?></td>
									<td><?=$n->nobilik?></td>
									<td><?=$n->sesi?></td>
									<td><?=date_view($n->tarikh_masuk)?></td>
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