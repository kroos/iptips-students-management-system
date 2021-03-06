<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Pemarkahan</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Pemarkahan yang dibuat adalah berdasarkan kepada keseluruhan markah yang dapat dikumpul oleh pelajar. Ini termasuklah markah tugasan, kuiz, peperiksaan akhir dan lain-lain lagi.<br /><br />
			Sekiranya pelajar tidak menghadiri peperiksaan, sila pilih gred dibawah untuk mewakili ketidakhadiran pelajar tersebut<br /><br />
			Jika menghadiri peperiksaan, maka masukkan markah dan juga markah pemutihan seperti biasa.<br />
			Setelah berpuas hati, sila click pada link <b>"Klik Disini Untuk Pengesahan Pemarkahan Bagi Subjek Tersebut"</b><br />
			Ini adalah untuk mengelakkan sebarang percanggahan ketika pihak unit peperiksaan menjana keputusan peperiksaan.
			</p>
        </div>

        <div class="info"><?=@$info?></div>
<?if($set == 0):?>
<?else:?>
	<?if($la->num_rows() < 0):?>
		<p>Tiada subjek didaftarkan kepada anda</p>
	<?else:?>
		<ol>
		<?foreach($la->result() AS $e):?>
			<li><?=$e->kodsubjek?>&nbsp;<?=$this->subjek->GetWhere(array('kodsubjek' => $e->kodsubjek), NULL, NULL)->row()->namasubjek_MY?>
					<table style="width:100%; border-spacing:0;">
						<tr>
							<div class="demo"><th colspan="6"><?=anchor('hea/pengesahan_pemarkahan/'.$e->kodsubjek, 'Klik Disini Untuk Pengesahan Pemarkahan Bagi Subjek '.$e->kodsubjek, 'title="Klik Disini Untuk Pengesahan Pemarkahan Bagi Subjek '.$e->kodsubjek.'"')?></th></div>
						</tr>
						<tr>
							<th>Matrik</th>
							<th>Gred</th>
							<th>Markah</th>
							<th>Pemutihan</th>
							<th>Lulus</th>
							<th>&nbsp;</th>
						</tr>
						<?$gr = $this->pel_subjek_gred->GetWhere(array('sesi' => $sesi, 'id_drop IS NULL' => NULL, 'id_ign IS NULL' => NULL, 'kodsubjek' => $e->kodsubjek), NULL, NULL);?>
						<?if($gr->num_rows() < 1):?>
						<tr>
							<td colspan="7">Tiada Pelajar Mengambil Subjek Ini</td>
						</tr>
						<?else:?>
								<?$e = 0?>
								<?foreach($gr->result() AS $v):?>
									<?=form_open()?>
										<tr>
											<td><?=$v->matrik?></td>
											<td><?=($v->jum_mark != NULL ? $v->gred : 'Tiada Info')?></td>
											<td><?=($v->jum_mark != NULL ? $v->jum_mark : form_input(array('name' => 'jum_mark', 'value' => set_value('jum_mark'), 'title' => 'Masukkan Jumlah Markah')).'<br />'.form_error('jum_mark'))?></td>
											<td><?=($v->jum_mark != NULL ? $v->jum_pemutihan : form_input(array('name' => 'jum_pemutihan', 'value' => set_value('jum_pemutihan'), 'title' => 'Masukkan Jumlah Pemutihan')).'<br />'.form_error('jum_pemutihan'))?></td>
											<td><?=($v->jum_mark != NULL ? ($v->lulus == 1 ? 'LULUS' : 'TIDAK') : 'Tiada Info')?></td>
											<td><?=($v->jum_mark != NULL ? anchor('hea/kemaskini_gred/'.$v->id, $v->matrik, array('title' => 'Kemaskini Gred '.$v->matrik)) : form_hidden('id', $v->id).form_submit('save', 'Simpan'))?></td>
										</tr>
									<?=form_close()?>
								<?endforeach?>
						<?endif?>
					</table>

			</li>
		<?endforeach?>
		</ol>
	<?endif?>
<?endif?>
	<?php endblock()?>

	<?php startblock('jscript')?>
	<?=get_extended_block()?>
	<?php endblock()?>

<?php end_extend() ?>