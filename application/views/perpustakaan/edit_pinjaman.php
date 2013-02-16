<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Kemaskini Pinjaman</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Pembantu perpustakaan boleh mengemaskini proses pemulangan dan pinjaman buku dari perpustakaan oleh pelajarmengikut status terkini.
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

		<div class="demo">
		<table style="width:100%; border-spacing:0;">
			<thead>
				<tr>
					<th>ID</th>
					<th>Matrik</th>
					<th>Sesi</th>
					<th>Semester</th>
					<th>Aktif</th>
					<th>Tarikh Pemulangan</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?foreach($a->result() AS $z):?>
				<tr>
					<td><?=anchor('perpustakaan/kemas_stud/'.$z->id, $z->id, 'title="Kemaskini ID '.$z->id.'"')?></td>
					<td><?=$z->matrik?></td>
					<td><?=$z->sesi?></td>
					<td><?=$z->sem?></td>
					<td><?=$z->aktif?></td>
					<td><?=$z->tarikh_clear == NULL? 'Belum dipulangkan sepenuhnya' : date_view($z->tarikh_clear)?></td>
					<td><?=anchor('perpustakaan/del_rek/'.$z->id, 'Padam', 'title="Padam ID '.$z->id.'"')?></td>
				</tr>
				<?endforeach?>
			</tbody>
		</table>
		</div>
	<?php endblock()?>

<?php end_extend() ?>