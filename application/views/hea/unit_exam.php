<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Jana Keputusan Peperiksaan</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Tekan button Jana Keputusan</p>
        </div>

        <div class="info"><?=@$info?></div>
<?/*?>
        <div class="form_settings">
            <?=form_open()?>

			<p><span><?=form_label('Nama Staff', 'ic')?></span>
			<?=form_input(array('name' => 'ic', 'value' => set_value('ic'), 'id' => 'ic'))?>
			<br /><?=form_error('ic')?></p>

			<p><span>&nbsp;</span><?=form_submit('cari', 'Cari','class="submit"')?></p>
		<?=form_close()?>
		</div>
<?//*/?>
	<?php endblock()?>

<?php end_extend() ?>