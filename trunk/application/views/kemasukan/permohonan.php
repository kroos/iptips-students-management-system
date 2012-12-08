<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2><?php echo $title?></h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Masukkan nombor kad pengenalan atau nombor passport.<br />
			Ini perlu dilakukan untuk mengetahui status permohonan samada dari <strong>pelajar baru</strong> atau dari <strong>bekas pelajar</strong>.</p>
        </div>
        <div class="info"><?=@$info?></div>
        <div class="form_settings">
            <?=form_open()?>

			<p><span><?=form_label('Nombor Kad Pengenalan / No Passport', 'ic')?></span>
			<?=form_input(array('name' => 'ic', 'value' => set_value('ic'), 'id' => 'ic', 'size' => '12', 'maxlength'=>'12'))?>
			<br /><?=form_error('ic')?></p>

			<p><span>&nbsp;</span><?=form_submit('check','Seterusnya>>','class="submit"')?></p>
		</div>
		<?=form_close()?>
	<?php endblock()?>

<?php end_extend() ?>