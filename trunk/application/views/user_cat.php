<? extend('base_template_user') ?>

	<? startblock('content') ?>
		<h1>Selamat Datang ke IPTIPs Students Management System</h1>
		<h2>Penambahan Jabatan Kepada Staff</h2>
		<p>Page ini adalah untuk menambahkan jabatan kepada staff yang telah sedia ada. Jadi 1 staff boleh mempunyai 2 jabatan dan juga 2 jawatan yang berbeza mengikut jabatan. Akan tetapi 1 staff tidak boleh mempunyai 1 jabatan dgn 2 jawatan yang berbeza mengikut sistem ini. Sila klik pada nama staff dan pilih jabatan dan juga jawatan staff.</p>
		<p><font color="#FF0000"><?=@$info?></font></p>

		<div class="form_settings">
		<?=form_open()?>
		<div class="demo"><?=$paginate?></div>
		<div id="radioset">
		<table style="width:100%; border-spacing:0;">
		<thead>
			<tr>
				<td>Nama</td>
				<td>Jabatan</td>
				<td>Jawatan</td>
			</tr>
		</thead>
		<tbody>
			<?$c = 0?>
			<?$v = 0?>
			<?foreach($ie->result() as $w):?>
				<tr>
					<td><?=form_radio(array('name' => 'id_user_data', 'id' => 'radio'.$c++, 'value' => $w->id_user_data))?><label for="radio<?=$v++?>"><?=$w->name?></label></td>
					<td><?=$w->dept?></td>
					<td><?=$w->jawatan?></td>
				</tr>
			<?endforeach?>
		</tbody>
		</table>
		<?=form_error('id_user_data')?>
		</div>
			<div id="loading">Loading ...</div>

			<?php
				foreach($i->result() as $z)
					{
						$jabatan[$z->id] = $z->dept;
					}
			?>

			<p><span><?=form_label('Jabatan', 'jabatan')?></span>
			<?=form_dropdown('jabatan', $jabatan, set_select('jabatan'), 'id="jabatan"')?>
			<br /><?=form_error('jabatan')?>
			</p>

			<p><span><?=form_label('Jawatan', 'jawatan')?></span>
			<select name="jawatan" id="jawatan" style="display:none"></select>
			<br /><?=form_error('jawatan')?>
			</p>

            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('tambah', 'Tambah', 'class="submit"')?></p>
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