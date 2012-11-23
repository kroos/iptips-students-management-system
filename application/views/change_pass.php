<? extend('base_template_user') ?>

	<? startblock('content') ?>
		<h1>Selamat Datang ke IPTIPs Students Management System</h1>
		<h2>Penukaran Kata Laluan</h2>
		<p>Masukkan kata laluan anda dan juga kata laluan yang baru</p>
		<p><font color="#FF0000"><?=@$info?></font></p>

		<div class="form_settings">
		<?=form_open()?>

			<p><span><label for="opass">Kata Laluan Sekarang : </label></span>
			<?=form_password(array('name' => 'opass', 'value' => set_value('opass'), 'maxlength' => '10', 'size' => '10', 'id' => 'opass'))?>
			<br /><?=form_error('opass')?>
			</p>

			<p><span><label for="npass1">Kata Laluan Baru : </label></span>
			<?=form_password(array('name' => 'npass1', 'value' => set_value('npass1'), 'maxlength' => '10', 'size' => '10', 'id' => 'npass1'))?>
			<br /><?=form_error('npass1')?>
			</p>

			<p><span><label for="npass2">Taip Semula Kata Laluan Baru : </label></span>
			<?=form_password(array('name' => 'npass2', 'value' => set_value('npass2'), 'maxlength' => '10', 'size' => '10', 'id' => 'npass2'))?>
			<br /><?=form_error('npass2')?>
			</p>

            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('change', 'Tukar', 'class="submit"')?></p>
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