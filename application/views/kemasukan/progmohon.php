<? extend('base_template_user') ?>

	<? startblock('content') ?>		
		<h1>Selamat Datang ke IPTIPs Students Management System</h1>
		<h2>Permohonan Program Pilihan Pelajar</h2>                
			<div id="accordion">
			<h3>Bantuan</h3>
			<p>Masukkan pilihan program permohonan pelajar</p>
			</div>
<?foreach($prog->result() as $g):?>
<?$kod_prog[$g->kod_prog] = $g->namaprog_MY?>
<?endforeach?>

			<div class="info"><p><?=@$info?></p></div>

		<div class="demo">
		
		<div class="form_settings">
				<?=form_open()?>

					<table class="tab_form">
					<thead>
						<tr>
							<th>Program</th>
							<th>Catatan</th>
							<th><?=form_button('addRow', '+', 'class="addRow"')?></th>
						</tr>
					</thead>
					<tbody>
						<?php if($mohon->num_rows()>0){?>
							<?php foreach($mohon->result() as $m){?>
								<tr>
									<td><?=form_hidden(array('name'=>'id_progmohon[]', 'value'=>set_value('id_progmohon', $m->id), 'id'=>'id_progmohon'))?>
										<?=form_dropdown('kod_prog[]', $kod_prog, set_value('kod_prog[]', $m->kod_prog), array('id' => 'gred'))?><br /><?=form_error('kod_prog[]')?></td>
									<td><?=form_input(array('name'=>'catatan[]', 'id'=>'gred', 'value'=>set_value('catatan[]', $m->catatan), 'size'=>'4'))?><br /><?=form_error('catatan[]')?></td>
									<td><?=form_button('delRow', '-', 'class="delRow"')?></td>
								</tr>
							<?php }
							
						}else{ // jika bruinsert?>
								<tr>
									<td><?=form_dropdown('kod_prog[]', $kod_prog, set_value('kod_prog[]'), array('id' => 'gred'))?><br /><?=form_error('kod_prog[]')?></td>
									<td><?=form_input(array('name'=>'catatan[]', 'id'=>'gred', 'value'=>set_value('catatan[]'), 'size'=>'4'))?><br /><?=form_error('catatan[]')?></td>
									<td><?=form_button('delRow', '-', 'class="delRow"')?></td>
								</tr>
						<?php }?>
					</tbody>
					</table>

					<p><span>&nbsp;</span><?=form_submit('simpan', 'Seterusnya >>', 'class="submit"')?></p>
				<?=form_close()?>
		</div>
		</div>
	<? endblock() ?>
	
	<?php startblock('jscript')?>
	<script type="text/javascript" src="<?php echo base_url()?>js/jquery/jquery.table.addrow.js"></script>
	<?=get_extended_block() ?>
	<script>
		$(document).ready(function(){
			$(".addRow").btnAddRow();
			$(".delRow").btnDelRow();
	
			$( "#accordion" ).accordion({
				collapsible: true
			});
		});
	</script>
	<?php endblock()?>

<? end_extend() ?>