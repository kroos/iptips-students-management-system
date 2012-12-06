<? extend('base_template_user') ?>

	<? startblock('content') ?>
		<h2>Maklumat Waris</h2>
		<p>Sila masukkan data untuk waris kepada pelajar</p>
		<p><font color="#FF0000"><?=@$info?></font></p>

		<div class="form_settings">
		<?=form_open()?>
			<p><span><label for="nama">Nama : </label></span>
			<?=form_input(array('name' => 'nama', 'value' => set_value('nama'), 'maxlength' => '30', 'size' => '12', 'id' => 'nama'))?>
			<br /><?=form_error('nama')?>
			</p>

<?foreach ($h->result() as $v):?>
	<?$opth[$v->kodhubungan] = $v->hubungan_MY?>
<?endforeach?>

			<p><span><label for="hubungan">Hubungan : </label></span>
			<?=form_dropdown('hubungan', $opth, set_value('hubungan'), 'id="hubungan"')?>
			<br /><?=form_error('hubungan')?>
			</p>

			<p><span><label for="alamat1">Alamat 1 : </label></span>
			<?=form_textarea(array('name' => 'alamat1', 'value' => set_value('alamat1'), 'rows' => '5', 'cols' => '12', 'id' => 'alamat1'))?>
			<br /><?=form_error('alamat1')?>
			</p>

			<p><span><label for="alamat2">Alamat 2 : </label></span>
			<?=form_textarea(array('name' => 'alamat2', 'value' => set_value('alamat2'), 'rows' => '5', 'cols' => '12', 'id' => 'alamat2'))?>
			<br /><?=form_error('alamat2')?>
			</p>

			<p><span><label for="poskod">Poskod : </label></span>
			<?=form_input(array('name' => 'poskod', 'value' => set_value('poskod'), 'maxlength' => '5', 'size' => '5', 'id' => 'poskod'))?>
			<br /><?=form_error('poskod')?>
			</p>

			<p><span><label for="notel_rumah">Telefon Tetap : </label></span>
			<?=form_input(array('name' => 'notel_rumah', 'value' => set_value('notel_rumah'), 'maxlength' => '10', 'size' => '12', 'id' => 'notel_rumah'))?>
			<br /><?=form_error('notel_rumah')?>
			</p>

			<p><span><label for="notel_pej">Telefon Pejabat : </label></span>
			<?=form_input(array('name' => 'notel_pej', 'value' => set_value('notel_pej'), 'maxlength' => '10', 'size' => '12', 'id' => 'notel_pej'))?>
			<br /><?=form_error('notel_pej')?>
			</p>

			<p><span><label for="nohp">Telefon Bimbit : </label></span>
			<?=form_input(array('name' => 'nohp', 'value' => set_value('nohp'), 'maxlength' => '10', 'size' => '12', 'id' => 'nohp'))?>
			<br /><?=form_error('nohp')?>
			</p>

			<p><span><label for="email">Email : </label></span>
			<?=form_input(array('name' => 'email', 'value' => set_value('email'), 'maxlength' => '50', 'size' => '12', 'id' => 'email'))?>
			<br /><?=form_error('email')?>
			</p>

            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('waris', 'Simpan', 'class="submit"')?></p>
		<?=form_close()?>
		</div>
	<? endblock() ?>

<? end_extend() ?>