<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Kemaskini Status Pelajar</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>sat</p>
        </div>

        <div class="info"><?=@$info?></div>

        <div class="form_settings">
            <?=form_open('', '', array('matrik' => $this->uri->segment(3, 0)))?>

			<p><span><?=form_label('Matapelajaran', 'subjek')?></span>
			<?=form_dropdown('subjek', $subjek, set_value('subjek'), array('id' => 'subjek'))?>
			<br /><?=form_error('subjek')?></p>

			<p><span>&nbsp;</span><?=form_submit('save', 'Tambah', 'class="submit"')?></p>
		</div>
		<?=form_close()?>

		<?if($m->num_rows() < 1):?>

			<div class="info">Tiada subjek didaftarkan</div>

		<?else:?>

			<div class="demo">
				<table style="width:100%; border-spacing:0;">
					<tr>
						<th>Kod Subjek</th>
						<th>Subjek</th>
						<th>Semester</th>
						<th>Sesi</th>
						<th>Kredit</th>
						<th>&nbsp;</th>
					</tr>
					<?$i = 0?>
					<?foreach($m->result() AS $v):?>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					<?endforeach?>
				</table>
			</div>
		<?endif?>
	<?php endblock()?>

<?php end_extend() ?>