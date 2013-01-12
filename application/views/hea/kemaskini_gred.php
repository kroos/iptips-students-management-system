<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Kemaskini Gred</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Pemarkahan yang dibuat adalah berdasarkan kepada keseluruhan markah yang dapat dikumpul oleh pelajar. Ini termasuklah markah tugasan, kuiz, peperiksaan akhir dan lain-lain lagi.<br /><br />
			Sekiranya pelajar tidak menghadiri peperiksaan, sila pilih gred dibawah untuk mewakili ketidakhadiran pelajar tersebut<br /><br />
			Jika menghadiri peperiksaan, maka masukkan markah dan juga markah pemutihan seperti biasa.
			</p>
        </div>

        <div class="info"><?=@$info?></div>

		<p>Matrik : <?=$m->row()->matrik?></p>
		<p>Kod Subjek : <?=$m->row()->kodsubjek?>&nbsp;<?=$this->subjek->GetWhere(array('kodsubjek' => $m->row()->kodsubjek))->row()->namasubjek_MY?></p>
		<?=form_open()?>
		<table style="width:100%; border-spacing:0;">
			<tr>
				<th>Markah</th>
				<th>Pemutihan</th>
				<th>&nbsp;</th>
			</tr>
			<tr>
				<td><?=form_input(array('name' => 'jum_mark', 'value' => $m->row()->jum_mark, 'title' => 'Masukkan Jumlah Markah'))?></td>
				<td><?=form_input(array('name' => 'jum_pemutihan', 'value' => $m->row()->jum_pemutihan, 'title' => 'Masukkan Jumlah Pemutihan'))?></td>
				<td><?=form_submit('save', 'Kemaskini')?></td>
			</tr>
		</table>
		<?=form_close()?>
	<?php endblock()?>

<?php end_extend() ?>