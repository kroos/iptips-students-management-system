<?php extend('base_template_user') ?>
	<?php startblock('head')?>
		<?//= get_extended_block() ?>
		
	<?php endblock()?>
	
	<?php startblock('head') ?>
    <title>ISMS : <?=$title?></title>
    <?php endblock()?>
    
    <?php startblock('content') ?>
        <h2><?=$title?></h2>
        <div class="info"><?=@$info?>
                    <?php echo validation_errors(); ?></div>
        <div class="form_setting">
            <?=form_open()?>
            <table>
                <tbody>
                    <tr>
                        <td><label>Nama</label></td>
                        <td><?=form_input(array('name' => 'nama', 'value' => set_value('nama'), 'maxlength' => '50', 'size' => '30', 'id' => 'nama'))?>
                        <br /><?=form_error('nama')?></td></tr>
                    <tr><td><label>Nombor Kad Pengenalan</label></td>
                        <td><?php echo form_input(array('name' => 'ic', 'value' => set_value('ic'), 'id' => 'ic', 'size' => '12', 'maxlength'=>'12'))?>
                        <br /><?=form_error('ic')?></td></tr>
                    <tr><td><label>Nombor Passport</label></td>
                        <td><?php echo form_input(array('name' => 'passport', 'value' => set_value('passport'), 'id'=>'passport'))?>
                        <br /><?=form_error('passport')?></td></tr>
                    <tr><td><label>Tarikh Lahir<lable></td>
                        <td><?=form_input(array('name' => 'dt_lahir', 'value' => set_value('dt_lahir'), 'id' => 'dt_lahir', 'size' => '12' ))?>
                        <br /><?=form_error('dt_lahir')?></td></tr>
                    <tr><td><label>Tempat Lahir<label></label></td>
                        <td><?=form_input(array('name' => 'tempat_lahir', 'value' => set_value('tempat_lahir'), 'id' => 'tempat_lahir', 'size' => '12' ))?>
                        <br /><?=form_error('tempat_lahir')?></td></tr>
                    <tr><td><label>Taraf Warganegara<label></label></td>
                        <td><?=form_input(array('name' => 'status_warga', 'value' => set_value('status_warga'), 'id' => 'status_warga', 'size' => '12' ))?>
                        <br /><?=form_error('status_warga')?></td></tr>
                    <tr><td><label>Warganegara<label></label></td>
                        <td><?=form_input(array('name' => 'warganegara', 'value' => set_value('warganegara'), 'id' => 'warganegara', 'size' => '12' ))?>
                        <br /><?=form_error('warganegara')?></td></tr>
                    <tr><td><label>Bangsa<label></label></td>
                        <td><?=form_input(array('name' => 'bangsa', 'value' => set_value('bangsa'), 'id' => 'bangsa', 'size' => '12' ))?>
                        <br /><?=form_error('bangsa')?></td></tr>
                    <tr><td><label>Jantina<label></label></td>
                        <td><?=form_input(array('name' => 'jantina', 'value' => set_value('jantina'), 'id' => 'jantina', 'size' => '12' ))?>
                        <br /><?=form_error('jantina')?></td></tr>
                    <tr><td><label>Taraf Perkawinan<label></label></td>
                        <td><?=form_input(array('name' => 'status_kahwin', 'value' => set_value('status_kahwin'), 'id' => 'status_kahwin', 'size' => '12' ))?>
                        <br /><?=form_error('status_kahwin')?></td></tr>
                    <tr><td><label>Alamat<label></label></td>
                        <td><?=form_input(array('name' => 'alamat1', 'value' => set_value('alamat1'), 'id' => 'alamat1', 'size' => '30', 'maxlength' =>'255' ))?>
                        <br /><?=form_error('alamat1')?></td></tr>
                    <tr><td><label><label></label></td>
                        <td><?=form_input(array('name' => 'alamat2', 'value' => set_value('alamat2'), 'id' => 'alamat2', 'size' => '30' ))?>
                        <br /><?=form_error('alamat2')?></td></tr>
                    <tr><td><label>Poskod<label></label></td>
                        <td><?=form_input(array('name' => 'poskod', 'value' => set_value('poskod'), 'id' => 'poskod', 'size' => '12' ))?>
                        <br /><?=form_error('poskod')?></td></tr>
                    <tr><td><label>Bandar<label></label></td>
                        <td><?=form_input(array('name' => 'bandar', 'value' => set_value('bandar'), 'id' => 'bangsa', 'size' => '12' ))?>
                        <br /><?=form_error('bandar')?></td></tr>
                    <tr><td><label>Negeri<label></label></td>
                        <td><?=form_input(array('name' => 'negeri', 'value' => set_value('negeri'), 'id' => 'negeri', 'size' => '12' ))?>
                        <br /><?=form_error('negeri')?></td></tr>
                    <tr><td><label>Negara<label></label></td>
                        <td><?=form_input(array('name' => 'negara', 'value' => set_value('negara'), 'id' => 'negara', 'size' => '12' ))?>
                        <br /><?=form_error('negara')?></td></tr>
                    <tr><td></td><td><?=form_submit('simpan','Seterusnya>>','class="submit"')?></td></tr>
                    
                </tbody>
            </table>
            <?=form_close()?>
        </div>
	<?php endblock()?>
	
  
<?php end_extend() ?>
