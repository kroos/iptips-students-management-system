<? extend('base_template_user') ?>

	<? startblock('content') ?>
		<h1>Selamat Datang ke IPTIPs Students Management System</h1>
		<h2>Developer</h2>
		<p>
			<ol>
				<li>Masukkan function yang baru dibuat kedalam input, function yang anda buat mestilah sama dengan kemasukkan input.</li>
				<li>Klik Jabatan/controller/modul yang berkaitan.</li>
				<li>Selesai.</li>
			</ol>
		</p>
		<p><font color="#FF0000"><?=@$info?></font></p>

		<div class="form_settings">
		<?=form_open()?>

		<div id="radioset">
			<p>Jabatan/controller/modul : </p>
			<?$p = 0?>
			<?$b = 0?>
			<p>
			<?foreach($i->result() as $t):?>
				<?=form_radio(array('name' => 'ctrlr', 'id' => 'radio'.$p++, 'value' => $t->id))?><label for="radio<?=$b++?>"><?=$t->dept?></label>
			<?endforeach?>
			<br /><?=form_error('ctrlr')?>
			</p>
		</div>
		
		
		
			<p><span><label for="name">Nama Function : </label></span>
			<?=form_input(array('name' => 'function', 'value' => set_value('function'), 'maxlength' => '30', 'size' => '12', 'id' => 'name'))?>
			<br /><?=form_error('function')?>
			</p>

            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('save', 'Save', 'class="submit"')?></p>
		<?=form_close()?>
		</div>

	<? endblock() ?>

	<? startblock('jscript') ?>
		<script src="<?=base_url()?>js/jquery/jquery-ui-1.9.1.custom.js"></script>
		<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery-ui-timepicker-addon.js"></script>
		<script>
			$(function() {
				$( "input[type=submit], a, button", ".demo" )
					.button();
				$( "#radioset" ).buttonset();

				// Datepicker
				$('#datepicker1').datetimepicker({dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss", showSecond: true, showMillisec: false, ampm: false, stepHour: 1, stepMinute: 1, stepSecond: 5});

				// Autocomplete City and State
				function log( message ) {
				$( "<div>" ).text( message ).prependTo( "#log" );
				$( "#log" ).scrollTop( 0 );
				}
				
				$( "#city" ).autocomplete({
				source: function( request, response ) {
					$.ajax({
						url: "http://ws.geonames.org/searchJSON",
						dataType: "jsonp",
						data: {
							featureClass: "P",
							style: "full",
							maxRows: 12,
							name_startsWith: request.term
						},
						success: function( data ) {
							response( $.map( data.geonames, function( item ) {
								return {
									label: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
									value: item.name
								}
							}));
						}
					});
				},
				minLength: 2,
				select: function( event, ui ) {
					log( ui.item ?
						"Selected: " + ui.item.label :
						"Nothing selected, input was " + this.value);
				},
				open: function() {
					$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
				},
				close: function() {
					$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
				}
				});

				function log( message ) {
				$( "<div>" ).text( message ).prependTo( "#log1" );
				$( "#log1" ).scrollTop( 0 );
				}
				
				$( "#state" ).autocomplete({
				source: function( request, response ) {
					$.ajax({
						url: "http://ws.geonames.org/searchJSON",
						dataType: "jsonp",
						data: {
							featureClass: "P",
							style: "full",
							maxRows: 12,
							name_startsWith: request.term
						},
						success: function( data ) {
							response( $.map( data.geonames, function( item ) {
								return {
									label: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
									value: item.name
								}
							}));
						}
					});
				},
				minLength: 2,
				select: function( event, ui ) {
					log( ui.item ?
						"Selected: " + ui.item.label :
						"Nothing selected, input was " + this.value);
				},
				open: function() {
					$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
				},
				close: function() {
					$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
				}
				});
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			});
		</script>
	<? endblock() ?>

<? end_extend() ?>