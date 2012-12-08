<? extend('base_template_user') ?>

	<? startblock('content') ?>		
		<h2>Pendaftaran Pelajar</h2>                
			<div id="accordion">
			<h3>Bantuan</h3>
			<p>Dibawah adalah senarai pelajar-pelajar yang permohonannya berjaya<br />
			atau<br />
			anda masukkan nombor kad pengenalan, no passport atau nama pelajar untuk carian.<br />
			Sila pastikan bakal pelajar telah pun membuat sejumlah bayaran kepada pihak kewangan untuk membolehkan mereka mendaftarkan diri.<br />
			Untuk carian nama, anda tidak diperlukan untuk menaip nama penuh.</p>
			</div>

			<div class="info"><?=@$info?></div>

		<div class="form_settings">
		  <?=form_open()?>
            <p><span><label for="carian">Masukkan Nama/No Kad Pengenalan/No Passport : </label></span>
			<?=form_input(array('name' => 'carian', 'value' => set_value('carian'), 'maxlength' => '12', 'size' => '12', 'id' => 'carian'))?>
			<br /><?=form_error('carian')?>
			</p>

            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('cari', 'Cari', 'class="submit"')?></p>
		<?=form_close()?>
		</div>

		<table style="width:100%; border-spacing:0;">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Nombor Kad Pengenalan/Passport</th>
					<th>Program</th>
					<th>Pembayaran</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	<? endblock() ?>
	
<? end_extend() ?>