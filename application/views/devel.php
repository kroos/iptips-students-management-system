<? extend('base_template_user') ?>

	<? startblock('content') ?>
		<h1>Selamat Datang ke IPTIPs Students Management System</h1>
		<h2>Developer</h2>
		<p>Page ini digunakan untuk memasukkan function yang <b>akan</b> dibina supaya developer boleh mencapai page ini. Berikut adalah langkah yang diperlukan :
			<ol>
				<li>Bina function anda di "controller" dengan cara buat salinan template dan ubah nama function di function yang berkaitan.</li>
				<li>Namakan function anda di controller tersebut mengikut template yang telah disediakan. Anda tak perlu untuk menyiapkan keseluruhan function kerana anda mungkin perlu untuk melihat progress pembinaan function anda.</li>
				<li>Buka fail views/base_template_user.php, pergi ke block top_nav dan masukkan function anda tadi mengikut modul/controller. Ini adalah untuk anda mengakses function anda melalui web page.</li>
				<li>Masukkan function yang baru dibuat kedalam input, function yang anda buat mestilah sama dengan kemasukkan input.</li>
				<li>Klik Jabatan/controller/modul yang berkaitan mengikut controller dimana anda membina function anda.</li>
			</ol>
		</p>
		<p><font color="#FF0000"><?=@$info?></font></p>

		<div class="form_settings">
		<?=form_open()?>

		<div id="radioset1">
			<p>Jabatan/controller/modul : <br />
			<?$p = 0?>
			<?$b = 0?>

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

			<p><span><label for="menu">Menu Function : </label></span>
			<?=form_input(array('name' => 'menu', 'value' => set_value('menu'), 'maxlength' => '30', 'size' => '12', 'id' => 'menu'))?>
			<br /><?=form_error('menu')?>
			</p>

			<p>Paparkan di Menu : 
			<div id="radioset2">
			<?=form_radio('display', 1, '', 'id="radio11"').form_label('Ya', 'radio11')?>
			<?=form_radio('display', 0, '', 'id="radio21"').form_label('Tidak', 'radio21')?>
			</div>
			<br /><?=form_error('display')?>
			</p>

			<p><span><label for="remarks">Catitan Function : </label></span>
			<?=form_input(array('name' => 'remarks', 'value' => set_value('remarks'), 'maxlength' => '255', 'size' => '12', 'id' => 'remarks'))?>
			<br /><?=form_error('remarks')?>
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
				$( "#radioset1" ).buttonset();
				$( "#radioset2" ).buttonset();

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