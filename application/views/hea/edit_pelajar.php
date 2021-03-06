<?php extend('base_template_user') ?>
    
    <?startblock('content')?>
	<?$id = $this->uri->segment(3, 0)?>
        <h2><?=$title?></h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Masukkan maklumat peribadi pelajar.</p>
        </div>
        <div class="info"><?=@$info?></div>
        <div class="form_settings">
            <?=form_open()?>

			<?if($ses->num_rows() > 0):?>
				<p><span><?=form_label('Sesi Pengambilan', 'sesi_daftar')?></span>

<?php
foreach($ses->result() as $e1){
	$opts[$e1->kodsesi] = $e1->kodsesi;}
?>

				<?=form_dropdown('sesi_daftar', $opts, ($id == $z->row()->matrik ? $z->row()->sesi_daftar : set_value('sesi_daftar')), 'id = "sesi_daftar"')?>
				<br /><?=form_error('sesi_daftar')?></p>
			<?else:?>
				<div class="info"><p>Tidak dapat menentukan <strong>SESI PENGAMBILAN</strong>. Sila periksa dengan Jabatan Hal Ehwal Akademik</p></div>
			<?endif?>

			<p><span><?=form_label('Nama', 'nama')?></span>
			<?=form_input(array('name' => 'nama', 'value' => ($id == $z->row()->matrik ? $z->row()->nama : set_value('nama')), 'maxlength' => '50', 'size' => '30', 'id' => 'nama'))?>
			<br /><?=form_error('nama')?></p>

			<p><span><?=form_label('Nombor Kad Pengenalan', 'ic')?></span>
			<?php echo form_input(array('name' => 'ic', 'value' => ($id == $z->row()->matrik ? $z->row()->ic : set_value('ic')), 'id' => 'ic', 'size' => '12', 'maxlength'=>'12'))?>
			<br /><?=form_error('ic')?></p>
			
			<p><span><?=form_label('Nombor Passport', 'passport')?></span>
			<?php echo form_input(array('name' => 'passport', 'value' => ($id == $z->row()->matrik ? $z->row()->passport : set_value('passport')), 'id'=>'passport'))?>
			<br /><?=form_error('passport')?></p>
			
			<p><span><?=form_label('Tarikh Lahir', 'dt_lahir')?></span>
			<?=form_input(array('name' => 'dt_lahir', 'value' => ($id == $z->row()->matrik ? $z->row()->dt_lahir : set_value('dt_lahir')), 'id' => 'dt_lahir'))?>
			<br /><?=form_error('dt_lahir')?></p>
			
			<p><span><?=form_label('Tempat Lahir', 'tempat_lahir')?></span>
			<?php
			foreach($bandar->result() as $e){
				$opt[$e->kodbandar] = $e->namabandar;}
			?>
			<?=form_dropdown('tempat_lahir', $opt, ($id == $z->row()->matrik ? $z->row()->tempat_lahir : set_value('tempat_lahir')), 'id="tempat_lahir"')?>
			<br /><?=form_error('tempat_lahir')?></p>
			
			<p><span><?=form_label('Taraf Warganegara', 'status_warga')?></span>
			<?php
			foreach($warga->result() as $j){
				$warg[$j->kodwarga] = $j->warga_EN;
			}
			?>
			<?=form_dropdown('status_warga', $warg,  ($id == $z->row()->matrik ? $z->row()->status_warga : set_value('status_warga')), 'id="status_warga"')?>
			<br /><?=form_error('status_warga')?></p>
			
			<p><span><?=form_label('Warganegara', 'warganegara')?></span>
			<?php
			foreach($v->result() as $q){
				$negara[$q->kodnegara] = $q->namanegara;
			}
			?>
			<?=form_dropdown('warganegara', $negara, ($id == $z->row()->matrik ? $z->row()->warganegara : set_value('warganegara')), 'id="warganegara"')?>
			<br /><?=form_error('warganegara')?></p>
			
			<p><span><?=form_label('Bangsa', 'bangsa')?></span>
			<?php
			foreach($bangsa->result() as $qd){
				$bang[$qd->kodbangsa] = $qd->bangsa_MY;
			}
			?>
			<?=form_dropdown('bangsa', $bang, ($id == $z->row()->matrik ? $z->row()->bangsa : set_value('bangsa')), 'id="bangsa"');?>
			<br /><?=form_error('bangsa')?></p>
		</div>

			<?$t = 0?>
			<?$i = 0?>
			<p><span>Jantina</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?foreach($vq->result() as $g):?>
				<?=form_radio(array('name'=>'jantina', 'value' => $g->kodgender, 'checked' => ($id == $z->row()->matrik && $z->row()->jantina == $g->kodgender ? 'checked' : ''), 'id' => 'radio'.$t++))?><?=form_label($g->gender_MY, 'radio'.$i++)?>
			<?endforeach?>
			<br /><?=form_error('jantina')?></p>

			<?$tw = 10?>
			<?$iw = 10?>
			<p><span>Taraf Perkahwinan</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?foreach($vw->result() as $h):?>
				<?=form_radio(array('name'=>'status_kahwin', 'value' => $h->kod, 'checked' => ($id == $z->row()->matrik && $z->row()->status_kahwin == $h->kod ? 'checked' : ''), 'id' => 'radio'.$tw++))?><?=form_label($h->marital_MY, 'radio'.$iw++)?>
			<?endforeach?>
			<br /><?=form_error('status_kahwin')?></p>

		<div class="form_settings">
			<p><span><?=form_label('Alamat', 'alamat1')?></span>
			<?=form_input(array('name' => 'alamat1', 'value' => ($id == $z->row()->matrik ? $z->row()->alamat1 : set_value('alamat1')), 'id' => 'alamat1', 'size' => '30', 'maxlength' =>'255' ))?>
			<br /><?=form_error('alamat1')?></p>

			<p><span>&nbsp;</span>
			<?=form_input(array('name' => 'alamat2', 'value' => ($id == $z->row()->matrik ? $z->row()->alamat2 : set_value('alamat2')), 'id' => 'alamat2', 'size' => '30' ))?>
			<br /><?=form_error('alamat2')?></p>

			<p><span><?=form_label('Poskod', 'poskod')?></span>
			<?=form_input(array('name' => 'poskod', 'value' => ($id == $z->row()->matrik ? $z->row()->poskod : set_value('poskod')), 'id' => 'poskod', 'size' => '12' ))?>
			<br /><?=form_error('poskod')?></p>
		</div>

		<?php
		foreach($v->result() as $h){
				$country[$h->kodnegara] = $h->namanegara;}
		?>
		<div class="form_settings">
			<p><span><?=form_label('Negara', 'negara')?></span>
			<?=form_dropdown('negara', $country, ($id == $z->row()->matrik ? $z->row()->negara : set_select('negara', set_value('negara'), TRUE)), 'id="negara"')?>
			<br /><?=form_error('negara')?></p>

			<p><span><?=form_label('Negeri', 'negeri')?></span>
			<select name="negeri" id="negeri" style="display:inline"></select>
			<br /><?=form_error('negeri')?></p>

			<p><span><?=form_label('Bandar', 'bandar')?></span>
			<select name="bandar" id="bandar" style="display:inline"></select>
            <br /><?=form_error('bandar')?></p>

			<p><span><?=form_label('No Telefon', 'notel')?></span>
			<?=form_input(array('name' => 'notel', 'value' => ($id == $z->row()->matrik ? $z->row()->notel : set_value('notel')), 'maxlength' => '50', 'size' => '30', 'id' => 'notel'))?>
			<br /><?=form_error('notel')?></p>

			<p><span><?=form_label('No Telefon Bimbit', 'nohp')?></span>
			<?=form_input(array('name' => 'nohp', 'value' => ($id == $z->row()->matrik ? $z->row()->nohp : set_value('nohp')), 'maxlength' => '50', 'size' => '30', 'id' => 'nohp'))?>
			<br /><?=form_error('nohp')?></p>

			<p><span><?=form_label('Email', 'emel')?></span>
			<?=form_input(array('name' => 'emel', 'value' => ($id == $z->row()->matrik ? $z->row()->emel : set_value('emel')), 'maxlength' => '50', 'size' => '30', 'id' => 'emel'))?>
			<br /><?=form_error('emel')?></p>

			<div class="form_settings"><p><span>&nbsp;</span><?=form_submit('simpan','Seterusnya >>','class="submit"')?></p></div>
		</div>
		<?=form_close()?>
	<?php endblock()?>
	
	<?php startblock('jscript')?>
		<script src="<?=base_url()?>js/jquery/jquery-ui-1.9.1.custom.js"></script>
		<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery-ui-timepicker-addon.js"></script>
		<script language="JavaScript" type="text/javascript" src="<?=base_url()?>js/jquery.chainedSelects.js"></script>
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

				//chain select 3 level
				<?php /* $('#negara').chainSelect('#negeri','<?=base_url()?>select_list/sel_negara',
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
				});
				
				$('#negeri').chainSelect('#bandar','<?=base_url()?>select_list/sel_negara',
				{ 
					before:function (target) 
					{ 
						$("#loading").css("display","block");
						$(target).css("display","none");
					},
					after:function (target) 
					{ 
						$("#loading").css("display","none");
						$(target).css("display","inline");
					}
				}); 
				*/?>
				
			});
		</script>


		<script>
			$(document).ready(function() {
	
		        $( "#dt_lahir" ).datepicker({
					dateFormat: "yy-mm-dd",
		            changeMonth: true,
		            changeYear: true
		        });

		        $('input').each(function(index){
					
					if($(this).attr('id')!='emel'){
						$(this).blur(function(){
								val = $(this).val()
								$(this).val(val.toUpperCase());
						});
					}
		        });
				
				$("#negara").change(function(){
					negeri();
					bandar();
				});
				
				$("#negeri").change(function(){
					bandar();
				});
				
				function negeri(){
					$.post('<?php echo base_url()."select_list/ajax_select_negeri";?>',
						{	
							<?php echo $this->config->item('csrf_token_name'); ?>: $.cookies.get("<?php echo $this->config->item('csrf_cookie_name'); ?>"), //pass token cookie name klu x ajax xjln
							negara: $("#negara").val(),
							negeri: '<?=@$z->row()->negeri?>'
						},
						function(data){
							$("#negeri").html(data);
						}
					);
				}
				
				function bandar(){
					$.post('<?php echo base_url()."select_list/ajax_select_bandar";?>',
						{
							<?php echo $this->config->item('csrf_token_name'); ?>: $.cookies.get("<?php echo $this->config->item('csrf_cookie_name'); ?>"),
							negara: $("#negara").val(),
							negeri: $("#negeri").val(),
							bandar: '<?=@$z->row()->bandar ?>'
						},
						function(data){
							$("#bandar").html(data);
						}
					);
				}
				
				setTimeout(function(){negeri()}, 100);
				//negeri();
				setTimeout(function(){bandar()}, 2000);
		        
		    });
	    </script>
	<?php endblock()?>
  
<?php end_extend() ?>
