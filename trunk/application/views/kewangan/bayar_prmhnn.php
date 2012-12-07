<? extend('base_template_user') ?>

	<? startblock('content') ?>		
		<h2>Pembayaran Bakal Pelajar</h2>                
			<div id="accordion">
			<h3>Bantuan</h3>
			<p>Fungsi ini digunakan untuk merekodkan pembayaran bakal pelajar untuk ke Semester 1 sebelum proses pendaftaran</p>
			</div>

			<div class="info"><?=@$info?></div>

		<div class="form_settings">
		  <?=form_open()?>
            <p><span><label for="noresit">No Resit : </label></span>
			<?=form_input(array('name' => 'noresit', 'value' => set_value('noresit'), 'maxlength' => '30', 'size' => '12', 'id' => 'noresit'))?>
			<br /><?=form_error('noresit')?>
			</p>

            <p><span><label for="ktr_bayaran">Catatan : </label></span>
			<?=form_input(array('name' => 'ktr_bayaran', 'value' => set_value('ktr_bayaran'), 'maxlength' => '30', 'size' => '12', 'id' => 'ktr_bayaran'))?>
			<br /><?=form_error('ktr_bayaran')?>
			</p>

            <p><span><label for="jumlah">Jumlah (RM) : </label></span>
			<?=form_input(array('name' => 'jumlah', 'value' => set_value('jumlah'), 'maxlength' => '30', 'size' => '12', 'id' => 'jumlah'))?>
			<br /><?=form_error('jumlah')?>
			</p>

            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('simpan', 'Simpan', 'class="submit"')?></p>
		<?=form_close()?>
		</div>
			
	<? endblock() ?>
	
<? end_extend() ?>