<? extend('base_template_user') ?>

	<? startblock('content') ?>
                <h2><?=$title?></h2>
		<div id="info">
                    <?=@$info?>
                    <?php echo validation_errors(); ?>
                </div>
                
                <div ic="form_setting">
                    <?=form_open()?>
                    <table>
                        <tr><td><label>Institisi Pengajian</label></td>
                            <td><?=form_hidden(array('name'=>'id_mohon', 'id'=>'id_mohon', 'value'=>'1'))  #set_value('id_mohon')))?><?=form_input(array('name'=>'institusi', 'id'=>'institusi', 'size'=>'30'))?></td></tr>
                        <tr><td><label>Tahun Tamat Pengajian</label></td>
                            <td><?=form_input(array('name'=>'tahun', 'id'=>'tahun', 'value'=>set_value('tahun'), 'size'=>'4'))?></td></tr>
                        <tr><td><label>Tahap Pengajian</label></td>
                            <td><?=form_input(array('name'=>'level', 'id'=>'level', 'value'=>set_value('level'), 'size'=>'12'));?></td></tr>
                    </table>
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
                </div>


	<? endblock() ?>

<? end_extend() ?>