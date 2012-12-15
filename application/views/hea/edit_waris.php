<? extend('base_template_user') ?>

	<? startblock('content') ?>
	<?$id = $this->uri->segment(3, 0)?>
		<h2>Maklumat Waris</h2>
		<p>Sila masukkan data untuk waris kepada pelajar</p>
		<p><font color="#FF0000"><?=@$info?></font></p>

		<div class="form_settings">
		<?=form_open()?>
			<p><span><label for="nama">Nama : </label></span>
			<?=form_input(array('name' => 'nama', 'value' => ($id == $c->row()->matrik ? $c->row()->nama : set_value('nama')), 'maxlength' => '30', 'size' => '12', 'id' => 'nama'))?>
			<br /><?=form_error('nama')?>
			</p>

<?foreach ($h->result() as $v):?>
	<?$opth[$v->kodhubungan] = $v->hubungan_MY?>
<?endforeach?>

			<p><span><label for="hubungan">Hubungan : </label></span>
			<?=form_dropdown('hubungan', $opth, ($id == $c->row()->matrik ? $c->row()->hubungan : set_value('hubungan')), 'id="hubungan"')?>
			<br /><?=form_error('hubungan')?>
			</p>

			<p><span><label for="alamat1">Alamat 1 : </label></span>
			<?=form_textarea(array('name' => 'alamat1', 'value' => ($id == $c->row()->matrik ? $c->row()->alamat1 : set_value('alamat1')), 'rows' => '5', 'cols' => '12', 'id' => 'alamat1'))?>
			<br /><?=form_error('alamat1')?>
			</p>

			<p><span><label for="alamat2">Alamat 2 : </label></span>
			<?=form_textarea(array('name' => 'alamat2', 'value' => ($id == $c->row()->matrik ? $c->row()->alamat2 : set_value('alamat2')), 'rows' => '5', 'cols' => '12', 'id' => 'alamat2'))?>
			<br /><?=form_error('alamat2')?>
			</p>

			<p><span><label for="poskod">Poskod : </label></span>
			<?=form_input(array('name' => 'poskod', 'value' => ($id == $c->row()->matrik ? $c->row()->poskod : set_value('poskod')), 'maxlength' => '5', 'size' => '5', 'id' => 'poskod'))?>
			<br /><?=form_error('poskod')?>
			</p>

			<p><span><label for="no_telefon">Telefon : </label></span>
			<?=form_input(array('name' => 'no_telefon', 'value' => ($id == $c->row()->matrik ? $c->row()->no_telefon : set_value('no_telefon')), 'maxlength' => '10', 'size' => '12', 'id' => 'no_telefon'))?>
			<br /><?=form_error('no_telefon')?>
			</p>

            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('waris', 'Seterusnya >>', 'class="submit"')?></p>
		<?=form_close()?>
		</div>
	<? endblock() ?>

<? end_extend() ?>