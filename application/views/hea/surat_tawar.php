<?php extend($base)?>
	<?php startblock('title')?>
	<?php echo $title;?>
	<?php endblock()?>
	
	<?php startblock('top_navi')?>
	<?php //('top_navi') ?>
	<?php endblock()?>
	
	<?php startblock('content')?>
	
		<?php echo form_open('hea/surat_tawar', array("target"=>"_blank"))?>
			<?php echo $pdf?>
		<?php echo form_close()?>
		
		<?php //$header = $template->row()->header;
			//eval("\$header = \"$header\";");
			//eval($header);
			$header = "echo '$header';";
			eval($header);?>
		<?php echo eval($address = "echo '$address';");?>
		<?php echo eval($title = "echo '$title';");?>
		<?php echo eval($content1 = "echo '$content1';");?>
		<?php echo eval($content2 = "echo '$content2';");?>
		<?php echo eval($content3 = "echo '$content3';");?>
		<?php echo eval($signiture = "echo '$signiture';");?>
		<?php echo eval($footer = "echo '$footer';");?>
	<?php endblock()?>
<?php end_extend()?>