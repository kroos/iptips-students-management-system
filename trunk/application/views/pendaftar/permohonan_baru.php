<? extend('base_template_user') ?>
	<? startblock('head') ?>
    <title><?=$title?></title>
    <? endblock()?>
    
    <? startblock('content') ?>
        <h1><?=$title?></h1>
        <div class="info"><?=@$info?></div>
        <div class="form_setting">
            <?=form_open()?>
            <table>
                <tbody>
                    <tr>
                        <td><label>Nama</label></td>
                        <td><?=form_input(array('name' => 'nama', 'value' => set_value('nama'), 'maxlength' => '50', 'size' => '30', 'id' => 'nama'))?>
                        <br /><?=form_error('nama')?></td></tr>
                    <tr><td><label>Nombor Kad Pengenalan</label></td>
                        <td><?php echo form_input(array('name' => 'ic', 'value' => set_value('ic'), 'id' => 'ic'))?>
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
                    <tr><td></td><td><?=form_submit('','Simpan','')?></td></tr>
                    
                </tbody>
            </table>
            <?=form_close()?>
        </div>
<? end_extend() ?>
