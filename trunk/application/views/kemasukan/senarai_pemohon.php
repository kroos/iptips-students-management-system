<? extend('base_template_user') ?>

<? startblock('content') ?>
	<h2><?=$title?></h2>

	<div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Sila masukkan nama pemohon/kad pengenalan/passport, klik pada butang cari. 
	        <br>Senarai pemohon yang anda cari akan dipaparkan. 
	        <br>Kosongkan field dan klik butang untuk dapatkan semua senarai pemohon.
			</p>
	</div>

    <p><font color="#FF0000"><?=@$info?></font></p>

    <div class="form_settings">
	    <?=form_open()?>
            <p><span>Carian</span>
			<?=form_input(array('name' => 'nama', 'value' => set_value('nama'), 'maxlength' => '50', 'size' => '30', 'id' => 'nama', 'title' => 'masukkan nama/nombor KP/nombor pasport'))?>
			<br /><?=form_error('nama')?></p>

			<p><span>&nbsp;</span><?=form_submit(array('name' => 'cari', 'value' => 'Cari', 'class' => 'submit'))?></p>
	    <?=form_close()?>
    </div>

<div class="demo"><?=anchor('kemasukan/senarai_pemohon', 'Senarai Penuh')?></div>

	<?if($pemohon->num_rows() < 1):?>
		<p><font color="#FF0000">Tiada dijumpai</font></p>
	<?else:?>
		<div class="demo">
		<p><?=$paginate?></p>
			<table style="width:100%; border-spacing:0;">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama</th>
						<th>Nombor Kad Pengenalan/Passport</th>
						<th>Warganegara</th>
						<th>Sesi Mohon</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?$i = 1?>
				<?foreach($pemohon->result() as $p):?>
					<tr>
						<td><?=$i++?></td>
						<td><?=anchor('kemasukan/detail_pemohon/'.$p->id, $p->nama, array('title' => 'Keterangan Pemohon'))?></td>
						<td><?=$p->ic?> / <?=$p->passport?></td>
						<?foreach($negara->result() as $h):?>
							<?if ($h->kodnegara == $p->warganegara):?>
								<td><?=$h->namanegara?></td>
							<?endif?>
						<?endforeach?>
						<td><?=$p->sesi_mohon?></td>
						<td><?=anchor('kemasukan/edit_permohonan/'.$p->id, 'Kemaskini', array('title' => 'Kemaskini Pemohon'))?></td>
					</tr>
				<?endforeach?>
				</tbody>
			</table>
		</div>
	<?endif?>
<? endblock() ?>

<?php startblock('jscript')?>
	<?=get_extended_block() ?>
	<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery.hints.js"></script>
	<script>
		$(document).ready(function(){	
	        $('input[title!=""]').hint();
		});
	</script>
<?php endblock()?>

<? end_extend()?>
