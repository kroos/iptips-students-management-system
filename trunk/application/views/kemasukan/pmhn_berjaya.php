<? extend('base_template_user') ?>

<? startblock('content') ?>
	<!-- variable $title dapat dari controller ( $data['title'] )  -->
	<h2>Permohonan Pelajar</h2>

	<!-- sedikit keterangan apa yang page ni dapat buat utk user...  -->
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
		<table>
		<thead>
			<tr>
				<th>Pemohon</th>
				<th>Program</th>
				<th>Sesi</th>
				<th>Surat Tawaran</th>
			</tr>
		</thead>
		<tbody>


		<?foreach($u->result() as $k):?>
			<tr>
				<td style="border-left-style: solid; border-left-width: 1px; border-top-style: solid; border-top-width: 1px"><strong><?=$k->nama?></strong></td>
				<td style="border-top-style: solid; border-top-width: 1px">
					<?php $program = $this->program->GetWhere(array('kod_prog'=>$k->progTawar));
					echo $k->progTawar.' : '.$program->row()->namaprog_MY;?>
				</td>
				<td style="border-right-style: solid; border-right-width: 1px">
					<?php $k->sesi_mohon?>
				</td>
				<td><?php 
						echo form_open('hea/surat_tawar', '', array('id_mohon' => $k->id));
						echo form_submit('surat', 'Surat Tawaran', 'class="submit"');
						echo form_close();
					?>
				</td>
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
