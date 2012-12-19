<? extend('base_template_user') ?>

	<? startblock('content') ?>		
		<h2><?=$title?></h2>                
			<div id="accordion">
			<h3>Bantuan</h3>
			<p>Masukkan kelayakan akademik pelajar</p>
			</div>
		
			<div class="info"><p><?=@$info?></p></div>
		<div class="demo">
		
			<?php if($akademik->num_rows>0) {?>
			
			<div id="info_akademik">
				<?php foreach ($akademik->result() as $a){?>
					<h4><?php echo $a->level;?></h4>
					<table>
						<tr><td>Institusi Pengajian</td>
							<td><?=$a->institusi;?></td></tr>
						<tr><td>Tahun Tamat Pengajian</td>
							<td><?=$a->tahun?></td></tr>
					</table>
				<?php }?>
			</div>
			
			<?php }?>
			
			<div class="form_settings">
				<?=form_open()?>
					<p><span><?php echo form_label('Institisi Pengajian', 'institusi')?></span>
					<?=form_input(array('name'=>'institusi', 'id'=>'institusi', 'value' => set_value('institusi'), 'size'=>'30'))?>
					<br /><?=form_error('institusi')?></p>

					<p><span><?php echo form_label('Tahun Tamat Pengajian', 'tahun')?></span>
					<?=form_input(array('name'=>'tahun', 'id'=>'tahun', 'value' => set_value('tahun'), 'size'=>'4'))?>
					<br /><?=form_error('tahun')?></p>

				<?foreach($lev->result() as $l):?>
				<?$opt[$l->kodtahap] = $l->tahap_MY?>
				<?endforeach?>
					<p><span><?php echo form_label('Tahap Pengajian', 'level')?></span>
					<?=form_dropdown('level', $opt, set_value('level'), 'id="level"')?><br /><?=form_error('passport')?></p>
<div id="test"></div>
					<table class="tab_form">
					<thead>
						<tr>
							<th>Mata Pelajaran</th>
							<th>Gred</th>
							<th><?=form_button('addRow', '+', 'class="addRow"')?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
							<select name="subjek[]" id="subjek"></select>
							<?//=form_input(array('name'=>'subjek[]', 'id'=>'gred', 'value'=>set_value('subjek[]'), 'size'=>'12'))?>
							<br /><?=form_error('subjek[]')?></td>
							<td>
							<select name="gred[]" id="gred"></select>
							<?//=form_input(array('name'=>'gred[]', 'id'=>'gred', 'value'=>set_value('gred[]'), 'size'=>'4'))?><br />
							<?=form_error('gred[]')?></td>
							<td><?=form_button('delRow', '-', 'class="delRow"')?></td>
						</tr>
					</tbody>
					</table>

			</div>
					<p><?=form_submit('simpanTam', 'Simpan & Tambah Kelayakan', 'class=submit')?><?=form_submit('simpan', 'Simpan', 'class=submit')?></p>
				<?=form_close()?>

		</div>
	<? endblock() ?>
	
	<?startblock('jscript')?>
	<?=get_extended_block() ?>
	<script type="text/javascript" src="<?php echo base_url()?>js/jquery/jquery.table.addrow.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>js/jquery/jquery.cookies.2.2.0.js"></script>
	<script>
				<?/*$('#level').chainSelect('#subjek','<?=site_url().'select_list/sel_subjek'?>',
					{ 
						before:function (target) //before request hide the target combobox and display the loading message
							{ 
								$("#loading").css("display","block");
								$(target).css("display","none");
							},
						after:function (target) //after request show the target combobox and hide the loading message
							{ 
								$("#loading").css("display","none");
								$(target).css("display","inline");
							}
					});	*/?>
					
		$(document).ready(function(){
			$(".addRow").btnAddRow();
			$(".delRow").btnDelRow();
	
			$( "#info_akademik" ).accordion({
				collapsible: true
			});

			
			$("#tahun").blur(function(){
				//alert($("#tahun").val());
				select_gred();
			});
			$("#level").change(function(){
				//alert($("#tahun").val());
				select_subjek();
				select_gred();
			});
			
			//change input to upper case
			$('input').each(function(index){
			        $(this).blur(function(){
				        val = $(this).val()
			        	$(this).val(val.toUpperCase());
			        });
		        });
				
			function select_subjek(){
				$.post("<?=site_url().'select_list/ajax_select_subjek'?>",
					{
						level: $("#level").val(),
						<?php echo $this->config->item('csrf_token_name'); ?>: $.cookies.get("<?php echo $this->config->item('csrf_cookie_name'); ?>") //pass token cookie name klu x ajax xjln
					},
					function(data){
						console.log(data);
						$("#subjek").html(data);
					}
				);
			}
				
			function select_gred(){
				$.post("<?=site_url().'select_list/ajax_select_gred'?>",
					{
						level: $("#level").val(),
						tahun: $("#tahun").val(),
						<?php echo $this->config->item('csrf_token_name'); ?>: $.cookies.get("<?php echo $this->config->item('csrf_cookie_name'); ?>") //pass token cookie name klu x ajax xjln
					},
					function(data){
						console.log(data);
						$("#gred").html(data);
					}
				);
			}
			
			select_subjek();
			select_gred();
				
		});
	</script>
	<?php endblock()?>

<? end_extend() ?>