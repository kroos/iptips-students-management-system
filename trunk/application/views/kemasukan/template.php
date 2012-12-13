<?php extend('base_template_user')?>
	
	<?php startblock('content')?>
	<h3><?php echo $title;?></h3>
	<div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Berikut adalah permohonan pelajar<br />
				1.&nbsp;Sila klik pada butang "Tawaran" yang bersangkutan dengan program yang dipohon<br />
				2.&nbsp;Sekiranya pemohon tidak layak dari senarai program yang dipohonnya, sila klik pada senarai dropdown dan pilih dari senarai program yang ingin anda tawarkan pada pemohon. Jadi dengan cara ini, institusi anda dapat menawarkan program yang bersesuian dengan pemohon<br />
				3.&nbsp;Klik pada button "TIDAK LENGKAP" sekiranya maklumat yang diberi adalah tidak mencukupi untuk penilaian<br />
				4.&nbsp;Klik pada button "GAGAL" sekiranya pemohon tidak layak untuk menduduki program<br />
				5.&nbsp;<strong>Anda dinasihatkan agar tidak klik pada button "TIDAK LENGKAP" dan "GAGAL" sehingga pada hari selepas pendaftaran, kerana jika sekiranya ada pemohon yang ingin membuat rayuan terhadap permohonannya, rayuan permohonan tersebut boleh ditimbang daripada page ini</strong></p>
	</div>
		<div class="demo">
		<?=$paginate?>
			<table>
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Template</th>
						<th>Bahasa</th>
						<th></th>
					</tr>
				</thead>
				
				<tbody>
					<?php foreach($template->result() as $t){?>
						<tr><td></td>
							<td><?php echo $t->nama_template;?></td>
							<td><?php echo $t->lang;?></td>
							<td><?php echo form_open('kemasukan/edit_template', '', array('id' => $t->id));?>
								<?php echo form_submit('edit', 'Kemaskini', 'class=Submit')?>
								<?php echo form_close()?></td>
						</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
		<div class="info"><?php echo validation_errors()?></div>
		<div class="form_settings">
			<?php echo form_open('','', $hidden_field)?>
				<p><span><?php echo form_label('Bahasa', 'lang');?></span>
					<?php echo form_radio('lang', 'MY', set_radio('lang', 'MY', TRUE), 'id="lang" class="lang"').form_label('Melayu', 'lang1');?> 
						<?php echo form_radio('lang', 'En', set_radio('lang', 'EN', False), 'id="lang" class="lang"').' Inggeris';?></p>
						
				<p><span><?php echo form_label('Nama Template', 'nama_template');?></span>
					<?php echo form_input(array('name'=>'nama_template', 'value'=>set_value('nama_template', @$baru->row()->nama_template)));?></p>
		</div>
		<div class="form_setting">		
				<p><span><?php echo form_label('Kepala Surat', 'header');?></span>
					<?php echo $CKEditor->editor('header', set_value('header', @$baru->row()->header));
					//echo form_textarea(array('name'=>'header', 'value'=>set_value('header', @$baru->row()->header), 'id'=>'header', 'class'=>'ck'))?>
					
				<p><span><?php echo form_label('Alamat', 'address')?></span>
					<?php echo form_textarea(array('name'=>'address', 'value'=>set_value('address', @$baru->row()->address), 'id'=>'addres', 'class'=>'ck'));?></p>
					
				<p><span><?php echo form_label('Tajuk Surat', 'title')?></span>
					<?php echo form_textarea(array('name'=>'title', 'value'=>set_value('title', @$baru->row()->title), 'id'=>'title', 'class'=>'ck'));?></p>
					
				<p><span><?php echo form_label('Isi Surat 1', 'content1')?></span>
					<?php echo form_textarea(array('name'=>'content1', 'value'=>set_value('content1', @$baru->row()->content1), 'id'=>'content1', 'class'=>'ck'));?></p>
					
				<p><span><?php echo form_label('Isi Surat 2', 'content2')?></span>
					<?php echo form_textarea(array('name'=>'content2', 'value'=>set_value('content2', @$baru->row()->content2), 'id'=>'content2', 'class'=>'ck'));?></p>
					
				<p><span><?php echo form_label('Isi Surat 3', 'content3')?></span>
					<?php echo form_textarea(array('name'=>'content3', 'value'=>set_value('content3', @$baru->row()->content3), 'id'=>'content3', 'class'=>'ck'));?></p>
					
				<p><span><?php echo form_label('Tandatangan', 'signiture')?></span>
					<?php echo form_textarea(array('name'=>'signiture', 'value'=>set_value('signiture', @$baru->row()->signiture), 'id'=>'signiture', 'class'=>'ck'));?></p>
					
				<p><span><?php echo form_label('Nota Kaki', 'footer')?></span>
					<?php echo form_textarea(array('name'=>'footer', 'value'=>set_value('footer', @$baru->row()->footer), 'id'=>'footer', 'class'=>'ck'));?></p>
					
				<p class="form_settings"><?php echo form_submit('simpan', $btnSubmit, 'id="submit" class="submit"')?></p>
				
			<?php echo form_close()?>
		</div>
	<?php endblock()?>
	
	<?php startblock('jscript')?>
		<?php get_extended_block()?>
		<script>
		$(document).ready(function(){
			$(".lang").change(function(){
				//alert('oi');
				$("#template").submit();
			});
		});
		</script>
	<?php endblock()?>
<?php end_extend()?>