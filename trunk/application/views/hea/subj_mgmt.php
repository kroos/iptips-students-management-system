<? extend('base_template_user') ?>

<? startblock('content') ?>
	<!-- variable $title dapat dari controller ( $data['title'] )  -->
	<h2><?=$title?></h2>

	<!-- sedikit keterangan apa yang page ni dapat buat utk user...  -->
	<div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Sila masukkan nama subjek/kod subjek, klik pada butang cari. 
	        <br>Senarai subjek yang anda cari akan dipaparkan. 
	        <br>Kosongkan field dan klik butang untuk dapatkan semua senarai subjek.
			</p>
	</div>

	<!-- variable $info hanya akan dipaparkan selepas button submit di"klik" yang mana ia akan memberitahu user samada proses berjaya atau tidak mengikut input yg telah diberikan kepada user  -->
    <p><font color="#FF0000"><?=@$info?></font></p>

	<!-- <div class="form_settings"> dari template  -->
    <div class="form_settings">
	    <?=form_open()?>
            <p><span>Carian</span>
			<?=form_input(array('name' => 'nama', 'value' => set_value('nama'), 'maxlength' => '50', 'size' => '30', 'id' => 'nama', 'title' => 'masukkan nama subjek/kod subjek'))?>
			<br /><?=form_error('nama')?></p>

			<p><span>&nbsp;</span><?=form_submit(array('name' => 'cari', 'value' => 'Cari', 'class' => 'submit'))?></p>
	    <?=form_close()?>
    </div>

<!--  table kat bawah ni, user taka akan nampak selagi mana form tak diproses.. i.e kalau tak klik submit button, maka table x nampak -->
<!--  cuba sedaya mungkin utk gunakan php shorthand supaya mudah utk lihat code -->
<?//if($this->form_validation->run() == TRUE):?>

	<!-- kalau process di controller return 0 rows ( ->num_rows() equivalent to mysql_num_rows() ) -->
	<?if($subjek->num_rows() < 1):?>
		<p>Tiada dijumpai</p>
	<?else:?>
				<!-- <div class="demo"> = utk bg cantik supaya semua anchor dpt di"jquery"kan -->
				<div class="demo">

				<p><?=$paginate?></p>
				<!-- style utk table adalah dari template -->
					<table style="width:100%; border-spacing:0;">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Subjek</th>
								<th>Kod Subjek</th>
								<th>Kredit</th>
							</tr>
						</thead>
						<tbody>
							<?php
							//aku comment out semua ni dan cuba hang bandingkan dgn apa yg aku buat kat bawah
							/*
							$i=1;
							foreach($pemohon->result() as $pemohons)
								{
									echo '<tr><td>'.anchor('pendaftar/detail_pemohon/'.$pemohons['id'], $i++, array('title' => 'Keterangan Pemohon')).
										'</td><td>'.$pemohons['nama'].
										'</td><td>'.$pemohons['ic'].
										'</td><td>'.$pemohons['warganegara'].
										'</td><td>'.anchor('pendaftar/detail_pemohon/'.$pemohons['id'], 'Kemaskini', array('title' => 'Kemaskini Pemohon')).
										'</td></tr>';
								}
							*/
							?>
						<?$i = 1?>
						<?foreach($subjek->result() as $p):?>
							<tr>
								<!-- utk pengetahuan, kalau scratch coding, syntax $p['id'] ni adalah betul, tp dlm CI, ia diringkaskan lagi jadi mcm ni, $p->id -->
								<td><?=$i++?></td>
								<td><?=anchor('hea/detail_subj/'.$p->id, $p->namasubjek_MY, array('title' => 'Keterangan Subjek'))?></td>
								<td><?=$p->kodsubjek?></td>
								<td><?=$p->kredit?></td>
							</tr>
						<?endforeach?>
						</tbody>
					</table>
				</div>
				
		<!-- end php code of [ if($pemohon->num_rows() < 1) ] -->
		<?endif?>

<!-- end php code of [ if($this->form_validation->run() == TRUE) ] -->
<?//endif?>

<!-- check kat ./application/config/form_validation.php	<-- isi apa yang patut -->
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
