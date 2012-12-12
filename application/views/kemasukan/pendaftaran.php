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

<?if($u->num_rows() < 1):?>
	<p>Sila Pastikan Proses Penawaran Sudah Pun Dilakukan Atau Carian Anda Tiada Dalam Penawaran Program</p>
<?else:?>
		<table style="width:100%; border-spacing:0;">
			<thead>
				<tr>
					<th>Siri Mohon</th>
					<th>Nama</th>
					<th>Nombor Kad Pengenalan/Passport</th>
					<th>Program</th>
					<th>Pembayaran</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
			<?foreach($u->result() AS $r):?>
				<tr>
					<td><?=$r->siri_mohon?></td>
					<td><?=$r->nama?></td>
					<td><?=$r->ic?> / <?=$r->passport?></td>
					<?$y = $this->program->GetWhere(array('kod_prog' => $r->progTawar), NULL, NULL)?>
					<td><?=$y->row()->namaprog_MY?></td>
					<?$l = $this->pel_resit->GetWhere(array('matrik' => $r->siri_mohon, 'aktif' => 1), NULL, NULL)?>
					<td>

					<?if($l->num_rows() < 1):?>
						Tiada Pembayaran Dibuat
					<?else:?>
					<table>
						<tr>
							<th>No Resit</th>
							<th>Keterangan</th>
							<th>Jumlah</th>
						</tr>
						<?$c = 0?>
						<?foreach($l->result() as $s):?>
						<tr>
							<td><?=$s->noresit?></td>
							<td><?=$s->ktr_bayaran?></td>
							<td>RM <?=$s->jumlah?><?$c += $s->jumlah?></td>
						</tr>
						<?endforeach?>
						<tr>
							<td colspan="2">Jumlah Semua</td>
							<td>RM <?=$c?></td>
						</tr>
					</table>
					<?endif?>

					</td>
					<td>
					<?if($l->num_rows() < 1):?>
						Tiada Rekod Pembayaran. Sila ke Jabatan Kewangan.
					<?else:?>
						<?=form_open('', '', array('siri_mohon' => $r->siri_mohon, 'id_mohon' => $r->id))?>
						<?=form_label('No Matriks', 'nomatr')?>
						<div class="form_settings"><?=form_input(array('name' => 'nomatriks', 'value' => set_value('nomatriks'), 'id' => 'nomatr'))?>
						<br /><?=form_error('nomatriks')?></div>
						<div class="demo"><?=form_submit('reg', 'Daftar', 'class="submit"')?></div>
						<?=form_close()?>
					<?endif?>
					</td>
				</tr>
			<?endforeach?>
			</tbody>
		</table>
<?endif?>
	<? endblock() ?>
	
<? end_extend() ?>