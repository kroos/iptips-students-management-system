<? extend('base_template_user') ?>

<? startblock('content') ?>
	<!-- letak <h1> supaya nampak standardize...  -->
    <h1>Selamat Datang ke IPTIPs Students Management System</h1>

	<!-- variable $title dapat dari controller ( $data['title'] )  -->
	<h2><?=$title?></h2>

	<!-- sedikit keterangan apa yang page ni dapat buat utk user...  -->
	<p>Sila masukkan nama pemohon, klik pada butang cari. Senarai pemohon yang anda cari akan dipaparkan</p>

	<!-- variable $info hanya akan dipaparkan selepas button submit di"klik" yang mana ia akan memberitahu user samada proses berjaya atau tidak mengikut input yg telah diberikan kepada user  -->
    <p><font color="#FF0000"><?=@$info?></font></p>

	<!-- <div class="form_settings"> dari template  -->
    <div class="form_settings">
	    <?=form_open()?>

			<p>
			<!--  span ni mai dari template, buat laa sikit supaya nampak cantik, sekurang2nya komen dari user tak boleh kata "unfriendly user" -->
			<span><?=form_label('Nama', 'nama')?> : </span>
			<?=form_input(array('name' => 'nama', 'value' => set_value('nama'), 'maxlength' => '50', 'size' => '30', 'id' => 'nama'))?><br />
			<!-- form_error function kena letak, supaya user dapat tau kalau form tak diproses sepenuhnya jika ada kesalahan input dari user....  -->
			<?=form_error('nama')?>
			</p>

			<p>
			<!--  macam biasa, dari template html yang aku dapat dari google, tujuan nak bagi cantik dan teratur.... -->
			<span>&nbsp;</span>
	    	<?=form_submit(array('name' => 'cari', 'value' => 'Cari', 'class' => 'submit'))?>
			</p>
	    <?=form_close()?>
    </div>

<!--  table kat bawah ni, user taka akan nampak selagi mana form tak diproses.. i.e kalau tak klik submit button, maka table x nampak -->
<!--  cuba sedaya mungkin utk gunakan php shorthand supaya mudah utk lihat code -->
<?if($this->form_validation->run() == TRUE):?>

	<!-- kalau process di controller return 0 rows ( ->num_rows() equivalent to mysql_num_rows() ) -->
	<?if($pemohon->num_rows() < 1):?>
		<p>Nama yang anda cari tidak dapat dijumpai</p>
	<?else:?>
				<!-- <div class="demo"> = utk bg cantik supaya semua anchor dpt di"jquery"kan -->
				<div class="demo">

				<!-- style utk table adalah dari template -->
					<table style="width:100%; border-spacing:0;">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama</th>
								<th>Nombor Kad Pengenalan/Passport</th>
								<th>Warganegara</th>
								<th>&nbsp;</th>
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
						<?foreach($pemohon->result() as $p):?>
							<tr>
								<!-- utk pengetahuan, kalau scratch coding, syntax $p['id'] ni adalah betul, tp dlm CI, ia diringkaskan lagi jadi mcm ni, $p->id -->
								<td><?=anchor('pendaftar/detail_pemohon/'.$p->id, $i++, array('title' => 'Keterangan Pemohon'))?></td>
								<td><?=$p->nama?></td>
								<td><?=$p->ic?></td>
								<td><?=$p->warganegara?></td>
								<td><?=anchor('pendaftar/detail_pemohon/'.$p->id, 'Kemaskini', array('title' => 'Kemaskini Pemohon'))?></td>
							</tr>
						<?endforeach?>
						</tbody>
					</table>
				</div>
				
		<!-- end php code of [ if($pemohon->num_rows() < 1) ] -->
		<?endif?>

<!-- end php code of [ if($this->form_validation->run() == TRUE) ] -->
<?endif?>

<!-- check kat ./application/config/form_validation.php	<-- isi apa yang patut -->

<? endblock() ?>
<? end_extend()?>