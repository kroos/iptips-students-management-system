<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Slip Peperiksaan</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Slip peperiksaan akan dicetak keluar mengikut beberapa filter.<br />
			1. Baki yuran yang merah menunjukkan bahawa pelajar masih lagi mempunyai baki tertunggak.<br />
			2. Jika kehadiran bagi sesuatu subjek adalah 0% dan bewarna merah, maka pensyarah yang berkenaan masih lagi belum mencatat kehadiran atau pelajar tersebut tidak langsung menghadiri kelas.<br />
			3. Kehadiran yang bewarna merah tetapi melebihi 0% menunjukkan pelajar tidak menghadiri kelas melebihi kehadiran minimum.
			</p>
        </div>

        <div class="info"><?=@$info?></div>

		<?=form_open()?>
		<div class="form_settings">
			<p><span><?=form_label('No Matrik', 'matrik')?></span>
			<?=form_input(array('name' => 'matrik', 'value' => set_value('matrik'), 'id' => 'matrik'))?>
			<br /><?=form_error('matrik')?></p>

			<p><span>&nbsp;</span><?=form_submit('cari', 'Cari','class="submit"')?></p>
		</div>
		<?=form_close()?>

		<?if($this->form_validation->run() == TRUE):?>
		<div class="demo">
		<table style="width:100%; border-spacing:0;">
			<tr>
				<th>Matrik</th>
				<th>Baki Yuran</th>
				<th>Kehadiran</th>
				<th>Perpustakaan</th>
				<th>Cetak</th>
			</tr>
			<?foreach($sel->result() AS $e):?>
			<?$r = $this->pel_invois->GetWhere(array('matrik' => $e->matrik), NULL, NULL)?>
			<?php
				$j1 = 0;
				foreach($r->result() AS $j)
					{
						$j1 += $j->jumlah;
					}
			?>
			<?$g = $this->pel_resit->GetWhere(array('matrik' => $e->matrik), NULL, NULL)?>
			<?php
				$h1 = 0;
				foreach($g->result() AS $h)
					{
						$h1 += $h->jumlah;
					}
			?>
				<tr>
					<?$rm = $j1 - $h1?>
					<td><?=$e->matrik?></td>
					<td><?=($rm >= 0 ? '<font color="#FF0000">RM'.$rm.'</font>' : 'RM'.$rm)?></td>
					<td>
						<table style="width:100%; border-spacing:0;">
							<?$v = $this->view->view_pel_daf_sub_hadir1($e->matrik, $e->sem)?>
							<?foreach($v->result() AS $c):?>
								<?$cv = round($c->jum_hadir / ($c->jum_hari == NULL ? 1 : $c->jum_hari) * 100, 2)?>
								<?if($cv <= $c->peratus_wajib):?>
									<tr>
										<td><?=$c->kodsubjek.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.($cv <= $c->peratus_wajib ? '<font color="#FF0000">'.$cv.'%</font>' : $cv.'%')?></td>
									</tr>
								<?endif?>
							<?endforeach?>
						</table>
					</td>
					<td>
					
					<?$o = $this->pel_lib->GetWhere(array('matrik' => $e->matrik, 'sem' => $e->sem, 'sesi' => $e->sesi), NULL, NULL)?>
					<?//=$this->db->last_query()?>
					<?if($o === FALSE):?>
						Tiada Pinjaman Buku Dibuat
					<?else:?>
						<?if(@$o->row()->aktif == 1 && @$o->row()->tarikh_clear == NULL):?>
							<font color="#FF0000">Buku Masih Belum Dipulangkan</font>
						<?else:?>
							<?=@$o->row()->aktif == 0 && @$o->row()->tarikh_clear != NULL ? 'Buku telah dipulangkan pada :<br />'.datetime_view($o->row()->tarikh_clear) : 'Tiada Pinjaman Buku Dibuat'?>
						<?endif?>
					<?endif?>
					
					</td>
					<td><?=(($j1 - $h1) < 0 ? anchor('hea/cetak_slip_exam/'.$e->matrik, 'Cetak Slip', array('title' => 'Cetak Slip')) : anchor('hea/bypass_slip/'.$e->matrik, 'Bypass Slip', array('title' => 'Bypass Slip')))?></td>
				</tr>
			<?endforeach?>
		</table>
		</div>
		<?endif?>

	<?php endblock()?>

<?php end_extend() ?>