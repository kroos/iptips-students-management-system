<?php extend('base_template_user') ?>
	<?php startblock('head')?>
		<?= get_extended_block() ?>
		
	<?php endblock()?>
    
    <?php startblock('content') ?>
    	<h1>Selamat Datang ke IPTIPs Students Management System</h1>
        <h2><?=$title?></h2>
        <div id="accordion">
	        <h3>Bantuan</h3>
	        <p>Masukkan maklumat peribadi pelajar.</p>
        </div>
        <div class="info"><?=@$info?><br /><?=validation_errors(); ?></div>
        <div class="form_settings">
            <?=form_open()?>
                    <p><span><?=form_label('Nama', 'nama')?></span>
                        <?=form_input(array('name' => 'nama', 'value' => set_value('nama'), 'maxlength' => '50', 'size' => '30', 'id' => 'nama'))?>
                        <br /><?=form_error('nama')?></p>
                    <p><span><?=form_label('Nombor Kad Pengenalan', 'id')?></span>
                        <?php echo form_input(array('name' => 'ic', 'value' => set_value('ic'), 'id' => 'ic', 'size' => '12', 'maxlength'=>'12'))?>
                        <br /><?=form_error('ic')?></p>
                    <p><span><?=form_label('Nombor Passport', 'passport')?></span>
                        <?php echo form_input(array('name' => 'passport', 'value' => set_value('passport'), 'id'=>'passport'))?>
                        <br /><?=form_error('passport')?></p>
                    <p><span><?=form_label('Tarikh Lahir', 'dt_lahir')?></span>
                        <?=form_input(array('name' => 'dt_lahir', 'value' => set_value('dt_lahir'), 'id' => 'dt_lahir', 'size' => '12' ))?>
                        <br /><?=form_error('dt_lahir')?></p>
                    <p><span><?=form_label('Tempat Lahir', 'tempat_lahir')?></span>
                        <?=form_input(array('name' => 'tempat_lahir', 'value' => set_value('tempat_lahir'), 'id' => 'tempat_lahir', 'size' => '12' ))?>
                        <br /><?=form_error('tempat_lahir')?></p>
                    <p><span><?=form_label('Taraf Warganegara', 'status_warga')?></span>
                        <?=form_input(array('name' => 'status_warga', 'value' => set_value('status_warga'), 'id' => 'status_warga', 'size' => '12' ))?>
                        <br /><?=form_error('status_warga')?></p>
                    <p><span><?=form_label('Warganegara', 'warganegara')?></span>
                        <?=form_input(array('name' => 'warganegara', 'value' => set_value('warganegara'), 'id' => 'warganegara', 'size' => '12' ))?>
                        <br /><?=form_error('warganegara')?></p>
                    <p><span><?=form_label('Bangsa', 'bangsa')?></span>
                        <?=form_input(array('name' => 'bangsa', 'value' => set_value('bangsa'), 'id' => 'bangsa', 'size' => '12' ))?>
                        <br /><?=form_error('bangsa')?></p>
                    <p><span><?=form_label('Jantina', 'jantina')?></span>
                        <?=form_radio(array('name'=>'jantina', 'value' => 'lelaki', 'id' => 'jantina', 'class'=>'checkbox'))?><label for="jantina">Lelaki</label>
                        <?=form_radio(array('name'=>'jantina', 'value' => 'perempuan', 'id' =>'jantina', 'class'=>'checkbox'))?><label for="jantina">Perempuan</label>
                        <br /><?=form_error('jantina')?></p>
                    <p><span><?=form_label('Taraf Perkawinan', 'status_kahwin')?></span>
                        <?=form_input(array('name' => 'status_kahwin', 'value' => set_value('status_kahwin'), 'id' => 'status_kahwin', 'size' => '12' ))?>
                        <br /><?=form_error('status_kahwin')?></p>
                    <p><span><?=form_label('Alamat', 'alamat1')?></span>
                        <?=form_input(array('name' => 'alamat1', 'value' => set_value('alamat1'), 'id' => 'alamat1', 'size' => '30', 'maxlength' =>'255' ))?>
                        <br /><?=form_error('alamat1')?></p>
                    <p><span>&nbsp;</span>
                        <?=form_input(array('name' => 'alamat2', 'value' => set_value('alamat2'), 'id' => 'alamat2', 'size' => '30' ))?>
                        <br /><?=form_error('alamat2')?></p>
                    <p><span><?=form_label('Poskod', 'poskod')?></span>
                        <?=form_input(array('name' => 'poskod', 'value' => set_value('poskod'), 'id' => 'poskod', 'size' => '12' ))?>
                        <br /><?=form_error('poskod')?></p>
                    <p><span><?=form_label('Bandar', 'bandar')?></span>
                        <?=form_input(array('name' => 'bandar', 'value' => set_value('bandar'), 'id' => 'bangsa', 'size' => '12' ))?>
                        <br /><?=form_error('bandar')?></p>
                    <p><span><?=form_label('Negeri', 'negeri')?></span>
                        <?=form_input(array('name' => 'negeri', 'value' => set_value('negeri'), 'id' => 'negeri', 'size' => '12' ))?>
                        <br /><?=form_error('negeri')?></p>
                    <p><span><?=form_label('Negara', 'negara')?></span>
                        <?=form_input(array('name' => 'negara', 'value' => set_value('negara'), 'id' => 'negara', 'size' => '12',  'autocomplete'=>'on'  ))?>
                        <?=form_input(array('name' => 'negara_hid', 'value' => set_value('negara_hid'), 'id' => 'negara_hid', 'size' => '12'  ))?>
                        <br /><?=form_error('negara')?></p>
                    <p><span>&nbsp;</span><?=form_submit('simpan','Seterusnya>>','class="submit"')?></p>
            <?=form_close()?>
        </div>
	<?php endblock()?>
	
	<?php startblock('jscript')?>
	<?=get_extended_block() ?>
		<script>
			$(document).ready(function() {
	
		        $( "#dt_lahir" ).datepicker({
					dateFormat: "yy-mm-dd",
		            changeMonth: true,
		            changeYear: true
		        });
		        
		        $.getJSON('<?=base_url()?>select_list/json_select_negara', function(data){
		    		$("#negara").autocomplete({
	    				source: data,
	    				minLength: 2,
	    				select: function( event, ui ){
	    					//var id = $(this).closest('td').parent()[0].sectionRowIndex; //get row index
	    					var val = ui.item.kod; //get value to be passing to selectlist 
	    					negara_hid(val);
    					},
    					open: function() {
    		                $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
    		            },
    		            close: function() {
    		                $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
    		            }
	    			});
		        });

		        $( "#accordion" ).accordion({
		            collapsible: true
		        });

		        $('input').each(function(index){
			        $(this).blur(function(){
				        val = $(this).val()
			        	$(this).val(val.toUpperCase());
			        });
		        });

		        function negara_hid(kod){
			        $("#negara_hid").val(kod);
		        }
		        
		    });
	    </script>
	<?php endblock()?>
  
<?php end_extend() ?>
