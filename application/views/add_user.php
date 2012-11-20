<? extend('base_template_user') ?>

	<? startblock('content') ?>
		<h1>Selamat Datang ke IPTIPs Students Management System</h1>
		<h2>Tambah Staf</h2>
		<p>Sila masukkan data untuk penambahan staf. Staf yang akan dimasukkan ini boleh mencapai Sistem Pengurusan Pelajar.</p>
		<p><font color="#FF0000"><?=@$info?></font></p>

		<div class="form_settings">
		<?=form_open()?>
			<p><span><label for="name">Nama Staf : </label></span>
			<?=form_input(array('name' => 'name', 'value' => set_value('name'), 'maxlength' => '30', 'size' => '12', 'id' => 'name'))?>
			<br /><?=form_error('name')?>
			</p>
			
			<p><span><label for="ic">No. Kad Pengenalan : </label></span>
			<?=form_input(array('name' => 'ic', 'value' => set_value('ic'), 'maxlength' => '12', 'size' => '12', 'id' => 'ic'))?>
			<br /><?=form_error('ic')?>
			</p>

			<p><span><label for="user">Nama Pengguna (Username) : </label></span>
			<?=form_input(array('name' => 'username', 'value' => set_value('username'), 'maxlength' => '12', 'size' => '12', 'id' => 'user'))?>
			<br /><?=form_error('username')?>
			</p>

			<p><span><label for="pass">Kata Laluan (Password) : </label></span>
			<?=form_password(array('name' => 'password', 'value' => set_value('password'), 'maxlength' => '10', 'size' => '10', 'id' => 'pass'))?>
			<br /><?=form_error('password')?>
			</p>

			<p><span><label for="email">Email : </label></span>
			<?=form_input(array('name' => 'email', 'value' => set_value('email'), 'maxlength' => '12', 'size' => '20', 'id' => 'email'))?>
			<br /><?=form_error('email')?>
			</p>

			<p><span><label for="address">Alamat : </label></span>
			<?=form_textarea(array('name' => 'address', 'value' => set_value('address'), 'rows' => '5', 'cols' => '12', 'id' => 'address'))?>
			<br /><?=form_error('address')?>
			</p>

			<div class="ui-widget">
				<p><span><label for="city">Bandar : </label></span>
				<?=form_input(array('name' => 'city', 'value' => set_value('city'), 'maxlength' => '12', 'size' => '12', 'id' => 'city'))?>
				<br /><?=form_error('city')?>
				</p>
			</div>

			<div class="ui-widget">
				<p><span><label for="state">Negeri : </label></span>
				<?=form_input(array('name' => 'state', 'value' => set_value('state'), 'maxlength' => '12', 'size' => '12', 'id' => 'state'))?>
				<br /><?=form_error('state')?>
				</p>
			</div>

			<p><span><label for="zip">Poskod : </label></span>
			<?=form_input(array('name' => 'zip', 'value' => set_value('zip'), 'maxlength' => '12', 'size' => '5', 'id' => 'zip'))?>
			<br /><?=form_error('zip')?>
			</p>

			<p><span><label for="cellphone">Telefon Bimbit : </label></span>
			<?=form_input(array('name' => 'cellphone', 'value' => set_value('cellphone'), 'maxlength' => '12', 'size' => '12', 'id' => 'cellphone'))?>
			<br /><?=form_error('cellphone')?>
			</p>

			<p><span><label for="telephone">Telefon Tetap : </label></span>
			<?=form_input(array('name' => 'telephone', 'value' => set_value('telephone'), 'maxlength' => '12', 'size' => '12', 'id' => 'telephone'))?>
			<br /><?=form_error('telephone')?>
			</p>

            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('next', 'Seterusnya >>', 'class="submit"')?></p>
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