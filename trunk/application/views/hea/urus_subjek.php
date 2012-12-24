<?php extend('base_template_user') ?>
    
    <?php startblock('content') ?>
        <h2>Kemaskini Matapelajaran Pelajar</h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Kemaskini matapelajaran pelajar<br />
			Format bagi matapelajaran adalah seperti berikut :<br />
			KOD SUBJEK | SUBJEK | JAM KREDIT
			</p>
        </div>

        <div class="info"><?=@$info?></div>

<?php
$pelsem = $this->pel_sem->GetWhere(array('matrik' => $this->uri->segment(3, 0), 'aktif' => 1), NULL, NULL);
$sem = array(
				1 => 'Semester 1',
				2 => 'Semester 2',
				3 => 'Semester 3',
				4 => 'Semester 4',
				5 => 'Semester 5',
				6 => 'Semester 6'
			);
?>
        <div class="form_settings">
            <?=form_open('', '', array('matrik' => $this->uri->segment(3, 0)))?>

			<p><span><?=form_label('Semester', 'sem')?></span>
			<?=form_dropdown('sem', $sem, set_value('sem'), 'id="sem"')?>
			<br /><?=form_error('sem')?></p>

			<p><span><?=form_label('Matapelajaran', 'subjek')?></span>
			<?//=form_dropdown('subjek', $subjek, set_value('subjek'), array('id' => 'subjek'))?>
			<select name="subjek" id="subjek"></select>
			<br /><?=form_error('subjek')?></p>

			<p><span>&nbsp;</span><?=form_submit('save', 'Tambah', 'class="submit"')?></p>
		</div>
		<?=form_close()?>

		<?if($m->num_rows() < 1):?>

			<div class="info">Tiada subjek didaftarkan</div>

		<?else:?>

			<div class="demo">
				<table style="width:100%; border-spacing:0;">
					<tr>
						<th>Kod Subjek</th>
						<th>Subjek</th>
						<th>Semester</th>
						<th>Sesi</th>
						<th>Kredit</th>
						<th>&nbsp;</th>
					</tr>
					<?$i = 0?>
					<?foreach($m->result() AS $v):?>
						<tr>
							<td><?=$v->kodsubjek?></td>
							<td><?=$this->subjek->GetWhere(array('kodsubjek' => $v->kodsubjek), NULL, NULL)->row()->namasubjek_MY?></td>
							<td><?=$v->sem?></td>
							<td><?=$v->sesi?></td>
							<td><?=$v->kredit?><?$i += $v->kredit?></td>
							<td><?=anchor('hea/drop_subj/'.$this->uri->segment(3, 0).'/'.$v->id, 'Drop')?></td>
						</tr>
					<?endforeach?>
						<tr>
							<td colspan="4">Jumlah Kredit</td>
							<td><strong><?=$i?> Kredit</strong></td>
							<td>&nbsp;</td>
						</tr>
				</table>
			</div>
		<?endif?>
	<?php endblock()?>

	<?php startblock('jscript')?>
		<script src="<?=base_url()?>js/jquery/jquery-ui-1.9.1.custom.js"></script>
		<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="<?php echo base_url()?>js/jquery/jquery.cookies.2.2.0.js"></script>
		<script>
			$(function() {
				$( "input[type=submit], a, button", ".demo" )
					.button();
				$( "#radioone" ).buttonset();
				$( "#radiotwo" ).buttonset();

				// Datepicker
				$('#datepicker').datetimepicker({dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss", showSecond: true, showMillisec: false, ampm: false, stepHour: 1, stepMinute: 1, stepSecond: 5});

				$( "#accordion" ).accordion({
					collapsible: true
				});
			});
		</script>


		<script>
			$(document).ready(function() {
	
				$("#sem").change(function(){
					subjek();
				});
				
				function subjek(){
					$.post('<?=base_url().'select_list/select_sem/'.$this->uri->segment(3, 0)?>',
						{	
							<?=$this->config->item('csrf_token_name'); ?>: $.cookies.get("<?=$this->config->item('csrf_cookie_name')?>"), //pass token cookie name klu x ajax xjln
							sem: $("#sem").val(),
							subjek: $('#subjek').val()
						},
						function(data){
							$('#subjek').html(data);
						}
					);
				}

				setTimeout(function(){subjek()}, 0);

		    });
	    </script>
	<?php endblock()?>

<?php end_extend() ?>