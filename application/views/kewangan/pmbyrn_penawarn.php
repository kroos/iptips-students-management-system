<? extend('base_template_user') ?>

	<? startblock('content') ?>		
		<h2>Pencarian Bakal Pelajar Untuk Pembayaran</h2>                
			<div id="accordion">
			<h3>Bantuan</h3>
			<p>Selepas proses penawaran, bakal pelajar dikehendaki untuk membuat sejumlah pembayaran. Jika ini tidak dilakukan, maka bakal pelajar tidak dibenarkan untuk mendaftar diri.<br />
			Sila masukkan nama bakal pelajar atau no kad pengenalan atau nombor passport<br />
			Untuk carian nama, anda tidak diperlukan untuk menaip nama penuh</p>
			</div>

			<div class="info"><?=@$info?></div>

				<?if ($r->num_rows() < 1) :?>
					<div class="info">
					<p>Proses penawaran kursus masih lagi belum dibuat kepada pelajar untk sesi kemasukan <?=$h->row()->kodsesi?></p>
					<p>Sila dapatkan maklumat dari Jabatan Hal Ehwal Akademik</p>
					</div>
				<?else:?>

		<div class="form_settings">
		  <?=form_open()?>
            <p><span><label for="carian">Masukkan Nama/ No Kad Pengenalan/ No Passport : </label></span>
			<?=form_input(array('name' => 'carian', 'value' => set_value('carian'), 'maxlength' => '12', 'size' => '12', 'id' => 'carian'))?>
			<br /><?=form_error('carian')?>
			</p>

            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('cari', 'Cari', 'class="submit"')?></p>
		<?=form_close()?>
		</div>

					<?if ($this->form_validation->run() == FALSE):?>
					<div class="demo"><?=$paginate?></div>
						<table style="width:100%; border-spacing:0;">
							<thead>
								<tr>
									<th>&nbsp;</th>
									<th>Nama</th>
									<th>Nombor Kad Pengenalan/Passport</th>
									<th>Program</th>
									<th>Pembayaran</th>
								</tr>
							</thead>
							<tbody>
							<?$i = 1?>
							<?foreach($r->result() AS $v):?>
								<?$t = $this->pel_resit->GetWhere(array('matrik' => $v->siri_mohon))?>
									<tr>
										<td><div class="demo"><?=anchor('kewangan/bayar_prmhnn/'.$v->siri_mohon, $i++)?></div></td>
										<td><?=$v->nama?></td>
										<td><?=$v->ic.' / '.$v->passport?></td>
										<td><?=$this->program->GetWhere(array('kod_prog' => $v->progTawar))->row()->namaprog_MY?></td>
										<td>
											<?if($t->num_rows() < 1):?>
												Tiada Rekod Pembayaran
											<?else:?>
													<table style="width:100%; border-spacing:0;">
														<tr>
															<th>No Resit</th>
															<th>Catatan</th>
															<th>Tarikh</th>
															<th>Jumlah (RM)</th>
														</tr>
												<?$c = 0?>
												<?foreach($t->result() AS $k):?>
														<tr>
															<td><?=$k->noresit?></td>
															<td><?=$k->ktr_bayaran?></td>
															<td><?=datetime_view($k->tarikhmasa_resit)?></td>
															<td><strong><?=$k->jumlah?></strong><?$c += $k->jumlah?></td>
														</tr>
												<?endforeach?>
														<tr>
															<td colspan="3"><strong>Jumlah Keseluruhan</strong></td>
															<td><strong><?=$c?></strong></td>
														</tr>
													</table>
											<?endif?>
										</td>
									</tr>
							<?endforeach?>
							</tbody>
						</table>

					<?else:?>

					<div class="demo"><?=$paginate?></div>
						<table style="width:100%; border-spacing:0;">
							<thead>
								<tr>
									<th>&nbsp;</th>
									<th>Nama</th>
									<th>Nombor Kad Pengenalan/Passport</th>
									<th>Program</th>
									<th>Pembayaran</th>
								</tr>
							</thead>
							<tbody>
							<?$i = 1?>
							<?foreach($r->result() AS $v):?>
								<?$t = $this->pel_resit->GetWhere(array('matrik' => $v->siri_mohon))?>
									<tr>
										<td><div class="demo"><?=anchor('kewangan/bayar_prmhnn/'.$v->siri_mohon, $i++)?></div></td>
										<td><?=$v->nama?></td>
										<td><?=$v->ic.' / '.$v->passport?></td>
										<td><?=$this->program->GetWhere(array('kod_prog' => $v->progTawar))->row()->namaprog_MY?></td>
										<td>
											<?if($t->num_rows() < 1):?>
												Tiada Rekod Pembayaran
											<?else:?>
													<table style="width:100%; border-spacing:0;">
														<tr>
															<th>No Resit</th>
															<th>Catatan</th>
															<th>Tarikh</th>
															<th>Jumlah (RM)</th>
														</tr>
												<?$c = 0?>
												<?foreach($t->result() AS $k):?>
														<tr>
															<td><?=$k->noresit?></td>
															<td><?=$k->ktr_bayaran?></td>
															<td><?=datetime_view($k->tarikhmasa_resit)?></td>
															<td><strong><?=$k->jumlah?></strong><?$c += $k->jumlah?></td>
														</tr>
												<?endforeach?>
														<tr>
															<td colspan="3"><strong>Jumlah Keseluruhan</strong></td>
															<td><strong><?=$c?></strong></td>
														</tr>
													</table>
											<?endif?>
										</td>
									</tr>
							<?endforeach?>
							</tbody>
						</table>
					<?endif?>
				<?endif?>
	<? endblock() ?>
	
<? end_extend() ?>