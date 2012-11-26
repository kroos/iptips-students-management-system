<? extend('base_template_user') ?>

	<? startblock('content') ?>
		<h1>Selamat Datang ke IPTIPs Students Management System</h1>
		<h2>Edit Kebenaran Capaian Staf (User Permission Access Level)</h2>
		<p>Sila masukkan nama staff dan edit capaian staff kepada page</p>
		<p><font color="#FF0000"><?=@$info?></font></p>

		<div class="form_settings">
		<?=form_open()?>
			<p><span><label for="name">Nama Staf : </label></span>
			<?=form_input(array('name' => 'name', 'value' => set_value('name'), 'maxlength' => '30', 'size' => '12', 'id' => 'name'))?>
			<br /><?=form_error('name')?>
			</p>
			
            <p style="padding-top: 15px"><span>&nbsp;</span><?=form_submit('search', 'Cari', 'class="submit"')?></p>
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

				$( "#name" ).autocomplete({
					source: [
								<?foreach($ui->result() as $r):?>
								"<?=$r->name?>", 
								<?endforeach?>
							]
				});
			});
		</script>
	<? endblock() ?>

<? end_extend() ?>