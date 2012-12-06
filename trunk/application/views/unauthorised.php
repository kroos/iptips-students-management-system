<? extend('base_template_user') ?>

	<? startblock('content') ?>
		<h2>Akses adalah tidak dibenarkan.</h3>
		<p>Sila klik "Back button" untuk kembali ke mukasurat sebelum ini.</p>
		<p><font color="#FF0000"><?=@$info?></font></p>
		<div class="demo">
		<p><!-- <a href="#" onclick="history.go(-1);return false;">BACK</a> --><?=anchor('#', 'BACK', array('onclick' => 'history.go(-1);return false;'))?></p>
		</div>
	<? endblock() ?>

<? end_extend() ?>