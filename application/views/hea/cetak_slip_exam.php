<?php extend('base_template_surat')?>
	<?php startblock('title')?>
	<?php echo $title;?>
	<?php endblock()?>
	
	<?php startblock('top_navi')?>
	<?php //('top_navi') ?>
	<?php endblock()?>
	
	<?php startblock('content')?>
	<?php echo $title;?>
		<?//if($m->num_rows() < 1):?>

			<div class="info">Tiada subjek didaftarkan</div>

		<?//else:?>

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
					<?/*foreach($m->result() AS $v):?>
						<tr>
							<td><?=$v->kodsubjek?></td>
							<td><? //=$this->subjek->GetWhere(array('kodsubjek' => $v->kodsubjek), NULL, NULL)->row()->namasubjek_MY?></td>
							<td><?=$v->sem?></td>
							<td><?=$v->sesi?></td>
							<td><?=$v->kredit?><?$i += $v->kredit?></td>
							<td><?=anchor('hea/drop_subj/'.$this->uri->segment(3, 0).'/'.$v->id, 'Drop')?></td>
						</tr>
					<?endforeach*/?>
						<tr>
							<td colspan="4">Jumlah Kredit</td>
							<td><strong><?=$i?> Kredit</strong></td>
							<td>&nbsp;</td>
						</tr>
				</table>
			</div>
		<?//endif?>
	<?php endblock()?>
	
<?php end_extend()?>