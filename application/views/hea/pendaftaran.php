<? extend('base_template_user') ?>

	<? startblock('content') ?>		
		<h1>Selamat Datang ke <?=$this->config->item('insts')?> Students Management System</h1>
		<h2>Pendaftaran Pelajar</h2>                
			<div id="accordion">
			<h3>Bantuan</h3>
			<p>Dibawah adalah senarai pelajar-plajar yang permohonannya berjaya<br />
			atau<br />
			anda masukkan nombor kad pengenalan, no passport atau nama pelajar untuk carian</p>
			</div>
	<? endblock() ?>
	
	<?php startblock('jscript')?>
	<script type="text/javascript" src="<?php echo base_url()?>js/jquery/jquery.table.addrow.js"></script>
	<?=get_extended_block() ?>
	<script>
		$(document).ready(function(){
			$(".addRow").btnAddRow();
			$(".delRow").btnDelRow();
	
			$( "#accordion" ).accordion({
				collapsible: true
			});
		});
	</script>
	<?php endblock()?>

<? end_extend() ?>