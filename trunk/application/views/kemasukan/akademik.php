<? extend('base_template_user') ?>

	<? startblock('content') ?>
                <h2><?=$title?></h2>
                <p>Masukkan kelayakan akademik pelajar</p>
		<div id="info">
                    <?=@$info?>
                    <?php echo validation_errors(); ?>
                </div>
                
                <div class="form_settings">
                    <?=form_open()?>
                    	<?=form_input(array('name'=>'id_mohon', 'id'=>'id_mohon', 'value'=>set_value('id_mohon' , $id_mohon)))  #set_value('id_mohon')))?>
	                    <p><span><?php echo form_label('Institisi Pengajian', 'institusi')?></span></td>
	                            <?=form_input(array('name'=>'institusi', 'id'=>'institusi', 'size'=>'30'))?></p>
                        <p><span><?php echo form_label('Tahun Tamat Pengajian', 'tahun')?></span>
	                            <?=form_input(array('name'=>'tahun', 'id'=>'tahun', 'value'=>set_value('tahun'), 'size'=>'4'))?>
	                    <p><span><?php echo form_label('Tahap Pengajian', 'level')?></span>
	                           <?=form_input(array('name'=>'level', 'id'=>'level', 'value'=>set_value('level'), 'size'=>'12'));?></p>p>
	                    
	                    <p><?=form_submit('simpan', 'Simpan', 'class=submit')?>
	                    <?=form_close()?>
	                    <?=form_open()?>
                    <table>
                        <tr>
                            <td><?=form_dropdown('subjek[]', $options)?></td>
                            <td><?=form_input(array('name'=>'gred', 'id'=>'gred', 'value'=>set_value('gred')))?></td>
                        </tr>
                    </table>
                    <?=form_close()?>
                    <?=anchor('kemasukan/permohonan_baru/'.$id_mohon, 'Kembali', array('title' => 'Kembali'))?>
                </div>
                <?php startblock('jscript')?>
					<?//=get_extended_block() ?>
				<?php endblock()?>


	<? endblock() ?>

<? end_extend() ?>