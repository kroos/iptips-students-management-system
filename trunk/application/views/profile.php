<? extend('base_template_user') ?>

	<? startblock('content') ?>
		<h1>Selamat Datang ke IPTIPs Students Management System</h1>
		<h2>Profile Pengguna</h2>
		<p>Sila sunting(edit) data dibawah dan klik "Simpan"</p>
		<p><font color="#FF0000"><?=@$info?></font></p>

		<div class="form_settings">
		<?=form_open()?>
			<p><span><label for="name">Nama Staf : </label></span>
			<?=form_input(array('name' => 'name', 'value' => $o->row()->name, 'maxlength' => '30', 'size' => '12', 'id' => 'name'))?>
			<br /><?=form_error('name')?>
			</p>
			
			<p><span><label for="ic">No. Kad Pengenalan : </label></span>
			<?=form_input(array('name' => 'ic', 'value' => $o->row()->ic, 'maxlength' => '12', 'size' => '12', 'id' => 'ic'))?>
			<br /><?=form_error('ic')?>
			</p>

			<p><span><label for="email">Email : </label></span>
			<?=form_input(array('name' => 'email', 'value' => $o->row()->email, 'maxlength' => '50', 'size' => '12', 'id' => 'email'))?>
			<br /><?=form_error('email')?>
			</p>

			<p><span><label for="address">Alamat : </label></span>
			<?=form_textarea(array('name' => 'address', 'value' => $o->row()->address, 'rows' => '5', 'cols' => '12', 'id' => 'address'))?>
			<br /><?=form_error('address')?>
			</p>

			<div class="ui-widget">
				<p><span><label for="city">Bandar : </label></span>
				<?=form_input(array('name' => 'city', 'value' => $o->row()->city, 'maxlength' => '20', 'size' => '12', 'id' => 'city'))?>
				<br /><?=form_error('city')?>
				</p>

				<p><span><label for="state">Negeri : </label></span>
				<?=form_input(array('name' => 'state', 'value' => $o->row()->state, 'maxlength' => '20', 'size' => '12', 'id' => 'state'))?>
				<br /><?=form_error('state')?>
				</p>
			</div>

			<p><span><label for="zip">Poskod : </label></span>
			<?=form_input(array('name' => 'zip', 'value' => $o->row()->zip, 'maxlength' => '5', 'size' => '5', 'id' => 'zip'))?>
			<br /><?=form_error('zip')?>
			</p>

			<p><span><label for="cellphone">Telefon Bimbit : </label></span>
			<?=form_input(array('name' => 'cellphone', 'value' => $o->row()->cellphone, 'maxlength' => '10', 'size' => '12', 'id' => 'cellphone'))?>
			<br /><?=form_error('cellphone')?>
			</p>

			<p><span><label for="telephone">Telefon Tetap : </label></span>
			<?=form_input(array('name' => 'telephone', 'value' => $o->row()->telephone, 'maxlength' => '10', 'size' => '12', 'id' => 'telephone'))?>
			<br /><?=form_error('telephone')?>
			</p>

            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('psave', 'Simpan', 'class="submit"')?></p>
		<?=form_close()?>
		</div>

	<? endblock() ?>

	<? startblock('jscript') ?>
<style>
#loading
{
	position:absolute;
	top:0px;
	right:0px;
	background:#ff0000;
	color:#fff;
	font-size:14px;
	font-familly:Arial;
	padding:2px;
	display:none;
}
.ui-autocomplete-loading
{
	background: white url('../images/ui-anim_basic_16x16.gif') right center no-repeat;
}
#city { width: 25em; }
#state { width: 25em; }
</style>
		<script src="<?=base_url()?>js/jquery/jquery-ui-1.9.1.custom.js"></script>
		<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery-ui-timepicker-addon.js"></script>
		<script language="JavaScript" type="text/javascript" src="<?=base_url()?>js/jquery.chainedSelects.js"></script>
		<script>
			$(function() {
				$( "input[type=submit], a, button", ".demo" )
					.button();
				$( "#radioset" ).buttonset();

				// Datepicker
				$('#datepicker1').datetimepicker({dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss", showSecond: true, showMillisec: false, ampm: false, stepHour: 1, stepMinute: 1, stepSecond: 5});

				$('#jabatan').chainSelect('#jawatan','<?=site_url().'isms/combobox'?>',
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