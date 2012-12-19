<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Kemaskini Matapelajaran Pelajar</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Kemaskini matapelajaran pelajar</p>
        </div>

        <div class="info"><?=@$info?></div>

<?php
foreach($sub->result() AS $s)
	{
		$sbj = $this->subjek->GetWhere(array('kodsubjek' => $s->kodsubjek));
		$subjek[$s->kodsubjek] = $s->kodsubjek.'&nbsp;||&nbsp;'.$sbj->row()->namasubjek_MY.'&nbsp;||&nbsp;Sem '.$s->sem.'&nbsp;||&nbsp;'.$sbj->row()->kredit.' jam kredit';
	}
?>
        <div class="form_settings">
            <?=form_open('', '', array('matrik' => $this->uri->segment(3, 0)))?>

			<p><span><?=form_label('Matapelajaran', 'subjek')?></span>
			<?=form_dropdown('subjek', $subjek, set_value('subjek'), array('id' => 'subjek'))?>
			<br /><?=form_error('subjek')?></p>

			<p><span>&nbsp;</span><?=form_submit('save', 'Tambah', 'class="submit"')?></p>
		</div>
		<?=form_close()?>

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
							<td><?=anchor('hea/drop_subj/'.$this->uri->segment(3, 0).'/'.$v->id, 'Drop')?></td>
						</tr>
					<?endforeach?>
						<tr>
							<td colspan="4">Jumlah Kredit</td>
							<td><strong><?=$i?> Kredit</strong></td>
							<td>&nbsp;</td>
						</tr>
				</table>
			</div>
		<?endif?>
	<?php endblock()?>

<?php end_extend() ?>