<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Kehadiran</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Kehadiran mestilah diisi sebelum slip peperiksaan dikeluarkan<br />
			Jumlah Hari Kelas = jumlah keseluruhan kelas dalam semester<br />
			Jumlah Hadir = jumlah kehadiran pelajar dalam kelas mengikut subjek
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
						<th>Matrik</th>
						<th>Jumlah Hari Kelas</th>
						<th>Peratus Wajib Hadir</th>
						<th>Jumlah Hadir</th>
						<th>&nbsp;</th>
					</tr>
						<?foreach($ps->result() AS $n):?>
							<?$phpds = $this->view->view_pel_daf_sub_hadir($n->matrik, $e->kodsubjek, $n->sem)?>
							<?foreach($phpds->result() AS $s):?>
							<?$ph = $this->pel_hadir->GetWhere(array('id_daftarsubjek' => $s->id_daftarsubjek), NULL, NULL)?>
								<tr>
								<?=form_open('', '', array('id' => $ph->row()->id))?>
									<td><?=$s->matrik?></td>
									<td><?=($ph->row()->jum_hari != NULL ? $ph->row()->jum_hari : form_input(array('name' => 'jum_hari', 'value' => set_value('jum_hari'))).'<br />'.form_error('jum_hari'))?></td>
									<td><?=($ph->row()->peratus_wajib != NULL ? $ph->row()->peratus_wajib.'%' : form_input(array('name' => 'peratus_wajib', 'value' => set_value('peratus_wajib'))).'%<br />'.form_error('peratus_wajib'))?></td>
									<td><?=($ph->row()->jum_hadir != NULL ? $ph->row()->jum_hadir : form_input(array('name' => 'jum_hadir', 'value' => set_value('jum_hadir'))).'<br />'.form_error('jum_hadir'))?></td>
									<td><?=($ph->row()->jum_hari != NULL ? anchor('hea/edit_hadir/'.$ph->row()->id, 'Kemaskini', array('title' => 'Kemaskini')) : form_submit('save','Simpan'))?></td>
								<?=form_close()?>
								</tr>
							<?endforeach?>
						<?endforeach?>
				</table>

			</li>
		<?endforeach?>
		</ol>
	<?endif?>
<?endif?>
	<?php endblock()?>

<?php end_extend() ?>