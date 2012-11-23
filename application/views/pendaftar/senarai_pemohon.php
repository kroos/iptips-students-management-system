<? extend('base_template_user') ?>

<? startblock('content') ?>
    <h1><?=$title?></h1>
    <div class="info"><?=@$info?></div>
    <div class="form_settings">
	    <?=form_open()?>
			<?=form_input(array('name' => 'nama', 'value' => set_value('nama'), 'maxlength' => '50', 'size' =>30))?>
	    	<?=form_submit(array('name'=>'cari', 'value'=>'Cari', 'class'=>'submit'))?></td></tr>
	    <?=form_close()?>
    </div>
	<table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Nombor Kad Pengenalan/Passport</th>
                <th>Warganegara</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	<?php 
        	$i=1;
        	foreach($pemohon->result() as $pemohons) {
        		echo '<tr><td>'.anchor('pendaftar/detail_pemohon/'.$pemohons['id'], $i++, array('title' => 'Keterangan Pemohon')).
        			'</td><td>'.$pemohons['nama'].
        			'</td><td>'.$pemohons['ic'].
        			'</td><td>'.$pemohons['warganegara'].
        			'</td><td>'.anchor('pendaftar/detail_pemohon/'.$pemohons['id'], 'Kemaskini', array('title' => 'Kemaskini Pemohon')).
        			'</td></tr>';
        	}
        	?>
        </tbody>
    </table>
<? endblock() ?>
<? end_extend()?>
