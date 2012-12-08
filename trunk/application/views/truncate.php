<? extend('base_template_user') ?>

	<? startblock('content') ?>
		<h2>Kosongkan System</h2>
		<p><strong><font color="#FF0000">Fungsi ini adalah untuk mengosongkan sistem. Gunakan ia hanya untuk memperbaharui sistem ini. Tindakan ini adalah kekal dan segala pengkalan data adalah tidak boleh direstore semula</font></strong></p>
		<p><font color="#FF0000"><?=@$info?></font></p>

		<div class="demo">
		<?=form_open()?>
            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('truncate', 'Padam Pengkalan Data')?></p>
		<?=form_close()?>
		</div>

	<? endblock() ?>

<? end_extend() ?>