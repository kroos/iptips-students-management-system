<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Rekod Pinjaman Dan Pemulangan Buku</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Pembantu perpustakaan dikehendaki untuk merekodkan pinjaman dan pemulangan buku oleh pelajar-pelajar<br />
			Sila isikan tarikh pemulangan jika pelajar berjaya memulangkan keseluruhan buku yang telah dipinjam<br />
			Tinggalkan tarikh pemulangan jika pelajar gagal untuk memulangkan buku seperti yang sepatutnya.
			</p>
        </div>

        <div class="info"><?=@$info?></div>

		<?=form_open()?>
        <div class="form_settings">
			<p><span><?=form_label('No Matrik', 'matrik')?></span>
			<?=form_input(array('name' => 'matrik', 'value' => $s->row()->matrik, 'id' => 'matrik'))?>
			<br /><?=form_error('matrik')?></p>

			<p><span><?=form_label('Tarikh Pemulangan', 'datepicker1')?></span>
			<?=form_input(array('name' => 'tarikh_clear', 'value' => ($s->row()->tarikh_clear != NULL ? $s->row()->tarikh_clear : NULL), 'id' => 'datepicker1'))?>
			<br /><?=form_error('tarikh_clear')?></p>

			<p><span>&nbsp;</span><?=form_submit('save', 'Simpan','class="submit"')?></p>
		</div>
		<?=form_close()?>

	<?php endblock()?>

<?php end_extend() ?>