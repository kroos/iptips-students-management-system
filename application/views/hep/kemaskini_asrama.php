<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Kemaskini Asrama Kediaman</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Kemaskini asrama kediaman<br />
			</p>
        </div>

        <div class="info"><?=@$info?></div>

		<?=form_open()?>
		<div class="form_settings">

			<p><span><?=form_label('Kod Hostel', 'kodhostel')?></span>
			<?=form_input(array('name' => 'kodhostel', 'value' => $p->row()->kodhostel, 'id' => 'kodhostel'))?>
			<br /><?=form_error('kodhostel')?></p>

			<p><span><?=form_label('Nama Hostel', 'namahostel')?></span>
			<?=form_input(array('name' => 'namahostel', 'value' => $p->row()->namahostel, 'id' => 'namahostel'))?>
			<br /><?=form_error('namahostel')?></p>

			<p><span><?=form_label('Alamat 1', 'alamat1')?></span>
			<?=form_textarea(array('name' => 'alamat1', 'value' => $p->row()->alamat1, 'id' => 'alamat1'))?>
			<br /><?=form_error('alamat1')?></p>

			<p><span><?=form_label('Alamat 2', 'alamat2')?></span>
			<?=form_textarea(array('name' => 'alamat2', 'value' => $p->row()->alamat2, 'id' => 'alamat2'))?>
			<br /><?=form_error('alamat2')?></p>

			<p><span><?=form_label('Bandar', 'bandar')?></span>
			<?=form_input(array('name' => 'bandar', 'value' => $p->row()->bandar, 'id' => 'bandar'))?>
			<br /><?=form_error('bandar')?></p>

			<p><span><?=form_label('Negeri', 'negeri')?></span>
			<?=form_input(array('name' => 'negeri', 'value' => $p->row()->negeri, 'id' => 'negeri'))?>
			<br /><?=form_error('negeri')?></p>

			<p><span><?=form_label('Kategori Jantina', 'kat_jantina')?></span>
			<?=form_dropdown('kat_jantina', $this->config->item('kat_jantina'), $p->row()->kat_jantina, 'id="kat_jantina"')?>
			<br /><?=form_error('kat_jantina')?></p>

			<p><span>&nbsp;</span><?=form_submit('simpan', 'Simpan','class="submit"')?></p>
		</div>
		<?=form_close()?>

	<?php endblock()?>

<?php end_extend() ?>