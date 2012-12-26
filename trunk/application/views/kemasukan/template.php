<?php extend('base_template_user')?>
	
	<?php startblock('content')?>

	<h3><?php echo $title;?></h3>
	<div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Berikut adalah senarai template surat yang ada di dalam simpanan data<br />
				1.&nbsp;Sila klik pada butang "Tawaran" yang bersangkutan dengan program yang dipohon<br />
				2.&nbsp;Sekiranya pemohon tidak layak dari senarai program yang dipohonnya, sila klik pada senarai dropdown dan pilih dari senarai program yang ingin anda tawarkan pada pemohon. Jadi dengan cara ini, institusi anda dapat menawarkan program yang bersesuian dengan pemohon<br />
				3.&nbsp;Klik pada button "TIDAK LENGKAP" sekiranya maklumat yang diberi adalah tidak mencukupi untuk penilaian<br />
				4.&nbsp;Klik pada button "GAGAL" sekiranya pemohon tidak layak untuk menduduki program<br />
				5.&nbsp;<strong>Anda dinasihatkan agar tidak klik pada button "TIDAK LENGKAP" dan "GAGAL" sehingga pada hari selepas pendaftaran, kerana jika sekiranya ada pemohon yang ingin membuat rayuan terhadap permohonannya, rayuan permohonan tersebut boleh ditimbang daripada page ini</strong></p>
	</div>
		<div class="demo">
		<?//=$paginate?>
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
					<?php echo form_radio('lang', 'MY', set_radio('lang', 'MY', TRUE), 'id="lang" class="radio"').form_label('Melayu', 'lang1');?> 
						<?php echo form_radio('lang', 'En', set_radio('lang', 'EN', False), 'id="lang" class="radio"').' Inggeris';?></p>
						
				<p><span><?php echo form_label('Nama Template', 'nama_template');?></span>
					<?php echo form_input(array('name'=>'nama_template', 'value'=>set_value('nama_template', @$baru->row()->nama_template), 'id'=>'nama_template'));?></p>
		</div>
		<div class="form_setting">	
		
				<p><span><?php echo form_label('Template', 'header');?></span>
					<?php //echo $CKEditor->editor('header', @$baru->row()->header ? @$baru->row()->header : set_value('header'));
					echo form_textarea(array('name'=>'header', 'value'=> @$baru->row()->header ? @$baru->row()->header : set_value('header'), 'id'=>'header', 'class'=>'editor'));
					//echo nic_display($nicedit);?>
		<!--<?$this->ckeditor5->basePath = base_url().'js/ckeditor/'?>
		$this->ckeditor5->editor('editor', set_value('editor'));
				<p><span><?php echo form_label('Alamat', 'address')?></span>
					<?php echo $this->ckeditor5->editor('address', @$baru->row()->address ? @$baru->row()->address:set_value('address'));
					//form_textarea(array('name'=>'address', 'value'=> @$baru->row()->address ? @$baru->row()->address:set_value('address'), 'id'=>'addres', 'class'=>'ck'));?></p>
				 	
				<p><span><?php echo form_label('Tajuk Surat', 'title')?></span>
					<?php echo form_textarea(array('name'=>'title', 'value'=>@$baru->row()->title ? @$baru->row()->title:set_value('title'), 'id'=>'title', 'class'=>'ck'));?></p>
					
				<p><span><?php echo form_label('Isi Surat 1', 'content1')?></span>
					<?php echo form_textarea(array('name'=>'content1', 'value'=> @$baru->row()->content1 ? @$baru->row()->content1 : set_value('content1'), 'id'=>'content1', 'class'=>'ck'));?></p>
					
				<p><span><?php echo form_label('Isi Surat 2', 'content2')?></span>
					<?php echo form_textarea(array('name'=>'content2', 'value'=> @$baru->row()->content2 ? @$baru->row()->content2 : set_value('content2'), 'id'=>'content2', 'class'=>'ck'));?></p>
					
				<p><span><?php echo form_label('Isi Surat 3', 'content3')?></span>
					<?php echo form_textarea(array('name'=>'content3', 'value'=> @$baru->row()->content3 ? @$baru->row()->content3 : set_value('content3'), 'id'=>'content3', 'class'=>'ck'));?></p>
					
				<p><span><?php echo form_label('Tandatangan', 'signiture')?></span>
					<?php echo form_textarea(array('name'=>'signiture', 'value'=> @$baru->row()->signiture ? @$baru->row()->signiture : set_value('signiture'), 'id'=>'signiture', 'class'=>'ck'));?></p>
					
				<p><span><?php echo form_label('Nota Kaki', 'footer')?></span>
					<?php echo form_textarea(array('name'=>'footer', 'value'=> @$baru->row()->footer ? @$baru->row()->footer : set_value('footer'), 'id'=>'footer', 'class'=>'ck'));?></p>
				//-->	
				<p class="form_settings"><?php echo form_submit('simpan', $btnSubmit, 'id="submit" class="submit"')?></p>
				
			<?php echo form_close();?>
		</div>
	<?php endblock()?>
	<?php startblock('jscript')?>
		<?php get_extended_block()?>
		<!-- <script type="text/javascript" src="<?php echo base_url();?>js/jwysiwyg/jquery.wysiwyg.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/nicedit/nicEdit.js"></script>
		<script>
		//bkLib.onDomLoaded(function() { nicEditors.allTextAreas({fullPanel : true})});
		$(document).ready(function(){
			//$('.ck').wysiwyg();
		});
		</script> -->
		<script type="text/javascript" src="<?=base_url();?>js/tinymce/jquery.tinymce.js"></script>
		<script type="text/javascript">
		$().ready(function() {
			$('#header').tinymce({
				// Location of TinyMCE script
				document_base_url : "<?=base_url();?>",
				script_url : '<?=base_url();?>js/tinymce/tiny_mce.js',
				//language
				language : "en", //en = english, ms = malay, ar = arab
				
				imagemanager_contextmenu: false,
				
				imagemanager_handle: 'media', // Let the imagemanager handle the media type
				filemanager_handle: 'file,image', // Let the filemanager handle the file and image

				// General options
				theme : "advanced",
				// ,imagemanager =>images manager plugin
				plugins : "autolink,imagemanager,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

				// Theme options
				theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
				theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,insertimage,cleanup,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
				theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
				theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",//,help",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				theme_advanced_resizing : true,

				// Example content CSS (should be your site CSS)
				content_css : "<?=base_url();?>js/tinymce/css/content.css",
				
				//mcImageManager :{
				//	rootpath : "images/files/"
				//},

				// Drop lists for link/image/media/template dialogs
				template_external_list_url : "lists/template_list.js",
				external_link_list_url : "lists/link_list.js",
				external_image_list_url : "<?php echo base_url();?>js/tinymce/list/image_list.php",
				media_external_list_url : "lists/media_list.js",

				// Replace values for the template plugin
				template_replace_values : {
					username : "<?php echo $this->session->userdata('username');?>",
					staffid : "<?php echo $this->session->userdata('password');?>"
				}
			});
		});
	</script>
	<?php endblock()?>
	
<?php end_extend()?>