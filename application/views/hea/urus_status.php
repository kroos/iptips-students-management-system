<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
	<?$l = $this->pelajar->GetWhere(array('matrik' => $this->uri->segment(3, 0)), NULL, NULL)?>
	<?$p = $this->pel_sem->GetWhere(array('matrik' => $this->uri->segment(3, 0)), NULL, NULL)?>
	<?$h = $this->program->GetWhere(array('kod_prog' => $p->row()->kod_prog))?>
        <h2>Kemaskini Status Pelajar</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Penukaran status dari AKTIF ke Penangguhan atau Ulang Semester bagi pelajar :<br />
			<?=$l->row()->nama?><br />
			<?=$h->row()->namaprog_MY?>
			</p>
        </div>

        <div class="info"><?=@$info?></div>
<?php
foreach($st->result() as $m)
	{
		$stat[$m->kodstatus] = $m->status_MY;
	}
?>
        <div class="form_settings">
            <?=form_open('', '', array('matrik' => $this->uri->segment(3, 0)))?>

			<p><span><?=form_label('Status', 'stat')?></span>
			<?=form_dropdown('stat', $stat, set_value('stat'), 'id="stat"')?>
			<br /><?=form_error('stat')?></p>

			<p><span><?=form_label('Status Detail', 'stat1')?></span>
			<?//=form_dropdown('stat', $stat, set_value('stat'), array('id' => 'stat'))?>
			<select name="statDtl" id="stat1"></select>
			<br /><?=form_error('statDtl')?></p>

			<p><span>&nbsp;</span><?=form_submit('save', 'Simpan', 'class="submit"')?></p>
		</div>
		<?=form_close()?>
	<?php endblock()?>

	<?php startblock('jscript')?>
		<?=get_extended_block()?>
		<script type="text/javascript" src="<?php echo base_url()?>js/jquery/jquery.cookies.2.2.0.js"></script>
		<script>
			$(document).ready(function() {
	
				$("#stat").change(function(){
					stat1();
				});
				
				function stat1(){
					$.post('<?=base_url().'select_list/select_status'?>',
						{	
							<?=$this->config->item('csrf_token_name'); ?>: $.cookies.get("<?=$this->config->item('csrf_cookie_name')?>"), //pass token cookie name klu x ajax xjln
							stat: $("#stat").val(),
							stat1: $('#stat1').val()
						},
						function(data){
							$('#stat1').html(data);
						}
					);
				}

				setTimeout(function(){stat1()}, 0);

		    });
	    </script>
	<?php endblock()?>

<?php end_extend() ?>