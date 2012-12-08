<?php extend($base)?>
	<?php startblock('title')?>
	<?php echo $title;?>
	<?php endblock()?>
	
	<?php startblock('top_navi')?>
	<?php //('top_navi') ?>
	<?php endblock()?>
	
	<?php startblock('content')?>
	
		<?php echo form_open('', array("target"=>"_blank"))?>
			<?php echo $pdf?>
			<?php echo $print?>
		<?php echo form_close()?>
		
		<?php 
			$header = "echo '$header';";
			eval($header);?>
		<?php echo eval($address = "echo '$address';");?>
		<?php echo eval($title_surat = "echo '$title_surat';");?>
		<?php echo eval($content1 = "echo '$content1';");?>
		<?php echo eval($content2 = "echo '$content2';");?>
		<?php echo eval($content3 = "echo '$content3';");?>
		<?php echo eval($signiture = "echo '$signiture';");?>
		<?php echo eval($footer = "echo '$footer';");?>
	<?php endblock()?>
	
	<?php startblock('jscript')?>
	<?php //echo $jquery?>
	<script>
		
		<?php echo $cetak;?>
	</script>
	<?php endblock()?>
	
<?php end_extend()?>
