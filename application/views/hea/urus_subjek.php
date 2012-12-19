<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Maklumat Pelajar</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Masukkan nama atau nombor kad pengenalan atau nombor passport atau nombor matrik untuk pencarian pelajar</p>
        </div>

        <div class="info"><?=@$info?></div>


		<?if($m->num_rows() < 1):?>

			<div class="info">Tiada subjek didaftarkan</div>

		<?else:?>

			<div class="demo">
				<table style="width:100%; border-spacing:0;">
					<tr>
						<th>Kod Subjek</th>
						<th>Subjek</th>
						<th>Semester</th>
						<th>Sesi</th>
						<th>Kredit</th>
						<th>&nbsp;</th>
					</tr>
					<?$i = 0?>
					<?foreach($m->result() AS $v):?>
						<tr>
							<td><?=$v->kodsubjek?></td>
							<td><?=$this->subjek->GetWhere(array('kodsubjek' => $v->kodsubjek), NULL, NULL)->row()->namasubjek_MY?></td>
							<td><?=$v->sem?></td>
							<td><?=$v->sesi?></td>
							<td><?=$v->kredit?><?$i += $v->kredit?></td>
							<td><?//=?></td>
						</tr>
					<?endforeach?>
						<tr>
							<td colspan="4">Jumlah Kredit</td>
							<td><strong><?=$i?></strong></td>
							<td>&nbsp;</td>
						</tr>
				</table>
			</div>

		<?endif?>

	<?php endblock()?>

<?php end_extend() ?>