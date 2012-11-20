<? extend('base_template.php') ?>
<? startblock('head') ?>
<title><?=$title?></title>
<? endblock()?>
<? startblock('content') ?>
    <h1><?=$title?></h1>
    <?=@$info?>
    <div class="form_settings">
	    <?php echo form_open('pendaftar/senarai_pemohon')?>
	    <table>
	    	<tr><td><?php echo form_input(array('name' => 'nama', 'value' => set_value('nama'), 'maxlength' => '50', 'size' =>30))?>
	    	<?php echo form_submit(array('name'=>'cari', 'value'=>'Cari', 'class'=>'submit'))?></td></tr>
	    </table>
	    <?php echo form_close()?>
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
        	foreach($pemohon as $pemohons) {
        		echo '<tr><td>'.$i++.
        			'</td><td>'.$pemohons['nama'].
        			'</td><td>'.$pemohons['ic'].
        			'</td><td>'.$pemohons['warganegara'].
        			'</td></tr>';
        	}
        	?>
        </tbody>
    </table>
<? endblock() ?>
