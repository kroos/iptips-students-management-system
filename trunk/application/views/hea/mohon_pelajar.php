<? extend('base_template_user') ?>

<? startblock('content') ?>
	<!-- letak <h1> supaya nampak standardize...  -->
    <h1>Selamat Datang ke IPTIPs Students Management System</h1>

	<!-- variable $title dapat dari controller ( $data['title'] )  -->
	<h2>Permohonan Pelajar</h2>

	<!-- sedikit keterangan apa yang page ni dapat buat utk user...  -->
	<div id="accordion">
	        <h3>Bantuan</h3>
	        <p>sat....</p>
	</div>
    <p><font color="#FF0000"><?=@$info?></font></p>

    <div class="form_settings">
		<table style="width:100%; border-spacing:0;">
		<thead>
			<tr>
				<th>id mohon</th>
				<th>stat mohon</th>
			</tr>
		</thead>
		<tbody>

<?=form_open()?>

	<?foreach($u->result() as $j):?>
		<?//$array['id_mohon <> '.$i++] = $j->id_mohon?>
		<?$m[] = "where('id_mohon <>', ".$j->id_mohon.")->"?>
	<?endforeach?>

<pre>
<?=print_r($m)?>
</pre>

<?$g = '$this->db->'?>
<?foreach($m as $l):?>
<?$g .= $l?>
<?endforeach?>	
<?$g .= "get('app_progmohon')->result()"?>

<?=$g?>
		<?//$g = $this->app_progmohon->GetWhere($array)?>
		<?foreach($g as $k):?>
			<tr>
				<td><?=$k->id_mohon?></td>
				<td><?=$k->status_mohon?></td>
			</tr>
		<?endforeach?>
<?=form_close()?>

		<tbody>
		</table>
    </div>

	
	<? endblock() ?>

<?php startblock('jscript')?>
	<?=get_extended_block() ?>
	<script type="text/javascript" src="<?=base_url()?>js/jquery/jquery.hints.js"></script>
	<script>
		$(document).ready(function(){	
	        $( "#accordion" ).accordion({
	            collapsible: true
	        });

	        $('input[title!=""]').hint();
		});
	</script>
<?php endblock()?>

<? end_extend()?>
