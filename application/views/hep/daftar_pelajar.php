<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Pendaftaran Pelajar ke Asrama Kediaman</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>sat laa</p>
        </div>

        <div class="info"><?=@$info?></div>

<?/*?> 		<?=form_open()?>
		<div class="form_settings">

			<p><span><?=form_label('Kod Hostel', 'kodhostel')?></span>
			<?=form_input(array('name' => 'kodhostel', 'value' => set_value('kodhostel'), 'id' => 'kodhostel'))?>
			<br /><?=form_error('kodhostel')?></p>

			<p><span>&nbsp;</span><?=form_submit('simpan', 'Simpan','class="submit"')?></p>
		</div>
		<?=form_close()?>
 <?//*/?>
			<?if($host->num_rows() > 0):?>
				<div class="demo">
					<table style="width:100%; border-spacing:0;">
						<tr>
							<th>Kod<br />Asrama</th>
							<th>Nama Asrama</th>
							<th>&nbsp;</th>
							<th>Kategori Jantina</th>
							<th>Aktif</th>
						</tr>
						<?foreach($host->result() AS $n):?>
						<?$hb = $this->host_bilik->GetWhere(array('kodhostel' => $n->kodhostel), NULL, NULL)?>
							<tr>
								<td><?=$n->kodhostel?></td>
								<td><?=$n->namahostel?></td>
								<td>
									<?if($hb->num_rows() > 0):?>
										<table style="width:100%; border-spacing:0;">
											<tr>
												<th>No Bilik</th>
												<th>Kapasiti</th>
												<th>Aktif</th>
											</tr>
										<?foreach($hb->result() AS $w):?>
													<?$x = $this->pel_dafhostel->GetWhere(array('idbilik' => $w->id), NULL, NULL)?>
													<?$e = $w->max_capacity - $x->num_rows()?>
											<tr>
												<td><?=$w->aktif == 1 ? ($e == 0 ? $w->nobilik : anchor('/hep/conf_daftar_pelajar/'.$this->uri->segment(3, 0).'/'.$w->id, $w->nobilik, 'title="Pilih Bilik '.$w->nobilik.'"')) : $w->nobilik ?></td>
												<td>
													<?=$e == 0 ? 'Penuh' : $e ?>
												</td>
												<td><?=$w->aktif == 1 ? 'Aktif' : 'Tidak Aktif'?></td>
											</tr>
										<?endforeach?>
										</table>
									<?else:?>
										Bilik asrama ini belum lagi di konfigurasi
									<?endif?>
								</td>
								<td>
									<?php
									foreach ($this->config->item('kat_jantina') as $f=>$j)
										{
											if($n->kat_jantina == $f)
												{
													echo $j;
												}
										}
									?>
								</td>
								<td><?=$n->aktif == 1 ? 'Aktif' : 'Tidak Aktif'?></td>
							</tr>
						<?endforeach?>
					</table>
				</div>
			<?else:?>
				<p>No hostel has been setup yet</p>
			<?endif?>
	<?php endblock()?>

<?php end_extend() ?>