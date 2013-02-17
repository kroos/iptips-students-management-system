<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Konfigurasi Bilik Kediaman Asrama</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>1.&nbsp;&nbsp;&nbsp;Penambahan bilik bagi asrama kediaman boleh dilakukan disini.<br />
			2.&nbsp;&nbsp;&nbsp;Kemaskini bilik hanya boleh dilakukan jika bilik tersebut adalah AKTIF<br />
			</p>
        </div>

        <div class="info"><?=@$info?></div>

		<?=form_open()?>
		<div class="form_settings">

			<p><span><?=form_label('No Bilik', 'nobilik')?></span>
			<?=form_input(array('name' => 'nobilik', 'value' => set_value('nobilik'), 'id' => 'nobilik'))?>
			<br /><?=form_error('nobilik')?></p>

			<p><span><?=form_label('Harga Hari (RM)', 'harga_hari')?></span>
			<?=form_input(array('name' => 'harga_hari', 'value' => set_value('harga_hari'), 'id' => 'harga_hari'))?>
			<br /><?=form_error('harga_hari')?></p>

			<p><span><?=form_label('Harga Bulan (RM)', 'harga_bulan')?></span>
			<?=form_input(array('name' => 'harga_bulan', 'value' => set_value('harga_bulan'), 'id' => 'harga_bulan'))?>
			<br /><?=form_error('harga_bulan')?></p>

			<p><span><?=form_label('Maximum Capacity (orang)', 'max_capacity')?></span>
			<?=form_input(array('name' => 'max_capacity', 'value' => set_value('max_capacity'), 'id' => 'max_capacity'))?>
			<br /><?=form_error('max_capacity')?></p>

			<p><span>&nbsp;</span><?=form_submit('simpan', 'Simpan','class="submit"')?></p>
		</div>
		<?=form_close()?>

			<?if($ps->num_rows() > 0):?>
				<div class="demo">
					<table style="width:100%; border-spacing:0;">
						<tr>
							<th>No Bilik</th>
							<th>Harga Hari</th>
							<th>Harga Bulan</th>
							<th>Maximum Capacity</th>
							<th>Aktif</th>
						</tr>
						<?foreach($ps->result() AS $n):?>
							<tr>
								<td><?=$n->aktif == 1 ? anchor('hep/edit_bilik_asrama/'.$n->id, $n->nobilik, 'title="Pilih '.$n->nobilik.'"') : $n->nobilik?></td>
								<td>RM <?=$n->harga_hari?></td>
								<td>RM <?=$n->harga_bulan?></td>
								<td><?=$n->max_capacity?> orang</td>
								<td><?=$n->aktif == 1 ? anchor('hep/toggle_bilik_asrama/'.$n->id.'/0', 'YA') : anchor('hep/toggle_bilik_asrama/'.$n->id.'/1', 'TIDAK AKTIF')?></td>
							</tr>
						<?endforeach?>
					</table>
				</div>
			<?else:?>
				<p>Konfigurasi bilik belum ditentukan lagi</p>
			<?endif?>
	<?php endblock()?>

<?php end_extend() ?>