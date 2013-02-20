<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Pendaftaran Pelajar ke Asrama Kediaman</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>sat laa</p>
        </div>

        <div class="info"><?=@$info?></div>

		<?=form_open()?>
		<div class="form_settings">

			<p><span><?=form_label('Kod Hostel', 'kodhostel')?></span>
			<?=form_input(array('name' => 'kodhostel', 'value' => set_value('kodhostel'), 'id' => 'kodhostel'))?>
			<br /><?=form_error('kodhostel')?></p>

			<p><span>&nbsp;</span><?=form_submit('simpan', 'Simpan','class="submit"')?></p>
		</div>
		<?=form_close()?>

			<?if($ps->num_rows() > 0):?>
				<div class="demo">
					<table style="width:100%; border-spacing:0;">
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						<?foreach($ps->result() AS $n):?>
							<tr>
								<td><??></td>
								<td><??></td>
								<td><??></td>
								<td><??></td>
								<td><??></td>
								<td><??></td>
							</tr>
						<?endforeach?>
					</table>
				</div>
			<?endif?>
	<?php endblock()?>

<?php end_extend() ?>