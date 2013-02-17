<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Konfigurasi Asrama Kediaman</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Penambahan asrama kediaman boleh dilakukan disini.<br />
			1.&nbsp;&nbsp;&nbsp;Kategori Jantina adalah untuk mengenal pasti asrama kediaman berikut adalah dikhaskan untuk lelaki, perempuan atau campur<br />
			2.&nbsp;&nbsp;&nbsp;Jika sekiranya anda cuba untuk menyahaktifkan sesebuah asrama, sila pastikan bilik-bilik yang telah dibuat di nyahaktifkan terlebih dahulu<br />
			3.&nbsp;&nbsp;&nbsp;Klik Kod Hostel untuk konfigurasi bilik<br />
			4.&nbsp;&nbsp;&nbsp;Klik Nama untuk kemaskini asrama kediaman
			</p>
        </div>

        <div class="info"><?=@$info?></div>

		<?=form_open()?>
		<div class="form_settings">

			<p><span><?=form_label('Kod Hostel', 'kodhostel')?></span>
			<?=form_input(array('name' => 'kodhostel', 'value' => set_value('kodhostel'), 'id' => 'kodhostel'))?>
			<br /><?=form_error('kodhostel')?></p>

			<p><span><?=form_label('Nama Hostel', 'namahostel')?></span>
			<?=form_input(array('name' => 'namahostel', 'value' => set_value('namahostel'), 'id' => 'namahostel'))?>
			<br /><?=form_error('namahostel')?></p>

			<p><span><?=form_label('Alamat 1', 'alamat1')?></span>
			<?=form_textarea(array('name' => 'alamat1', 'value' => set_value('alamat1'), 'id' => 'alamat1'))?>
			<br /><?=form_error('alamat1')?></p>

			<p><span><?=form_label('Alamat 2', 'alamat2')?></span>
			<?=form_textarea(array('name' => 'alamat2', 'value' => set_value('alamat2'), 'id' => 'alamat2'))?>
			<br /><?=form_error('alamat2')?></p>

			<p><span><?=form_label('Bandar', 'bandar')?></span>
			<?=form_input(array('name' => 'bandar', 'value' => set_value('bandar'), 'id' => 'bandar'))?>
			<br /><?=form_error('bandar')?></p>

			<p><span><?=form_label('Negeri', 'negeri')?></span>
			<?=form_input(array('name' => 'negeri', 'value' => set_value('negeri'), 'id' => 'negeri'))?>
			<br /><?=form_error('negeri')?></p>

			<p><span><?=form_label('Kategori Jantina', 'kat_jantina')?></span>
			<?=form_dropdown('kat_jantina', $this->config->item('kat_jantina'), set_value('kat_jantina'), 'id="kat_jantina"')?>
			<br /><?=form_error('kat_jantina')?></p>

			<p><span>&nbsp;</span><?=form_submit('simpan', 'Simpan','class="submit"')?></p>
		</div>
		<?=form_close()?>

			<?if($ps->num_rows() > 0):?>
				<div class="demo">
					<table style="width:100%; border-spacing:0;">
						<tr>
							<th>Kod Hostel</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Bandar</th>
							<th>Negeri</th>
							<th>Kategori Jantina</th>
							<th>Aktif</th>
						</tr>
						<?foreach($ps->result() AS $n):?>
							<tr>
								<td><?=$n->aktif == 1 ? anchor('hep/bilik_asrama/'.$n->kodhostel, $n->kodhostel, 'title="Pilih '.$n->kodhostel.'"') : $n->kodhostel?></td>
								<td><?=$n->aktif == 1 ? anchor('hep/kemaskini_asrama/'.$n->kodhostel, $n->namahostel) : $n->namahostel ?></td>
								<td><?=$n->alamat1?><br /><?=$n->alamat2?></td>
								<td><?=$n->bandar?></td>
								<td><?=$n->negeri?></td>
								<?foreach($this->config->item('kat_jantina') AS $g => $h):?>
									<?if($g == $n->kat_jantina):?>
										<td><?=$h?></td>
									<?endif?>
								<?endforeach?>
								<td><?=$n->aktif == 1 ? anchor('hep/toggle_konf_asrama/'.$n->kodhostel.'/0', 'AKTIF') : anchor('hep/toggle_konf_asrama/'.$n->kodhostel.'/1', ' TIDAK AKTIF')?></td>
							</tr>
						<?endforeach?>
					</table>
				</div>
			<?else:?>
				<p>Tiada rekod dengan carian matrik <b><font color="#FF0000"><?=$this->input->post('matrik', TRUE)?></font></b></p>
			<?endif?>
	<?php endblock()?>

<?php end_extend() ?>