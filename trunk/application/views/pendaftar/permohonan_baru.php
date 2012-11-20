<? extend('base_template.php') ?>
<? startblock('head') ?>
<title><?=$title?></title>
<? endblock()?>
<? startblock('content') ?>
    <h1><?=$title?></h1>
    <?=@$info?>
    <?=form_open()?>
    <table>
        <tbody>
	        <tr>
	        	<td>Nama</td>
	        	<td><?=form_input(array('name' => 'nama', 'value' => set_value('nama'), 'maxlength' => '50', 'size' => '30', 'id' => 'nama'))?>
				<br /><?=form_error('nama')?></td></tr>
	        <tr><td>Nombor Kad Pengenalan/Pasport</td>
	            <td><?php echo form_input(array('name' => 'ic', 'value' => set_value('ic')))?></td></tr>
	        <tr><td>Tarikh Lahir</td>
	        	<td><?php echo form_input(array('name' => 'dt_lahir', 'value' => set_value('dt_lahir'), 'id' => 'dt_lahir', 'size' => '12' ))?></td></tr>
	    	<tr><td></td><td><?php echo form_submit()?></td></tr>
        </tbody>
    </table>
    <?=form_close()?>
<? endblock() ?>