<? extend('base_template_user') ?>

<? startblock('content') ?>
	<h2><?=$title?></h2>

	<div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Sila masukkan nama subjek/kod subjek, klik pada butang cari. 
	        <br>Senarai subjek yang anda cari akan dipaparkan. 
	        <br>Kosongkan field dan klik butang untuk dapatkan semua senarai subjek.
			</p>
	</div>

    <p><font color="#FF0000"><?=@$info?></font></p>

    <div class="form_settings">
	    <?=form_open()?>
            <p><span>Carian</span>
			<?=form_input(array('name' => 'nama', 'value' => set_value('nama'), 'maxlength' => '50', 'size' => '30', 'id' => 'nama', 'title' => 'masukkan nama subjek/kod subjek'))?>
			<br /><?=form_error('nama')?></p>

			<p><span>&nbsp;</span><?=form_submit(array('name' => 'cari', 'value' => 'Cari', 'class' => 'submit'))?></p>
	    <?=form_close()?>
    </div>

<?//if($this->form_validation->run() == TRUE):?>

	<?if($subjek->num_rows() < 1):?>
		<p>Tiada dijumpai</p>
	<?else:?>
				<div class="demo">

				<p><?=$paginate?></p>
					<table style="width:100%; border-spacing:0;">
						<thead>
							<tr>
								<th>&nbsp;</th>
								<th>Nama Subjek</th>
								<th>Kod Subjek</th>
								<th>Kredit</th>
							</tr>
						</thead>
						<tbody>
						<?$i = 1?>
						<?foreach($subjek->result() as $p):?>
							<tr>
								<td><?=$i++?></td>
								<td><?=anchor('hea/detail_subj/'.$p->id, $p->namasubjek_MY, array('title' => 'Keterangan Subjek'))?></td>
								<td><?=$p->kodsubjek?></td>
								<td><?=$p->kredit?></td>
							</tr>
						<?endforeach?>
						</tbody>
					</table>
				</div>
				
		<?endif?>

<?//endif?>

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
