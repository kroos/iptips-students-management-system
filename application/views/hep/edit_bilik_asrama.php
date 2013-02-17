<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Kemaskini Bilik Kediaman Asrama</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Kemaskini bilik kediaman asrama<br />
			</p>
        </div>

        <div class="info"><?=@$info?></div>

		<?=form_open()?>
		<div class="form_settings">

			<p><span><?=form_label('No Bilik', 'nobilik')?></span>
			<?=form_input(array('name' => 'nobilik', 'value' => $ps->row()->nobilik, 'id' => 'nobilik'))?>
			<br /><?=form_error('nobilik')?></p>

			<p><span><?=form_label('Harga Hari (RM)', 'harga_hari')?></span>
			<?=form_input(array('name' => 'harga_hari', 'value' => $ps->row()->harga_hari, 'id' => 'harga_hari'))?>
			<br /><?=form_error('harga_hari')?></p>

			<p><span><?=form_label('Harga Bulan (RM)', 'harga_bulan')?></span>
			<?=form_input(array('name' => 'harga_bulan', 'value' => $ps->row()->harga_bulan, 'id' => 'harga_bulan'))?>
			<br /><?=form_error('harga_bulan')?></p>

			<p><span><?=form_label('Maximum Capacity (orang)', 'max_capacity')?></span>
			<?=form_input(array('name' => 'max_capacity', 'value' => $ps->row()->max_capacity, 'id' => 'max_capacity'))?>
			<br /><?=form_error('max_capacity')?></p>

			<p><span>&nbsp;</span><?=form_submit('simpan', 'Simpan','class="submit"')?></p>
		</div>
		<?=form_close()?>

	<?php endblock()?>

<?php end_extend() ?>