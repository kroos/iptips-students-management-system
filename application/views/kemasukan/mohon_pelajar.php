<? extend('base_template_user') ?>

<? startblock('content') ?>
	<h2>Permohonan Pelajar</h2>

	<div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Berikut adalah permohonan pelajar<br />
				1.&nbsp;Sila klik pada butang "Tawaran" yang bersangkutan dengan program yang dipohon<br />
				2.&nbsp;Sekiranya pemohon tidak layak dari senarai program yang dipohonnya, sila klik pada senarai dropdown dan pilih dari senarai program yang ingin anda tawarkan pada pemohon. Jadi dengan cara ini, institusi anda dapat menawarkan program yang bersesuian dengan pemohon<br />
				3.&nbsp;Klik pada button "TIDAK LENGKAP" sekiranya maklumat yang diberi adalah tidak mencukupi untuk penilaian<br />
				4.&nbsp;Klik pada button "GAGAL" sekiranya pemohon tidak layak untuk menduduki program<br />
				5.&nbsp;<strong>Anda dinasihatkan agar tidak klik pada button "TIDAK LENGKAP" dan "GAGAL" sehingga pada hari selepas pendaftaran, kerana jika sekiranya ada pemohon yang ingin membuat rayuan terhadap permohonannya, rayuan permohonan tersebut boleh ditimbang daripada page ini</strong></p>
	</div>
    <p><font color="#FF0000"><?=@$info?></font></p>

<?$z = $this->program->GetAll()?>
<?foreach($z->result() as $x):?>
<?$subj[$x->kod_prog] = $x->namaprog_MY?>
<?endforeach?>
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

					<table style="width:100%; border-spacing:0;">
						<tr>
							<th>Institusi</th>
							<th>Tahap/Subjek</th>
						</tr>
						<?$n = $this->app_akademik->get_where(array('id_mohon' => $k->id))?>
						<?foreach($n->result() as $nu):?>
							<tr>
								<td><strong><?=$nu->institusi?></strong></td>
								<td><strong><?=$this->sel_level->get_where(array('kodtahap' => $nu->level))->row()->tahap_MY?></strong><br />

									<table style="width:100%; border-spacing:0;">
										<?$c = $this->app_subjek_akademik->get_where(array('akademik_id' => $nu->id))?>
										<?foreach($c->result() as $cu):?>
											<tr>
												<td><?=$this->sel_subjek->GetWhere(array('kodsubjek' => $cu->subjek))->row()->subjek_MY?></td>
												<td><?=$cu->gred?></td>
											</tr>
										<?endforeach?>
									</table>

								</td>
							</tr>
						<?endforeach?>
					</table>

				</td>
				<td style="border-right-style: solid; border-right-width: 1px">

					<table style="width:100%; border-spacing:0;">
						<tr>
							<th>Program/Catatan</th>
						</tr>
						<?$s = $this->app_progmohon->GetWhere(array('id_mohon' => $k->id))?>
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



				</td>
			</tr>
			<tr>
				<td colspan="3" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('hea/pmhn_tdk_lgkp/'.$k->id, 'TIDAK LENGKAP')?><?=anchor('hea/pmhn_gagal/'.$k->id, 'GAGAL')?></div></td>
			</tr>
		<?endforeach?>

		<tbody>
		</table>
    </div>

	
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
