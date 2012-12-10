<? extend('base_template_user') ?>

	<? startblock('content') ?>
		<h2>Penetapan Sesi Permohonan Kemasukan</h2>
		<div id="accordion">
				<h3>Bantuan</h3>
				<p>
				1.&nbsp;Masukkan maklumat untuk Sesi Permohonan Kemasukan<br />
					&nbsp;a.&nbsp;Sesi Kemasukan : format untuk sesi kemasukan adalah dimestikan dalam format <strong>"TAHUN"_"SEMESTER"</strong>, contoh <strong>2014_1</strong> atau <strong>2015_1</strong><br />
					&nbsp;b.&nbsp;Kod Mula : format untuk kod mula adalah dimestikan dalam format <strong>"P""TAHUN""SEMESTER"</strong>, contoh <strong>P141</strong> atau <strong>P151</strong><br />
					&nbsp;c.&nbsp;Tarikh Mula : tarikh permulaan untuk <strong>sesi kemasukan</strong><br />
					&nbsp;d.&nbsp;Tarikh Tamat : tarikh tamat permohonan untuk </strong>sesi yang dimasukkan</strong><br />
					&nbsp;e.&nbsp;Tarikh Daftar : tarikh pendaftaran pelajar untuk </strong>sesi kemasukan</strong><br />
					<br />
					<br />
				2.&nbsp;Pengaktifan Sesi Permohonan Kemasukan yang seterusnya boleh dilakukan selepas <strong>Tarikh Daftar</strong> pada Sesi Kemasukan yang sedang aktif sekarang<br />
				</p>
		</div>
		<p><font color="#FF0000"><?=@$info?></font></p>

		<div class="form_settings">
		<?=form_open()?>

			<p><span><label for="nama">Sesi Kemasukan : </label></span>
			<?=form_input(array('name' => 'kodsesi', 'value' => set_value('kodsesi'), 'maxlength' => '30', 'size' => '12', 'id' => 'nama'))?>
			<br /><?=form_error('kodsesi')?>
			</p>

			<p><span><label for="kodmula">Kod Mula : </label></span>
			<?=form_input(array('name' => 'kodmula', 'value' => set_value('kodmula'), 'maxlength' => '30', 'size' => '12', 'id' => 'kodmula'))?>
			<br /><?=form_error('kodmula')?>
			</p>

			<p><span><label for="tarikh_mula">Tarikh Mula : </label></span>
			<?=form_input(array('name' => 'tarikh_mula', 'value' => set_value('tarikh_mula'), 'maxlength' => '30', 'size' => '12', 'id' => 'tarikh_mula'))?>
			<br /><?=form_error('tarikh_mula')?>
			</p>

			<p><span><label for="tarikh_tamat">Tarikh Tamat : </label></span>
			<?=form_input(array('name' => 'tarikh_tamat', 'value' => set_value('kodsesi'), 'maxlength' => '30', 'size' => '12', 'id' => 'tarikh_tamat'))?>
			<br /><?=form_error('tarikh_tamat')?>
			</p>

			<p><span><label for="tarikh_daftar">Tarikh Daftar : </label></span>
			<?=form_input(array('name' => 'tarikh_daftar', 'value' => set_value('kodsesi'), 'maxlength' => '30', 'size' => '12', 'id' => 'tarikh_daftar'))?>
			<br /><?=form_error('tarikh_daftar')?>
			</p>

            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('insert', 'Tambah Sesi', 'class="submit"')?></p>
		<?=form_close()?>
		</div>

		<div class="demo"><?=$paginate?></div>
		<table>
			<tr>
				<th>Sesi Kemasukan</th>
				<th>Kod Mula</th>
				<th>Siri</th>
				<th>Tarikh Mula</th>
				<th>Tarikh Tamat</th>
				<th>Tarikh Daftar</th>
				<th>&nbsp;</th>
			</tr>
			<?foreach($u->result() as $f):?>
				<tr>
					<td><?=$f->kodsesi?></td>
					<td><?=$f->kodmula?></td>
					<td><?=$f->siri?></td>
					<td><?=($f->tarikh_mula == NULL ? 'Tidak Ditetapkan' : date_view($f->tarikh_mula))?></td>
					<td><?=($f->tarikh_tamat == NULL ? 'Tidak Ditetapkan' : date_view($f->tarikh_tamat))?></td>
					<td><?=($f->tarikh_daftar == NULL ? 'Tidak Ditetapkan' : date_view($f->tarikh_daftar))?></td>
					<td><div class="demo"><?=($f->aktif == 1 ? anchor('kemasukan/set_sesi/'.$f->kodsesi, 'Aktif') : anchor('kemasukan/set_sesi/'.$f->kodsesi, 'Tidak Aktif'))?></div></td>
				</tr>
			<?endforeach?>
		</table>
	<?endblock() ?>

	<?startblock('jscript')?>
		<script src="<?=base_url()?>js/jquery/jquery-ui-1.9.1.custom.js"></script>
		<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery-ui-timepicker-addon.js"></script>
		<script language="JavaScript" type="text/javascript" src="<?=base_url()?>js/jquery.chainedSelects.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>js/jquery/jquery.cookies.2.2.0.js"></script>
		<script>
			$(function() {
				$( "input[type=submit], a, button", ".demo" )
					.button();

				$( "#accordion" ).accordion({
					collapsible: true
				});
		        $( "#tarikh_mula" ).datepicker({
					dateFormat: "yy-mm-dd",
		            changeMonth: true,
		            changeYear: true
		        });
		        $( "#tarikh_tamat" ).datepicker({
					dateFormat: "yy-mm-dd",
		            changeMonth: true,
		            changeYear: true
		        });
		        $( "#tarikh_daftar" ).datepicker({
					dateFormat: "yy-mm-dd",
		            changeMonth: true,
		            changeYear: true
		        });

			});
		</script>
	<?endblock()?>

<? end_extend() ?>