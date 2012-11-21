<? extend('base_template_user') ?>

	<? startblock('head') ?>
	<title><?=$title?></title>
	<? endblock()?>
	<? startblock('content') ?>
		<h1><?=$title?></h1>
		<?php foreach ($field as $fields) {
			echo $fields.': '.$pemohon[$fields].'<br>';
		}?>
		<p><?php //echo $pemohon['nama']?></p>
		<div class="info"><?=@$info?></div>



	<? endblock() ?>

<? end_extend() ?>