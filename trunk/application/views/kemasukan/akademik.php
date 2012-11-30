<? extend('base_template_user') ?>

	<? startblock('content') ?>		
    	<h1>Selamat Datang ke IPTIPs Students Management System</h1>
		<h2><?=$title?></h2>                
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Masukkan kelayakan akademik pelajar</p>
        </div>

		<div id="info"><?=@$info?><?php echo validation_errors(); ?></div>
                <div class="demo">
                <div class="form_settings">
                    <?=form_open()?>
	                    <p><span><?php echo form_label('Institisi Pengajian', 'institusi')?></span>
	                            <?=form_input(array('name'=>'institusi', 'id'=>'institusi', 'size'=>'30'))?></p>

                        <p><span><?php echo form_label('Tahun Tamat Pengajian', 'tahun')?></span>
	                            <?=form_input(array('name'=>'tahun', 'id'=>'tahun', 'value'=>set_value('tahun'), 'size'=>'4'))?></p>

	                    <p><span><?php echo form_label('Tahap Pengajian', 'level')?></span>
	                           <?=form_input(array('name'=>'level', 'id'=>'level', 'value'=>set_value('level'), 'size'=>'12'));?></p>
							   
	                    <table class="tab_form">
		                    <thead>
			                    <tr>
			                    	<th>Mata Pelajaran</th>
									<th>Gred</th>
                                    <th><?=form_button('addRow', '+', 'class="addRow"')?></th>
			                    </tr>
		                    </thead>
		                    <tbody>
		                        <tr>
		                            <td><?=form_input(array('name'=>'gred[]', 'id'=>'gred', 'value'=>set_value('gred'), 'size'=>'12'))?></td>
		                            <td><?=form_input(array('name'=>'gred[]', 'id'=>'gred', 'value'=>set_value('gred'), 'size'=>'4'))?></td>
                                            <td><?=form_button('delRow', '-', 'class="delRow"')?></td>
	                        	</tr>
	                        </tbody>
	                    </table>
	                    
	                    <p><?=form_submit('simpanTam', 'Simpan & Tambah Kelayakan', 'class=submit')?><?=form_submit('simpan', 'Seterusnya', 'class=submit')?></p>
                    <?=form_close()?>
                </div>
		
		 
         	<?=anchor('kemasukan/permohonan_baru/'.$this->uri->segment(3, 0), 'Kembali', array('title' => 'Kembali'))?>
		</div>
	<? endblock() ?>

	<?php startblock('jscript')?>
	<script type="text/javascript" src="<?php echo base_url()?>js/jquery/jquery.table.addrow.js"></script>
		<?=get_extended_block() ?>
		<script>
			$(document).ready(function(){
				$(".addRow").btnAddRow();
				$(".delRow").btnDelRow();

		        $( "#accordion" ).accordion({
		            collapsible: true
		        });
			});
		</script>
	<?php endblock()?>

<? end_extend() ?>