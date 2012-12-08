<? extend('base_template_user') ?>

<? startblock('content') ?>
	<h2>Rayuan Permohonan Pelajar</h2>

	<div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Berikut adalah permohonan pelajar yang gagal dan tidak laengkap<br />
				1.&nbsp;Sila klik pada butang "Tawaran" yang bersangkutan dengan program yang dipohon<br />
				2.&nbsp;Sekiranya pemohon tidak layak dari senarai program yang dipohonnya, sila klik pada senarai dropdown dan pilih dari senarai program yang ingin anda tawarkan pada pemohon. Jadi dengan cara ini, institusi anda dapat menawarkan program yang bersesuian dengan pemohon</strong></p>
	</div>
    <p><font color="#FF0000"><?=@$info?></font></p>

<?$z = $this->program->GetAll()?>
<?foreach($z->result() as $x):?>
<?$subj[$x->kod_prog] = $x->namaprog_MY?>
<?endforeach?>

<?if($u->num_rows() < 1):?>
	<p>Proses permohonan kemasukan masih belum diterima</p>
<?else:?>
	<div class="demo"><?=$paginate?></div>
    <div class="form_settings">
		<table style="width:100%; border-spacing:0;">
		<thead>
			<tr>
				<th>Pemohon</th>
				<th>Akademik</th>
				<th>Program</th>
			</tr>
		</thead>
		<tbody>


		<?foreach($u->result() as $k):?>
			<tr>
				<td style="border-left-style: solid; border-left-width: 1px; border-top-style: solid; border-top-width: 1px"><strong><?=$k->nama?></strong></td>
				<td style="border-top-style: solid; border-top-width: 1px">

				<?$n = $this->app_akademik->get_where(array('id_mohon' => $k->id))?>
				<?if($n->num_rows() < 1):?>
					<font color="#FF0000">Maklumat tidak lengkap. Tiada maklumat akademik</font>
				<?else:?>
					<table style="width:100%; border-spacing:0;">
						<tr>
							<th>Institusi</th>
							<th>Tahap/Subjek</th>
						</tr>
						<?foreach($n->result() as $nu):?>
							<tr>
								<td><strong><?=$nu->institusi?></strong></td>
								<td><strong><?=$this->sel_level->get_where(array('kodtahap' => $nu->level))->row()->tahap_MY?></strong><br />
								<?$c = $this->app_subjek_akademik->get_where(array('akademik_id' => $nu->id))?>
								<?if($c->num_rows() < 1):?>
									<font color="#FF0000">Maklumat tidak lengkap. Tiada maklumat subjek</font>
								<?else:?>
									<table style="width:100%; border-spacing:0;">
										<?foreach($c->result() as $cu):?>
											<tr>
												<td><?=$this->sel_subjek->GetWhere(array('kodsubjek' => $cu->subjek))->row()->subjek_MY?></td>
												<td><?=$cu->gred?></td>
											</tr>
										<?endforeach?>
									</table>
								<?endif?>
								</td>
							</tr>
						<?endforeach?>
					</table>
				<?endif?>
				</td>
				<td style="border-right-style: solid; border-right-width: 1px">

				<?$s = $this->app_progmohon->GetWhere(array('id_mohon' => $k->id))?>
				<?if($s->num_rows() < 1):?>
					<font color="#FF0000">Maklumat tidak lengkap. Tiada maklumat permohonan program</font>
				<?else:?>
					<table style="width:100%; border-spacing:0;">
						<tr>
							<th>Program/Catatan</th>
						</tr>
						<?foreach($s->result() as $su):?>
							<tr>
<?=form_open('', '', array('id_appprogmohon' => $su->id, 'id_mohon' => $k->id))?>
								<td><?=form_dropdown('kodprog', $subj, $su->kod_prog)?><br />
								<?=form_input(array('name' => 'catatan', 'value' => 'Catatan : '.$su->catatan))?><br /><?=form_error('catatan')?>
								<?=form_submit('tawar', 'Tawaran', 'class="submit"')?></td>
<?=form_close()?>
							</tr>
						<?endforeach?>
					</table>
				<?endif?>

				</td>
			</tr>
			<tr>
				<td colspan="3" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('kemasukan/pmhn_tdk_lgkp/'.$k->id, 'TIDAK LENGKAP')?><?=anchor('kemasukan/pmhn_gagal/'.$k->id, 'GAGAL')?></div></td>
			</tr>
		<?endforeach?>

		<tbody>
		</table>
    </div>
<div class="demo"><?=$paginate?></div>
<?endif?>
	<? endblock() ?>

<?php startblock('jscript')?>
	<?=get_extended_block() ?>
	<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery.hints.js"></script>
	<script>
		$(document).ready(function(){	
	        $( "#accordion" ).accordion({
	            collapsible: true
	        });

	        $('input[title!=""]').hint();
		});
	</script>
<?php endblock()?>

<? end_extend()?>
