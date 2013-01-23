<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Slip Peperiksaan</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Slip peperiksaan akan dicetak keluar mengikut beberapa filter.</p>
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
					<td><?=$e->matrik?></td>
					<td>RM<?=($j1 - $h1)?></td>
					<td>
						<table style="width:100%; border-spacing:0;">
							<?$v = $this->pel_daftarsubjek->GetWhere(array('matrik' => $e->matrik, 'sem' => $e->sem), NULL, NULL)?>
							<?foreach($v->result() AS $c):?>
								<?$z = $this->pel_hadir->GetWhere(array('id_daftarsubjek' => $c->id), NULL, NULL)?>
								<tr>
									<td><?=$z->row()->jum_hari / ($z->row()->jum_hadir == NULL ? 1 : $z->row()->jum_hadir) * 100?></td>
								</tr>
							<?endforeach?>
						</table>
					</td>
					<td>perpustakaan</td>
					<td><?=(($j1 - $h1) < 0 ? anchor('hea/cetak_slip_exam/'.$e->matrik, 'Cetak Slip', array('title' => 'Cetak Slip')) : anchor('hea/bypass_slip/'.$e->matrik, 'Bypass Slip', array('title' => 'Bypass Slip')))?></td>
				</tr>
			<?endforeach?>
		</table>
		</div>

	<?php endblock()?>

<?php end_extend() ?>