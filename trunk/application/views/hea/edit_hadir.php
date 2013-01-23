<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Kemaskini Kehadiran</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Mengemaskini kehadiran pelajar bagi sesuatu subjek</p>
        </div>

        <div class="info"><?=@$info?></div>

		<?$g = $this->pel_daftarsubjek->GetWhere(array('id' => $t->row()->id_daftarsubjek), NULL, NULL)?>
		<p>Matrik : <?=$g->row()->matrik?></p>
		<p>Kod Subjek : <?=$g->row()->kodsubjek?></p>

		<?=form_open()?>
        <div class="form_settings">
            <?=form_open()?>

			<p><span><?=form_label('Jumlah Hari Kelas', 'ic')?></span>
			<?=form_input(array('name' => 'jum_hari', 'value' => $t->row()->jum_hari, 'id' => 'ic'))?>
			<br /><?=form_error('jum_hari')?></p>

			<p><span><?=form_label('Peratus Wajib Hadir', 'ic1')?></span>
			<?=form_input(array('name' => 'peratus_wajib', 'value' => $t->row()->peratus_wajib, 'id' => 'ic1'))?>%
			<br /><?=form_error('peratus_wajib')?></p>

			<p><span><?=form_label('Jumlah Hadir', 'ic2')?></span>
			<?=form_input(array('name' => 'jum_hadir', 'value' => $t->row()->jum_hadir, 'id' => 'ic2'))?>
			<br /><?=form_error('jum_hadir')?></p>

			<p><span>&nbsp;</span><?=form_submit('check', 'Simpan', 'class="submit"')?></p>
		</div>
		<?=form_close()?>
	<?php endblock()?>

<?php end_extend() ?>