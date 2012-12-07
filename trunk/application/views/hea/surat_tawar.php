<?php extend($base)?>
	<?php startblock('title')?>
	<?php echo $title;?>
	<?php endblock()?>
	
	<?php startblock('top_navi')?>
	<?php //('top_navi') ?>
	<?php endblock()?>
	
	<?php startblock('content')?>
	
		<?php echo form_open('hea/surat_tawar', array("target"=>"_blank"))?>
			<?php echo form_submit('pdf_v', 'PDF', 'submit')?>
		<?php echo form_close()?>
		
		<?php echo eval($template->row('header'));?>
		<?php echo eval($template->row('address'));?>
		<?php echo eval($template->row('title'));?>
		<?php echo eval($template->row('content1'));?>
		<?php echo eval($template->row('content2'));?>
		<?php echo eval($template->row('content3'));?>
		<?php echo eval($template->row('signiture'));?>
		<?php echo eval($template->row('footer'));?>
	<?php endblock()?>
<?php end_extend()?>
