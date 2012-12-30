<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Pemarkahan</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>sat</p>
        </div>

        <div class="info"><?=@$info?></div>

		<?=form_open()?>

		<ol>
		<?foreach($la->result() AS $e):?>
		<li><?=$this->subjek->GetWhere(array('kodsubjek' => $e->kodsubjek), NULL, NULL)->row()->namasubjek_MY?>

				<table style="width:100%; border-spacing:0;">
					<tr>
						<th>Matrik</th>
						<th>Gred</th>
						<th>Markah</th>
						<th>Pemutihan</th>
						<th>Lulus</th>
						<th>&nbsp;</th>
					</tr>
					<?$gr = $this->pel_subjek_gred->GetWhere(array('sesi' => $sesi, 'id_drop IS NULL' => NULL, 'id_ign IS NULL' => NULL, 'kodsubjek' => $e->kodsubjek), NULL, NULL);?>
					<?foreach($gr->result() AS $v):?>
						<tr>
							<td><?=$v->matrik?></td>
							<td><?=($v->jum_mark != NULL ? $v->gred : 'Tiada Info')?></td>
							<td><?=($v->jum_mark != NULL ? $v->jum_mark : form_input(array('name' => 'jum_mark', 'value' => set_value('jum_mark'), 'title' => 'Masukkan Jumlah Markah')).'<br />'.form_error('jum_mark'))?></td>
							<td><?=($v->jum_mark != NULL ? $v->jum_pemutihan : form_input(array('name' => 'jum_pemutihan', 'value' => set_value('jum_pemutihan'), 'title' => 'Masukkan Jumlah Pemutihan')).'<br />'.form_error('jum_pemutihan'))?></td>
							<td><?=($v->jum_mark != NULL ? ($v->lulus == 1 ? 'LULUS' : 'TIDAK') : 'Tiada Info')?></td>
							<td><?=($v->jum_mark != NULL ? anchor('hea/kemaskini_gred/'.$v->id, $v->matrik, array('title' => 'Kemaskini Gred '.$v->matrik)) : form_submit('save', 'Simpan'))?></td>
						</tr>
					<?endforeach?>
				</table>

		</li>
		<?endforeach?>
		</ol>
		<?=form_close()?>
	<?php endblock()?>

	<?php startblock('jscript')?>
	<?=get_extended_block()?>
	<?php endblock()?>

<?php end_extend() ?>