<? extend('base_template_user') ?>

<? startblock('content') ?>
	<!-- variable $title dapat dari controller ( $data['title'] )  -->
	<h2>Surat Tawaran</h2>

	<!-- sedikit keterangan apa yang page ni dapat buat utk user...  -->
	<div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Berikut adalah pemohon yang ditawar program:<br />
				1.&nbsp;Sila klik pada butang "Surat Tawaran" untuk pencetakan surat tawaran<br />
			</p>
	</div>
    <p><font color="#FF0000"><?=@$info?></font></p>

<?$z = $this->program->GetAll(NULL, NULL)?>
<?foreach($z->result() as $x):?>
<?$subj[$x->kod_prog] = $x->namaprog_MY?>
<?endforeach?>
	<div class="demo"><?=$paginate?></div>
    <div class="form_settings">
    	<?php echo form_open()?>
	    	<p><span>Carian :</span>
	    		<?php echo form_input()?></p>
	    	<p><?php echo form_submit('cari', 'cari', 'class="submit"')?>
    	<?php echo form_close()?>
    
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
						<?php $program = $this->program->GetWhere(array('kod_prog'=>$k->progTawar), NULL, NULL);
						echo $k->progTawar.' : '.$program->row()->namaprog_MY;?>
					</td>
					<td style="border-right-style: solid; border-right-width: 1px">
						<?php echo $k->sesi_mohon?>
					</td>
					<td><?php 
							echo form_open('kemasukan/surat_tawar', '', array('id_mohon' => $k->id));
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
